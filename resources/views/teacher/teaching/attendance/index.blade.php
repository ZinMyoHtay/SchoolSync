<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Attendance | SchoolSync</title>

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

        .header-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--blue);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 10px 15px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .header-button:hover {
            background: var(--blue-dark);
            color: white;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            box-shadow: var(--shadow);
            height: 100%;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .icon-blue {
            background: var(--blue-light);
            color: var(--blue);
        }

        .icon-green {
            background: #eaf9f2;
            color: var(--green);
        }

        .icon-purple {
            background: #f1edff;
            color: var(--purple);
        }

        .icon-orange {
            background: #fff4e5;
            color: var(--orange);
        }

        .stat-label {
            color: var(--muted);
            font-size: 12px;
            margin-top: 16px;
        }

        .stat-value {
            font-size: 25px;
            font-weight: 800;
            margin-top: 3px;
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .stat-change {
            margin-top: 7px;
            font-size: 11px;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .filter-card {
            margin-top: 25px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            box-shadow: var(--shadow);
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

        .table-card {
            margin-top: 25px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .table-header {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
        }

        .table-header h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .table-header span {
            color: var(--muted);
            font-size: 11px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .attendance-table {
            width: 100%;
            min-width: 1050px;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .attendance-table thead th {
            background: #fafbfc;
            padding: 13px 12px;
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
            text-align: center;
        }

        .attendance-table thead th:first-child,
        .attendance-table thead th:nth-child(2),
        .attendance-table thead th:nth-child(3) {
            text-align: left;
        }

        .attendance-table tbody td {
            padding: 15px 12px;
            font-size: 12px;
            border-bottom: 1px solid #f0f2f5;
            vertical-align: middle;
            text-align: center;
        }

        .attendance-table tbody td:first-child,
        .attendance-table tbody td:nth-child(2),
        .attendance-table tbody td:nth-child(3) {
            text-align: left;
        }

        .attendance-table tbody tr:last-child td {
            border-bottom: none;
        }

        .attendance-table tbody tr:hover {
            background: #fafcff;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .student-avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .student-name {
            font-size: 12px;
            font-weight: 700;
        }

        .student-email {
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
        }

        .class-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 7px;
            background: #f1f4f8;
            color: #536176;
            font-size: 10px;
            font-weight: 600;
        }

        .attendance-number {
            font-weight: 700;
            font-size: 12px;
        }

        .attendance-present {
            color: var(--green);
        }

        .attendance-late {
            color: var(--orange);
        }

        .attendance-absent {
            color: var(--red);
        }

        .attendance-percentage {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 5px 9px;
            border-radius: 7px;
            background: var(--blue-light);
            color: var(--blue);
            font-size: 10px;
            font-weight: 700;
        }

        .grade-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 27px;
            height: 27px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 800;
        }

        .grade-a {
            color: var(--green);
            background: #eaf9f2;
        }

        .grade-b {
            color: var(--blue);
            background: var(--blue-light);
        }

        .grade-c {
            color: var(--orange);
            background: #fff4e5;
        }

        .grade-d {
            color: var(--red);
            background: #fff0f0;
        }

        .action-group {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .action-btn {
            width: 31px;
            height: 31px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: var(--muted);
            text-decoration: none;
            transition: .2s ease;
        }

        .action-btn:hover {
            background: var(--blue-light);
            border-color: #d6e5ff;
            color: var(--blue);
        }

        .empty-state {
            padding: 50px 20px;
            text-align: center;
            color: var(--muted);
        }

        .empty-state i {
            font-size: 38px;
            margin-bottom: 12px;
            display: block;
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

            .header-button {
                width: 100%;
                justify-content: center;
            }

            .attendance-table {
                table-layout: auto;
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

            .stat-value {
                font-size: 22px;
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

    $totalStudents = $students->count();

    $totalPresent = $students->sum('attendance_present');
    $totalLate = $students->sum('attendance_late');
    $totalAbsent = $students->sum('attendance_absent');

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
                <span>Logout</span>
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
                    value="{{ request('search') }}"
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
                    Attendance
                </h1>

                <p>
                    Manage student attendance and attendance performance.
                </p>

            </div>

            <a
                href="{{ route('teacher.attendance.create') }}"
                class="header-button"
            >
                <i class="bi bi-plus-lg"></i>
                Mark Attendance
            </a>

        </div>

        <div class="row g-4">

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-blue">
                            <i class="bi bi-people-fill"></i>
                        </div>

                    </div>

                    <div class="stat-label">
                        Total Students
                    </div>

                    <div class="stat-value">
                        {{ $totalStudents }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-people"></i>
                        Students in my classes
                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-green">
                            <i class="bi bi-person-check-fill"></i>
                        </div>

                    </div>

                    <div class="stat-label">
                        Present
                    </div>

                    <div class="stat-value">
                        {{ $totalPresent }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-check-circle"></i>
                        Present attendance records
                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-purple">
                            <i class="bi bi-clock-fill"></i>
                        </div>

                    </div>

                    <div class="stat-label">
                        Late
                    </div>

                    <div class="stat-value">
                        {{ $totalLate }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-clock"></i>
                        Late attendance records
                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-orange">
                            <i class="bi bi-person-x-fill"></i>
                        </div>

                    </div>

                    <div class="stat-label">
                        Absent
                    </div>

                    <div class="stat-value">
                        {{ $totalAbsent }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-x-circle"></i>
                        Absent attendance records
                    </div>

                </div>

            </div>

        </div>

        <div class="filter-card">

            <div class="row g-3 align-items-end">

                <div class="col-xl-3 col-md-6">

                    <label class="form-label">
                        Search
                    </label>

                    <input
                        type="text"
                        id="studentSearch"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Student name or code"
                    >

                </div>

                <div class="col-xl-3 col-md-6">

                    <label class="form-label">
                        Period
                    </label>

                    <select
                        id="periodFilter"
                        class="form-select"
                    >

                        <option value="">
                            All Periods
                        </option>

                        <option value="daily">
                            Daily
                        </option>

                        <option value="weekly">
                            Weekly
                        </option>

                        <option value="monthly">
                            Monthly
                        </option>

                    </select>

                </div>

                <div class="col-xl-3 col-md-6">

                    <label class="form-label">
                        Date
                    </label>

                    <input
                        type="date"
                        id="dateFilter"
                        class="form-control"
                        value="{{ request('date') }}"
                    >

                </div>

                <div class="col-xl-3 col-md-6">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        id="statusFilter"
                        class="form-select"
                    >

                        <option value="">
                            All Status
                        </option>

                        <option value="Present">
                            Present
                        </option>

                        <option value="Late">
                            Late
                        </option>

                        <option value="Absent">
                            Absent
                        </option>

                    </select>

                </div>

            </div>

        </div>

        <div class="table-card">

            <div class="table-header">

                <div>

                    <h5>
                        Student Attendance
                    </h5>

                    <span>
                        Attendance performance of students in your classes
                    </span>

                </div>

                <span id="studentCount">
                    {{ $totalStudents }}
                    {{ $totalStudents === 1 ? 'student' : 'students' }}
                </span>

            </div>

            <div class="table-responsive">

                <table class="attendance-table">

                    <thead>

                        <tr>

                            <th style="width: 5%;">
                                #
                            </th>

                            <th style="width: 23%;">
                                Student
                            </th>

                            <th style="width: 12%;">
                                Class
                            </th>

                            <th style="width: 9%;">
                                Total Days
                            </th>

                            <th style="width: 8%;">
                                Present
                            </th>

                            <th style="width: 8%;">
                                Late
                            </th>

                            <th style="width: 8%;">
                                Absent
                            </th>

                            <th style="width: 10%;">
                                Attendance
                            </th>

                            <th style="width: 7%;">
                                Grade
                            </th>

                            <th style="width: 10%;">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody id="attendanceTableBody">

                        @forelse($students as $index => $enrollment)

                            @php

                                $student = $enrollment->student;

                                $studentName = $student->full_name
                                    ?: ($student->user->name ?? 'N/A');

                                $nameParts = explode(
                                    ' ',
                                    trim($studentName)
                                );

                                $studentInitials = '';

                                foreach ($nameParts as $part) {

                                    if ($part !== '') {

                                        $studentInitials .= strtoupper(
                                            substr($part, 0, 1)
                                        );

                                    }

                                }

                                $studentInitials = substr(
                                    $studentInitials,
                                    0,
                                    2
                                );

                                $percentage =
                                    $enrollment->attendance_percentage ?? 0;

                                $grade =
                                    $enrollment->attendance_grade ?? 'D';

                                $gradeClass = match ($grade) {

                                    'A' => 'grade-a',
                                    'B' => 'grade-b',
                                    'C' => 'grade-c',

                                    default => 'grade-d',

                                };

                                $present =
                                    $enrollment->attendance_present ?? 0;

                                $late =
                                    $enrollment->attendance_late ?? 0;

                                $absent =
                                    $enrollment->attendance_absent ?? 0;

                                $totalDays =
                                    $enrollment->attendance_days ?? 0;

                            @endphp

                            <tr
                                class="attendance-row"
                                data-search="{{ strtolower($studentName . ' ' . ($student->student_code ?? '')) }}"
                            >

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>

                                    <div class="student-info">

                                        <div class="student-avatar">
                                            {{ $studentInitials ?: 'ST' }}
                                        </div>

                                        <div>

                                            <div class="student-name">
                                                {{ $studentName }}
                                            </div>

                                            <div class="student-email">
                                                {{ $student->user->email ?? 'No email' }}
                                            </div>

                                        </div>

                                    </div>

                                </td>

                                <td>

                                    <span class="class-badge">
                                        {{ $enrollment->classroom->class_name ?? 'N/A' }}
                                    </span>

                                </td>

                                <td>

                                    <span class="attendance-number">
                                        {{ $totalDays }}
                                    </span>

                                </td>

                                <td>

                                    <span class="attendance-number attendance-present">
                                        {{ $present }}
                                    </span>

                                </td>

                                <td>

                                    <span class="attendance-number attendance-late">
                                        {{ $late }}
                                    </span>

                                </td>

                                <td>

                                    <span class="attendance-number attendance-absent">
                                        {{ $absent }}
                                    </span>

                                </td>

                                <td>

                                    <span class="attendance-percentage">
                                        {{ number_format($percentage, 2) }}%
                                    </span>

                                </td>

                                <td>

                                    <span class="grade-badge {{ $gradeClass }}">
                                        {{ $grade }}
                                    </span>

                                </td>

                                <td>

                                    <div class="action-group">

                                        <a
                                            href="{{ route('teacher.attendance.show', $enrollment->enrollment_id) }}"
                                            class="action-btn"
                                            title="View Attendance"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="10">

                                    <div class="empty-state">

                                        <i class="bi bi-calendar-x"></i>

                                        <div>
                                            No attendance records found.
                                        </div>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</main>

<script>

    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {
        sidebar.classList.toggle("show");
    });


    const studentSearch =
        document.getElementById("studentSearch");

    const topSearch =
        document.getElementById("topSearch");

    const rows =
        document.querySelectorAll(".attendance-row");

    const studentCount =
        document.getElementById("studentCount");


    function filterStudents() {

        const searchValue =
            studentSearch.value.toLowerCase().trim();

        let visibleCount = 0;

        rows.forEach(function (row) {

            const rowSearch =
                row.dataset.search;

            const searchMatch =
                searchValue === "" ||
                rowSearch.includes(searchValue);

            if (searchMatch) {

                row.style.display = "";

                visibleCount++;

                row.querySelector("td:first-child").textContent =
                    visibleCount;

            } else {

                row.style.display = "none";

            }

        });

        studentCount.textContent =
            visibleCount +
            (visibleCount === 1 ? " student" : " students");

    }


    studentSearch.addEventListener(
        "input",
        filterStudents
    );


    topSearch.addEventListener(
        "input",
        function () {

            studentSearch.value =
                topSearch.value;

            filterStudents();

        }
    );

</script>

</body>
</html>

