<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Enrollment;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    private function getAuthenticatedTeacher(): Teacher
    {
        return Teacher::whereHas('staff', function ($query) {
            $query->where('user_id', Auth::id());
        })->firstOrFail();
    }

    private function calculateAttendance($enrollment)
    {
        $records = $enrollment->attendances;
        $total = $records->count();

        $present = $records->filter(
            fn ($record) => strtolower($record->status) === 'present'
        )->count();

        $late = $records->filter(
            fn ($record) => strtolower($record->status) === 'late'
        )->count();

        $absent = $records->filter(
            fn ($record) => strtolower($record->status) === 'absent'
        )->count();

        $score = $records->sum(function ($record) {
            return match (strtolower($record->status)) {
                'present' => 1.00,
                'late' => 0.75,
                default => 0.00,
            };
        });

        $percentage = $total > 0
            ? round(($score / $total) * 100, 2)
            : 0;

        $grade = match (true) {
            $percentage >= 90 => 'A',
            $percentage >= 80 => 'B',
            $percentage >= 70 => 'C',
            default => 'D',
        };

        $enrollment->attendance_days = $total;
        $enrollment->attendance_present = $present;
        $enrollment->attendance_late = $late;
        $enrollment->attendance_absent = $absent;
        $enrollment->attendance_percentage = $percentage;
        $enrollment->attendance_grade = $grade;

        return $enrollment;
    }

    private function gradeForStatus(string $status): string
    {
        return match (strtolower($status)) {
            'present' => 'A',
            'late' => 'C',
            'absent' => 'D',
            default => 'D',
        };
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $query = Enrollment::with([
                'student',
                'classroom',
                'attendances',
            ])->where('status', 'active');

            if ($request->filled('search')) {
                $search = $request->search;

                $query->whereHas('student', function ($studentQuery) use ($search) {
                    $studentQuery->where(function ($q) use ($search) {
                        $q->where('full_name', 'like', "%{$search}%")
                            ->orWhere('student_code', 'like', "%{$search}%");
                    });
                });
            }

            if ($request->filled('class_id')) {
                $query->where('class_id', $request->class_id);
            }

            if ($request->filled('date')) {
                $query->whereHas('attendances', function ($q) use ($request) {
                    $q->whereDate('attendance_date', $request->date);
                });
            }

            if ($request->filled('status')) {
                $status = strtolower($request->status);

                $query->whereHas('attendances', function ($q) use ($status) {
                    $q->whereRaw('LOWER(status) = ?', [$status]);
                });
            }

            if ($request->period === 'monthly') {
                $query->whereHas('attendances', function ($q) {
                    $q->whereMonth('attendance_date', now()->month)
                        ->whereYear('attendance_date', now()->year);
                });
            } elseif ($request->period === 'first_half') {
                $query->whereHas('attendances', function ($q) {
                    $q->whereYear('attendance_date', now()->year)
                        ->whereMonth('attendance_date', '<=', 6);
                });
            } elseif ($request->period === 'second_half') {
                $query->whereHas('attendances', function ($q) {
                    $q->whereYear('attendance_date', now()->year)
                        ->whereMonth('attendance_date', '>=', 7);
                });
            }

            $enrollments = $query->orderByDesc('enrollment_id')->get();

            $students = $enrollments->map(function ($enrollment) use ($request) {
                $records = $enrollment->attendances;

                if ($request->filled('date')) {
                    $records = $records->filter(
                        fn ($record) => $record->attendance_date->format('Y-m-d')
                            === $request->date
                    );
                } elseif ($request->period === 'monthly') {
                    $records = $records->filter(
                        fn ($record) => $record->attendance_date->month === now()->month
                            && $record->attendance_date->year === now()->year
                    );
                } elseif ($request->period === 'first_half') {
                    $records = $records->filter(
                        fn ($record) => $record->attendance_date->year === now()->year
                            && $record->attendance_date->month <= 6
                    );
                } elseif ($request->period === 'second_half') {
                    $records = $records->filter(
                        fn ($record) => $record->attendance_date->year === now()->year
                            && $record->attendance_date->month >= 7
                    );
                }

                $total = $records->count();

                $score = $records->sum(function ($record) {
                    return match (strtolower($record->status)) {
                        'present' => 1.00,
                        'late' => 0.75,
                        default => 0.00,
                    };
                });

                $percentage = $total > 0
                    ? round(($score / $total) * 100, 2)
                    : 0;

                $student = $enrollment->student;

                $student->enrollment_id = $enrollment->enrollment_id;
                $student->classroom = $enrollment->classroom;
                $student->attendance_days = $total;
                $student->attendance_present = $records->filter(
                    fn ($r) => strtolower($r->status) === 'present'
                )->count();
                $student->attendance_late = $records->filter(
                    fn ($r) => strtolower($r->status) === 'late'
                )->count();
                $student->attendance_absent = $records->filter(
                    fn ($r) => strtolower($r->status) === 'absent'
                )->count();
                $student->attendance_percentage = $percentage;
                $student->attendance_grade = match (true) {
                    $percentage >= 90 => 'A',
                    $percentage >= 80 => 'B',
                    $percentage >= 70 => 'C',
                    default => 'D',
                };

                return $student;
            });

            return view('admin.academic.attendance.index', compact('students'));
        }

        if ($user->role === 'teacher') {
            $teacher = $this->getAuthenticatedTeacher();

            $classrooms = $teacher->classrooms()
                ->with('academicYear')
                ->where('classrooms.status', 'active')
                ->orderBy('class_name')
                ->get();

            $classIds = $classrooms->pluck('class_id');

            $query = Enrollment::with([
                'student',
                'classroom',
                'attendances',
            ])->where('status', 'active')
                ->whereIn('class_id', $classIds);

            if ($request->filled('class_id')) {
                abort_unless(
                    $classIds->contains((int) $request->class_id),
                    404
                );

                $query->where('class_id', $request->class_id);
            }

            $students = $query->orderBy('class_id')
                ->orderBy('enrollment_id')
                ->get();

            foreach ($students as $enrollment) {
                $this->calculateAttendance($enrollment);
            }

            return view(
                'teacher.teaching.attendance.index',
                compact('teacher', 'classrooms', 'students')
            );
        }

        if ($user->role === 'student') {
            return view('student.school.attendance.index', compact('user'));
        }

        abort(403);
    }

    public function create(Request $request)
    {
        if (Auth::user()->role !== 'teacher') {
            abort(403);
        }

        $teacher = $this->getAuthenticatedTeacher();

        $classrooms = $teacher->classrooms()
            ->with('academicYear')
            ->where('classrooms.status', 'active')
            ->orderBy('class_name')
            ->get();

        $selectedClass = null;
        $enrollments = collect();
        $date = $request->input('attendance_date', now()->toDateString());

        if ($request->filled('class_id')) {
            abort_unless(
                $classrooms->contains('class_id', (int) $request->class_id),
                404
            );

            $selectedClass = $classrooms->firstWhere(
                'class_id',
                (int) $request->class_id
            );

            $enrollments = $selectedClass->enrollments()
                ->where('status', 'active')
                ->with([
                    'student',
                    'attendances' => function ($query) use ($date) {
                        $query->whereDate('attendance_date', $date);
                    },
                ])
                ->orderBy('enrollment_id')
                ->get();
        }

        return view(
            'teacher.teaching.attendance.create',
            compact('teacher', 'classrooms', 'selectedClass', 'enrollments', 'date')
        );
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'teacher') {
            abort(403);
        }

        $teacher = $this->getAuthenticatedTeacher();

        $validated = $request->validate([
            'class_id' => ['required', 'integer'],
            'attendance_date' => ['required', 'date'],
            'attendance' => ['required', 'array'],
            'attendance.*' => ['required', 'in:Present,Late,Absent'],
        ]);

        $classroom = $teacher->classrooms()
            ->where('classrooms.status', 'active')
            ->findOrFail($validated['class_id']);

        $enrollments = $classroom->enrollments()
            ->where('status', 'active')
            ->get();

        DB::transaction(function () use ($enrollments, $validated) {
            foreach ($enrollments as $enrollment) {
                $enrollmentId = $enrollment->enrollment_id;

                if (!array_key_exists($enrollmentId, $validated['attendance'])) {
                    continue;
                }

                $status = $validated['attendance'][$enrollmentId];

                Attendance::updateOrCreate(
                    [
                        'enrollment_id' => $enrollmentId,
                        'attendance_date' => $validated['attendance_date'],
                    ],
                    [
                        'status' => $status,
                        'attendance_grade' => $this->gradeForStatus($status),
                    ]
                );
            }
        });

        return redirect()
            ->route('teacher.attendance.index')
            ->with('success', 'Attendance saved successfully.');
    }

    public function show($id)
    {
        $user = Auth::user();

        $enrollment = Enrollment::with([
            'student',
            'classroom',
            'attendances',
        ])->findOrFail($id);

        if ($user->role === 'teacher') {
            $teacher = $this->getAuthenticatedTeacher();

            $teacher->classrooms()->findOrFail($enrollment->class_id);

            $this->calculateAttendance($enrollment);

            return view(
                'teacher.teaching.attendance.show',
                compact('teacher', 'enrollment')
            );
        }

        if ($user->role === 'admin') {
            $records = $enrollment->attendances
                ->sortByDesc('attendance_date')
                ->values();

            $totalDays = $records->count();
            $present = $records->filter(
                fn ($r) => strtolower($r->status) === 'present'
            )->count();
            $late = $records->filter(
                fn ($r) => strtolower($r->status) === 'late'
            )->count();
            $absent = $records->filter(
                fn ($r) => strtolower($r->status) === 'absent'
            )->count();

            $score = $records->sum(function ($record) {
                return match (strtolower($record->status)) {
                    'present' => 1.00,
                    'late' => 0.75,
                    default => 0.00,
                };
            });

            $attendancePercentage = $totalDays > 0
                ? round(($score / $totalDays) * 100, 2)
                : 0;

            $attendanceGrade = match (true) {
                $attendancePercentage >= 90 => 'A',
                $attendancePercentage >= 80 => 'B',
                $attendancePercentage >= 70 => 'C',
                default => 'D',
            };

            return view(
                'admin.academic.attendance.show',
                compact(
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

        abort(403);
    }

    public function edit($id)
    {
        if (Auth::user()->role !== 'teacher') {
            abort(403);
        }

        $teacher = $this->getAuthenticatedTeacher();

        $attendance = Attendance::with([
            'enrollment.student',
            'enrollment.classroom',
        ])->findOrFail($id);

        $teacher->classrooms()->findOrFail(
            $attendance->enrollment->class_id
        );

        return view(
            'teacher.teaching.attendance.edit',
            compact('teacher', 'attendance')
        );
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'teacher') {
            abort(403);
        }

        $teacher = $this->getAuthenticatedTeacher();

        $validated = $request->validate([
            'attendance_date' => ['required', 'date'],
            'status' => ['required', 'in:Present,Late,Absent'],
        ]);

        $attendance = Attendance::with('enrollment')->findOrFail($id);

        $teacher->classrooms()->findOrFail(
            $attendance->enrollment->class_id
        );

        $duplicate = Attendance::where(
            'enrollment_id',
            $attendance->enrollment_id
        )->where(
            'attendance_date',
            $validated['attendance_date']
        )->where(
            'attendance_id',
            '!=',
            $attendance->attendance_id
        )->exists();

        if ($duplicate) {
            return back()
                ->withErrors([
                    'attendance_date' =>
                        'Attendance already exists for this student on this date.',
                ])
                ->withInput();
        }

        $attendance->update([
            'attendance_date' => $validated['attendance_date'],
            'status' => $validated['status'],
            'attendance_grade' => $this->gradeForStatus($validated['status']),
        ]);

        return redirect()
            ->route('teacher.attendance.index')
            ->with('success', 'Attendance updated successfully.');
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'teacher') {
            abort(403);
        }

        $teacher = $this->getAuthenticatedTeacher();

        $attendance = Attendance::with('enrollment')->findOrFail($id);

        $teacher->classrooms()->findOrFail(
            $attendance->enrollment->class_id
        );

        $attendance->delete();

        return redirect()
            ->route('teacher.attendance.index')
            ->with('success', 'Attendance deleted successfully.');
    }
}
