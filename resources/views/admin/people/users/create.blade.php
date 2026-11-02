<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Create User</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

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

        /* =========================
           SIDEBAR FOOTER
        ========================= */

        .sidebar-footer {
            padding: 14px;
            border-top: 1px solid rgba(255,255,255,0.08);
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

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            color: var(--text);
            padding: 11px 17px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid var(--border);
            transition: 0.2s ease;
        }

        .back-btn:hover {
            background: var(--blue-light);
            color: var(--blue);
            border-color: #c9ddfa;
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
            max-width: 1000px;
        }

        .form-section {
            padding: 24px 26px;
            border-bottom: 1px solid var(--border);
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .section-description {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            height: 42px;
            border: 1px solid var(--border);
            background: #f8f9fc;
            border-radius: 9px;
            padding: 0 12px;
            font-size: 12px;
            color: var(--text);
            box-shadow: none;
        }

        .form-control:focus,
        .form-select:focus {
            background: white;
            border-color: #a9c7f5;
            box-shadow: 0 0 0 3px rgba(23,105,224,0.08);
        }

        textarea.form-control {
            height: auto;
            min-height: 90px;
            padding: 11px 12px;
            resize: vertical;
        }

        .form-text {
            color: var(--muted);
            font-size: 10px;
            margin-top: 5px;
        }

        /* =========================
           ROLE CARDS
        ========================= */

        .role-option {
            position: relative;
        }

        .role-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .role-card {
            display: block;
            cursor: pointer;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 17px;
            background: #fff;
            transition: 0.2s ease;
            height: 100%;
        }

        .role-card:hover {
            border-color: #b8d0f5;
            transform: translateY(-1px);
            box-shadow: 0 5px 18px rgba(16,35,60,0.05);
        }

        .role-option input:checked + .role-card {
            border-color: var(--blue);
            background: var(--blue-light);
            box-shadow: 0 5px 18px rgba(23,105,224,0.10);
        }

        .role-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            margin-bottom: 11px;
        }

        .role-admin-icon {
            background: #eef5ff;
            color: #1769e0;
        }

        .role-staff-icon {
            background: #eafaf3;
            color: #18a66b;
        }

        .role-teacher-icon {
            background: #fff0f0;
            color: #e55353;
        }

        .role-student-icon {
            background: #edf8ff;
            color: #1688b8;
        }

        .role-name {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .role-description {
            font-size: 10px;
            color: var(--muted);
            line-height: 1.5;
        }

        /* =========================
           PASSWORD
        ========================= */

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-control {
            padding-right: 42px;
        }

        .password-toggle {
            position: absolute;
            right: 11px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: var(--muted);
            font-size: 15px;
            cursor: pointer;
        }

        .password-toggle:hover {
            color: var(--blue);
        }

        /* =========================
           ACTIONS
        ========================= */

        .form-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            padding: 20px 26px;
            background: #fbfcfe;
        }

        .cancel-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            height: 42px;
            padding: 0 18px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: white;
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
        }

        .cancel-btn:hover {
            background: #f8f9fc;
            color: var(--text);
        }

        .submit-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            height: 42px;
            padding: 0 20px;
            border: none;
            border-radius: 9px;
            background: var(--blue);
            color: white;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .submit-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
        }

        /* =========================
           ALERT
        ========================= */

        .alert-custom {
            max-width: 1000px;
            border-radius: 10px;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .required {
            color: var(--red);
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

        @media (max-width: 767px) {

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .back-btn {
                width: 100%;
                justify-content: center;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .cancel-btn,
            .submit-btn {
                width: 100%;
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

            .form-section {
                padding: 20px 18px;
            }

            .form-actions {
                padding: 18px;
            }
        }

    </style>
</head>

<body>

<!-- =========================================================
     SIDEBAR
========================================================= -->

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

        <div class="sidebar-section">
            Overview
        </div>

        <a href="{{ url('/admin/dashboard') }}" class="menu-link">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>


        <div class="sidebar-section">
            People
        </div>

        <a href="{{ route('admin.users.index') }}" class="menu-link active">
            <i class="bi bi-person-gear"></i>
            User Management
        </a>

        <a href="{{ route('admin.departments.index') }}" class="menu-link">
            <i class="bi bi-building"></i>
            Departments
        </a>


        <div class="sidebar-section">
            Academic
        </div>

                <a href="{{ route('admin.academic-years.index') }}" class="menu-link">
        <i class="bi bi-calendar3"></i>
        Academic Years
        </a>

        <a href="{{ route('admin.classes.index') }}" class="menu-link">
            <i class="bi bi-diagram-3"></i>
            Classes
        </a>

        <a href="{{ route('admin.subjects.index') }}" class="menu-link">
            <i class="bi bi-book"></i>
            Subjects
        </a>

        <a href="{{ route('admin.enrollments.index') }}" class="menu-link">
            <i class="bi bi-card-checklist"></i>
            Enrollments
        </a>

        <a href="{{ route('admin.attendance.index') }}" class="menu-link">
            <i class="bi bi-calendar-check"></i>
            Attendance
        </a>


        <div class="sidebar-section">
            Finance
        </div>

        <a href="{{ route('admin.finance.index') }}" class="menu-link">
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

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="logout">

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

            <button class="mobile-btn" id="mobileMenu">

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

                <i class="bi bi-chevron-down text-muted small"></i>

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
                    Create User
                </h1>

                <p class="page-subtitle">
                    Create a new SchoolSync account and assign the appropriate role.
                </p>

            </div>


            <a href="{{ route('admin.users.index') }}" class="back-btn">

                <i class="bi bi-arrow-left"></i>

                Back to Users

            </a>

        </div>


        <!-- VALIDATION ERRORS -->

        @if ($errors->any())

            <div class="alert alert-danger alert-custom">

                <div class="fw-bold mb-1">
                    Please fix the following errors:
                </div>

                <ul class="mb-0 ps-3">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- FORM -->

        <form
            action="{{ route('admin.users.store') }}"
            method="POST"
        >

            @csrf


            <div class="form-card">

                <!-- =================================================
                     ACCOUNT INFORMATION
                ================================================== -->

                <div class="form-section">

                    <h3 class="section-title">
                        Account Information
                    </h3>

                    <p class="section-description">
                        Enter the basic login information for this account.
                    </p>


                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="form-label">
                                Full Name <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="Enter full name"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Email Address <span class="required">*</span>
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="example@schoolsync.com"
                                required
                            >

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     ROLE
                ================================================== -->

                <div class="form-section">

                    <h3 class="section-title">
                        Account Role
                    </h3>

                    <p class="section-description">
                        Select the role and permissions for this account.
                    </p>


                    <div class="row g-3">

                        @if(Auth::user()->role === 'admin')

                            <!-- ADMIN -->

                            <div class="col-md-3">

                                <div class="role-option">

                                    <input
                                        type="radio"
                                        name="role"
                                        id="roleAdmin"
                                        value="admin"
                                        {{ old('role') === 'admin' ? 'checked' : '' }}
                                    >

                                    <label for="roleAdmin" class="role-card">

                                        <div class="role-icon role-admin-icon">
                                            <i class="bi bi-shield-lock"></i>
                                        </div>

                                        <div class="role-name">
                                            Administrator
                                        </div>

                                        <div class="role-description">
                                            Full system access and management permissions.
                                        </div>

                                    </label>

                                </div>

                            </div>


                            <!-- STAFF -->

                            <div class="col-md-3">

                                <div class="role-option">

                                    <input
                                        type="radio"
                                        name="role"
                                        id="roleStaff"
                                        value="staff"
                                        {{ old('role') === 'staff' ? 'checked' : '' }}
                                    >

                                    <label for="roleStaff" class="role-card">

                                        <div class="role-icon role-staff-icon">
                                            <i class="bi bi-person-badge"></i>
                                        </div>

                                        <div class="role-name">
                                            Staff
                                        </div>

                                        <div class="role-description">
                                            Manage teachers and students and their accounts.
                                        </div>

                                    </label>

                                </div>

                            </div>

                        @endif


                        <!-- TEACHER -->

                        <div class="{{ Auth::user()->role === 'admin' ? 'col-md-3' : 'col-md-6' }}">

                            <div class="role-option">

                                <input
                                    type="radio"
                                    name="role"
                                    id="roleTeacher"
                                    value="teacher"
                                    {{ old('role') === 'teacher' ? 'checked' : '' }}
                                >

                                <label for="roleTeacher" class="role-card">

                                    <div class="role-icon role-teacher-icon">
                                        <i class="bi bi-person-video3"></i>
                                    </div>

                                    <div class="role-name">
                                        Teacher
                                    </div>

                                    <div class="role-description">
                                        Access classes, subjects, attendance and student information.
                                    </div>

                                </label>

                            </div>

                        </div>


                        <!-- STUDENT -->

                        <div class="{{ Auth::user()->role === 'admin' ? 'col-md-3' : 'col-md-6' }}">

                            <div class="role-option">

                                <input
                                    type="radio"
                                    name="role"
                                    id="roleStudent"
                                    value="student"
                                    {{ old('role') === 'student' ? 'checked' : '' }}
                                >

                                <label for="roleStudent" class="role-card">

                                    <div class="role-icon role-student-icon">
                                        <i class="bi bi-mortarboard"></i>
                                    </div>

                                    <div class="role-name">
                                        Student
                                    </div>

                                    <div class="role-description">
                                        Access classes, subjects, attendance, results and fees.
                                    </div>

                                </label>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     STAFF / TEACHER INFORMATION
                ================================================== -->

                <div
                    class="form-section"
                    id="staffTeacherFields"
                    style="display:none;"
                >

                    <h3 class="section-title">
                        Staff / Teacher Information
                    </h3>

                    <p class="section-description">
                        Enter additional information for staff and teacher accounts.
                    </p>


                    <div class="row g-3">

                        <!-- DEPARTMENT -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Department
                            </label>

                            <select name="dept_id" class="form-select">

                                <option value="">
                                    Select Department
                                </option>

                                @foreach($departments as $department)

                                    <option
                                        value="{{ $department->department_id }}"
                                        {{ old('dept_id') == $department->department_id ? 'selected' : '' }}
                                    >
                                        {{ $department->department_name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <!-- PHONE -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="{{ old('phone') }}"
                                placeholder="Enter phone number"
                            >

                        </div>


                        <!-- ADDRESS -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea
                                name="address"
                                class="form-control"
                                placeholder="Enter address"
                            >{{ old('address') }}</textarea>

                        </div>


                        <!-- HIRE DATE -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Hire Date
                            </label>

                            <input
                                type="date"
                                name="hire_date"
                                class="form-control"
                                value="{{ old('hire_date') }}"
                            >

                        </div>


                        <!-- POSITION -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Position
                            </label>

                            <input
                                type="text"
                                name="position"
                                class="form-control"
                                value="{{ old('position') }}"
                                placeholder="e.g. Teacher, Office Staff"
                            >

                        </div>


                        <!-- SPECIALIZATION -->

                        <div class="col-md-6" id="specializationField">

                            <label class="form-label">
                                Specialization
                            </label>

                            <input
                                type="text"
                                name="specialization"
                                class="form-control"
                                value="{{ old('specialization') }}"
                                placeholder="e.g. Mathematics, English"
                            >

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     STUDENT INFORMATION
                ================================================== -->

                <div
                    class="form-section"
                    id="studentFields"
                    style="display:none;"
                >

                    <h3 class="section-title">
                        Student Information
                    </h3>

                    <p class="section-description">
                        Enter the student's personal and parent/guardian information.
                    </p>


                    <div class="row g-3">

                        <!-- DATE OF BIRTH -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Date of Birth
                            </label>

                            <input
                                type="date"
                                name="date_of_birth"
                                class="form-control"
                                value="{{ old('date_of_birth') }}"
                            >

                        </div>


                        <!-- PHONE -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="student_phone"
                                class="form-control"
                                value="{{ old('student_phone') }}"
                                placeholder="Enter phone number"
                            >

                        </div>


                        <!-- ADDRESS -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea
                                name="student_address"
                                class="form-control"
                                placeholder="Enter student's address"
                            >{{ old('student_address') }}</textarea>

                        </div>


                        <!-- ADMISSION DATE -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Admission Date
                            </label>

                            <input
                                type="date"
                                name="admission_date"
                                class="form-control"
                                value="{{ old('admission_date') }}"
                            >

                        </div>


                        <!-- PARENT NAME -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Parent / Guardian Name
                            </label>

                            <input
                                type="text"
                                name="parent_name"
                                class="form-control"
                                value="{{ old('parent_name') }}"
                                placeholder="Enter parent or guardian name"
                            >

                        </div>


                        <!-- PARENT PHONE -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Parent / Guardian Phone
                            </label>

                            <input
                                type="text"
                                name="parent_phone"
                                class="form-control"
                                value="{{ old('parent_phone') }}"
                                placeholder="Enter parent phone number"
                            >

                        </div>


                        <!-- PARENT EMAIL -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Parent / Guardian Email
                            </label>

                            <input
                                type="email"
                                name="parent_email"
                                class="form-control"
                                value="{{ old('parent_email') }}"
                                placeholder="Enter parent email"
                            >

                        </div>


                        <!-- RELATIONSHIP -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Relationship
                            </label>

                            <select name="parent_relationship" class="form-select">

                                <option value="">
                                    Select Relationship
                                </option>

                                <option
                                    value="Father"
                                    {{ old('parent_relationship') === 'Father' ? 'selected' : '' }}
                                >
                                    Father
                                </option>

                                <option
                                    value="Mother"
                                    {{ old('parent_relationship') === 'Mother' ? 'selected' : '' }}
                                >
                                    Mother
                                </option>

                                <option
                                    value="Guardian"
                                    {{ old('parent_relationship') === 'Guardian' ? 'selected' : '' }}
                                >
                                    Guardian
                                </option>

                                <option
                                    value="Other"
                                    {{ old('parent_relationship') === 'Other' ? 'selected' : '' }}
                                >
                                    Other
                                </option>

                            </select>

                        </div>


                        <!-- PARENT ADDRESS -->

                        <div class="col-12">

                            <label class="form-label">
                                Parent / Guardian Address
                            </label>

                            <textarea
                                name="parent_address"
                                class="form-control"
                                placeholder="Enter parent or guardian address"
                            >{{ old('parent_address') }}</textarea>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     PASSWORD
                ================================================== -->

                <div class="form-section">

                    <h3 class="section-title">
                        Account Password
                    </h3>

                    <p class="section-description">
                        Set the initial password for this user account.
                    </p>


                    <div class="row g-3">

                        <!-- PASSWORD -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Password <span class="required">*</span>
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Enter password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword('password', 'passwordIcon')"
                                >

                                    <i
                                        class="bi bi-eye"
                                        id="passwordIcon"
                                    ></i>

                                </button>

                            </div>

                            <div class="form-text">
                                Use at least 8 characters.
                            </div>

                        </div>


                        <!-- CONFIRM PASSWORD -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Confirm Password <span class="required">*</span>
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="form-control"
                                    placeholder="Confirm password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword('password_confirmation', 'confirmPasswordIcon')"
                                >

                                    <i
                                        class="bi bi-eye"
                                        id="confirmPasswordIcon"
                                    ></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     ACTIONS
                ================================================== -->

                <div class="form-actions">

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="cancel-btn"
                    >

                        <i class="bi bi-x-lg"></i>

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="submit-btn"
                    >

                        <i class="bi bi-person-plus"></i>

                        Create User

                    </button>

                </div>

            </div>

        </form>

    </section>

</main>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

    /* =========================
       MOBILE SIDEBAR
    ========================= */

    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {

        sidebar.classList.toggle("show");

    });


    /* =========================
       ROLE FIELDS
    ========================= */

    const roleInputs = document.querySelectorAll('input[name="role"]');

    const staffTeacherFields =
        document.getElementById("staffTeacherFields");

    const studentFields =
        document.getElementById("studentFields");

    const specializationField =
        document.getElementById("specializationField");


    function updateRoleFields() {

        const selectedRole =
            document.querySelector('input[name="role"]:checked');


        if (!selectedRole) {

            staffTeacherFields.style.display = "none";
            studentFields.style.display = "none";

            return;

        }


        const role = selectedRole.value;


        /* STAFF / TEACHER */

        if (role === "staff" || role === "teacher") {

            staffTeacherFields.style.display = "block";

        } else {

            staffTeacherFields.style.display = "none";

        }


        /* SPECIALIZATION */

        if (role === "teacher") {

            specializationField.style.display = "block";

        } else {

            specializationField.style.display = "none";

        }


        /* STUDENT */

        if (role === "student") {

            studentFields.style.display = "block";

        } else {

            studentFields.style.display = "none";

        }

    }


    roleInputs.forEach(function (input) {

        input.addEventListener("change", updateRoleFields);

    });


    /* Restore fields after validation */

    updateRoleFields();


    /* =========================
       PASSWORD TOGGLE
    ========================= */

    function togglePassword(inputId, iconId) {

        const input =
            document.getElementById(inputId);

        const icon =
            document.getElementById(iconId);


        if (input.type === "password") {

            input.type = "text";

            icon.classList.remove("bi-eye");

            icon.classList.add("bi-eye-slash");

        } else {

            input.type = "password";

            icon.classList.remove("bi-eye-slash");

            icon.classList.add("bi-eye");

        }

    }

</script>

</body>
</html>