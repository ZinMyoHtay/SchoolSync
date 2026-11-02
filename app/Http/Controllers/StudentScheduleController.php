<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Schedule;
use App\Models\AcademicYear;
use App\Models\Classroom;
use Illuminate\Support\Facades\Auth;

class StudentScheduleController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'student') {
            abort(403);
        }

        $student = $user->student;

        if (!$student) {
            abort(403, 'Student profile not found.');
        }

        /*
        |--------------------------------------------------------------------------
        | Get student's enrollments
        |--------------------------------------------------------------------------
        */

        $enrollments = $student->enrollments()
            ->with('classroom.academicYear')
            ->orderByDesc('enrollment_date')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Student's classrooms
        |--------------------------------------------------------------------------
        */

        $classrooms = $enrollments
            ->pluck('classroom')
            ->filter()
            ->unique('class_id')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Academic years belonging to student's classes
        |--------------------------------------------------------------------------
        */

        $academicYears = AcademicYear::whereIn(
            'academic_year_id',
            $classrooms
                ->pluck('year_id')
                ->filter()
                ->unique()
        )
            ->orderBy('start_date')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Student schedule records
        |--------------------------------------------------------------------------
        */

        $classIds = $classrooms->pluck('class_id');

        $schedules = Schedule::whereIn(
            'class_id',
            $classIds
        )->get();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalSchedules = $schedules->count();

        $activeSchedules = $schedules
            ->where('status', 'active')
            ->count();

        $inactiveSchedules = $schedules
            ->where('status', 'inactive')
            ->count();

        $totalClasses = $classrooms->count();

        return view(
           'student.academic.schedule.index',
            compact(
                'user',
                'student',
                'classrooms',
                'academicYears',
                'schedules',
                'totalSchedules',
                'activeSchedules',
                'inactiveSchedules',
                'totalClasses'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Calendar data
    |--------------------------------------------------------------------------
    */

    public function data()
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'student') {
            abort(403);
        }

        $student = $user->student;

        if (!$student) {
            abort(403, 'Student profile not found.');
        }

        /*
        |--------------------------------------------------------------------------
        | Get student's class IDs
        |--------------------------------------------------------------------------
        */

        $classIds = $student->enrollments()
            ->pluck('class_id')
            ->filter()
            ->unique()
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Get schedules only for student's classes
        |--------------------------------------------------------------------------
        */

        $schedules = Schedule::with([
            'classroom.academicYear',
            'subject',
        ])
            ->whereIn('class_id', $classIds)
            ->orderBy('schedule_date')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Convert schedules to FullCalendar events
        |--------------------------------------------------------------------------
        */

        $events = $schedules->map(function ($schedule) {

            $classroom = $schedule->classroom;
            $subject = $schedule->subject;

            $yearName = '-';

            if ($classroom?->academicYear) {

                $year = $classroom->academicYear;

                $yearStart = $year->start_date
                    ? \Carbon\Carbon::parse($year->start_date)->year
                    : null;

                $yearEnd = $year->end_date
                    ? \Carbon\Carbon::parse($year->end_date)->year
                    : null;

                if ($yearStart) {

                    $yearName = $yearStart;

                    if ($yearEnd && $yearEnd != $yearStart) {
                        $yearName .= ' - ' . $yearEnd;
                    }
                }
            }

            return [
                'id' => $schedule->schedule_id,

                'title' =>
                    ($classroom?->class_name ?? 'Class')
                    . ' - '
                    . ($subject?->subject_name ?? 'Subject'),

                'start' => $schedule->schedule_date,

                'allDay' => true,

                'extendedProps' => [

                    'schedule_date' =>
                        $schedule->schedule_date,

                    'academic_year' =>
                        $yearName,

                    'classroom' =>
                        $classroom?->class_name ?? 'N/A',

                    'class_id' =>
                        $schedule->class_id,

                    'subject' =>
                        $subject?->subject_name ?? 'N/A',

                    'subject_id' =>
                        $schedule->subject_id,

                    'comment' =>
                        $schedule->comment ?? '',

                    'status' =>
                        $schedule->status ?? 'inactive',
                ],
            ];
        });

        return response()->json($events);
    }
}