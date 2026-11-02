<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $student = $user->student;

        $currentEnrollment = null;
        $subjectsCount = 0;

        $totalAttendance = 0;
        $presentCount = 0;
        $absentCount = 0;
        $lateCount = 0;
        $attendanceRate = 0;
        $attendanceGrade = '-';

        $totalFees = 0;
        $paidAmount = 0;
        $outstandingAmount = 0;

        if ($student) {
            $currentEnrollment = $student->enrollments()
                ->with([
                    'classroom.academicYear',
                    'classroom.classSubjects.subject',
                    'classroom.classSubjects.teacher.staff.user',
                    'attendances',
                ])
                ->where('status', 'active')
                ->orderByDesc('enrollment_date')
                ->first();

            if (!$currentEnrollment) {
                $currentEnrollment = $student->enrollments()
                    ->with([
                        'classroom.academicYear',
                        'classroom.classSubjects.subject',
                        'classroom.classSubjects.teacher.staff.user',
                        'attendances',
                    ])
                    ->orderByDesc('enrollment_date')
                    ->first();
            }

            if ($currentEnrollment && $currentEnrollment->classroom) {
                $subjectsCount = $currentEnrollment
                    ->classroom
                    ->classSubjects
                    ->filter(function ($classSubject) {
                        return $classSubject->subject !== null;
                    })
                    ->count();

                $attendances = $currentEnrollment->attendances
                    ->sortByDesc('attendance_date')
                    ->sortByDesc('attendance_id')
                    ->values();

                $totalAttendance = $attendances->count();

                $presentCount = $attendances->filter(function ($attendance) {
                    return strtolower(trim($attendance->status ?? '')) === 'present';
                })->count();

                $absentCount = $attendances->filter(function ($attendance) {
                    return strtolower(trim($attendance->status ?? '')) === 'absent';
                })->count();

                $lateCount = $attendances->filter(function ($attendance) {
                    return strtolower(trim($attendance->status ?? '')) === 'late';
                })->count();

                if ($totalAttendance > 0) {
                    $score = $attendances->sum(function ($attendance) {
                        return match (strtolower(trim($attendance->status ?? ''))) {
                            'present' => 1.00,
                            'late' => 0.75,
                            default => 0.00,
                        };
                    });

                    $attendanceRate = round(
                        ($score / $totalAttendance) * 100,
                        2
                    );

                    $attendanceGrade = match (true) {
                        $attendanceRate >= 90 => 'A',
                        $attendanceRate >= 80 => 'B',
                        $attendanceRate >= 70 => 'C',
                        default => 'D',
                    };
                }
            }

            $studentFees = $student->studentFees()
                ->with('payments')
                ->get();

            foreach ($studentFees as $studentFee) {
                $feeAmount = (float) $studentFee->net_amount;

                $feePaid = (float) $studentFee
                    ->payments
                    ->sum('amount_paid');

                $feeBalance = max(
                    $feeAmount - $feePaid,
                    0
                );

                $totalFees += $feeAmount;
                $paidAmount += $feePaid;
                $outstandingAmount += $feeBalance;
            }
        }

        return view(
            'student.dashboard',
            compact(
                'user',
                'student',
                'currentEnrollment',
                'subjectsCount',
                'totalAttendance',
                'presentCount',
                'absentCount',
                'lateCount',
                'attendanceRate',
                'attendanceGrade',
                'totalFees',
                'paidAmount',
                'outstandingAmount'
            )
        );
    }
}
