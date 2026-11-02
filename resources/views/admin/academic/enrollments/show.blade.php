<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Enrollment Details | SchoolSync</title>

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
              var(--white
                );

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


        .header-actions {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .back-btn,
        .edit-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            height: 44px;

            padding:
                0 17px;

            border-radius: 10px;

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s ease;
        }


        .back-btn {
            background: white;

            border:
                1px solid var(--border);

            color: var(--text);
        }


        .back-btn:hover {
            background: var(--blue-light);

            color: var(--blue);

            border-color:
                #cfe0fb;
        }


        .edit-btn {
            background: var(--blue);

            color: white;

            border: none;

            box-shadow:
                0 6px 15px
                rgba(23,105,224,0.20);
        }


        .edit-btn:hover {
            background: var(--blue-dark);

            color: white;

            transform:
                translateY(-1px);
        }


        /* =====================================================
           DETAILS CARD
        ====================================================== */

        .details-card {
            background: white;

            border:
                1px solid var(--border);

            border-radius: 14px;

            box-shadow: var(--shadow);

            overflow: hidden;

            margin-bottom: 22px;
        }


        .details-header {
            padding:
                22px 26px;

            border-bottom:
                1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .details-title {
            margin: 0;

            font-size: 18px;

            font-weight: 700;

            color: var(--text);
        }


        .details-subtitle {
            margin:
                5px 0 0;

            font-size: 13px;

            color: var(--muted);
        }


        .details-body {
            padding:
                28px 26px;
        }


        /* =====================================================
           DETAIL ITEM
        ====================================================== */

        .detail-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 0;

            border:
                1px solid var(--border);

            border-radius: 12px;

            overflow: hidden;
        }


        .detail-item {
            padding:
                20px 22px;

            border-bottom:
                1px solid var(--border);

            background: white;
        }


        .detail-item:nth-child(odd) {
            border-right:
                1px solid var(--border);
        }


        .detail-item:nth-last-child(-n+2) {
            border-bottom: none;
        }


        .detail-label {
            display: block;

            margin-bottom: 7px;

            font-size: 11px;

            color: var(--muted);

            text-transform: uppercase;

            letter-spacing: 0.6px;

            font-weight: 700;
        }


        .detail-value {
            font-size: 15px;

            color: var(--text);

            font-weight: 600;
        }


        .detail-secondary {
            margin-top: 4px;

            font-size: 11px;

            color: var(--muted);
        }


        /* =====================================================
           CODE
        ====================================================== */

        .code-badge {
            display: inline-flex;

            align-items: center;

            padding:
                7px 11px;

            border-radius: 8px;

            background:
                var(--blue-light);

            color: var(--blue);

            font-size: 11px;

            font-weight: 700;
        }


        /* =====================================================
           STATUS
        ====================================================== */

        .status-badge {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding:
                7px 12px;

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
            background: var(--green);
        }


        .status-inactive {
            background: #fff0f0;

            color: #c53d3d;
        }


        .status-inactive::before {
            background: var(--red);
        }


        /* =====================================================
           SECTION
        ====================================================== */

        .section-title {
            margin:
                0 0 15px;

            font-size: 16px;

            font-weight: 700;

            color: var(--text);
        }


        /* =====================================================
           INFO CARDS
        ====================================================== */

        .info-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 18px;
        }


        .info-card {
            background: white;

            border:
                1px solid var(--border);

            border-radius: 14px;

            padding: 22px;

            box-shadow: var(--shadow);
        }


        .info-icon {
            width: 42px;
            height: 42px;

            border-radius: 11px;

            background:
                var(--blue-light);

            color: var(--blue);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 19px;

            margin-bottom: 15px;
        }


        .info-label {
            font-size: 11px;

            color: var(--muted);

            text-transform: uppercase;

            letter-spacing: 0.5px;

            font-weight: 700;

            margin-bottom: 5px;
        }


        .info-value {
            font-size: 15px;

            font-weight: 700;

            color: var(--text);
        }


        .info-secondary {
            margin-top: 4px;

            font-size: 11px;

            color: var(--muted);
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

            .info-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
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
        }


        @media (max-width: 767px) {

            .detail-grid {
                grid-template-columns:
                    1fr;
            }

            .detail-item:nth-child(odd) {
                border-right: none;
            }

            .detail-item:nth-last-child(-n+2) {
                border-bottom:
                    1px solid var(--border);
            }

            .detail-item:last-child {
                border-bottom: none;
            }

            .info-grid {
                grid-template-columns:
                    1fr;
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

            .header-actions {
                width: 100%;

                flex-direction: column;
            }

            .back-btn,
            .edit-btn {
                width: 100%;
            }

            .details-header {
                padding:
                    19px;
            }

            .details-body {
                padding:
                    18px;
            }

            .detail-item {
                padding:
                    18px;
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
                    Enrollment Details
                </h1>

                <p class="page-subtitle">
                    View complete information about this enrollment.
                </p>

            </div>


            <div class="header-actions">


                <a
                    href="{{ route('admin.enrollments.index') }}"
                    class="back-btn"
                >

                    <i class="bi bi-arrow-left"></i>

                    Back to Enrollments

                </a>


                <a
                    href="{{ route('admin.enrollments.edit', $enrollment->enrollment_id) }}"
                    class="edit-btn"
                >

                    <i class="bi bi-pencil"></i>

                    Edit Enrollment

                </a>


            </div>

        </div>



        <!-- =================================================
             ENROLLMENT INFORMATION
        ================================================== -->

        <div class="details-card">


            <div class="details-header">

                <div>

                    <h3 class="details-title">
                        Enrollment Information
                    </h3>

                    <p class="details-subtitle">
                        Basic enrollment details and current status.
                    </p>

                </div>


                @if($enrollment->status === 'active')

                    <span class="status-badge status-active">
                        Active
                    </span>

                @else

                    <span class="status-badge status-inactive">
                        Inactive
                    </span>

                @endif

            </div>



            <div class="details-body">


                <div class="detail-grid">


                    <!-- ENROLLMENT ID -->

                    <div class="detail-item">

                        <span class="detail-label">
                            Enrollment ID
                        </span>

                        <div class="detail-value">
                            #{{ $enrollment->enrollment_id }}
                        </div>

                    </div>


                    <!-- ENROLLMENT DATE -->

                    <div class="detail-item">

                        <span class="detail-label">
                            Enrollment Date
                        </span>

                        <div class="detail-value">

                            {{ $enrollment->enrollment_date
                                ? $enrollment->enrollment_date->format('d M Y')
                                : '—'
                            }}

                        </div>

                    </div>


                    <!-- STUDENT -->

                    <div class="detail-item">

                        <span class="detail-label">
                            Student
                        </span>

                        <div class="detail-value">

                            {{ $enrollment->student->full_name ?? '—' }}

                        </div>


                        @if($enrollment->student)

                            <div class="detail-secondary">

                                Student ID:
                                #{{ $enrollment->student->student_id }}

                                @if($enrollment->student->student_code)
                                    · {{ $enrollment->student->student_code }}
                                @endif

                            </div>

                        @endif

                    </div>


                    <!-- CLASS -->

                    <div class="detail-item">

                        <span class="detail-label">
                            Class
                        </span>

                        <div class="detail-value">

                            {{ $enrollment->classroom->class_name ?? '—' }}

                        </div>


                        @if($enrollment->classroom)

                            <div class="detail-secondary">

                                Class ID:
                                #{{ $enrollment->classroom->class_id }}

                            </div>

                        @endif

                    </div>


                    <!-- ACADEMIC YEAR -->

                    <div class="detail-item">

                        <span class="detail-label">
                            Academic Year
                        </span>

                        <div class="detail-value">

                            @if(
                                $enrollment->classroom &&
                                $enrollment->classroom->academicYear
                            )

                                {{ $enrollment->classroom->academicYear->year_name }}

                            @else

                                —

                            @endif

                        </div>

                    </div>


                    <!-- STATUS -->

                    <div class="detail-item">

                        <span class="detail-label">
                            Enrollment Status
                        </span>


                        @if($enrollment->status === 'active')

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

            </div>

        </div>



        <!-- =================================================
             CLASS INFORMATION
        ================================================== -->

        <h3 class="section-title">
            Class Information
        </h3>


        <div class="info-grid">


            <!-- CLASS -->

            <div class="info-card">

                <div class="info-icon">

                    <i class="bi bi-diagram-3"></i>

                </div>


                <div class="info-label">
                    Class
                </div>


                <div class="info-value">

                    {{ $enrollment->classroom->class_name ?? '—' }}

                </div>


                @if($enrollment->classroom)

                    <div class="info-secondary">

                        Class ID:
                        #{{ $enrollment->classroom->class_id }}

                    </div>

                @endif

            </div>



            <!-- ACADEMIC YEAR -->

            <div class="info-card">

                <div class="info-icon">

                    <i class="bi bi-calendar3"></i>

                </div>


                <div class="info-label">
                    Academic Year
                </div>


                <div class="info-value">

                    @if(
                        $enrollment->classroom &&
                        $enrollment->classroom->academicYear
                    )

                        {{ $enrollment->classroom->academicYear->year_name }}

                    @else

                        —

                    @endif

                </div>


                @if(
                    $enrollment->classroom &&
                    $enrollment->classroom->academicYear
                )

                    <div class="info-secondary">

                        @if($enrollment->classroom->academicYear->start_date)
                            {{ \Carbon\Carbon::parse($enrollment->classroom->academicYear->start_date)->format('d M Y') }}
                        @endif

                        @if(
                            $enrollment->classroom->academicYear->start_date &&
                            $enrollment->classroom->academicYear->end_date
                        )
                            —
                        @endif

                        @if($enrollment->classroom->academicYear->end_date)
                            {{ \Carbon\Carbon::parse($enrollment->classroom->academicYear->end_date)->format('d M Y') }}
                        @endif

                    </div>

                @endif

            </div>



            <!-- TEACHER -->

            <div class="info-card">

                <div class="info-icon">

                    <i class="bi bi-person-workspace"></i>

                </div>


                <div class="info-label">
                    Class Teacher
                </div>


                <div class="info-value">

                    @if(
                        $enrollment->classroom &&
                        $enrollment->classroom->teacher &&
                        $enrollment->classroom->teacher->staff
                    )

                        {{ $enrollment->classroom->teacher->staff->full_name
                            ?? $enrollment->classroom->teacher->staff->name
                            ?? '—'
                        }}

                    @elseif(
                        $enrollment->classroom &&
                        $enrollment->classroom->teacher
                    )

                        Teacher #{{ $enrollment->classroom->teacher->teacher_id }}

                    @else

                        —

                    @endif

                </div>


                @if(
                    $enrollment->classroom &&
                    $enrollment->classroom->teacher
                )

                    <div class="info-secondary">

                        Teacher ID:
                        #{{ $enrollment->classroom->teacher->teacher_id }}

                    </div>

                @endif

            </div>


        </div>



        <!-- =================================================
             STUDENT INFORMATION
        ================================================== -->

        <h3 class="section-title" style="margin-top: 28px;">
            Student Information
        </h3>


        <div class="details-card">


            <div class="details-body">


                <div class="detail-grid">


                    <!-- STUDENT NAME -->

                    <div class="detail-item">

                        <span class="detail-label">
                            Student Name
                        </span>

                        <div class="detail-value">

                            {{ $enrollment->student->full_name ?? '—' }}

                        </div>

                    </div>


                    <!-- STUDENT ID -->

                    <div class="detail-item">

                        <span class="detail-label">
                            Student ID
                        </span>

                        <div class="detail-value">

                            @if($enrollment->student)

                                #{{ $enrollment->student->student_id }}

                            @else

                                —

                            @endif

                        </div>

                    </div>


                    <!-- STUDENT CODE -->

                    <div class="detail-item">

                        <span class="detail-label">
                            Student Code
                        </span>


                        @if(
                            $enrollment->student &&
                            $enrollment->student->student_code
                        )

                            <span class="code-badge">

                                {{ $enrollment->student->student_code }}

                            </span>

                        @else

                            <div class="detail-value">
                                —
                            </div>

                        @endif

                    </div>


                    <!-- ENROLLMENT DATE -->

                    <div class="detail-item">

                        <span class="detail-label">
                            Enrolled Since
                        </span>

                        <div class="detail-value">

                            {{ $enrollment->enrollment_date
                                ? $enrollment->enrollment_date->format('d M Y')
                                : '—'
                            }}

                        </div>

                    </div>


                </div>

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

</script>


</body>

</html>