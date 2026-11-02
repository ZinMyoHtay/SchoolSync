<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Edit User</title>

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
           EDIT USER CONTENT
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
            color: var(--blue);
            background: var(--blue-light);
            border-color: #c9ddfa;
        }

        /* =========================
           EDIT CARD
        ========================= */

        .edit-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .edit-header {
            padding: 20px 22px;
            border-bottom: 1px solid var(--border);
        }

        .edit-title {
            font-family: "Plus Jakarta Sans";
            font-size: 15px;
            font-weight: 700;
            margin: 0;
        }

        .edit-subtitle {
            color: var(--muted);
            font-size: 11px;
            margin: 5px 0 0;
        }

        .edit-body {
            padding: 25px 22px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: "Plus Jakarta Sans";
            font-size: 13px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 18px;
        }

        .section-heading i {
            color: var(--blue);
            font-size: 16px;
        }

        .section-divider {
            border-top: 1px solid var(--border);
            margin: 30px 0;
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
            padding: 0 13px;
            font-size: 12px;
            color: var(--text);
            outline: none;
        }

        textarea.form-control {
            height: 90px;
            padding-top: 11px;
            resize: vertical;
        }

        .form-control:focus,
        .form-select:focus {
            background: white;
            border-color: #a9c7f5;
            box-shadow: none;
        }

        .form-control:disabled,
        .form-select:disabled {
            background: #f1f3f7;
            color: #738096;
            cursor: not-allowed;
        }

        .form-help {
            font-size: 10px;
            color: var(--muted);
            margin-top: 5px;
        }

        .readonly-value {
            height: 42px;
            display: flex;
            align-items: center;
            padding: 0 13px;
            border: 1px solid var(--border);
            background: #f1f3f7;
            border-radius: 9px;
            color: var(--muted);
            font-size: 12px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .role-admin {
            background: #eef5ff;
            color: #1769e0;
        }

        .role-staff {
            background: #eafaf3;
            color: #18a66b;
        }

        .role-teacher {
            background: #fff0f0;
            color: #e55353;
        }

        .role-student {
            background: #edf8ff;
            color: #1688b8;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            font-weight: 600;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            background: var(--green);
            border-radius: 50%;
        }

        .error-box {
            background: #fff1f1;
            border: 1px solid #f3c8c8;
            border-radius: 10px;
            padding: 14px 16px;
            color: var(--red);
            font-size: 12px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin: 6px 0 0;
            padding-left: 18px;
        }

        /* =========================
           FORM FOOTER
        ========================= */

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            padding: 18px 22px;
            border-top: 1px solid var(--border);
            background: #fafbfc;
        }

        .cancel-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            height: 40px;
            padding: 0 17px;
            border: 1px solid var(--border);
            background: white;
            color: var(--text);
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .cancel-btn:hover {
            color: var(--blue);
            background: var(--blue-light);
            border-color: #c9ddfa;
        }

        .update-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            height: 40px;
            padding: 0 18px;
            border: none;
            background: var(--blue);
            color: white;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .update-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
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

            .form-footer {
                align-items: stretch;
                flex-direction: column-reverse;
            }

            .cancel-btn,
            .update-btn {
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

            .edit-body {
                padding: 20px 16px;
            }

            .edit-header {
                padding: 18px 16px;
            }

            .form-footer {
                padding: 16px;
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
                    Edit User
                </h1>

                <p class="page-subtitle">
                    Update SchoolSync user account information.
                </p>

            </div>


            <a
                href="{{ route('admin.users.index') }}"
                class="back-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Back to Users
            </a>

        </div>


        <!-- VALIDATION ERRORS -->

        @if ($errors->any())

            <div class="error-box">

                <strong>
                    Please fix the following errors:
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- EDIT CARD -->

        <div class="edit-card">


            <!-- CARD HEADER -->

            <div class="edit-header">

                <h3 class="edit-title">
                    Edit User Information
                </h3>

                <p class="edit-subtitle">
                    Update the user's account and profile information.
                </p>

            </div>


            <!-- FORM -->

            <form
                action="{{ route('admin.users.update', $user->user_id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <div class="edit-body">


                    <!-- =================================================
                         ACCOUNT INFORMATION
                    ================================================== -->

                    <div class="form-section">

                        <div class="section-heading">

                            <i class="bi bi-person-vcard"></i>

                            Account Information

                        </div>


                        <div class="row g-4">


                            <!-- USER ID -->

                            <div class="col-lg-4 col-md-6">

                                <label class="form-label">
                                    User ID
                                </label>

                                <div class="readonly-value">
                                    USR-{{ str_pad($user->user_id, 3, '0', STR_PAD_LEFT) }}
                                </div>

                                <div class="form-help">
                                    Generated automatically and cannot be changed.
                                </div>

                            </div>


                            <!-- ROLE -->

                            <div class="col-lg-4 col-md-6">

                                <label class="form-label">
                                    Role
                                </label>

                                <select
                                    class="form-select"
                                    disabled
                                >

                                    <option
                                        value="admin"
                                        {{ $user->role === 'admin' ? 'selected' : '' }}
                                    >
                                        Admin
                                    </option>

                                    <option
                                        value="staff"
                                        {{ $user->role === 'staff' ? 'selected' : '' }}
                                    >
                                        Staff
                                    </option>

                                    <option
                                        value="teacher"
                                        {{ $user->role === 'teacher' ? 'selected' : '' }}
                                    >
                                        Teacher
                                    </option>

                                    <option
                                        value="student"
                                        {{ $user->role === 'student' ? 'selected' : '' }}
                                    >
                                        Student
                                    </option>

                                </select>

                                <div class="form-help">
                                    Account role cannot be changed here.
                                </div>

                            </div>


                            <!-- STATUS -->

                            <div class="col-lg-4 col-md-6">

                                <label class="form-label">
                                    Account Status
                                </label>

                                @if ($user->status === 'active')

                                    <span
                                        class="status-badge"
                                        style="color: var(--green);"
                                    >

                                        <span
                                            class="status-dot"
                                        ></span>

                                        Active

                                    </span>

                                @else

                                    <span
                                        class="status-badge"
                                        style="color: var(--red);"
                                    >

                                        <span
                                            class="status-dot"
                                            style="background: var(--red);"
                                        ></span>

                                        Inactive

                                    </span>

                                @endif



                            </div>


                            <!-- NAME -->

                            <div class="col-lg-6">

                                <label
                                    for="name"
                                    class="form-label"
                                >
                                    Full Name
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="Enter full name"
                                    required
                                >

                            </div>


                            <!-- EMAIL -->

                            <div class="col-lg-6">

                                <label
                                    for="email"
                                    class="form-label"
                                >
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="Enter email address"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         STAFF INFORMATION
                    ================================================== -->

                    @if (in_array($user->role, ['staff', 'teacher']))

                        <div class="section-divider"></div>


                        <div class="form-section">

                            <div class="section-heading">

                                <i class="bi bi-briefcase"></i>

                                Staff Information

                            </div>


                            <div class="row g-4">


                                <!-- STAFF ID -->

                                <div class="col-lg-4 col-md-6">

                                    <label class="form-label">
                                        Staff ID
                                    </label>

                                    <div class="readonly-value">
                                        {{ $staff?->staff_id ?? 'Not available' }}
                                    </div>

                                    <div class="form-help">
                                        Generated automatically and cannot be changed.
                                    </div>

                                </div>


                                <!-- STAFF CODE -->

                                <div class="col-lg-4 col-md-6">

                                    <label class="form-label">
                                        Staff Code
                                    </label>

                                    <div class="readonly-value">
                                        {{ $staff?->staff_code ?? 'Not available' }}
                                    </div>

                                    <div class="form-help">
                                        Generated automatically and cannot be changed.
                                    </div>

                                </div>


                                <!-- DEPARTMENT -->

                                <div class="col-lg-4 col-md-6">

                                    <label
                                        for="dept_id"
                                        class="form-label"
                                    >
                                        Department
                                    </label>

                                    <select
                                        id="dept_id"
                                        name="dept_id"
                                        class="form-select"
                                    >

                                        <option value="">
                                            Select Department
                                        </option>

                                        @foreach ($departments as $department)

                                            <option
                                                value="{{ $department->department_id }}"
                                                {{ old('dept_id', $staff?->dept_id) == $department->department_id ? 'selected' : '' }}
                                            >
                                                {{ $department->department_name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                <!-- PHONE -->

                                <div class="col-lg-6">

                                    <label
                                        for="phone"
                                        class="form-label"
                                    >
                                        Phone Number
                                    </label>

                                    <input
                                        type="text"
                                        id="phone"
                                        name="phone"
                                        class="form-control"
                                        value="{{ old('phone', $staff?->phone) }}"
                                        placeholder="Enter phone number"
                                    >

                                </div>


                                <!-- POSITION -->

                                <div class="col-lg-6">

                                    <label
                                        for="position"
                                        class="form-label"
                                    >
                                        Position
                                    </label>

                                    <input
                                        type="text"
                                        id="position"
                                        name="position"
                                        class="form-control"
                                        value="{{ old('position', $staff?->position) }}"
                                        placeholder="Enter position"
                                    >

                                </div>


                                <!-- HIRE DATE -->

                                <div class="col-lg-6">

                                    <label
                                        for="hire_date"
                                        class="form-label"
                                    >
                                        Hire Date
                                    </label>

                                    <input
                                        type="date"
                                        id="hire_date"
                                        name="hire_date"
                                        class="form-control"
                                        value="{{ old('hire_date', $staff?->hire_date) }}"
                                    >

                                </div>


                                <!-- ADDRESS -->

                                <div class="col-lg-6">

                                    <label
                                        for="address"
                                        class="form-label"
                                    >
                                        Address
                                    </label>

                                    <textarea
                                        id="address"
                                        name="address"
                                        class="form-control"
                                        placeholder="Enter address"
                                    >{{ old('address', $staff?->address) }}</textarea>

                                </div>

                            </div>

                        </div>


                        <!-- =================================================
                             TEACHER INFORMATION
                        ================================================== -->

                        @if ($user->role === 'teacher')

                            <div class="section-divider"></div>


                            <div class="form-section">

                                <div class="section-heading">

                                    <i class="bi bi-mortarboard"></i>

                                    Teacher Information

                                </div>


                                <div class="row g-4">


                                    <!-- TEACHER ID -->

                                    <div class="col-lg-4 col-md-6">

                                        <label class="form-label">
                                            Teacher ID
                                        </label>

                                        <div class="readonly-value">
                                            {{ $teacher?->teacher_id ?? 'Not available' }}
                                        </div>

                                        <div class="form-help">
                                            Generated automatically and cannot be changed.
                                        </div>

                                    </div>


                                    <!-- TEACHER CODE -->

                                    <div class="col-lg-4 col-md-6">

                                        <label class="form-label">
                                            Teacher Code
                                        </label>

                                        <div class="readonly-value">
                                            {{ $teacher?->teacher_code ?? 'Not available' }}
                                        </div>

                                        <div class="form-help">
                                            Generated automatically and cannot be changed.
                                        </div>

                                    </div>


                                    <!-- SPECIALIZATION -->

                                    <div class="col-lg-4 col-md-6">

                                        <label
                                            for="specialization"
                                            class="form-label"
                                        >
                                            Specialization
                                        </label>

                                        <input
                                            type="text"
                                            id="specialization"
                                            name="specialization"
                                            class="form-control"
                                            value="{{ old('specialization', $teacher?->specialization) }}"
                                            placeholder="Enter specialization"
                                        >

                                    </div>

                                </div>

                            </div>

                        @endif

                    @endif


                    <!-- =================================================
                         STUDENT INFORMATION
                    ================================================== -->

                    @if ($user->role === 'student')

                        <div class="section-divider"></div>


                        <div class="form-section">

                            <div class="section-heading">

                                <i class="bi bi-mortarboard"></i>

                                Student Information

                            </div>


                            <div class="row g-4">


                                <!-- STUDENT ID -->

                                <div class="col-lg-4 col-md-6">

                                    <label class="form-label">
                                        Student ID
                                    </label>

                                    <div class="readonly-value">
                                        {{ $student?->student_id ?? 'Not available' }}
                                    </div>

                                    <div class="form-help">
                                        Generated automatically and cannot be changed.
                                    </div>

                                </div>


                                <!-- STUDENT CODE -->

                                <div class="col-lg-4 col-md-6">

                                    <label class="form-label">
                                        Student Code
                                    </label>

                                    <div class="readonly-value">
                                        {{ $student?->student_code ?? 'Not available' }}
                                    </div>

                                    <div class="form-help">
                                        Generated automatically and cannot be changed.
                                    </div>

                                </div>


                                <!-- DATE OF BIRTH -->

                                <div class="col-lg-4 col-md-6">

                                    <label
                                        for="date_of_birth"
                                        class="form-label"
                                    >
                                        Date of Birth
                                    </label>

                                    <input
                                        type="date"
                                        id="date_of_birth"
                                        name="date_of_birth"
                                        class="form-control"
                                        value="{{ old('date_of_birth', $student?->date_of_birth) }}"
                                    >

                                </div>


                                <!-- PHONE -->

                                <div class="col-lg-6">

                                    <label
                                        for="student_phone"
                                        class="form-label"
                                    >
                                        Phone Number
                                    </label>

                                    <input
                                        type="text"
                                        id="student_phone"
                                        name="student_phone"
                                        class="form-control"
                                        value="{{ old('student_phone', $student?->phone) }}"
                                        placeholder="Enter phone number"
                                    >

                                </div>


                                <!-- ADMISSION DATE -->

                                <div class="col-lg-6">

                                    <label
                                        for="admission_date"
                                        class="form-label"
                                    >
                                        Admission Date
                                    </label>

                                    <input
                                        type="date"
                                        id="admission_date"
                                        name="admission_date"
                                        class="form-control"
                                        value="{{ old('admission_date', $student?->admission_date) }}"
                                    >

                                </div>


                                <!-- ADDRESS -->

                                <div class="col-12">

                                    <label
                                        for="student_address"
                                        class="form-label"
                                    >
                                        Address
                                    </label>

                                    <textarea
                                        id="student_address"
                                        name="student_address"
                                        class="form-control"
                                        placeholder="Enter student address"
                                    >{{ old('student_address', $student?->address) }}</textarea>

                                </div>

                            </div>

                        </div>


                        <!-- =================================================
                             PARENT / GUARDIAN INFORMATION
                        ================================================== -->

                        <div class="section-divider"></div>


                        <div class="form-section">

                            <div class="section-heading">

                                <i class="bi bi-people"></i>

                                Parent / Guardian Information

                            </div>


                            <div class="row g-4">


                                <!-- PARENT NAME -->

                                <div class="col-lg-6">

                                    <label
                                        for="parent_name"
                                        class="form-label"
                                    >
                                        Parent / Guardian Name
                                    </label>

                                    <input
                                        type="text"
                                        id="parent_name"
                                        name="parent_name"
                                        class="form-control"
                                        value="{{ old('parent_name', $student?->parent_name) }}"
                                        placeholder="Enter parent or guardian name"
                                    >

                                </div>


                                <!-- RELATIONSHIP -->

                                <div class="col-lg-6">

                                    <label
                                        for="parent_relationship"
                                        class="form-label"
                                    >
                                        Relationship
                                    </label>

                                    <input
                                        type="text"
                                        id="parent_relationship"
                                        name="parent_relationship"
                                        class="form-control"
                                        value="{{ old('parent_relationship', $student?->parent_relationship) }}"
                                        placeholder="e.g. Father, Mother, Guardian"
                                    >

                                </div>


                                <!-- PARENT PHONE -->

                                <div class="col-lg-6">

                                    <label
                                        for="parent_phone"
                                        class="form-label"
                                    >
                                        Parent Phone
                                    </label>

                                    <input
                                        type="text"
                                        id="parent_phone"
                                        name="parent_phone"
                                        class="form-control"
                                        value="{{ old('parent_phone', $student?->parent_phone) }}"
                                        placeholder="Enter parent phone number"
                                    >

                                </div>


                                <!-- PARENT EMAIL -->

                                <div class="col-lg-6">

                                    <label
                                        for="parent_email"
                                        class="form-label"
                                    >
                                        Parent Email
                                    </label>

                                    <input
                                        type="email"
                                        id="parent_email"
                                        name="parent_email"
                                        class="form-control"
                                        value="{{ old('parent_email', $student?->parent_email) }}"
                                        placeholder="Enter parent email"
                                    >

                                </div>


                                <!-- PARENT ADDRESS -->

                                <div class="col-12">

                                    <label
                                        for="parent_address"
                                        class="form-label"
                                    >
                                        Parent / Guardian Address
                                    </label>

                                    <textarea
                                        id="parent_address"
                                        name="parent_address"
                                        class="form-control"
                                        placeholder="Enter parent or guardian address"
                                    >{{ old('parent_address', $student?->parent_address) }}</textarea>

                                </div>

                            </div>

                        </div>

                    @endif

                </div>


                <!-- =================================================
                     FORM FOOTER
                ================================================== -->

                <div class="form-footer">

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="cancel-btn"
                    >
                        <i class="bi bi-x-lg"></i>
                        Cancel
                    </a>


                    <button
                        type="submit"
                        class="update-btn"
                    >
                        <i class="bi bi-check-lg"></i>
                        Update User
                    </button>

                </div>

            </form>

        </div>

    </section>

</main>


<!-- =========================================================
     MOBILE SIDEBAR JAVASCRIPT
========================================================= -->

<script>

    const mobileMenu = document.getElementById("mobileMenu");

    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {

        sidebar.classList.toggle("show");

    });

</script>


</body>
</html>