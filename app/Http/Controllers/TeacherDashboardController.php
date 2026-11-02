<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherDashboardController extends Controller
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
            abort(403);
        }

        /*
        |--------------------------------------------------------------------------
        | Teacher's Classes
        |--------------------------------------------------------------------------
        |
        | Teachers are assigned to classes through class_subjects.
        | classrooms does NOT have teacher_id.
        |
        */

        $classrooms = Classroom::whereHas('classSubjects', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->teacher_id);
        })
            ->where('status', 'active')
            ->with('academicYear')
            ->withCount('enrollments')
            ->orderBy('class_name')
            ->get();

        $totalClasses = $classrooms->count();

        /*
        |--------------------------------------------------------------------------
        | Total Students
        |--------------------------------------------------------------------------
        */

        $totalStudents = Student::whereHas('enrollments', function ($query) use ($classrooms) {
            $query->whereIn(
                'class_id',
                $classrooms->pluck('class_id')
            );
        })->count();

        /*
        |--------------------------------------------------------------------------
        | Total Subjects
        |--------------------------------------------------------------------------
        */

        $totalSubjects = DB::table('class_subjects')
            ->where('teacher_id', $teacher->teacher_id)
            ->distinct()
            ->count('subject_id');

        /*
        |--------------------------------------------------------------------------
        | Today's Schedules
        |--------------------------------------------------------------------------
        */

        $today = now()->format('Y-m-d');

        $todaySchedules = Schedule::with([
            'classroom',
            'classroom.academicYear',
            'subject'
        ])
            ->where('teacher_id', $teacher->teacher_id)
            ->whereDate('schedule_date', $today)
            ->orderBy('start_time')
            ->get();

        $todayClasses = $todaySchedules->count();

        /*
        |--------------------------------------------------------------------------
        | Upcoming Schedules
        |--------------------------------------------------------------------------
        */

        $upcomingSchedules = Schedule::with([
            'classroom',
            'classroom.academicYear',
            'subject'
        ])
            ->where('teacher_id', $teacher->teacher_id)
            ->whereDate('schedule_date', '>=', $today)
            ->orderBy('schedule_date')
            ->orderBy('start_time')
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Academic Years
        |--------------------------------------------------------------------------
        */

        $academicYears = AcademicYear::whereIn(
            'academic_year_id',
            $classrooms->pluck('year_id')
        )
            ->orderByDesc('start_date')
            ->get();

        $currentAcademicYear = $academicYears->first();

        return view('teacher.dashboard', compact(
            'user',
            'teacher',
            'staff',
            'classrooms',
            'totalClasses',
            'totalStudents',
            'totalSubjects',
            'todayClasses',
            'todaySchedules',
            'upcomingSchedules',
            'academicYears',
            'currentAcademicYear'
        ));
    }
}