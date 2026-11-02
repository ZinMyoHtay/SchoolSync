<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StudentSubjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $student = $user->student;

        $currentEnrollment = null;

        $classSubjects = collect();

        if ($student) {
            $currentEnrollment = $student->enrollments()
                ->with([
                    'classroom.academicYear',
                    'classroom.classSubjects.subject',
                    'classroom.classSubjects.teacher.staff.user',
                ])
                ->orderByDesc('enrollment_date')
                ->first();

            if ($currentEnrollment?->classroom) {
                $classSubjects = $currentEnrollment->classroom
                    ->classSubjects
                    ->filter(function ($classSubject) {
                        return $classSubject->subject !== null;
                    });
            }
        }

        return view(
            'student.school.subjects.index',
            compact(
                'user',
                'student',
                'currentEnrollment',
                'classSubjects'
            )
        );
    }
}