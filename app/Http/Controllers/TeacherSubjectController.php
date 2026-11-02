<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeacherSubjectController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $staff = $user->staff;
        $teacher = $staff?->teacher;

        if (!$teacher) {
            abort(403, 'Teacher profile not found.');
        }

        $classSubjects = $teacher->classSubjects()
            ->with([
                'subject',
                'classroom.academicYear',
            ])
            ->get();

        $subjects = $classSubjects
            ->groupBy('subject_id')
            ->map(function ($assignments) {
                return [
                    'subject' => $assignments->first()->subject,
                    'assignments' => $assignments,
                ];
            })
            ->values();

        return view(
            'teacher.teaching.subjects.index',
            compact(
                'user',
                'teacher',
                'subjects',
                'classSubjects'
            )
        );
    }


public function show($id)
{
    /** @var User $user */
    $user = Auth::user();

    $staff = $user->staff;
    $teacher = $staff?->teacher;

    if (!$teacher) {
        abort(403, 'Teacher profile not found.');
    }

    $classSubjects = $teacher->classSubjects()
        ->with([
            'subject',
            'classroom.academicYear',
            'classroom.enrollments',
        ])
        ->where('subject_id', $id)
        ->get();

    if ($classSubjects->isEmpty()) {
        abort(404);
    }

    $subject = $classSubjects->first()->subject;

    return view(
        'teacher.teaching.subjects.show',
        compact(
            'user',
            'teacher',
            'subject',
            'classSubjects'
        )
    );
}

}
