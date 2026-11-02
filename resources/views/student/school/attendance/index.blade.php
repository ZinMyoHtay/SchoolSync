<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Attendance | SchoolSync</title>

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
            background: #fff;
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

        .back-button {
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

        .back-button:hover {
            border-color: var(--blue);
            color: var(--blue);
            background: var(--light-blue);
        }

        /* ================================
           CLASS SUMMARY
        ================================= */

        .class-summary {
            background: linear-gradient(135deg, #0b1f3a, #1769e0);
            border-radius: 18px;
            padding: 26px 30px;
            color: #fff;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .class-summary::after {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            right: -60px;
            top: -120px;
        }

        .class-summary-content {
            position: relative;
            z-index: 2;
        }

        .summary-label {
            color: rgba(255,255,255,0.62);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .summary-class {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .summary-year {
            color: rgba(255,255,255,0.72);
            font-size: 12px;
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

        .icon-red {
            background: #fff0f0;
            color: var(--red);
        }

        .icon-orange {
            background: #fff6e7;
            color: var(--orange);
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

        /* ================================
           ATTENDANCE TABLE
        ================================= */

        .attendance-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            overflow: hidden;
            margin-top: 25px;
        }

        .attendance-card-header {
            padding: 21px 22px;
            border-bottom: 1px solid var(--border);
        }

        .attendance-card-header h3 {
            margin: 0;
            color: var(--navy);
            font-size: 15px;
            font-weight: 800;
        }

        .attendance-card-header p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .attendance-table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
        }

        .attendance-table th {
            background: #fafbfe;
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .attendance-table td {
            padding: 15px 20px;
            border-bottom: 1px solid #eef1f5;
            color: var(--text);
            font-size: 12px;
            vertical-align: middle;
        }

        .attendance-table tbody tr:last-child td {
            border-bottom: none;
        }

        .attendance-table tbody tr:hover {
            background: #fbfcff;
        }

        .date-value {
            font-weight: 700;
            color: var(--navy);
        }

        .class-value {
            color: var(--muted);
            font-size: 11px;
        }

        .attendance-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .attendance-badge.present {
            background: #eaf8f1;
            color: var(--green);
        }

        .attendance-badge.absent {
            background: #fff0f0;
            color: var(--red);
        }

        .attendance-badge.late {
            background: #fff6e7;
            color: var(--orange);
        }

        .attendance-badge.default {
            background: #f1f3f7;
            color: var(--muted);
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .grade-value {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            padding: 5px 9px;
            border-radius: 8px;
            background: var(--light-blue);
            color: var(--blue);
            font-size: 11px;
            font-weight: 800;
        }

        /* ================================
           EMPTY STATE
        ================================= */

        .empty-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 60px 25px;
            text-align: center;
            margin-top: 25px;
        }

        .empty-icon {
            width: 62px;
            height: 62px;
            border-radius: 16px;
            background: var(--light-blue);
            color: var(--blue);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 16px;
        }

        .empty-card h4 {
            margin: 0 0 6px;
            color: var(--navy);
            font-size: 16px;
            font-weight: 800;
        }

        .empty-card p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
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

            .class-summary {
                padding: 22px 20px;
            }

            .summary-class {
                font-size: 22px;
            }

            .attendance-table th,
            .attendance-table td {
                padding: 13px 15px;
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

                <a href="{{ route('student.dashboard') }}">

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

                <a
                    href="{{ route('student.attendance.index') }}"
                    class="active"
                >

                    <i class="bi bi-calendar-check"></i>

                    <span>
                        Attendance
                    </span>

                </a>

            </li>


            <!-- <li>

                <a href="{{ route('student.results.index') }}">

                    <i class="bi bi-bar-chart-line"></i>

                    <span>
                        Results
                    </span>

                </a>

            </li> -->

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
                        My Attendance
                    </h1>

                    <p>
                        View your attendance records and attendance grades.
                    </p>

                </div>


                <a
                    href="{{ route('student.dashboard') }}"
                    class="back-button"
                >

                    <i class="bi bi-arrow-left"></i>

                    Back

                </a>

            </div>


            <!-- ================================
                 CURRENT CLASS
            ================================= -->

            @if($currentEnrollment)

                <section class="class-summary">

                    <div class="class-summary-content">

                        <div class="summary-label">
                            Current Class
                        </div>

                        <div class="summary-class">

                            {{ $currentEnrollment->classroom?->class_name ?? '-' }}

                        </div>

                        <div class="summary-year">

                            Academic Year:

                            {{ $currentEnrollment->classroom?->academicYear?->year_name ?? '-' }}

                        </div>

                    </div>

                </section>

            @endif


            <!-- ================================
                 ATTENDANCE STATISTICS
            ================================= -->

            <div class="row g-3">


           
<!-- Grade -->

<div class="col-xl-3 col-md-6">

    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon icon-blue">

                <i class="bi bi-award-fill"></i>

            </div>

        </div>

        <div class="stat-label">
            Grade
        </div>

        <div class="stat-value">
            {{ $attendanceGrade }}
        </div>

    </div>

</div>



                <!-- Present -->

                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon icon-green">

                                <i class="bi bi-check-circle-fill"></i>

                            </div>

                        </div>

                        <div class="stat-label">
                            Present
                        </div>

                        <div class="stat-value">
                            {{ $presentCount }}
                        </div>

                    </div>

                </div>


                <!-- Absent -->

                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon icon-red">

                                <i class="bi bi-x-circle-fill"></i>

                            </div>

                        </div>

                        <div class="stat-label">
                            Absent
                        </div>

                        <div class="stat-value">
                            {{ $absentCount }}
                        </div>

                    </div>

                </div>


                <!-- Attendance Rate -->

                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon icon-orange">

                                <i class="bi bi-bar-chart-fill"></i>

                            </div>

                        </div>

                        <div class="stat-label">
                            Attendance Rate
                        </div>

                        <div class="stat-value">
                            {{ $attendanceRate }}%
                        </div>



                    </div>

                </div>

            </div>


            <!-- ================================
                 ATTENDANCE RECORDS
            ================================= -->

            @if($attendances->count() > 0)

                <div class="attendance-card">

                    <div class="attendance-card-header">

                        <h3>
                            Attendance Records
                        </h3>

                        <p>
                            Your attendance history for the current class
                        </p>

                    </div>


                    <div class="table-wrapper">

                        <table class="attendance-table">

                            <thead>

                                <tr>

                                    <th>
                                        Date
                                    </th>

                                    <th>
                                        Class
                                    </th>

                                    <th>
                                        Status
                                    </th>


                                </tr>

                            </thead>


                            <tbody>

                                @foreach($attendances as $attendance)

                                    @php

                                        $status =
                                            strtolower(
                                                trim(
                                                    $attendance->status ?? ''
                                                )
                                            );

                                    @endphp


                                    <tr>


                                        <!-- Date -->

                                        <td>

                                            <span class="date-value">

                                                {{ $attendance->attendance_date?->format('d M Y') ?? '-' }}

                                            </span>

                                        </td>


                                        <!-- Class -->

                                        <td>

                                            <span class="class-value">

                                                {{ $currentEnrollment->classroom?->class_name ?? '-' }}

                                            </span>

                                        </td>


                                        <!-- Status -->

                                        <td>

                                            @if($status === 'present')

                                                <span class="attendance-badge present">

                                                    <span class="badge-dot"></span>

                                                    Present

                                                </span>

                                            @elseif($status === 'absent')

                                                <span class="attendance-badge absent">

                                                    <span class="badge-dot"></span>

                                                    Absent

                                                </span>

                                            @elseif($status === 'late')

                                                <span class="attendance-badge late">

                                                    <span class="badge-dot"></span>

                                                    Late

                                                </span>

                                            @else

                                                <span class="attendance-badge default">

                                                    <span class="badge-dot"></span>

                                                    {{ ucfirst($attendance->status ?? '-') }}

                                                </span>

                                            @endif

                                        </td>




                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>


            @else

                <div class="empty-card">

                    <div class="empty-icon">

                        <i class="bi bi-calendar-x"></i>

                    </div>

                    <h4>
                        No Attendance Records
                    </h4>

                    <p>
                        No attendance records are available for your current class yet.
                    </p>

                </div>

            @endif


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

        mobileMenu.addEventListener(
            "click",
            function () {

                sidebar.classList.toggle("show");

            }
        );

    </script>

</body>

</html>