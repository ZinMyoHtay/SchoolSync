<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Attendance Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        :root {
            --navy: #0b1f3a;
            --navy-2: #10294a;
            --blue: #1769e0;
            --blue-dark: #0d4fb8;
            --blue-light: #eef5ff;
            --yellow: #f7c948;

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
            font-size: 14px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        a {
            text-decoration: none;
        }

        /* ==============================
           SIDEBAR
        ============================== */

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

        .brand {
            height: 82px;
            display: flex;
            align-items: center;
            padding: 0 25px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            margin-right: 12px;
            box-shadow: 0 7px 20px rgba(23,105,224,0.35);
        }

               .brand-logo img {
    width: 95%;
    height: 95%;
    object-fit: contain;
    display: block;
}

        .brand-name {
            font-family: "Plus Jakarta Sans";
            font-size: 20px;
            font-weight: 800;
        }

        .brand-name span {
            color: var(--white);
        }

        .sidebar-scroll {
            padding: 20px 14px;
            overflow-y: auto;
            flex: 1;
        }

        .sidebar-section {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            color: #71829d;
            font-weight: 700;
            padding: 15px 12px 9px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #b8c4d5;
            padding: 11px 13px;
            margin-bottom: 3px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.2s ease;
        }

        .menu-link i {
            width: 20px;
            font-size: 17px;
            text-align: center;
        }

        .menu-link:hover {
            color: white;
            background: rgba(255,255,255,0.06);
            transform: translateX(2px);
        }

        .menu-link.active {
            color: white;
            background: linear-gradient(90deg, #1769e0, #2377ed);
            box-shadow: 0 8px 20px rgba(23,105,224,0.25);
        }

        .sidebar-footer {
            margin-top: 25px;
            padding-top: 18px;
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
            transition: all 0.25s ease;
            text-align: left;
        }

        .logout i {
            font-size: 18px;
        }

        .logout:hover {
            background: rgba(128,128,128,0.08);
            color: #808080 !important;
        }

        .logout:hover i {
            color: #808080 !important;
        }

        /* ==============================
           MAIN
        ============================== */

        .main {
            margin-left: 270px;
            min-height: 100vh;
        }

        /* ==============================
           TOPBAR
        ============================== */

        .topbar {
            height: 82px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .mobile-btn {
            display: none;
            border: none;
            background: none;
            font-size: 23px;
        }

        .search {
            position: relative;
            width: 350px;
        }

        .search i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9aa5b5;
        }

        .search input {
            width: 100%;
            border: 1px solid var(--border);
            background: #f8f9fc;
            padding: 11px 15px 11px 42px;
            border-radius: 10px;
            font-size: 12px;
            outline: none;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .top-icon {
            width: 39px;
            height: 39px;
            border: 1px solid var(--border);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            position: relative;
        }

        .notification-dot {
            position: absolute;
            width: 7px;
            height: 7px;
            background: #dc3545;
            border-radius: 50%;
            right: 7px;
            top: 6px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-left: 12px;
            border-left: 1px solid var(--border);
        }

        .avatar {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #d9e9ff, #edf5ff);
            color: var(--blue);
            font-size: 13px;
            font-weight: 800;
        }

        .profile-name {
            font-size: 12px;
            font-weight: 700;
        }

        .profile-role {
            color: var(--muted);
            font-size: 9px;
            margin-top: 2px;
        }

        /* ==============================
           CONTENT
        ============================== */

        .content {
            padding: 32px 34px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 27px;
            font-weight: 800;
            margin: 0 0 7px;
            color: var(--text);
        }

        .page-subtitle {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
        }

        .header-actions {
            display: flex;
            gap: 9px;
        }

        .back-btn,
        .create-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 17px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .back-btn {
            background: white;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .back-btn:hover {
            color: var(--blue);
            background: var(--blue-light);
        }

        .create-btn {
            background: linear-gradient(90deg, #1769e0, #2377ed);
            color: white;
            box-shadow: 0 7px 18px rgba(23,105,224,0.20);
        }

        .create-btn:hover {
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 10px 23px rgba(23,105,224,0.28);
        }

        /* ==============================
           SUMMARY
        ============================== */

        .summary-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            padding: 24px;
            margin-bottom: 22px;
        }

        .student-header {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .student-avatar-large {
            width: 58px;
            height: 58px;
            min-width: 58px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #d9e9ff, #edf5ff);
            color: var(--blue);
            font-size: 20px;
            font-weight: 800;
        }

        .student-name-large {
            font-size: 19px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .student-id-large {
            color: var(--muted);
            font-size: 12px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 14px;
            margin-top: 24px;
        }

        .summary-item {
            background: #f8f9fc;
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 16px;
        }

        .summary-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .summary-value {
            font-size: 18px;
            font-weight: 800;
            color: var(--text);
        }

        .percentage-value {
            color: var(--blue);
        }

        .present-value {
            color: #18a66b;
        }

        .late-value {
            color: #ed9b2d;
        }

        .absent-value {
            color: #e55353;
        }

        .grade-value {
            color: #7c4dff;
        }

        /* ==============================
           CARD
        ============================== */

        .card-box {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-header-custom {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .card-title {
            font-size: 17px;
            font-weight: 800;
            margin: 0 0 5px;
            color: var(--text);
        }

        .card-subtitle {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
        }

        /* ==============================
           TABLE
        ============================== */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .attendance-table {
            width: 100%;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .attendance-table thead th {
            background: #f8f9fc;
            color: #65738a;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            padding: 15px 18px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .attendance-table tbody td {
            padding: 17px 18px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
            font-size: 13px;
            color: var(--text);
            white-space: nowrap;
        }

        .attendance-table tbody tr:last-child td {
            border-bottom: none;
        }

        .attendance-table tbody tr:hover {
            background: #fbfcff;
        }

        .date-text {
            font-size: 13px;
            color: #566276;
            font-weight: 500;
        }

        /* ==============================
           STATUS
        ============================== */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .status-badge::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .status-present {
            background: #eaf8f2;
            color: #13885a;
        }

        .status-present::before {
            background: #18a66b;
        }

        .status-late {
            background: #fff7e6;
            color: #c47a0b;
        }

        .status-late::before {
            background: #ed9b2d;
        }

        .status-absent {
            background: #fff0f0;
            color: #d64545;
        }

        .status-absent::before {
            background: #e55353;
        }

        /* ==============================
           VIEW ONLY
        ============================== */

        .view-only {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
        }

        .view-only i {
            font-size: 14px;
            color: var(--blue);
        }

        /* ==============================
           EMPTY STATE
        ============================== */

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 18px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--blue-light);
            color: var(--blue);
            font-size: 27px;
        }

        .empty-state h5 {
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .empty-state p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
        }

        /* ==============================
           FOOTER
        ============================== */

        .card-footer-custom {
            padding: 15px 24px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 12px;
            background: #fcfdff;
        }

        /* ==============================
           ALERT
        ============================== */

        .alert-custom {
            border: none;
            border-radius: 10px;
            font-size: 13px;
            padding: 13px 16px;
            margin-bottom: 20px;
        }

        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 1100px) {

            .sidebar {
                width: 240px;
            }

            .main {
                margin-left: 240px;
            }

            .search {
                width: 280px;
            }

            .summary-grid {
                grid-template-columns: repeat(3, 1fr);
            }

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

            .mobile-btn {
                display: block;
            }

            .search {
                display: none;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 24px 20px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .header-actions {
                width: 100%;
            }

            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 575px) {

            .content {
                padding: 20px 14px;
            }

            .topbar {
                height: 70px;
            }

            .profile-name,
            .profile-role {
                display: none;
            }

            .page-title {
                font-size: 23px;
            }

            .page-subtitle {
                font-size: 13px;
            }

            .header-actions {
                flex-direction: column;
            }

            .back-btn,
            .create-btn {
                width: 100%;
                justify-content: center;
            }

            .summary-card {
                padding: 18px;
            }

            .summary-grid {
                grid-template-columns: 1fr 1fr;
            }

            .card-header-custom {
                padding: 18px;
            }

            .card-title {
                font-size: 16px;
            }

            .card-subtitle {
                font-size: 12px;
            }

            .attendance-table thead th {
                font-size: 11px;
                padding: 13px 14px;
            }

            .attendance-table tbody td {
                font-size: 12px;
                padding: 14px;
            }

        }

    </style>
</head>

<body>

<!-- =========================================
     SIDEBAR
========================================= -->

<aside class="sidebar" id="sidebar">

    <div class="brand">

        <div class="brand-logo">
         <img
            src="{{ asset('images/schoolsync-logo.png') }}"
            alt="SchoolSync"
        >
        </div>

        <div class="brand-name">
            School<span>Sync</span>
        </div>

    </div>

    <div class="sidebar-scroll">

        <!-- Overview -->

        <div class="sidebar-section">
            Overview
        </div>

        <a
            href="{{ url('/admin/dashboard') }}"
            class="menu-link"
        >
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>


        <!-- People -->

        <div class="sidebar-section">
            People
        </div>

        <a
            href="{{ route('admin.users.index') }}"
            class="menu-link"
        >
            <i class="bi bi-person-gear"></i>
            User Management
        </a>

        <a
            href="{{ route('admin.departments.index') }}"
            class="menu-link"
        >
            <i class="bi bi-building"></i>
            Departments
        </a>


        <!-- Academic -->

        <div class="sidebar-section">
            Academic
        </div>

        <a
            href="{{ route('admin.academic-years.index') }}"
            class="menu-link"
        >
            <i class="bi bi-calendar3"></i>
            Academic Years
        </a>

        <a
            href="{{ route('admin.classes.index') }}"
            class="menu-link"
        >
            <i class="bi bi-diagram-3"></i>
            Classes
        </a>

        <a
            href="{{ route('admin.subjects.index') }}"
            class="menu-link"
        >
            <i class="bi bi-book"></i>
            Subjects
        </a>

        <a
            href="{{ route('admin.enrollments.index') }}"
            class="menu-link"
        >
            <i class="bi bi-card-checklist"></i>
            Enrollments
        </a>

        <a
            href="{{ route('admin.attendance.index') }}"
            class="menu-link active"
        >
            <i class="bi bi-calendar-check"></i>
            Attendance
        </a>


        <!-- Finance -->

        <div class="sidebar-section">
            Finance
        </div>

        <a
            href="{{ route('admin.finance.index') }}"
            class="menu-link"
        >
            <i class="bi bi-wallet2"></i>
            Fees & Payments
        </a>

                        <div class="sidebar-section">
            Anncouncements
        </div>
        <a
    href="{{ route('admin.announcements.index') }}"
    class="menu-link"
>
    <i class="bi bi-megaphone"></i>

    Announcements
</a>

    </div>


    <!-- Logout -->

    <div class="sidebar-footer">

        <form
            action="{{ route('logout') }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="logout"
            >

                <i class="bi bi-arrow-left"></i>

                <span>
                    Logout
                </span>

            </button>

        </form>

    </div>

</aside>


<!-- =========================================
     MAIN
========================================= -->

<div class="main">


    <!-- =====================================
         TOPBAR
    ====================================== -->

    <div class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button
                class="mobile-btn"
                id="mobileMenuBtn"
                type="button"
            >
                <i class="bi bi-list"></i>
            </button>


            <div class="search">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    placeholder="Search students, teachers, classes..."
                >

            </div>

        </div>


        <div class="top-right">


            <!-- Notification -->

            <div class="top-icon">

                <i class="bi bi-bell"></i>

                <span class="notification-dot"></span>

            </div>


            <!-- Profile -->

            <div class="profile">

                <div class="avatar">

                    {{ strtoupper(
                        substr(
                            Auth::user()->name,
                            0,
                            1
                        )
                    ) }}

                </div>


                <div>

                    <div class="profile-name">

                        {{ Auth::user()->name }}

                    </div>


                    <div class="profile-role">

                        {{ ucfirst(Auth::user()->role) }}

                    </div>

                </div>


                <i
                    class="bi bi-chevron-down"
                    style="font-size:11px;color:#738096;"
                ></i>

            </div>

        </div>

    </div>


    <!-- =====================================
         CONTENT
    ====================================== -->

    <div class="content">


        <!-- =================================
             PAGE HEADER
        ================================== -->

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Attendance Details
                </h1>

                <p class="page-subtitle">
                    View individual student attendance records and performance.
                </p>

            </div>


            <div class="header-actions">

                <a
                    href="{{ route('admin.attendance.index') }}"
                    class="back-btn"
                >

                    <i class="bi bi-arrow-left"></i>

                    Back

                </a>

            </div>

        </div>


        <!-- =================================
             SUCCESS MESSAGE
        ================================== -->

        @if(session('success'))

            <div
                class="alert alert-success alert-custom"
                role="alert"
            >

                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        <!-- =================================
             ERROR MESSAGE
        ================================== -->

        @if($errors->any())

            <div
                class="alert alert-danger alert-custom"
                role="alert"
            >

                <i class="bi bi-exclamation-circle me-2"></i>

                Please check the form for errors.

            </div>

        @endif


        <!-- =================================
             STUDENT SUMMARY
        ================================== -->

        <div class="summary-card">


            <!-- Student Header -->

            <div class="student-header">


                <div class="student-avatar-large">

                    {{ strtoupper(
                        substr(
                            $enrollment->student->full_name ?? 'S',
                            0,
                            1
                        )
                    ) }}

                </div>


                <div>

                    <div class="student-name-large">

                        {{ $enrollment->student->full_name ?? 'Unknown Student' }}

                    </div>


                    <div class="student-id-large">

                        ID:

                        {{ $enrollment->student->student_code ?? $enrollment->student->student_id }}

                        &nbsp; • &nbsp;

                        {{ $enrollment->classroom->class_name ?? 'N/A' }}

                    </div>

                </div>

            </div>


            <!-- Attendance Summary -->

            <div class="summary-grid">


                <!-- Total Days -->

                <div class="summary-item">

                    <div class="summary-label">
                        Total Days
                    </div>

                    <div class="summary-value">

                        {{ $totalDays }}

                    </div>

                </div>


                <!-- Present -->

                <div class="summary-item">

                    <div class="summary-label">
                        Present
                    </div>

                    <div class="summary-value present-value">

                        {{ $present }}

                    </div>

                </div>


                <!-- Late -->

                <div class="summary-item">

                    <div class="summary-label">
                        Late
                    </div>

                    <div class="summary-value late-value">

                        {{ $late }}

                    </div>

                </div>


                <!-- Absent -->

                <div class="summary-item">

                    <div class="summary-label">
                        Absent
                    </div>

                    <div class="summary-value absent-value">

                        {{ $absent }}

                    </div>

                </div>


                <!-- Attendance -->

                <div class="summary-item">

                    <div class="summary-label">
                        Attendance
                    </div>

                    <div class="summary-value percentage-value">

                        {{ number_format($attendancePercentage, 2) }}%

                    </div>

                </div>

            </div>


            <!-- Grade -->

            <div class="summary-grid">

                <div class="summary-item">

                    <div class="summary-label">
                        Grade
                    </div>

                    <div class="summary-value grade-value">

                        {{ $attendanceGrade }}

                    </div>

                </div>

            </div>

        </div>


        <!-- =================================
             DAILY ATTENDANCE
        ================================== -->

        <div class="card-box">


            <!-- Card Header -->

            <div class="card-header-custom">

                <div>

                    <h3 class="card-title">
                        Daily Attendance
                    </h3>

                    <p class="card-subtitle">
                        Individual attendance records for this student.
                    </p>

                </div>

            </div>


            <!-- Table -->

            <div class="table-wrapper">

                @if($records->count() > 0)

                    <table class="attendance-table">

                        <thead>

                            <tr>

                                <th>
                                    Date
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Score
                                </th>

                               

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($records as $record)

                                <tr>


                                    <!-- Date -->

                                    <td>

                                        <div class="date-text">

                                            {{ $record->attendance_date->format('M d, Y') }}

                                        </div>

                                    </td>


                                    <!-- Status -->

                                    <td>

                                        @if($record->status === 'Present')

                                            <span class="status-badge status-present">

                                                Present

                                            </span>

                                        @elseif($record->status === 'Late')

                                            <span class="status-badge status-late">

                                                Late

                                            </span>

                                        @else

                                            <span class="status-badge status-absent">

                                                Absent

                                            </span>

                                        @endif

                                    </td>


                                    <!-- Score -->

                                    <td>

                                        <div class="date-text">

                                            @if($record->status === 'Present')

                                                1.00

                                            @elseif($record->status === 'Late')

                                                0.75

                                            @else

                                                0.00

                                            @endif

                                        </div>

                                    </td>


                                   

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <!-- Empty State -->

                    <div class="empty-state">

                        <div class="empty-icon">

                            <i class="bi bi-calendar-check"></i>

                        </div>


                        <h5>
                            No attendance records found
                        </h5>


                        <p>
                            This student does not have any attendance records yet.
                        </p>

                    </div>

                @endif

            </div>


            <!-- Footer -->

            <div class="card-footer-custom">

                Showing

                <strong>

                    {{ $records->count() }}

                </strong>

                attendance record(s)

            </div>

        </div>

    </div>

</div>


<!-- =========================================
     JAVASCRIPT
========================================= -->

<script>

    const mobileMenuBtn =
        document.getElementById('mobileMenuBtn');

    const sidebar =
        document.getElementById('sidebar');


    if (mobileMenuBtn) {

        mobileMenuBtn.addEventListener(
            'click',
            function () {

                sidebar.classList.toggle('show');

            }
        );

    }

</script>

</body>
</html>