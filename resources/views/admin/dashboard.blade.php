<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>SchoolSync | Dashboard</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
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

        /* =========================
           SIDEBAR
        ========================= */

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

            background: var(--white
            );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;

            margin-right: 12px;

            box-shadow:
                0 7px 20px rgba(
                    23,
                    105,
                    224,
                    0.35
                );
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

            background: rgba(
                255,
                255,
                255,
                0.06
            );

            transform: translateX(2px);
        }

        .menu-link.active {
            color: white;

            background: linear-gradient(
                90deg,
                #1769e0,
                #2377ed
            );

            box-shadow:
                0 8px 20px rgba(
                    23,
                    105,
                    224,
                    0.25
                );
        }

        /* =========================
           SIDEBAR FOOTER
        ========================= */

        .sidebar-footer {
            margin-top: 25px;

            padding: 18px 14px 14px;

            border-top:
                1px solid
                rgba(255,255,255,0.08);
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
            background: rgba(
                128,
                128,
                128,
                0.08
            );

            color: #808080 !important;
        }

        .logout:hover i {
            color: #808080 !important;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 270px;

            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 82px;

            background: white;

            border-bottom:
                1px solid
                var(--border);

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

            transform:
                translateY(-50%);

            color: #9aa5b5;
        }

        .search input {
            width: 100%;

            border:
                1px solid
                var(--border);

            background: #f8f9fc;

            padding:
                11px
                15px
                11px
                42px;

            border-radius: 10px;

            font-size: 12px;

            outline: none;
        }

        .search input:focus {
            background: white;

            border-color: #a9c7f5;
        }

        .top-right {
            display: flex;

            align-items: center;

            gap: 15px;
        }

        .top-icon {
            width: 39px;
            height: 39px;

            border:
                1px solid
                var(--border);

            border-radius: 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--muted);

            position: relative;
        }

        .top-icon:hover {
            color: var(--blue);

            background:
                var(--blue-light);
        }

        .notification-dot {
            position: absolute;

            width: 7px;
            height: 7px;

            background: var(--red);

            border-radius: 50%;

            right: 7px;
            top: 6px;
        }

        .profile {
            display: flex;

            align-items: center;

            gap: 10px;

            padding-left: 12px;

            border-left:
                1px solid
                var(--border);
        }

        .avatar {
            width: 39px;
            height: 39px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #d9e9ff,
                    #edf5ff
                );

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

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 30px 32px;
        }

        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;
        }

        .page-title {
            font-size: 25px;

            font-weight: 800;

            margin-bottom: 5px;
        }

        .page-subtitle {
            color: var(--muted);

            font-size: 13px;

            margin: 0;
        }

        /* =========================
           STAT CARDS
        ========================= */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 20px;
        }

        .stat-card {
            background: white;

            border:
                1px solid
                var(--border);

            border-radius: 14px;

            box-shadow: var(--shadow);

            padding: 20px;
        }

        .stat-top {
            display: flex;

            justify-content: space-between;

            align-items: flex-start;
        }

        .stat-label {
            font-size: 11px;

            color: var(--muted);

            margin-bottom: 7px;
        }

        .stat-number {
            font-family:
                "Plus Jakarta Sans";

            font-size: 26px;

            font-weight: 800;
        }

        .stat-icon {
            width: 42px;
            height: 42px;

            border-radius: 11px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;
        }

        .student-icon {
            background: #eef5ff;

            color: #1769e0;
        }

        .teacher-icon {
            background: #fff0f0;

            color: #e55353;
        }

        .staff-icon {
            background: #eafaf3;

            color: #18a66b;
        }

        .class-icon {
            background: #f2edff;

            color: #7655d6;
        }

        /* =========================
           DASHBOARD GRID
        ========================= */

        .dashboard-grid {
            display: grid;

            grid-template-columns:
                1fr 1.3fr;

            gap: 20px;
        }

        .dashboard-card {
            background: white;

            border:
                1px solid
                var(--border);

            border-radius: 14px;

            box-shadow: var(--shadow);

            overflow: hidden;
        }

        .card-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 20px 22px;

            border-bottom:
                1px solid
                var(--border);
        }

        .card-title {
            font-family:
                "Plus Jakarta Sans";

            font-size: 15px;

            font-weight: 700;
        }

        .card-body {
            padding: 22px;
        }

        /* =========================
           ATTENDANCE
        ========================= */

     .attendance-circle {
    width: 155px;
    height: 155px;

    border-radius: 50%;

    background: conic-gradient(
        var(--blue) 0deg var(--attendance-angle),
        #e8edf5 var(--attendance-angle) 360deg
    );

    display: flex;
    align-items: center;
    justify-content: center;

    margin: 5px auto 22px;

    position: relative;
}

        .attendance-circle::after {
            content: "";

            width: 119px;
            height: 119px;

            background: white;

            border-radius: 50%;

            position: absolute;
        }

        .attendance-inner {
            position: relative;

            z-index: 2;

            text-align: center;
        }

        .attendance-percent {
            display: block;

            font-family:
                "Plus Jakarta Sans";

            font-size: 25px;

            font-weight: 800;
        }

        .attendance-label {
            display: block;

            font-size: 10px;

            color: var(--muted);

            margin-top: 2px;
        }

        .attendance-stats {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 10px;
        }

        .attendance-stat {
            text-align: center;

            padding: 12px 5px;

            border-radius: 10px;

            background: var(--bg);
        }

        .attendance-number {
            font-family:
                "Plus Jakarta Sans";

            font-size: 17px;

            font-weight: 800;
        }

        .attendance-label-small {
            font-size: 10px;

            color: var(--muted);

            margin-top: 3px;
        }

        .present {
            color: var(--green);
        }

        .absent {
            color: var(--red);
        }

        .late {
            color: var(--orange);
        }

        /* =========================
           RECENT STUDENTS
        ========================= */

        .student-list {
            display: flex;

            flex-direction: column;
        }

        .student-item {
            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 14px 0;

            border-bottom:
                1px solid
                var(--border);
        }

        .student-item:last-child {
            border-bottom: none;
        }

        .student-info {
            display: flex;

            align-items: center;

            gap: 11px;
        }

        .student-avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                var(--blue-light);

            color: var(--blue);

            font-size: 11px;

            font-weight: 800;
        }

        .student-name {
            font-size: 12px;

            font-weight: 700;
        }

        .student-id {
            font-size: 10px;

            color: var(--muted);

            margin-top: 3px;
        }

        .student-badge {
            display: inline-flex;

            align-items: center;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: 700;

            background:
                var(--blue-light);

            color: var(--blue);
        }

        .empty-state {
            text-align: center;

            padding: 40px 10px;

            color: var(--muted);

            font-size: 12px;
        }

        .empty-state i {
            font-size: 30px;

            display: block;

            margin-bottom: 10px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

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

            .stats-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }

        @media (max-width: 991px) {

            .sidebar {
                transform:
                    translateX(-100%);
            }

            .sidebar.show {
                transform:
                    translateX(0);
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
                padding: 22px 20px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 767px) {

            .page-header {
                align-items: flex-start;

                flex-direction: column;

                gap: 15px;
            }

        }

        @media (max-width: 575px) {

            .content {
                padding: 18px 14px;
            }

            .topbar {
                height: 70px;
            }

            .profile-name,
            .profile-role {
                display: none;
            }

            .page-title {
                font-size: 21px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside
    class="sidebar"
    id="sidebar"
>

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


        <!-- OVERVIEW -->

        <div class="sidebar-section">
            Overview
        </div>

        <a
            href="{{ route('admin.dashboard') }}"
            class="menu-link active"
        >
            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard
        </a>


        <!-- PEOPLE -->

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


        <!-- ACADEMIC -->

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
            class="menu-link"
        >
            <i class="bi bi-calendar-check"></i>

            Attendance
        </a>


        <!-- FINANCE -->

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


    <!-- SIDEBAR FOOTER -->

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


<!-- =========================================================
     MAIN
========================================================= -->

<main class="main">


    <!-- =====================================================
         TOPBAR
    ====================================================== -->

    <header class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button
                class="mobile-btn"
                id="mobileMenu"
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


            <!-- NOTIFICATION -->

            <a
                href="#"
                class="top-icon"
            >

                <i class="bi bi-bell"></i>

                <span class="notification-dot"></span>

            </a>


            <!-- PROFILE -->

            <div class="profile">

    <div class="avatar">
        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
    </div>

    <div>
        <div class="profile-name">
            {{ Auth::user()->name }}
        </div>

        <div class="profile-role">
            {{ ucfirst(Auth::user()->role) }}
        </div>
    </div>

</div>

                <i
                    class="bi bi-chevron-down text-muted small"
                ></i>

            </div>

        </div>

    </header>


    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <section class="content">


        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Dashboard
                </h1>

                <p class="page-subtitle">
                    Overview of your SchoolSync school management system.
                </p>

            </div>

        </div>


        <!-- =================================================
             STATISTICS
        ================================================== -->

        <div class="stats-grid">


            <!-- STUDENTS -->

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Students
                        </div>

                        <div class="stat-number">
                            {{ $totalStudents }}
                        </div>

                    </div>

                    <div class="stat-icon student-icon">

                        <i class="bi bi-mortarboard-fill"></i>

                    </div>

                </div>

            </div>


            <!-- TEACHERS -->

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Teachers
                        </div>

                        <div class="stat-number">
                            {{ $totalTeachers }}
                        </div>

                    </div>

                    <div class="stat-icon teacher-icon">

                        <i class="bi bi-person-video3"></i>

                    </div>

                </div>

            </div>


            <!-- STAFF -->

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Staff
                        </div>

                        <div class="stat-number">
                            {{ $totalStaff }}
                        </div>

                    </div>

                    <div class="stat-icon staff-icon">

                        <i class="bi bi-person-badge-fill"></i>

                    </div>

                </div>

            </div>


            <!-- CLASSES -->

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Active Classes
                        </div>

                        <div class="stat-number">
                            {{ $activeClasses }}
                        </div>

                    </div>

                    <div class="stat-icon class-icon">

                        <i class="bi bi-diagram-3"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- =================================================
             ATTENDANCE + RECENT STUDENTS
        ================================================== -->

        <div class="dashboard-grid">


            <!-- =================================================
                 ATTENDANCE
            ================================================== -->

            <div class="dashboard-card">

                <div class="card-header">

                    <div class="card-title">
                        Today's Attendance
                    </div>

                    <i
                        class="bi bi-calendar-check"
                        style="color: var(--blue);"
                    ></i>

                </div>


                <div class="card-body">


<div
    class="attendance-circle"
    style="--attendance-angle: {{ ($attendancePercentage / 100) * 360 }}deg;"
>

                        <div class="attendance-inner">

                            <span class="attendance-percent">
                                {{ $attendancePercentage }}%
                            </span>

                            <span class="attendance-label">
                                Attendance
                            </span>

                        </div>

                    </div>


                    <div class="attendance-stats">


                        <!-- PRESENT -->

                        <div class="attendance-stat">

                            <div
                                class="attendance-number present"
                            >
                                {{ $presentCount }}
                            </div>

                            <div class="attendance-label-small">
                                Present
                            </div>

                        </div>


                        <!-- ABSENT -->

                        <div class="attendance-stat">

                            <div
                                class="attendance-number absent"
                            >
                                {{ $absentCount }}
                            </div>

                            <div class="attendance-label-small">
                                Absent
                            </div>

                        </div>


                        <!-- LATE -->

                        <div class="attendance-stat">

                            <div
                                class="attendance-number late"
                            >
                                {{ $lateCount }}
                            </div>

                            <div class="attendance-label-small">
                                Late
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 RECENT STUDENTS
            ================================================== -->

            <div class="dashboard-card">


                <div class="card-header">

                    <div class="card-title">
                        Recent Students
                    </div>

                    <a
                        href="{{ route('admin.users.index') }}"
                        style="
                            color: var(--blue);
                            font-size: 11px;
                            font-weight: 600;
                        "
                    >
                        View All
                    </a>

                </div>


                <div class="card-body">


                    @if($recentStudents->count() > 0)

                        <div class="student-list">


                            @foreach($recentStudents as $student)

                                @php

                                    $studentName =
                                        $student->user->name
                                        ?? 'Student';

                                    $initials =
                                        strtoupper(
                                            substr(
                                                $studentName,
                                                0,
                                                2
                                            )
                                        );

                                @endphp


                                <div class="student-item">


                                    <div class="student-info">


                                        <div class="student-avatar">
                                            {{ $initials }}
                                        </div>


                                        <div>

                                            <div class="student-name">
                                                {{ $studentName }}
                                            </div>

                                            <div class="student-id">
                                                Student ID:
                                                {{ $student->student_id }}
                                            </div>

                                        </div>

                                    </div>


                                    <span class="student-badge">
                                        Student
                                    </span>

                                </div>

                            @endforeach


                        </div>

                    @else

                        <div class="empty-state">

                            <i class="bi bi-people"></i>

                            No students found.

                        </div>

                    @endif


                </div>

            </div>

        </div>


    </section>

</main>


<!-- =========================================================
     MOBILE SIDEBAR JAVASCRIPT
========================================================= -->

<script>

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

</script>


</body>

</html>