<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Staff;
use App\Models\Classroom;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();

        $totalTeachers = Teacher::count();

        $totalStaff = Staff::count();

        $activeClasses = Classroom::count();

        $todayAttendance = Attendance::whereDate(
            'attendance_date',
            today()
        )->get();

        $totalAttendance = $todayAttendance->count();

        $presentCount = $todayAttendance
            ->filter(function ($attendance) {
                return strtolower($attendance->status) === 'present';
            })
            ->count();

        $absentCount = $todayAttendance
            ->filter(function ($attendance) {
                return strtolower($attendance->status) === 'absent';
            })
            ->count();

        $lateCount = $todayAttendance
            ->filter(function ($attendance) {
                return strtolower($attendance->status) === 'late';
            })
            ->count();

        $attendancePercentage = $totalAttendance > 0
            ? round(($presentCount / $totalAttendance) * 100, 1)
            : 0;

        $recentStudents = Student::with('user')
            ->orderByDesc('student_id')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'totalStaff',
            'activeClasses',
            'attendancePercentage',
            'presentCount',
            'absentCount',
            'lateCount',
            'recentStudents'
        ));
    }
}