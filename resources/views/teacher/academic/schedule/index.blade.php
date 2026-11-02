 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Schedule | SchoolSync</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

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

        .calendar-card {
            margin-top: 25px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .calendar-header {
            padding: 20px;
            border-bottom: 1px solid var(--border);
        }

        .calendar-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .calendar-title h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .calendar-title span {
            color: var(--muted);
            font-size: 11px;
        }

        .calendar-controls {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 18px;
        }

        .calendar-control {
            height: 38px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 9px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
            padding: 0 12px;
            cursor: pointer;
        }

        .calendar-control:hover {
            border-color: #d6e5ff;
            background: var(--blue-light);
            color: var(--blue);
        }

        .calendar-control.primary {
            background: var(--blue);
            border-color: var(--blue);
            color: white;
        }

        .calendar-control.primary:hover {
            background: var(--blue-dark);
            color: white;
        }

        .calendar-select {
            height: 38px;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 0 35px 0 12px;
            font-size: 12px;
            color: var(--text);
            background-color: white;
            outline: none;
            cursor: pointer;
        }

        .calendar-select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(23,105,224,.08);
        }

        .calendar-select.year-select {
            min-width: 145px;
        }

        .calendar-select.month-select {
            min-width: 125px;
        }

        .calendar-wrapper {
            padding: 20px;
        }

        #calendar {
            width: 100%;
        }

        .fc {
            font-family: "Inter", sans-serif;
        }

        .fc .fc-toolbar {
            display: none;
        }

        .fc .fc-scrollgrid {
            border-color: var(--border);
            border-radius: 10px;
            overflow: hidden;
        }

        .fc .fc-col-header-cell {
            background: #fafbfc;
            border-color: var(--border);
        }

        .fc .fc-col-header-cell-cushion {
            padding: 12px 5px;
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
            text-decoration: none;
        }

        .fc .fc-daygrid-day {
            border-color: var(--border);
            min-height: 115px;
        }

        .fc .fc-daygrid-day-number {
            padding: 10px;
            color: var(--text);
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
        }

        .fc .fc-day-today {
            background: #f8fbff !important;
        }

        .fc .fc-day-today .fc-daygrid-day-number {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
            padding: 0;
            border-radius: 8px;
            background: var(--blue);
            color: white;
        }

        .fc .fc-daygrid-day:hover {
            background: #fafcff;
            cursor: pointer;
        }

        .fc .fc-event {
            border: none;
            border-radius: 7px;
            background: var(--blue-dark);
            color: var(--blue);
            margin: 2px 5px;
            padding: 4px 6px;
            font-size: 10px;
            font-weight: 700;
            cursor: pointer;
        }

        .fc .fc-event:hover {
            background: #4c78ba;
        }

        .fc .fc-daygrid-more-link {
            color: var(--blue);
            font-size: 10px;
            font-weight: 700;
        }

        .legend {
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
        }

        .legend-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
        }

        .legend-active {
            background: var(--blue);
        }

        .legend-inactive {
            background: #b9c5d7;
        }

        .modal-content {
            border: none;
            border-radius: 14px;
            overflow: hidden;
        }

        .modal-header {
            padding: 18px 20px;
            border-bottom: 1px solid var(--border);
        }

        .modal-title {
            font-size: 15px;
            font-weight: 700;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid var(--border);
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

        .details-box {
            background: #fafbfc;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 15px;
        }

        .detail-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 9px 0;
            border-bottom: 1px solid var(--border);
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: var(--muted);
            font-size: 11px;
        }

        .detail-value {
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
            text-align: right;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-active {
            background: #eaf9f2;
            color: var(--green);
        }

        .status-inactive {
            background: #fff0f0;
            color: var(--red);
        }

        .btn-school {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            border-radius: 9px;
            padding: 9px 14px;
            border: none;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-school-primary {
            background: var(--blue);
            color: white;
        }

        .btn-school-primary:hover {
            background: var(--blue-dark);
            color: white;
        }

        .btn-school-light {
            background: white;
            color: var(--muted);
            border: 1px solid var(--border);
        }

        .btn-school-light:hover {
            background: var(--blue-light);
            color: var(--blue);
        }

        .btn-school-danger {
            background: #fff0f0;
            color: var(--red);
            border: 1px solid #ffd8d8;
        }

        .btn-school-danger:hover {
            background: var(--red);
            color: white;
        }

        .alert-box {
            display: none;
            margin-bottom: 15px;
            padding: 10px 12px;
            border-radius: 9px;
            font-size: 12px;
        }

        .alert-box.show {
            display: block;
        }

        .alert-error-box {
            background: #fff0f0;
            color: var(--red);
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

            .calendar-title {
                align-items: flex-start;
                flex-direction: column;
            }

            .calendar-controls {
                flex-wrap: wrap;
            }

            .calendar-select {
                flex: 1;
            }

            .fc .fc-daygrid-day {
                min-height: 90px;
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

            .calendar-wrapper {
                padding: 10px;
            }

            .fc .fc-daygrid-day {
                min-height: 65px;
            }

            .fc .fc-daygrid-day-number {
                padding: 6px;
            }

            .fc .fc-event {
                font-size: 8px;
            }
        }
    </style>
</head>

<body>

@php
    $teacherName = Auth::user()->name ?? 'Teacher';

    $nameParts = explode(' ', trim($teacherName));

    $initials = '';

    foreach ($nameParts as $part) {
        if ($part !== '') {
            $initials .= strtoupper(substr($part, 0, 1));
        }
    }

    $initials = substr($initials, 0, 2);

    $currentYear = now()->year;
    $currentMonth = now()->month;
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

    <a href="{{ route('teacher.attendance.index') }}" class="menu-link">
        <i class="bi bi-calendar-check"></i>
        Attendance
    </a>

    <div class="menu-title">
        Academic
    </div>

    <a href="{{ route('teacher.schedule.index') }}" class="menu-link active">
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
                    placeholder="Search schedule..."
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
                    Schedule
                </h1>

                <p>
                    Manage your teaching schedule from the calendar.
                </p>

            </div>

            <button
                type="button"
                class="header-button"
                id="todayHeaderButton"
            >
                <i class="bi bi-calendar-day"></i>
                Today
            </button>

        </div>

        <div class="row g-4">

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-blue">
                            <i class="bi bi-calendar3"></i>
                        </div>

                    </div>

                    <div class="stat-label">
                        Total Schedules
                    </div>

                    <div class="stat-value">
                        {{ $totalSchedules }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-calendar-event"></i>
                        All schedule records
                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-green">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>

                    </div>

                    <div class="stat-label">
                        Active
                    </div>

                    <div class="stat-value">
                        {{ $activeSchedules }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-check2"></i>
                        Active schedules
                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-purple">
                            <i class="bi bi-diagram-3-fill"></i>
                        </div>

                    </div>

                    <div class="stat-label">
                        Classes
                    </div>

                    <div class="stat-value">
                        {{ $totalClasses }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-people"></i>
                        Classes with schedules
                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-orange">
                            <i class="bi bi-pause-circle-fill"></i>
                        </div>

                    </div>

                    <div class="stat-label">
                        Inactive
                    </div>

                    <div class="stat-value">
                        {{ $inactiveSchedules }}
                    </div>

                    <div class="stat-change">
                        <i class="bi bi-dash-circle"></i>
                        Inactive schedules
                    </div>

                </div>

            </div>

        </div>

        <div class="calendar-card">

            <div class="calendar-header">

                <div class="calendar-title">

                    <div>

                        <h5>
                            Teaching Calendar
                        </h5>

                        <span>
                            Click a date to create a schedule. Click an event to edit or delete it.
                        </span>

                    </div>

                </div>

                <div class="calendar-controls">

                    <button
                        type="button"
                        class="calendar-control"
                        id="previousMonth"
                    >
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <button
                        type="button"
                        class="calendar-control primary"
                        id="calendarToday"
                    >
                        Today
                    </button>

                    <button
                        type="button"
                        class="calendar-control"
                        id="nextMonth"
                    >
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <select
                        id="yearSelect"
                        class="calendar-select year-select"
                    >

                        @foreach($academicYears as $year)

                            @php
                                $yearStart = $year->start_date
                                    ? \Carbon\Carbon::parse($year->start_date)->year
                                    : null;

                                $yearEnd = $year->end_date
                                    ? \Carbon\Carbon::parse($year->end_date)->year
                                    : null;
                            @endphp

                            <option
                                value="{{ $yearStart ?? $currentYear }}"
                                {{ ($yearStart == $currentYear || ($yearStart && $currentYear >= $yearStart && $currentYear <= ($yearEnd ?? $yearStart))) ? 'selected' : '' }}
                            >
                                {{ $yearStart ?? $currentYear }}

                                @if($yearEnd && $yearEnd != $yearStart)
                                    - {{ $yearEnd }}
                                @endif
                            </option>

                        @endforeach

                        @if($academicYears->isEmpty())

                            <option value="{{ $currentYear }}" selected>
                                {{ $currentYear }}
                            </option>

                        @endif

                    </select>

                    <select
                        id="monthSelect"
                        class="calendar-select month-select"
                    >

                        @foreach([
                            1 => 'January',
                            2 => 'February',
                            3 => 'March',
                            4 => 'April',
                            5 => 'May',
                            6 => 'June',
                            7 => 'July',
                            8 => 'August',
                            9 => 'September',
                            10 => 'October',
                            11 => 'November',
                            12 => 'December'
                        ] as $number => $month)

                            <option
                                value="{{ $number }}"
                                {{ $number == $currentMonth ? 'selected' : '' }}
                            >
                                {{ $month }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="calendar-wrapper">

                <div id="calendar"></div>

                <div class="legend">

                    <div class="legend-item">

                        <span class="legend-dot legend-active"></span>

                        Active Schedule

                    </div>

                    <div class="legend-item">

                        <span class="legend-dot legend-inactive"></span>

                        Inactive Schedule

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>

<div
    class="modal fade"
    id="scheduleModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="scheduleModalTitle"
                >
                    Create Schedule
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>

            <form id="scheduleForm">

                @csrf

                <div class="modal-body">

                    <div
                        id="formAlert"
                        class="alert-box"
                    ></div>

                    <input
                        type="hidden"
                        id="scheduleId"
                    >

                    <input
                        type="hidden"
                        id="scheduleDate"
                    >

                    <div class="mb-3">

                        <label class="form-label">
                            Date
                        </label>

                        <input
                            type="text"
                            id="displayDate"
                            class="form-control"
                            readonly
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Academic Year
                        </label>

                        <select
                            id="scheduleYear"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Academic Year
                            </option>

                            @foreach($academicYears as $year)

                                @php
                                    $yearStart = $year->start_date
                                        ? \Carbon\Carbon::parse($year->start_date)->year
                                        : null;

                                    $yearEnd = $year->end_date
                                        ? \Carbon\Carbon::parse($year->end_date)->year
                                        : null;
                                @endphp

                                <option
                                    value="{{ $year->academic_year_id }}"
                                >
                                    {{ $yearStart ?? 'Academic Year' }}

                                    @if($yearEnd && $yearEnd != $yearStart)
                                        - {{ $yearEnd }}
                                    @endif
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Class
                        </label>

                        <select
                            id="classId"
                            class="form-select"
                            required
                            disabled
                        >

                            <option value="">
                                Select Academic Year First
                            </option>

                            @foreach($classrooms as $classroom)

                                <option
                                    value="{{ $classroom->class_id }}"
                                    data-year="{{ $classroom->year_id }}"
                                >
                                    {{ $classroom->class_name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Subject
                        </label>

                        <select
                            id="subjectId"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Subject
                            </option>

                            @foreach($subjects as $subject)

                                <option
                                    value="{{ $subject->subject_id }}"
                                >
                                    {{ $subject->subject_name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">
    <label for="comment" class="form-label">
        Comment
    </label>

    <textarea
        id="comment"
        class="form-control"
        rows="3"
        placeholder="e.g. ITPEC PM Examination,..."
    ></textarea>

</div>

                    

                    <div>

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            id="status"
                            class="form-select"
                            required
                        >

                            <option value="active">
                                Active
                            </option>

                            <option value="inactive">
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn-school btn-school-light"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="btn-school btn-school-primary"
                        id="saveScheduleButton"
                    >
                        <i class="bi bi-check-lg"></i>
                        Save Schedule
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

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
                    Schedule Details
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>

            <div class="modal-body">

                <div class="details-box">

                    <div class="detail-row">

                        <span class="detail-label">
                            Date
                        </span>

                        <span
                            class="detail-value"
                            id="detailDate"
                        ></span>

                    </div>

                    <div class="detail-row">

                        <span class="detail-label">
                            Academic Year
                        </span>

                        <span
                            class="detail-value"
                            id="detailYear"
                        ></span>

                    </div>

                    <div class="detail-row">

                        <span class="detail-label">
                            Class
                        </span>

                        <span
                            class="detail-value"
                            id="detailClass"
                        ></span>

                    </div>

                    <div class="detail-row">

                        <span class="detail-label">
                            Subject
                        </span>

                        <span
                            class="detail-value"
                            id="detailSubject"
                        ></span>

                    </div>

                    <div class="detail-row">
    <span class="detail-label">
        Comment
    </span>

    <span
        class="detail-value"
        id="detailComment"
    ></span>
</div>



                    <div class="detail-row">

                        <span class="detail-label">
                            Status
                        </span>

                        <span
                            class="detail-value"
                            id="detailStatus"
                        ></span>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-school btn-school-danger"
                    id="deleteScheduleButton"
                >
                    <i class="bi bi-trash"></i>
                    Delete
                </button>

                <button
                    type="button"
                    class="btn-school btn-school-primary"
                    id="editScheduleButton"
                >
                    <i class="bi bi-pencil"></i>
                    Edit
                </button>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.js"></script>

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

    const calendarElement =
        document.getElementById("calendar");

    const yearSelect =
        document.getElementById("yearSelect");

    const monthSelect =
        document.getElementById("monthSelect");

    const scheduleYear =
        document.getElementById("scheduleYear");

    const classId =
        document.getElementById("classId");

    const scheduleModal =
        new bootstrap.Modal(
            document.getElementById("scheduleModal")
        );

    const detailsModal =
        new bootstrap.Modal(
            document.getElementById("detailsModal")
        );

    let selectedEvent = null;

    const calendar =
        new FullCalendar.Calendar(
            calendarElement,
            {
                initialView: "dayGridMonth",

                initialDate:
                    "{{ now()->format('Y-m-d') }}",

                height: "auto",

                fixedWeekCount: false,

                dayMaxEvents: 3,

                events: "{{ route('teacher.schedule.data') }}",

                dateClick:
                    function(info) {

                        openCreateModal(
                            info.dateStr
                        );

                    },

                eventClick:
                    function(info) {

                        openDetailsModal(
                            info.event
                        );

                    },

                eventDidMount:
                    function(info) {

                        const status =
                            info.event.extendedProps.status;

                        if (status === "inactive") {

                            info.el.style.background =
                                "#f1f4f8";

                            info.el.style.color =
                                "#738096";

                        }

                    }
            }
        );

    calendar.render();

    function syncSelectors() {

        const currentDate =
            calendar.getDate();

        yearSelect.value =
            currentDate.getFullYear();

        monthSelect.value =
            currentDate.getMonth() + 1;
    }

    syncSelectors();

    document
        .getElementById("previousMonth")
        .addEventListener(
            "click",
            function() {

                calendar.prev();

                syncSelectors();

            }
        );

    document
        .getElementById("nextMonth")
        .addEventListener(
            "click",
            function() {

                calendar.next();

                syncSelectors();

            }
        );

    document
        .getElementById("calendarToday")
        .addEventListener(
            "click",
            function() {

                calendar.today();

                syncSelectors();

            }
        );

    document
        .getElementById("todayHeaderButton")
        .addEventListener(
            "click",
            function() {

                calendar.today();

                syncSelectors();

            }
        );

    yearSelect.addEventListener(
        "change",
        function() {

            const year =
                parseInt(yearSelect.value);

            const month =
                parseInt(monthSelect.value);

            calendar.gotoDate(
                new Date(
                    year,
                    month - 1,
                    1
                )
            );

        }
    );

    monthSelect.addEventListener(
        "change",
        function() {

            const year =
                parseInt(yearSelect.value);

            const month =
                parseInt(monthSelect.value);

            calendar.gotoDate(
                new Date(
                    year,
                    month - 1,
                    1
                )
            );

        }
    );

    function formatDate(dateString) {

        const date =
            new Date(
                dateString + "T00:00:00"
            );

        return date.toLocaleDateString(
            "en-US",
            {
                weekday: "long",
                year: "numeric",
                month: "long",
                day: "numeric"
            }
        );
    }

    function filterClasses(selectedYear) {

        classId.value = "";

        classId.disabled = !selectedYear;

        Array.from(classId.options).forEach(
            function(option) {

                if (option.value === "") {

                    option.hidden = false;

                    option.textContent =
                        selectedYear
                            ? "Select Class"
                            : "Select Academic Year First";

                    return;
                }

                option.hidden =
                    option.dataset.year !== selectedYear;

            }
        );
    }

    scheduleYear.addEventListener(
        "change",
        function() {

            filterClasses(
                this.value
            );

        }
    );

    function openCreateModal(dateString) {

        document
            .getElementById("scheduleModalTitle")
            .textContent =
            "Create Schedule";

        document
            .getElementById("scheduleId")
            .value = "";

        document
            .getElementById("scheduleDate")
            .value =
            dateString;

        document
            .getElementById("displayDate")
            .value =
            formatDate(dateString);

        scheduleYear.value = "";

        filterClasses("");

        document
            .getElementById("subjectId")
            .value = "";

            document.getElementById("comment").value = "";


        document
            .getElementById("status")
            .value = "active";

        document
            .getElementById("formAlert")
            .className =
            "alert-box";

        document
            .getElementById("saveScheduleButton")
            .innerHTML =
            '<i class="bi bi-check-lg"></i> Save Schedule';

        scheduleModal.show();
    }

    function openDetailsModal(event) {

        selectedEvent = event;

        const props =
            event.extendedProps;

        document
            .getElementById("detailDate")
            .textContent =
            formatDate(
                props.schedule_date
            );

        document
            .getElementById("detailYear")
            .textContent =
            props.academic_year ?? "N/A";

        document
            .getElementById("detailClass")
            .textContent =
            props.classroom;

        document
            .getElementById("detailSubject")
            .textContent =
            props.subject;

            document
    .getElementById("detailComment")
    .textContent =
    props.comment || "No comment";



        const status =
            props.status;

        document
            .getElementById("detailStatus")
            .innerHTML =
            status === "active"
                ? '<span class="status-badge status-active">Active</span>'
                : '<span class="status-badge status-inactive">Inactive</span>';

        detailsModal.show();
    }

document
    .getElementById("editScheduleButton")
    .addEventListener(
        "click",
        function() {

            if (!selectedEvent) {
                return;
            }

            const props =
                selectedEvent.extendedProps;

            const date =
                props.schedule_date;

            detailsModal.hide();

            setTimeout(
                function() {

                   
                    document
                        .getElementById("scheduleModalTitle")
                        .textContent =
                        "Edit Schedule";



                    document
                        .getElementById("scheduleId")
                        .value =
                        selectedEvent.id;


                 
                    document
                        .getElementById("scheduleDate")
                        .value =
                        date;

                    document
                        .getElementById("displayDate")
                        .value =
                        formatDate(date);


                    const oldClassOption =
                        document.querySelector(
                            `#classId option[value="${props.class_id}"]`
                        );


                    if (oldClassOption) {

                       
                        const oldYearId =
                            oldClassOption.dataset.year;


                        scheduleYear.value =
                            oldYearId;

                        filterClasses(
                            oldYearId
                        );


                        classId.value =
                            props.class_id;

                    }


                    document
                        .getElementById("subjectId")
                        .value =
                        props.subject_id;

                        document
    .getElementById("comment")
    .value = props.comment || "";

                    document
                        .getElementById("status")
                        .value =
                        props.status;


                    document
                        .getElementById("formAlert")
                        .className =
                        "alert-box";

                    document
                        .getElementById("saveScheduleButton")
                        .innerHTML =
                        '<i class="bi bi-check-lg"></i> Update Schedule';


                    scheduleModal.show();

                },
                250
            );
        }
    );



    document
        .getElementById("deleteScheduleButton")
        .addEventListener(
            "click",
            function() {

                if (!selectedEvent) {
                    return;
                }

                const confirmed =
                    confirm(
                        "Are you sure you want to delete this schedule?"
                    );

                if (!confirmed) {
                    return;
                }

                fetch(
                    "{{ url('/teacher/schedule') }}/"
                    + selectedEvent.id,
                    {
                        method: "DELETE",

                        headers: {
                            "X-CSRF-TOKEN":
                                "{{ csrf_token() }}",

                            "Accept":
                                "application/json"
                        }
                    }
                )
                .then(
                    response =>
                        response.json()
                )
                .then(
                    data => {

                        if (data.success) {

                            detailsModal.hide();

                            calendar.refetchEvents();

                            window.location.reload();

                        } else {

                            alert(
                                data.message ||
                                "Unable to delete schedule."
                            );

                        }

                    }
                )
                .catch(
                    () => {

                        alert(
                            "Something went wrong while deleting the schedule."
                        );

                    }
                );

            }
        );

    document
        .getElementById("scheduleForm")
        .addEventListener(
            "submit",
            function(event) {

                event.preventDefault();

                const id =
                    document
                        .getElementById("scheduleId")
                        .value;

                const isEdit =
                    id !== "";

                const url =
                    isEdit
                        ? "{{ url('/teacher/schedule') }}/" + id
                        : "{{ route('teacher.schedule.store') }}";

                const method =
                    isEdit
                        ? "PUT"
                        : "POST";

                const data = {

                    class_id:
                        document
                            .getElementById("classId")
                            .value,

                    subject_id:
                        document
                            .getElementById("subjectId")
                            .value,

                    schedule_date:
                        document
                            .getElementById("scheduleDate")
                            .value,

                            comment: document.getElementById("comment").value,

                    status:
                        document
                            .getElementById("status")
                            .value
                };

                const button =
                    document
                        .getElementById("saveScheduleButton");

                button.disabled = true;

                button.innerHTML =
                    '<span class="spinner-border spinner-border-sm"></span> Saving...';

                fetch(
                    url,
                    {
                        method: method,

                        headers: {

                            "Content-Type":
                                "application/json",

                            "X-CSRF-TOKEN":
                                "{{ csrf_token() }}",

                            "Accept":
                                "application/json"
                        },

                        body:
                            JSON.stringify(data)
                    }
                )
                .then(
                    async response => {

                        const result =
                            await response.json();

                        if (!response.ok) {

                            if (result.errors) {

                                const firstError =
                                    Object.values(result.errors)[0]?.[0];

                                throw new Error(
                                    firstError ||
                                    result.message ||
                                    "Validation failed."
                                );
                            }

                            throw new Error(
                                result.message ||
                                "Validation failed."
                            );
                        }

                        return result;
                    }
                )
                .then(
                    result => {

                        if (result.success) {

                            scheduleModal.hide();

                            calendar.refetchEvents();

                            window.location.reload();

                        }

                    }
                )
                .catch(
                    error => {

                        const alertBox =
                            document
                                .getElementById("formAlert");

                        alertBox.className =
                            "alert-box alert-error-box show";

                        alertBox.textContent =
                            error.message;

                    }
                )
                .finally(
                    function() {

                        button.disabled = false;

                        button.innerHTML =
                            isEdit
                                ? '<i class="bi bi-check-lg"></i> Update Schedule'
                                : '<i class="bi bi-check-lg"></i> Save Schedule';

                    }
                );

            }
        );

    document
        .getElementById("topSearch")
        .addEventListener(
            "input",
            function() {

                const search =
                    this.value
                        .toLowerCase()
                        .trim();

                document
                    .querySelectorAll(".fc-event")
                    .forEach(
                        function(eventElement) {

                            const text =
                                eventElement
                                    .textContent
                                    .toLowerCase();

                            eventElement.style.display =
                                search === ""
                                || text.includes(search)
                                    ? ""
                                    : "none";

                        }
                    );

            }
        );

</script>

</body>

</html>

