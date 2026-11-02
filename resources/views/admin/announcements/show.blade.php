<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>SchoolSync | Announcement</title>

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

        :root {

            --navy: #0b1f3a;
            --navy-2: #10294a;
            --blue: #1769e0;
            --blue-dark: #0d4fb8;
            --blue-light: #eef5ff;
            --yellow: #f7c948;

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

        /* =========================================================
           SIDEBAR
        ========================================================= */

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
                1px solid rgba(255,255,255,0.08);
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
                rgba(128,128,128,0.08);

            color: #808080 !important;
        }

        .logout:hover i {
            color: #808080 !important;
        }

        /* =========================================================
           MAIN
        ========================================================= */

        .main {

            margin-left: 270px;

            min-height: 100vh;
        }

        /* =========================================================
           TOPBAR
        ========================================================= */

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

            background: #dc3545;

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

        /* =========================================================
           CONTENT
        ========================================================= */

        .content {

            padding: 32px 34px;
        }

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

        .back-btn {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            background: white;

            color: var(--text);

            border:
                1px solid var(--border);

            border-radius: 10px;

            padding: 11px 17px;

            font-size: 13px;

            font-weight: 700;

            transition: 0.2s ease;
        }

        .back-btn:hover {

            background: #f8f9fc;

            color: var(--text);
        }

        /* =========================================================
           CARD
        ========================================================= */

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

        /* =========================================================
           ANNOUNCEMENT DETAIL
        ========================================================= */

        .announcement-body {

            padding: 24px;
        }

        .announcement-icon-large {

            width: 52px;

            height: 52px;

            border-radius: 12px;

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

            font-size: 22px;

            margin-bottom: 18px;
        }

        .announcement-title-large {

            font-family:
                "Plus Jakarta Sans",
                sans-serif;

            font-size: 24px;

            font-weight: 800;

            color: var(--text);

            margin: 0 0 18px;

            line-height: 1.4;
        }

        .announcement-meta {

            display: flex;

            align-items: center;

            flex-wrap: wrap;

            gap: 20px;

            padding-bottom: 20px;

            margin-bottom: 22px;

            border-bottom:
                1px solid var(--border);
        }

        .meta-item {

            display: flex;

            align-items: center;

            gap: 7px;

            color: var(--muted);

            font-size: 12px;
        }

        .meta-item i {

            color: var(--blue);

            font-size: 14px;
        }

        .meta-item strong {

            color: var(--text);

            font-weight: 600;
        }

        .announcement-message {

            color: #4d596d;

            font-size: 14px;

            line-height: 1.8;

            white-space: pre-line;

            word-break: break-word;
        }

        .status-badge {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 6px 11px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 800;
        }

        .status-active {

            background: #eaf8f2;

            color: #13885a;
        }

        .status-inactive {

            background: #fff0f0;

            color: #d64545;
        }

        /* =========================================================
           FOOTER
        ========================================================= */

        .card-footer-custom {

            padding: 15px 24px;

            border-top:
                1px solid var(--border);

            color: var(--muted);

            font-size: 12px;

            background: #fcfdff;

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 10px;
        }

        .footer-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            height: 42px;

            padding: 0 17px;

            border:
                1px solid var(--border);

            background: white;

            color: var(--text);

            border-radius: 9px;

            font-size: 13px;

            font-weight: 700;

            transition: 0.2s ease;
        }

        .footer-btn:hover {

            background: #f8f9fc;

            color: var(--text);
        }

        .edit-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            height: 42px;

            padding: 0 18px;

            border: none;

            background: var(--blue);

            color: white;

            border-radius: 9px;

            font-size: 13px;

            font-weight: 700;

            transition: 0.2s ease;
        }

        .edit-btn:hover {

            background: var(--blue-dark);

            color: white;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

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

                padding: 0 20px;
            }

            .content {

                padding: 24px 20px;
            }

            .page-header {

                align-items: flex-start;

                flex-direction: column;
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

            .card-header-custom {

                padding: 18px;
            }

            .card-title {

                font-size: 16px;
            }

            .card-subtitle {

                font-size: 12px;
            }

            .announcement-body {

                padding: 18px;
            }

            .announcement-title-large {

                font-size: 20px;
            }

            .announcement-message {

                font-size: 13px;
            }

            .card-footer-custom {

                flex-direction: column-reverse;

                align-items: stretch;

                padding: 15px 18px;
            }

            .footer-btn,
            .edit-btn {

                width: 100%;
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


        <!-- OVERVIEW -->

        <div class="sidebar-section">
            Overview
        </div>


        <a
            href="{{ route('admin.dashboard') }}"
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
            Announcements
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

                    Announcement

                </h1>


                <p class="page-subtitle">

                    View the complete announcement details.

                </p>

            </div>


            <a
                href="{{ route('admin.announcements.index') }}"
                class="back-btn"
            >

                <i class="bi bi-arrow-left"></i>

                Back to Announcements

            </a>


        </div>



        <!-- =================================================
             ANNOUNCEMENT DETAIL
        ================================================== -->

        <div class="card-box">


            <!-- CARD HEADER -->

            <div class="card-header-custom">

                <div>

                    <h3 class="card-title">

                        Announcement Details

                    </h3>


                    <p class="card-subtitle">

                        View the announcement information and message.

                    </p>

                </div>

            </div>



            <!-- BODY -->

            <div class="announcement-body">


                <!-- ICON -->

                <div class="announcement-icon-large">

                    <i class="bi bi-megaphone"></i>

                </div>



                <!-- TITLE -->

                <h2 class="announcement-title-large">

                    {{ $announcement->title }}

                </h2>



                <!-- META -->

                <div class="announcement-meta">


                    <!-- CREATED BY -->

                    <div class="meta-item">

                        <i class="bi bi-person"></i>

                        <span>

                            Created by:

                            <strong>
                                {{ $announcement->creator->name ?? 'Admin' }}
                            </strong>

                        </span>

                    </div>



                    <!-- DATE -->

                    <div class="meta-item">

                        <i class="bi bi-calendar3"></i>

                        <span>

                            {{ $announcement->created_at->format('d M Y') }}

                        </span>

                    </div>



                    <!-- TIME -->

                    <div class="meta-item">

                        <i class="bi bi-clock"></i>

                        <span>

                            {{ $announcement->created_at->format('h:i A') }}

                        </span>

                    </div>



                    <!-- STATUS -->

                    <div class="meta-item">

                        <i class="bi bi-circle-fill"></i>

                        @if($announcement->status === 'active')

                            <span class="status-badge status-active">

                                Active

                            </span>

                        @else

                            <span class="status-badge status-inactive">

                                Inactive

                            </span>

                        @endif

                    </div>


                </div>



                <!-- MESSAGE -->

                <div class="announcement-message">

                    {{ $announcement->content }}

                </div>


            </div>



            <!-- FOOTER -->

            <div class="card-footer-custom">


                <a
                    href="{{ route('admin.announcements.index') }}"
                    class="footer-btn"
                >

                    <i class="bi bi-arrow-left"></i>

                    Back

                </a>


                <a
                    href="{{ route(
                        'admin.announcements.edit',
                        $announcement->announcement_id
                    ) }}"
                    class="edit-btn"
                >

                    <i class="bi bi-pencil"></i>

                    Edit 

                </a>


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