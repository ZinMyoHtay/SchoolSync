<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\StudentResultController;
use App\Http\Controllers\TeacherScheduleController;
use App\Http\Controllers\TeacherAnnouncementController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\TeacherClassController;
use App\Http\Controllers\TeacherProfileController;
use App\Http\Controllers\TeacherSubjectController;
use App\Http\Controllers\TeacherStudentController;
use App\Http\Controllers\TeacherAttendanceController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentSubjectController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentScheduleController;
use App\Http\Controllers\AnnouncementController;

Route::get('/', function () { return view('index'); });

Auth::routes(['register' => false]);

//Admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/active', [UserController::class, 'active'])->name('admin.users.active');
Route::get('/admin/users/inactive', [UserController::class, 'inactive'])->name('admin.users.inactive');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::patch('/admin/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('admin.users.toggle-status');
Route::get('/admin/staff', [StaffController::class, 'index'])->name('admin.staff.index');
Route::get('/admin/teachers', [TeacherController::class, 'index'])->name('admin.teachers.index');
Route::get('/admin/students', [StudentController::class, 'index'])->name('admin.students.index');
Route::get('/admin/departments', [DepartmentController::class, 'index'])->name('admin.departments.index');
Route::get('/admin/classes', [ClassroomController::class, 'index'])->name('admin.classes.index');
Route::get('/admin/enrollments', [EnrollmentController::class, 'index'])->name('admin.enrollments.index');
Route::get('/admin/attendance', [AttendanceController::class, 'index'])->name('admin.attendance.index');
Route::get('/admin/finance', [FinanceController::class, 'index'])->name('admin.finance.index');

//Departments
Route::get('/admin/departments/create', [DepartmentController::class, 'create'])->name('admin.departments.create');
Route::post('/admin/departments', [DepartmentController::class, 'store'])->name('admin.departments.store');
Route::get('/admin/departments/{id}', [DepartmentController::class, 'show'])->name('admin.departments.show');
Route::get('/admin/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('admin.departments.edit');
Route::put('/admin/departments/{id}', [DepartmentController::class, 'update'])->name('admin.departments.update');
Route::patch('/admin/departments/{id}/toggle-status', [DepartmentController::class, 'toggleStatus'])->name('admin.departments.toggle-status');

//Classes
Route::get('/admin/classes/create', [ClassroomController::class, 'create'])->name('admin.classes.create');
Route::post('/admin/classes', [ClassroomController::class, 'store'])->name('admin.classes.store');
Route::get('/admin/classes/{id}', [ClassroomController::class, 'show'])->name('admin.classes.show');
Route::get('/admin/classes/{id}/edit', [ClassroomController::class, 'edit'])->name('admin.classes.edit');
Route::put('/admin/classes/{id}', [ClassroomController::class, 'update'])->name('admin.classes.update');
Route::patch('/admin/classes/{id}/toggle-status', [ClassroomController::class, 'toggleStatus'])->name('admin.classes.toggle-status');

//Academic Year
Route::get('/admin/academic-years', [AcademicYearController::class, 'index'])->name('admin.academic-years.index');
Route::get('/admin/academic-years/create', [AcademicYearController::class, 'create'])->name('admin.academic-years.create');
Route::post('/admin/academic-years', [AcademicYearController::class, 'store'])->name('admin.academic-years.store');
Route::get('/admin/academic-years/{id}', [AcademicYearController::class, 'show'])->name('admin.academic-years.show');
Route::get('/admin/academic-years/{id}/edit', [AcademicYearController::class, 'edit'])->name('admin.academic-years.edit');
Route::put('/admin/academic-years/{id}', [AcademicYearController::class, 'update'])->name('admin.academic-years.update');
Route::patch('/admin/academic-years/{id}/toggle-status', [AcademicYearController::class, 'toggleStatus'])->name('admin.academic-years.toggle-status');

//Subjects
Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('admin.subjects.index');
Route::get('/admin/subjects/create', [SubjectController::class, 'create'])->name('admin.subjects.create');
Route::post('/admin/subjects', [SubjectController::class, 'store'])->name('admin.subjects.store');
Route::get('/admin/subjects/{id}', [SubjectController::class, 'show'])->name('admin.subjects.show');
Route::get('/admin/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('admin.subjects.edit');
Route::put('/admin/subjects/{id}', [SubjectController::class, 'update'])->name('admin.subjects.update');
Route::patch('/admin/subjects/{id}/toggle-status', [SubjectController::class, 'toggleStatus'])->name('admin.subjects.toggle-status');

//Enrollment
Route::get('/admin/enrollments/create', [EnrollmentController::class, 'create'])->name('admin.enrollments.create');
Route::post('/admin/enrollments', [EnrollmentController::class, 'store'])->name('admin.enrollments.store');
Route::get('/admin/enrollments/{id}', [EnrollmentController::class, 'show'])->name('admin.enrollments.show');
Route::get('/admin/enrollments/{id}/edit', [EnrollmentController::class, 'edit'])->name('admin.enrollments.edit');
Route::put('/admin/enrollments/{id}', [EnrollmentController::class, 'update'])->name('admin.enrollments.update');
Route::patch('/admin/enrollments/{id}/toggle-status', [EnrollmentController::class, 'toggleStatus'])->name('admin.enrollments.toggle-status');

//Attendance
Route::get('/admin/attendance', [AttendanceController::class, 'index'])->name('admin.attendance.index');
Route::get('/admin/attendance/{id}', [AttendanceController::class, 'show'])->name('admin.attendance.show');

//Finance
Route::get('/admin/finance/create', [FinanceController::class, 'create'])->name('admin.finance.create');
Route::post('/admin/finance', [FinanceController::class, 'store'])->name('admin.finance.store');
Route::get('/admin/finance/{id}', [FinanceController::class, 'show'])->name('admin.finance.show');
Route::get('/admin/finance/{id}/edit', [FinanceController::class, 'edit'])->name('admin.finance.edit');
Route::put('/admin/finance/{id}', [FinanceController::class, 'update'])->name('admin.finance.update');
Route::delete('/admin/finance/{id}', [FinanceController::class, 'destroy'])->name('admin.finance.destroy');
Route::post('/admin/finance/fee-types', [FinanceController::class, 'storeFeeType'])->name('admin.finance.fee-types.store');
Route::put('/admin/finance/fee-types/{id}', [FinanceController::class, 'updateFeeType'])->name('admin.finance.fee-types.update');
Route::delete('/admin/finance/fee-types/{id}', [FinanceController::class, 'destroyFeeType'])->name('admin.finance.fee-types.destroy');
Route::post('/admin/finance/student-fees', [FinanceController::class, 'storeStudentFee'])->name('admin.finance.student-fees.store');
Route::get('/admin/finance/payments/{id}/edit', [FinanceController::class, 'editPayment'])->name('admin.finance.payments.edit');
Route::put('/admin/finance/payments/{id}', [FinanceController::class, 'updatePayment'])->name('admin.finance.payments.update');

//Staff
Route::get('/staff/dashboard', [StaffDashboardController::class, 'index'])->name('staff.dashboard');
Route::get('/staff/classes', [ClassroomController::class, 'index'])->name('staff.classes.index');
Route::get('/staff/subjects', [SubjectController::class, 'index'])->name('staff.subjects.index');
Route::get('/staff/attendance', [AttendanceController::class, 'index'])->name('staff.attendance.index');

//Teacher
Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
Route::get('/teacher/classes', [TeacherClassController::class, 'index'])->name('teacher.classes.index');
Route::get('/teacher/classes/{id}', [TeacherClassController::class, 'show'])->name('teacher.classes.show');
Route::get('/teacher/profile/edit', [TeacherProfileController::class, 'edit'])->name('teacher.profile.edit');
Route::put('/teacher/profile/update', [TeacherProfileController::class, 'update'])->name('teacher.profile.update');
Route::get('/teacher/subjects', [TeacherSubjectController::class, 'index'])->name('teacher.subjects.index');
Route::get('/teacher/subjects/{id}', [TeacherSubjectController::class, 'show'])->name('teacher.subjects.show');
Route::get('/teacher/students', [TeacherStudentController::class, 'index'])->name('teacher.students.index');
Route::get('/teacher/students/{id}', [TeacherStudentController::class, 'show'])->name('teacher.students.show');
Route::get('/teacher/attendance', [TeacherAttendanceController::class, 'index'])->name('teacher.attendance.index');
Route::get('/teacher/attendance/create', [TeacherAttendanceController::class, 'create'])->name('teacher.attendance.create');
Route::post('/teacher/attendance', [TeacherAttendanceController::class, 'store'])->name('teacher.attendance.store');
Route::get('/teacher/attendance/{id}', [TeacherAttendanceController::class, 'show'])->name('teacher.attendance.show');
Route::get('/teacher/attendance/{id}/edit', [TeacherAttendanceController::class, 'edit'])->name('teacher.attendance.edit');
Route::put('/teacher/attendance/{id}', [TeacherAttendanceController::class, 'update'])->name('teacher.attendance.update');
Route::delete('/teacher/attendance/{id}', [TeacherAttendanceController::class, 'destroy'])->name('teacher.attendance.destroy');
Route::get('/teacher/schedule', [TeacherScheduleController::class, 'index'])->name('teacher.schedule.index');
Route::get('/teacher/schedule/data', [TeacherScheduleController::class, 'data'])->name('teacher.schedule.data');
Route::post('/teacher/schedule', [TeacherScheduleController::class, 'store'])->name('teacher.schedule.store');
Route::put('/teacher/schedule/{id}', [TeacherScheduleController::class, 'update'])->name('teacher.schedule.update');
Route::delete('/teacher/schedule/{id}', [TeacherScheduleController::class, 'destroy'])->name('teacher.schedule.destroy');
Route::get('/teacher/announcements', [TeacherAnnouncementController::class, 'index'])->name('teacher.announcements.index');

//Student
Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
Route::get('/student/profile/edit', [StudentProfileController::class, 'edit'])->name('student.profile.edit');
Route::put('/student/profile/update', [StudentProfileController::class, 'update'])->name('student.profile.update');
Route::get('/student/classes', [ClassroomController::class, 'index'])->name('student.classes.index');
Route::get('/student/subjects', [SubjectController::class, 'index'])->name('student.subjects.index');
Route::get('/student/attendance', [AttendanceController::class, 'index'])->name('student.attendance.index');
Route::get('/student/results', [StudentResultController::class, 'index'])->name('student.results.index');
Route::get('/student/schedule', [TeacherScheduleController::class, 'index'])->name('student.schedule.index');
Route::get('/student/finance', [FinanceController::class, 'index'])->name('student.finance.index');
Route::get('/student/announcements', [TeacherAnnouncementController::class, 'index'])->name('student.announcements.index');
Route::get('/student/classes', [StudentClassController::class, 'index'])->name('student.classes.index');
Route::get('/student/subjects', [StudentSubjectController::class, 'index'])->name('student.subjects.index');
Route::get('/student/attendance', [StudentAttendanceController::class, 'index'])->name('student.attendance.index');
Route::get('/student/schedule', [StudentScheduleController::class, 'index'])->name('student.schedule.index');
Route::get('/student/finance', [FinanceController::class, 'index'])->name('student.finance.index');

// Announcements

// Admin
Route::get('/admin/announcements', [AnnouncementController::class, 'index'])->name('admin.announcements.index');
Route::get('/admin/announcements/create', [AnnouncementController::class, 'create'])->name('admin.announcements.create');
Route::post('/admin/announcements', [AnnouncementController::class, 'store'])->name('admin.announcements.store');
Route::get('/admin/announcements/{id}', [AnnouncementController::class, 'show'])->name('admin.announcements.show');
Route::get('/admin/announcements/{id}/edit', [AnnouncementController::class, 'edit'])->name('admin.announcements.edit');
Route::put('/admin/announcements/{id}', [AnnouncementController::class, 'update'])->name('admin.announcements.update');
Route::delete('/admin/announcements/{id}', [AnnouncementController::class, 'destroy'])->name('admin.announcements.destroy');

// Teacher
Route::get('/teacher/announcements', [TeacherAnnouncementController::class, 'index'])->name('teacher.announcements.index');
Route::get('/teacher/announcements/{id}', [TeacherAnnouncementController::class, 'show'])->name('teacher.announcements.show');

// Student
Route::get('/student/announcements', [TeacherAnnouncementController::class, 'index'])->name('student.announcements.index');
Route::get('/student/announcements/{id}', [TeacherAnnouncementController::class, 'show'])->name('student.announcements.show');

// Student Schedule

Route::get('/student/schedule', [StudentScheduleController::class, 'index'])
    ->name('student.schedule.index');

Route::get('/student/schedule/data', [StudentScheduleController::class, 'data'])
    ->name('student.schedule.data');