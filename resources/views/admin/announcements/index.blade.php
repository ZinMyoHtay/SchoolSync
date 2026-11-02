<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Announcements | SchoolSync</title>

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

    <!-- Fonts -->
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
        }

        a {
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Plus Jakarta Sans", sans-serif;
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
            scrollbar-color:
                rgba(255,255,255,0.18)
                transparent;
        }


        .brand {
            height: 82px;

            display: flex;
            align-items: center;

            padding: 0 25px;

            border-bottom:
                1px solid
                rgba(255,255,255,0.08);
        }


        .brand-logo {
            width: 42px;
            height: 42px;

            border-radius: 12px;

            background:
                var(--white);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;

            margin-right: 12px;

            box-shadow:
                0 7px 20px
                rgba(23,105,224,0.35);
        }

        .brand-logo img {
    width: 95%;
    height: 95%;
    object-fit: contain;
    display: block;
}


        .brand-name {
            font-family:
                "Plus Jakarta Sans";

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
                0 8px 20px
                rgba(23,105,224,0.25);
        }


        .sidebar-footer {
            margin-top: 25px;

            padding-top: 18px;

            border-top:
                1px solid
                rgba(255,255,255,0.08);
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

            transition:
                all 0.25s ease;

            text-align: left;
        }


        .logout i {
            font-size: 18px;
        }


        .logout:hover {
            background:
                rgba(128,128,128,0.08);

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
            font-size: 28px;

            font-weight: 800;

            margin-bottom: 5px;

            color: var(--text);
        }


        .page-subtitle {
            font-size: 14px;

            color: var(--muted);

            margin: 0;
        }


        .create-btn {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            background: var(--blue);

            color: white;

            border: none;

            padding:
                12px 18px;

            border-radius: 10px;

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s ease;

            box-shadow:
                0 6px 15px
                rgba(23,105,224,0.20);
        }


        .create-btn:hover {
            background: var(--blue-dark);

            color: white;

            transform:
                translateY(-1px);
        }


        /* =====================================================
           ALERT
        ====================================================== */

        .alert-success {
            border: none;

            background:
                #eaf8f2;

            color:
                #147a4e;

            border-radius: 10px;

            font-size: 13px;

            padding: 13px 16px;

            margin-bottom: 20px;
        }


        .alert-danger {
            border: none;

            background:
                #fff0f0;

            color:
                #c53d3d;

            border-radius: 10px;

            font-size: 13px;

            padding: 13px 16px;

            margin-bottom: 20px;
        }


        /* =====================================================
           FILTER CARD
        ====================================================== */

        .filter-card {
            background: white;

            border:
                1px solid var(--border);

            border-radius: 14px;

            padding: 20px;

            box-shadow: var(--shadow);

            margin-bottom: 22px;
        }


        .filter-form {
            display: flex;

            align-items: center;

            gap: 12px;
        }


        .search-box {
            position: relative;

            flex: 1;
        }


        .search-box i {
            position: absolute;

            left: 14px;
            top: 50%;

            transform:
                translateY(-50%);

            color: #9aa5b5;

            font-size: 16px;
        }


        .search-box input {
            width: 100%;

            height: 44px;

            border:
                1px solid var(--border);

            border-radius: 10px;

            padding:
                0 15px 0 42px;

            font-size: 13px;

            color: var(--text);

            outline: none;

            background: #f8f9fc;
        }


        .search-box input:focus {
            background: white;

            border-color: #a9c7f5;
        }


        .filter-date {
            height: 44px;

            min-width: 160px;

            border:
                1px solid var(--border);

            border-radius: 10px;

            padding:
                0 14px;

            font-size: 13px;

            color: var(--text);

            background-color: #f8f9fc;

            outline: none;

            cursor: pointer;
        }


        .filter-date:focus {
            background: white;

            border-color: #a9c7f5;

            box-shadow: none;
        }


        /* =====================================================
           TABLE CARD
        ====================================================== */

        .academic-card {
            background: white;

            border:
                1px solid var(--border);

            border-radius: 14px;

            box-shadow: var(--shadow);

            overflow: hidden;
        }


        .table-header {
            padding: 22px 24px;

            border-bottom:
                1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .table-title {
            font-size: 17px;

            font-weight: 700;

            margin: 0;

            color: var(--text);
        }


        .table-header-text {
            font-size: 12px;

            color: var(--muted);
        }


        .table-responsive {
            overflow-x: auto;
        }


        .academic-table {
            width: 100%;

            min-width: 850px;

            border-collapse: collapse;
        }


        .academic-table thead th {
            background: #f8f9fc;

            color: var(--muted);

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.5px;

            padding:
                14px 18px;

            border-bottom:
                1px solid var(--border);

            white-space: nowrap;
        }


        .academic-table tbody td {
            padding:
                17px 18px;

            font-size: 14px;

            color: var(--text);

            border-bottom:
                1px solid var(--border);

            vertical-align: middle;
        }


        .academic-table tbody tr:last-child td {
            border-bottom: none;
        }


        .academic-table tbody tr:hover {
            background: #fbfcfe;
        }


        /* =====================================================
           ANNOUNCEMENT TITLE
        ====================================================== */

        .announcement-title {
            font-size: 14px;

            font-weight: 700;

            color: var(--text);

            max-width: 320px;
        }


        .announcement-preview {
            font-size: 11px;

            color: var(--muted);

            margin-top: 4px;

            max-width: 320px;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;
        }


        /* =====================================================
           ANNOUNCEMENT ID
        ====================================================== */

        .announcement-id {
            font-size: 11px;

            color: var(--muted);
        }


        /* =====================================================
           CREATOR
        ====================================================== */

        .creator-name {
            font-size: 13px;

            font-weight: 600;

            color: var(--text);
        }


        .creator-role {
            font-size: 10px;

            color: var(--muted);

            margin-top: 3px;
        }


        /* =====================================================
           DATE
        ====================================================== */

        .announcement-date {
            font-size: 12px;

            color: var(--text);

            white-space: nowrap;
        }


        /* =====================================================
           STATUS
        ====================================================== */

        .status-badge {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding:
                6px 10px;

            border-radius: 30px;

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

            color: #147a4e;
        }


        .status-active::before {
            background: #18a66b;
        }


        .status-inactive {
            background: #fff0f0;

            color: #c53d3d;
        }


        .status-inactive::before {
            background: #e55353;
        }


        /* =====================================================
           ACTIONS
        ====================================================== */

        .action-group {
            display: flex;

            align-items: center;

            gap: 7px;
        }


        .action-btn {
            width: 34px;
            height: 34px;

            border:
                1px solid var(--border);

            background: white;

            border-radius: 8px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            color: var(--muted);

            font-size: 15px;

            transition: 0.2s ease;

            border-style: solid;
        }


        .action-btn:hover {
            color: var(--blue);

            background:
                var(--blue-light);

            border-color:
                #cfe0fb;
        }


        .action-btn.edit:hover {
            color: var(--orange);

            background: #fff7e8;

            border-color: #f5dfb6;
        }


        .action-btn.delete:hover {
            color: var(--red);

            background: #fff0f0;

            border-color: #f2cccc;
        }


        /* =====================================================
           EMPTY STATE
        ====================================================== */

        .empty-state {
            text-align: center;

            padding: 65px 20px;
        }


        .empty-state-icon {
            width: 64px;
            height: 64px;

            margin:
                0 auto 18px;

            border-radius: 16px;

            background:
                var(--blue-light);

            color: var(--blue);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 27px;
        }


        .empty-state h5 {
            font-size: 15px;

            font-weight: 700;

            margin-bottom: 7px;
        }


        .empty-state p {
            font-size: 12px;

            color: var(--muted);

            margin: 0;
        }


        /* =====================================================
           TABLE FOOTER
        ====================================================== */

        .table-footer {
            padding:
                15px 24px;

            border-top:
                1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .table-footer-text {
            font-size: 12px;

            color: var(--muted);

            margin: 0;
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
                transform:
                    translateX(-100%);
            }

            .sidebar.show {
                transform:
                    translateX(0);
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
                padding:
                    0 20px;
            }

            .content {
                padding:
                    22px 20px;
            }

            .filter-form {
                flex-direction: column;

                align-items: stretch;
            }

            .filter-date {
                width: 100%;
            }
        }


        @media (max-width: 575px) {

            .content {
                padding:
                    18px 14px;
            }

            .topbar {
                height: 70px;
            }

            .profile-name,
            .profile-role {
                display: none;
            }

            .page-header {
                align-items: flex-start;

                flex-direction: column;

                gap: 15px;
            }

            .page-title {
                font-size: 24px;
            }

            .create-btn {
                width: 100%;

                justify-content: center;
            }

            .table-header {
                padding:
                    18px;
            }

            .table-footer {
                padding:
                    14px 18px;
            }
        }

    </style>

</head>


<body>


<!-- =========================================================
     SIDEBAR
========================================================== -->

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


        <!-- ACADEMIC -->

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


        <!-- ANNOUNCEMENTS -->

        <div class="sidebar-section">
            Anncouncements
        </div>


        <a
            href="{{ route('admin.announcements.index') }}"
            class="menu-link active"
        >
            <i class="bi bi-megaphone"></i>

            Announcements
        </a>

    </div>


    <!-- LOGOUT -->

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



<!-- =========================================================
     MAIN
========================================================== -->

<div class="main">


    <!-- =====================================================
         TOPBAR
    ====================================================== -->

    <div class="topbar">


        <button
            class="mobile-btn"
            id="mobileBtn"
            type="button"
        >
            <i class="bi bi-list"></i>
        </button>


        <div class="search">

            <i class="bi bi-search"></i>

            <input
                type="text"
                placeholder="Search..."
            >

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

            </div>

        </div>

    </div>



    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <main class="content">


        <!-- =================================================
             PAGE HEADER
        ================================================== -->

        <div class="page-header">


            <div>

                <h1 class="page-title">
                    Announcement Management
                </h1>

                <p class="page-subtitle">
                    Manage school announcements for teachers and students.
                </p>

            </div>


            <a
                href="{{ route('admin.announcements.create') }}"
                class="create-btn"
            >

                <i class="bi bi-plus-lg"></i>

                Create Announcement

            </a>

        </div>



        <!-- =================================================
             SUCCESS MESSAGE
        ================================================== -->

        @if(session('success'))

            <div
                class="alert alert-success"
                role="alert"
            >

                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}

            </div>

        @endif



        <!-- =================================================
             VALIDATION ERRORS
        ================================================== -->

        @if($errors->any())

            <div
                class="alert alert-danger"
                role="alert"
            >

                @foreach($errors->all() as $error)

                    <div>

                        <i class="bi bi-exclamation-circle me-2"></i>

                        {{ $error }}

                    </div>

                @endforeach

            </div>

        @endif



        <!-- =================================================
             FILTER CARD
        ================================================== -->

        <div class="filter-card">


            <form
                method="GET"
                action="{{ route('admin.announcements.index') }}"
                class="filter-form"
                id="announcementFilterForm"
            >


                <!-- SEARCH -->

                <div class="search-box">

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search announcement title or content..."
                        id="announcementSearch"
                        autocomplete="off"
                    >

                </div>


                <!-- DATE -->

                <input
                    type="date"
                    name="date"
                    value="{{ request('date') }}"
                    class="filter-date"
                    id="announcementDate"
                >


            </form>

        </div>



        <!-- =================================================
             ANNOUNCEMENT TABLE
        ================================================== -->

        <div class="academic-card">


            <!-- TABLE HEADER -->

            <div class="table-header">


                <div>

                    <h3 class="table-title">
                        Announcements
                    </h3>

                </div>


                <span class="table-header-text">

                    {{ $announcements->count() }}

                    {{
                        $announcements->count() === 1
                        ? 'announcement'
                        : 'announcements'
                    }}

                </span>

            </div>



            <!-- TABLE -->

            <div class="table-responsive">

                <table class="academic-table">


                    <thead>

                        <tr>

                            <th>
                                Announcement
                            </th>



                            <th>
                                Created By
                            </th>

                            <th>
                                Date
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


                        @forelse($announcements as $announcement)

                            <tr>


                                <!-- ANNOUNCEMENT -->

                                <td>

                                    <div class="announcement-title">

                                        {{ $announcement->title }}

                                    </div>


                                </td>







                                <!-- CREATED BY -->

                                <td>

                                    <div class="creator-name">

                                        {{
                                            optional(
                                                $announcement->creator
                                            )->name ?? 'Unknown'
                                        }}

                                    </div>

                                </td>


                                <!-- DATE -->

                                <td>

                                    <span class="announcement-date">

                                        {{ $announcement->created_at->format('M d, Y') }}

                                    </span>

                                </td>


                                <!-- STATUS -->

                                <td>

                                    @if($announcement->status === 'active')

                                        <span
                                            class="status-badge status-active"
                                        >

                                            Active

                                        </span>

                                    @else

                                        <span
                                            class="status-badge status-inactive"
                                        >

                                            Inactive

                                        </span>

                                    @endif

                                </td>


                                <!-- ACTIONS -->

                                <td>

                                    <div class="action-group">


                                        <!-- VIEW -->

                                        <a
                                            href="{{ route('admin.announcements.show', $announcement->announcement_id) }}"
                                            class="action-btn"
                                            title="View Announcement"
                                        >

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        <!-- EDIT -->

                                        <a
                                            href="{{ route('admin.announcements.edit', $announcement->announcement_id) }}"
                                            class="action-btn edit"
                                            title="Edit Announcement"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <!-- DELETE -->

                                        <form
                                            action="{{ route('admin.announcements.destroy', $announcement->announcement_id) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this announcement?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn delete"
                                                title="Delete Announcement"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>


                            </tr>

                        @empty


                            <tr>

                                <td
                                    colspan="6"
                                    style="padding: 0;"
                                >

                                    <div class="empty-state">


                                        <div class="empty-state-icon">

                                            <i class="bi bi-megaphone"></i>

                                        </div>


                                        <h5>
                                            No announcements found
                                        </h5>


                                        <p>
                                            There are no announcements matching your search or date.
                                        </p>


                                    </div>

                                </td>

                            </tr>


                        @endforelse


                    </tbody>

                </table>

            </div>



            <!-- TABLE FOOTER -->

            <div class="table-footer">

                <p class="table-footer-text">

                    Showing

                    <strong>
                        {{ $announcements->count() }}
                    </strong>

                    {{
                        $announcements->count() === 1
                        ? 'announcement'
                        : 'announcements'
                    }}

                </p>


                <p class="table-footer-text">

                    SchoolSync Academic Management

                </p>

            </div>


        </div>


    </main>

</div>



<!-- =========================================================
     JAVASCRIPT
========================================================== -->

<script>

    const mobileBtn =
        document.getElementById('mobileBtn');

    const sidebar =
        document.getElementById('sidebar');


    if (mobileBtn) {

        mobileBtn.addEventListener(
            'click',
            function () {

                sidebar.classList.toggle('show');

            }
        );

    }


    document.addEventListener(
        'click',
        function (event) {

            if (
                window.innerWidth <= 991 &&
                sidebar.classList.contains('show') &&
                !sidebar.contains(event.target) &&
                !mobileBtn.contains(event.target)
            ) {

                sidebar.classList.remove('show');

            }

        }
    );


    /* =====================================================
       AUTOMATIC ANNOUNCEMENT SEARCH
    ====================================================== */

    const announcementForm =
        document.getElementById('announcementFilterForm');

    const announcementSearch =
        document.getElementById('announcementSearch');

    const announcementDate =
        document.getElementById('announcementDate');


    let searchTimer;


    if (announcementSearch) {

        announcementSearch.addEventListener(
            'input',
            function () {

                clearTimeout(searchTimer);

                searchTimer = setTimeout(
                    function () {

                        announcementForm.submit();

                    },
                    400
                );

            }
        );

    }


    /* =====================================================
       AUTOMATIC DATE FILTER
    ====================================================== */

    if (announcementDate) {

        announcementDate.addEventListener(
            'change',
            function () {

                announcementForm.submit();

            }
        );

    }

</script>


</body>

</html>