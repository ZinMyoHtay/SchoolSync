<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SchoolSync | Class Details</title>

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
       EXACT MAIN REFERENCE UI
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

        margin-left: 270px;

        min-height: 100vh;

    }


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


    .content {

        padding: 30px 32px;

    }


    .page-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 25px;

    }


    .page-title {

        font-size: 25px;

        font-weight: 800;

        margin-bottom: 5px;

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

        background: var(--blue);

        color: white;

        padding: 11px 17px;

        border-radius: 10px;

        font-size: 12px;

        font-weight: 600;

        border: none;

        transition: 0.2s ease;

    }


    .create-btn:hover {

        background: var(--blue-dark);

        color: white;

        transform: translateY(-1px);

    }


    .academic-card {

        background: white;

        border: 1px solid var(--border);

        border-radius: 14px;

        box-shadow: var(--shadow);

        overflow: hidden;

    }


    /* =========================
       SHOW PAGE CONTENT ONLY
    ========================== */

    .details-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        padding: 20px 22px;

        border-bottom: 1px solid var(--border);

    }


    .details-title {

        font-family: "Plus Jakarta Sans";

        font-size: 15px;

        font-weight: 700;

        margin: 0;

    }


    .details-subtitle {

        color: var(--muted);

        font-size: 11px;

        margin-top: 4px;

    }


    .details-body {

        padding: 22px;

    }


    .class-info {

        display: flex;

        align-items: center;

        gap: 14px;

        margin-bottom: 22px;

    }


    .class-avatar {

        width: 52px;

        height: 52px;

        border-radius: 12px;

        background: var(--blue-light);

        color: var(--blue);

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 21px;

        flex-shrink: 0;

    }


    .class-name {

        font-size: 17px;

        font-weight: 800;

    }


    .class-id {

        color: var(--muted);

        font-size: 10px;

        margin-top: 4px;

    }


    .info-grid {

        display: grid;

        grid-template-columns: repeat(4, 1fr);

        gap: 14px;

    }


    .info-item {

        background: #f8f9fc;

        border: 1px solid var(--border);

        border-radius: 10px;

        padding: 14px;

    }


    .info-label {

        color: var(--muted);

        font-size: 10px;

        text-transform: uppercase;

        letter-spacing: .6px;

        font-weight: 700;

        margin-bottom: 7px;

    }


    .info-value {

        font-size: 12px;

        font-weight: 600;

        color: var(--text);

    }


    .status-badge {

        display: inline-flex;

        align-items: center;

        gap: 6px;

        font-size: 10px;

        font-weight: 600;

    }


    .status-badge.active {

        color: var(--green);

    }


    .status-badge.inactive {

        color: var(--red);

    }


    .status-dot {

        width: 7px;

        height: 7px;

        border-radius: 50%;

    }


    .status-badge.active .status-dot {

        background: var(--green);

    }


    .status-badge.inactive .status-dot {

        background: var(--red);

    }


    .section-card {

        background: white;

        border: 1px solid var(--border);

        border-radius: 14px;

        box-shadow: var(--shadow);

        overflow: hidden;

        margin-top: 20px;

    }


    .section-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        padding: 20px 22px;

        border-bottom: 1px solid var(--border);

    }


    .section-title {

        font-family: "Plus Jakarta Sans";

        font-size: 15px;

        font-weight: 700;

        margin: 0;

    }


    .section-count {

        color: var(--muted);

        font-size: 11px;

    }


    .subject-grid {

        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 12px;

        padding: 20px 22px;

    }


    .subject-item {

        border: 1px solid var(--border);

        border-radius: 10px;

        padding: 14px;

        display: flex;

        align-items: center;

        gap: 11px;

    }


    .subject-icon {

        width: 38px;

        height: 38px;

        border-radius: 9px;

        background: var(--blue-light);

        color: var(--blue);

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

    }


    .subject-name {

        font-size: 12px;

        font-weight: 700;

    }


    .subject-code {

        color: var(--muted);

        font-size: 10px;

        margin-top: 3px;

    }


    .subject-teacher {

        color: var(--muted);

        font-size: 10px;

        margin-top: 4px;

    }


    .student-table {

        width: 100%;

        border-collapse: collapse;

        min-width: 700px;

    }


    .student-table thead th {

        background: #f8f9fc;

        color: var(--muted);

        font-size: 10px;

        text-transform: uppercase;

        letter-spacing: .7px;

        font-weight: 700;

        padding: 13px 18px;

        border-bottom: 1px solid var(--border);

        white-space: nowrap;

    }


    .student-table tbody td {

        padding: 15px 18px;

        border-bottom: 1px solid var(--border);

        vertical-align: middle;

        font-size: 12px;

    }


    .student-table tbody tr:last-child td {

        border-bottom: none;

    }


    .student-table tbody tr:hover {

        background: #fbfcfe;

    }


    .student-avatar {

        width: 35px;

        height: 35px;

        border-radius: 50%;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        background: linear-gradient(135deg,#d9e9ff,#edf5ff);

        color: var(--blue);

        font-size: 11px;

        font-weight: 800;

        margin-right: 9px;

    }


    .student-name {

        font-size: 12px;

        font-weight: 600;

    }


    .student-id {

        color: var(--muted);

        font-size: 10px;

        margin-top: 3px;

    }


    .empty-state {

        text-align: center;

        padding: 40px 20px;

        color: var(--muted);

        font-size: 12px;

    }


    .empty-state i {

        display: block;

        font-size: 32px;

        margin-bottom: 10px;

        opacity: .45;

    }


    .table-wrapper {

        width: 100%;

        overflow-x: auto;

    }


    /* =========================
       EXACT REFERENCE RESPONSIVE
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

        .info-grid {

            grid-template-columns: repeat(2, 1fr);

        }

        .subject-grid {

            grid-template-columns: repeat(2, 1fr);

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

    }


    @media (max-width: 767px) {

        .page-header {

            align-items: flex-start;

            flex-direction: column;

            gap: 15px;

        }

        .create-btn {

            width: 100%;

            justify-content: center;

        }

        .details-header {

            align-items: flex-start;

            flex-direction: column;

            gap: 12px;

        }

        .info-grid {

            grid-template-columns: 1fr;

        }

        .subject-grid {

            grid-template-columns: 1fr;

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

    }

</style>

</head>

<body>

<!-- =========================
     SAME SIDEBAR
========================== -->

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

    <div class="sidebar-section">
        Overview
    </div>

    <a href="{{ url('/admin/dashboard') }}" class="menu-link">

        <i class="bi bi-grid-1x2-fill"></i>

        Dashboard

    </a>


    <div class="sidebar-section">
        People
    </div>


    <a href="{{ route('admin.users.index') }}" class="menu-link">

        <i class="bi bi-person-gear"></i>

        User Management

    </a>


    <a href="{{ route('admin.departments.index') }}" class="menu-link">

        <i class="bi bi-building"></i>

        Departments

    </a>


    <div class="sidebar-section">
        Academic
    </div>


    <a href="{{ route('admin.academic-years.index') }}" class="menu-link">

        <i class="bi bi-calendar3"></i>

        Academic Years

    </a>


    <a href="{{ route('admin.classes.index') }}" class="menu-link active">

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


<div class="sidebar-footer">

    <form action="{{ route('logout') }}" method="POST">

        @csrf

        <button type="submit" class="logout">

            <i class="bi bi-arrow-left"></i>

            <span>
                Logout
            </span>

        </button>

    </form>

</div>

</aside>

<!-- =========================
     SAME TOPBAR
========================== -->

<main class="main">

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

</header>


<!-- =========================
     SHOW CONTENT
========================== -->

<section class="content">


    <div class="page-header">

        <div>

            <h1 class="page-title">
                Class Details
            </h1>

            <p class="page-subtitle">
                View classroom information, subjects and enrolled students.
            </p>

        </div>


        <div class="d-flex gap-2">

            <a
                href="{{ route('admin.classes.index') }}"
                class="create-btn"
                style="background:#f8f9fc;color:var(--text);border:1px solid var(--border);"
            >

                <i class="bi bi-arrow-left"></i>

                Back

            </a>


            <a
                href="{{ route('admin.classes.edit', $classroom->class_id) }}"
                class="create-btn"
            >

                <i class="bi bi-pencil"></i>

                Edit Class

            </a>

        </div>

    </div>


    <!-- =========================
         CLASS INFORMATION
    ========================== -->

    @php
        $assignedTeachers = $classroom->classSubjects
            ->filter(function ($classSubject) {
                return $classSubject->teacher && $classSubject->teacher->staff;
            })
            ->map(function ($classSubject) {
                return $classSubject->teacher;
            })
            ->unique('teacher_id')
            ->values();

        $groupedSubjects = $classroom->classSubjects->groupBy('subject_id');
    @endphp


    <div class="academic-card">

        <div class="details-header">

            <div>

                <h3 class="details-title">
                    Class Information
                </h3>

                <div class="details-subtitle">
                    Details for this classroom
                </div>

            </div>


            @if($classroom->status === 'active')

                <span class="status-badge active">

                    <span class="status-dot"></span>

                    Active

                </span>

            @else

                <span class="status-badge inactive">

                    <span class="status-dot"></span>

                    Inactive

                </span>

            @endif

        </div>


        <div class="details-body">

            <div class="class-info">

                <div class="class-avatar">

                    <i class="bi bi-diagram-3"></i>

                </div>


                <div>

                    <div class="class-name">

                        {{ $classroom->class_name }}

                    </div>


                    <div class="class-id">

                        Class ID: {{ $classroom->class_id }}

                    </div>

                </div>

            </div>


            <div class="info-grid">


                <div class="info-item">

                    <div class="info-label">
                        Academic Year
                    </div>

                    <div class="info-value">

                        @if($classroom->academicYear)

                            {{ \Carbon\Carbon::parse($classroom->academicYear->start_date)->format('Y') }}-{{ \Carbon\Carbon::parse($classroom->academicYear->end_date)->format('Y') }}

                        @else

                            Not assigned

                        @endif

                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Class Teacher
                    </div>

                  <div class="info-value">
    @if($assignedTeachers->count() > 0)
        @foreach($assignedTeachers as $teacher)
            @if($teacher->staff)
                <div>
                    {{ $teacher->staff->full_name }}
                </div>
            @endif
        @endforeach
    @else
        Not assigned
    @endif
</div>

</div>


                <div class="info-item">

                    <div class="info-label">
                        Students
                    </div>

                    <div class="info-value">

                        {{ $classroom->enrollments->count() }}

                    </div>

                </div>


                <div class="info-item">

                    <div class="info-label">
                        Status
                    </div>

                    <div class="info-value">

                        @if($classroom->status === 'active')

                            <span class="status-badge active">

                                <span class="status-dot"></span>

                                Active

                            </span>

                        @else

                            <span class="status-badge inactive">

                                <span class="status-dot"></span>

                                Inactive

                            </span>

                        @endif

                    </div>

                </div>


            </div>

        </div>

    </div>


    <!-- =========================
         ASSIGNED SUBJECTS
    ========================== -->

    <div class="section-card">

        <div class="section-header">

            <h3 class="section-title">
                Assigned Subjects
            </h3>


            <span class="section-count">

                {{ $groupedSubjects->count() }}

                {{ $groupedSubjects->count() === 1 ? 'subject' : 'subjects' }}

            </span>

        </div>


        @if($groupedSubjects->count() > 0)

            <div class="subject-grid">

                @foreach($groupedSubjects as $subjectId => $subjectAssignments)

                    @php
                        $firstAssignment = $subjectAssignments->first();
                    @endphp

                    <div class="subject-item">

                        <div class="subject-icon">

                            <i class="bi bi-book"></i>

                        </div>


                        <div>

                            <div class="subject-name">

                                {{ $firstAssignment->subject->subject_name ?? 'Unknown Subject' }}

                            </div>


                            <div class="subject-code">

                                Code:

                                {{ $firstAssignment->subject->subject_code ?? 'N/A' }}

                            </div>


                            @foreach($subjectAssignments as $classSubject)

                                @php
                                    $totalDays = null;

                                    if ($classSubject->start_date && $classSubject->end_date) {
                                        $totalDays =
                                            \Carbon\Carbon::parse($classSubject->start_date)
                                                ->diffInDays(
                                                    \Carbon\Carbon::parse($classSubject->end_date)
                                                ) + 1;
                                    }
                                @endphp


                                <div class="subject-teacher">

                                    <i class="bi bi-person"></i>

                                    @if($classSubject->teacher && $classSubject->teacher->staff)

                                        {{ $classSubject->teacher->staff->full_name }}

                                    @else

                                        Not assigned

                                    @endif

                                </div>


                                @if($classSubject->start_date && $classSubject->end_date)

                                    <div class="subject-teacher">

                                        <i class="bi bi-calendar3"></i>

                                        {{ \Carbon\Carbon::parse($classSubject->start_date)->format('d M Y') }}

                                        -

                                        {{ \Carbon\Carbon::parse($classSubject->end_date)->format('d M Y') }}

                                        |

                                        {{ $totalDays }}

                                        {{ $totalDays === 1 ? 'Day' : 'Days' }}

                                    </div>

                                @else

                                    <div class="subject-teacher">

                                        <i class="bi bi-calendar3"></i>

                                        Duration not set

                                    </div>

                                @endif

                            @endforeach

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-state">

                <i class="bi bi-book"></i>

                No subjects assigned to this class.

            </div>

        @endif

    </div>


    <!-- =========================
         ENROLLED STUDENTS
    ========================== -->

    <div class="section-card">

        <div class="section-header">

            <h3 class="section-title">
                Enrolled Students
            </h3>


            <span class="section-count">

                {{ $classroom->enrollments->count() }}

                {{ $classroom->enrollments->count() === 1 ? 'student' : 'students' }}

            </span>

        </div>


        @if($classroom->enrollments->count() > 0)

            <div class="table-wrapper">

                <table class="student-table">

                    <thead>

                        <tr>

                            <th>
                                Student
                            </th>

                            <th>
                                Student ID
                            </th>

                            <th>
                                Enrollment Date
                            </th>

                            <th>
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($classroom->enrollments as $enrollment)

                            <tr>

                                <td>

                                    <div class="d-flex align-items-center">

                                        <div class="student-avatar">

                                            {{ strtoupper(
                                                substr(
                                                    $enrollment->student->user->name ?? 'S',
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>


                                        <div>

                                            <div class="student-name">

                                                {{ $enrollment->student->user->name
                                                    ?? 'Unknown Student' }}

                                            </div>


                                            <div class="student-id">

                                                Student ID:
                                                {{ $enrollment->student->student_id ?? 'N/A' }}

                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    {{ $enrollment->student->student_id ?? 'N/A' }}

                                </td>


                                <td>

                                    @if($enrollment->enrollment_date)

                                        {{ \Carbon\Carbon::parse(
                                            $enrollment->enrollment_date
                                        )->format('d M Y') }}

                                    @else

                                        N/A

                                    @endif

                                </td>


                                <td>

                                    @if($enrollment->status === 'active')

                                        <span class="status-badge active">

                                            <span class="status-dot"></span>

                                            Active

                                        </span>

                                    @else

                                        <span class="status-badge inactive">

                                            <span class="status-dot"></span>

                                            Inactive

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty-state">

                <i class="bi bi-people"></i>

                No students enrolled in this class.

            </div>

        @endif

    </div>


</section>

</main>

<script>

    const mobileMenu = document.getElementById("mobileMenu");

    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {

        sidebar.classList.toggle("show");

    });

</script>

</body>

</html>

