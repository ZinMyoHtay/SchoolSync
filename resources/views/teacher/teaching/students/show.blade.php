<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Details | SchoolSync</title>

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
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 9px 13px;
            color: var(--muted);
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: .2s ease;
        }

        .back-button:hover {
            color: var(--blue);
            border-color: #d6e5ff;
            background: var(--blue-light);
        }

        .info-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .info-header {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 13px;
            border-bottom: 1px solid var(--border);
        }

        .student-avatar {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 800;
            flex-shrink: 0;
        }

        .info-header h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .info-header span {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 11px;
        }

        .info-body {
            padding: 20px;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            padding: 13px 0;
            border-bottom: 1px solid #f0f2f5;
        }

        .info-row:first-child {
            padding-top: 0;
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 500;
        }

        .info-value {
            font-size: 12px;
            font-weight: 600;
            text-align: right;
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

        .section-title {
            margin: 25px 0 15px;
            font-size: 15px;
            font-weight: 700;
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
        }

    </style>
</head>

<body>

@php

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

    $teacherName = $user->name ?? 'Teacher';

    $teacherParts = explode(' ', trim($teacherName));

    $teacherInitials = '';

    foreach ($teacherParts as $part) {
        if ($part !== '') {
            $teacherInitials .= strtoupper(substr($part, 0, 1));
        }
    }

    $teacherInitials = substr($teacherInitials, 0, 2);

    $enrollmentStatus = strtolower(
        $enrollment->status ?? 'inactive'
    );

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
                    {{ $teacherInitials ?: 'T' }}
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
                    Student Details
                </h1>

                <p>
                    View student information.
                </p>

            </div>

            <a
                href="{{ route('teacher.students.index') }}"
                class="back-button"
            >
                <i class="bi bi-arrow-left"></i>
                Back to Students
            </a>

        </div>

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="info-card">

                    <div class="info-header">

                        <div class="student-avatar">
                            {{ $studentInitials ?: 'ST' }}
                        </div>

                        <div>

                            <h5>
                                {{ $studentName }}
                            </h5>

                            <span>
                                {{ $student->student_code ?? 'N/A' }}
                            </span>

                        </div>

                    </div>

                    <div class="info-body">

                        <div class="info-row">

                            <span class="info-label">
                                Full Name
                            </span>

                            <span class="info-value">
                                {{ $studentName }}
                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Student ID
                            </span>

                            <span class="info-value">
                                {{ $student->student_code ?? 'N/A' }}
                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Date of Birth
                            </span>

                            <span class="info-value">

                                {{ $student->date_of_birth
                                    ? \Carbon\Carbon::parse($student->date_of_birth)->format('d M Y')
                                    : 'N/A'
                                }}

                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Phone
                            </span>

                            <span class="info-value">
                                {{ $student->phone ?? 'N/A' }}
                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Email
                            </span>

                            <span class="info-value">
                                {{ $student->user->email ?? 'N/A' }}
                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Address
                            </span>

                            <span class="info-value">
                                {{ $student->address ?? 'N/A' }}
                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Admission Date
                            </span>

                            <span class="info-value">

                                {{ $student->admission_date
                                    ? \Carbon\Carbon::parse($student->admission_date)->format('d M Y')
                                    : 'N/A'
                                }}

                            </span>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="info-card">

                    <div class="info-header">

                        <div class="student-avatar">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <div>

                            <h5>
                                Enrollment Information
                            </h5>

                            <span>
                                Current class enrollment
                            </span>

                        </div>

                    </div>

                    <div class="info-body">

                        <div class="info-row">

                            <span class="info-label">
                                Class
                            </span>

                            <span class="info-value">

                                <span class="class-badge">
                                    {{ $classroom->class_name }}
                                </span>

                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Academic Year
                            </span>

                            <span class="info-value">
                                {{ $classroom->academicYear->year_name ?? 'N/A' }}
                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Enrollment Date
                            </span>

                            <span class="info-value">

                                {{ $enrollment->enrollment_date
                                    ? \Carbon\Carbon::parse($enrollment->enrollment_date)->format('d M Y')
                                    : 'N/A'
                                }}

                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Enrollment Status
                            </span>

                            <span class="info-value">

                                @if($enrollmentStatus === 'active')

                                    <span class="status status-active">
                                        Active
                                    </span>

                                @else

                                    <span class="status status-inactive">
                                        {{ ucfirst($enrollmentStatus) }}
                                    </span>

                                @endif

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="section-title">
            Parent / Guardian Information
        </div>

        <div class="info-card">

            <div class="info-body">

                <div class="row">

                    <div class="col-lg-6">

                        <div class="info-row">

                            <span class="info-label">
                                Parent / Guardian Name
                            </span>

                            <span class="info-value">
                                {{ $student->parent_name ?? 'N/A' }}
                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Relationship
                            </span>

                            <span class="info-value">
                                {{ $student->parent_relationship ?? 'N/A' }}
                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Phone
                            </span>

                            <span class="info-value">
                                {{ $student->parent_phone ?? 'N/A' }}
                            </span>

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="info-row">

                            <span class="info-label">
                                Email
                            </span>

                            <span class="info-value">
                                {{ $student->parent_email ?? 'N/A' }}
                            </span>

                        </div>

                        <div class="info-row">

                            <span class="info-label">
                                Address
                            </span>

                            <span class="info-value">
                                {{ $student->parent_address ?? 'N/A' }}
                            </span>

                        </div>

                    </div>

                </div>

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

</script>

</body>
</html>

