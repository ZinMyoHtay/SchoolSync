<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Support\Facades\Auth;

class TeacherClassController extends Controller
{
    public function index()
    {
        $teacher = Teacher::whereHas('staff', function ($query) {
            $query->where('user_id', Auth::id());
        })->firstOrFail();

        $classrooms = Classroom::whereHas('classSubjects', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->teacher_id);
        })
            ->where('status', 'active')
            ->with('academicYear')
            ->withCount('enrollments')
            ->orderBy('class_name', 'asc')
            ->get();

        return view(
            'teacher.teaching.classes.index',
            compact(
                'teacher',
                'classrooms'
            )
        );
    }

    public function show($id)
    {
        $teacher = Teacher::whereHas('staff', function ($query) {
            $query->where('user_id', Auth::id());
        })->firstOrFail();

        $classroom = Classroom::whereHas('classSubjects', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->teacher_id);
        })
            ->with([
                'academicYear',
                'enrollments.student.user',
                'enrollments.attendances'
            ])
            ->findOrFail($id);

        return view(
            'teacher.teaching.classes.show',
            compact(
                'teacher',
                'classroom'
            )
        );
    }
}