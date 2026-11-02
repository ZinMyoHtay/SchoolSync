<!DOCTYPE html>

<html lang="en">

<head>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Class Details | SchoolSync</title>

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

<link rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin>

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
    ===================================== */

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
    ===================================== */

    .main {
        margin-left: 260px;

        min-height: 100vh;
    }


    /* =====================================
       TOPBAR
    ===================================== */

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
    ===================================== */

    .content {
        padding: 30px;
    }


    /* =====================================
       PAGE HEADER
    ===================================== */

    .page-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-bottom: 25px;
    }


    .page-header-left h1 {
        margin: 0 0 8px;

        font-size: 25px;

        font-weight: 800;
    }


    .page-header-left p {
        margin: 0;

        color: var(--muted);

        font-size: 13px;
    }


    .back-button {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 9px 14px;

        background: white;

        color: var(--navy);

        border: 1px solid var(--border);

        border-radius: 8px;

        text-decoration: none;

        font-size: 12px;

        font-weight: 600;

        transition: 0.2s ease;
    }


    .back-button:hover {
        background: var(--blue-light);

        color: var(--blue);

        border-color: #d7e6ff;
    }


    /* =====================================
       CLASS HEADER
    ===================================== */

    .class-header {
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

        margin-bottom: 25px;

        box-shadow: var(--shadow);
    }


    .class-header::after {
        content: "";

        position: absolute;

        width: 230px;
        height: 230px;

        border-radius: 50%;

        background: rgba(23, 105, 224, 0.18);

        right: -70px;
        top: -110px;
    }


    .class-header-content {
        position: relative;

        z-index: 1;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;
    }


    .class-header-left {
        display: flex;

        align-items: center;

        gap: 15px;
    }


    .class-icon {
        width: 52px;
        height: 52px;

        border-radius: 13px;

        background: rgba(255,255,255,0.1);

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 24px;

        flex-shrink: 0;
    }


    .class-header h3 {
        margin: 0 0 7px;

        font-size: 22px;

        font-weight: 800;
    }


    .class-header p {
        margin: 0;

        color: #b8c4d7;

        font-size: 12px;
    }


    .class-code {
        padding: 8px 13px;

        border-radius: 8px;

        background: rgba(255,255,255,0.1);

        font-size: 11px;

        font-weight: 600;

        white-space: nowrap;
    }


    /* =====================================
       STAT CARDS
    ===================================== */

    .stats-row {
        margin-bottom: 25px;
    }


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


    .neutral {
        color: var(--muted);
    }


    /* =====================================
       DASHBOARD CARDS
    ===================================== */

    .dashboard-card {
        background: white;

        border: 1px solid var(--border);

        border-radius: 15px;

        box-shadow: var(--shadow);

        height: 100%;

        margin-bottom: 25px;
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


    .card-header-custom span {
        color: var(--muted);

        font-size: 11px;
    }


    .card-body-custom {
        padding: 15px 20px 20px;
    }


    /* =====================================
       CLASS INFORMATION
    ===================================== */

    .info-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);
    }


    .info-item {
        padding: 17px 20px;

        border-bottom: 1px solid var(--border);
    }


    .info-label {
        color: var(--muted);

        font-size: 10px;

        margin-bottom: 5px;
    }


    .info-value {
        font-size: 12px;

        font-weight: 600;
    }


    /* =====================================
       STUDENT TABLE
    ===================================== */

    .table-responsive {
        width: 100%;

        overflow-x: auto;
    }


    .student-table {
        width: 100%;

        border-collapse: collapse;
    }


    .student-table th {
        padding: 12px 20px;

        background: #fafbfc;

        color: var(--muted);

        font-size: 10px;

        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .4px;

        border-bottom: 1px solid var(--border);

        white-space: nowrap;
    }


    .student-table td {
        padding: 13px 20px;

        border-bottom: 1px solid var(--border);

        font-size: 11px;

        vertical-align: middle;
    }


    .student-table tbody tr:last-child td {
        border-bottom: 0;
    }


    .student-table tbody tr:hover {
        background: #fafcff;
    }


    .student-info {
        display: flex;

        align-items: center;

        gap: 10px;
    }


    .student-avatar {
        width: 34px;
        height: 34px;

        border-radius: 50%;

        background: var(--blue-light);

        color: var(--blue);

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 10px;

        font-weight: 700;

        flex-shrink: 0;
    }


    .student-name {
        font-weight: 700;

        color: var(--text);
    }


    .student-email {
        color: var(--muted);

        font-size: 9px;

        margin-top: 2px;
    }


    /* =====================================
       BADGES
    ===================================== */

    .badge-status {
        display: inline-flex;

        align-items: center;

        padding: 5px 9px;

        border-radius: 6px;

        font-size: 9px;

        font-weight: 700;
    }


    .badge-active {
        background: #e9f8f2;

        color: var(--green);
    }


    .badge-inactive {
        background: #fff0f0;

        color: var(--red);
    }


    .badge-present {
        background: #e9f8f2;

        color: var(--green);
    }


    .badge-absent {
        background: #fff0f0;

        color: var(--red);
    }


    .badge-late {
        background: #fff4e5;

        color: var(--orange);
    }


    .badge-none {
        background: #f1f3f6;

        color: var(--muted);
    }


    .grade-badge {
        background: var(--blue-light);

        color: var(--blue);

        display: inline-flex;

        align-items: center;

        padding: 5px 9px;

        border-radius: 6px;

        font-size: 9px;

        font-weight: 700;
    }


    /* =====================================
       EMPTY STATE
    ===================================== */

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
       RESPONSIVE
    ===================================== */

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


        .info-grid {
            grid-template-columns: 1fr;
        }


        .class-header-content {
            align-items: flex-start;
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


        .page-header {
            flex-direction: column;

            align-items: flex-start;

            gap: 15px;
        }


        .class-header-content {
            flex-direction: column;

            align-items: flex-start;
        }

    }


    @media (max-width: 575px) {

        .profile-info {
            display: none;
        }


        .topbar-right {
            gap: 8px;
        }


        .class-header h3 {
            font-size: 21px;
        }


        .class-header {
            padding: 25px 20px;
        }

    }

</style>


</head>

<body>

@php
$user = Auth::user();


$totalStudents =
    $classroom->enrollments->count();

$activeEnrollments =
    $classroom->enrollments
        ->where('status', 'active')
        ->count();

@endphp

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
    class="menu-link active"
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
    class="menu-link"
>

    <i class="bi bi-megaphone"></i>

    Announcements

</a>

<!-- Account -->

<div class="menu-title"> Account </div>

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


        <button class="icon-button">

            <i class="bi bi-bell"></i>

            <span class="notification-dot"></span>

        </button>


        <div class="profile">

            <div class="profile-avatar">

                {{ strtoupper(
                    substr($user->name, 0, 2)
                ) }}

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


    <!-- PAGE HEADER -->

    <div class="page-header">


        <div class="page-header-left">

            <h1>
                Class Details
            </h1>

            <p>
                View your class information and students.
            </p>

        </div>


        <a
            href="{{ route('teacher.classes.index') }}"
            class="back-button"
        >

            <i class="bi bi-arrow-left"></i>

            Back to Classes

        </a>


    </div>



    <!-- =====================================
         CLASS HEADER
    ====================================== -->

    <div class="class-header">


        <div class="class-header-content">


            <div class="class-header-left">


                <div class="class-icon">

                    <i class="bi bi-diagram-3-fill"></i>

                </div>


                <div>

                    <h3>
                        {{ $classroom->class_name }}
                    </h3>


                    <p>

                        {{ $classroom->academicYear->year_name ?? 'N/A' }}

                        &nbsp; • &nbsp;

                        Teacher:
                        {{ $user->name }}

                    </p>

                </div>


            </div>


            <div class="class-code">

                Class ID:
                {{ $classroom->class_id }}

            </div>


        </div>


    </div>



    <!-- =====================================
         STATISTICS
    ====================================== -->

    <div class="row g-4 stats-row">


        <!-- Students -->

        <div class="col-xl-4 col-md-6">

            <div class="stat-card">


                <div class="stat-top">


                    <div class="stat-icon icon-blue">

                        <i class="bi bi-people-fill"></i>

                    </div>


                </div>


                <div class="stat-title">
                    Enrolled Students
                </div>


                <div class="stat-number">
                    {{ $totalStudents }}
                </div>


                <div class="stat-bottom neutral">
                    Students in this class
                </div>


            </div>

        </div>



        <!-- Active -->

        <div class="col-xl-4 col-md-6">

            <div class="stat-card">


                <div class="stat-top">


                    <div class="stat-icon icon-green">

                        <i class="bi bi-person-check-fill"></i>

                    </div>


                </div>


                <div class="stat-title">
                    Active Enrollments
                </div>


                <div class="stat-number">
                    {{ $activeEnrollments }}
                </div>


                <div class="stat-bottom neutral">
                    Currently active
                </div>


            </div>

        </div>



        <!-- Academic Year -->

        <div class="col-xl-4 col-md-6">

            <div class="stat-card">


                <div class="stat-top">


                    <div class="stat-icon icon-orange">

                        <i class="bi bi-calendar3"></i>

                    </div>


                </div>


                <div class="stat-title">
                    Academic Year
                </div>


                <div
                    class="stat-number"
                    style="font-size: 20px;"
                >

                    {{ $classroom->academicYear->year_name ?? 'N/A' }}

                </div>


                <div class="stat-bottom neutral">
                    Current class year
                </div>


            </div>

        </div>


    </div>



    <!-- =====================================
         CLASS INFORMATION
    ====================================== -->

    <div class="dashboard-card">


        <div class="card-header-custom">


            <div>

                <h5>
                    Class Information
                </h5>

                <span>
                    Basic information about this class
                </span>

            </div>


        </div>


        <div class="card-body-custom">


            <div class="info-grid">


                <div class="info-item">

                    <div class="info-label">
                        Class Name
                    </div>

                    <div class="info-value">
                        {{ $classroom->class_name }}
                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Academic Year
                    </div>

                    <div class="info-value">
                        {{ $classroom->academicYear->year_name ?? 'N/A' }}
                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Teacher
                    </div>

                    <div class="info-value">
                        {{ $user->name }}
                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Teacher Code
                    </div>

                    <div class="info-value">
                        {{ $teacher->teacher_code }}
                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Specialization
                    </div>

                    <div class="info-value">
                        {{ $teacher->specialization ?? 'N/A' }}
                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Class ID
                    </div>

                    <div class="info-value">
                        {{ $classroom->class_id }}
                    </div>

                </div>


            </div>


        </div>


    </div>



    <!-- =====================================
         ENROLLED STUDENTS
    ====================================== -->

    <div class="dashboard-card">


        <div class="card-header-custom">


            <div>

                <h5>
                    Enrolled Students
                </h5>

                <span>
                    Students enrolled in
                    {{ $classroom->class_name }}
                </span>

            </div>


            <span>

                {{ $totalStudents }}

                {{ $totalStudents == 1
                    ? 'Student'
                    : 'Students'
                }}

            </span>


        </div>



        <div class="card-body-custom">


            @if($totalStudents > 0)


                <div class="table-responsive">


                    <table class="student-table">


<thead>
    <tr>
        <th>#</th>
        <th>Student</th>
        <th>Student ID</th>
        <th>Enrollment Date</th>
        <th>Enrollment Status</th>
    </tr>
</thead>

<tbody>
    @forelse($classroom->enrollments as $index => $enrollment)

        @php
            $student = $enrollment->student;
        @endphp

        <tr>
            <td>{{ $index + 1 }}</td>

            <td>
                {{ $student->user->name ?? 'N/A' }}
            </td>

            <td>
                {{ $student->student_code ?? 'N/A' }}
            </td>

            <td>
                {{ $enrollment->enrollment_date
                    ? \Carbon\Carbon::parse($enrollment->enrollment_date)->format('M d, Y')
                    : 'N/A' }}
            </td>

            <td>
                @if($enrollment->status === 'active')
                    <span class="badge bg-success-subtle text-success">
                        Active
                    </span>
                @elseif($enrollment->status === 'inactive')
                    <span class="badge bg-secondary-subtle text-secondary">
                        Inactive
                    </span>
                @else
                    <span class="badge bg-light text-dark">
                        {{ ucfirst($enrollment->status ?? 'N/A') }}
                    </span>
                @endif
            </td>
        </tr>

    @empty
        <tr>
            <td colspan="5" class="text-center py-4">
                No students enrolled in this class.
            </td>
        </tr>
    @endforelse
</tbody>




                    </table>


                </div>


            @else


                <div class="empty-state">


                    <div class="empty-state-icon">

                        <i class="bi bi-people"></i>

                    </div>


                    <h6>
                        No Students Enrolled
                    </h6>


                    <p>
                        There are currently no students enrolled
                        in this class.
                    </p>


                </div>


            @endif


        </div>


    </div>


</section>


</main>

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


    mobileMenu.addEventListener(
        "click",
        function () {

            sidebar.classList.toggle("show");

        }
    );


</script>

</body>

</html>
