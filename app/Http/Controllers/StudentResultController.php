<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentResultController extends Controller
{
    /**
     * Display student results.
     */
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

            /*
            |--------------------------------------------------------------------------
            | Get Current Enrollment
            |--------------------------------------------------------------------------
            */

            $currentEnrollment = $student->enrollments()
                ->with([
                    'classroom.academicYear',
                    'classroom.classSubjects.subject',
                    'attendances',
                ])
                ->where('status', 'active')
                ->orderByDesc('enrollment_date')
                ->first();

            /*
            |--------------------------------------------------------------------------
            | If no active enrollment, get latest enrollment
            |--------------------------------------------------------------------------
            */

            if (!$currentEnrollment) {

                $currentEnrollment = $student->enrollments()
                    ->with([
                        'classroom.academicYear',
                        'classroom.classSubjects.subject',
                        'attendances',
                    ])
                    ->orderByDesc('enrollment_date')
                    ->first();
            }

            /*
            |--------------------------------------------------------------------------
            | Attendance
            |--------------------------------------------------------------------------
            */

            if ($currentEnrollment) {

                $attendances = $currentEnrollment->attendances
                    ->sortByDesc('attendance_date')
                    ->sortByDesc('attendance_id')
                    ->values();

                $totalAttendance = $attendances->count();

                $presentCount = $attendances
                    ->filter(function ($attendance) {

                        return strtolower(
                            trim($attendance->status ?? '')
                        ) === 'present';

                    })
                    ->count();

                $absentCount = $attendances
                    ->filter(function ($attendance) {

                        return strtolower(
                            trim($attendance->status ?? '')
                        ) === 'absent';

                    })
                    ->count();

                $lateCount = $attendances
                    ->filter(function ($attendance) {

                        return strtolower(
                            trim($attendance->status ?? '')
                        ) === 'late';

                    })
                    ->count();

                /*
                |--------------------------------------------------------------------------
                | Attendance Rate
                |--------------------------------------------------------------------------
                |
                | Present = 1.0
                | Late    = 0.75
                | Absent  = 0
                |
                */

                if ($totalAttendance > 0) {

                    $attendancePoints =
                        ($presentCount * 1.0)
                        + ($lateCount * 0.75);

                    $attendanceRate =
                        ($attendancePoints / $totalAttendance) * 100;

                    $attendanceRate = round(
                        $attendanceRate,
                        1
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | Attendance Grade
                |--------------------------------------------------------------------------
                */

                if ($attendanceRate >= 90) {

                    $attendanceGrade = 'A';

                } elseif ($attendanceRate >= 80) {

                    $attendanceGrade = 'B';

                } elseif ($attendanceRate >= 70) {

                    $attendanceGrade = 'C';

                } elseif ($attendanceRate >= 60) {

                    $attendanceGrade = 'D';

                } else {

                    $attendanceGrade = 'F';
                }
            }
        }

        return view(
            'student.school.results.index',
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

    /**
     * Show the form for creating a new result.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created result.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified result.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified result.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified result.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified result.
     */
    public function destroy(string $id)
    {
        //
    }
}