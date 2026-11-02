<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | User Management</title>

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
           USER MANAGEMENT CONTENT
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

        .create-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--blue);
            color: white;
            padding: 11px 17px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            transition: 0.2s ease;
        }

        .create-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
        }

        /* FILTER */

        .filter-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #9aa5b5;
        }

        .search-box input {
            width: 100%;
            height: 42px;
            border: 1px solid var(--border);
            background: #f8f9fc;
            border-radius: 9px;
            padding: 0 15px 0 40px;
            font-size: 12px;
            outline: none;
        }

        .search-box input:focus {
            background: white;
            border-color: #a9c7f5;
        }

        .filter-select {
            width: 100%;
            height: 42px;
            border: 1px solid var(--border);
            background: #f8f9fc;
            border-radius: 9px;
            padding: 0 12px;
            font-size: 12px;
            color: var(--text);
            outline: none;
        }

        .filter-select:focus {
            background: white;
            border-color: #a9c7f5;
        }

        /* USER CARD */

        .user-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 22px;
            border-bottom: 1px solid var(--border);
        }

        .table-title {
            font-family: "Plus Jakarta Sans";
            font-size: 15px;
            font-weight: 700;
            margin: 0;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        .user-table thead th {
            background: #f8f9fc;
            color: #738096;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            font-weight: 700;
            padding: 13px 18px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .user-table tbody td {
            padding: 15px 18px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
            font-size: 12px;
        }

        .user-table tbody tr:last-child td {
            border-bottom: none;
        }

        .user-table tbody tr:hover {
            background: #fbfcfe;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--blue-light);
            color: var(--blue);
            font-size: 11px;
            font-weight: 800;
            flex-shrink: 0;
        }

        .user-name {
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
        }

        .user-id {
            font-size: 10px;
            color: var(--muted);
            margin-top: 3px;
        }

        .email-text {
            color: #5e6a7d;
            font-size: 11px;
        }

        /* ROLE BADGES */

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

        .role-hr {
            background: #fff4e5;
            color: #ed9b2d;
        }

        .role-manager {
            background: #f2edff;
            color: #7655d6;
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

        /* STATUS */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            font-weight: 600;
            color: var(--green);
        }

        .status-dot {
            width: 7px;
            height: 7px;
            background: var(--green);
            border-radius: 50%;
        }

        /* ACTIONS */

        .action-group {
            display: flex;
            gap: 6px;
        }

        .action-btn {
            width: 31px;
            height: 31px;
            border: 1px solid var(--border);
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            background: white;
            transition: 0.2s ease;
        }

        .action-btn:hover {
            color: var(--blue);
            background: var(--blue-light);
            border-color: #c9ddfa;
        }

        .action-btn.delete:hover {
            color: var(--red);
            background: #fff1f1;
            border-color: #f3c8c8;
        }

        /* TABLE FOOTER */

        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-top: 1px solid var(--border);
        }

        .table-footer-text {
            font-size: 11px;
            color: var(--muted);
        }

        .pagination-custom {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .page-btn {
            width: 30px;
            height: 30px;
            border: 1px solid var(--border);
            border-radius: 7px;
            background: white;
            color: var(--muted);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            transition: 0.2s ease;
        }

        .page-btn:hover {
            color: var(--blue);
            background: var(--blue-light);
        }

        .page-btn.active {
            background: var(--blue);
            color: white;
            border-color: var(--blue);
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

            .create-btn {
                width: 100%;
                justify-content: center;
            }

            .table-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 5px;
            }

            .table-footer {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
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
                    User Management
                </h1>

                <p class="page-subtitle">
                    Manage SchoolSync user accounts and their assigned roles.
                </p>

            </div>


            <a href="{{ route('admin.users.create') }}" class="create-btn">

                <i class="bi bi-plus-lg"></i>

                Create User

            </a>

        </div>

        

<!-- =================================================
     FILTER
================================================== -->

<div class="filter-card">

    <form
        action="{{ route('admin.users.index') }}"
        method="GET"
    >

        <div class="row g-3">

            <!-- SEARCH -->
            <div class="col-lg-6">

                <div class="search-box">

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search users..."
                    >

                </div>

            </div>


            <!-- ROLE FILTER -->
            <div class="col-lg-3">

                <select
                    name="role"
                    class="filter-select"
                    onchange="this.form.submit()"
                >

                    <option value="">
                        All Roles
                    </option>

                    <option
                        value="admin"
                        {{ request('role') === 'admin' ? 'selected' : '' }}
                    >
                        Admin
                    </option>

                    <option
                        value="staff"
                        {{ request('role') === 'staff' ? 'selected' : '' }}
                    >
                        Staff
                    </option>

                    <option
                        value="teacher"
                        {{ request('role') === 'teacher' ? 'selected' : '' }}
                    >
                        Teacher
                    </option>

                    <option
                        value="student"
                        {{ request('role') === 'student' ? 'selected' : '' }}
                    >
                        Student
                    </option>

                </select>

            </div>


            <!-- STATUS FILTER -->
            <div class="col-lg-3">

                <select
                    name="status"
                    class="filter-select"
                    onchange="this.form.submit()"
                >

                    <option value="">
                        All Users
                    </option>

                    <option
                        value="active"
                        {{ request('status') === 'active' ? 'selected' : '' }}
                    >
                        Active Users
                    </option>

                    <option
                        value="inactive"
                        {{ request('status') === 'inactive' ? 'selected' : '' }}
                    >
                        Inactive Users
                    </option>

                </select>

            </div>

        </div>

    </form>

</div>


        <!-- =================================================
             USER TABLE
        ================================================== -->

        <div class="user-card">


            <div class="table-header">

                <h3 class="table-title">
                    All Users
                </h3>

                <span class="table-footer-text">
                    {{ $users->count() }} users
                </span>

            </div>


            <div class="table-wrapper">

                <table class="user-table">

                    <thead>

                        <tr>

                            <th>
                                User
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Role
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($users as $user)

                            <tr>

                                <!-- USER -->

                                <td>

                                    <div class="user-info">

                                        <div class="user-avatar">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>

                                        <div>

                                            <div class="user-name">
                                                {{ $user->name }}
                                            </div>

                                            <div class="user-id">
                                                USR-{{ str_pad($user->user_id, 3, '0', STR_PAD_LEFT) }}
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <!-- EMAIL -->

                                <td>

                                    <span class="email-text">
                                        {{ $user->email }}
                                    </span>

                                </td>


                                <!-- ROLE -->

                                <td>

                                    <span class="role-badge role-{{ $user->role }}">
                                        {{ ucfirst($user->role) }}
                                    </span>

                                </td>


                                <!-- STATUS -->

<td>
    @if($user->status === 'active')
        <span class="status-badge">
            <span class="status-dot"></span>
            Active
        </span>
    @else
        <span class="status-badge" style="color: var(--red);">
            <span class="status-dot" style="background: var(--red);"></span>
            Inactive
        </span>
    @endif
</td>


                             <!-- ACTIONS -->
<td>
    <div class="action-group">

        <!-- VIEW -->
        <a
            href="{{ route('admin.users.show', $user->user_id) }}"
            class="action-btn"
            title="View"
        >
            <i class="bi bi-eye"></i>
        </a>

        <!-- EDIT -->
        <a
            href="{{ route('admin.users.edit', $user->user_id) }}"
            class="action-btn"
            title="Edit"
        >
            <i class="bi bi-pencil"></i>
        </a>

        <!-- ACTIVATE / DEACTIVATE -->
        @if($user->status === 'active')

            <form
                action="{{ route('admin.users.toggle-status', $user->user_id) }}"
                method="POST"
                style="display:inline;"
                onsubmit="return confirm('Are you sure you want to deactivate this user?');"
            >
                @csrf
                @method('PATCH')

                <button
                    type="submit"
                    class="action-btn delete"
                    title="Deactivate"
                >
                    <i class="bi bi-person-x"></i>
                </button>
            </form>

        @else

            <form
                action="{{ route('admin.users.toggle-status', $user->user_id) }}"
                method="POST"
                style="display:inline;"
                onsubmit="return confirm('Are you sure you want to activate this user?');"
            >
                @csrf
                @method('PATCH')

                <button
                    type="submit"
                    class="action-btn"
                    title="Activate"
                >
                    <i class="bi bi-person-check"></i>
                </button>
            </form>

        @endif

    </div>
</td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center py-5">

                                    <div style="color:#738096;">

                                        <i
                                            class="bi bi-people"
                                            style="font-size:32px;"
                                        ></i>

                                        <div class="mt-2">
                                            No users found.
                                        </div>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- TABLE FOOTER -->

            <div class="table-footer">

                <div class="table-footer-text">

                    @if($users->count() > 0)

                        Showing 1–{{ $users->count() }} of {{ $users->count() }} users

                    @else

                        Showing 0 users

                    @endif

                </div>


                <div class="pagination-custom">

                    <button class="page-btn">

                        <i class="bi bi-chevron-left"></i>

                    </button>

                    <button class="page-btn active">
                        1
                    </button>

                    <button class="page-btn">

                        <i class="bi bi-chevron-right"></i>

                    </button>

                </div>

            </div>

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