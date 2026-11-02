<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
   public function index(Request $request)
{
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        abort(403);
    }

    $query = Enrollment::with([
        'student',
        'classroom.academicYear'
    ]);


    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where(
                'enrollment_id',
                'like',
                '%' . $search . '%'
            )

            ->orWhere(
                'student_id',
                'like',
                '%' . $search . '%'
            )

            ->orWhereHas('student', function ($studentQuery) use ($search) {

                $studentQuery
                    ->where(
                        'full_name',
                        'like',
                        '%' . $search . '%'
                    )

                    ->orWhere(
                        'student_code',
                        'like',
                        '%' . $search . '%'
                    );
            });
        });
    }

    if ($request->filled('class_id')) {
        $query->where(
            'class_id',
            $request->class_id
        );
    }

    
    if ($request->filled('status')) {
        $query->where(
            'status',
            $request->status
        );
    }

  
    $enrollments = $query
        ->orderBy('enrollment_id', 'desc')
        ->get();

    $classrooms = Classroom::with('academicYear')
        ->orderBy('class_id', 'desc')
        ->get();

    return view(
        'admin.academic.enrollments.index',
        compact(
            'enrollments',
            'classrooms'
        )
    );
}

    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $students = Student::orderBy('student_id', 'desc')
            ->get();

        $classrooms = Classroom::with('academicYear')
            ->where('status', 'active')
            ->orderBy('class_id', 'desc')
            ->get();

        return view(
            'admin.academic.enrollments.create',
            compact('students', 'classrooms')
        );
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'student_id' => [
                'required',
                'exists:students,student_id',
            ],

            'class_id' => [
                'required',
                'exists:classrooms,class_id',
            ],

            'enrollment_date' => [
                'required',
                'date',
            ],
        ]);

        // Get the selected classroom and its academic year
        $classroom = Classroom::with('academicYear')
            ->findOrFail($validated['class_id']);

        // Enrollment date cannot be after academic year end date
        if (
            $classroom->academicYear &&
            $validated['enrollment_date'] >
            $classroom->academicYear->end_date
        ) {
            return back()
                ->withErrors([
                    'enrollment_date' =>
                        'The enrollment date cannot be after the academic year ends.'
                ])
                ->withInput();
        }

        // Check if student is already actively enrolled
        $alreadyEnrolled = Enrollment::where(
            'student_id',
            $validated['student_id']
        )
            ->where(
                'class_id',
                $validated['class_id']
            )
            ->where(
                'status',
                'active'
            )
            ->exists();

        if ($alreadyEnrolled) {
            return back()
                ->withErrors([
                    'student_id' =>
                        'This student is already actively enrolled in this class.'
                ])
                ->withInput();
        }

        Enrollment::create([
            'student_id' => $validated['student_id'],
            'class_id' => $validated['class_id'],
            'enrollment_date' => $validated['enrollment_date'],
            'status' => 'active',
        ]);

        return redirect()
            ->route('admin.enrollments.index')
            ->with(
                'success',
                'Enrollment created successfully.'
            );
    }

    public function show(string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $enrollment = Enrollment::with([
            'student',
            'classroom.academicYear',
            'classroom.teacher.staff'
        ])->findOrFail($id);

        return view(
            'admin.academic.enrollments.show',
            compact('enrollment')
        );
    }

    public function edit(string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $enrollment = Enrollment::findOrFail($id);

        $students = Student::orderBy('student_id', 'desc')
            ->get();

        $classrooms = Classroom::with('academicYear')
            ->where('status', 'active')
            ->orderBy('class_id', 'desc')
            ->get();

        return view(
            'admin.academic.enrollments.edit',
            compact(
                'enrollment',
                'students',
                'classrooms'
            )
        );
    }

    public function update(Request $request, string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $enrollment = Enrollment::findOrFail($id);

        $validated = $request->validate([
            'student_id' => [
                'required',
                'exists:students,student_id',
            ],

            'class_id' => [
                'required',
                'exists:classrooms,class_id',
            ],

            'enrollment_date' => [
                'required',
                'date',
            ],
        ]);

        // Get the selected classroom and its academic year
        $classroom = Classroom::with('academicYear')
            ->findOrFail($validated['class_id']);

        // Enrollment date cannot be after academic year end date
        if (
            $classroom->academicYear &&
            $validated['enrollment_date'] >
            $classroom->academicYear->end_date
        ) {
            return back()
                ->withErrors([
                    'enrollment_date' =>
                        'The enrollment date cannot be after the academic year ends.'
                ])
                ->withInput();
        }

        // Check if another active enrollment already exists
        $alreadyEnrolled = Enrollment::where(
            'student_id',
            $validated['student_id']
        )
            ->where(
                'class_id',
                $validated['class_id']
            )
            ->where(
                'status',
                'active'
            )
            ->where(
                'enrollment_id',
                '!=',
                $enrollment->enrollment_id
            )
            ->exists();

        if ($alreadyEnrolled) {
            return back()
                ->withErrors([
                    'student_id' =>
                        'This student is already actively enrolled in this class.'
                ])
                ->withInput();
        }

        $enrollment->update([
            'student_id' => $validated['student_id'],
            'class_id' => $validated['class_id'],
            'enrollment_date' => $validated['enrollment_date'],
        ]);

        return redirect()
            ->route('admin.enrollments.index')
            ->with(
                'success',
                'Enrollment updated successfully.'
            );
    }

    public function toggleStatus(string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $enrollment = Enrollment::findOrFail($id);

        if ($enrollment->status === 'active') {
            $enrollment->update([
                'status' => 'inactive'
            ]);

            $message = 'Enrollment deactivated successfully.';
        } else {
            $enrollment->update([
                'status' => 'active'
            ]);

            $message = 'Enrollment activated successfully.';
        }

        return redirect()
            ->route('admin.enrollments.index')
            ->with('success', $message);
    }
}