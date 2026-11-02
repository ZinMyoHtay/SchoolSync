<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAttendanceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Get Authenticated Teacher
    |--------------------------------------------------------------------------
    */

    private function getAuthenticatedTeacher()
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

        return $teacher;
    }


    /*
    |--------------------------------------------------------------------------
    | Get Teacher's Classes
    |--------------------------------------------------------------------------
    |
    | Teachers are assigned to classrooms through class_subjects.
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


    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    | Shows attendance records only for classes assigned to this teacher.
    */

    public function index(Request $request)
    {
        $user = Auth::user();

        $teacher = $this->getAuthenticatedTeacher();


        /*
        |--------------------------------------------------------------------------
        | Get Teacher's Classes
        |--------------------------------------------------------------------------
        */

        $classrooms = $this->getTeacherClassrooms($teacher)
            ->with('academicYear')
            ->orderBy('class_name')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Attendance Enrollments
        |--------------------------------------------------------------------------
        */

        $query = Enrollment::with([
            'student.user',
            'classroom.academicYear',
            'attendances',
        ])
            ->where(
                'status',
                'active'
            )
            ->whereHas('classroom', function ($query) use ($teacher) {

                $query
                    ->where(
                        'status',
                        'active'
                    )
                    ->whereHas('classSubjects', function ($query) use ($teacher) {

                        $query->where(
                            'teacher_id',
                            $teacher->teacher_id
                        );

                    });

            });


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->whereHas('student', function ($query) use ($search) {

                $query
                    ->where(
                        'full_name',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhere(
                        'student_code',
                        'like',
                        '%' . $search . '%'
                    );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Filter By Date
        |--------------------------------------------------------------------------
        */

        if ($request->filled('date')) {

            $date = $request->date;

            $query->whereHas('attendances', function ($query) use ($date) {

                $query->whereDate(
                    'attendance_date',
                    $date
                );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Filter By Status
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $status = $request->status;

            $query->whereHas('attendances', function ($query) use ($status) {

                $query->where(
                    'status',
                    $status
                );

            });
        }


        $enrollments = $query
            ->orderBy(
                'enrollment_id',
                'desc'
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Calculate Attendance
        |--------------------------------------------------------------------------
        */

        $students = $enrollments->map(
            function ($enrollment) use ($request) {

                $attendances = $enrollment->attendances;


                /*
                |--------------------------------------------------------------------------
                | Date Filter
                |--------------------------------------------------------------------------
                */

                if ($request->filled('date')) {

                    $attendances = $attendances->filter(
                        function ($attendance) use ($request) {

                            return $attendance->attendance_date
                                && \Carbon\Carbon::parse(
                                    $attendance->attendance_date
                                )->isSameDay(
                                    \Carbon\Carbon::parse(
                                        $request->date
                                    )
                                );

                        }
                    );
                }


                $attendanceDays =
                    $attendances->count();


                $present =
                    $attendances
                        ->where(
                            'status',
                            'Present'
                        )
                        ->count();


                $late =
                    $attendances
                        ->where(
                            'status',
                            'Late'
                        )
                        ->count();


                $absent =
                    $attendances
                        ->where(
                            'status',
                            'Absent'
                        )
                        ->count();


                /*
                |--------------------------------------------------------------------------
                | Weighted Score
                |--------------------------------------------------------------------------
                */

                $score = 0;


                foreach ($attendances as $attendance) {

                    if (
                        $attendance->status === 'Present'
                    ) {

                        $score += 1.00;

                    } elseif (
                        $attendance->status === 'Late'
                    ) {

                        $score += 0.75;

                    } elseif (
                        $attendance->status === 'Absent'
                    ) {

                        $score += 0.00;
                    }
                }


                $percentage =
                    $attendanceDays > 0
                        ? (
                            $score /
                            $attendanceDays
                        ) * 100
                        : 0;


                /*
                |--------------------------------------------------------------------------
                | Grade
                |--------------------------------------------------------------------------
                */

                if ($percentage >= 90) {

                    $grade = 'A';

                } elseif ($percentage >= 80) {

                    $grade = 'B';

                } elseif ($percentage >= 70) {

                    $grade = 'C';

                } else {

                    $grade = 'D';
                }


                /*
                |--------------------------------------------------------------------------
                | Add Calculated Values
                |--------------------------------------------------------------------------
                */

                $enrollment->attendance_days =
                    $attendanceDays;

                $enrollment->attendance_present =
                    $present;

                $enrollment->attendance_late =
                    $late;

                $enrollment->attendance_absent =
                    $absent;

                $enrollment->attendance_percentage =
                    round(
                        $percentage,
                        2
                    );

                $enrollment->attendance_grade =
                    $grade;


                return $enrollment;
            }
        );


        return view(
            'teacher.teaching.attendance.index',
            compact(
                'user',
                'teacher',
                'students',
                'classrooms'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    | Teacher selects:
    | 1. Class
    | 2. Date
    | 3. Students
    */

    public function create(Request $request)
    {
        $user = Auth::user();

        $teacher = $this->getAuthenticatedTeacher();


        /*
        |--------------------------------------------------------------------------
        | Get Only This Teacher's Classes
        |--------------------------------------------------------------------------
        */

        $classrooms = $this->getTeacherClassrooms($teacher)
            ->with('academicYear')
            ->orderBy('class_name')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Default Date
        |--------------------------------------------------------------------------
        */

        $date = $request->input(
            'attendance_date',
            now()->format('Y-m-d')
        );


        /*
        |--------------------------------------------------------------------------
        | Selected Class
        |--------------------------------------------------------------------------
        */

        $selectedClass = null;


        /*
        |--------------------------------------------------------------------------
        | Students
        |--------------------------------------------------------------------------
        */

        $enrollments = collect();


        /*
        |--------------------------------------------------------------------------
        | If Teacher Selected A Class
        |--------------------------------------------------------------------------
        */

        if ($request->filled('class_id')) {

            /*
            |--------------------------------------------------------------------------
            | Verify Class Belongs To Teacher
            |--------------------------------------------------------------------------
            */

            $selectedClass = $this->getTeacherClassrooms($teacher)
                ->with('academicYear')
                ->findOrFail(
                    $request->class_id
                );


            /*
            |--------------------------------------------------------------------------
            | Get Active Students
            |--------------------------------------------------------------------------
            */

            $enrollments = $selectedClass
                ->enrollments()
                ->where(
                    'status',
                    'active'
                )
                ->with([
                    'student.user',

                    'attendances' => function ($query) use ($date) {

                        $query->whereDate(
                            'attendance_date',
                            $date
                        );

                    },
                ])
                ->orderBy(
                    'enrollment_id'
                )
                ->get();
        }


        /*
        |--------------------------------------------------------------------------
        | Send Data To Blade
        |--------------------------------------------------------------------------
        */

        return view(
            'teacher.teaching.attendance.create',
            compact(
                'user',
                'teacher',
                'classrooms',
                'selectedClass',
                'enrollments',
                'date'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    | Saves attendance for the whole selected class.
    */

    public function store(Request $request)
    {
        $user = Auth::user();

        $teacher = $this->getAuthenticatedTeacher();


        /*
        |--------------------------------------------------------------------------
        | Validate
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'class_id' => [
                'required',
                'integer',
            ],

            'attendance_date' => [
                'required',
                'date',
            ],

            'attendance' => [
                'required',
                'array',
            ],

            'attendance.*' => [
                'required',
                'in:Present,Late,Absent',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Verify Class Belongs To Teacher
        |--------------------------------------------------------------------------
        */

        $classroom = $this->getTeacherClassrooms($teacher)
            ->findOrFail(
                $validated['class_id']
            );


        /*
        |--------------------------------------------------------------------------
        | Get Only Active Enrollments
        |--------------------------------------------------------------------------
        */

        $enrollments = $classroom
            ->enrollments()
            ->where(
                'status',
                'active'
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Save Each Student Attendance
        |--------------------------------------------------------------------------
        */

        foreach ($enrollments as $enrollment) {

            $enrollmentId =
                $enrollment->enrollment_id;


            /*
            |--------------------------------------------------------------------------
            | Make Sure Teacher Submitted This Student
            |--------------------------------------------------------------------------
            */

            if (
                !array_key_exists(
                    $enrollmentId,
                    $validated['attendance']
                )
            ) {
                continue;
            }


            $status =
                $validated['attendance'][
                    $enrollmentId
                ];


            /*
            |--------------------------------------------------------------------------
            | Save / Update Attendance
            |--------------------------------------------------------------------------
            */

            Attendance::updateOrCreate(
                [
                    'enrollment_id' =>
                        $enrollmentId,

                    'attendance_date' =>
                        $validated['attendance_date'],
                ],
                [
                    'status' =>
                        $status,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'teacher.attendance.index'
            )
            ->with(
                'success',
                'Attendance saved successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $user = Auth::user();

        $teacher = $this->getAuthenticatedTeacher();


        /*
        |--------------------------------------------------------------------------
        | Get Enrollment Only If It Belongs To Teacher
        |--------------------------------------------------------------------------
        */

        $enrollment = Enrollment::with([
            'student.user',
            'classroom.academicYear',
            'attendances',
        ])
            ->where(
                'enrollment_id',
                $id
            )
            ->whereHas('classroom', function ($query) use ($teacher) {

                $query
                    ->where(
                        'status',
                        'active'
                    )
                    ->whereHas('classSubjects', function ($query) use ($teacher) {

                        $query->where(
                            'teacher_id',
                            $teacher->teacher_id
                        );

                    });

            })
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Attendance Records
        |--------------------------------------------------------------------------
        */

        $records =
            $enrollment->attendances
                ->sortByDesc(
                    'attendance_date'
                )
                ->values();


        $totalDays =
            $records->count();


        $present =
            $records
                ->where(
                    'status',
                    'Present'
                )
                ->count();


        $late =
            $records
                ->where(
                    'status',
                    'Late'
                )
                ->count();


        $absent =
            $records
                ->where(
                    'status',
                    'Absent'
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | Weighted Score
        |--------------------------------------------------------------------------
        */

        $score = 0;


        foreach ($records as $record) {

            if (
                $record->status === 'Present'
            ) {

                $score += 1.00;

            } elseif (
                $record->status === 'Late'
            ) {

                $score += 0.75;

            } elseif (
                $record->status === 'Absent'
            ) {

                $score += 0.00;
            }
        }


        $percentage =
            $totalDays > 0
                ? (
                    $score /
                    $totalDays
                ) * 100
                : 0;


        $attendancePercentage =
            round(
                $percentage,
                2
            );


        /*
        |--------------------------------------------------------------------------
        | Grade
        |--------------------------------------------------------------------------
        */

        if ($percentage >= 90) {

            $attendanceGrade = 'A';

        } elseif ($percentage >= 80) {

            $attendanceGrade = 'B';

        } elseif ($percentage >= 70) {

            $attendanceGrade = 'C';

        } else {

            $attendanceGrade = 'D';
        }


        return view(
            'teacher.teaching.attendance.show',
            compact(
                'user',
                'teacher',
                'enrollment',
                'records',
                'totalDays',
                'present',
                'late',
                'absent',
                'attendancePercentage',
                'attendanceGrade'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $user = Auth::user();

        $teacher = $this->getAuthenticatedTeacher();


        /*
        |--------------------------------------------------------------------------
        | Get Attendance
        |--------------------------------------------------------------------------
        */

        $attendance = Attendance::with([
            'enrollment.student',
            'enrollment.classroom',
        ])
            ->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Verify Teacher Owns This Class
        |--------------------------------------------------------------------------
        */

        $hasAccess = $attendance->enrollment
            && $attendance->enrollment->classroom
            && Classroom::where(
                'class_id',
                $attendance->enrollment->class_id
            )
                ->where(
                    'status',
                    'active'
                )
                ->whereHas('classSubjects', function ($query) use ($teacher) {

                    $query->where(
                        'teacher_id',
                        $teacher->teacher_id
                    );

                })
                ->exists();

        if (!$hasAccess) {
            abort(403);
        }


        return view(
            'teacher.teaching.attendance.edit',
            compact(
                'user',
                'teacher',
                'attendance'
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
        $id
    ) {

        $user = Auth::user();

        $teacher = $this->getAuthenticatedTeacher();


        /*
        |--------------------------------------------------------------------------
        | Get Attendance
        |--------------------------------------------------------------------------
        */

        $attendance = Attendance::with(
            'enrollment.classroom'
        )
            ->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Verify Ownership
        |--------------------------------------------------------------------------
        */

        $hasAccess = $attendance->enrollment
            && $attendance->enrollment->classroom
            && Classroom::where(
                'class_id',
                $attendance->enrollment->class_id
            )
                ->where(
                    'status',
                    'active'
                )
                ->whereHas('classSubjects', function ($query) use ($teacher) {

                    $query->where(
                        'teacher_id',
                        $teacher->teacher_id
                    );

                })
                ->exists();

        if (!$hasAccess) {
            abort(403);
        }


        /*
        |--------------------------------------------------------------------------
        | Validate
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'attendance_date' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                'in:Present,Late,Absent',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $attendance->update([

            'attendance_date' =>
                $validated['attendance_date'],

            'status' =>
                $validated['status'],

        ]);


        return redirect()
            ->route(
                'teacher.attendance.show',
                $attendance
                    ->enrollment
                    ->enrollment_id
            )
            ->with(
                'success',
                'Attendance updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $user = Auth::user();

        $teacher = $this->getAuthenticatedTeacher();


        /*
        |--------------------------------------------------------------------------
        | Get Attendance
        |--------------------------------------------------------------------------
        */

        $attendance = Attendance::with(
            'enrollment.classroom'
        )
            ->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Verify Ownership
        |--------------------------------------------------------------------------
        */

        $hasAccess = $attendance->enrollment
            && $attendance->enrollment->classroom
            && Classroom::where(
                'class_id',
                $attendance->enrollment->class_id
            )
                ->where(
                    'status',
                    'active'
                )
                ->whereHas('classSubjects', function ($query) use ($teacher) {

                    $query->where(
                        'teacher_id',
                        $teacher->teacher_id
                    );

                })
                ->exists();

        if (!$hasAccess) {
            abort(403);
        }


        $enrollmentId =
            $attendance
                ->enrollment
                ->enrollment_id;


        /*
        |--------------------------------------------------------------------------
        | Delete
        |--------------------------------------------------------------------------
        */

        $attendance->delete();


        return redirect()
            ->route(
                'teacher.attendance.show',
                $enrollmentId
            )
            ->with(
                'success',
                'Attendance record deleted successfully.'
            );
    }
}