<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Subject Details | SchoolSync</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
        crossorigin
    >

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
            background: rgba(255,255,255,0.07);
        }

        .menu-link.active {
            color: white;
            background: var(--blue);
            box-shadow: 0 7px 18px rgba(23, 105, 224, 0.25);
        }

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
            background: rgba(128,128,128,0.08);
            color: #808080 !important;
        }

        .logout:hover i {
            color: #808080 !important;
        }

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

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

        .content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
        }

        .page-title h2 {
            margin: 0 0 6px;
            font-size: 22px;
            font-weight: 800;
        }

        .page-title p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 13px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: white;
            color: var(--navy);
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .back-button:hover {
            background: var(--blue-light);
            border-color: #d7e6ff;
            color: var(--blue);
        }

        .subject-header {
            position: relative;
            overflow: hidden;
            background: linear-gradient(
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

        .subject-header::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            border-radius: 50%;
            background: rgba(23,105,224,0.18);
            right: -70px;
            top: -110px;
        }

        .subject-header-content {
            position: relative;
            z-index: 1;
        }

        .subject-header-icon {
            width: 50px;
            height: 50px;
            border-radius: 13px;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .subject-header h2 {
            margin: 0 0 7px;
            font-size: 23px;
            font-weight: 800;
        }

        .subject-header p {
            margin: 0;
            color: #b8c4d7;
            font-size: 12px;
        }

        .subject-code-badge {
            display: inline-flex;
            align-items: center;
            margin-top: 13px;
            padding: 6px 10px;
            border-radius: 7px;
            background: rgba(255,255,255,0.1);
            color: white;
            font-size: 10px;
            font-weight: 600;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 20px;
            box-shadow: var(--shadow);
            height: 100%;
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

        .stat-label {
            margin-top: 17px;
            color: var(--muted);
            font-size: 12px;
        }

        .stat-value {
            margin-top: 5px;
            font-family: "Plus Jakarta Sans";
            font-size: 25px;
            font-weight: 800;
        }

        .stat-description {
            margin-top: 10px;
            color: var(--muted);
            font-size: 11px;
        }

        .page-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: var(--shadow);
            margin-bottom: 25px;
        }

        .card-header-custom {
            padding: 20px;
            border-bottom: 1px solid var(--border);
        }

        .card-header-custom h5 {
            margin: 0 0 5px;
            font-size: 15px;
            font-weight: 700;
        }

        .card-header-custom span {
            color: var(--muted);
            font-size: 11px;
        }

        .information-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0;
        }

        .information-item {
            padding: 17px 20px;
            border-bottom: 1px solid var(--border);
        }

        .information-item:nth-child(odd) {
            border-right: 1px solid var(--border);
        }

        .information-item:nth-last-child(-n+2) {
            border-bottom: none;
        }

        .information-label {
            color: var(--muted);
            font-size: 9px;
            margin-bottom: 6px;
        }

        .information-value {
            font-size: 12px;
            font-weight: 600;
            color: var(--text);
        }

        .class-list {
            padding: 20px;
        }

        .class-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 17px;
            border: 1px solid var(--border);
            border-radius: 12px;
            margin-bottom: 10px;
            transition: 0.2s ease;
        }

        .class-item:last-child {
            margin-bottom: 0;
        }

        .class-item:hover {
            border-color: #d7e6ff;
            background: #fafcff;
            transform: translateY(-2px);
        }

        .class-left {
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 0;
        }

        .class-icon {
            width: 43px;
            height: 43px;
            border-radius: 11px;
            background: #fff5e7;
            color: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .class-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 4px;
        }

        .class-code {
            color: var(--muted);
            font-size: 10px;
        }

        .class-meta {
            display: flex;
            align-items: flex-start;
            gap: 30px;
            flex-shrink: 0;
        }

        .meta-item {
            min-width: 110px;
        }

        .meta-label {
            color: var(--muted);
            font-size: 9px;
            margin-bottom: 4px;
        }

        .meta-value {
            font-size: 11px;
            font-weight: 600;
            color: var(--text);
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
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

            .class-item {
                align-items: flex-start;
            }

            .class-meta {
                flex-wrap: wrap;
                justify-content: flex-end;
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
            }

            .information-grid {
                grid-template-columns: 1fr;
            }

            .information-item:nth-child(odd) {
                border-right: none;
            }

            .information-item:nth-last-child(-n+2) {
                border-bottom: 1px solid var(--border);
            }

            .information-item:last-child {
                border-bottom: none;
            }

            .class-item {
                flex-direction: column;
                align-items: stretch;
            }

            .class-meta {
                justify-content: flex-start;
            }

        }

        @media (max-width: 575px) {

            .profile-info {
                display: none;
            }

            .topbar-right {
                gap: 8px;
            }

            .subject-header {
                padding: 25px 20px;
            }

            .subject-header h2 {
                font-size: 21px;
            }

            .class-meta {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }

        }

    </style>

</head>

<body>

<aside class="sidebar" id="sidebar">

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
        class="menu-link active"
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

<main class="main">

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

    <section class="content">

        <div class="page-header">

            <div class="page-title">

                <h2>
                    Subject Details
                </h2>

                <p>
                    View subject information and assigned classes.
                </p>

            </div>

            <a
                href="{{ route('teacher.subjects.index') }}"
                class="back-button"
            >

                <i class="bi bi-arrow-left"></i>

                Back to Subjects

            </a>

        </div>

        <div class="subject-header">

            <div class="subject-header-content">

                <div class="subject-header-icon">

                    <i class="bi bi-book-fill"></i>

                </div>

                <h2>
                    {{ $subject->subject_name ?? 'Unknown Subject' }}
                </h2>

                <p>
                    Assigned to your teaching classes.
                </p>

                <div class="subject-code-badge">

                    <i
                        class="bi bi-hash"
                        style="margin-right:4px;"
                    ></i>

                    {{ $subject->subject_code ?? 'N/A' }}

                </div>

            </div>

        </div>

        <div class="row g-4 mb-4">

            <div class="col-xl-4 col-md-6">

                <div class="stat-card">

                    <div
                        class="stat-icon"
                        style="
                            background:#eaf2ff;
                            color:var(--blue);
                        "
                    >

                        <i class="bi bi-book-fill"></i>

                    </div>

                    <div class="stat-label">
                        Subject
                    </div>

                    <div class="stat-value">
                        1
                    </div>

                    <div class="stat-description">
                        Selected subject
                    </div>

                </div>

            </div>

            <div class="col-xl-4 col-md-6">

                <div class="stat-card">

                    <div
                        class="stat-icon"
                        style="
                            background:#eafaf3;
                            color:var(--green);
                        "
                    >

                        <i class="bi bi-diagram-3-fill"></i>

                    </div>

                    <div class="stat-label">
                        Assigned Classes
                    </div>

                    <div class="stat-value">

                        {{ $classSubjects->filter(fn ($item) => $item->classroom)->unique('class_id')->count() }}

                    </div>

                    <div class="stat-description">
                        Classes assigned to you
                    </div>

                </div>

            </div>

            <div class="col-xl-4 col-md-6">

                <div class="stat-card">

                    <div
                        class="stat-icon"
                        style="
                            background:#fff5e7;
                            color:var(--orange);
                        "
                    >

                        <i class="bi bi-calendar3"></i>

                    </div>

                    <div class="stat-label">
                        Academic Years
                    </div>

                    <div class="stat-value">

                        {{ $classSubjects->filter(fn ($item) => $item->classroom?->academicYear)->map(fn ($item) => $item->classroom->academicYear->academic_year_id)->unique()->count() }}

                    </div>

                    <div class="stat-description">
                        Academic years with assignments
                    </div>

                </div>

            </div>

        </div>

        <div class="page-card">

            <div class="card-header-custom">

                <h5>
                    Subject Information
                </h5>

                <span>
                    Basic information about this subject
                </span>

            </div>

            <div class="information-grid">

                <div class="information-item">

                    <div class="information-label">
                        Subject Name
                    </div>

                    <div class="information-value">
                        {{ $subject->subject_name ?? 'N/A' }}
                    </div>

                </div>

                <div class="information-item">

                    <div class="information-label">
                        Subject Code
                    </div>

                    <div class="information-value">
                        {{ $subject->subject_code ?? 'N/A' }}
                    </div>

                </div>

                <div class="information-item">

                    <div class="information-label">
                        Teacher Name
                    </div>

                    <div class="information-value">
                        {{ $user->name ?? 'N/A' }}
                    </div>

                </div>

                <div class="information-item">

                    <div class="information-label">
                        Teacher Code
                    </div>

                    <div class="information-value">
                        {{ $teacher->teacher_code ?? 'N/A' }}
                    </div>

                </div>

                <div class="information-item">

                    <div class="information-label">
                        Specialization
                    </div>

                    <div class="information-value">
                        {{ $teacher->specialization ?? 'N/A' }}
                    </div>

                </div>

                <div class="information-item">

                    <div class="information-label">
                        Subject ID
                    </div>

                    <div class="information-value">
                        {{ $subject->subject_id ?? 'N/A' }}
                    </div>

                </div>

            </div>

        </div>

        <div class="page-card">

            <div class="card-header-custom">

                <h5>
                    Assigned Classes
                </h5>

                <span>
                    Classes where you teach this subject
                </span>

            </div>

            @if($classSubjects->count() > 0)

                <div class="class-list">

                    @foreach($classSubjects as $classSubject)

                        @if($classSubject->classroom)

                            <div class="class-item">

                                <div class="class-left">

                                    <div class="class-icon">

                                        <i class="bi bi-diagram-3-fill"></i>

                                    </div>

                                    <div>

                                        <div class="class-name">

                                            {{ $classSubject->classroom->class_name ?? 'N/A' }}

                                        </div>

                                        <div class="class-code">

                                            Class ID:
                                            {{ $classSubject->classroom->class_id ?? 'N/A' }}

                                        </div>

                                    </div>

                                </div>

                                <div class="class-meta">

                                    <div class="meta-item">

                                        <div class="meta-label">
                                            Academic Year
                                        </div>

                                        <div class="meta-value">

                                            {{ $classSubject->classroom->academicYear->year_name ?? 'N/A' }}

                                        </div>

                                    </div>
<div class="meta-item">

    <div class="meta-label">
        Students
    </div>

    <div class="meta-value">

        {{ $classSubject->classroom->enrollments->count() }}

    </div>

</div>

                                </div>

                            </div>

                        @endif

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-state-icon">

                        <i class="bi bi-diagram-3"></i>

                    </div>

                    <h6>
                        No Classes Assigned
                    </h6>

                    <p>
                        This subject is not currently assigned to any of your classes.
                    </p>

                </div>

            @endif

        </div>

    </section>

</main>

<script>

    const mobileMenu =
        document.getElementById("mobileMenu");

    const sidebar =
        document.getElementById("sidebar");

    if (mobileMenu && sidebar) {

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

