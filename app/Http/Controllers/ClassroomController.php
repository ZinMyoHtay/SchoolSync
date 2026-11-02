<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\ClassSubject;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ClassroomController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $role = Auth::user()->role;

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        if ($role === 'admin') {

            $query = Classroom::with([
                'academicYear',
                'enrollments',
                'classSubjects.subject',
                'classSubjects.teacher.staff',
            ]);

            /*
            | Search
            */

            if ($request->filled('search')) {

                $search = $request->search;

                $query->where(
                    'class_name',
                    'like',
                    '%' . $search . '%'
                );
            }

            /*
            | Academic Year Filter
            */

            if ($request->filled('year_id')) {

                $query->where(
                    'year_id',
                    $request->year_id
                );
            }

            /*
            | Status Filter
            */

            if ($request->filled('status')) {

                $query->where(
                    'status',
                    $request->status
                );
            }

            $classrooms = $query
                ->orderBy(
                    'class_id',
                    'desc'
                )
                ->get();

            $academicYears = AcademicYear::orderBy(
                'academic_year_id',
                'desc'
            )->get();

            return view(
                'admin.academic.classes.index',
                compact(
                    'classrooms',
                    'academicYears'
                )
            );
        }

        /*
        |--------------------------------------------------------------------------
        | TEACHER
        |--------------------------------------------------------------------------
        */

        if ($role === 'teacher') {

            return view(
                'teacher.teaching.classes.index'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | STUDENT
        |--------------------------------------------------------------------------
        */

        if ($role === 'student') {

            return view(
                'student.school.classes.index'
            );
        }

        abort(403);
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        /*
        | Academic Years
        */

        $academicYears = AcademicYear::orderBy(
            'academic_year_id',
            'desc'
        )->get();

        /*
        | Teachers
        */

        $teachers = Teacher::with('staff')
            ->orderBy(
                'teacher_id',
                'desc'
            )
            ->get();

        /*
        | Active Subjects
        */

        $subjects = Subject::where(
            'status',
            'active'
        )
            ->orderBy(
                'subject_name'
            )
            ->get();

        return view(
            'admin.academic.classes.create',
            compact(
                'academicYears',
                'teachers',
                'subjects'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        $validated = $request->validate([

            /*
            | Academic Year
            */

            'year_id' => [
                'required',
                'exists:academic_years,academic_year_id',
            ],

            /*
            | Class Name
            */

            'class_name' => [
                'required',
                'string',
                'max:255',

                Rule::unique(
                    'classrooms',
                    'class_name'
                )->where(function ($query) use ($request) {

                    return $query->where(
                        'year_id',
                        $request->year_id
                    );
                }),
            ],

            /*
            | Subject + Teacher Assignments
            */

            'assignments' => [
                'required',
                'array',
                'min:1',
            ],

            /*
            | Subject
            */

            'assignments.*.subject_id' => [
                'required',
                'exists:subjects,subject_id',
            ],

            /*
            | Teacher
            */

            'assignments.*.teacher_id' => [
                'required',
                'exists:teachers,teacher_id',
            ],

            /*
            | Start Date
            */

            'assignments.*.start_date' => [
                'required',
                'date',
            ],

            /*
            | End Date
            */

            'assignments.*.end_date' => [
                'required',
                'date',
                'after_or_equal:assignments.*.start_date',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create Classroom
        |--------------------------------------------------------------------------
        */

        $classroom = Classroom::create([
            'year_id' => $validated['year_id'],
            'class_name' => $validated['class_name'],
            'status' => 'active',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create Subject + Teacher + Date Assignments
        |--------------------------------------------------------------------------
        */

        foreach (
            $validated['assignments']
            as $assignment
        ) {

            ClassSubject::create([

                'class_id' =>
                    $classroom->class_id,

                'subject_id' =>
                    $assignment['subject_id'],

                'teacher_id' =>
                    $assignment['teacher_id'],

                'start_date' =>
                    $assignment['start_date'],

                'end_date' =>
                    $assignment['end_date'],
            ]);
        }

        return redirect()
            ->route('admin.classes.index')
            ->with(
                'success',
                'Class created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(string $id)
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        $classroom = Classroom::with([
            'academicYear',
            'enrollments',
            'classSubjects.subject',
            'classSubjects.teacher.staff',
        ])->findOrFail($id);

        return view(
            'admin.academic.classes.show',
            compact('classroom')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(string $id)
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        /*
        | Load classroom and assignments
        */

        $classroom = Classroom::with([
            'classSubjects.subject',
            'classSubjects.teacher.staff',
        ])->findOrFail($id);

        /*
        | Academic Years
        */

        $academicYears = AcademicYear::orderBy(
            'academic_year_id',
            'desc'
        )->get();

        /*
        | Teachers
        */

        $teachers = Teacher::with('staff')
            ->orderBy(
                'teacher_id',
                'desc'
            )
            ->get();

        /*
        | Active Subjects
        */

        $subjects = Subject::where(
            'status',
            'active'
        )
            ->orderBy(
                'subject_name'
            )
            ->get();

        return view(
            'admin.academic.classes.edit',
            compact(
                'classroom',
                'academicYears',
                'teachers',
                'subjects'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        string $id
    ) {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        $classroom = Classroom::findOrFail($id);

        $validated = $request->validate([

            /*
            | Academic Year
            */

            'year_id' => [
                'required',
                'exists:academic_years,academic_year_id',
            ],

            /*
            | Class Name
            */

            'class_name' => [
                'required',
                'string',
                'max:255',

                Rule::unique(
                    'classrooms',
                    'class_name'
                )
                    ->where(function ($query) use ($request) {

                        return $query->where(
                            'year_id',
                            $request->year_id
                        );
                    })
                    ->ignore(
                        $classroom->class_id,
                        'class_id'
                    ),
            ],

            /*
            | Assignments
            */

            'assignments' => [
                'required',
                'array',
                'min:1',
            ],

            /*
            | Subject
            */

            'assignments.*.subject_id' => [
                'required',
                'exists:subjects,subject_id',
            ],

            /*
            | Teacher
            */

            'assignments.*.teacher_id' => [
                'required',
                'exists:teachers,teacher_id',
            ],

            /*
            | Start Date
            */

            'assignments.*.start_date' => [
                'required',
                'date',
            ],

            /*
            | End Date
            */

            'assignments.*.end_date' => [
                'required',
                'date',
                'after_or_equal:assignments.*.start_date',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Classroom
        |--------------------------------------------------------------------------
        */

        $classroom->update([
            'year_id' =>
                $validated['year_id'],

            'class_name' =>
                $validated['class_name'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Delete Existing Assignments
        |--------------------------------------------------------------------------
        */

        ClassSubject::where(
            'class_id',
            $classroom->class_id
        )->delete();

        /*
        |--------------------------------------------------------------------------
        | Create New Assignments
        |--------------------------------------------------------------------------
        */

        foreach (
            $validated['assignments']
            as $assignment
        ) {

            ClassSubject::create([

                'class_id' =>
                    $classroom->class_id,

                'subject_id' =>
                    $assignment['subject_id'],

                'teacher_id' =>
                    $assignment['teacher_id'],

                'start_date' =>
                    $assignment['start_date'],

                'end_date' =>
                    $assignment['end_date'],
            ]);
        }

        return redirect()
            ->route('admin.classes.index')
            ->with(
                'success',
                'Class updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | TOGGLE STATUS
    |--------------------------------------------------------------------------
    */

    public function toggleStatus(string $id)
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        $classroom = Classroom::findOrFail($id);

        if (
            $classroom->status === 'active'
        ) {

            $classroom->update([
                'status' => 'inactive',
            ]);

            $message =
                'Class deactivated successfully.';

        } else {

            $classroom->update([
                'status' => 'active',
            ]);

            $message =
                'Class activated successfully.';
        }

        return redirect()
            ->route('admin.classes.index')
            ->with(
                'success',
                $message
            );
    }
}
