<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Dashboard | SchoolSync</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        :root {
            --navy: #0b1f3a;
            --blue: #1769e0;
            --blue-dark: #0d4fb8;
            --yellow: #f7c948;
            --light-blue: #eef5ff;
            --text: #172033;
            --muted: #687386;
            --white: #ffffff;
            --border: #e7ebf2;
            --green: #22a06b;
            --red: #e55353;
            --orange: #f59e0b;
            --purple: #7950f2;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f6f8fc;
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

        /* ================================
           SIDEBAR
        ================================= */

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

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.30);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 8px;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: var(--white);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .logo-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

        .logo-text {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.4px;
        }

        .menu-title {
            color: rgba(255,255,255,0.42);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 0 10px;
            margin: 22px 0 8px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 4px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            border-radius: 10px;
            color: rgba(255,255,255,0.68);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .sidebar-menu a i {
            font-size: 17px;
            width: 20px;
            text-align: center;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.07);
            color: #fff;
        }

        .sidebar-menu a.active {
            background: var(--blue);
            color: #fff;
            box-shadow: 0 5px 15px rgba(23,105,224,0.22);
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

        /* ================================
           MAIN
        ================================= */

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        /* ================================
           TOPBAR
        ================================= */

        .topbar {
            height: 74px;
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .mobile-menu {
            display: none;
            border: none;
            background: transparent;
            font-size: 23px;
            color: var(--navy);
        }

        .search-box {
            width: 310px;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9aa3b2;
        }

        .search-box input {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px 14px 10px 40px;
            font-size: 13px;
            outline: none;
            background: #fafbfe;
        }

        .search-box input:focus {
            border-color: var(--blue);
            background: #ffffff;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .top-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #f5f7fb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5f6b7c;
            position: relative;
            text-decoration: none;
        }

        .notification-dot {
            width: 7px;
            height: 7px;
            background: #ef4444;
            border-radius: 50%;
            position: absolute;
            top: 8px;
            right: 8px;
            border: 2px solid white;
        }

        /* ================================
           TOP PROFILE
        ================================= */

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-blue);
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
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 2px;
        }

        /* ================================
           CONTENT
        ================================= */

        .content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-header-left h1 {
            font-size: 24px;
            font-weight: 800;
            color: var(--navy);
            margin: 0 0 6px;
        }

        .page-header-left p {
            margin: 0;
            font-size: 13px;
            color: var(--muted);
        }

        /* ================================
           WELCOME HERO
        ================================= */

        .welcome-card {
            background: linear-gradient(135deg, #0b1f3a, #1769e0);
            border-radius: 18px;
            padding: 28px 30px;
            color: white;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .welcome-card::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            right: -80px;
            top: -140px;
        }

        .welcome-card::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
            right: 150px;
            bottom: -130px;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome-label {
            color: rgba(255,255,255,0.62);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 7px;
        }

        .welcome-title {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 27px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .welcome-text {
            color: rgba(255,255,255,0.72);
            font-size: 12px;
            max-width: 650px;
        }

        .student-code {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 13px;
            padding: 6px 11px;
            border-radius: 20px;
            background: rgba(255,255,255,0.10);
            font-size: 10px;
            font-weight: 600;
        }

        /* ================================
           STAT CARDS
        ================================= */

        .stat-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 20px;
            height: 100%;
            transition: all 0.25s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(11,31,58,0.05);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 17px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .icon-blue {
            background: var(--light-blue);
            color: var(--blue);
        }

        .icon-green {
            background: #eaf8f1;
            color: var(--green);
        }

        .icon-orange {
            background: #fff6e7;
            color: var(--orange);
        }

        .icon-purple {
            background: #f1edff;
            color: var(--purple);
        }

        .stat-label {
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
        }

        .stat-value {
            color: var(--navy);
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 23px;
            font-weight: 800;
            margin-top: 4px;
        }

        .stat-sub {
            margin-top: 4px;
            color: var(--muted);
            font-size: 10px;
        }

        /* ================================
           INFORMATION CARDS
        ================================= */

        .info-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 22px;
            height: 100%;
        }

        .info-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid #eef1f5;
        }

        .info-card-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            background: var(--light-blue);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .info-card-title {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
            color: var(--navy);
        }

        .info-card-subtitle {
            margin: 3px 0 0;
            font-size: 10px;
            color: var(--muted);
        }

        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eef1f5;
            gap: 15px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-row-label {
            color: var(--muted);
            font-size: 11px;
        }

        .info-row-value {
            color: var(--text);
            font-size: 12px;
            font-weight: 700;
            text-align: right;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-badge.active {
            background: #eaf8f1;
            color: var(--green);
        }

        .status-badge.pending {
            background: #fff6e7;
            color: var(--orange);
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* ================================
           ATTENDANCE
        ================================= */

        .attendance-rate-wrap {
            margin-top: 8px;
        }

        .attendance-rate {
            display: flex;
            align-items: flex-end;
            gap: 7px;
        }

        .attendance-rate-number {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 31px;
            line-height: 1;
            font-weight: 800;
            color: var(--navy);
        }

        .attendance-rate-symbol {
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .progress-track {
            width: 100%;
            height: 8px;
            background: #edf1f7;
            border-radius: 20px;
            overflow: hidden;
            margin-top: 12px;
        }

        .progress-bar-custom {
            height: 100%;
            background: var(--blue);
            border-radius: 20px;
        }

        .attendance-summary {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: 15px;
        }

        .attendance-small {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--muted);
            font-size: 10px;
        }

        .attendance-small strong {
            color: var(--text);
            font-size: 11px;
        }

        .mini-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .present-dot {
            background: var(--green);
        }

        .absent-dot {
            background: var(--red);
        }

        /* ================================
           QUICK LINKS
        ================================= */

        .quick-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #eef1f5;
            text-decoration: none;
        }

        .quick-link:last-child {
            border-bottom: none;
        }

        .quick-link-left {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .quick-link-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: var(--light-blue);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .quick-link-name {
            color: var(--text);
            font-size: 11px;
            font-weight: 700;
        }

        .quick-link-description {
            color: var(--muted);
            font-size: 9px;
            margin-top: 2px;
        }

        .quick-link-arrow {
            color: #9aa3b2;
            font-size: 12px;
        }

        /* ================================
           BUTTON
        ================================= */

        .dashboard-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #fff;
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .dashboard-button:hover {
            border-color: var(--blue);
            color: var(--blue);
            background: var(--light-blue);
        }

        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 1199px) {

            .search-box {
                width: 230px;
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

            .mobile-menu {
                display: block;
            }

            .content {
                padding: 22px;
            }

            .search-box {
                display: none;
            }

        }

        @media (max-width: 575px) {

            .topbar {
                padding: 0 15px;
            }

            .content {
                padding: 15px;
            }

            .profile-info {
                display: none;
            }

            .topbar-right {
                gap: 8px;
            }

            .page-header {
                align-items: flex-start;
                gap: 15px;
            }

            .page-header-left h1 {
                font-size: 21px;
            }

            .page-header-left p {
                font-size: 11px;
            }

            .welcome-card {
                padding: 23px 20px;
            }

            .welcome-title {
                font-size: 23px;
            }

            .info-card {
                padding: 17px;
            }

            .attendance-summary {
                flex-direction: column;
                align-items: flex-start;
            }

        }

    </style>

</head>

<body>


    <!-- ================================
         SIDEBAR
    ================================= -->

    <aside class="sidebar" id="sidebar">

        <div class="logo">

            <div class="logo-icon">
              <img
            src="{{ asset('images/schoolsync-logo.png') }}"
            alt="SchoolSync"
        >
            </div>

            <div class="logo-text">
                SchoolSync
            </div>

        </div>


        <div class="menu-title">
            Overview
        </div>

        <ul class="sidebar-menu">

            <li>

                <a
                    href="{{ route('student.dashboard') }}"
                    class="active"
                >

                    <i class="bi bi-grid-1x2-fill"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>

        </ul>


        <div class="menu-title">
            School
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.profile.edit') }}">

                    <i class="bi bi-person-circle"></i>

                    <span>
                        Profile
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('student.classes.index') }}">

                    <i class="bi bi-diagram-3"></i>

                    <span>
                        Classes
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('student.subjects.index') }}">

                    <i class="bi bi-book"></i>

                    <span>
                        Subjects
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('student.attendance.index') }}">

                    <i class="bi bi-calendar-check"></i>

                    <span>
                        Attendance
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('student.results.index') }}">

                    <i class="bi bi-bar-chart-line"></i>

                    <span>
                        Results
                    </span>

                </a>

            </li>

        </ul>


        <div class="menu-title">
            Academic
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.schedule.index') }}">

                    <i class="bi bi-calendar3"></i>

                    <span>
                        Schedule
                    </span>

                </a>

            </li>

        </ul>


        <div class="menu-title">
            Finance
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.finance.index') }}">

                    <i class="bi bi-wallet2"></i>

                    <span>
                        Fees & Payments
                    </span>

                </a>

            </li>

        </ul>


        <div class="menu-title">
            Communication
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.announcements.index') }}">

                    <i class="bi bi-megaphone"></i>

                    <span>
                        Announcements
                    </span>

                </a>

            </li>

        </ul>


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

                    <i class="bi bi-box-arrow-left"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    <!-- ================================
         MAIN
    ================================= -->

    <main class="main">


        <!-- ================================
             TOPBAR
        ================================= -->

        <header class="topbar">

            <div class="topbar-left">

                <button
                    class="mobile-menu"
                    id="mobileMenu"
                    type="button"
                >

                    <i class="bi bi-list"></i>

                </button>


                <div class="search-box">

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        placeholder="Search anything..."
                    >

                </div>

            </div>


            <div class="topbar-right">

                <a
                    href="#"
                    class="top-icon"
                >

                    <i class="bi bi-bell"></i>

                    <span class="notification-dot"></span>

                </a>


                <div class="profile">

                    <div class="profile-avatar">

                        {{ strtoupper(substr($user->name ?? 'ST', 0, 2)) }}

                    </div>


                    <div class="profile-info">

                        <strong>
                            {{ $user->name ?? '-' }}
                        </strong>

                        <span>
                            Student
                        </span>

                    </div>

                </div>

            </div>

        </header>


        <!-- ================================
             CONTENT
        ================================= -->

        <div class="content">


            <!-- PAGE HEADER -->

            <div class="page-header">

                <div class="page-header-left">

                    <h1>
                        Student Dashboard
                    </h1>

                    <p>
                        Welcome back. Here's an overview of your school information.
                    </p>

                </div>

            </div>


            <!-- ================================
                 WELCOME CARD
            ================================= -->

            <section class="welcome-card">

                <div class="welcome-content">

                    <div class="welcome-label">
                        Welcome back
                    </div>


                    <div class="welcome-title">

                        {{ $user->name ?? 'Student' }}

                    </div>


                    <div class="welcome-text">

                        Stay updated with your classes, subjects, attendance,
                        schedule, and school payments.

                    </div>


                    @if($student)

                        <div class="student-code">

                            <i class="bi bi-person-badge"></i>

                            Student ID:

                            {{ $student->student_code ?? $student->student_id ?? '-' }}

                        </div>

                    @endif

                </div>

            </section>


            <!-- ================================
                 STATISTICS
            ================================= -->

            <div class="row g-3">


                <!-- Current Class -->

                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon icon-blue">

                                <i class="bi bi-diagram-3-fill"></i>

                            </div>

                        </div>


                        <div class="stat-label">
                            Current Class
                        </div>


                        <div class="stat-value">

                            {{ $currentEnrollment?->classroom?->class_name ?? '-' }}

                        </div>


                        <div class="stat-sub">

                            {{ $currentEnrollment?->classroom?->academicYear?->year_name ?? 'Academic Year -' }}

                        </div>

                    </div>

                </div>


                <!-- Subjects -->

                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon icon-purple">

                                <i class="bi bi-book-fill"></i>

                            </div>

                        </div>


                        <div class="stat-label">
                            Subjects
                        </div>


                        <div class="stat-value">

                            {{ $subjectsCount ?? 0 }}

                        </div>


                        <div class="stat-sub">
                            Assigned to your class
                        </div>

                    </div>

                </div>


                <!-- Attendance -->

                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon icon-green">

                                <i class="bi bi-calendar-check-fill"></i>

                            </div>

                        </div>


                        <div class="stat-label">
                            Attendance
                        </div>


                        <div class="stat-value">

                            {{ number_format((float) ($attendanceRate ?? 0), 1) }}%

                        </div>


                        <div class="stat-sub">

                            {{ $presentCount ?? 0 }} Present /

                            {{ $absentCount ?? 0 }} Absent

                        </div>

                    </div>

                </div>


                <!-- Outstanding Fees -->

                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon icon-orange">

                                <i class="bi bi-wallet2"></i>

                            </div>

                        </div>


                        <div class="stat-label">
                            Outstanding Fees
                        </div>


                        <div class="stat-value">

                            {{ number_format((float) ($outstandingAmount ?? 0), 0) }}

                        </div>


                        <div class="stat-sub">
                            MMK remaining
                        </div>

                    </div>

                </div>


            </div>


            <!-- ================================
                 MAIN INFORMATION
            ================================= -->

            <div class="row g-3 mt-0">


                <!-- ============================
                     ACADEMIC OVERVIEW
                ============================= -->

                <div class="col-xl-7 col-lg-7">

                    <div class="info-card">

                        <div class="info-card-header">

                            <div class="info-card-icon">

                                <i class="bi bi-mortarboard"></i>

                            </div>

                            <div>

                                <h3 class="info-card-title">
                                    Academic Overview
                                </h3>

                                <p class="info-card-subtitle">
                                    Your current academic information
                                </p>

                            </div>

                        </div>


                        <!-- Class -->

                        <div class="info-row">

                            <span class="info-row-label">
                                Class
                            </span>

                            <span class="info-row-value">

                                {{ $currentEnrollment?->classroom?->class_name ?? '-' }}

                            </span>

                        </div>


                        <!-- Academic Year -->

                        <div class="info-row">

                            <span class="info-row-label">
                                Academic Year
                            </span>

                            <span class="info-row-value">

                                {{ $currentEnrollment?->classroom?->academicYear?->year_name ?? '-' }}

                            </span>

                        </div>


                        <!-- Subjects -->

                        <div class="info-row">

                            <span class="info-row-label">
                                Total Subjects
                            </span>

                            <span class="info-row-value">

                                {{ $subjectsCount ?? 0 }}

                                {{ (($subjectsCount ?? 0) == 1) ? 'Subject' : 'Subjects' }}

                            </span>

                        </div>


                        <!-- Attendance Grade -->

                        <div class="info-row">

                            <span class="info-row-label">
                                Attendance Grade
                            </span>

                            <span class="info-row-value">

                                @if(($attendanceGrade ?? '-') !== '-')

                                    <span class="status-badge active">

                                        <span class="status-dot"></span>

                                        {{ $attendanceGrade }}

                                    </span>

                                @else

                                    -

                                @endif

                            </span>

                        </div>


                    </div>

                </div>


                <!-- ============================
                     ATTENDANCE OVERVIEW
                ============================= -->

                <div class="col-xl-5 col-lg-5">

                    <div class="info-card">

                        <div class="info-card-header">

                            <div class="info-card-icon">

                                <i class="bi bi-calendar-check"></i>

                            </div>

                            <div>

                                <h3 class="info-card-title">
                                    Attendance Overview
                                </h3>

                                <p class="info-card-subtitle">
                                    Current attendance summary
                                </p>

                            </div>

                        </div>


                      <div class="attendance-rate-wrap">

    <!-- Percentage -->

    <div class="attendance-rate">

        <div class="attendance-rate-number">
            {{ number_format((float) ($attendanceRate ?? 0), 1) }}
        </div>

        <div class="attendance-rate-symbol">
            %
        </div>

    </div>


    <!-- Progress -->



    <!-- Present / Absent -->

    <div class="attendance-summary">

        <div class="attendance-small">

            <span class="mini-dot present-dot"></span>

            Present

            <strong>
                {{ $presentCount ?? 0 }}
            </strong>

        </div>


        <div class="attendance-small">

            <span class="mini-dot absent-dot"></span>

            Absent

            <strong>
                {{ $absentCount ?? 0 }}
            </strong>

        </div>

    </div>

</div>




                        <!-- Total Records -->

                        <div class="info-row">

                            <span class="info-row-label">
                                Total Records
                            </span>

                            <span class="info-row-value">

                                {{ $totalAttendance ?? 0 }}

                            </span>

                        </div>


                    </div>

                </div>


            </div>


            <!-- ================================
                 FINANCE + QUICK ACCESS
            ================================= -->

            <div class="row g-3 mt-0">


                <!-- ============================
                     FINANCE OVERVIEW
                ============================= -->

                <div class="col-xl-7 col-lg-7">

                    <div class="info-card">

                        <div class="info-card-header">

                            <div class="info-card-icon">

                                <i class="bi bi-wallet2"></i>

                            </div>

                            <div>

                                <h3 class="info-card-title">
                                    Finance Overview
                                </h3>

                                <p class="info-card-subtitle">
                                    Your current school fee summary
                                </p>

                            </div>

                        </div>


                        <!-- Total Fees -->

                        <div class="info-row">

                            <span class="info-row-label">
                                Total Fees
                            </span>

                            <span class="info-row-value">

                                {{ number_format((float) ($totalFees ?? 0), 2) }}

                                MMK

                            </span>

                        </div>


                        <!-- Paid -->

                        <div class="info-row">

                            <span class="info-row-label">
                                Paid Amount
                            </span>

                            <span
                                class="info-row-value"
                                style="color: var(--green);"
                            >

                                {{ number_format((float) ($paidAmount ?? 0), 2) }}

                                MMK

                            </span>

                        </div>


                        <!-- Outstanding -->

                        <div class="info-row">

                            <span class="info-row-label">
                                Outstanding Balance
                            </span>

                            <span
                                class="info-row-value"
                                style="color: var(--orange);"
                            >

                                {{ number_format((float) ($outstandingAmount ?? 0), 2) }}

                                MMK

                            </span>

                        </div>


                        <div class="mt-3">

                            <a
                                href="{{ route('student.finance.index') }}"
                                class="dashboard-button"
                            >

                                <i class="bi bi-wallet2"></i>

                                View Fees & Payments

                            </a>

                        </div>


                    </div>

                </div>


                <!-- ============================
                     QUICK ACCESS
                ============================= -->

                <div class="col-xl-5 col-lg-5">

                    <div class="info-card">

                        <div class="info-card-header">

                            <div class="info-card-icon">

                                <i class="bi bi-lightning"></i>

                            </div>

                            <div>

                                <h3 class="info-card-title">
                                    Quick Access
                                </h3>

                                <p class="info-card-subtitle">
                                    Frequently used student pages
                                </p>

                            </div>

                        </div>


                        <!-- Subjects -->

                        <a
                            href="{{ route('student.subjects.index') }}"
                            class="quick-link"
                        >

                            <div class="quick-link-left">

                                <div class="quick-link-icon">

                                    <i class="bi bi-book"></i>

                                </div>

                                <div>

                                    <div class="quick-link-name">
                                        My Subjects
                                    </div>

                                    <div class="quick-link-description">
                                        View your current subjects
                                    </div>

                                </div>

                            </div>


                            <i class="bi bi-chevron-right quick-link-arrow"></i>

                        </a>


                        <!-- Attendance -->

                        <a
                            href="{{ route('student.attendance.index') }}"
                            class="quick-link"
                        >

                            <div class="quick-link-left">

                                <div class="quick-link-icon">

                                    <i class="bi bi-calendar-check"></i>

                                </div>

                                <div>

                                    <div class="quick-link-name">
                                        Attendance
                                    </div>

                                    <div class="quick-link-description">
                                        Check your attendance records
                                    </div>

                                </div>

                            </div>


                            <i class="bi bi-chevron-right quick-link-arrow"></i>

                        </a>


                        <!-- Schedule -->

                        <a
                            href="{{ route('student.schedule.index') }}"
                            class="quick-link"
                        >

                            <div class="quick-link-left">

                                <div class="quick-link-icon">

                                    <i class="bi bi-calendar3"></i>

                                </div>

                                <div>

                                    <div class="quick-link-name">
                                        Schedule
                                    </div>

                                    <div class="quick-link-description">
                                        View your class schedule
                                    </div>

                                </div>

                            </div>


                            <i class="bi bi-chevron-right quick-link-arrow"></i>

                        </a>


                        <!-- Announcements -->

                        <a
                            href="{{ route('student.announcements.index') }}"
                            class="quick-link"
                        >

                            <div class="quick-link-left">

                                <div class="quick-link-icon">

                                    <i class="bi bi-megaphone"></i>

                                </div>

                                <div>

                                    <div class="quick-link-name">
                                        Announcements
                                    </div>

                                    <div class="quick-link-description">
                                        View school announcements
                                    </div>

                                </div>

                            </div>


                            <i class="bi bi-chevron-right quick-link-arrow"></i>

                        </a>


                    </div>

                </div>


            </div>


        </div>

    </main>


    <!-- ================================
         JAVASCRIPT
    ================================= -->

    <script>

        const mobileMenu =
            document.getElementById("mobileMenu");

        const sidebar =
            document.getElementById("sidebar");

        if (mobileMenu && sidebar) {

            mobileMenu.addEventListener(
                "click",
                function () {

                    sidebar.classList.toggle("show");

                }
            );

        }

    </script>

</body>

</html>