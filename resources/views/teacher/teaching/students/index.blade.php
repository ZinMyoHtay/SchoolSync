<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Students | SchoolSync</title>

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
            padding: 18px 20px;
            box-shadow: var(--shadow);
        }

        .filter-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 15px;
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

        .filter-button {
            height: 40px;
            background: var(--blue);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 0 17px;
            font-size: 12px;
            font-weight: 600;
        }

        .filter-button:hover {
            background: var(--blue-dark);
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

        .student-table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }

        .student-table thead th {
            background: #fafbfc;
            padding: 13px 18px;
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .student-table tbody td {
            padding: 15px 18px;
            font-size: 12px;
            border-bottom: 1px solid #f0f2f5;
            vertical-align: middle;
        }

        .student-table tbody tr:last-child td {
            border-bottom: none;
        }

        .student-table tbody tr:hover {
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

        .student-code {
            font-weight: 600;
            color: var(--blue);
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

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        .status::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .status-active {
            color: var(--green);
            background: #eaf9f2;
        }

        .status-active::before {
            background: var(--green);
        }

        .status-inactive {
            color: var(--red);
            background: #fff0f0;
        }

        .status-inactive::before {
            background: var(--red);
        }

        .action-group {
            display: flex;
            align-items: center;
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
    $students = collect();

    foreach ($classrooms as $classroom) {
        foreach ($classroom->enrollments as $enrollment) {
            if ($enrollment->student) {
                $students->push([
                    'student' => $enrollment->student,
                    'classroom' => $classroom,
                    'enrollment' => $enrollment,
                ]);
            }
        }
    }

    $totalStudents = $students->count();

    $activeStudents = $students
        ->filter(function ($item) {
            return $item['enrollment']->status === 'active';
        })
        ->count();

    $totalClasses = $classrooms->count();

    $studentIds = $students
        ->pluck('student.student_id')
        ->unique()
        ->count();

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

    <a href="{{ route('teacher.students.index') }}" class="menu-link active">
        <i class="bi bi-mortarboard"></i>
        Students
    </a>



    <a href="{{ route('teacher.attendance.index') }}" class="menu-link">
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

    <a
        href="{{ route('teacher.profile.edit') }}"
        class="menu-link"
    >
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
                    <strong>{{ $teacherName }}</strong>
                    <span>Teacher</span>
                </div>

            </div>

        </div>

    </header>

    <section class="content">

        <div class="page-header">

            <div>

                <h1>Students</h1>

                <p>
                    View students enrolled in your classes.
                </p>

            </div>

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
                        {{ $studentIds }}
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
                        Active Students
                    </div>

                    <div class="stat-value">
                        {{ $activeStudents }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-check-circle"></i>
                        Active enrollments
                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-purple">
                            <i class="bi bi-building"></i>
                        </div>

                    </div>

                    <div class="stat-label">
                        My Classes
                    </div>

                    <div class="stat-value">
                        {{ $totalClasses }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-diagram-3"></i>
                        Active classes
                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-orange">
                            <i class="bi bi-person-lines-fill"></i>
                        </div>

                    </div>

                    <div class="stat-label">
                        Enrollments
                    </div>

                    <div class="stat-value">
                        {{ $totalStudents }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-journal-check"></i>
                        Current enrollments
                    </div>

                </div>

            </div>

        </div>

        <div class="filter-card">

            <div class="filter-title">
                <i class="bi bi-funnel me-2"></i>
                Filter Students
            </div>

            <div class="row g-3 align-items-end">

                <div class="col-xl-4 col-md-6">

                    <label class="form-label">
                        Class
                    </label>

                    <select class="form-select" id="classFilter">

                        <option value="">
                            All Classes
                        </option>

                        @foreach($classrooms as $classroom)

                            <option value="{{ $classroom->class_id }}">
                                {{ $classroom->class_name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-xl-4 col-md-6">

                    <label class="form-label">
                        Status
                    </label>

                    <select class="form-select" id="statusFilter">

                        <option value="">
                            All Students
                        </option>

                        <option value="active">
                            Active
                        </option>

                        <option value="inactive">
                            Inactive
                        </option>

                    </select>

                </div>

                <div class="col-xl-4 col-md-12">

                    <label class="form-label">
                        Search
                    </label>

                    <div class="input-group">

                        <input
                            type="text"
                            class="form-control"
                            id="studentSearch"
                            placeholder="Student name or code"
                        >

                        <button
                            type="button"
                            class="filter-button"
                            id="searchButton"
                        >
                            <i class="bi bi-search"></i>
                        </button>

                    </div>

                </div>

            </div>

        </div>

        <div class="table-card">

            <div class="table-header">

                <div>

                    <h5>
                        My Students
                    </h5>

                    <span>
                        Students enrolled in your classes
                    </span>

                </div>

                <span id="studentCount">
                    {{ $studentIds }} students
                </span>

            </div>

            <div class="table-responsive">

                <table class="student-table">

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                Student
                            </th>

                            <th>
                                Student ID
                            </th>

                            <th>
                                Class
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody id="studentTableBody">

                        @forelse($students as $index => $item)

                            @php
                                $student = $item['student'];
                                $classroom = $item['classroom'];
                                $enrollment = $item['enrollment'];

                                $studentName = $student->full_name
                                    ?: ($student->user->name ?? 'N/A');

                                $nameParts = explode(' ', trim($studentName));
                                $studentInitials = '';

                                foreach ($nameParts as $part) {
                                    if ($part !== '') {
                                        $studentInitials .= strtoupper(substr($part, 0, 1));
                                    }
                                }

                                $studentInitials = substr($studentInitials, 0, 2);

                                $status = strtolower($enrollment->status ?? 'inactive');
                            @endphp

                            <tr
                                class="student-row"
                                data-class="{{ $classroom->class_id }}"
                                data-status="{{ $status }}"
                                data-search="{{ strtolower($studentName . ' ' . $student->student_code) }}"
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

                                    <span class="student-code">
                                        {{ $student->student_code ?? 'N/A' }}
                                    </span>

                                </td>

                                <td>

                                    <span class="class-badge">
                                        {{ $classroom->class_name }}
                                    </span>

                                </td>

                                <td>
                                    {{ $student->phone ?? 'N/A' }}
                                </td>

                                <td>

                                    @if($status === 'active')

                                        <span class="status status-active">
                                            Active
                                        </span>

                                    @else

                                        <span class="status status-inactive">
                                            {{ ucfirst($status) }}
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="action-group">

<a
    href="{{ route('teacher.students.show', $item['enrollment']->enrollment_id) }}"
    class="action-btn"
    title="View Student"
>
    <i class="bi bi-eye"></i>
</a>

                                        <a
                                            href="{{ route('teacher.attendance.index') }}"
                                            class="action-btn"
                                            title="Attendance"
                                        >
                                            <i class="bi bi-calendar-check"></i>
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7">

                                    <div class="empty-state">

                                        <i class="bi bi-people"></i>

                                        <div>
                                            No students are enrolled in your classes yet.
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

    const classFilter = document.getElementById("classFilter");
    const statusFilter = document.getElementById("statusFilter");
    const studentSearch = document.getElementById("studentSearch");
    const topSearch = document.getElementById("topSearch");
    const searchButton = document.getElementById("searchButton");
    const rows = document.querySelectorAll(".student-row");
    const studentCount = document.getElementById("studentCount");

    function filterStudents() {

        const selectedClass = classFilter.value;
        const selectedStatus = statusFilter.value;
        const searchValue = studentSearch.value.toLowerCase().trim();

        let visibleCount = 0;

        rows.forEach(function (row) {

            const rowClass = row.dataset.class;
            const rowStatus = row.dataset.status;
            const rowSearch = row.dataset.search;

            const classMatch =
                selectedClass === "" ||
                rowClass === selectedClass;

            const statusMatch =
                selectedStatus === "" ||
                rowStatus === selectedStatus;

            const searchMatch =
                searchValue === "" ||
                rowSearch.includes(searchValue);

            if (classMatch && statusMatch && searchMatch) {

                row.style.display = "";

                visibleCount++;

                row.querySelector("td:first-child").textContent =
                    visibleCount;

            } else {

                row.style.display = "none";

            }

        });

        studentCount.textContent =
            visibleCount + (visibleCount === 1 ? " student" : " students");
    }

    classFilter.addEventListener("change", filterStudents);
    statusFilter.addEventListener("change", filterStudents);
    studentSearch.addEventListener("input", filterStudents);

    searchButton.addEventListener("click", filterStudents);

    topSearch.addEventListener("input", function () {

        studentSearch.value = topSearch.value;

        filterStudents();

    });

</script>

</body>
</html>

