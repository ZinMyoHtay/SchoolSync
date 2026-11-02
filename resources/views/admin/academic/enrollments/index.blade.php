<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Enrollments</title>

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
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        /* =====================================================
           ROOT
        ====================================================== */

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


        /* =====================================================
           GLOBAL
        ====================================================== */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: "Inter", sans-serif;
            font-size: 14px;
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

            border-bottom:
                1px solid rgba(255,255,255,0.08);
        }

        .brand-logo {
            width: 42px;
            height: 42px;

            border-radius: 12px;

            background:
              var(--white
                );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;

            margin-right: 12px;

            box-shadow:
                0 7px 20px rgba(23,105,224,0.35);
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

            padding:
                15px 12px 9px;
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

            transform:
                translateX(2px);
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
                0 8px 20px rgba(23,105,224,0.25);
        }

        .sidebar-footer {
            margin-top: 25px;

            padding-top: 18px;

            border-top:
                1px solid rgba(255,255,255,0.08);
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
            background:
                rgba(128, 128, 128, 0.08);

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

            transform:
                translateY(-50%);

            color: #9aa5b5;
        }

        .search input {
            width: 100%;

            border:
                1px solid var(--border);

            background: #f8f9fc;

            padding:
                11px 15px 11px 42px;

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

            border:
                1px solid var(--border);

            border-radius: 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--muted);

            position: relative;
        }

        .top-icon:hover {
            color: var(--blue);

            background:
                var(--blue-light);
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
        ====================================================== */

        .content {
            padding: 32px 34px;
        }


        /* =====================================================
           PAGE HEADER
        ====================================================== */

        .page-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 25px;
        }

        .page-title {
            font-size: 27px;

            font-weight: 800;

            margin: 0 0 7px;

            color: var(--text);
        }

        .page-subtitle {
            margin: 0;

            color: var(--muted);

            font-size: 14px;
        }

        .create-btn {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            background:
                linear-gradient(
                    90deg,
                    #1769e0,
                    #2377ed
                );

            color: white;

            padding: 11px 17px;

            border-radius: 9px;

            font-size: 13px;

            font-weight: 700;

            box-shadow:
                0 7px 18px rgba(23,105,224,0.20);

            transition: 0.2s ease;
        }

        .create-btn:hover {
            color: white;

            transform:
                translateY(-1px);

            box-shadow:
                0 10px 23px rgba(23,105,224,0.28);
        }


        /* =====================================================
           FILTER CARD
        ====================================================== */

        .filter-card {
            background: white;

            border:
                1px solid var(--border);

            border-radius: 14px;

            padding: 22px;

            margin-bottom: 22px;

            box-shadow: var(--shadow);
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;

            left: 15px;

            top: 50%;

            transform:
                translateY(-50%);

            color: #9aa5b5;

            font-size: 16px;
        }

        .search-box input {
            width: 100%;

            height: 46px;

            border:
                1px solid var(--border);

            border-radius: 10px;

            background: #f8f9fc;

            padding:
                0 15px 0 44px;

            font-size: 13px;

            color: var(--text);

            outline: none;

            transition: 0.2s ease;
        }

        .search-box input:focus {
            background: white;

            border-color: #a9c7f5;

            box-shadow:
                0 0 0 3px
                rgba(23,105,224,0.06);
        }

        .filter-select {
            width: 100%;

            height: 46px;

            border:
                1px solid var(--border);

            border-radius: 10px;

            background: #f8f9fc;

            padding:
                0 14px;

            font-size: 13px;

            color: var(--text);

            outline: none;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .filter-select:focus {
            background: white;

            border-color: #a9c7f5;

            box-shadow:
                0 0 0 3px
                rgba(23,105,224,0.06);
        }


        /* =====================================================
           MAIN CARD
        ====================================================== */

        .card-box {
            background: white;

            border:
                1px solid var(--border);

            border-radius: 14px;

            box-shadow: var(--shadow);

            overflow: hidden;
        }

        .card-header-custom {
            padding: 22px 24px;

            border-bottom:
                1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;
        }

        .card-title {
            font-size: 17px;

            font-weight: 800;

            margin: 0 0 5px;

            color: var(--text);
        }

        .card-subtitle {
            margin: 0;

            color: var(--muted);

            font-size: 13px;
        }


        /* =====================================================
           TABLE
        ====================================================== */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        .enrollment-table {
            width: 100%;

            margin: 0;

            border-collapse: separate;

            border-spacing: 0;
        }

        .enrollment-table thead th {
            background: #f8f9fc;

            color: #65738a;

            font-size: 12px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.4px;

            padding: 15px 18px;

            border-bottom:
                1px solid var(--border);

            white-space: nowrap;
        }

        .enrollment-table tbody td {
            padding: 17px 18px;

            border-bottom:
                1px solid var(--border);

            vertical-align: middle;

            font-size: 13px;

            color: var(--text);

            white-space: nowrap;
        }

        .enrollment-table tbody tr:last-child td {
            border-bottom: none;
        }

        .enrollment-table tbody tr:hover {
            background: #fbfcff;
        }


        /* =====================================================
           STUDENT
        ====================================================== */

        .student-info {
            display: flex;

            align-items: center;

            gap: 12px;
        }

        .student-avatar {
            width: 39px;
            height: 39px;

            min-width: 39px;

            border-radius: 10px;

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

            font-size: 14px;

            font-weight: 800;
        }

        .student-name {
            font-size: 14px;

            font-weight: 700;

            color: var(--text);

            margin-bottom: 3px;
        }

        .student-id {
            color: var(--muted);

            font-size: 12px;
        }


        /* =====================================================
           CLASS / ACADEMIC YEAR
        ====================================================== */

        .class-name {
            font-size: 13px;

            font-weight: 700;

            color: var(--text);
        }

        .academic-year {
            font-size: 13px;

            font-weight: 600;

            color: var(--text);
        }

        .date-text {
            font-size: 13px;

            color: #566276;

            font-weight: 500;
        }


        /* =====================================================
           STATUS
        ====================================================== */

        .status-badge {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 6px 11px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;
        }

        .status-badge::before {
            content: "";

            width: 6px;
            height: 6px;

            border-radius: 50%;
        }

        .status-active {
            background: #eaf8f2;

            color: #13885a;
        }

        .status-active::before {
            background: #18a66b;
        }

        .status-inactive {
            background: #fff0f0;

            color: #d64545;
        }

        .status-inactive::before {
            background: #e55353;
        }


        /* =====================================================
           ACTIONS
        ====================================================== */

        .actions {
            display: flex;

            align-items: center;

            gap: 6px;
        }

        .action-btn {
            width: 36px;
            height: 36px;

            border:
                1px solid var(--border);

            background: white;

            border-radius: 9px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            color: var(--muted);

            font-size: 15px;

            transition: 0.2s ease;
        }

        .action-btn:hover {
            color: var(--blue);

            background:
                var(--blue-light);

            border-color:
                #cfe0fb;
        }

        .action-btn.view:hover {
            color: var(--blue);
        }

        .action-btn.edit:hover {
            color: var(--orange);
        }

        .action-btn.activate:hover {
            color: var(--green);

            background: #eaf8f2;

            border-color: #c8eadb;
        }

        .action-btn.deactivate:hover {
            color: var(--red);

            background: #fff0f0;

            border-color: #f1cccc;
        }


        /* =====================================================
           EMPTY STATE
        ====================================================== */

        .empty-state {
            text-align: center;

            padding: 60px 20px;
        }

        .empty-icon {
            width: 64px;
            height: 64px;

            margin: 0 auto 18px;

            border-radius: 16px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: var(--blue-light);

            color: var(--blue);

            font-size: 27px;
        }

        .empty-state h5 {
            font-size: 16px;

            font-weight: 800;

            margin-bottom: 7px;
        }

        .empty-state p {
            margin: 0;

            color: var(--muted);

            font-size: 13px;
        }


        /* =====================================================
           CARD FOOTER
        ====================================================== */

        .card-footer-custom {
            padding: 15px 24px;

            border-top:
                1px solid var(--border);

            color: var(--muted);

            font-size: 12px;

            background: #fcfdff;
        }


        /* =====================================================
           ALERT
        ====================================================== */

        .alert-custom {
            border: none;

            border-radius: 10px;

            font-size: 13px;

            padding: 13px 16px;

            margin-bottom: 20px;
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
                padding: 24px 20px;
            }

            .page-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .create-btn {
                align-self: flex-start;
            }

        }


        @media (max-width: 575px) {

            .content {
                padding: 20px 14px;
            }

            .topbar {
                height: 70px;
            }

            .profile-name,
            .profile-role {
                display: none;
            }

            .page-title {
                font-size: 23px;
            }

            .page-subtitle {
                font-size: 13px;
            }

            .filter-card {
                padding: 16px;
            }

            .card-header-custom {
                padding: 18px;
            }

            .card-title {
                font-size: 16px;
            }

            .card-subtitle {
                font-size: 12px;
            }

            .enrollment-table thead th {
                font-size: 11px;

                padding: 13px 14px;
            }

            .enrollment-table tbody td {
                font-size: 12px;

                padding: 14px;
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
            <img src="{{ asset('images/schoolsync-logo.png') }}" alt="SchoolSync">
        </div>

        <div class="brand-name">
            School<span>Sync</span>
        </div>

    </div>


    <div class="sidebar-scroll">

        <!-- Overview -->

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


        <!-- People -->

        <div class="sidebar-section">
            People
        </div>

        <a
            href="{{ route('admin.users.index') }}"
            class="menu-link"
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


        <!-- Academic -->

        <div class="sidebar-section">
            Academic
        </div>

        <a
            href="{{ route('admin.academic-years.index') }}"
            class="menu-link"
        >
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
            class="menu-link active"
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


        <!-- Finance -->

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


    <!-- Logout -->

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
                <span>Logout</span>
            </button>

        </form>

    </div>

</aside>


<!-- =========================================================
     MAIN
========================================================= -->

<div class="main">


    <!-- =====================================================
         TOPBAR
    ====================================================== -->

    <div class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button
                class="mobile-btn"
                id="mobileMenuBtn"
                type="button"
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

            <div class="top-icon">

                <i class="bi bi-bell"></i>

                <span class="notification-dot"></span>

            </div>


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



                <i
                    class="bi bi-chevron-down"
                    style="font-size:11px;color:#738096;"
                ></i>

            </div>

        </div>

    </div>


    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <div class="content">


        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Enrollments
                </h1>

                <p class="page-subtitle">
                    Manage student class enrollments and enrollment status.
                </p>

            </div>


            <a
                href="{{ route('admin.enrollments.create') }}"
                class="create-btn"
            >
                <i class="bi bi-plus-lg"></i>
                Create Enrollment
            </a>

        </div>


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div
                class="alert alert-success alert-custom"
                role="alert"
            >
                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        <!-- ERROR MESSAGE -->

        @if($errors->any())

            <div
                class="alert alert-danger alert-custom"
                role="alert"
            >

                <i class="bi bi-exclamation-circle me-2"></i>

                Please check the form for errors.

            </div>

        @endif


        <!-- =================================================
             FILTER CARD
        ================================================== -->

        <div class="filter-card">

            <form
                action="{{ route('admin.enrollments.index') }}"
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
                                placeholder="Search by student name or ID..."
                                onkeydown="if(event.key === 'Enter'){ this.form.submit(); }"
                            >

                        </div>

                    </div>


                    <!-- CLASS -->

                    <div class="col-lg-3">

                        <select
                            name="class_id"
                            class="filter-select"
                            onchange="this.form.submit()"
                        >

                            <option value="">
                                All Classes
                            </option>

                            @foreach($classrooms as $classroom)

                                <option
                                    value="{{ $classroom->class_id }}"
                                    {{ request('class_id') == $classroom->class_id ? 'selected' : '' }}
                                >
                                    {{ $classroom->class_name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- STATUS -->

                    <div class="col-lg-3">

                        <select
                            name="status"
                            class="filter-select"
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

                    </div>

                </div>

            </form>

        </div>


        <!-- =================================================
             ENROLLMENT TABLE
        ================================================== -->

        <div class="card-box">


            <!-- CARD HEADER -->

            <div class="card-header-custom">

                <div>

                    <h3 class="card-title">
                        Student Enrollments
                    </h3>

                </div>

            </div>


            <!-- TABLE -->

            <div class="table-wrapper">

                @if($enrollments->count() > 0)

                    <table class="enrollment-table">

                        <thead>

                            <tr>

                                <th>
                                    Student
                                </th>

                                <th>
                                    Class
                                </th>

                                <th>
                                    Academic Year
                                </th>

                                <th>
                                    Enrollment Date
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

                            @foreach($enrollments as $enrollment)

                                <tr>


                                    <!-- STUDENT -->

                                    <td>

                                        <div class="student-info">

                                            <div class="student-avatar">

                                                {{ strtoupper(
                                                    substr(
                                                        $enrollment->student->full_name ?? 'S',
                                                        0,
                                                        1
                                                    )
                                                ) }}

                                            </div>


                                            <div>

                                                <div class="student-name">

                                                    {{ $enrollment->student->full_name ?? 'Unknown Student' }}

                                                </div>

                                                <div class="student-id">

                                                    ID:
                                                    {{ $enrollment->student->student_code ?? $enrollment->student_id }}

                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    <!-- CLASS -->

                                    <td>

                                        <div class="class-name">

                                            {{ $enrollment->classroom->class_name ?? 'N/A' }}

                                        </div>

                                    </td>


                                    <!-- ACADEMIC YEAR -->

                                    <td>

                                        <div class="academic-year">

                                            @if($enrollment->classroom && $enrollment->classroom->academicYear)

                                                {{ $enrollment->classroom->academicYear->year_name }}

                                            @else

                                                N/A

                                            @endif

                                        </div>

                                    </td>


                                    <!-- DATE -->

                                    <td>

                                        <div class="date-text">

                                            {{ $enrollment->enrollment_date
                                                ? $enrollment->enrollment_date->format('M d, Y')
                                                : 'N/A'
                                            }}

                                        </div>

                                    </td>


                                    <!-- STATUS -->

                                    <td>

                                        @if($enrollment->status === 'active')

                                            <span class="status-badge status-active">
                                                Active
                                            </span>

                                        @else

                                            <span class="status-badge status-inactive">
                                                Inactive
                                            </span>

                                        @endif

                                    </td>


                                    <!-- ACTIONS -->

                                    <td>

                                        <div class="actions">


                                            <!-- VIEW -->

                                            <a
                                                href="{{ route('admin.enrollments.show', $enrollment->enrollment_id) }}"
                                                class="action-btn view"
                                                title="View"
                                            >
                                                <i class="bi bi-eye"></i>
                                            </a>


                                            <!-- EDIT -->

                                            <a
                                                href="{{ route('admin.enrollments.edit', $enrollment->enrollment_id) }}"
                                                class="action-btn edit"
                                                title="Edit"
                                            >
                                                <i class="bi bi-pencil"></i>
                                            </a>


                                            <!-- ACTIVATE / DEACTIVATE -->

                                            @if($enrollment->status === 'active')

                                                <form
                                                    action="{{ route('admin.enrollments.toggle-status', $enrollment->enrollment_id) }}"
                                                    method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to deactivate this enrollment?');"
                                                >

                                                    @csrf

                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="action-btn deactivate"
                                                        title="Deactivate"
                                                    >
                                                        <i class="bi bi-person-x"></i>
                                                    </button>

                                                </form>

                                            @else

                                                <form
                                                    action="{{ route('admin.enrollments.toggle-status', $enrollment->enrollment_id) }}"
                                                    method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to activate this enrollment?');"
                                                >

                                                    @csrf

                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="action-btn activate"
                                                        title="Activate"
                                                    >
                                                        <i class="bi bi-person-check"></i>
                                                    </button>

                                                </form>

                                            @endif

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>


                @else


                    <!-- EMPTY STATE -->

                    <div class="empty-state">

                        <div class="empty-icon">

                            <i class="bi bi-card-checklist"></i>

                        </div>

                        <h5>
                            No enrollments found
                        </h5>

                        <p>
                            There are no enrollment records matching your current filters.
                        </p>

                    </div>

                @endif

            </div>


            <!-- FOOTER -->

            <div class="card-footer-custom">

                Showing
                <strong>
                    {{ $enrollments->count() }}
                </strong>
                enrollment(s)

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

    const mobileMenuBtn =
        document.getElementById('mobileMenuBtn');

    const sidebar =
        document.getElementById('sidebar');


    if (mobileMenuBtn) {

        mobileMenuBtn.addEventListener(
            'click',
            function () {

                sidebar.classList.toggle('show');

            }
        );

    }

</script>


</body>
</html>