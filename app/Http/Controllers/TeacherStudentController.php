<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class TeacherStudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'teacher') {
            abort(403);
        }

        $staff = $user->staff;
        $teacher = $staff?->teacher;

        if (!$teacher) {
            abort(403, 'Teacher profile not found.');
        }

        /*
        |--------------------------------------------------------------------------
        | Teacher's Classes
        |--------------------------------------------------------------------------
        |
        | A teacher is assigned to a classroom through class_subjects.
        | classrooms does not contain teacher_id.
        |
        */

        $classrooms = Classroom::whereHas('classSubjects', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->teacher_id);
        })
            ->with([
                'academicYear',
                'enrollments.student.user',
            ])
            ->where('status', 'active')
            ->orderBy('class_id', 'desc')
            ->get();

        return view(
            'teacher.teaching.students.index',
            compact(
                'user',
                'teacher',
                'classrooms'
            )
        );
    }

    public function show($id)
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'teacher') {
            abort(403);
        }

        $staff = $user->staff;
        $teacher = $staff?->teacher;

        if (!$teacher) {
            abort(403, 'Teacher profile not found.');
        }

        /*
        |--------------------------------------------------------------------------
        | Get Enrollment
        |--------------------------------------------------------------------------
        */

        $enrollment = Enrollment::with([
            'student.user',
            'classroom.academicYear',
        ])->findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Check Teacher Access
        |--------------------------------------------------------------------------
        |
        | The teacher can only view students from classrooms where
        | the teacher is assigned through class_subjects.
        |
        */

        $hasAccess = Classroom::whereHas('classSubjects', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->teacher_id);
        })
            ->where('class_id', $enrollment->class_id)
            ->where('status', 'active')
            ->exists();

        if (!$hasAccess) {
            abort(403);
        }

        $student = $enrollment->student;
        $classroom = $enrollment->classroom;

        return view(
            'teacher.teaching.students.show',
            compact(
                'user',
                'teacher',
                'student',
                'enrollment',
                'classroom'
            )
        );
    }
}