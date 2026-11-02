<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View User | SchoolSync</title>

    <!-- Bootstrap 5.3.3 -->
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
            font-size: 13px;
        }

        a {
            text-decoration: none;
        }


        /* =====================================================
           SIDEBAR
        ====================================================== */

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
            background: linear-gradient(90deg,#1769e0,#2377ed);
            box-shadow: 0 8px 20px rgba(23,105,224,0.25);
        }

        .sidebar-footer {
            padding: 14px;
            border-top: 1px solid rgba(255,255,255,0.08);
            margin-top: 25px;
            padding-top: 18px;
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
        ====================================================== */

        .main {
            margin-left: 270px;
            min-height: 100vh;
        }


        /* =====================================================
           TOPBAR
        ====================================================== */

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
            border-left: 1px solid var(--border);
        }

        .avatar {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg,#d9e9ff,#edf5ff);
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
        ====================================================== */

        .content {
            padding: 30px 32px;
        }


        /* =====================================================
           PAGE HEADER
        ====================================================== */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-title {
            font-family: "Plus Jakarta Sans";
            font-size: 25px;
            font-weight: 800;
            margin: 0;
            color: var(--text);
        }

        .page-subtitle {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: white;
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            color: var(--blue);
            background: var(--blue-light);
            border-color: #cfe0fa;
        }

        .edit-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            background: var(--blue);
            color: white;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .edit-btn:hover {
            background: var(--blue-dark);
            color: white;
        }


        /* =====================================================
           USER PROFILE CARD
        ====================================================== */

        .profile-card {
            position: relative;
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 24px;
        }


        /* =====================================================
           PROFILE BANNER
        ====================================================== */

        .profile-banner {
            position: relative;
            height: 135px;
            overflow: hidden;

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(76,145,245,0.30) 0,
                    rgba(76,145,245,0) 34%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(23,105,224,0.35) 0,
                    rgba(23,105,224,0) 38%
                ),
                linear-gradient(
                    135deg,
                    #081a31 0%,
                    #0b1f3a 30%,
                    #123b6d 68%,
                    #1769e0 100%
                );
        }

        .profile-banner::before {
            content: "";
            position: absolute;

            width: 220px;
            height: 220px;

            right: -60px;
            top: -110px;

            border: 1px solid rgba(255,255,255,0.13);
            border-radius: 50%;
        }

        .profile-banner::after {
            content: "";
            position: absolute;

            width: 330px;
            height: 330px;

            right: 80px;
            bottom: -280px;

            border: 1px solid rgba(255,255,255,0.10);
            border-radius: 50%;
        }

        .profile-banner .banner-shine {
            position: absolute;

            width: 100px;
            height: 100px;

            border-radius: 50%;

            background: rgba(255,255,255,0.08);

            top: 18px;
            left: 42%;

            filter: blur(2px);
        }


        /* =====================================================
           PROFILE MAIN
        ====================================================== */

        .profile-main {
            position: relative;

            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            padding: 0 30px 28px;

            background: #ffffff;
        }


        /* =====================================================
           PROFILE LEFT
        ====================================================== */

        .profile-left {
            display: flex;
            align-items: flex-start;
            gap: 20px;

            min-width: 0;
        }


        /* =====================================================
           LARGE AVATAR
        ====================================================== */

        .large-avatar {
            width: 92px;
            height: 92px;
            min-width: 92px;

            margin-top: -38px;

            border-radius: 20px;

            background:
                linear-gradient(
                    135deg,
                    #ffffff 0%,
                    #eef5ff 100%
                );

            border: 5px solid #ffffff;

            box-shadow:
                0 8px 25px rgba(16,35,60,0.18),
                0 2px 5px rgba(16,35,60,0.08);

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--blue);

            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 31px;
            font-weight: 800;

            line-height: 1;

            position: relative;
            z-index: 5;
        }

        .large-avatar::after {
            content: "";

            position: absolute;

            inset: -8px;

            border-radius: 24px;

            border: 1px solid rgba(23,105,224,0.12);

            pointer-events: none;
        }


        /* =====================================================
           PROFILE INFORMATION
        ====================================================== */

        .profile-info {
            padding-top: 20px;

            min-width: 0;
        }

        .profile-info h3 {
            margin: 0;

            font-family: "Plus Jakarta Sans", sans-serif;

            font-size: 23px;
            line-height: 1.3;

            font-weight: 800;

            color: #172033;

            white-space: nowrap;

            overflow: hidden;
            text-overflow: ellipsis;
        }

        .profile-info p {
            margin: 6px 0 0;

            color: #667085;

            font-family: "Inter", sans-serif;

            font-size: 13px;
            line-height: 1.5;

            font-weight: 500;

            white-space: nowrap;

            overflow: hidden;
            text-overflow: ellipsis;
        }


        /* =====================================================
           ROLE BADGES
        ====================================================== */

        .role-badge {
            display: inline-flex;

            align-items: center;
            gap: 6px;

            margin-top: 11px;

            padding: 6px 13px;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 700;

            letter-spacing: 0.1px;
        }

        .role-admin {
            background: #f0eaff;
            color: var(--purple);
        }

        .role-staff {
            background: #fff4df;
            color: #b87500;
        }

        .role-teacher {
            background: #e9f8f1;
            color: var(--green);
        }

        .role-student {
            background: var(--blue-light);
            color: var(--blue);
        }


        /* =====================================================
           PROFILE STATUS
        ====================================================== */

        .profile-status {
            padding-top: 22px;

            flex-shrink: 0;
        }

        .status-badge {
            display: inline-flex;

            align-items: center;
            gap: 7px;

            padding: 7px 13px;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 700;
        }

        .status-active {
            background: #e8f8f1;
            color: var(--green);
        }

        .status-inactive {
            background: #fff0f0;
            color: var(--red);
        }

        .status-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: currentColor;

            box-shadow: 0 0 0 3px rgba(24,166,107,0.10);
        }


        /* =====================================================
           INFORMATION CARDS
        ====================================================== */

        .info-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
            height: 100%;
        }

        .card-header-custom {
            padding: 18px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--blue-light);
            color: var(--blue);
            font-size: 16px;
        }

        .card-header-custom h5 {
            margin: 0;
            font-family: "Plus Jakarta Sans";
            font-size: 13px;
            font-weight: 800;
        }

        .card-body-custom {
            padding: 20px 22px;
        }

        .info-item {
            margin-bottom: 18px;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-label {
            color: var(--muted);
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 5px;
        }

        .info-value {
            color: var(--text);
            font-size: 13px;
            font-weight: 600;
            word-break: break-word;
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

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

            .profile-main {
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }

            .profile-status {
                padding-top: 0;
                margin-left: 112px;
            }
        }


        @media (max-width: 767px) {

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .header-actions {
                width: 100%;
            }

            .back-btn,
            .edit-btn {
                flex: 1;
            }

            .profile-main {
                padding-left: 22px;
                padding-right: 22px;
            }

            .profile-banner {
                height: 125px;
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

            .profile-banner {
                height: 110px;
            }

            .profile-main {
                padding: 0 18px 22px;
            }

            .profile-left {
                gap: 14px;
            }

            .large-avatar {
                width: 72px;
                height: 72px;
                min-width: 72px;

                margin-top: -30px;

                border-radius: 16px;

                font-size: 24px;
            }

            .large-avatar::after {
                inset: -6px;
                border-radius: 19px;
            }

            .profile-info {
                padding-top: 16px;
                min-width: 0;
            }

            .profile-info h3 {
                font-size: 17px;
            }

            .profile-info p {
                font-size: 11px;
                max-width: 210px;
            }

            .role-badge {
                margin-top: 8px;
                padding: 5px 10px;
                font-size: 9px;
            }

            .profile-status {
                margin-left: 0;
            }

            .header-actions {
                flex-direction: column;
                width: 100%;
            }

            .back-btn,
            .edit-btn {
                width: 100%;
                flex: none;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
====================================================== -->

<aside class="sidebar" id="sidebar">

    <div class="brand">

        <div class="brand-logo">
             <img src="{{ asset('images/schoolsync-logo.png') }}"
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
            href="{{ url('/admin/dashboard') }}"
            class="menu-link"
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
            class="menu-link active"
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

                <a href="{{ route('admin.academic-years.index') }}" class="menu-link">
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


<!-- =====================================================
     MAIN
====================================================== -->

<div class="main">


    <!-- =================================================
         TOPBAR
    ================================================== -->

    <div class="topbar">

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
                    placeholder="Search anything..."
                >

            </div>

        </div>


        <div class="top-right">

            <!-- Notification -->

            <div class="top-icon">

                <i class="bi bi-bell"></i>

                <span class="notification-dot"></span>

            </div>


            <!-- Admin Profile -->

            <div class="profile">

                <div class="avatar">

                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                </div>


                <div>

                    <div class="profile-name">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </div>

                     <div class="profile-role">
            {{ ucfirst(Auth::user()->role) }}
        </div>


                </div>

            </div>

        </div>

    </div>


    <!-- =================================================
         PAGE CONTENT
    ================================================== -->

    <main class="content">


        <!-- =================================================
             PAGE HEADER
        ================================================== -->

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    View User
                </h1>

                <p class="page-subtitle">
                    View detailed information about this SchoolSync user.
                </p>

            </div>


            <div class="header-actions">

                <a
                    href="{{ route('admin.users.index') }}"
                    class="back-btn"
                >
                    <i class="bi bi-arrow-left"></i>
                    Back to Users
                </a>


                <a
                    href="{{ route('admin.users.edit', $user->user_id) }}"
                    class="edit-btn"
                >
                    <i class="bi bi-pencil-square"></i>
                    Edit User
                </a>

            </div>

        </div>


        <!-- =================================================
             USER PROFILE HEADER
        ================================================== -->

        <div class="profile-card">


            <!-- PROFILE BANNER -->

            <div class="profile-banner">

                <div class="banner-shine"></div>

            </div>


            <!-- PROFILE DETAILS -->

            <div class="profile-main">

                <div class="profile-left">


                    <!-- USER AVATAR -->

                    <div class="large-avatar">

                        {{ strtoupper(substr($user->name, 0, 1)) }}

                    </div>


                    <!-- USER INFORMATION -->

                    <div class="profile-info">

                        <h3>
                            {{ $user->name }}
                        </h3>

                        <p>

                            <i class="bi bi-envelope me-1"></i>

                            {{ $user->email }}

                        </p>


                        @if($user->role === 'admin')

                            <span class="role-badge role-admin">

                                <i class="bi bi-shield-check"></i>

                                Admin

                            </span>

                        @elseif($user->role === 'staff')

                            <span class="role-badge role-staff">

                                <i class="bi bi-person-badge"></i>

                                Staff

                            </span>

                        @elseif($user->role === 'teacher')

                            <span class="role-badge role-teacher">

                                <i class="bi bi-person-video3"></i>

                                Teacher

                            </span>

                        @elseif($user->role === 'student')

                            <span class="role-badge role-student">

                                <i class="bi bi-mortarboard"></i>

                                Student

                            </span>

                        @endif

                    </div>

                </div>


                <!-- ACCOUNT STATUS -->

                <div class="profile-status">

                    @if($user->status === 'active')

                        <span class="status-badge status-active">

                            <span class="status-dot"></span>

                            Active

                        </span>

                    @else

                        <span class="status-badge status-inactive">

                            <span class="status-dot"></span>

                            Inactive

                        </span>

                    @endif

                </div>

            </div>

        </div>


        <!-- =================================================
             INFORMATION SECTIONS
        ================================================== -->

        <div class="row g-4">


            <!-- =================================================
                 ACCOUNT INFORMATION
            ================================================== -->

            <div class="col-lg-6">

                <div class="info-card">


                    <div class="card-header-custom">

                        <div class="card-header-icon">

                            <i class="bi bi-person-vcard"></i>

                        </div>

                        <h5>
                            Account Information
                        </h5>

                    </div>


                    <div class="card-body-custom">


                        <!-- USER ID -->

                        <div class="info-item">

                            <div class="info-label">
                                User ID
                            </div>

                            <div class="info-value">

                                USR-{{ str_pad($user->user_id, 3, '0', STR_PAD_LEFT) }}

                            </div>

                        </div>


                        <!-- FULL NAME -->

                        <div class="info-item">

                            <div class="info-label">
                                Full Name
                            </div>

                            <div class="info-value">

                                {{ $user->name }}

                            </div>

                        </div>


                        <!-- EMAIL -->

                        <div class="info-item">

                            <div class="info-label">
                                Email Address
                            </div>

                            <div class="info-value">

                                {{ $user->email }}

                            </div>

                        </div>


                        <!-- ROLE -->

                        <div class="info-item">

                            <div class="info-label">
                                Account Role
                            </div>

                            <div class="info-value">

                                {{ ucfirst($user->role) }}

                            </div>

                        </div>


                        <!-- STATUS -->

                        <div class="info-item">

                            <div class="info-label">
                                Account Status
                            </div>

                            <div class="info-value">

                                @if($user->status === 'active')

                                    <span class="status-badge status-active">

                                        <span class="status-dot"></span>

                                        Active

                                    </span>

                                @else

                                    <span class="status-badge status-inactive">

                                        <span class="status-dot"></span>

                                        Inactive

                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 STAFF INFORMATION
            ================================================== -->

            @if(in_array($user->role, ['staff', 'teacher']))

                @php

                    $staff = $user->staff;

                @endphp


                <div class="col-lg-6">

                    <div class="info-card">


                        <div class="card-header-custom">

                            <div class="card-header-icon">

                                <i class="bi bi-briefcase"></i>

                            </div>

                            <h5>
                                Staff Information
                            </h5>

                        </div>


                        <div class="card-body-custom">


                            <!-- STAFF CODE -->

                            <div class="info-item">

                                <div class="info-label">
                                    Staff Code
                                </div>

                                <div class="info-value">

                                    {{ $staff?->staff_code ?? '—' }}

                                </div>

                            </div>


                            <!-- DEPARTMENT -->

                            <div class="info-item">

                                <div class="info-label">
                                    Department
                                </div>

                                <div class="info-value">

                                    {{ $staff?->department?->department_name ?? '—' }}

                                </div>

                            </div>


                            <!-- PHONE -->

                            <div class="info-item">

                                <div class="info-label">
                                    Phone
                                </div>

                                <div class="info-value">

                                    {{ $staff?->phone ?? '—' }}

                                </div>

                            </div>


                            <!-- POSITION -->

                            <div class="info-item">

                                <div class="info-label">
                                    Position
                                </div>

                                <div class="info-value">

                                    {{ $staff?->position ?? '—' }}

                                </div>

                            </div>


                            <!-- HIRE DATE -->

                            <div class="info-item">

                                <div class="info-label">
                                    Hire Date
                                </div>

                                <div class="info-value">

                                    {{ $staff?->hire_date
                                        ? \Carbon\Carbon::parse($staff->hire_date)->format('M d, Y')
                                        : '—'
                                    }}

                                </div>

                            </div>


                            <!-- ADDRESS -->

                            <div class="info-item">

                                <div class="info-label">
                                    Address
                                </div>

                                <div class="info-value">

                                    {{ $staff?->address ?? '—' }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endif


            <!-- =================================================
                 TEACHER INFORMATION
            ================================================== -->

            @if($user->role === 'teacher')

                @php

                    $staff = $user->staff;

                    $teacher = $staff?->teacher;

                @endphp


                <div class="col-lg-6">

                    <div class="info-card">


                        <div class="card-header-custom">

                            <div class="card-header-icon">

                                <i class="bi bi-person-video3"></i>

                            </div>

                            <h5>
                                Teacher Information
                            </h5>

                        </div>


                        <div class="card-body-custom">


                            <!-- TEACHER CODE -->

                            <div class="info-item">

                                <div class="info-label">
                                    Teacher Code
                                </div>

                                <div class="info-value">

                                    {{ $teacher?->teacher_code ?? '—' }}

                                </div>

                            </div>


                            <!-- SPECIALIZATION -->

                            <div class="info-item">

                                <div class="info-label">
                                    Specialization
                                </div>

                                <div class="info-value">

                                    {{ $teacher?->specialization ?? '—' }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endif


            <!-- =================================================
                 STUDENT INFORMATION
            ================================================== -->

            @if($user->role === 'student')

                @php

                    $student = $user->student;

                @endphp


                <div class="col-lg-6">

                    <div class="info-card">


                        <div class="card-header-custom">

                            <div class="card-header-icon">

                                <i class="bi bi-mortarboard"></i>

                            </div>

                            <h5>
                                Student Information
                            </h5>

                        </div>


                        <div class="card-body-custom">


                            <!-- STUDENT CODE -->

                            <div class="info-item">

                                <div class="info-label">
                                    Student Code
                                </div>

                                <div class="info-value">

                                    {{ $student?->student_code ?? '—' }}

                                </div>

                            </div>


                            <!-- DATE OF BIRTH -->

                            <div class="info-item">

                                <div class="info-label">
                                    Date of Birth
                                </div>

                                <div class="info-value">

                                    {{ $student?->date_of_birth
                                        ? \Carbon\Carbon::parse($student->date_of_birth)->format('M d, Y')
                                        : '—'
                                    }}

                                </div>

                            </div>


                            <!-- PHONE -->

                            <div class="info-item">

                                <div class="info-label">
                                    Phone
                                </div>

                                <div class="info-value">

                                    {{ $student?->phone ?? '—' }}

                                </div>

                            </div>


                            <!-- ADMISSION DATE -->

                            <div class="info-item">

                                <div class="info-label">
                                    Admission Date
                                </div>

                                <div class="info-value">

                                    {{ $student?->admission_date
                                        ? \Carbon\Carbon::parse($student->admission_date)->format('M d, Y')
                                        : '—'
                                    }}

                                </div>

                            </div>


                            <!-- ADDRESS -->

                            <div class="info-item">

                                <div class="info-label">
                                    Address
                                </div>

                                <div class="info-value">

                                    {{ $student?->address ?? '—' }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     PARENT / GUARDIAN INFORMATION
                ================================================== -->

                <div class="col-lg-6">

                    <div class="info-card">


                        <div class="card-header-custom">

                            <div class="card-header-icon">

                                <i class="bi bi-people"></i>

                            </div>

                            <h5>
                                Parent / Guardian Information
                            </h5>

                        </div>


                        <div class="card-body-custom">


                            <!-- PARENT NAME -->

                            <div class="info-item">

                                <div class="info-label">
                                    Parent / Guardian Name
                                </div>

                                <div class="info-value">

                                    {{ $student?->parent_name ?? '—' }}

                                </div>

                            </div>


                            <!-- RELATIONSHIP -->

                            <div class="info-item">

                                <div class="info-label">
                                    Relationship
                                </div>

                                <div class="info-value">

                                    {{ $student?->parent_relationship ?? '—' }}

                                </div>

                            </div>


                            <!-- PHONE -->

                            <div class="info-item">

                                <div class="info-label">
                                    Phone
                                </div>

                                <div class="info-value">

                                    {{ $student?->parent_phone ?? '—' }}

                                </div>

                            </div>


                            <!-- EMAIL -->

                            <div class="info-item">

                                <div class="info-label">
                                    Email
                                </div>

                                <div class="info-value">

                                    {{ $student?->parent_email ?? '—' }}

                                </div>

                            </div>


                            <!-- ADDRESS -->

                            <div class="info-item">

                                <div class="info-label">
                                    Address
                                </div>

                                <div class="info-value">

                                    {{ $student?->parent_address ?? '—' }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </main>

</div>


<!-- =====================================================
     MOBILE SIDEBAR SCRIPT
====================================================== -->

<script>

    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {

        sidebar.classList.toggle("show");

    });

</script>


</body>
</html>