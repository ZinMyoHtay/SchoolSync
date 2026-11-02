<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = $user->student;

        $currentEnrollment = null;
        $attendances = collect();

        $totalAttendance = 0;
        $presentCount = 0;
        $absentCount = 0;
        $lateCount = 0;
        $attendanceRate = 0;
        $attendanceGrade = '-';

        if ($student) {
            $currentEnrollment = $student->enrollments()
                ->with([
                    'classroom.academicYear',
                    'attendances',
                ])
                ->orderByDesc('enrollment_date')
                ->first();

            if ($currentEnrollment) {
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
                    // Use the same weighted formula as the Teacher role.
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
        }

        return view(
            'student.school.attendance.index',
            compact(
                'user',
                'student',
                'currentEnrollment',
                'attendances',
                'totalAttendance',
                'presentCount',
                'absentCount',
                'lateCount',
                'attendanceRate',
                'attendanceGrade'
            )
        );
    }
}
