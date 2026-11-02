<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Department Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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
        ========================== */

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
        ========================== */

        .sidebar-footer {
            margin-top: 25px;
            padding: 18px 14px 14px;
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


        /* =========================
           MAIN
        ========================== */

        .main {
            margin-left: 270px;
            min-height: 100vh;
        }


        /* =========================
           TOPBAR
        ========================== */

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


        /* =========================
           CONTENT
        ========================== */

        .content {
            padding: 30px 32px;
        }


        /* =========================
           PAGE HEADER
        ========================== */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 6px;
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
            padding: 11px 17px;
            border-radius: 10px;
            background: var(--blue);
            color: white;
            border: none;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 7px 18px rgba(23,105,224,0.22);
            transition: 0.2s ease;
        }

        .create-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
        }


        /* =========================
           STAT CARDS
        ========================== */

        .department-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
            box-shadow: var(--shadow);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-icon.blue {
            background: #eef5ff;
            color: var(--blue);
        }

        .stat-icon.green {
            background: #e8f8f1;
            color: var(--green);
        }

        .stat-icon.purple {
            background: #f2efff;
            color: var(--purple);
        }

        .stat-label {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 5px;
        }

        .stat-number {
            font-size: 22px;
            font-weight: 800;
            font-family: "Plus Jakarta Sans";
        }


        /* =========================
           DEPARTMENT CARD
        ========================== */

        .department-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .table-header {
            padding: 20px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
        }

        .table-title {
            font-size: 15px;
            font-weight: 700;
            margin: 0;
        }

        .table-count {
            font-size: 11px;
            color: var(--muted);
        }


.department-filter-form {
    display: flex;
    align-items: center;
    gap: 8px;
}

.department-search {
    position: relative;
    width: 240px;
}

.department-search i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #9aa5b5;
    font-size: 13px;
}

.department-search input {
    width: 100%;
    height: 38px;
    border: 1px solid var(--border);
    background: #f8f9fc;
    border-radius: 9px;
    padding: 9px 12px 9px 35px;
    font-size: 11px;
    outline: none;
    transition: 0.2s ease;
}

.department-search input:focus {
    background: white;
    border-color: #a9c7f5;
    box-shadow: 0 0 0 3px rgba(23,105,224,0.06);
}

.status-filter {
    width: 50%;
    height: 38px;
    border: 1px solid var(--border);
    background: #f8f9fc;
    border-radius: 9px;
    padding: 9px 12px 9px 35px;
    font-size: 11px;
    outline: none;
    transition: 0.2s ease;
}


.status-filter:focus {
    border-color: #a9c7f5;
    box-shadow: 0 0 0 3px rgba(23,105,224,0.06);
}

.filter-btn {
    width: 38px;
    height: 38px;
    border: none;
    border-radius: 9px;
    background: var(--blue);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    transition: 0.2s ease;
}

.filter-btn:hover {
    background: var(--blue-dark);
}

.clear-filter-btn {
    width: 38px;
    height: 38px;
    border: 1px solid var(--border);
    border-radius: 9px;
    background: white;
    color: var(--muted);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    transition: 0.2s ease;
}

.clear-filter-btn:hover {
    color: var(--red);
    background: #fff0f0;
    border-color: #ffd0d0;
}



        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .department-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        .department-table th {
            background: #fafbfc;
            color: #7c8799;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 13px 20px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .department-table td {
            padding: 15px 20px;
            border-bottom: 1px solid #f0f2f6;
            font-size: 12px;
            vertical-align: middle;
            white-space: nowrap;
        }

        .department-table tbody tr {
            transition: 0.2s ease;
        }

        .department-table tbody tr:hover {
            background: #fafcff;
        }

        .department-table tbody tr:last-child td {
            border-bottom: none;
        }


        /* =========================
           DEPARTMENT INFO
        ========================== */

        .department-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .department-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg,#e3efff,#f2f7ff);
            color: var(--blue);
            font-size: 17px;
        }

        .department-name {
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
        }

        .department-id {
            font-size: 10px;
            color: var(--muted);
            margin-top: 3px;
        }


        /* =========================
           STAFF COUNT
        ========================== */

        .count-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
            background: #eef5ff;
            color: var(--blue);
            font-size: 10px;
            font-weight: 600;
        }


        /* =========================
           STATUS
        ========================== */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        .status-active {
            color: #087a4c;
            background: #e8f8f1;
        }

        .status-inactive {
            color: #a85d0a;
            background: #fff3df;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }


        /* =========================
           ACTIONS
        ========================== */

        .action-group {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-group form {
            margin: 0;
            padding: 0;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            transition: 0.2s ease;
            padding: 0;
        }

        .action-btn:hover {
            color: var(--blue);
            background: var(--blue-light);
            border-color: #c9ddfa;
        }

        .action-btn.delete:hover {
            color: var(--red);
            background: #fff0f0;
            border-color: #ffd0d0;
        }

        .action-btn.activate:hover {
            color: var(--green);
            background: #e8f8f1;
            border-color: #bdebd7;
        }


        /* =========================
           TABLE FOOTER
        ========================== */

        .table-footer {
            padding: 15px 20px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-footer-text {
            font-size: 11px;
            color: var(--muted);
        }

        .pagination-custom {
            display: flex;
            gap: 5px;
        }

        .page-btn {
            width: 30px;
            height: 30px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 7px;
            font-size: 11px;
            color: var(--muted);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-btn.active {
            background: var(--blue);
            color: white;
            border-color: var(--blue);
        }

        .page-btn:hover {
            border-color: #b9d2f6;
            color: var(--blue);
        }

        .page-btn.active:hover {
            color: white;
        }


        /* =========================
           RESPONSIVE
        ========================== */

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

            .department-stats {
                grid-template-columns: 1fr 1fr;
            }
        }


        @media (max-width: 767px) {

            .page-header {
                flex-direction: column;
                gap: 18px;
            }

            .create-btn {
                width: 100%;
                justify-content: center;
            }

            .department-stats {
                grid-template-columns: 1fr;
            }

            .table-header {
                padding: 17px;
            }

            .table-footer {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
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

            .page-subtitle {
                font-size: 12px;
            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar" id="sidebar">

    <div class="brand">

        <div class="brand-logo">
            <img src="{{ asset('images/schoolsync-logo.png') }}" alt="SchoolSync">
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

        <a href="{{ url('/admin/dashboard') }}" class="menu-link">

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>


        <!-- PEOPLE -->

        <div class="sidebar-section">
            People
        </div>

        <a href="{{ route('admin.users.index') }}" class="menu-link">

            <i class="bi bi-person-gear"></i>

            User Management

        </a>


        <a href="{{ route('admin.departments.index') }}" class="menu-link active">

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


        <!-- FINANCE -->

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


    <!-- LOGOUT -->

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


    <!-- CONTENT -->

    <section class="content">


        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Department Management
                </h1>

                <p class="page-subtitle">
                    Manage SchoolSync departments and organizational information.
                </p>

            </div>


            <a
                href="{{ route('admin.departments.create') }}"
                class="create-btn"
            >

                <i class="bi bi-plus-lg"></i>

                Add Department

            </a>

        </div>


        <!-- =================================================
             SUCCESS / ERROR MESSAGE
        ================================================== -->

        @if(session('success'))

            <div
                class="alert alert-success alert-dismissible fade show"
                role="alert"
                style="font-size:13px; border-radius:10px;"
            >

                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>

            </div>

        @endif


        @if(session('error'))

            <div
                class="alert alert-danger alert-dismissible fade show"
                role="alert"
                style="font-size:13px; border-radius:10px;"
            >

                <i class="bi bi-exclamation-circle me-2"></i>

                {{ session('error') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>

            </div>

        @endif


        <!-- =================================================
             STATISTICS
        ================================================== -->

        <div class="department-stats">


            <!-- TOTAL -->

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Departments
                        </div>

                        <div class="stat-number">
                            {{ $departments->count() }}
                        </div>

                    </div>

                    <div class="stat-icon blue">

                        <i class="bi bi-building"></i>

                    </div>

                </div>

            </div>


            <!-- ACTIVE -->

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Active Departments
                        </div>

                        <div class="stat-number">
                            {{ $departments->where('status', 'active')->count() }}
                        </div>

                    </div>

                    <div class="stat-icon green">

                        <i class="bi bi-check-circle"></i>

                    </div>

                </div>

            </div>


            <!-- STAFF -->

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Staff & Teachers
                        </div>

                        <div class="stat-number">

                            {{ $departments->sum(function ($department) {
                                return $department->staff->count();
                            }) }}

                        </div>

                    </div>

                    <div class="stat-icon purple">

                        <i class="bi bi-people"></i>

                    </div>

                </div>

            </div>


        </div>


        <!-- =================================================
             DEPARTMENT TABLE
        ================================================== -->

        <div class="department-card">


<div class="table-header">

    <div>

        <h3 class="table-title">
            Departments
        </h3>

        <div class="table-count">
            {{ $departments->count() }}
            {{ $departments->count() == 1 ? 'department' : 'departments' }}
            found
        </div>

    </div>

    <form
        action="{{ route('admin.departments.index') }}"
        method="GET"
        class="department-filter-form"
    >

        <div class="department-search">

            <i class="bi bi-search"></i>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search departments..."
            >

        </div>


        <select
            name="status"
            class="status-filter"
            onchange="this.form.submit()"
        >

            <option value="">
                All Status
            </option>

            <option
                value="active"
                {{ request('status') === 'active' ? 'selected' : '' }}
            >
                Active
            </option>

            <option
                value="inactive"
                {{ request('status') === 'inactive' ? 'selected' : '' }}
            >
                Inactive
            </option>

        </select>


  


    </form>

</div>




            <div class="table-wrapper">

                <table class="department-table">


                    <thead>

                        <tr>

                            <th>
                                Department
                            </th>

                            <th>
                                Description
                            </th>

                            <th>
                                Staff & Teachers
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


                    @forelse($departments as $department)

                        <tr>


                            <!-- DEPARTMENT -->

                            <td>

                                <div class="department-info">

                                    <div class="department-icon">

                                        <i class="bi bi-building"></i>

                                    </div>


                                    <div>

                                        <div class="department-name">

                                            {{ $department->department_name }}

                                        </div>


                                        <div class="department-id">

                                            DEP-{{ str_pad(
                                                $department->department_id,
                                                3,
                                                '0',
                                                STR_PAD_LEFT
                                            ) }}

                                        </div>

                                    </div>

                                </div>

                            </td>


                            <!-- DESCRIPTION -->

                            <td>

                                School department

                            </td>


                            <!-- STAFF COUNT -->

                            <td>

                                <span class="count-badge">

                                    <i class="bi bi-people"></i>

                                    {{ $department->staff->count() }}

                                    {{ $department->staff->count() == 1
                                        ? 'Member'
                                        : 'Members'
                                    }}

                                </span>

                            </td>


                            <!-- STATUS -->

                            <td>

                                @if($department->status === 'active')

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

                            </td>


                            <!-- ACTIONS -->

                            <td>

                                <div class="action-group">


                                    <!-- VIEW -->

                                    <a
                                        href="{{ route(
                                            'admin.departments.show',
                                            $department->department_id
                                        ) }}"
                                        class="action-btn"
                                        title="View"
                                    >

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    <!-- EDIT -->

                                    <a
                                        href="{{ route(
                                            'admin.departments.edit',
                                            $department->department_id
                                        ) }}"
                                        class="action-btn"
                                        title="Edit"
                                    >

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    <!-- ACTIVATE / DEACTIVATE -->

                                    <form
                                        action="{{ route(
                                            'admin.departments.toggle-status',
                                            $department->department_id
                                        ) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        @method('PATCH')


                                        @if($department->status === 'active')

                                            <button
                                                type="submit"
                                                class="action-btn delete"
                                                title="Deactivate"
                                                onclick="return confirm(
                                                    'Are you sure you want to deactivate this department?'
                                                )"
                                            >

                                                <i class="bi bi-building-dash"></i>

                                            </button>

                                        @else

                                            <button
                                                type="submit"
                                                class="action-btn activate"
                                                title="Activate"
                                                onclick="return confirm(
                                                    'Are you sure you want to activate this department?'
                                                )"
                                            >

                                                <i class="bi bi-building-check"></i>

                                            </button>

                                        @endif

                                    </form>


                                </div>

                            </td>


                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="5"
                                style="text-align:center; padding:40px;"
                            >

                                <div style="color:var(--muted);">

                                    <i
                                        class="bi bi-building"
                                        style="font-size:30px; display:block; margin-bottom:10px;"
                                    ></i>

                                    No departments found.

                                </div>

                            </td>

                        </tr>

                    @endforelse


                    </tbody>

                </table>

            </div>


            <!-- =================================================
                 FOOTER
            ================================================== -->

            <div class="table-footer">


                <div class="table-footer-text">

                    @if($departments->count() > 0)

                        Showing 1–{{ $departments->count() }}

                        of {{ $departments->count() }}

                        departments

                    @else

                        Showing 0 departments

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


<!-- =====================================================
     MOBILE MENU
===================================================== -->

<script>

    const mobileMenu = document.getElementById("mobileMenu");

    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {

        sidebar.classList.toggle("show");

    });

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>