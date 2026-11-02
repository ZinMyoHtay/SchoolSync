<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Profile | SchoolSync</title>

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
            background: rgba(128, 128, 128, 0.08);
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

        .breadcrumb {
            margin-bottom: 0;
            font-size: 12px;
        }

        .breadcrumb-item a {
            color: var(--blue);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--muted);
        }

        /* ================================
           ALERTS
        ================================= */

        .alert {
            border-radius: 12px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* ================================
           PROFILE HERO
        ================================= */

        .profile-hero {
            background: linear-gradient(135deg, #0b1f3a, #1769e0);
            border-radius: 18px;
            padding: 28px 30px;
            color: white;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .profile-hero::after {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            right: -70px;
            top: -120px;
        }

        .profile-hero::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
            right: 120px;
            bottom: -130px;
        }

        .profile-hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .profile-main {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile-avatar-large {
            width: 86px;
            height: 86px;
            border-radius: 20px;
            background: var(--blue);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 31px;
            font-weight: 800;
            flex-shrink: 0;
            border: 2px solid rgba(255,255,255,0.18);
        }

        .profile-name {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .profile-code {
            color: rgba(255,255,255,0.72);
            font-size: 12px;
        }

        .student-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 10px;
            padding: 6px 11px;
            border-radius: 20px;
            background: rgba(255,255,255,0.10);
            color: #fff;
            font-size: 11px;
            font-weight: 600;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #39d98a;
        }

        /* ================================
           INFO CARDS
        ================================= */

        .info-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 22px;
            height: 100%;
        }

        .info-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
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

        .info-item {
            padding: 13px 0;
            border-bottom: 1px solid #eef1f5;
            min-height: 67px;
        }

        .info-item:first-child {
            padding-top: 0;
        }

        .info-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-label {
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .info-value {
            color: var(--text);
            font-size: 13px;
            font-weight: 600;
            word-break: break-word;
        }

        /* ================================
           ACCOUNT STATUS
        ================================= */

        .status-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 13px 0;
            border-bottom: 1px solid #eef1f5;
        }

        .status-row:last-child {
            border-bottom: none;
        }

        .status-row-label {
            font-size: 12px;
            color: var(--muted);
        }

        .status-row-value {
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px;
            border-radius: 20px;
            background: #eaf8f1;
            color: var(--green);
            font-size: 10px;
            font-weight: 700;
        }

        .status-badge i {
            font-size: 10px;
        }

        /* ================================
           PASSWORD
        ================================= */

        .password-card {
            margin-top: 15px;
        }

        .password-form-label {
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .password-form .form-control {
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px 12px;
            font-size: 13px;
        }

        .password-form .form-control:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 0.2rem rgba(23,105,224,0.08);
        }

        .password-button {
            background: var(--blue);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 10px 16px;
            font-size: 12px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .password-button:hover {
            background: var(--blue-dark);
            color: #fff;
        }

        .validation-error {
            color: var(--red);
            font-size: 11px;
            margin-top: 5px;
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

            .profile-hero-content {
                align-items: flex-start;
                gap: 20px;
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

            .profile-hero {
                padding: 23px 20px;
            }

            .profile-main {
                align-items: flex-start;
            }

            .profile-avatar-large {
                width: 70px;
                height: 70px;
                font-size: 25px;
            }

            .profile-name {
                font-size: 21px;
            }

            .info-card {
                padding: 17px;
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
                    <span>Dashboard</span>
                </a>
            </li>

        </ul>

        <div class="menu-title">
            School
        </div>

        <ul class="sidebar-menu">

            <li>
                <a
                    href="{{ route('student.profile.edit') }}"
                    class="active"
                >
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li>
                <a href="{{ route('student.classes.index') }}">
                    <i class="bi bi-diagram-3"></i>
                    <span>Classes</span>
                </a>
            </li>

            <li>
                <a href="{{ route('student.subjects.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Subjects</span>
                </a>
            </li>

            <li>
                <a href="{{ route('student.attendance.index') }}">
                    <i class="bi bi-calendar-check"></i>
                    <span>Attendance</span>
                </a>
            </li>

            <!-- <li>
                <a href="{{ route('student.results.index') }}">
                    <i class="bi bi-bar-chart-line"></i>
                    <span>Results</span>
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
                    <span>Schedule</span>
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
                    <span>Fees & Payments</span>
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
                    <span>Announcements</span>
                </a>
            </li>

        </ul>

        <div class="sidebar-footer">

            <form action="{{ route('logout') }}" method="POST">

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
                        Student Profile
                    </h1>

                    <p>
                        View your personal and academic information.
                    </p>

                </div>

               <a
    href="{{ route('student.dashboard') }}"
    class="btn btn-light border d-inline-flex align-items-center gap-2"
    style="font-size: 12px; font-weight: 600; border-radius: 10px; padding: 9px 14px;"
>
    <i class="bi bi-arrow-left"></i>
    Back
</a>

            </div>


            <!-- SUCCESS MESSAGE -->

            @if(session('success'))

                <div class="alert alert-success">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            <!-- VALIDATION MESSAGE -->

            @if($errors->any())

                <div class="alert alert-danger">

                    <i class="bi bi-exclamation-circle-fill me-2"></i>

                    Please correct the errors below.

                </div>

            @endif


            <!-- ================================
                 PROFILE HERO
            ================================= -->

            <section class="profile-hero">

                <div class="profile-hero-content">

                    <div class="profile-main">

                        <div class="profile-avatar-large">

                            {{ strtoupper(substr($user->name ?? 'ST', 0, 2)) }}

                        </div>

                        <div>

                            <div class="profile-name">

                                {{ $user->name ?? '-' }}

                            </div>

                            <div class="profile-code">

                                Student ID:

                                {{ $student->student_code ?? $student->student_id ?? '-' }}

                            </div>

                            <div class="student-status">

                                <span class="status-dot"></span>

                                Active Student

                            </div>

                        </div>

                    </div>

                </div>

            </section>


            <!-- ================================
                 INFORMATION
            ================================= -->

            <div class="row g-3">


                <!-- ============================
                     PERSONAL INFORMATION
                ============================= -->

                <div class="col-xl-7 col-lg-7">

                    <div class="info-card">

                        <div class="info-card-header">

                            <div class="info-card-icon">

                                <i class="bi bi-person"></i>

                            </div>

                            <div>

                                <h3 class="info-card-title">
                                    Personal Information
                                </h3>

                                <p class="info-card-subtitle">
                                    Your basic personal details
                                </p>

                            </div>

                        </div>


                        <div class="row g-0">


                            <!-- Full Name -->

                            <div class="col-md-6 pe-md-3">

                                <div class="info-item">

                                    <div class="info-label">
                                        Full Name
                                    </div>

                                    <div class="info-value">
                                        {{ $user->name ?? '-' }}
                                    </div>

                                </div>

                            </div>


                            <!-- Student ID -->

                            <div class="col-md-6 ps-md-3">

                                <div class="info-item">

                                    <div class="info-label">
                                        Student ID
                                    </div>

                                    <div class="info-value">
                                        {{ $student->student_code ?? $student->student_id ?? '-' }}
                                    </div>

                                </div>

                            </div>


                            <!-- Email -->

                            <div class="col-md-6 pe-md-3">

                                <div class="info-item">

                                    <div class="info-label">
                                        Email Address
                                    </div>

                                    <div class="info-value">
                                        {{ $user->email ?? '-' }}
                                    </div>

                                </div>

                            </div>


                            <!-- Phone -->

                            <div class="col-md-6 ps-md-3">

                                <div class="info-item">

                                    <div class="info-label">
                                        Phone Number
                                    </div>

                                    <div class="info-value">
                                        {{ $student->phone ?? '-' }}
                                    </div>

                                </div>

                            </div>


                            <!-- Date of Birth -->

                            <div class="col-md-6 pe-md-3">

                                <div class="info-item">

                                    <div class="info-label">
                                        Date of Birth
                                    </div>

                                    <div class="info-value">
                                        {{ $student->date_of_birth ?? '-' }}
                                    </div>

                                </div>

                            </div>


                          


                        </div>

                    </div>

                </div>


                <!-- ============================
                     ACADEMIC INFORMATION
                ============================= -->

                <div class="col-xl-5 col-lg-5">

                    <div class="info-card">

                        <div class="info-card-header">

                            <div class="info-card-icon">

                                <i class="bi bi-mortarboard"></i>

                            </div>

                            <div>

                                <h3 class="info-card-title">
                                    Academic Information
                                </h3>

                                <p class="info-card-subtitle">
                                    Current academic details
                                </p>

                            </div>

                        </div>


                        <div class="row g-0">


                            <!-- Class -->

                            <div class="col-md-6 pe-md-3">

                                <div class="info-item">

                                    <div class="info-label">
                                        Class
                                    </div>

                                    <div class="info-value">
                                        {{ $currentEnrollment?->classroom?->class_name ?? '-' }}
                                    </div>

                                </div>

                            </div>


                            <!-- Academic Year -->

                            <div class="col-md-6 ps-md-3">

                                <div class="info-item">

                                    <div class="info-label">
                                        Academic Year
                                    </div>

                                    <div class="info-value">
                                        {{ $academicYear }}
                                    </div>

                                </div>

                            </div>


                            <!-- Subjects -->

                            <div class="col-md-6 pe-md-3">

                                <div class="info-item">

                                    <div class="info-label">
                                        Subjects
                                    </div>

                                    <div class="info-value">
                                        {{ $subjectsCount }} Subjects
                                    </div>

                                </div>

                            </div>


                            <!-- Current Grade -->




                        </div>

                    </div>

                </div>


                <!-- ============================
                     ACCOUNT INFORMATION
                ============================= -->

                <div class="col-xl-5 col-lg-5">

                    <div class="info-card">

                        <div class="info-card-header">

                            <div class="info-card-icon">

                                <i class="bi bi-shield-check"></i>

                            </div>

                            <div>

                                <h3 class="info-card-title">
                                    Account Information
                                </h3>

                                <p class="info-card-subtitle">
                                    SchoolSync account status
                                </p>

                            </div>

                        </div>


                        <!-- Account Role -->

                        <div class="status-row">

                            <span class="status-row-label">
                                Account Role
                            </span>

                            <span class="status-row-value">

                                {{ ucfirst($user->role ?? 'student') }}

                            </span>

                        </div>


                        <!-- Account Status -->

                        <div class="status-row">

                            <span class="status-row-label">
                                Account Status
                            </span>

                            <span class="status-badge">

                                <i class="bi bi-check-circle-fill"></i>

                                Active

                            </span>

                        </div>


                


                        <!-- Student Since -->

                        <div class="status-row">

                            <span class="status-row-label">
                                Student Since
                            </span>

                            <span class="status-row-value">

                                {{ optional($student->created_at ?? null)->format('Y') ?? '-' }}

                            </span>

                        </div>


                    </div>

                </div>


                <!-- ============================
                     CHANGE PASSWORD
                ============================= -->

                <div class="col-12">

                    <div class="info-card password-card">

                        <div class="info-card-header">

                            <div class="info-card-icon">

                                <i class="bi bi-key"></i>

                            </div>

                            <div>

                                <h3 class="info-card-title">
                                    Change Password
                                </h3>

                                <p class="info-card-subtitle">
                                    Update your SchoolSync account password
                                </p>

                            </div>

                        </div>


                        <form
                            action="{{ route('student.profile.update') }}"
                            method="POST"
                            class="password-form"
                        >

                            @csrf

                            @method('PUT')


                            <div class="row g-3">


                                <!-- Current Password -->

                                <div class="col-md-4">

                                    <label class="password-form-label">
                                        Current Password
                                    </label>

                                    <input
                                        type="password"
                                        name="current_password"
                                        class="form-control"
                                        placeholder="Enter current password"
                                        required
                                    >

                                    @error('current_password')

                                        <div class="validation-error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- New Password -->

                                <div class="col-md-4">

                                    <label class="password-form-label">
                                        New Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="Enter new password"
                                        required
                                    >

                                    @error('password')

                                        <div class="validation-error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- Confirm Password -->

                                <div class="col-md-4">

                                    <label class="password-form-label">
                                        Confirm New Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        class="form-control"
                                        placeholder="Confirm new password"
                                        required
                                    >

                                </div>


                                <!-- Button -->

                                <div class="col-12">

                                    <button
                                        type="submit"
                                        class="password-button"
                                    >

                                        <i class="bi bi-shield-lock me-1"></i>

                                        Update Password

                                    </button>

                                </div>


                            </div>

                        </form>

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

        mobileMenu.addEventListener(
            "click",
            function () {

                sidebar.classList.toggle("show");

            }
        );

    </script>

</body>

</html>