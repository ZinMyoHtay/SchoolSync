<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Teacher Announcements | SchoolSync</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
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
        }


        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Plus Jakarta Sans", sans-serif;
        }


        /* =====================================
           SIDEBAR
        ====================================== */

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
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 8px 12px 25px;
        }


        .brand-icon {
            width: 42px;
            height: 42px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: var(--white);

            border-radius: 12px;

            font-size: 20px;
        }

                .brand-icon img {
    width: 90%;
    height: 90%;
    object-fit: contain;
    display: block;
}


        .brand h4 {
            margin: 0;

            font-size: 20px;

            font-weight: 800;
        }


        .brand small {
            color: #9eabc0;

            font-size: 11px;
        }


        .menu-title {
            padding: 15px 12px 8px;

            color: #7f90aa;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.8px;
        }


        .menu-link {
            display: flex;

            align-items: center;

            gap: 13px;

            padding: 12px 14px;

            margin-bottom: 4px;

            border-radius: 10px;

            color: #b9c5d7;

            text-decoration: none;

            font-size: 14px;

            font-weight: 500;

            transition: 0.2s ease;
        }


        .menu-link i {
            width: 20px;

            font-size: 17px;
        }


        .menu-link:hover {
            color: white;

            background: rgba(255, 255, 255, 0.07);
        }


        .menu-link.active {
            color: white;

            background: var(--blue);

            box-shadow:
                0 7px 18px rgba(23, 105, 224, 0.25);
        }


        /* Sidebar footer */

        .sidebar-footer {
            margin-top: 25px;
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


        /* =====================================
           MAIN
        ====================================== */

        .main {
            margin-left: 260px;

            min-height: 100vh;
        }


        /* =====================================
           TOPBAR
        ====================================== */

        .topbar {
            height: 72px;

            background: white;

            border-bottom: 1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;
        }


        .topbar-left {
            display: flex;

            align-items: center;

            gap: 15px;
        }


        .mobile-menu {
            display: none;

            border: none;

            background: transparent;

            font-size: 24px;
        }


        .search-box {
            position: relative;
        }


        .search-box i {
            position: absolute;

            left: 14px;
            top: 50%;

            transform: translateY(-50%);

            color: var(--muted);
        }


        .search-box input {
            width: 300px;

            border: 1px solid var(--border);

            border-radius: 10px;

            padding: 10px 15px 10px 40px;

            outline: none;

            font-size: 13px;
        }


        .search-box input:focus {
            border-color: var(--blue);
        }


        .topbar-right {
            display: flex;

            align-items: center;

            gap: 20px;
        }


        .icon-button {
            position: relative;

            width: 38px;
            height: 38px;

            border: 1px solid var(--border);

            border-radius: 10px;

            background: white;

            display: flex;

            align-items: center;
            justify-content: center;

            color: var(--muted);

            cursor: pointer;
        }


        .notification-dot {
            position: absolute;

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: var(--red);

            top: 7px;
            right: 7px;
        }


        .profile {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .profile-avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: var(--blue-light);

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
            color: var(--muted);

            font-size: 11px;
        }


        /* =====================================
           CONTENT
        ====================================== */

        .content {
            padding: 30px;
        }


        /* =====================================
           WELCOME
        ====================================== */

        .welcome {
            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    var(--navy),
                    var(--navy-2)
                );

            border-radius: 18px;

            padding: 28px 30px;

            color: white;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;
        }


        .welcome::after {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            border-radius: 50%;

            background: rgba(23, 105, 224, 0.18);

            right: -70px;
            top: -110px;
        }


        .welcome-content {
            position: relative;

            z-index: 1;
        }


        .welcome h1 {
            margin: 0 0 8px;

            font-size: 25px;

            font-weight: 800;
        }


        .welcome p {
            margin: 0;

            color: #b8c4d7;

            font-size: 13px;
        }


        /* =====================================
           STAT CARDS
        ====================================== */

        .stat-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 15px;

            padding: 20px;

            box-shadow: var(--shadow);

            height: 100%;

            transition: 0.2s ease;
        }


        .stat-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 35px rgba(16, 35, 60, 0.09);
        }


        .stat-top {
            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .stat-icon {
            width: 43px;
            height: 43px;

            border-radius: 12px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 19px;
        }


        .icon-blue {
            background: #eaf2ff;

            color: var(--blue);
        }


        .icon-green {
            background: #eafaf3;

            color: var(--green);
        }


        .icon-purple {
            background: #f1edff;

            color: var(--purple);
        }


        .icon-orange {
            background: #fff5e7;

            color: var(--orange);
        }


        .stat-title {
            margin-top: 17px;

            color: var(--muted);

            font-size: 12px;
        }


        .stat-number {
            margin-top: 5px;

            font-family: "Plus Jakarta Sans";

            font-size: 25px;

            font-weight: 800;
        }


        .stat-bottom {
            margin-top: 10px;

            font-size: 11px;
        }


        .positive {
            color: var(--green);
        }


        .neutral {
            color: var(--muted);
        }


        /* =====================================
           DASHBOARD CARDS
        ====================================== */

        .dashboard-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 15px;

            box-shadow: var(--shadow);

            height: 100%;
        }


        .card-header-custom {
            padding: 20px 20px 10px;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .card-header-custom h5 {
            margin: 0;

            font-size: 15px;

            font-weight: 700;
        }


        .card-header-custom a {
            text-decoration: none;

            color: var(--blue);

            font-size: 12px;

            font-weight: 600;
        }


        /* =====================================
           ANNOUNCEMENT TOOLBAR
        ====================================== */

        .classes-toolbar {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding: 0 20px 15px;
        }


        .classes-search {
            position: relative;

            width: 280px;
        }


        .classes-search i {
            position: absolute;

            left: 13px;

            top: 50%;

            transform: translateY(-50%);

            color: var(--muted);

            font-size: 14px;
        }


        .classes-search input {
            width: 100%;

            border: 1px solid var(--border);

            border-radius: 9px;

            padding: 9px 12px 9px 36px;

            outline: none;

            font-size: 12px;
        }


        .classes-search input:focus {
            border-color: var(--blue);
        }


        /* =====================================
           ANNOUNCEMENTS
        ====================================== */

        .class-heading {
            display: grid;

            grid-template-columns: 1fr 140px 90px;

            align-items: center;

            padding: 10px 0;

            border-bottom: 1px solid var(--border);

            color: var(--muted);

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.4px;
        }


        .class-heading .students-heading {
            text-align: left;
        }


        .class-heading .action-heading {
            text-align: right;
        }


        .class-item {
            display: grid;

            grid-template-columns: 1fr 140px 90px;

            align-items: center;

            padding: 12px 0;

            border-bottom: 1px solid var(--border);
        }


        .class-item:last-child {
            border-bottom: none;
        }


        .class-info {
            display: flex;

            align-items: center;

            min-width: 0;
        }


        .class-icon {
            width: 40px;
            height: 40px;

            border-radius: 10px;

            background: var(--blue-light);

            color: var(--blue);

            display: flex;

            align-items: center;
            justify-content: center;

            margin-right: 12px;

            flex-shrink: 0;
        }


        .class-info h6 {
            margin: 0 0 3px;

            font-size: 13px;
        }


        .class-info p {
            margin: 0;

            color: var(--muted);

            font-size: 11px;

            max-width: 700px;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;
        }


        .class-count {
            color: var(--blue);

            font-size: 11px;

            font-weight: 700;

            display: flex;

            align-items: center;

            justify-content: flex-start;
        }


        .class-action {
            display: flex;

            justify-content: flex-end;

            align-items: center;
        }


        .view-button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 5px;

            padding: 6px 11px;

            border-radius: 8px;

            color: grey;

            text-decoration: none;

            border: none;

            background: transparent;

            font-size: 15px;

            font-weight: 600;

            transition: 0.2s ease;

            cursor: pointer;
        }


        .view-button:hover {
            background: var(--blue-light);

            color: var(--blue);
        }


        .card-body-custom {
            padding: 15px 20px 20px;
        }


        /* =====================================
           EMPTY STATE
        ====================================== */

        .empty-state {
            text-align: center;

            padding: 45px 20px;
        }


        .empty-state-icon {
            width: 55px;
            height: 55px;

            margin: 0 auto 15px;

            border-radius: 50%;

            background: var(--blue-light);

            color: var(--blue);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 23px;
        }


        .empty-state h6 {
            margin-bottom: 5px;

            font-size: 14px;

            font-weight: 700;
        }


        .empty-state p {
            margin: 0;

            color: var(--muted);

            font-size: 11px;
        }


        /* =====================================
           ANNOUNCEMENT VIEW MODAL
        ====================================== */

        #announcementViewModal .modal-content {
            border: none;

            border-radius: 15px;

            overflow: hidden;

            box-shadow:
                0 20px 60px rgba(16, 35, 60, 0.18);
        }


        #announcementViewModal .modal-header {
            padding: 20px 22px;

            background: white;

            border-bottom: 1px solid var(--border);
        }


        #announcementViewModal .modal-title {
            color: var(--navy);

            font-size: 18px;

            font-weight: 800;
        }


        #announcementViewModal .modal-body {
            padding: 24px;

            background: var(--bg);
        }


        .announcement-detail-card {
            background: white;

            border: 1px solid var(--border);

            border-radius: 12px;

            padding: 20px;
        }


        .announcement-detail-title {
            color: var(--navy);

            font-size: 20px;

            font-weight: 800;

            margin-bottom: 8px;
        }


        .announcement-detail-date {
            display: flex;

            align-items: center;

            gap: 6px;

            color: var(--muted);

            font-size: 11px;

            margin-bottom: 20px;
        }


        .announcement-detail-date i {
            color: var(--blue);
        }


        .announcement-detail-content {
            color: var(--text);

            font-size: 13px;

            line-height: 1.8;

            white-space: pre-line;

            word-break: break-word;
        }


        #announcementViewModal .modal-footer {
            padding: 14px 20px;

            border-top: 1px solid var(--border);

            background: white;
        }


        #announcementViewModal .btn-close {
            box-shadow: none;
        }


        /* =====================================
           RESPONSIVE
        ====================================== */

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


            .search-box input {
                width: 220px;
            }

        }


        @media (max-width: 767px) {

            .content {
                padding: 20px;
            }


            .topbar {
                padding: 0 20px;
            }


            .search-box {
                display: none;
            }


            .welcome {
                flex-direction: column;

                align-items: flex-start;

                gap: 18px;
            }


            .classes-toolbar {
                flex-direction: column;

                align-items: stretch;
            }


            .classes-search {
                width: 100%;
            }


            .class-heading {
                grid-template-columns: 1fr 100px 70px;
            }


            .class-item {
                grid-template-columns: 1fr 100px 70px;
            }

        }


        @media (max-width: 575px) {

            .profile-info {
                display: none;
            }


            .topbar-right {
                gap: 8px;
            }


            .welcome h1 {
                font-size: 21px;
            }


            .class-heading {
                grid-template-columns: 1fr 80px 55px;
            }


            .class-item {
                grid-template-columns: 1fr 80px 55px;
            }


            .class-count {
                font-size: 10px;
            }


            .view-button {
                padding: 5px 8px;
            }

        }

    </style>

</head>


<body>


<!-- =========================================
     SIDEBAR
========================================= -->

<aside class="sidebar" id="sidebar">


    <!-- Brand -->

    <div class="brand">

        <div class="brand-icon">

            <img
                src="{{ asset('images/schoolsync-logo.png') }}"
                alt="SchoolSync"
            >

        </div>


        <div>

            <h4>SchoolSync</h4>

        </div>

    </div>


    <!-- Overview -->

    <div class="menu-title">
        Overview
    </div>


    <a
        href="{{ route('teacher.dashboard') }}"
        class="menu-link"
    >

        <i class="bi bi-grid-1x2-fill"></i>

        Dashboard

    </a>


    <!-- Teaching -->

    <div class="menu-title">
        Teaching
    </div>


    <a
        href="{{ route('teacher.classes.index') }}"
        class="menu-link"
    >

        <i class="bi bi-diagram-3"></i>

        Classes

    </a>


    <a
        href="{{ route('teacher.subjects.index') }}"
        class="menu-link"
    >

        <i class="bi bi-book"></i>

        Subjects

    </a>


    <a
        href="{{ route('teacher.students.index') }}"
        class="menu-link"
    >

        <i class="bi bi-mortarboard"></i>

        Students

    </a>


    <a
        href="{{ route('teacher.attendance.index') }}"
        class="menu-link"
    >

        <i class="bi bi-calendar-check"></i>

        Attendance

    </a>


    <!-- Academic -->

    <div class="menu-title">
        Academic
    </div>


    <a
        href="{{ route('teacher.schedule.index') }}"
        class="menu-link"
    >

        <i class="bi bi-calendar3"></i>

        Schedule

    </a>


    <!-- Communication -->

    <div class="menu-title">
        Communication
    </div>


    <a
        href="{{ route('teacher.announcements.index') }}"
        class="menu-link active"
    >

        <i class="bi bi-megaphone"></i>

        Announcements

    </a>


    <!-- Account -->

    <div class="menu-title">
        Account
    </div>


    <a
        href="{{ route('teacher.profile.edit') }}"
        class="menu-link"
    >

        <i class="bi bi-person-circle"></i>

        Profile

    </a>


    <!-- Sidebar Footer -->

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


<!-- =========================================
     MAIN
========================================= -->

<main class="main">


    <!-- TOPBAR -->

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
                    placeholder="Search..."
                >

            </div>

        </div>


        <div class="topbar-right">


            <button
                class="icon-button"
                type="button"
            >

                <i class="bi bi-bell"></i>

                <span class="notification-dot"></span>

            </button>


            @php
                $user = Auth::user();
            @endphp


            <div class="profile">

                <div class="profile-avatar">

                    {{ strtoupper(substr($user->name, 0, 2)) }}

                </div>


                <div class="profile-info">

                    <strong>
                        {{ $user->name }}
                    </strong>

                    <span>
                        {{ ucfirst($user->role) }}
                    </span>

                </div>

            </div>


        </div>

    </header>


    <!-- =========================================
         CONTENT
    ========================================== -->

    <section class="content">


        <!-- Welcome -->

        <div class="welcome">


            <div class="welcome-content">

                <h1>
                    Announcements
                </h1>

                <p>
                    View the latest announcements from your school.
                </p>

            </div>

        </div>


        <!-- =====================================
             STATISTICS
        ====================================== -->

        @php

            $totalAnnouncements = $announcements->count();

            $todayAnnouncements = $announcements
                ->filter(function ($announcement) {
                    return $announcement->created_at &&
                        $announcement->created_at->isToday();
                })
                ->count();

        @endphp


        <div class="row g-4 mb-4">


            <!-- Announcements -->

            <div class="col-xl-6 col-md-6">

                <div class="stat-card">


                    <div class="stat-top">

                        <div class="stat-icon icon-blue">

                            <i class="bi bi-megaphone"></i>

                        </div>

                    </div>


                    <div class="stat-title">
                        Announcements
                    </div>


                    <div class="stat-number">
                        {{ $totalAnnouncements }}
                    </div>


                    <div class="stat-bottom neutral">

                        Active school announcements

                    </div>

                </div>

            </div>


            <!-- Today -->

            <div class="col-xl-6 col-md-6">

                <div class="stat-card">


                    <div class="stat-top">

                        <div class="stat-icon icon-green">

                            <i class="bi bi-calendar-check"></i>

                        </div>

                    </div>


                    <div class="stat-title">
                        Today
                    </div>


                    <div class="stat-number">
                        {{ $todayAnnouncements }}
                    </div>


                    <div class="stat-bottom neutral">

                        Announcements published today

                    </div>

                </div>

            </div>


        </div>


        <!-- =====================================
             MY ANNOUNCEMENTS
        ====================================== -->

        <div class="row g-4">

            <div class="col-12">

                <div class="dashboard-card">


                    <!-- Header -->

                    <div class="card-header-custom">

                        <h5>
                            School Announcements
                        </h5>

                        <a href="#">
                            {{ $totalAnnouncements }} Announcements
                        </a>

                    </div>


                    <!-- Search + Date -->

                    <form
                        action="{{ route('teacher.announcements.index') }}"
                        method="GET"
                        id="announcementFilterForm"
                    >

                        <div class="classes-toolbar">


                            <!-- Search -->

                            <div class="classes-search">

                                <i class="bi bi-search"></i>

                                <input
                                    type="text"
                                    name="search"
                                    id="announcementSearch"
                                    placeholder="Search announcements..."
                                    value="{{ request('search') }}"
                                >

                            </div>


                            <!-- Date -->

                            <div class="classes-search">

                                <i class="bi bi-calendar3"></i>

                                <input
                                    type="date"
                                    name="date"
                                    id="announcementDate"
                                    value="{{ request('date') }}"
                                >

                            </div>


                        </div>

                    </form>


                    <div class="card-body-custom">


                        @if($announcements->count() > 0)


                            <!-- Table Heading -->

                            <div class="class-heading">

                                <div>
                                    Announcements
                                </div>

                                <div class="students-heading">
                                    Date
                                </div>

                                <div class="action-heading">
                                    Action
                                </div>

                            </div>


                            <!-- Announcements -->

                            <div id="announcementList">


                                @foreach($announcements as $announcement)


                                    <div
                                        class="class-item"
                                        data-announcement-name="{{ strtolower($announcement->title . ' ' . $announcement->content) }}"
                                    >


                                        <!-- Announcement -->

                                        <div class="class-info">

                                            <div class="class-icon">

                                                <i class="bi bi-megaphone"></i>

                                            </div>


                                            <div>

                                                <h6>
                                                    {{ $announcement->title }}
                                                </h6>


                                            </div>

                                        </div>


                                        <!-- Date -->

                                        <div class="class-count">

                                            <span>

                                                {{ $announcement->created_at->format('M d, Y') }}

                                            </span>

                                        </div>


                                        <!-- Action -->

                                        <div class="class-action">

                                            <button
                                                type="button"
                                                class="view-button view-announcement-btn"
                                                title="View Announcement"

                                                data-title="{{ $announcement->title }}"

                                                data-content="{{ $announcement->content }}"

                                                data-date="{{ $announcement->created_at->format('M d, Y h:i A') }}"
                                            >

                                                <i class="bi bi-eye"></i>

                                            </button>

                                        </div>


                                    </div>


                                @endforeach


                            </div>


                            <!-- No Search Result -->

                            <div
                                id="noAnnouncementResult"
                                class="empty-state"
                                style="display: none;"
                            >

                                <div class="empty-state-icon">

                                    <i class="bi bi-search"></i>

                                </div>

                                <h6>
                                    No Announcements Found
                                </h6>

                                <p>
                                    No announcement matches your search.
                                </p>

                            </div>


                        @else


                            <!-- Empty -->

                            <div class="empty-state">

                                <div class="empty-state-icon">

                                    <i class="bi bi-megaphone"></i>

                                </div>

                                <h6>
                                    No Announcements Available
                                </h6>

                                <p>
                                    There are currently no announcements to display.
                                </p>

                            </div>


                        @endif


                    </div>

                </div>

            </div>

        </div>


    </section>

</main>


<!-- =========================================
     ANNOUNCEMENT VIEW MODAL
========================================= -->

<div
    class="modal fade"
    id="announcementViewModal"
    tabindex="-1"
    aria-labelledby="announcementViewModalLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">


            <!-- Modal Header -->

            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="announcementViewModalLabel"
                >
                    Announcement Details
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>


            <!-- Modal Body -->

            <div class="modal-body">

                <div class="announcement-detail-card">


                    <div
                        class="announcement-detail-title"
                        id="modalAnnouncementTitle"
                    >
                        Announcement Title
                    </div>


                    <div
                        class="announcement-detail-date"
                        id="modalAnnouncementDate"
                    >

                        <i class="bi bi-calendar3"></i>

                        <span>
                            Date
                        </span>

                    </div>


                    <div
                        class="announcement-detail-content"
                        id="modalAnnouncementContent"
                    >
                        Announcement content.
                    </div>


                </div>

            </div>


            <!-- Modal Footer -->

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary btn-sm"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>

            </div>


        </div>

    </div>

</div>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<!-- =========================================
     JAVASCRIPT
========================================= -->

<script>


    /* ===============================
       MOBILE SIDEBAR
    =============================== */

    const mobileMenu =
        document.getElementById("mobileMenu");

    const sidebar =
        document.getElementById("sidebar");


    if (mobileMenu) {

        mobileMenu.addEventListener(
            "click",
            function () {

                sidebar.classList.toggle("show");

            }
        );

    }


</script>


<script>


    /* ===============================
       ANNOUNCEMENT SEARCH
    =============================== */

    const announcementSearch =
        document.getElementById("announcementSearch");

    const announcementItems =
        document.querySelectorAll(".class-item");

    const noAnnouncementResult =
        document.getElementById("noAnnouncementResult");


    if (announcementSearch) {

        announcementSearch.addEventListener(
            "input",
            function () {

                const searchValue =
                    this.value.toLowerCase().trim();

                let visibleCount = 0;


                announcementItems.forEach(
                    function (item) {

                        const announcementName =
                            item.dataset.announcementName;


                        if (
                            announcementName.includes(
                                searchValue
                            )
                        ) {

                            item.style.display = "grid";

                            visibleCount++;

                        } else {

                            item.style.display = "none";

                        }

                    }
                );


                if (
                    visibleCount === 0 &&
                    searchValue !== ""
                ) {

                    noAnnouncementResult.style.display =
                        "block";

                } else {

                    noAnnouncementResult.style.display =
                        "none";

                }

            }
        );

    }


</script>


<script>


    /* ===============================
       DATE AUTO FILTER
    =============================== */

    const announcementDate =
        document.getElementById("announcementDate");

    const announcementForm =
        document.getElementById("announcementFilterForm");


    if (announcementDate) {

        announcementDate.addEventListener(
            "change",
            function () {

                announcementForm.submit();

            }
        );

    }


</script>


<script>


    /* ===============================
       ANNOUNCEMENT VIEW POPUP
    =============================== */

    const viewAnnouncementButtons =
        document.querySelectorAll(
            ".view-announcement-btn"
        );


    const announcementModalElement =
        document.getElementById(
            "announcementViewModal"
        );


    const announcementModal =
        new bootstrap.Modal(
            announcementModalElement
        );


    viewAnnouncementButtons.forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {


                    const title =
                        this.dataset.title || "N/A";


                    const content =
                        this.dataset.content || "N/A";


                    const date =
                        this.dataset.date || "N/A";


                    document.getElementById(
                        "modalAnnouncementTitle"
                    ).textContent = title;


                    document.getElementById(
                        "modalAnnouncementDate"
                    ).innerHTML =
                        '<i class="bi bi-calendar3"></i>' +
                        '<span>' +
                        date +
                        '</span>';


                    document.getElementById(
                        "modalAnnouncementContent"
                    ).textContent = content;


                    announcementModal.show();

                }
            );

        }
    );


</script>


</body>

</html>