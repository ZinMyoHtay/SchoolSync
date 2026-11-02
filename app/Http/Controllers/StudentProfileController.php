<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller
{
    public function edit()
    {
        /** @var User $user */
        $user = Auth::user();

        $student = $user->student;

        $currentEnrollment = null;
        $academicYear = '-';
        $subjectsCount = 0;
        $attendanceGrade = '-';

        if ($student) {

            $currentEnrollment = $student->enrollments()
                ->with([
                    'classroom.academicYear'
                ])
                ->orderByDesc('enrollment_date')
                ->first();

            if ($currentEnrollment) {

                $academicYear =
                    $currentEnrollment->classroom?->academicYear?->year_name ?? '-';

                $subjectsCount =
                    $currentEnrollment->classroom?->classSubjects()->count() ?? 0;
            }

            $attendanceGrade = $student->enrollments()
                ->with('attendances')
                ->get()
                ->flatMap(function ($enrollment) {
                    return $enrollment->attendances;
                })
                ->sortByDesc(function ($attendance) {
                    return $attendance->attendance_date;
                })
                ->first()?->attendance_grade ?? '-';
        }

        return view(
            'student.school.profile.edit',
            compact(
                'user',
                'student',
                'currentEnrollment',
                'academicYear',
                'subjectsCount',
                'attendanceGrade'
            )
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->password = Hash::make(
            $request->password
        );

        $user->save();

        return redirect()
            ->route('student.profile.edit')
            ->with(
                'success',
                'Password updated successfully.'
            );
    }
}