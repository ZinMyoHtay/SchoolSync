<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TeacherScheduleController extends Controller
{
    private function getTeacher()
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

        return $teacher;
    }

    /*
    |--------------------------------------------------------------------------
    | Get Teacher's Classes
    |--------------------------------------------------------------------------
    |
    | Teacher → class_subjects → classrooms
    |
    | classrooms does NOT contain teacher_id.
    |
    */

    private function getTeacherClassrooms($teacher)
    {
        return Classroom::whereHas('classSubjects', function ($query) use ($teacher) {
            $query->where(
                'teacher_id',
                $teacher->teacher_id
            );
        })
            ->where(
                'status',
                'active'
            );
    }

    public function index()
    {
        $teacher = $this->getTeacher();

        $schedules = Schedule::with([
            'classroom',
            'subject'
        ])
            ->where(
                'teacher_id',
                $teacher->teacher_id
            )
            ->orderBy('schedule_date')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Teacher's Classes
        |--------------------------------------------------------------------------
        */

        $classrooms = $this->getTeacherClassrooms($teacher)
            ->with('academicYear')
            ->orderBy('class_name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Teacher's Subjects
        |--------------------------------------------------------------------------
        */

        $subjects = Subject::where(
            'status',
            'active'
        )
            ->whereIn(
                'subject_id',
                function ($query) use ($teacher) {

                    $query->select('subject_id')
                        ->from('class_subjects')
                        ->where(
                            'teacher_id',
                            $teacher->teacher_id
                        );

                }
            )
            ->orderBy('subject_name')
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

        $totalSchedules = $schedules->count();

        $activeSchedules = $schedules
            ->where(
                'status',
                'active'
            )
            ->count();

        $inactiveSchedules = $schedules
            ->where(
                'status',
                'inactive'
            )
            ->count();

        $totalClasses = $schedules
            ->pluck('class_id')
            ->unique()
            ->count();

        return view(
            'teacher.academic.schedule.index',
            compact(
                'teacher',
                'schedules',
                'classrooms',
                'subjects',
                'academicYears',
                'totalSchedules',
                'activeSchedules',
                'inactiveSchedules',
                'totalClasses'
            )
        );
    }

    public function data()
    {
        $teacher = $this->getTeacher();

        $schedules = Schedule::with([
            'classroom',
            'classroom.academicYear',
            'subject'
        ])
            ->where(
                'teacher_id',
                $teacher->teacher_id
            )
            ->orderBy('schedule_date')
            ->get();

        $events = $schedules->map(function ($schedule) {

            return [
                'id' => $schedule->schedule_id,

                'title' =>
                    ($schedule->subject->subject_name ?? 'Subject')
                    . ' · '
                    . ($schedule->classroom->class_name ?? 'Class'),

                'start' =>
                    $schedule->schedule_date->format('Y-m-d'),

                'allDay' => true,

                'extendedProps' => [

                    'schedule_date' =>
                        $schedule->schedule_date->format('Y-m-d'),

                    'class_id' =>
                        $schedule->class_id,

                    'subject_id' =>
                        $schedule->subject_id,

                    'year_id' =>
                        $schedule->classroom?->year_id,

                    'academic_year' =>
                        $schedule->classroom?->academicYear?->year_name
                        ?? 'N/A',

                    'subject' =>
                        $schedule->subject?->subject_name
                        ?? 'N/A',

                    'classroom' =>
                        $schedule->classroom?->class_name
                        ?? 'N/A',

                    'comment' =>
                        $schedule->comment
                        ?? '',

                    'status' =>
                        $schedule->status,
                ],
            ];
        });

        return response()->json(
            $events->values()
        );
    }

    public function store(Request $request)
    {
        $teacher = $this->getTeacher();

        $validated = $request->validate([

            'class_id' => [
                'required',
                'exists:classrooms,class_id'
            ],

            'subject_id' => [
                'required',
                'exists:subjects,subject_id'
            ],

            'schedule_date' => [
                'required',
                'date'
            ],

            'comment' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'status' => [
                'required',
                'in:active,inactive'
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Verify Teacher Is Assigned To This Classroom
        |--------------------------------------------------------------------------
        */

        $classroom = $this->getTeacherClassrooms($teacher)
            ->where(
                'class_id',
                $validated['class_id']
            )
            ->first();

        if (!$classroom) {

            return response()->json([
                'success' => false,
                'message' =>
                    'You are not assigned to this classroom.'
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Verify Teacher Is Assigned To This Subject
        |--------------------------------------------------------------------------
        */

        $subjectExists = Subject::where(
            'subject_id',
            $validated['subject_id']
        )
            ->where(
                'status',
                'active'
            )
            ->whereHas('classSubjects', function ($query) use ($teacher, $classroom) {

                $query
                    ->where(
                        'teacher_id',
                        $teacher->teacher_id
                    )
                    ->where(
                        'class_id',
                        $classroom->class_id
                    );

            })
            ->exists();

        if (!$subjectExists) {

            return response()->json([
                'success' => false,
                'message' =>
                    'You are not assigned to this subject for this classroom.'
            ], 422);
        }

        $date = Carbon::parse(
            $validated['schedule_date']
        );

        $schedule = Schedule::create([

            'class_id' =>
                $classroom->class_id,

            'subject_id' =>
                $validated['subject_id'],

            'teacher_id' =>
                $teacher->teacher_id,

            'schedule_date' =>
                $date->format('Y-m-d'),

            'day_of_week' =>
                $date->format('l'),

            'start_time' =>
                null,

            'end_time' =>
                null,

            'comment' =>
                $validated['comment']
                ?? null,

            'status' =>
                $validated['status'],

        ]);

        return response()->json([
            'success' => true,
            'message' =>
                'Schedule created successfully.',
            'schedule_id' =>
                $schedule->schedule_id
        ]);
    }

    public function update(
        Request $request,
        string $id
    ) {
        $teacher = $this->getTeacher();

        $schedule = Schedule::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Verify Schedule Belongs To Teacher
        |--------------------------------------------------------------------------
        */

        if (
            $schedule->teacher_id !=
            $teacher->teacher_id
        ) {
            abort(403);
        }

        $validated = $request->validate([

            'class_id' => [
                'required',
                'exists:classrooms,class_id'
            ],

            'subject_id' => [
                'required',
                'exists:subjects,subject_id'
            ],

            'schedule_date' => [
                'required',
                'date'
            ],

            'comment' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'status' => [
                'required',
                'in:active,inactive'
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Verify Teacher Is Assigned To Classroom
        |--------------------------------------------------------------------------
        */

        $classroom = $this->getTeacherClassrooms($teacher)
            ->where(
                'class_id',
                $validated['class_id']
            )
            ->first();

        if (!$classroom) {

            return response()->json([
                'success' => false,
                'message' =>
                    'You are not assigned to this classroom.'
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Verify Teacher Is Assigned To Subject
        |--------------------------------------------------------------------------
        */

        $subjectExists = Subject::where(
            'subject_id',
            $validated['subject_id']
        )
            ->where(
                'status',
                'active'
            )
            ->whereHas('classSubjects', function ($query) use ($teacher, $classroom) {

                $query
                    ->where(
                        'teacher_id',
                        $teacher->teacher_id
                    )
                    ->where(
                        'class_id',
                        $classroom->class_id
                    );

            })
            ->exists();

        if (!$subjectExists) {

            return response()->json([
                'success' => false,
                'message' =>
                    'You are not assigned to this subject for this classroom.'
            ], 422);
        }

        $date = Carbon::parse(
            $validated['schedule_date']
        );

        $schedule->update([

            'class_id' =>
                $validated['class_id'],

            'subject_id' =>
                $validated['subject_id'],

            'schedule_date' =>
                $date->format('Y-m-d'),

            'day_of_week' =>
                $date->format('l'),

            'start_time' =>
                null,

            'end_time' =>
                null,

            'comment' =>
                $validated['comment']
                ?? null,

            'status' =>
                $validated['status'],

        ]);

        return response()->json([
            'success' => true,
            'message' =>
                'Schedule updated successfully.'
        ]);
    }

    public function destroy(string $id)
    {
        $teacher = $this->getTeacher();

        $schedule = Schedule::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Verify Schedule Belongs To Teacher
        |--------------------------------------------------------------------------
        */

        if (
            $schedule->teacher_id !=
            $teacher->teacher_id
        ) {
            abort(403);
        }

        $schedule->delete();

        return response()->json([
            'success' => true,
            'message' =>
                'Schedule deleted successfully.'
        ]);
    }
}