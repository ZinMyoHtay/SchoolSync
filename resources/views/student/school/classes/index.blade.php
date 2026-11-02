<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Classes | SchoolSync</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        :root {
            --navy: #0b1f3a;
            --blue: #1769e0;
            --blue-dark: #0d4fb8;
            --yellow: #f7c948;
            --light-blue: #eef5ff;
            --text: #172033;
            --muted: #687386;
            --white: #ffffff;
            --border: #e7ebf2;
            --green: #22a06b;
            --red: #e55353;
            --orange: #f59e0b;
            --purple: #7950f2;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f6f8fc;
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

        /* ================================
           SIDEBAR
        ================================= */

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

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.18);
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.30);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 8px;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: var(--white);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .logo-text {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.4px;
        }

        .menu-title {
            color: rgba(255,255,255,0.42);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 0 10px;
            margin: 22px 0 8px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 4px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            border-radius: 10px;
            color: rgba(255,255,255,0.68);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .sidebar-menu a i {
            font-size: 17px;
            width: 20px;
            text-align: center;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.07);
            color: #fff;
        }

        .sidebar-menu a.active {
            background: var(--blue);
            color: #fff;
            box-shadow: 0 5px 15px rgba(23,105,224,0.22);
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

        /* ================================
           MAIN
        ================================= */

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        /* ================================
           TOPBAR
        ================================= */

        .topbar {
            height: 74px;
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .mobile-menu {
            display: none;
            border: none;
            background: transparent;
            font-size: 23px;
            color: var(--navy);
        }

        .search-box {
            width: 310px;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9aa3b2;
        }

        .search-box input {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px 14px 10px 40px;
            font-size: 13px;
            outline: none;
            background: #fafbfe;
        }

        .search-box input:focus {
            border-color: var(--blue);
            background: white;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .top-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #f5f7fb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5f6b7c;
            position: relative;
            text-decoration: none;
        }

        .notification-dot {
            width: 7px;
            height: 7px;
            background: #ef4444;
            border-radius: 50%;
            position: absolute;
            top: 8px;
            right: 8px;
            border: 2px solid white;
        }

        /* ================================
           TOP PROFILE
        ================================= */

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-blue);
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
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 2px;
        }

        /* ================================
           CONTENT
        ================================= */

        .content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-header-left h1 {
            font-size: 24px;
            font-weight: 800;
            color: var(--navy);
            margin: 0 0 6px;
        }

        .page-header-left p {
            margin: 0;
            font-size: 13px;
            color: var(--muted);
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #fff;
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .back-button:hover {
            border-color: var(--blue);
            color: var(--blue);
            background: var(--light-blue);
        }

        /* ================================
           CURRENT CLASS
        ================================= */

        .current-class-card {
            background: linear-gradient(135deg, #0b1f3a, #1769e0);
            border-radius: 18px;
            padding: 28px 30px;
            color: white;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .current-class-card::after {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            right: -80px;
            top: -130px;
        }

        .current-class-card::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
            right: 100px;
            bottom: -130px;
        }

        .current-class-content {
            position: relative;
            z-index: 2;
        }

        .current-label {
            color: rgba(255,255,255,0.60);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.1px;
            margin-bottom: 8px;
        }

        .current-class-name {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .current-year {
            color: rgba(255,255,255,0.72);
            font-size: 12px;
        }

        .current-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 12px;
            padding: 6px 11px;
            border-radius: 20px;
            background: rgba(255,255,255,0.10);
            font-size: 11px;
            font-weight: 600;
        }

        .current-status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #39d98a;
        }

        /* ================================
           SECTION
        ================================= */

        .section-heading {
            margin-bottom: 15px;
        }

        .section-heading h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 800;
            color: var(--navy);
        }

        .section-heading p {
            margin: 4px 0 0;
            font-size: 11px;
            color: var(--muted);
        }

        /* ================================
           CLASS CARD
        ================================= */

        .class-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 22px;
            height: 100%;
            transition: all 0.25s ease;
        }

        .class-card:hover {
            transform: translateY(-2px);
            border-color: #d9e6fb;
            box-shadow: 0 8px 24px rgba(11,31,58,0.06);
        }

        .class-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .class-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: var(--light-blue);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .class-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .class-badge.active {
            background: #eaf8f1;
            color: var(--green);
        }

        .class-badge.inactive {
            background: #fff0f0;
            color: var(--red);
        }

        .class-badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .class-title {
            font-family: "Plus Jakarta Sans", sans-serif;
            color: var(--navy);
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .class-year {
            color: var(--muted);
            font-size: 11px;
        }

        .class-details {
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid #eef1f5;
        }

        .detail-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 0;
            gap: 15px;
        }

        .detail-label {
            color: var(--muted);
            font-size: 11px;
        }

        .detail-value {
            color: var(--text);
            font-size: 11px;
            font-weight: 700;
            text-align: right;
        }

        /* ================================
           EMPTY STATE
        ================================= */

        .empty-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 55px 25px;
            text-align: center;
        }

        .empty-icon {
            width: 62px;
            height: 62px;
            border-radius: 16px;
            background: var(--light-blue);
            color: var(--blue);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 16px;
        }

        .empty-card h4 {
            margin: 0 0 6px;
            font-size: 16px;
            font-weight: 800;
            color: var(--navy);
        }

        .empty-card p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 1199px) {

            .search-box {
                width: 230px;
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

            .mobile-menu {
                display: block;
            }

            .content {
                padding: 22px;
            }

            .search-box {
                display: none;
            }

        }

        @media (max-width: 575px) {

            .topbar {
                padding: 0 15px;
            }

            .content {
                padding: 15px;
            }

            .profile-info {
                display: none;
            }

            .topbar-right {
                gap: 8px;
            }

            .page-header {
                align-items: flex-start;
                gap: 15px;
            }

            .page-header-left h1 {
                font-size: 21px;
            }

            .page-header-left p {
                font-size: 11px;
            }

            .current-class-card {
                padding: 23px 20px;
            }

            .current-class-name {
                font-size: 23px;
            }

            .class-card {
                padding: 18px;
            }

        }

    </style>

</head>

<body>


    <!-- ================================
         SIDEBAR
    ================================= -->

    <aside class="sidebar" id="sidebar">

        <div class="logo">

            <div class="logo-icon">

                <img
                    src="{{ asset('images/schoolsync-logo.png') }}"
                    alt="SchoolSync"
                >

            </div>

            <div class="logo-text">
                SchoolSync
            </div>

        </div>


        <div class="menu-title">
            Overview
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.dashboard') }}">

                    <i class="bi bi-grid-1x2-fill"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>

        </ul>


        <div class="menu-title">
            School
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.profile.edit') }}">

                    <i class="bi bi-person-circle"></i>

                    <span>
                        Profile
                    </span>

                </a>

            </li>


            <li>

                <a
                    href="{{ route('student.classes.index') }}"
                    class="active"
                >

                    <i class="bi bi-diagram-3"></i>

                    <span>
                        Classes
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('student.subjects.index') }}">

                    <i class="bi bi-book"></i>

                    <span>
                        Subjects
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('student.attendance.index') }}">

                    <i class="bi bi-calendar-check"></i>

                    <span>
                        Attendance
                    </span>

                </a>

            </li>


            <!-- <li>

                <a href="{{ route('student.results.index') }}">

                    <i class="bi bi-bar-chart-line"></i>

                    <span>
                        Results
                    </span>

                </a>

            </li> -->

        </ul>


        <div class="menu-title">
            Academic
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.schedule.index') }}">

                    <i class="bi bi-calendar3"></i>

                    <span>
                        Schedule
                    </span>

                </a>

            </li>

        </ul>


        <div class="menu-title">
            Finance
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.finance.index') }}">

                    <i class="bi bi-wallet2"></i>

                    <span>
                        Fees & Payments
                    </span>

                </a>

            </li>

        </ul>


        <div class="menu-title">
            Communication
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.announcements.index') }}">

                    <i class="bi bi-megaphone"></i>

                    <span>
                        Announcements
                    </span>

                </a>

            </li>

        </ul>


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

                    <i class="bi bi-box-arrow-left"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    <!-- ================================
         MAIN
    ================================= -->

    <main class="main">


        <!-- ================================
             TOPBAR
        ================================= -->

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
                        placeholder="Search anything..."
                    >

                </div>

            </div>


            <div class="topbar-right">

                <a
                    href="#"
                    class="top-icon"
                >

                    <i class="bi bi-bell"></i>

                    <span class="notification-dot"></span>

                </a>


                <div class="profile">

                    <div class="profile-avatar">

                        {{ strtoupper(substr($user->name ?? 'ST', 0, 2)) }}

                    </div>


                    <div class="profile-info">

                        <strong>
                            {{ $user->name ?? '-' }}
                        </strong>

                        <span>
                            Student
                        </span>

                    </div>

                </div>

            </div>

        </header>


        <!-- ================================
             CONTENT
        ================================= -->

        <div class="content">


            <!-- PAGE HEADER -->

            <div class="page-header">

                <div class="page-header-left">

                    <h1>
                        My Classes
                    </h1>

                    <p>
                        View your enrolled classes and academic information.
                    </p>

                </div>


                <a
                    href="{{ route('student.dashboard') }}"
                    class="back-button"
                >

                    <i class="bi bi-arrow-left"></i>

                    Back

                </a>

            </div>


            <!-- ================================
                 CURRENT CLASS
            ================================= -->

            @if($currentEnrollment)

                <section class="current-class-card">

                    <div class="current-class-content">

                        <div class="current-label">
                            Current Class
                        </div>


                        <div class="current-class-name">

                            {{ $currentEnrollment->classroom?->class_name ?? '-' }}

                        </div>


                        <div class="current-year">

                            Academic Year:

                            {{ $currentEnrollment->classroom?->academicYear?->year_name ?? '-' }}

                        </div>


                        <div class="current-status">

                            <span class="current-status-dot"></span>

                            {{ ucfirst($currentEnrollment->status ?? 'Active') }}

                        </div>

                    </div>

                </section>

            @endif


            <!-- ================================
                 ENROLLED CLASSES
            ================================= -->

            <div class="section-heading">

                <h3>
                    Enrolled Classes
                </h3>

                <p>
                    Your class enrollment history
                </p>

            </div>


            @if($enrollments->count() > 0)

                <div class="row g-3">

                    @foreach($enrollments as $enrollment)

                        <div class="col-xl-4 col-lg-6 col-md-6">

                            <div class="class-card">


                                <div class="class-card-header">

                                    <div class="class-icon">

                                        <i class="bi bi-diagram-3"></i>

                                    </div>


                                    @if(strtolower($enrollment->status ?? '') === 'active')

                                        <span class="class-badge active">

                                            <span class="class-badge-dot"></span>

                                            Active

                                        </span>

                                    @else

                                        <span class="class-badge inactive">

                                            <span class="class-badge-dot"></span>

                                            {{ ucfirst($enrollment->status ?? 'Inactive') }}

                                        </span>

                                    @endif

                                </div>


                                <div class="class-title">

                                    {{ $enrollment->classroom?->class_name ?? '-' }}

                                </div>


                                <div class="class-year">

                                    {{ $enrollment->classroom?->academicYear?->year_name ?? 'Academic Year -' }}

                                </div>


                                <div class="class-details">


                                    <!-- Start Date -->

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            Start Date
                                        </span>

                                        <span class="detail-value">

                                            {{ $enrollment->classroom?->academicYear?->start_date?->format('d M Y') ?? '-' }}

                                        </span>

                                    </div>


                                    <!-- End Date -->

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            End Date
                                        </span>

                                        <span class="detail-value">

                                            {{ $enrollment->classroom?->academicYear?->end_date?->format('d M Y') ?? '-' }}

                                        </span>

                                    </div>


                                    <!-- Teacher -->

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            Teacher
                                        </span>

                                        <span class="detail-value">

                                            @php

                                                $teachers = $enrollment
                                                    ->classroom
                                                    ?->classSubjects
                                                    ?->map(function ($classSubject) {

                                                        return $classSubject
                                                            ->teacher
                                                            ?->staff
                                                            ?->full_name;

                                                    })
                                                    ->filter()
                                                    ->unique()
                                                    ->values();

                                            @endphp


                                            @if($teachers && $teachers->count() > 0)

                                                {{ $teachers->implode(', ') }}

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                    <!-- Subjects -->

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            Subjects
                                        </span>

                                        <span class="detail-value">

                                            @if($enrollment->classroom?->classSubjects?->count())

                                                {{ $enrollment->classroom->classSubjects
                                                    ->map(fn($classSubject) => $classSubject->subject?->subject_name)
                                                    ->filter()
                                                    ->implode(', ') }}

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else


                <!-- EMPTY STATE -->

                <div class="empty-card">

                    <div class="empty-icon">

                        <i class="bi bi-diagram-3"></i>

                    </div>


                    <h4>
                        No Classes Found
                    </h4>


                    <p>
                        You are not currently enrolled in any class.
                    </p>

                </div>

            @endif


        </div>

    </main>


    <!-- ================================
         JAVASCRIPT
    ================================= -->

    <script>

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

</body>

</html>