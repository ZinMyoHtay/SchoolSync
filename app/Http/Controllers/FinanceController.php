<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\FeeType;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $role = Auth::user()->role;

        if ($role === 'admin') {

            $search = $request->search;
            $feeTypeId = $request->fee_type_id;
            $status = $request->status;

            $studentFeesQuery = StudentFee::with([
                'student.enrollments.classroom',
                'feeType',
                'academicYear',
                'payments'
            ]);

            if ($search) {
                $studentFeesQuery->where(function ($query) use ($search) {

                    $query->whereHas('student', function ($studentQuery) use ($search) {
                        $studentQuery
                            ->where('full_name', 'like', '%' . $search . '%')
                            ->orWhere('student_code', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('feeType', function ($feeTypeQuery) use ($search) {
                        $feeTypeQuery->where('fee_name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('payments', function ($paymentQuery) use ($search) {
                        $paymentQuery->where('payment_date', 'like', '%' . $search . '%');
                    });

                });
            }

            if ($feeTypeId) {
                $studentFeesQuery->where('fee_type_id', $feeTypeId);
            }

            $studentFees = $studentFeesQuery
                ->latest('student_fee_id')
                ->get();

            $financeRecords = collect();

            foreach ($studentFees as $studentFee) {

                $totalFee = (float) $studentFee->net_amount;

                $totalPaid = (float) $studentFee
                    ->payments
                    ->sum('amount_paid');

                $balance = max($totalFee - $totalPaid, 0);

                if ($balance <= 0 && $totalFee > 0) {
                    $paymentStatus = 'Paid';
                } elseif ($totalPaid <= 0) {
                    $paymentStatus = 'Unpaid';
                } else {
                    $paymentStatus = 'Pending';
                }

                if ($status && $paymentStatus !== $status) {
                    continue;
                }

                $studentFee->total_fee = $totalFee;
                $studentFee->total_paid = $totalPaid;
                $studentFee->balance = $balance;
                $studentFee->payment_status = $paymentStatus;

                $financeRecords->push($studentFee);
            }

            $totalFees = $financeRecords->sum('total_fee');

            $paidAmount = $financeRecords->sum('total_paid');

            $outstandingAmount = $financeRecords->sum('balance');

            $paymentsThisMonth = Payment::whereMonth(
                'payment_date',
                now()->month
            )
                ->whereYear('payment_date', now()->year)
                ->sum('amount_paid');

            $pendingAmount = $financeRecords
                ->where('payment_status', 'Pending')
                ->sum('balance');

            $overdueAmount = 0;

            $feeTypes = FeeType::orderBy('fee_name')->get();

            $activeFeeTypes = FeeType::where('status', 'active')
                ->orderBy('fee_name')
                ->get();

            $students = Student::orderBy('full_name')->get();

            $academicYears = AcademicYear::orderByDesc(
                'academic_year_id'
            )->get();

            return view(
                'admin.finance.index',
                compact(
                    'financeRecords',
                    'feeTypes',
                    'activeFeeTypes',
                    'students',
                    'academicYears',
                    'totalFees',
                    'paidAmount',
                    'outstandingAmount',
                    'paymentsThisMonth',
                    'pendingAmount',
                    'overdueAmount'
                )
            );
        }

        if ($role === 'staff') {
            return view('staff.finance.index');
        }

        if ($role === 'teacher') {
            return view('teacher.finance.index');
        }

        if ($role === 'student') {

            $user = Auth::user();

            $student = $user->student;

            $studentFees = collect();
            $payments = collect();

            $totalFees = 0;
            $paidAmount = 0;
            $outstandingAmount = 0;

            if ($student) {

                $studentFees = StudentFee::with([
                    'feeType',
                    'academicYear',
                    'payments',
                ])
                    ->where('student_id', $student->student_id)
                    ->latest('student_fee_id')
                    ->get();

                foreach ($studentFees as $studentFee) {

                    $totalFee = (float) $studentFee->net_amount;

                    $totalPaid = (float) $studentFee
                        ->payments
                        ->sum('amount_paid');

                    $balance = max($totalFee - $totalPaid, 0);

                    if ($balance <= 0 && $totalFee > 0) {
                        $paymentStatus = 'Paid';
                    } elseif ($totalPaid <= 0) {
                        $paymentStatus = 'Unpaid';
                    } else {
                        $paymentStatus = 'Pending';
                    }

                    $studentFee->total_fee = $totalFee;
                    $studentFee->total_paid = $totalPaid;
                    $studentFee->balance = $balance;
                    $studentFee->payment_status = $paymentStatus;
                }

                $totalFees = $studentFees->sum('total_fee');

                $paidAmount = $studentFees->sum('total_paid');

                $outstandingAmount = $studentFees->sum('balance');

                $payments = Payment::whereHas(
                    'studentFee',
                    function ($query) use ($student) {
                        $query->where('student_id', $student->student_id);
                    }
                )
                    ->with('studentFee.feeType')
                    ->latest('payment_date')
                    ->get();
            }

            return view(
                'student.finance.index',
                compact(
                    'user',
                    'student',
                    'studentFees',
                    'payments',
                    'totalFees',
                    'paidAmount',
                    'outstandingAmount'
                )
            );
        }

        abort(403);
    }

    public function create(Request $request)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $studentFees = StudentFee::with([
            'student.enrollments.classroom',
            'feeType',
            'academicYear',
            'payments'
        ])
            ->latest('student_fee_id')
            ->get();

        $selectedStudentFee = null;

        if ($request->filled('student_fee_id')) {

            $selectedStudentFee = StudentFee::with([
                'student.enrollments.classroom',
                'feeType',
                'academicYear',
                'payments'
            ])->find($request->student_fee_id);

            if (!$selectedStudentFee) {
                return redirect()
                    ->route('admin.finance.create')
                    ->withErrors([
                        'student_fee_id' =>
                            'The selected student fee does not exist.'
                    ]);
            }
        }

        return view(
            'admin.finance.create',
            compact('studentFees', 'selectedStudentFee')
        );
    }

    public function store(Request $request)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $validated = $request->validate([
            'student_fee_id' => [
                'required',
                'integer',
                'exists:student_fees,student_fee_id',
            ],
            'amount_paid' => [
                'required',
                'numeric',
                'min:0.01',
            ],
            'payment_date' => [
                'required',
                'date',
            ],
        ]);

        $studentFee = StudentFee::with('payments')
            ->findOrFail($validated['student_fee_id']);

        $totalFee = (float) $studentFee->net_amount;

        $alreadyPaid = (float) $studentFee
            ->payments
            ->sum('amount_paid');

        $remainingBalance = max($totalFee - $alreadyPaid, 0);

        if ($remainingBalance <= 0) {
            return redirect()
                ->route('admin.finance.create', [
                    'student_fee_id' => $studentFee->student_fee_id
                ])
                ->withInput()
                ->withErrors([
                    'amount_paid' =>
                        'This fee has already been fully paid.'
                ]);
        }

        $paymentAmount = (float) $validated['amount_paid'];

        if ($paymentAmount > $remainingBalance) {
            return redirect()
                ->route('admin.finance.create', [
                    'student_fee_id' => $studentFee->student_fee_id
                ])
                ->withInput()
                ->withErrors([
                    'amount_paid' =>
                        'Payment amount cannot be greater than the remaining balance.'
                ]);
        }

        DB::transaction(function () use (
            $validated,
            $studentFee,
            $alreadyPaid,
            $totalFee,
            $paymentAmount
        ) {

            Payment::create([
                'student_fee_id' => $studentFee->student_fee_id,
                'amount_paid' => $paymentAmount,
                'payment_date' => $validated['payment_date'],
            ]);

            $newTotalPaid = $alreadyPaid + $paymentAmount;

            $studentFee->update([
                'status' => $newTotalPaid >= $totalFee
                    ? 'paid'
                    : 'pending'
            ]);
        });

        return redirect()
            ->route('admin.finance.index')
            ->with('success', 'Payment recorded successfully.');
    }

    public function storeFeeType(Request $request)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $validated = $request->validate([
            'fee_name' => [
                'required',
                'string',
                'max:255',
            ],
            'default_amount' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        FeeType::create([
            'fee_name' => $validated['fee_name'],
            'default_amount' => $validated['default_amount'],
            'status' => 'active',
        ]);

        return redirect()
            ->route('admin.finance.index')
            ->with('success', 'Fee type created successfully.');
    }

    public function updateFeeType(Request $request, string $id)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $feeType = FeeType::findOrFail($id);

        $validated = $request->validate([
            'fee_name' => [
                'required',
                'string',
                'max:255',
            ],
            'default_amount' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        $feeType->update([
            'fee_name' => $validated['fee_name'],
            'default_amount' => $validated['default_amount'],
        ]);

        return redirect()
            ->route('admin.finance.index')
            ->with('success', 'Fee type updated successfully.');
    }

    public function destroyFeeType(string $id)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $feeType = FeeType::findOrFail($id);

        $newStatus = $feeType->status === 'active'
            ? 'inactive'
            : 'active';

        $feeType->update([
            'status' => $newStatus,
        ]);

        return redirect()
            ->route('admin.finance.index')
            ->with(
                'success',
                $newStatus === 'active'
                    ? 'Fee type activated successfully.'
                    : 'Fee type deactivated successfully.'
            );
    }

    public function storeStudentFee(Request $request)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $validated = $request->validate([
            'student_id' => [
                'required',
                'integer',
                'exists:students,student_id',
            ],
            'fee_type_id' => [
                'required',
                'integer',
                'exists:fee_types,fee_type_id',
            ],
            'academic_year_id' => [
                'required',
                'integer',
                'exists:academic_years,academic_year_id',
            ],
            'net_amount' => [
                'required',
                'numeric',
                'min:0.01',
            ],
        ]);

        $feeType = FeeType::findOrFail($validated['fee_type_id']);

        if ($feeType->status !== 'active') {
            return back()
                ->withInput()
                ->withErrors([
                    'fee_type_id' =>
                        'This fee type is inactive and cannot be assigned.'
                ]);
        }

        $alreadyExists = StudentFee::where(
            'student_id',
            $validated['student_id']
        )
            ->where('fee_type_id', $validated['fee_type_id'])
            ->where('academic_year_id', $validated['academic_year_id'])
            ->exists();

        if ($alreadyExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'student_id' =>
                        'This fee has already been assigned to this student for the selected academic year.'
                ]);
        }

        StudentFee::create([
            'student_id' => $validated['student_id'],
            'fee_type_id' => $validated['fee_type_id'],
            'academic_year_id' => $validated['academic_year_id'],
            'net_amount' => $validated['net_amount'],
            'status' => 'pending',
        ]);

        return redirect()
            ->route('admin.finance.index')
            ->with('success', 'Student fee assigned successfully.');
    }

    public function show(string $id)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $studentFee = StudentFee::with([
            'student.enrollments.classroom',
            'feeType',
            'academicYear',
            'payments',
        ])->findOrFail($id);

        $totalFee = (float) $studentFee->net_amount;

        $totalPaid = (float) $studentFee
            ->payments
            ->sum('amount_paid');

        $balance = max(0, $totalFee - $totalPaid);

        if ($balance <= 0 && $totalFee > 0) {
            $paymentStatus = 'Paid';
        } elseif ($totalPaid <= 0) {
            $paymentStatus = 'Unpaid';
        } else {
            $paymentStatus = 'Pending';
        }

        return view(
            'admin.finance.show',
            compact(
                'studentFee',
                'totalFee',
                'totalPaid',
                'balance',
                'paymentStatus'
            )
        );
    }

    public function edit(string $id)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $payment = Payment::with([
            'studentFee.student',
            'studentFee.feeType'
        ])->findOrFail($id);

        return view('admin.finance.edit', compact('payment'));
    }

    public function update(Request $request, string $id)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $payment = Payment::with(
            'studentFee.payments'
        )->findOrFail($id);

        $validated = $request->validate([
            'amount_paid' => [
                'required',
                'numeric',
                'min:0.01',
            ],
            'payment_date' => [
                'required',
                'date',
            ],
        ]);

        $studentFee = $payment->studentFee;

        $otherPayments = $studentFee
            ->payments
            ->where('payment_id', '!=', $payment->payment_id)
            ->sum('amount_paid');

        $remainingBalance = (float) $studentFee->net_amount
            - (float) $otherPayments;

        if ((float) $validated['amount_paid'] > $remainingBalance) {
            return back()
                ->withInput()
                ->withErrors([
                    'amount_paid' =>
                        'Payment amount cannot be greater than the remaining balance.'
                ]);
        }

        DB::transaction(function () use (
            $payment,
            $validated,
            $studentFee
        ) {

            $payment->update([
                'amount_paid' => $validated['amount_paid'],
                'payment_date' => $validated['payment_date'],
            ]);

            $totalPaid = $studentFee
                ->payments()
                ->sum('amount_paid');

            $studentFee->update([
                'status' => $totalPaid >= (float) $studentFee->net_amount
                    ? 'paid'
                    : 'pending'
            ]);
        });

        return redirect()
            ->route('admin.finance.show', $studentFee->student_fee_id)
            ->with('success', 'Payment updated successfully.');
    }

    public function destroy(string $id)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        DB::transaction(function () use ($id) {

            $payment = Payment::findOrFail($id);

            $studentFeeId = $payment->student_fee_id;

            $payment->delete();

            $studentFee = StudentFee::find($studentFeeId);

            if ($studentFee) {

                $totalPaid = $studentFee
                    ->payments()
                    ->sum('amount_paid');

                $studentFee->update([
                    'status' => $totalPaid >= (float) $studentFee->net_amount
                        ? 'paid'
                        : 'pending'
                ]);
            }
        });

        return redirect()
            ->route('admin.finance.index')
            ->with('success', 'Payment deleted successfully.');
    }

    public function editPayment(string $id)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $payment = Payment::with([
            'studentFee.student.user',
            'studentFee.feeType',
        ])->findOrFail($id);

        return view(
            'admin.finance.payment-edit',
            compact('payment')
        );
    }

    public function updatePayment(Request $request, string $id)
    {
        if (
            !Auth::check() ||
            !in_array(Auth::user()->role, ['admin', 'staff'])
        ) {
            abort(403);
        }

        $payment = Payment::findOrFail($id);

        $validated = $request->validate([
            'amount_paid' => [
                'required',
                'numeric',
                'min:0.01',
            ],
            'payment_date' => [
                'required',
                'date',
            ],
        ]);

        $payment->update([
            'amount_paid' => $validated['amount_paid'],
            'payment_date' => $validated['payment_date'],
        ]);

        return redirect()
            ->route('admin.finance.show', $payment->student_fee_id)
            ->with('success', 'Payment updated successfully.');
    }
}
