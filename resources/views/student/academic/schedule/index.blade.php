<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Schedule | SchoolSync</title>

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

    <!-- FullCalendar -->
    <link
        href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.css"
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

        /* =================================
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

        /* =================================
           MAIN
        ================================= */

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        /* =================================
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
            background: white;
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

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
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
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 2px;
        }

        /* =================================
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

        /* =================================
           STATS
        ================================= */

        .stat-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 20px;
            height: 100%;
            box-shadow: var(--shadow);
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 14px;
        }

        .stat-icon.blue {
            background: #eef5ff;
            color: var(--blue);
        }

        .stat-icon.green {
            background: #eaf8f1;
            color: var(--green);
        }

        .stat-icon.purple {
            background: #f0ebff;
            color: var(--purple);
        }

        .stat-icon.red {
            background: #fff0f0;
            color: var(--red);
        }

        .stat-label {
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .stat-value {
            font-family: "Plus Jakarta Sans", sans-serif;
            color: var(--navy);
            font-size: 23px;
            font-weight: 800;
        }

        /* =================================
           CALENDAR CARD
        ================================= */

        .calendar-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 22px;
            margin-top: 20px;
            box-shadow: var(--shadow);
        }

        .calendar-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .calendar-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .calendar-title-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .calendar-title h3 {
            margin: 0;
            color: var(--navy);
            font-size: 15px;
            font-weight: 700;
        }

        .calendar-title p {
            margin: 3px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        .calendar-controls {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .calendar-controls .btn {
            font-size: 12px;
            font-weight: 600;
            border-radius: 9px;
            padding: 8px 12px;
        }

        .calendar-filters {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
        }

        .calendar-filters .form-select {
            width: auto;
            min-width: 150px;
            border: 1px solid var(--border);
            border-radius: 9px;
            font-size: 12px;
            padding: 8px 35px 8px 11px;
        }

        .calendar-filters .form-select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 0.2rem rgba(23,105,224,0.08);
        }

        /* =================================
           FULLCALENDAR
        ================================= */

        #calendar {
            min-height: 650px;
        }

        .fc {
            font-family: "Inter", sans-serif;
        }

        .fc .fc-toolbar-title {
            color: var(--navy);
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 18px;
            font-weight: 800;
        }

        .fc .fc-button {
            background: #fff;
            border: 1px solid var(--border);
            color: var(--text);
            box-shadow: none;
            font-size: 12px;
            font-weight: 600;
        }

        .fc .fc-button:hover,
        .fc .fc-button:focus {
            background: var(--blue-light);
            border-color: var(--blue);
            color: var(--blue);
            box-shadow: none;
        }

        .fc .fc-button-primary:not(:disabled).fc-button-active,
        .fc .fc-button-primary:not(:disabled):active {
            background: var(--blue);
            border-color: var(--blue);
            color: #fff;
        }

        .fc .fc-daygrid-day-number {
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }

        .fc .fc-col-header-cell-cushion {
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            text-decoration: none;
        }

        .fc .fc-daygrid-day.fc-day-today {
            background: #f2f7ff;
        }

        .fc-event {
            border: none !important;
            border-radius: 7px !important;
            padding: 4px 7px !important;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
        }

        .fc-event.event-active {
            background: var(--blue) !important;
            color: #fff !important;
        }

        .fc-event.event-inactive {
            background: #e9edf3 !important;
            color: #6b7280 !important;
        }

        /* =================================
           LEGEND
        ================================= */

        .calendar-legend {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-top: 18px;
            padding-top: 15px;
            border-top: 1px solid var(--border);
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
        }

        .legend-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
        }

        .legend-dot.active {
            background: var(--blue);
        }

        .legend-dot.inactive {
            background: #cbd2dc;
        }

        /* =================================
           DETAILS MODAL
        ================================= */

        .modal-content {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }

        .modal-header {
            background: var(--navy);
            color: white;
            border: none;
            padding: 18px 20px;
        }

        .modal-title {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 15px;
            font-weight: 700;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .detail-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            padding: 13px 0;
            border-bottom: 1px solid #eef1f5;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            font-weight: 700;
        }

        .detail-value {
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
            text-align: right;
        }

        .detail-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .detail-status.active {
            background: #eaf8f1;
            color: var(--green);
        }

        .detail-status.inactive {
            background: #fff0f0;
            color: var(--red);
        }

        /* =================================
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

            .calendar-card-header {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
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

            .calendar-card {
                padding: 15px;
            }

            .calendar-controls {
                width: 100%;
                justify-content: flex-start;
                flex-wrap: wrap;
            }

            .calendar-filters {
                flex-direction: column;
            }

            .calendar-filters .form-select {
                width: 100%;
            }

            #calendar {
                min-height: 550px;
            }

            .fc .fc-toolbar {
                flex-direction: column;
                gap: 10px;
            }

        }

    </style>

</head>

<body>

    <!-- =================================
         STUDENT SIDEBAR
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
                <a href="{{ route('student.attendance.index') }}">

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
                <a
                    href="{{ route('student.schedule.index') }}"
                    class="active"
                >

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


    <!-- =================================
         MAIN
    ================================= -->

    <main class="main">


        <!-- =================================
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
                        id="scheduleSearch"
                        placeholder="Search schedule..."
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


        <!-- =================================
             CONTENT
        ================================= -->

        <div class="content">


            <!-- PAGE HEADER -->

            <div class="page-header">

                <div class="page-header-left">

                    <h1>
                        Schedule
                    </h1>

                    <p>
                        View your class schedule from the calendar.
                    </p>

                </div>


                <button
                    type="button"
                    class="btn btn-light border"
                    id="todayButton"
                    style="
                        font-size:12px;
                        font-weight:600;
                        border-radius:10px;
                        padding:9px 14px;
                    "
                >

                    <i class="bi bi-calendar-day me-1"></i>

                    Today

                </button>

            </div>


            <!-- =================================
                 STAT CARDS
            ================================= -->

            <div class="row g-3">


                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon blue">

                            <i class="bi bi-calendar-event"></i>

                        </div>

                        <div class="stat-label">
                            Total Schedules
                        </div>

                        <div class="stat-value">
                            {{ $totalSchedules }}
                        </div>

                    </div>

                </div>


                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon green">

                            <i class="bi bi-check-circle"></i>

                        </div>

                        <div class="stat-label">
                            Active
                        </div>

                        <div class="stat-value">
                            {{ $activeSchedules }}
                        </div>

                    </div>

                </div>


                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon purple">

                            <i class="bi bi-diagram-3"></i>

                        </div>

                        <div class="stat-label">
                            Classes
                        </div>

                        <div class="stat-value">
                            {{ $totalClasses }}
                        </div>

                    </div>

                </div>


                <div class="col-xl-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon red">

                            <i class="bi bi-pause-circle"></i>

                        </div>

                        <div class="stat-label">
                            Inactive
                        </div>

                        <div class="stat-value">
                            {{ $inactiveSchedules }}
                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================
                 CALENDAR
            ================================= -->

            <div class="calendar-card">


                <div class="calendar-card-header">


                    <div class="calendar-title">

                        <div class="calendar-title-icon">

                            <i class="bi bi-calendar3"></i>

                        </div>


                        <div>

                            <h3>
                                Class Schedule
                            </h3>

                            <p>
                                View your class schedule. Click an event to see details.
                            </p>

                        </div>

                    </div>


                    <div class="calendar-controls">

                        <button
                            type="button"
                            class="btn btn-light border"
                            id="prevButton"
                        >

                            <i class="bi bi-chevron-left"></i>

                        </button>


                        <button
                            type="button"
                            class="btn btn-light border"
                            id="calendarTodayButton"
                        >

                            Today

                        </button>


                        <button
                            type="button"
                            class="btn btn-light border"
                            id="nextButton"
                        >

                            <i class="bi bi-chevron-right"></i>

                        </button>

                    </div>

                </div>


                <!-- FILTERS -->

                <div class="calendar-filters">


                    <select
                        id="yearSelect"
                        class="form-select"
                    >

                        <option value="all">
                            All Academic Years
                        </option>

                        @foreach($academicYears as $year)

                            @php

                                $startYear = '-';

                                $endYear = '-';

                                try {

                                    if ($year->start_date) {
                                        $startYear =
                                            \Carbon\Carbon::parse(
                                                $year->start_date
                                            )->format('Y');
                                    }

                                    if ($year->end_date) {
                                        $endYear =
                                            \Carbon\Carbon::parse(
                                                $year->end_date
                                            )->format('Y');
                                    }

                                } catch (\Exception $e) {

                                    $startYear = '-';
                                    $endYear = '-';

                                }

                            @endphp

                            <option
                                value="{{ $year->academic_year_id }}"
                            >

                                {{ $startYear }} - {{ $endYear }}

                            </option>

                        @endforeach

                    </select>


                    <select
                        id="monthSelect"
                        class="form-select"
                    >

                        <option value="all">
                            All Months
                        </option>

                        <option value="0">
                            January
                        </option>

                        <option value="1">
                            February
                        </option>

                        <option value="2">
                            March
                        </option>

                        <option value="3">
                            April
                        </option>

                        <option value="4">
                            May
                        </option>

                        <option value="5">
                            June
                        </option>

                        <option value="6">
                            July
                        </option>

                        <option value="7">
                            August
                        </option>

                        <option value="8">
                            September
                        </option>

                        <option value="9">
                            October
                        </option>

                        <option value="10">
                            November
                        </option>

                        <option value="11">
                            December
                        </option>

                    </select>

                </div>


                <!-- FULLCALENDAR -->

                <div id="calendar"></div>


                <!-- LEGEND -->

                <div class="calendar-legend">

                    <div class="legend-item">

                        <span class="legend-dot active"></span>

                        Active Schedule

                    </div>


                    <div class="legend-item">

                        <span class="legend-dot inactive"></span>

                        Inactive Schedule

                    </div>

                </div>

            </div>

        </div>

    </main>


    <!-- =================================
         DETAILS MODAL
    ================================= -->

    <div
        class="modal fade"
        id="detailsModal"
        tabindex="-1"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">


                <div class="modal-header">

                    <h5 class="modal-title">

                        <i class="bi bi-calendar-event me-2"></i>

                        Schedule Details

                    </h5>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>

                </div>


                <div class="modal-body">


                    <div class="detail-row">

                        <div class="detail-label">
                            Date
                        </div>

                        <div
                            class="detail-value"
                            id="detailDate"
                        >
                            -
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Academic Year
                        </div>

                        <div
                            class="detail-value"
                            id="detailAcademicYear"
                        >
                            -
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Class
                        </div>

                        <div
                            class="detail-value"
                            id="detailClass"
                        >
                            -
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Subject
                        </div>

                        <div
                            class="detail-value"
                            id="detailSubject"
                        >
                            -
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Comment
                        </div>

                        <div
                            class="detail-value"
                            id="detailComment"
                        >
                            -
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Status
                        </div>

                        <div
                            class="detail-value"
                            id="detailStatus"
                        >
                            -
                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light border"
                        data-bs-dismiss="modal"
                        style="
                            font-size:12px;
                            font-weight:600;
                            border-radius:9px;
                            padding:8px 14px;
                        "
                    >

                        Close

                    </button>

                </div>

            </div>

        </div>

    </div>


    <!-- =================================
         BOOTSTRAP
    ================================= -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>


    <!-- =================================
         FULLCALENDAR
    ================================= -->

    <script
        src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.js"
    ></script>


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
        | CALENDAR
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            "DOMContentLoaded",
            function () {


                const calendarEl =
                    document.getElementById("calendar");


                const detailsModalElement =
                    document.getElementById("detailsModal");


                const detailsModal =
                    new bootstrap.Modal(
                        detailsModalElement
                    );


                /*
                |--------------------------------------------------------------------------
                | SAFE DATE FORMAT
                |--------------------------------------------------------------------------
                */

                function formatScheduleDate(
                    dateString
                ) {

                    if (!dateString) {
                        return "-";
                    }


                    /*
                    | Handle YYYY-MM-DD directly.
                    | This avoids the browser timezone issue.
                    */

                    const cleanDate =
                        String(dateString)
                            .substring(0, 10);


                    const parts =
                        cleanDate.split("-");


                    if (parts.length !== 3) {
                        return "-";
                    }


                    const year =
                        Number(parts[0]);


                    const month =
                        Number(parts[1]);


                    const day =
                        Number(parts[2]);


                    if (
                        !year ||
                        !month ||
                        !day
                    ) {
                        return "-";
                    }


                    const date =
                        new Date(
                            year,
                            month - 1,
                            day
                        );


                    if (
                        isNaN(
                            date.getTime()
                        )
                    ) {
                        return "-";
                    }


                    return date.toLocaleDateString(
                        "en-US",
                        {
                            month: "long",
                            day: "numeric",
                            year: "numeric"
                        }
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | FULLCALENDAR
                |--------------------------------------------------------------------------
                */

                const calendar =
                    new FullCalendar.Calendar(
                        calendarEl,
                        {

                            initialView:
                                "dayGridMonth",


                            height:
                                "auto",


                            headerToolbar:
                                {
                                    left: "",
                                    center: "title",
                                    right: ""
                                },


                            events:
                                "{{ route('student.schedule.data') }}",


                            eventDisplay:
                                "block",


                            dayMaxEvents:
                                3,


                            eventDidMount:
                                function(info) {

                                    const status =
                                        String(
                                            info.event.extendedProps.status
                                                || ""
                                        ).toLowerCase();


                                    if (
                                        status === "inactive"
                                    ) {

                                        info.el.classList.add(
                                            "event-inactive"
                                        );

                                    } else {

                                        info.el.classList.add(
                                            "event-active"
                                        );

                                    }

                                },


                            /*
                            |--------------------------------------------------------------------------
                            | READ ONLY
                            |--------------------------------------------------------------------------
                            |
                            | No dateClick.
                            | No create modal.
                            | No POST.
                            | No PUT.
                            | No DELETE.
                            |
                            */

                            eventClick:
                                function(info) {

                                    const event =
                                        info.event;


                                    const props =
                                        event.extendedProps;


                                    /*
                                    | Date
                                    */

                                    let eventDate =
                                        props.schedule_date
                                        || event.startStr
                                        || "";


                                    document.getElementById(
                                        "detailDate"
                                    ).textContent =
                                        formatScheduleDate(
                                            eventDate
                                        );


                                    /*
                                    | Academic Year
                                    */

                                    document.getElementById(
                                        "detailAcademicYear"
                                    ).textContent =
                                        props.academic_year
                                        || "-";


                                    /*
                                    | Class
                                    */

                                    document.getElementById(
                                        "detailClass"
                                    ).textContent =
                                        props.classroom
                                        || "-";


                                    /*
                                    | Subject
                                    */

                                    document.getElementById(
                                        "detailSubject"
                                    ).textContent =
                                        props.subject
                                        || event.title
                                        || "-";


                                    /*
                                    | Comment
                                    */

                                    document.getElementById(
                                        "detailComment"
                                    ).textContent =
                                        props.comment
                                        || "-";


                                    /*
                                    | Status
                                    */

                                    const statusElement =
                                        document.getElementById(
                                            "detailStatus"
                                        );


                                    const status =
                                        String(
                                            props.status
                                            || "Active"
                                        );


                                    statusElement.textContent =
                                        status;


                                    statusElement.className =
                                        "detail-value";


                                    statusElement.classList.add(
                                        "detail-status"
                                    );


                                    if (
                                        status.toLowerCase()
                                            === "active"
                                    ) {

                                        statusElement.classList.add(
                                            "active"
                                        );

                                    } else {

                                        statusElement.classList.add(
                                            "inactive"
                                        );

                                    }


                                    /*
                                    | Open read-only modal
                                    */

                                    detailsModal.show();

                                }

                        }
                    );


                calendar.render();


                /*
                |--------------------------------------------------------------------------
                | PREVIOUS
                |--------------------------------------------------------------------------
                */

                document.getElementById(
                    "prevButton"
                ).addEventListener(
                    "click",
                    function() {

                        calendar.prev();

                        syncMonthSelect();

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | NEXT
                |--------------------------------------------------------------------------
                */

                document.getElementById(
                    "nextButton"
                ).addEventListener(
                    "click",
                    function() {

                        calendar.next();

                        syncMonthSelect();

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | TODAY
                |--------------------------------------------------------------------------
                */

                document.getElementById(
                    "calendarTodayButton"
                ).addEventListener(
                    "click",
                    function() {

                        calendar.today();

                        syncMonthSelect();

                    }
                );


                document.getElementById(
                    "todayButton"
                ).addEventListener(
                    "click",
                    function() {

                        calendar.today();

                        syncMonthSelect();

                        window.scrollTo({
                            top: 0,
                            behavior: "smooth"
                        });

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | MONTH SELECT
                |--------------------------------------------------------------------------
                */

                const monthSelect =
                    document.getElementById(
                        "monthSelect"
                    );


                function syncMonthSelect() {

                    const currentDate =
                        calendar.getDate();


                    monthSelect.value =
                        String(
                            currentDate.getMonth()
                        );

                }


                monthSelect.addEventListener(
                    "change",
                    function() {

                        if (
                            this.value === "all"
                        ) {

                            return;

                        }


                        const selectedMonth =
                            Number(
                                this.value
                            );


                        const currentDate =
                            calendar.getDate();


                        calendar.gotoDate(
                            new Date(
                                currentDate.getFullYear(),
                                selectedMonth,
                                1
                            )
                        );

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | ACADEMIC YEAR FILTER
                |--------------------------------------------------------------------------
                */

                const yearSelect =
                    document.getElementById(
                        "yearSelect"
                    );


                yearSelect.addEventListener(
                    "change",
                    function() {

                        const selectedYear =
                            this.value;


                        const events =
                            calendar.getEvents();


                        events.forEach(
                            function(event) {

                                const eventYear =
                                    String(
                                        event.extendedProps
                                            .academic_year_id
                                        || ""
                                    );


                                /*
                                | FullCalendar events can be
                                | temporarily hidden by setting
                                | display.
                                */

                                if (
                                    selectedYear === "all"
                                ) {

                                    event.setProp(
                                        "display",
                                        "auto"
                                    );

                                } else if (
                                    eventYear === selectedYear
                                ) {

                                    event.setProp(
                                        "display",
                                        "auto"
                                    );

                                } else {

                                    event.setProp(
                                        "display",
                                        "none"
                                    );

                                }

                            }
                        );

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | SEARCH
                |--------------------------------------------------------------------------
                */

                const searchInput =
                    document.getElementById(
                        "scheduleSearch"
                    );


                searchInput.addEventListener(
                    "input",
                    function() {

                        const keyword =
                            this.value
                                .toLowerCase()
                                .trim();


                        const events =
                            calendar.getEvents();


                        events.forEach(
                            function(event) {

                                const searchText =
                                    (
                                        event.title
                                        + " "
                                        + (
                                            event.extendedProps
                                                .classroom
                                            || ""
                                        )
                                        + " "
                                        + (
                                            event.extendedProps
                                                .subject
                                            || ""
                                        )
                                        + " "
                                        + (
                                            event.extendedProps
                                                .comment
                                            || ""
                                        )
                                    )
                                    .toLowerCase();


                                if (
                                    keyword === ""
                                ) {

                                    event.setProp(
                                        "display",
                                        "auto"
                                    );

                                } else if (
                                    searchText.includes(
                                        keyword
                                    )
                                ) {

                                    event.setProp(
                                        "display",
                                        "auto"
                                    );

                                } else {

                                    event.setProp(
                                        "display",
                                        "none"
                                    );

                                }

                            }
                        );

                    }
                );


                syncMonthSelect();

            }
        );

    </script>

</body>

</html>