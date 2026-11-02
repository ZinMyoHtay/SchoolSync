<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StudentClassController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $student = $user->student;

        $enrollments = collect();

        $currentEnrollment = null;

        if ($student) {

            $enrollments = $student->enrollments()
                ->with([
                    'classroom.academicYear',
                    'classroom.classSubjects.subject',
                    'classroom.classSubjects.teacher.staff',
                ])
                ->orderByDesc('enrollment_date')
                ->get();

            $currentEnrollment = $enrollments->first();
        }

        return view(
            'student.school.classes.index',
            compact(
                'user',
                'student',
                'enrollments',
                'currentEnrollment'
            )
        );
    }
}