<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Teacher Dashboard | SchoolSync</title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <!-- Google Fonts -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
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


        /* SIDEBAR */

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

            scrollbar-color:
                rgba(255,255,255,0.18)
                transparent;
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

            background: rgba(255, 255, 255, 0.07);
        }


        .menu-link.active {
            color: white;

            background: var(--blue);

            box-shadow:
                0 7px 18px rgba(23, 105, 224, 0.25);
        }


        .sidebar-footer {
            margin-top: 25px;
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
            background: rgba(128, 128, 128, 0.08);

            color: #808080 !important;
        }


        .logout:hover i {
            color: #808080 !important;
        }


        /* MAIN */

        .main {
            margin-left: 260px;

            min-height: 100vh;
        }


        /* TOPBAR */

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


        /* CONTENT */

        .content {
            padding: 30px;
        }


        /* WELCOME */

        .welcome {
            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    var(--navy),
                    var(--navy-2)
                );

            border-radius: 18px;

            padding: 28px 30px;

            color: white;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;
        }


        .welcome::after {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            border-radius: 50%;

            background:
                rgba(23, 105, 224, 0.18);

            right: -70px;

            top: -110px;
        }


        .welcome-content {
            position: relative;

            z-index: 1;
        }


        .welcome h1 {
            margin: 0 0 8px;

            font-size: 25px;

            font-weight: 800;
        }


        .welcome p {
            margin: 0;

            color: #b8c4d7;

            font-size: 13px;
        }


        /* STAT CARDS */

        .stat-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 15px;

            padding: 20px;

            box-shadow: var(--shadow);

            height: 100%;

            transition: 0.2s ease;
        }


        .stat-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 35px rgba(16, 35, 60, 0.09);
        }


        .stat-top {
            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .stat-icon {
            width: 43px;
            height: 43px;

            border-radius: 12px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 19px;
        }


        .icon-blue {
            background: #eaf2ff;

            color: var(--blue);
        }


        .icon-green {
            background: #eafaf3;

            color: var(--green);
        }


        .icon-purple {
            background: #f1edff;

            color: var(--purple);
        }


        .icon-orange {
            background: #fff5e7;

            color: var(--orange);
        }


        .stat-title {
            margin-top: 17px;

            color: var(--muted);

            font-size: 12px;
        }


        .stat-number {
            margin-top: 5px;

            font-family: "Plus Jakarta Sans";

            font-size: 25px;

            font-weight: 800;
        }


        .stat-bottom {
            margin-top: 10px;

            font-size: 11px;
        }


        .positive {
            color: var(--green);
        }


        .neutral {
            color: var(--muted);
        }


        /* DASHBOARD CARDS */

        .dashboard-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 15px;

            box-shadow: var(--shadow);

            height: 100%;
        }


        .card-header-custom {
            padding: 20px 20px 10px;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .card-header-custom h5 {
            margin: 0;

            font-size: 15px;

            font-weight: 700;
        }


        .card-header-custom a {
            text-decoration: none;

            color: var(--blue);

            font-size: 12px;

            font-weight: 600;
        }


        .card-header-custom a:hover {
            color: var(--blue-dark);
        }


        .card-body-custom {
            padding: 15px 20px 20px;
        }


        /* SCHEDULE */

        .schedule-item {
            display: flex;

            align-items: center;

            padding: 13px 0;

            border-bottom: 1px solid var(--border);
        }


        .schedule-item:last-child {
            border-bottom: none;
        }


        .schedule-time {
            width: 75px;

            flex-shrink: 0;

            font-size: 11px;

            font-weight: 700;

            color: var(--muted);
        }


        .schedule-color {
            width: 4px;
            height: 42px;

            flex-shrink: 0;

            border-radius: 5px;

            background: var(--blue);

            margin-right: 12px;
        }


        .schedule-info {
            min-width: 0;
        }


        .schedule-info h6 {
            margin: 0 0 4px;

            font-size: 13px;

            font-weight: 700;
        }


        .schedule-info p {
            margin: 0;

            color: var(--muted);

            font-size: 11px;
        }


        /* CLASSES */

        .class-item {
            display: flex;

            align-items: center;

            padding: 12px 0;

            border-bottom: 1px solid var(--border);
        }


        .class-item:last-child {
            border-bottom: none;
        }


        .class-icon {
            width: 40px;
            height: 40px;

            flex-shrink: 0;

            border-radius: 10px;

            background: var(--blue-light);

            color: var(--blue);

            display: flex;

            align-items: center;
            justify-content: center;

            margin-right: 12px;
        }


        .class-info {
            flex: 1;

            min-width: 0;
        }


        .class-info h6 {
            margin: 0 0 3px;

            font-size: 13px;

            font-weight: 700;
        }


        .class-info p {
            margin: 0;

            color: var(--muted);

            font-size: 11px;
        }


        .class-count {
            margin-left: 15px;

            color: var(--blue);

            font-size: 11px;

            font-weight: 700;

            white-space: nowrap;
        }


        /* QUICK TASKS */

        .quick-task {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 14px 0;

            border-bottom: 1px solid var(--border);

            text-decoration: none;
        }


        .quick-task:last-child {
            border-bottom: none;
        }


        .quick-task:hover .task-icon {
            background: var(--blue);

            color: white;
        }


        .task-icon {
            width: 40px;
            height: 40px;

            flex-shrink: 0;

            border-radius: 10px;

            background: var(--blue-light);

            color: var(--blue);

            display: flex;

            align-items: center;
            justify-content: center;

            transition: 0.2s ease;
        }


        .task-info {
            min-width: 0;
        }


        .task-info h6 {
            margin: 0 0 3px;

            color: var(--text);

            font-size: 12px;
        }


        .task-info p {
            margin: 0;

            color: var(--muted);

            font-size: 10px;
        }


        .task-arrow {
            margin-left: auto;

            color: var(--muted);

            font-size: 14px;
        }


        /* EMPTY STATE */

        .empty-state {
            text-align: center;

            padding: 25px 10px;
        }


        .empty-state i {
            font-size: 30px;

            color: var(--muted);
        }


        .empty-state p {
            margin: 8px 0 0;

            color: var(--muted);

            font-size: 12px;
        }


        /* RESPONSIVE */

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


            .welcome {
                flex-direction: column;

                align-items: flex-start;

                gap: 18px;
            }


            .class-count {
                font-size: 10px;
            }

        }


        @media (max-width: 575px) {

            .profile-info {
                display: none;
            }


            .topbar-right {
                gap: 8px;
            }


            .welcome h1 {
                font-size: 21px;
            }


            .content {
                padding: 15px;
            }


            .schedule-time {
                width: 65px;

                font-size: 10px;
            }


            .class-count {
                display: none;
            }

        }

    </style>

</head>


<body>


<!-- SIDEBAR -->

<aside
    class="sidebar"
    id="sidebar"
>


    <div class="brand">

        <div class="brand-icon">

          <img
            src="{{ asset('images/schoolsync-logo.png') }}"
            alt="SchoolSync"
        >
        </div>


        <div>

            <h4>
                SchoolSync
            </h4>

        </div>

    </div>


    <div class="menu-title">
        Overview
    </div>


    <a
        href="{{ route('teacher.dashboard') }}"
        class="menu-link active"
    >

        <i class="bi bi-grid-1x2-fill"></i>

        Dashboard

    </a>


    <div class="menu-title">
        Teaching
    </div>


    <a
        href="{{ route('teacher.classes.index') }}"
        class="menu-link"
    >

        <i class="bi bi-diagram-3"></i>

        Classes

    </a>


    <a
        href="{{ route('teacher.subjects.index') }}"
        class="menu-link"
    >

        <i class="bi bi-book"></i>

        Subjects

    </a>


    <a
        href="{{ route('teacher.students.index') }}"
        class="menu-link"
    >

        <i class="bi bi-mortarboard"></i>

        Students

    </a>


    <a
        href="{{ route('teacher.attendance.index') }}"
        class="menu-link"
    >

        <i class="bi bi-calendar-check"></i>

        Attendance

    </a>


    <div class="menu-title">
        Academic
    </div>


    <a
        href="{{ route('teacher.schedule.index') }}"
        class="menu-link"
    >

        <i class="bi bi-calendar3"></i>

        Schedule

    </a>


    <div class="menu-title">
        Communication
    </div>


    <a
        href="{{ route('teacher.announcements.index') }}"
        class="menu-link"
    >

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

        Edit Profile

    </a>


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



<!-- MAIN -->

<main class="main">


    <!-- TOPBAR -->

    <header class="topbar">


        <div class="topbar-left">


            <button
                class="mobile-menu"
                id="mobileMenu"
            >

                <i class="bi bi-list"></i>

            </button>


            <div class="search-box">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    placeholder="Search..."
                >

            </div>

        </div>


        <div class="topbar-right">


            <button
                class="icon-button"
                type="button"
            >

                <i class="bi bi-bell"></i>

                <span class="notification-dot"></span>

            </button>


            <div class="profile">

                <div class="profile-avatar">

                    {{ strtoupper(substr($user->name, 0, 2)) }}

                </div>


                <div class="profile-info">

                    <strong>
                        {{ $user->name }}
                    </strong>

                    <span>
                        {{ ucfirst($user->role) }}
                    </span>

                </div>

            </div>

        </div>

    </header>



    <!-- CONTENT -->

    <section class="content">


        <!-- WELCOME -->

        <div class="welcome">

            <div class="welcome-content">

                <h1>
                    Teacher Dashboard
                </h1>

                <p>
                    Welcome back, {{ $user->name }}.
                    Manage your classes, students,
                    attendance, and teaching activities.
                </p>

            </div>

        </div>



        <!-- STATISTICS -->

        <div class="row g-4 mb-4">


            <!-- Classes -->

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-blue">

                            <i class="bi bi-building"></i>

                        </div>

                    </div>


                    <div class="stat-title">
                        Classes
                    </div>


                    <div class="stat-number">
                        {{ $totalClasses }}
                    </div>


                    <div class="stat-bottom neutral">
                        Active classes
                    </div>

                </div>

            </div>


            <!-- Students -->

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-green">

                            <i class="bi bi-people-fill"></i>

                        </div>

                    </div>


                    <div class="stat-title">
                        Students
                    </div>


                    <div class="stat-number">
                        {{ $totalStudents }}
                    </div>


                    <div class="stat-bottom neutral">
                        Students in my classes
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


                    <div class="stat-title">
                        Subjects
                    </div>


                    <div class="stat-number">
                        {{ $totalSubjects }}
                    </div>


                    <div class="stat-bottom neutral">
                        Assigned subjects
                    </div>

                </div>

            </div>


            <!-- Today's Classes -->

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-top">

                        <div class="stat-icon icon-orange">

                            <i class="bi bi-calendar-check-fill"></i>

                        </div>

                    </div>


                    <div class="stat-title">
                        Today's Classes
                    </div>


                    <div class="stat-number">
                        {{ $todayClasses }}
                    </div>


                    <div class="stat-bottom neutral">
                        Scheduled for today
                    </div>

                </div>

            </div>

        </div>



        <!-- TODAY'S SCHEDULE + QUICK TASKS -->

        <div class="row g-4 mb-4">


            <!-- Today's Schedule -->

            <div class="col-xl-7">

                <div class="dashboard-card">


                    <div class="card-header-custom">

                        <h5>
                            Today's Schedule
                        </h5>


                        <a
                            href="{{ route('teacher.schedule.index') }}"
                        >
                            View Schedule
                        </a>

                    </div>


                    <div class="card-body-custom">


                        @forelse($todaySchedules as $schedule)

                            <div class="schedule-item">


                                <div class="schedule-time">

                                    @if($schedule->start_time)

                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}

                                    @else

                                        —

                                    @endif

                                </div>


                                <div class="schedule-color"></div>


                                <div class="schedule-info">

                                    <h6>

                                        {{ $schedule->subject->subject_name ?? 'Subject' }}

                                    </h6>


                                    <p>

                                        {{ $schedule->classroom->class_name ?? 'Class' }}

                                    </p>

                                </div>

                            </div>

                        @empty

                            <div class="empty-state">

                                <i class="bi bi-calendar-x"></i>

                                <p>
                                    No classes scheduled for today.
                                </p>

                            </div>

                        @endforelse


                    </div>

                </div>

            </div>



            <!-- Quick Tasks -->

            <div class="col-xl-5">

                <div class="dashboard-card">


                    <div class="card-header-custom">

                        <h5>
                            Quick Tasks
                        </h5>

                    </div>


                    <div class="card-body-custom">


                        <a
                            href="{{ route('teacher.attendance.index') }}"
                            class="quick-task"
                        >

                            <div class="task-icon">

                                <i class="bi bi-check2-square"></i>

                            </div>


                            <div class="task-info">

                                <h6>
                                    Mark Attendance
                                </h6>

                                <p>
                                    Record student attendance
                                </p>

                            </div>


                            <i class="bi bi-chevron-right task-arrow"></i>

                        </a>


                        <a
                            href="{{ route('teacher.classes.index') }}"
                            class="quick-task"
                        >

                            <div class="task-icon">

                                <i class="bi bi-diagram-3"></i>

                            </div>


                            <div class="task-info">

                                <h6>
                                    View Classes
                                </h6>

                                <p>
                                    Manage your assigned classes
                                </p>

                            </div>


                            <i class="bi bi-chevron-right task-arrow"></i>

                        </a>


                        <a
                            href="{{ route('teacher.students.index') }}"
                            class="quick-task"
                        >

                            <div class="task-icon">

                                <i class="bi bi-people"></i>

                            </div>


                            <div class="task-info">

                                <h6>
                                    View Students
                                </h6>

                                <p>
                                    View students in your classes
                                </p>

                            </div>


                            <i class="bi bi-chevron-right task-arrow"></i>

                        </a>


                        <a
                            href="{{ route('teacher.announcements.index') }}"
                            class="quick-task"
                        >

                            <div class="task-icon">

                                <i class="bi bi-megaphone"></i>

                            </div>


                            <div class="task-info">

                                <h6>
                                    Announcements
                                </h6>

                                <p>
                                    View school announcements
                                </p>

                            </div>


                            <i class="bi bi-chevron-right task-arrow"></i>

                        </a>


                    </div>

                </div>

            </div>

        </div>



        <!-- MY CLASSES -->

        <div class="row g-4 mb-4">


            <div class="col-12">

                <div class="dashboard-card">


                    <div class="card-header-custom">

                        <h5>
                            My Classes
                        </h5>


                        <a
                            href="{{ route('teacher.classes.index') }}"
                        >
                            View All
                        </a>

                    </div>


                    <div class="card-body-custom">


                        @forelse($classrooms->take(4) as $classroom)

                            <div class="class-item">


                                <div class="class-icon">

                                    <i class="bi bi-building"></i>

                                </div>


                                <div class="class-info">

                                    <h6>
                                        {{ $classroom->class_name }}
                                    </h6>


                                    <p>

                                        @if($classroom->academicYear)

                                            {{ $classroom->academicYear->year_name }}

                                        @else

                                            Academic Year

                                        @endif

                                    </p>

                                </div>


                                <div class="class-count">

                                    {{ $classroom->enrollments_count }}
                                    Students

                                </div>

                            </div>

                        @empty

                            <div class="empty-state">

                                <i class="bi bi-building-x"></i>

                                <p>
                                    No classes assigned.
                                </p>

                            </div>

                        @endforelse


                    </div>

                </div>

            </div>

        </div>



        <!-- UPCOMING SCHEDULE + ACADEMIC INFORMATION -->

        <div class="row g-4">


            <!-- Upcoming Schedule -->

            <div class="col-xl-7">

                <div class="dashboard-card">


                    <div class="card-header-custom">

                        <h5>
                            Upcoming Schedule
                        </h5>


                        <a
                            href="{{ route('teacher.schedule.index') }}"
                        >
                            View All
                        </a>

                    </div>


                    <div class="card-body-custom">


                        @forelse($upcomingSchedules as $schedule)

                            <div class="schedule-item">


                                <div class="schedule-time">

                                    {{ $schedule->schedule_date->format('M d') }}

                                </div>


                                <div class="schedule-color"></div>


                                <div class="schedule-info">

                                    <h6>

                                        {{ $schedule->subject->subject_name ?? 'Subject' }}

                                    </h6>


                                    <p>

                                        {{ $schedule->classroom->class_name ?? 'Class' }}

                                    </p>

                                </div>

                            </div>

                        @empty

                            <div class="empty-state">

                                <i class="bi bi-calendar-check"></i>

                                <p>
                                    No upcoming schedules.
                                </p>

                            </div>

                        @endforelse


                    </div>

                </div>

            </div>



            <!-- Academic Information -->

            <div class="col-xl-5">

                <div class="dashboard-card">


                    <div class="card-header-custom">

                        <h5>
                            Academic Information
                        </h5>

                    </div>


                    <div class="card-body-custom">


                        <div class="class-item">


                            <div class="class-icon">

                                <i class="bi bi-calendar3"></i>

                            </div>


                            <div class="class-info">

                                <h6>
                                    Academic Year
                                </h6>

                                <p>
                                    Current assigned year
                                </p>

                            </div>


                            <div class="class-count">

                                {{ $currentAcademicYear?->year_name ?? 'N/A' }}

                            </div>

                        </div>


                        <div class="class-item">


                            <div class="class-icon">

                                <i class="bi bi-building"></i>

                            </div>


                            <div class="class-info">

                                <h6>
                                    Active Classes
                                </h6>

                                <p>
                                    Classes assigned to you
                                </p>

                            </div>


                            <div class="class-count">

                                {{ $totalClasses }}

                            </div>

                        </div>


                        <div class="class-item">


                            <div class="class-icon">

                                <i class="bi bi-book"></i>

                            </div>


                            <div class="class-info">

                                <h6>
                                    Assigned Subjects
                                </h6>

                                <p>
                                    Subjects you teach
                                </p>

                            </div>


                            <div class="class-count">

                                {{ $totalSubjects }}

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>


    </section>

</main>



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
