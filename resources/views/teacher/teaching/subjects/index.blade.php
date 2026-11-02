<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Subjects | SchoolSync</title>

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

        .welcome-card {
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

        .welcome-card::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            border-radius: 50%;
            background: rgba(23,105,224,0.18);
            right: -70px;
            top: -110px;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .welcome-card h2 {
            margin: 0 0 8px;
            font-size: 23px;
            font-weight: 800;
        }

        .welcome-card p {
            margin: 0;
            color: #b8c4d7;
            font-size: 12px;
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
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

        .subject-search {
            position: relative;
            width: 260px;
        }

        .subject-search i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
        }

        .subject-search input {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 9px 12px 9px 37px;
            outline: none;
            font-size: 12px;
        }

        .subject-search input:focus {
            border-color: var(--blue);
        }

        .subject-list {
            padding: 0 20px 20px;
        }

        .subject-item {
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

        .subject-item:last-child {
            margin-bottom: 0;
        }

        .subject-item:hover {
            border-color: #d7e6ff;
            background: #fafcff;
            transform: translateY(-2px);
        }

        .subject-left {
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 0;
        }

        .subject-icon {
            width: 43px;
            height: 43px;
            border-radius: 11px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .subject-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 4px;
        }

        .subject-code {
            color: var(--muted);
            font-size: 10px;
        }

        .subject-meta {
            display: flex;
            align-items: flex-start;
            gap: 18px;
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

        .assigned-classes {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .assigned-class {
            font-size: 11px;
            font-weight: 600;
            color: var(--text);
            line-height: 1.4;
        }

        .view-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 11px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: var(--navy);
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: 0.2s ease;
            margin-top: 14px;
        }

        .view-button:hover {
            background: var(--blue-light);
            border-color: #d7e6ff;
            color: var(--blue);
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

        .no-results {
            display: none;
            text-align: center;
            padding: 35px 20px;
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

            .subject-item {
                align-items: flex-start;
            }

            .subject-meta {
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

            .card-header-custom {
                flex-direction: column;
                align-items: flex-start;
            }

            .subject-search {
                width: 100%;
            }

            .subject-item {
                flex-direction: column;
                align-items: stretch;
            }

            .subject-meta {
                justify-content: flex-start;
            }

            .view-button {
                width: fit-content;
                margin-top: 0;
            }

        }

        @media (max-width: 575px) {

            .profile-info {
                display: none;
            }

            .topbar-right {
                gap: 8px;
            }

            .welcome-card {
                padding: 25px 20px;
            }

            .welcome-card h2 {
                font-size: 21px;
            }

            .subject-meta {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }

        }

    </style>

</head>

<body>

@php

    $groupedSubjects = $classSubjects
        ->groupBy('subject_id');

    $totalSubjects = $groupedSubjects->count();

    $activeSubjects = $groupedSubjects
        ->filter(function ($assignments) {
            return $assignments->first()->subject?->status === 'active';
        })
        ->count();

    $totalClasses = $classSubjects
        ->filter(fn ($classSubject) => $classSubject->classroom)
        ->unique('class_id')
        ->count();

@endphp

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

        <div class="welcome-card">

            <div class="welcome-content">

                <h2>
                    My Subjects
                </h2>

                <p>
                    View the subjects assigned to your classes.
                </p>

            </div>

        </div>

        <div class="row g-4 mb-4">

            <div class="col-xl-4 col-md-6">

                <div
                    class="stat-card"
                    style="
                        background:white;
                        border:1px solid var(--border);
                        border-radius:15px;
                        padding:20px;
                        box-shadow:var(--shadow);
                    "
                >

                    <div
                        style="
                            width:43px;
                            height:43px;
                            border-radius:12px;
                            background:#eaf2ff;
                            color:var(--blue);
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:19px;
                        "
                    >

                        <i class="bi bi-book-fill"></i>

                    </div>

                    <div
                        style="
                            margin-top:17px;
                            color:var(--muted);
                            font-size:12px;
                        "
                    >
                        Assigned Subjects
                    </div>

                    <div
                        style="
                            margin-top:5px;
                            font-family:'Plus Jakarta Sans';
                            font-size:25px;
                            font-weight:800;
                        "
                    >
                        {{ $totalSubjects }}
                    </div>

                    <div
                        style="
                            margin-top:10px;
                            color:var(--muted);
                            font-size:11px;
                        "
                    >
                        Unique subjects
                    </div>

                </div>

            </div>

            <div class="col-xl-4 col-md-6">

                <div
                    style="
                        background:white;
                        border:1px solid var(--border);
                        border-radius:15px;
                        padding:20px;
                        box-shadow:var(--shadow);
                        height:100%;
                    "
                >

                    <div
                        style="
                            width:43px;
                            height:43px;
                            border-radius:12px;
                            background:#eafaf3;
                            color:var(--green);
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:19px;
                        "
                    >

                        <i class="bi bi-check-circle-fill"></i>

                    </div>

                    <div
                        style="
                            margin-top:17px;
                            color:var(--muted);
                            font-size:12px;
                        "
                    >
                        Active Subjects
                    </div>

                    <div
                        style="
                            margin-top:5px;
                            font-family:'Plus Jakarta Sans';
                            font-size:25px;
                            font-weight:800;
                        "
                    >
                        {{ $activeSubjects }}
                    </div>

                    <div
                        style="
                            margin-top:10px;
                            color:var(--muted);
                            font-size:11px;
                        "
                    >
                        Currently active
                    </div>

                </div>

            </div>

            <div class="col-xl-4 col-md-6">

                <div
                    style="
                        background:white;
                        border:1px solid var(--border);
                        border-radius:15px;
                        padding:20px;
                        box-shadow:var(--shadow);
                        height:100%;
                    "
                >

                    <div
                        style="
                            width:43px;
                            height:43px;
                            border-radius:12px;
                            background:#fff5e7;
                            color:var(--orange);
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:19px;
                        "
                    >

                        <i class="bi bi-diagram-3-fill"></i>

                    </div>

                    <div
                        style="
                            margin-top:17px;
                            color:var(--muted);
                            font-size:12px;
                        "
                    >
                        Classes
                    </div>

                    <div
                        style="
                            margin-top:5px;
                            font-family:'Plus Jakarta Sans';
                            font-size:25px;
                            font-weight:800;
                        "
                    >
                        {{ $totalClasses }}
                    </div>

                    <div
                        style="
                            margin-top:10px;
                            color:var(--muted);
                            font-size:11px;
                        "
                    >
                        Classes with assignments
                    </div>

                </div>

            </div>

        </div>

        <div class="page-card">

            <div class="card-header-custom">

                <div>

                    <h5>
                        Assigned Subjects
                    </h5>

                    <span>
                        Subjects assigned to your teaching classes
                    </span>

                </div>

                <div class="subject-search">

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        id="subjectSearch"
                        placeholder="Search subjects..."
                        autocomplete="off"
                    >

                </div>

            </div>

            @if($groupedSubjects->count() > 0)

                <div
                    class="subject-list"
                    id="subjectList"
                >

                    @foreach($groupedSubjects as $subjectId => $assignments)

                        @php

                            $subject = $assignments->first()->subject;

                            $searchText = strtolower(
                                ($subject->subject_name ?? '') . ' ' .
                                ($subject->subject_code ?? '') . ' ' .
                                $assignments->map(function ($assignment) {

                                    return
                                        ($assignment->classroom->class_name ?? '') . ' ' .
                                        ($assignment->classroom->academicYear->year_name ?? '');

                                })->implode(' ')
                            );

                        @endphp

                        <div
                            class="subject-item"
                            data-search="{{ $searchText }}"
                        >

                            <div class="subject-left">

                                <div class="subject-icon">

                                    <i class="bi bi-book-fill"></i>

                                </div>

                                <div>

                                    <div class="subject-name">

                                        {{ $subject->subject_name ?? 'Unknown Subject' }}

                                    </div>

                                    <div class="subject-code">

                                        {{ $subject->subject_code ?? 'N/A' }}

                                    </div>

                                </div>

                            </div>

                            <div class="subject-meta">

                                <div class="meta-item">

                                    <div class="meta-label">
                                        Class
                                    </div>

                                    <div class="assigned-classes">

                                        @foreach($assignments as $assignment)

                                            <div class="assigned-class">

                                                {{ $assignment->classroom->class_name ?? 'N/A' }}

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                                <div class="meta-item">

                                    <div class="meta-label">
                                        Academic Year
                                    </div>

                                    <div class="assigned-classes">

                                        @foreach($assignments as $assignment)

                                            <div class="assigned-class">

                                                {{ $assignment->classroom->academicYear->year_name ?? 'N/A' }}

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                                <a
                                    href="{{ route(
                                        'teacher.subjects.show',
                                        $subject->subject_id
                                    ) }}"
                                    class="view-button"
                                >

                                    <i class="bi bi-eye"></i>

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div
                    class="no-results"
                    id="noResults"
                >
                    No subjects found.
                </div>

            @else

                <div class="empty-state">

                    <div class="empty-state-icon">

                        <i class="bi bi-book"></i>

                    </div>

                    <h6>
                        No Subjects Assigned
                    </h6>

                    <p>
                        You currently have no subjects assigned to your classes.
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

    const subjectSearch =
        document.getElementById("subjectSearch");

    const subjectItems =
        document.querySelectorAll(".subject-item");

    const noResults =
        document.getElementById("noResults");

    if (subjectSearch) {

        subjectSearch.addEventListener(
            "input",
            function () {

                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();

                let visibleCount = 0;

                subjectItems.forEach(
                    function (item) {

                        const searchText =
                            (
                                item.getAttribute("data-search") || ""
                            )
                            .toLowerCase();

                        const matches =
                            searchText.includes(keyword);

                        if (matches) {

                            item.style.display = "flex";

                            visibleCount++;

                        } else {

                            item.style.display = "none";

                        }

                    }
                );

                if (noResults) {

                    if (visibleCount === 0) {

                        noResults.style.display = "block";

                    } else {

                        noResults.style.display = "none";

                    }

                }

            }
        );

    }

</script>

</body>

</html>

