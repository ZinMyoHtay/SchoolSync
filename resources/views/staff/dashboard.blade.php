<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Admin Dashboard</title>

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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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

            --shadow:
                0 8px 30px rgba(16, 35, 60, 0.06);
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


        /* =====================================================
           SIDEBAR
        ===================================================== */

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

            border-bottom:
                1px solid rgba(255,255,255,0.08);
        }


        .brand-logo {
            width: 42px;
            height: 42px;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #1769e0,
                    #4c91f5
                );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;

            margin-right: 12px;

            box-shadow:
                0 7px 20px rgba(23,105,224,0.35);
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

            background:
                rgba(255,255,255,0.06);

            transform: translateX(2px);
        }


        .menu-link.active {
            color: white;

            background:
                linear-gradient(
                    90deg,
                    #1769e0,
                    #2377ed
                );

            box-shadow:
                0 8px 20px
                rgba(23,105,224,0.25);
        }


        .sidebar-footer {
            padding: 14px;

            border-top:
                1px solid rgba(255,255,255,0.08);
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
    background: rgba(128, 128, 128, 0.08);
    color: #808080 !important;
}

.logout:hover i {
    color: #808080 !important;
}
        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            margin-left: 270px;

            min-height: 100vh;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            height: 82px;

            background: white;

            border-bottom:
                1px solid var(--border);

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

            border: 1px solid var(--border);

            border-radius: 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--muted);

            position: relative;
        }


        .top-icon:hover {
            color: var(--blue);

            background: var(--blue-light);
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
                1px solid var(--border);
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


        /* =====================================================
           CONTENT
        ===================================================== */

        .content {
            padding: 30px 32px;
        }


        .welcome {
            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    110deg,
                    #0b1f3a,
                    #143f70
                );

            border-radius: 18px;

            padding: 27px 30px;

            color: white;

            margin-bottom: 24px;

            box-shadow:
                0 12px 35px
                rgba(11,31,58,0.13);
        }


        .welcome::before {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            border-radius: 50%;

            background:
                rgba(23,105,224,0.25);

            right: -50px;

            top: -100px;
        }


        .welcome::after {
            content: "";

            position: absolute;

            width: 150px;
            height: 150px;

            border-radius: 50%;

            border:
                30px solid
                rgba(247,201,72,0.10);

            right: 120px;

            bottom: -100px;
        }


        .welcome-content {
            position: relative;

            z-index: 2;
        }


        .welcome h1 {
            font-size: 25px;

            font-weight: 800;

            margin: 0 0 6px;
        }


        .welcome p {
            color: #bdcce0;

            font-size: 12px;

            margin: 0;
        }


        .welcome-btn {
            position: absolute;

            right: 30px;

            bottom: 27px;

            z-index: 3;

            background: var(--yellow);

            color: #24324a;

            border: none;

            padding: 10px 16px;

            border-radius: 9px;

            font-size: 11px;

            font-weight: 700;
        }


        .welcome-btn:hover {
            background: #ffd867;
        }


        /* =====================================================
           STAT CARDS
        ===================================================== */

        .stat-card {
            background: white;

            border:
                1px solid var(--border);

            border-radius: 15px;

            padding: 20px;

            box-shadow: var(--shadow);

            height: 100%;

            transition: 0.25s;
        }


        .stat-card:hover {
            transform: translateY(-4px);

            box-shadow:
                0 15px 35px
                rgba(16,35,60,0.09);
        }


        .stat-head {
            display: flex;

            justify-content: space-between;
        }


        .stat-icon {
            width: 45px;
            height: 45px;

            border-radius: 12px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 19px;
        }


        .blue {
            background: #edf4ff;
            color: var(--blue);
        }


        .green {
            background: #eaf8f2;
            color: var(--green);
        }


        .yellow {
            background: #fff8e3;
            color: #d79c00;
        }


        .purple {
            background: #f1edff;
            color: var(--purple);
        }


        .stat-title {
            color: var(--muted);

            font-size: 11px;

            margin-top: 15px;
        }


        .stat-number {
            font-family:
                "Plus Jakarta Sans";

            font-size: 25px;

            font-weight: 800;

            margin-top: 4px;
        }


        .stat-footer {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 8px;
        }


        .stat-growth {
            color: var(--green);

            font-size: 10px;

            font-weight: 600;
        }


        .stat-period {
            color: #a2aaba;

            font-size: 9px;
        }


        /* =====================================================
           DASHBOARD CARDS
        ===================================================== */

        .card-box {
            background: white;

            border:
                1px solid var(--border);

            border-radius: 16px;

            box-shadow: var(--shadow);

            height: 100%;
        }


        .card-title-row {
            padding: 19px 21px;

            border-bottom:
                1px solid var(--border);

            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .card-title-row h5 {
            font-size: 14px;

            font-weight: 700;

            margin: 0;
        }


        .card-subtitle {
            color: var(--muted);

            font-size: 10px;

            margin-top: 3px;
        }


        .small-select {
            border:
                1px solid var(--border);

            border-radius: 7px;

            padding: 6px 9px;

            font-size: 10px;

            color: var(--muted);

            background: white;

            outline: none;
        }


        .card-body-custom {
            padding: 21px;
        }


        /* =====================================================
           CHART
        ===================================================== */

        .chart-container {
            height: 275px;
        }


        /* =====================================================
           ATTENDANCE
        ===================================================== */

        .attendance-circle {
            width: 155px;
            height: 155px;

            border-radius: 50%;

            background:
                conic-gradient(
                    var(--blue) 0deg 316deg,
                    #e8edf5 316deg 360deg
                );

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto;

            position: relative;
        }


        .attendance-circle::after {
            content: "";

            position: absolute;

            width: 118px;
            height: 118px;

            background: white;

            border-radius: 50%;
        }


        .attendance-value {
            position: relative;

            z-index: 2;

            text-align: center;
        }


        .attendance-value strong {
            display: block;

            font-family:
                "Plus Jakarta Sans";

            font-size: 27px;

            font-weight: 800;
        }


        .attendance-value span {
            color: var(--muted);

            font-size: 9px;
        }


        .attendance-list {
            margin-top: 20px;
        }


        .attendance-row {
            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 8px 0;

            font-size: 10px;
        }


        .attendance-label {
            display: flex;

            align-items: center;

            gap: 7px;

            color: var(--muted);
        }


        .attendance-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;
        }


        .present {
            background: var(--green);
        }


        .absent {
            background: var(--red);
        }


        .late {
            background: var(--yellow);
        }


        /* =====================================================
           ANNOUNCEMENTS
        ===================================================== */

        .announcement {
            display: flex;

            gap: 12px;

            padding: 14px 0;

            border-bottom:
                1px solid #f0f2f6;
        }


        .announcement:last-child {
            border-bottom: 0;
        }


        .announcement-icon {
            width: 35px;
            height: 35px;

            flex-shrink: 0;

            border-radius: 9px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: var(--blue-light);

            color: var(--blue);
        }


        .announcement-title {
            font-size: 11px;

            font-weight: 700;
        }


        .announcement-text {
            font-size: 9px;

            color: var(--muted);

            line-height: 1.5;

            margin-top: 3px;
        }


        .announcement-time {
            font-size: 8px;

            color: #a4adbb;

            margin-top: 4px;
        }


        /* =====================================================
           EVENTS
        ===================================================== */

        .event {
            display: flex;

            gap: 12px;

            padding: 13px 0;

            border-bottom:
                1px solid #f0f2f6;
        }


        .event:last-child {
            border-bottom: 0;
        }


        .event-date {
            width: 40px;
            height: 44px;

            border-radius: 9px;

            background: var(--blue-light);

            color: var(--blue);

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;
        }


        .event-day {
            font-size: 15px;

            font-weight: 800;

            line-height: 1;
        }


        .event-month {
            font-size: 7px;

            font-weight: 700;

            text-transform: uppercase;

            margin-top: 3px;
        }


        .event-title {
            font-size: 10px;

            font-weight: 700;
        }


        .event-meta {
            color: var(--muted);

            font-size: 8px;

            margin-top: 4px;
        }


        /* =====================================================
           RECENT STUDENTS
        ===================================================== */

        .student-row {
            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 13px 0;

            border-bottom:
                1px solid #f0f2f6;
        }


        .student-row:last-child {
            border-bottom: 0;
        }


        .student-info {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .student-avatar {
            width: 34px;
            height: 34px;

            border-radius: 9px;

            background: #edf4ff;

            color: var(--blue);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 10px;

            font-weight: 700;
        }


        .student-name {
            font-size: 10px;

            font-weight: 700;
        }


        .student-class {
            color: var(--muted);

            font-size: 8px;

            margin-top: 3px;
        }


        .student-status {
            font-size: 8px;

            padding: 5px 8px;

            border-radius: 20px;

            background: #eaf8f2;

            color: var(--green);

            font-weight: 600;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

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
                padding: 22px 20px;
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

            .welcome {
                padding: 22px;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .welcome-btn {
                position: static;

                margin-top: 18px;

                display: inline-block;
            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar" id="sidebar">


    <!-- BRAND -->

    <div class="brand">

        <div class="brand-logo">
            <i class="bi bi-mortarboard-fill"></i>
        </div>

        <div class="brand-name">
            School<span>Sync</span>
        </div>

    </div>


    <!-- SIDEBAR CONTENT -->

    <div class="sidebar-scroll">


        <div class="sidebar-section">
            Overview
        </div>


        <a
            href="{{ url('/admin/dashboard') }}"
            class="menu-link active"
        >
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>


        <div class="sidebar-section">
            People
        </div>


        <a href="#" class="menu-link">
            <i class="bi bi-person-badge"></i>
            Staff
        </a>


        <a href="#" class="menu-link">
            <i class="bi bi-person-video3"></i>
            Teachers
        </a>


        <a href="#" class="menu-link">
            <i class="bi bi-mortarboard"></i>
            Students
        </a>

        <a href="#" class="menu-link">
            <i class="bi bi-building"></i>
            Departments
        </a>


        <div class="sidebar-section">
            Academic
        </div>


        <a href="#" class="menu-link">
            <i class="bi bi-diagram-3"></i>
            Classes
        </a>


        <a href="#" class="menu-link">
            <i class="bi bi-book"></i>
            Subjects
        </a>


        <a href="#" class="menu-link">
            <i class="bi bi-card-checklist"></i>
            Enrollments
        </a>


        <a href="#" class="menu-link">
            <i class="bi bi-calendar-check"></i>
            Attendance
        </a>


        <div class="sidebar-section">
            Finance
        </div>


        <a href="#" class="menu-link">
            <i class="bi bi-wallet2"></i>
            Fees & Payments
        </a>

    </div>


    <!-- FOOTER -->
        
    <div class="sidebar-footer">
    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout">
            <i class="bi bi-arrow-left"></i>
            <span>Logout</span>
        </button>
    </form>
</div>

</aside>



<!-- =====================================================
     MAIN
===================================================== -->

<main class="main">


    <!-- TOPBAR -->

    <header class="topbar">


        <div class="d-flex align-items-center gap-3">

            <button
                class="mobile-btn"
                id="mobileMenu"
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
            
        <a href="#" class="top-icon">

                <i class="bi bi-bell"></i>

                <span class="notification-dot"></span>

            </a>


            <div class="profile">

                <div class="avatar">
                    SF
                </div>

                <div>

                    <div class="profile-name">
                        Staff
                    </div>

                    <div class="profile-role">
                        Staff
                    </div>

                </div>

                <i class="bi bi-chevron-down text-muted small"></i>

            </div>


        </div>


    </header>



    <!-- =================================================
         CONTENT
    ================================================= -->

    <section class="content">


        <!-- WELCOME -->

        <div class="welcome">

            <div class="welcome-content">

                <h1>
                    SchoolSync Dashboard
                </h1>

                <p>
                    Manage your school activities, students, teachers, and academic information.
                </p>

            </div>


            <button class="welcome-btn">

                <i class="bi bi-plus-lg me-1"></i>

                Quick Action

            </button>

        </div>



        <!-- =================================================
             STATISTICS
        ================================================= -->

        <div class="row g-4 mb-4">


            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-head">

                        <div class="stat-icon blue">
                            <i class="bi bi-mortarboard"></i>
                        </div>

                        <i class="bi bi-three-dots text-muted"></i>

                    </div>


                    <div class="stat-title">
                        Total Students
                    </div>

                    <div class="stat-number">
                        1,240
                    </div>


                    <div class="stat-footer">

                        <span class="stat-growth">
                            <i class="bi bi-arrow-up"></i>
                            8.2%
                        </span>

                        <span class="stat-period">
                            vs last month
                        </span>

                    </div>

                </div>

            </div>


            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-head">

                        <div class="stat-icon green">
                            <i class="bi bi-person-video3"></i>
                        </div>

                        <i class="bi bi-three-dots text-muted"></i>

                    </div>


                    <div class="stat-title">
                        Total Teachers
                    </div>

                    <div class="stat-number">
                        86
                    </div>


                    <div class="stat-footer">

                        <span class="stat-growth">
                            <i class="bi bi-arrow-up"></i>
                            3.1%
                        </span>

                        <span class="stat-period">
                            vs last month
                        </span>

                    </div>

                </div>

            </div>


            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-head">

                        <div class="stat-icon yellow">
                            <i class="bi bi-person-badge"></i>
                        </div>

                        <i class="bi bi-three-dots text-muted"></i>

                    </div>


                    <div class="stat-title">
                        Total Staff
                    </div>

                    <div class="stat-number">
                        42
                    </div>


                    <div class="stat-footer">

                        <span class="stat-growth">
                            <i class="bi bi-arrow-up"></i>
                            2 new
                        </span>

                        <span class="stat-period">
                            this month
                        </span>

                    </div>

                </div>

            </div>


            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="stat-head">

                        <div class="stat-icon purple">
                            <i class="bi bi-building"></i>
                        </div>

                        <i class="bi bi-three-dots text-muted"></i>

                    </div>


                    <div class="stat-title">
                        Active Classes
                    </div>

                    <div class="stat-number">
                        35
                    </div>


                    <div class="stat-footer">

                        <span class="stat-growth">
                            <i class="bi bi-check-circle"></i>
                            Active
                        </span>

                        <span class="stat-period">
                            2026–2027
                        </span>

                    </div>

                </div>

            </div>


        </div>



        <!-- =================================================
             CHART + ATTENDANCE
        ================================================= -->

        <div class="row g-4 mb-4">


            <!-- ENROLLMENT CHART -->

            <div class="col-xl-8">

                <div class="card-box">


                    <div class="card-title-row">

                        <div>

                            <h5>
                                Student Enrollment
                            </h5>

                            <div class="card-subtitle">
                                Student enrollment trend throughout the academic year
                            </div>

                        </div>


                        <select class="small-select">

                            <option>
                                2026–2027
                            </option>

                            <option>
                                2025–2026
                            </option>

                        </select>

                    </div>


                    <div class="card-body-custom">

                        <div class="chart-container">

                            <canvas id="enrollmentChart"></canvas>

                        </div>

                    </div>


                </div>

            </div>



            <!-- ATTENDANCE -->

            <div class="col-xl-4">

                <div class="card-box">


                    <div class="card-title-row">

                        <div>

                            <h5>
                                Today's Attendance
                            </h5>

                            <div class="card-subtitle">
                                September 16, 2026
                            </div>

                        </div>

                        <i class="bi bi-three-dots text-muted"></i>

                    </div>


                    <div class="card-body-custom">


                        <div class="attendance-circle">

                            <div class="attendance-value">

                                <strong>
                                    87.8%
                                </strong>

                                <span>
                                    Attendance
                                </span>

                            </div>

                        </div>


                        <div class="attendance-list">


                            <div class="attendance-row">

                                <div class="attendance-label">

                                    <span class="attendance-dot present"></span>

                                    Present

                                </div>

                                <strong>
                                    1,089
                                </strong>

                            </div>


                            <div class="attendance-row">

                                <div class="attendance-label">

                                    <span class="attendance-dot absent"></span>

                                    Absent

                                </div>

                                <strong>
                                    91
                                </strong>

                            </div>


                            <div class="attendance-row">

                                <div class="attendance-label">

                                    <span class="attendance-dot late"></span>

                                    Late

                                </div>

                                <strong>
                                    60
                                </strong>

                            </div>


                        </div>


                    </div>

                </div>

            </div>


        </div>



        <!-- =================================================
             LOWER SECTION
        ================================================= -->

        <div class="row g-4">


            <!-- RECENT STUDENTS -->

            <div class="col-xl-4">

                <div class="card-box">


                    <div class="card-title-row">

                        <div>

                            <h5>
                                Recent Students
                            </h5>

                            <div class="card-subtitle">
                                Newly registered students
                            </div>

                        </div>


                        <a href="#" class="text-primary small">
                            View all
                        </a>

                    </div>


                    <div class="card-body-custom">


                        <div class="student-row">

                            <div class="student-info">

                                <div class="student-avatar">
                                    EJ
                                </div>

                                <div>

                                    <div class="student-name">
                                        Emily Johnson
                                    </div>

                                    <div class="student-class">
                                        Grade 10 · Class A
                                    </div>

                                </div>

                            </div>


                            <span class="student-status">
                                Active
                            </span>

                        </div>


                        <div class="student-row">

                            <div class="student-info">

                                <div class="student-avatar">
                                    ML
                                </div>

                                <div>

                                    <div class="student-name">
                                        Michael Lee
                                    </div>

                                    <div class="student-class">
                                        Grade 9 · Class B
                                    </div>

                                </div>

                            </div>


                            <span class="student-status">
                                Active
                            </span>

                        </div>


                        <div class="student-row">

                            <div class="student-info">

                                <div class="student-avatar">
                                    SO
                                </div>

                                <div>

                                    <div class="student-name">
                                        Sarah Oliver
                                    </div>

                                    <div class="student-class">
                                        Grade 11 · Class A
                                    </div>

                                </div>

                            </div>


                            <span class="student-status">
                                Active
                            </span>

                        </div>


                        <div class="student-row">

                            <div class="student-info">

                                <div class="student-avatar">
                                    DW
                                </div>

                                <div>

                                    <div class="student-name">
                                        Daniel Wong
                                    </div>

                                    <div class="student-class">
                                        Grade 8 · Class C
                                    </div>

                                </div>

                            </div>


                            <span class="student-status">
                                Active
                            </span>

                        </div>


                    </div>

                </div>

            </div>



            <!-- ANNOUNCEMENTS -->

            <div class="col-xl-4">

                <div class="card-box">


                    <div class="card-title-row">

                        <div>

                            <h5>
                                Announcements
                            </h5>

                            <div class="card-subtitle">
                                Latest school updates
                            </div>

                        </div>


                        <a href="#" class="text-primary small">
                            View all
                        </a>

                    </div>


                    <div class="card-body-custom">


                        <div class="announcement">

                            <div class="announcement-icon">
                                <i class="bi bi-megaphone"></i>
                            </div>

                            <div>

                                <div class="announcement-title">
                                    Midterm Examination
                                </div>

                                <div class="announcement-text">
                                    Midterm examinations will begin next Monday.
                                </div>

                                <div class="announcement-time">
                                    2 hours ago
                                </div>

                            </div>

                        </div>


                        <div class="announcement">

                            <div class="announcement-icon">
                                <i class="bi bi-info-circle"></i>
                            </div>

                            <div>

                                <div class="announcement-title">
                                    Parent Meeting
                                </div>

                                <div class="announcement-text">
                                    Parent-teacher meeting scheduled for September 25.
                                </div>

                                <div class="announcement-time">
                                    Yesterday
                                </div>

                            </div>

                        </div>


                        <div class="announcement">

                            <div class="announcement-icon">
                                <i class="bi bi-calendar-event"></i>
                            </div>

                            <div>

                                <div class="announcement-title">
                                    School Activity Day
                                </div>

                                <div class="announcement-text">
                                    Annual school activity day will be held next month.
                                </div>

                                <div class="announcement-time">
                                    2 days ago
                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>



            <!-- UPCOMING EVENTS -->

            <div class="col-xl-4">

                <div class="card-box">


                    <div class="card-title-row">

                        <div>

                            <h5>
                                Upcoming Events
                            </h5>

                            <div class="card-subtitle">
                                Important dates
                            </div>

                        </div>


                        <a href="#" class="text-primary small">
                            Calendar
                        </a>

                    </div>


                    <div class="card-body-custom">


                        <div class="event">

                            <div class="event-date">

                                <span class="event-day">
                                    18
                                </span>

                                <span class="event-month">
                                    SEP
                                </span>

                            </div>


                            <div>

                                <div class="event-title">
                                    Teachers Meeting
                                </div>

                                <div class="event-meta">
                                    <i class="bi bi-clock"></i>
                                    10:00 AM · Staff Room
                                </div>

                            </div>

                        </div>


                        <div class="event">

                            <div class="event-date">

                                <span class="event-day">
                                    25
                                </span>

                                <span class="event-month">
                                    SEP
                                </span>

                            </div>


                            <div>

                                <div class="event-title">
                                    Parent-Teacher Meeting
                                </div>

                                <div class="event-meta">
                                    <i class="bi bi-clock"></i>
                                    9:00 AM · Main Hall
                                </div>

                            </div>

                        </div>


                        <div class="event">

                            <div class="event-date">

                                <span class="event-day">
                                    02
                                </span>

                                <span class="event-month">
                                    OCT
                                </span>

                            </div>


                            <div>

                                <div class="event-title">
                                    Midterm Examination
                                </div>

                                <div class="event-meta">
                                    <i class="bi bi-clock"></i>
                                    All Day · Examination Hall
                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>


        </div>


    </section>


</main>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>


    /* =================================================
       MOBILE SIDEBAR
    ================================================= */

    const mobileMenu =
        document.getElementById("mobileMenu");

    const sidebar =
        document.getElementById("sidebar");


    mobileMenu.addEventListener("click", function () {

        sidebar.classList.toggle("show");

    });



    /* =================================================
       ENROLLMENT CHART
    ================================================= */

    const ctx =
        document.getElementById("enrollmentChart");


    new Chart(ctx, {

        type: "line",

        data: {

            labels: [
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ],

            datasets: [

                {

                    label: "Students",

                    data: [
                        1040,
                        1090,
                        1135,
                        1180,
                        1210,
                        1230,
                        1240
                    ],

                    borderColor: "#1769e0",

                    backgroundColor:
                        "rgba(23,105,224,0.08)",

                    fill: true,

                    tension: 0.4,

                    borderWidth: 2,

                    pointRadius: 3,

                    pointHoverRadius: 6

                }

            ]

        },


        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {
                    display: false
                }

            },


            scales: {

                y: {

                    beginAtZero: false,

                    grid: {
                        color: "#eef1f5"
                    },

                    ticks: {
                        color: "#8a95a6",

                        font: {
                            size: 10
                        }
                    }

                },


                x: {

                    grid: {
                        display: false
                    },

                    ticks: {

                        color: "#8a95a6",

                        font: {
                            size: 10
                        }
                    }

                }

            }

        }

    });


</script>


</body>
</html>