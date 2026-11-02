<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mark Attendance | SchoolSync</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>

        :root {
            --navy: #0b1f3a;
            --navy-2: #10294a;
            --blue: #1769e0;
            --blue-dark: #0d4fb8;
            --blue-light: #eef5ff;
            --yellow: #f7c948;

            --green: #18a66b;
            --red: #e55353;
            --orange: #ed9b2d;
            --purple: #7655d6;

            --bg: #f5f7fb;
            --white: #ffffff;
            --text: #172033;
            --muted: #738096;
            --border: #e7ebf2;

            --shadow: 0 8px 30px rgba(16, 35, 60, 0.06);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: "Inter", sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: var(--navy);
            color: white;
            padding: 22px 16px;
            z-index: 1000;
            overflow-y: auto;
            overflow-x: hidden;
            transition: 0.3s ease;
            scrollbar-width: thin;
            scrollbar-color: rgba(255,255,255,0.18) transparent;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.18);
            border-radius: 10px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px 25px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--white);
            border-radius: 12px;
            font-size: 20px;
        }
                .brand-icon img {
    width: 90%;
    height: 90%;
    object-fit: contain;
    display: block;
}

        .brand h4 {
            margin: 0;
            font-size: 20px;
            font-weight: 800;
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .brand small {
            display: block;
            color: #7f90aa;
            font-size: 10px;
            margin-top: 2px;
        }

        .menu-title {
            padding: 15px 12px 8px;
            color: #7f90aa;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            margin-bottom: 4px;
            border-radius: 10px;
            color: #b9c5d7;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s ease;
        }

        .menu-link i {
            width: 20px;
            font-size: 17px;
        }

        .menu-link:hover {
            color: white;
            background: rgba(255,255,255,0.07);
        }

        .menu-link.active {
            color: white;
            background: var(--blue);
            box-shadow: 0 7px 18px rgba(23,105,224,0.25);
        }

        .sidebar-footer {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .logout {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 11px 12px;
            border: none;
            background: transparent;
            color: #dc3545 !important;
            text-decoration: none !important;
            font-size: 13px;
            font-weight: 600;
            border-radius: 10px;
            transition: all .25s ease;
            text-align: left;
        }

        .logout i {
            font-size: 18px;
        }

        .logout:hover {
            background: rgba(128,128,128,.08);
            color: #808080 !important;
        }

        .logout:hover i {
            color: #808080 !important;
        }

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .mobile-menu {
            display: none;
            border: none;
            background: transparent;
            font-size: 24px;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
        }

        .search-box input {
            width: 300px;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px 15px 10px 40px;
            outline: none;
            font-size: 13px;
        }

        .search-box input:focus {
            border-color: var(--blue);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .icon-button {
            position: relative;
            width: 38px;
            height: 38px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            cursor: pointer;
        }

        .notification-dot {
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--red);
            top: 7px;
            right: 7px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
        }

        .profile-info strong {
            display: block;
            font-size: 13px;
        }

        .profile-info span {
            color: var(--muted);
            font-size: 11px;
        }

        .content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0;
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 26px;
            font-weight: 800;
        }

        .page-header p {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .back-button {
            height: 40px;
            background: white;
            color: var(--muted);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 0 16px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            transition: .2s ease;
        }

        .back-button:hover {
            background: var(--blue-light);
            border-color: #d6e5ff;
            color: var(--blue);
        }

        .attendance-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .attendance-card {
            width: 100%;
            max-width: 1000px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .attendance-header {
            padding-bottom: 18px;
            margin-bottom: 22px;
            border-bottom: 1px solid var(--border);
        }

        .attendance-header h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .attendance-header span {
            display: block;
            margin-top: 5px;
            color: var(--muted);
            font-size: 11px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .form-control,
        .form-select {
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 10px 12px;
            font-size: 12px;
            color: var(--text);
            box-shadow: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(23,105,224,.08);
        }

        .student-row {
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 14px 16px;
            margin-bottom: 10px;
            background: white;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .student-name {
            font-size: 12px;
            font-weight: 700;
        }

        .student-code {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
        }

        .status-options {
            display: flex;
            justify-content: flex-end;
            gap: 7px;
        }

        .status-option {
            position: relative;
        }

        .status-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .status-option label {
            min-width: 82px;
            padding: 9px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
            transition: .2s ease;
        }

        .status-option label:hover {
            background: #fafcff;
        }

        .status-option input:checked + label {
            border-color: var(--blue);
            background: var(--blue-light);
            color: var(--blue);
        }

        .status-present input:checked + label {
            border-color: var(--green);
            background: #eaf9f2;
            color: var(--green);
        }

        .status-late input:checked + label {
            border-color: var(--orange);
            background: #fff4e5;
            color: var(--orange);
        }

        .status-absent input:checked + label {
            border-color: var(--red);
            background: #fff0f0;
            color: var(--red);
        }

        .class-summary {
            background: var(--blue-light);
            border: 1px solid #dceaff;
            border-radius: 10px;
            padding: 13px 15px;
            margin-bottom: 20px;
        }

        .class-summary strong {
            font-size: 12px;
        }

        .class-summary span {
            color: var(--muted);
            font-size: 10px;
        }

        .empty-students {
            padding: 35px 20px;
            text-align: center;
            border: 1px dashed var(--border);
            border-radius: 10px;
            color: var(--muted);
        }

        .empty-students i {
            font-size: 28px;
            display: block;
            margin-bottom: 10px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .cancel-button {
            height: 40px;
            background: white;
            color: var(--muted);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 0 17px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .cancel-button:hover {
            background: #fafbfc;
            color: var(--text);
        }

        .save-button {
            height: 40px;
            background: var(--blue);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 0 17px;
            font-size: 12px;
            font-weight: 600;
        }

        .save-button:hover {
            background: var(--blue-dark);
        }

        .alert {
            max-width: 1000px;
            margin: 0 auto 20px;
            border-radius: 10px;
            font-size: 12px;
        }

        @media (max-width: 991px) {

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .mobile-menu {
                display: block;
            }

            .search-box input {
                width: 220px;
            }

            .student-row {
                padding: 14px;
            }

            .status-options {
                justify-content: flex-start;
                margin-top: 12px;
            }
        }

        @media (max-width: 767px) {

            .content {
                padding: 20px;
            }

            .topbar {
                padding: 0 20px;
            }

            .search-box {
                display: none;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .back-button {
                width: 100%;
            }

            .attendance-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .cancel-button,
            .save-button {
                width: 100%;
            }

            .status-options {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
            }

            .status-option label {
                min-width: 0;
                width: 100%;
            }
        }

        @media (max-width: 575px) {

            .profile-info {
                display: none;
            }

            .topbar-right {
                gap: 8px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .status-options {
                grid-template-columns: 1fr;
            }
        }

    </style>

</head>

<body>

@php

    $teacherName = $user->name ?? 'Teacher';

    $nameParts = explode(' ', trim($teacherName));

    $initials = '';

    foreach ($nameParts as $part) {

        if ($part !== '') {
            $initials .= strtoupper(substr($part, 0, 1));
        }

    }

    $initials = substr($initials, 0, 2);

@endphp


<aside class="sidebar" id="sidebar">

    <div class="brand">

        <div class="brand-icon">
            
 <img
            src="{{ asset('images/schoolsync-logo.png') }}"
            alt="SchoolSync"
        >
        </div>

        <div>
            <h4>SchoolSync</h4>
            
        </div>

    </div>


    <div class="menu-title">
        Overview
    </div>

    <a href="{{ route('teacher.dashboard') }}" class="menu-link">
        <i class="bi bi-grid-1x2-fill"></i>
        Dashboard
    </a>


    <div class="menu-title">
        Teaching
    </div>

    <a href="{{ route('teacher.classes.index') }}" class="menu-link">
        <i class="bi bi-diagram-3"></i>
        Classes
    </a>

    <a href="{{ route('teacher.subjects.index') }}" class="menu-link">
        <i class="bi bi-book"></i>
        Subjects
    </a>

    <a href="{{ route('teacher.students.index') }}" class="menu-link">
        <i class="bi bi-mortarboard"></i>
        Students
    </a>

    <a href="{{ route('teacher.attendance.index') }}" class="menu-link active">
        <i class="bi bi-calendar-check"></i>
        Attendance
    </a>


    <div class="menu-title">
        Academic
    </div>

    <a href="{{ route('teacher.schedule.index') }}" class="menu-link">
        <i class="bi bi-calendar3"></i>
        Schedule
    </a>


    <div class="menu-title">
        Communication
    </div>

    <a href="{{ route('teacher.announcements.index') }}" class="menu-link">
        <i class="bi bi-megaphone"></i>
        Announcements
    </a>


    <div class="menu-title">
        Account
    </div>

    <a href="{{ route('teacher.profile.edit') }}" class="menu-link">
        <i class="bi bi-person-circle"></i>
        Profile
    </a>


    <div class="sidebar-footer">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="logout">

                <i class="bi bi-box-arrow-right"></i>

                <span>
                    Logout
                </span>

            </button>

        </form>

    </div>

</aside>


<main class="main">

    <header class="topbar">

        <div class="topbar-left">

            <button class="mobile-menu" id="mobileMenu">

                <i class="bi bi-list"></i>

            </button>

            <div class="search-box">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="topSearch"
                    placeholder="Search students..."
                >

            </div>

        </div>


        <div class="topbar-right">

            <button class="icon-button">

                <i class="bi bi-bell"></i>

                <span class="notification-dot"></span>

            </button>


            <div class="profile">

                <div class="profile-avatar">
                    {{ $initials ?: 'T' }}
                </div>

                <div class="profile-info">

                    <strong>
                        {{ $teacherName }}
                    </strong>

                    <span>
                        Teacher
                    </span>

                </div>

            </div>

        </div>

    </header>


    <section class="content">

        <div class="page-header">

            <div>

                <h1>
                    Mark Attendance
                </h1>

                <p>
                    Select your class and record attendance for your students.
                </p>

            </div>


            <a
                href="{{ route('teacher.attendance.index') }}"
                class="back-button"
            >

                <i class="bi bi-arrow-left"></i>

                Back to Attendance

            </a>

        </div>


        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0 ps-3">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif


        <div class="attendance-wrapper">

            <div class="attendance-card">

                <div class="attendance-header">

                    <h5>
                        Attendance Information
                    </h5>

                    <span>
                        Select a class and date to load enrolled students.
                    </span>

                </div>


                {{-- =====================================================
                     STEP 1 — SELECT CLASS AND DATE
                ====================================================== --}}

                <form
                    action="{{ route('teacher.attendance.create') }}"
                    method="GET"
                    class="mb-4"
                >

                    <div class="row g-3">

                        <div class="col-md-7">

                            <label
                                for="class_id"
                                class="form-label"
                            >
                                Class
                            </label>

                            <select
                                name="class_id"
                                id="class_id"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select Class
                                </option>

                                @foreach($classrooms as $classroom)

                                    <option
                                        value="{{ $classroom->class_id }}"
                                        {{ request('class_id') == $classroom->class_id ? 'selected' : '' }}
                                    >

                                        {{ $classroom->class_name }}

                                        @if($classroom->academicYear)
                                            — {{ $classroom->academicYear->year_name ?? $classroom->academicYear->name ?? '' }}
                                        @endif

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="col-md-5">

                            <label
                                for="attendance_date"
                                class="form-label"
                            >
                                Attendance Date
                            </label>

                            <input
                                type="date"
                                name="attendance_date"
                                id="attendance_date"
                                class="form-control"
                                value="{{ $date }}"
                                required
                            >

                        </div>

                    </div>


                    <div class="mt-3">

                        <button
                            type="submit"
                            class="save-button"
                        >

                            <i class="bi bi-people-fill me-1"></i>

                            Load Students

                        </button>

                    </div>

                </form>


                {{-- =====================================================
                     STEP 2 — SELECTED CLASS
                ====================================================== --}}

                @if($selectedClass)

                    <div class="class-summary">

                        <strong>

                            <i class="bi bi-diagram-3 me-1"></i>

                            {{ $selectedClass->class_name }}

                        </strong>

                        <span class="ms-2">

                            {{ $enrollments->count() }}
                            enrolled student(s)

                        </span>

                    </div>


                    @if($enrollments->count() > 0)

                        {{-- =================================================
                             STEP 3 — ATTENDANCE FORM
                        ================================================== --}}

                        <form
                            action="{{ route('teacher.attendance.store') }}"
                            method="POST"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="class_id"
                                value="{{ $selectedClass->class_id }}"
                            >


                            <input
                                type="hidden"
                                name="attendance_date"
                                value="{{ $date }}"
                            >


                            <div class="mb-3">

                                <label
                                    for="studentSearch"
                                    class="form-label"
                                >
                                    Search Students
                                </label>

                                <input
                                    type="text"
                                    id="studentSearch"
                                    class="form-control"
                                    placeholder="Search by student name or student code..."
                                >

                            </div>


                            {{-- =============================================
                                 STUDENTS
                            ============================================== --}}

                            <div id="studentList">

                                @foreach($enrollments as $enrollment)

                                    @php

                                        $student = $enrollment->student;

                                        $existingAttendance =
                                            $enrollment->attendances
                                                ->first(function ($attendance) use ($date) {

                                                    return $attendance
                                                        ->attendance_date
                                                        ->format('Y-m-d') === $date;

                                                });

                                        $currentStatus =
                                            $existingAttendance->status
                                            ?? 'Present';

                                        $studentName =
                                            $student->full_name
                                            ?? 'Unknown Student';

                                        $studentCode =
                                            $student->student_code
                                            ?? 'N/A';

                                        $studentInitial =
                                            strtoupper(
                                                substr(
                                                    $studentName,
                                                    0,
                                                    1
                                                )
                                            );

                                    @endphp


                                    <div
                                        class="student-row"
                                        data-student-search="{{ strtolower($studentName . ' ' . $studentCode) }}"
                                    >

                                        <div class="row align-items-center">

                                            <div class="col-lg-5">

                                                <div class="student-info">

                                                    <div class="student-avatar">

                                                        {{ $studentInitial }}

                                                    </div>

                                                    <div>

                                                        <div class="student-name">

                                                            {{ $studentName }}

                                                        </div>

                                                        <span class="student-code">

                                                            {{ $studentCode }}

                                                        </span>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="col-lg-7">

                                                <div class="status-options">


                                                    {{-- PRESENT --}}

                                                    <div class="status-option status-present">

                                                        <input
                                                            type="radio"
                                                            name="attendance[{{ $enrollment->enrollment_id }}]"
                                                            id="present_{{ $enrollment->enrollment_id }}"
                                                            value="Present"
                                                            {{ $currentStatus === 'Present' ? 'checked' : '' }}
                                                            required
                                                        >

                                                        <label
                                                            for="present_{{ $enrollment->enrollment_id }}"
                                                        >

                                                            <i class="bi bi-check-circle-fill"></i>

                                                            Present

                                                        </label>

                                                    </div>


                                                    {{-- LATE --}}

                                                    <div class="status-option status-late">

                                                        <input
                                                            type="radio"
                                                            name="attendance[{{ $enrollment->enrollment_id }}]"
                                                            id="late_{{ $enrollment->enrollment_id }}"
                                                            value="Late"
                                                            {{ $currentStatus === 'Late' ? 'checked' : '' }}
                                                        >

                                                        <label
                                                            for="late_{{ $enrollment->enrollment_id }}"
                                                        >

                                                            <i class="bi bi-clock-fill"></i>

                                                            Late

                                                        </label>

                                                    </div>


                                                    {{-- ABSENT --}}

                                                    <div class="status-option status-absent">

                                                        <input
                                                            type="radio"
                                                            name="attendance[{{ $enrollment->enrollment_id }}]"
                                                            id="absent_{{ $enrollment->enrollment_id }}"
                                                            value="Absent"
                                                            {{ $currentStatus === 'Absent' ? 'checked' : '' }}
                                                        >

                                                        <label
                                                            for="absent_{{ $enrollment->enrollment_id }}"
                                                        >

                                                            <i class="bi bi-x-circle-fill"></i>

                                                            Absent

                                                        </label>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>


                            <div class="form-actions">

                                <a
                                    href="{{ route('teacher.attendance.index') }}"
                                    class="cancel-button"
                                >
                                    Cancel
                                </a>


                                <button
                                    type="submit"
                                    class="save-button"
                                >

                                    <i class="bi bi-check-lg me-1"></i>

                                    Save Attendance

                                </button>

                            </div>

                        </form>

                    @else

                        <div class="empty-students">

                            <i class="bi bi-people"></i>

                            <strong>
                                No enrolled students
                            </strong>

                            <div>
                                There are no active students in this class.
                            </div>

                        </div>

                    @endif

                @else

                    <div class="empty-students">

                        <i class="bi bi-calendar-check"></i>

                        <strong>
                            Select a class and date
                        </strong>

                        <div>
                            Choose one of your assigned classes to load students.
                        </div>

                    </div>

                @endif

            </div>

        </div>

    </section>

</main>


<script>

    /*
    |--------------------------------------------------------------------------
    | MOBILE SIDEBAR
    |--------------------------------------------------------------------------
    */

    const mobileMenu =
        document.getElementById("mobileMenu");

    const sidebar =
        document.getElementById("sidebar");

    mobileMenu.addEventListener(
        "click",
        function () {

            sidebar.classList.toggle("show");

        }
    );


    /*
    |--------------------------------------------------------------------------
    | STUDENT SEARCH
    |--------------------------------------------------------------------------
    */

    const studentSearch =
        document.getElementById("studentSearch");

    if (studentSearch) {

        studentSearch.addEventListener(
            "input",
            function () {

                const searchValue =
                    this.value
                        .toLowerCase()
                        .trim();

                const students =
                    document.querySelectorAll(
                        ".student-row"
                    );

                students.forEach(
                    function (student) {

                        const text =
                            student.dataset.studentSearch;

                        student.style.display =
                            text.includes(searchValue)
                                ? ""
                                : "none";

                    }
                );

            }
        );

    }

</script>


</body>

</html>