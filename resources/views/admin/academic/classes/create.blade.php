<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Add Class</title>

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
           SIDEBAR
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

        /* =========================
           MAIN
        ========================== */

        .main {
            margin-left: 270px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================== */

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

        /* =========================
           CONTENT
        ========================== */

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

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            color: var(--text);
            padding: 11px 17px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid var(--border);
            transition: 0.2s ease;
        }

        .back-btn:hover {
            background: var(--blue-light);
            color: var(--blue);
            border-color: #c9ddfa;
        }

        /* =========================
           FORM CARD
        ========================== */

        .academic-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .form-header {
            padding: 20px 22px;
            border-bottom: 1px solid var(--border);
        }

        .form-title {
            font-family: "Plus Jakarta Sans";
            font-size: 15px;
            font-weight: 700;
            margin: 0;
        }

        .form-header-text {
            font-size: 11px;
            color: var(--muted);
            margin-top: 5px;
        }

        .form-body {
            padding: 24px 22px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 7px;
        }

        .required {
            color: var(--red);
        }

        .form-control,
        .form-select {
            width: 100%;
            height: 42px;
            border: 1px solid var(--border);
            background: #f8f9fc;
            border-radius: 9px;
            font-size: 12px;
            color: var(--text);
            outline: none;
            box-shadow: none;
        }

        .form-control {
            padding: 0 12px;
        }

        .form-select {
            padding: 0 12px;
        }

        .form-control:focus,
        .form-select:focus {
            background: white;
            border-color: #a9c7f5;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: #9aa5b5;
        }

        .form-hint {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-top: 6px;
        }

        .error-text {
            color: var(--red);
            font-size: 10px;
            margin-top: 5px;
        }

        .is-invalid {
            border-color: var(--red) !important;
        }

        /* =========================
           ASSIGNMENTS
        ========================== */

        .assignment-section {
            margin-top: 5px;
        }

        .assignment-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .assignment-title {
            font-size: 11px;
            font-weight: 700;
            color: var(--text);
        }

        .assignment-title .required {
            margin-left: 2px;
        }

        .assignment-description {
            font-size: 10px;
            color: var(--muted);
            margin-top: 4px;
        }

        .assignment-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .assignment-row {
            display: grid;

            /*
             * Teacher
             * Subject
             * Start Date
             * End Date
             * Total Days
             * Remove
             */

            grid-template-columns:
                minmax(0, 1.1fr)
                minmax(0, 1.1fr)
                minmax(0, 0.9fr)
                minmax(0, 0.9fr)
                minmax(0, 0.75fr)
                42px;

            gap: 10px;
            align-items: end;
            padding: 12px;
            background: #f8f9fc;
            border: 1px solid var(--border);
            border-radius: 10px;
        }

        .assignment-field label {
            display: block;
            font-size: 10px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 6px;
        }

        .assignment-field .form-select,
        .assignment-field .form-control {
            background: white;
        }

        .total-days-input {
            background: #eef5ff !important;
            color: var(--blue) !important;
            font-weight: 700;
            text-align: center;
            cursor: default;
        }

        .remove-assignment {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #f0d1d1;
            background: #fff5f5;
            color: var(--red);
            border-radius: 9px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .remove-assignment:hover {
            background: var(--red);
            color: white;
            border-color: var(--red);
        }

        .add-assignment-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 12px;
            padding: 9px 13px;
            border-radius: 9px;
            border: 1px dashed #b9c9df;
            background: var(--blue-light);
            color: var(--blue);
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .add-assignment-btn:hover {
            background: #e2efff;
            border-color: var(--blue);
        }

        .assignment-error {
            color: var(--red);
            font-size: 10px;
            margin-top: 8px;
        }

        /* =========================
           FORM FOOTER
        ========================== */

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            padding: 16px 22px;
            border-top: 1px solid var(--border);
            background: #fbfcfe;
        }

        .cancel-btn,
        .save-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .cancel-btn {
            background: white;
            color: var(--muted);
            border: 1px solid var(--border);
        }

        .cancel-btn:hover {
            color: var(--text);
            background: #f8f9fc;
        }

        .save-btn {
            background: var(--blue);
            color: white;
            border: none;
            cursor: pointer;
        }

        .save-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 1200px) {

            .assignment-row {
                grid-template-columns:
                    minmax(0, 1fr)
                    minmax(0, 1fr)
                    minmax(0, 0.8fr)
                    minmax(0, 0.8fr)
                    minmax(0, 0.7fr)
                    42px;
            }
        }

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

            .assignment-row {
                grid-template-columns:
                    minmax(0, 1fr)
                    minmax(0, 1fr)
                    minmax(0, 1fr)
                    minmax(0, 1fr)
                    42px;
            }

            .assignment-row .total-days-wrapper {
                grid-column: span 2;
            }

            .assignment-row .remove-assignment {
                grid-column: span 2;
                width: 100%;
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

            .assignment-row {
                grid-template-columns:
                    minmax(0, 1fr)
                    minmax(0, 1fr);
            }

            .assignment-row .total-days-wrapper,
            .assignment-row .remove-assignment {
                grid-column: auto;
            }

            .assignment-row .remove-assignment {
                width: 42px;
            }
        }

        @media (max-width: 767px) {

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .back-btn {
                width: 100%;
                justify-content: center;
            }

            .assignment-row {
                grid-template-columns: 1fr;
            }

            .assignment-row .total-days-wrapper {
                grid-column: auto;
            }

            .remove-assignment {
                width: 100% !important;
            }

            .form-footer {
                align-items: stretch;
                flex-direction: column;
            }

            .cancel-btn,
            .save-btn {
                width: 100%;
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

        <a
            href="{{ url('/admin/dashboard') }}"
            class="menu-link"
        >
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>

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
            class="menu-link active"
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
            Announcements
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

<main class="main">

    <header class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button
                class="mobile-btn"
                id="mobileMenu"
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

            <a
                href="#"
                class="top-icon"
            >
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

                <i class="bi bi-chevron-down text-muted small"></i>

            </div>

        </div>

    </header>

    <section class="content">

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Add Class
                </h1>

                <p class="page-subtitle">
                    Create a new classroom and assign its academic year, teachers and subjects.
                </p>

            </div>

            <a
                href="{{ route('admin.classes.index') }}"
                class="back-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Back to Classes
            </a>

        </div>

        <div class="academic-card">

            <div class="form-header">

                <h3 class="form-title">
                    Class Information
                </h3>

                <div class="form-header-text">
                    Enter the information below to create a new classroom.
                </div>

            </div>

            <form
                action="{{ route('admin.classes.store') }}"
                method="POST"
            >

                @csrf

                <div class="form-body">

                    <div class="row g-4">

                        {{-- CLASS NAME --}}

                        <div class="col-lg-6">

                            <label
                                for="class_name"
                                class="form-label"
                            >
                                Class Name
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="class_name"
                                name="class_name"
                                class="form-control @error('class_name') is-invalid @enderror"
                                value="{{ old('class_name') }}"
                                placeholder="e.g. Grade 10 - A"
                                required
                            >

                            @error('class_name')

                                <div class="error-text">
                                    {{ $message }}
                                </div>

                            @enderror

                            <small class="form-hint">
                                Enter a unique class name for the selected academic year.
                            </small>

                        </div>

                        {{-- ACADEMIC YEAR --}}

                        <div class="col-lg-6">

                            <label
                                for="year_id"
                                class="form-label"
                            >
                                Academic Year
                                <span class="required">*</span>
                            </label>

                            <select
                                id="year_id"
                                name="year_id"
                                class="form-select @error('year_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Select academic year
                                </option>

                                @foreach($academicYears as $year)

                                    <option
                                        value="{{ $year->academic_year_id }}"
                                        {{ old('year_id') == $year->academic_year_id ? 'selected' : '' }}
                                    >
                                        {{ \Carbon\Carbon::parse($year->start_date)->format('Y') }}
                                        -
                                        {{ \Carbon\Carbon::parse($year->end_date)->format('Y') }}
                                    </option>

                                @endforeach

                            </select>

                            @error('year_id')

                                <div class="error-text">
                                    {{ $message }}
                                </div>

                            @enderror

                            <small class="form-hint">
                                Select the academic year for this class.
                            </small>

                        </div>

                        {{-- TEACHER + SUBJECT ASSIGNMENTS --}}

                        <div class="col-12">

                            <div class="assignment-section">

                                <div class="assignment-header">

                                    <div>

                                        <div class="assignment-title">
                                            Teacher & Subject Assignments
                                            <span class="required">*</span>
                                        </div>

                                        <div class="assignment-description">
                                            Assign one or more teachers to subjects. Each teacher-subject assignment can have its own start date, end date and total duration.
                                        </div>

                                    </div>

                                </div>

                                <div
                                    id="assignmentList"
                                    class="assignment-list"
                                >

                                    @php
                                        $oldAssignments = old('assignments', [
                                            [
                                                'teacher_id' => '',
                                                'subject_id' => '',
                                                'start_date' => '',
                                                'end_date' => '',
                                            ]
                                        ]);
                                    @endphp

                                    @foreach($oldAssignments as $index => $assignment)

                                        @php
                                            $startDate = $assignment['start_date'] ?? '';
                                            $endDate = $assignment['end_date'] ?? '';

                                            $totalDays = '';

                                            if ($startDate && $endDate) {
                                                try {
                                                    $start = \Carbon\Carbon::parse($startDate);
                                                    $end = \Carbon\Carbon::parse($endDate);

                                                    if ($end->greaterThanOrEqualTo($start)) {
                                                        $totalDays = $start->diffInDays($end) + 1;
                                                    }
                                                } catch (\Exception $e) {
                                                    $totalDays = '';
                                                }
                                            }
                                        @endphp

                                        <div class="assignment-row">

                                            {{-- TEACHER --}}

                                            <div class="assignment-field">

                                                <label>
                                                    Teacher
                                                    <span class="required">*</span>
                                                </label>

                                                <select
                                                    name="assignments[{{ $index }}][teacher_id]"
                                                    class="form-select @error('assignments.' . $index . '.teacher_id') is-invalid @enderror"
                                                    required
                                                >

                                                    <option value="">
                                                        Select teacher
                                                    </option>

                                                    @foreach($teachers as $teacher)

                                                        <option
                                                            value="{{ $teacher->teacher_id }}"
                                                            {{ ($assignment['teacher_id'] ?? '') == $teacher->teacher_id ? 'selected' : '' }}
                                                        >
                                                            {{ $teacher->staff->full_name ?? 'Teacher #' . $teacher->teacher_id }}
                                                        </option>

                                                    @endforeach

                                                </select>

                                                @error('assignments.' . $index . '.teacher_id')

                                                    <div class="error-text">
                                                        {{ $message }}
                                                    </div>

                                                @enderror

                                            </div>

                                            {{-- SUBJECT --}}

                                            <div class="assignment-field">

                                                <label>
                                                    Subject
                                                    <span class="required">*</span>
                                                </label>

                                                <select
                                                    name="assignments[{{ $index }}][subject_id]"
                                                    class="form-select @error('assignments.' . $index . '.subject_id') is-invalid @enderror"
                                                    required
                                                >

                                                    <option value="">
                                                        Select subject
                                                    </option>

                                                    @foreach($subjects as $subject)

                                                        <option
                                                            value="{{ $subject->subject_id }}"
                                                            {{ ($assignment['subject_id'] ?? '') == $subject->subject_id ? 'selected' : '' }}
                                                        >
                                                            {{ $subject->subject_name }}
                                                        </option>

                                                    @endforeach

                                                </select>

                                                @error('assignments.' . $index . '.subject_id')

                                                    <div class="error-text">
                                                        {{ $message }}
                                                    </div>

                                                @enderror

                                            </div>

                                            {{-- START DATE --}}

                                            <div class="assignment-field">

                                                <label>
                                                    Start Date
                                                    <span class="required">*</span>
                                                </label>

                                                <input
                                                    type="date"
                                                    name="assignments[{{ $index }}][start_date]"
                                                    class="form-control assignment-start-date @error('assignments.' . $index . '.start_date') is-invalid @enderror"
                                                    value="{{ $startDate }}"
                                                    required
                                                >

                                                @error('assignments.' . $index . '.start_date')

                                                    <div class="error-text">
                                                        {{ $message }}
                                                    </div>

                                                @enderror

                                            </div>

                                            {{-- END DATE --}}

                                            <div class="assignment-field">

                                                <label>
                                                    End Date
                                                    <span class="required">*</span>
                                                </label>

                                                <input
                                                    type="date"
                                                    name="assignments[{{ $index }}][end_date]"
                                                    class="form-control assignment-end-date @error('assignments.' . $index . '.end_date') is-invalid @enderror"
                                                    value="{{ $endDate }}"
                                                    required
                                                >

                                                @error('assignments.' . $index . '.end_date')

                                                    <div class="error-text">
                                                        {{ $message }}
                                                    </div>

                                                @enderror

                                            </div>

                                            {{-- TOTAL DAYS --}}

                                            <div class="assignment-field total-days-wrapper">

                                                <label>
                                                    Total Days
                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control total-days-input"
                                                    value="{{ $totalDays ? $totalDays . ' Days' : '-' }}"
                                                    placeholder="-"
                                                    readonly
                                                >

                                            </div>

                                            {{-- REMOVE --}}

                                            <button
                                                type="button"
                                                class="remove-assignment"
                                                title="Remove assignment"
                                                onclick="removeAssignment(this)"
                                            >
                                                <i class="bi bi-trash3"></i>
                                            </button>

                                        </div>

                                    @endforeach

                                </div>

                                <button
                                    type="button"
                                    id="addAssignment"
                                    class="add-assignment-btn"
                                >
                                    <i class="bi bi-plus-lg"></i>
                                    Add Teacher & Subject
                                </button>

                                @error('assignments')

                                    <div class="assignment-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                                @error('assignments.*')

                                    <div class="assignment-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                                <small class="form-hint">
                                    Example: Mathematics can be assigned to Teacher A and Teacher B with different teaching periods.
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="form-footer">

                    <a
                        href="{{ route('admin.classes.index') }}"
                        class="cancel-btn"
                    >
                        <i class="bi bi-x-lg"></i>
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="save-btn"
                    >
                        <i class="bi bi-check-lg"></i>
                        Create Class
                    </button>

                </div>

            </form>

        </div>

    </section>

</main>

<script>

    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {
        sidebar.classList.toggle("show");
    });


    /*
    |--------------------------------------------------------------------------
    | ASSIGNMENT INDEX
    |--------------------------------------------------------------------------
    */

    const assignmentList =
        document.getElementById("assignmentList");

    const addAssignmentButton =
        document.getElementById("addAssignment");

    let assignmentIndex =
        document.querySelectorAll(".assignment-row").length;


    /*
    |--------------------------------------------------------------------------
    | CALCULATE TOTAL DAYS
    |--------------------------------------------------------------------------
    */

    function calculateTotalDays(row) {

        const startInput =
            row.querySelector(".assignment-start-date");

        const endInput =
            row.querySelector(".assignment-end-date");

        const totalDaysInput =
            row.querySelector(".total-days-input");

        if (!startInput || !endInput || !totalDaysInput) {
            return;
        }

        const startValue = startInput.value;
        const endValue = endInput.value;

        /*
        | No dates selected
        */

        if (!startValue || !endValue) {

            totalDaysInput.value = "-";

            endInput.setCustomValidity("");

            return;
        }

        /*
        | Convert YYYY-MM-DD into local dates
        */

        const startParts =
            startValue.split("-").map(Number);

        const endParts =
            endValue.split("-").map(Number);

        const startDate = new Date(
            startParts[0],
            startParts[1] - 1,
            startParts[2]
        );

        const endDate = new Date(
            endParts[0],
            endParts[1] - 1,
            endParts[2]
        );

        /*
        | Invalid dates
        */

        if (
            isNaN(startDate.getTime()) ||
            isNaN(endDate.getTime())
        ) {

            totalDaysInput.value = "-";

            endInput.setCustomValidity("");

            return;
        }

        /*
        | End date before start date
        */

        if (endDate < startDate) {

            totalDaysInput.value = "-";

            endInput.setCustomValidity(
                "End Date must be on or after Start Date."
            );

            return;
        }

        /*
        | Valid date range
        |
        | +1 means both start and end dates
        | are included.
        */

        const difference =
            endDate.getTime() - startDate.getTime();

        const totalDays =
            Math.floor(
                difference / (1000 * 60 * 60 * 24)
            ) + 1;

        totalDaysInput.value =
            totalDays + " Days";

        endInput.setCustomValidity("");
    }


    /*
    |--------------------------------------------------------------------------
    | ATTACH DATE EVENTS
    |--------------------------------------------------------------------------
    */

    function attachDateEvents(row) {

        const startInput =
            row.querySelector(".assignment-start-date");

        const endInput =
            row.querySelector(".assignment-end-date");

        if (startInput) {

            startInput.addEventListener(
                "change",
                function () {

                    updateEndDateMinimum(row);

                    calculateTotalDays(row);
                }
            );

        }

        if (endInput) {

            endInput.addEventListener(
                "change",
                function () {

                    calculateTotalDays(row);
                }
            );

        }

        /*
        | Calculate existing values on page load
        */

        calculateTotalDays(row);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE MINIMUM END DATE
    |--------------------------------------------------------------------------
    */

    function updateEndDateMinimum(row) {

        const startInput =
            row.querySelector(".assignment-start-date");

        const endInput =
            row.querySelector(".assignment-end-date");

        if (!startInput || !endInput) {
            return;
        }

        if (startInput.value) {

            endInput.min =
                startInput.value;

            /*
            | If current end date is before
            | start date, clear it.
            */

            if (
                endInput.value &&
                endInput.value < startInput.value
            ) {

                endInput.value = "";

            }

        } else {

            endInput.removeAttribute("min");

        }
    }


    /*
    |--------------------------------------------------------------------------
    | INITIALIZE EXISTING ROWS
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(".assignment-row")
        .forEach(function (row) {

            attachDateEvents(row);

            updateEndDateMinimum(row);

        });


    /*
    |--------------------------------------------------------------------------
    | ADD TEACHER + SUBJECT ASSIGNMENT
    |--------------------------------------------------------------------------
    */

    addAssignmentButton.addEventListener(
        "click",
        function () {

            const row =
                document.createElement("div");

            row.className =
                "assignment-row";

            row.innerHTML = `

                <div class="assignment-field">

                    <label>
                        Teacher
                        <span class="required">*</span>
                    </label>

                    <select
                        name="assignments[${assignmentIndex}][teacher_id]"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Select teacher
                        </option>

                        @foreach($teachers as $teacher)

                            <option value="{{ $teacher->teacher_id }}">
                                {{ $teacher->staff->full_name ?? 'Teacher #' . $teacher->teacher_id }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="assignment-field">

                    <label>
                        Subject
                        <span class="required">*</span>
                    </label>

                    <select
                        name="assignments[${assignmentIndex}][subject_id]"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Select subject
                        </option>

                        @foreach($subjects as $subject)

                            <option value="{{ $subject->subject_id }}">
                                {{ $subject->subject_name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="assignment-field">

                    <label>
                        Start Date
                        <span class="required">*</span>
                    </label>

                    <input
                        type="date"
                        name="assignments[${assignmentIndex}][start_date]"
                        class="form-control assignment-start-date"
                        required
                    >

                </div>


                <div class="assignment-field">

                    <label>
                        End Date
                        <span class="required">*</span>
                    </label>

                    <input
                        type="date"
                        name="assignments[${assignmentIndex}][end_date]"
                        class="form-control assignment-end-date"
                        required
                    >

                </div>


                <div class="assignment-field total-days-wrapper">

                    <label>
                        Total Days
                    </label>

                    <input
                        type="text"
                        class="form-control total-days-input"
                        value="-"
                        placeholder="-"
                        readonly
                    >

                </div>


                <button
                    type="button"
                    class="remove-assignment"
                    title="Remove assignment"
                    onclick="removeAssignment(this)"
                >
                    <i class="bi bi-trash3"></i>
                </button>

            `;

            assignmentList.appendChild(row);

            attachDateEvents(row);

            updateEndDateMinimum(row);

            assignmentIndex++;

        }
    );


    /*
    |--------------------------------------------------------------------------
    | REMOVE ASSIGNMENT
    |--------------------------------------------------------------------------
    */

    function removeAssignment(button) {

        const rows =
            assignmentList.querySelectorAll(
                ".assignment-row"
            );

        /*
        | Keep at least one assignment row.
        */

        if (rows.length <= 1) {

            const row =
                button.closest(".assignment-row");

            row
                .querySelectorAll(
                    "select, input[type='date']"
                )
                .forEach(function (input) {

                    input.value = "";

                });

            const totalDaysInput =
                row.querySelector(
                    ".total-days-input"
                );

            if (totalDaysInput) {

                totalDaysInput.value = "-";

            }

            return;
        }

        button
            .closest(".assignment-row")
            .remove();
    }

</script>

</body>

</html>
