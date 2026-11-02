<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Attendance | SchoolSync</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

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
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .brand small {
            display: block;
            color: #7f90aa;
            font-size: 10px;
            margin-top: 2px;
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
            box-shadow: 0 7px 18px rgba(23,105,224,0.25);
        }

        .sidebar-footer {
            margin-top: 25px;
            padding-top: 15px;
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
            transition: all .25s ease;
            text-align: left;
        }

        .logout i {
            font-size: 18px;
        }

        .logout:hover {
            background: rgba(128,128,128,.08);
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
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0;
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 26px;
            font-weight: 800;
        }

        .page-header p {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .header-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--blue);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 10px 15px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .header-button:hover {
            background: var(--blue-dark);
            color: white;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: white;
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 10px 15px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .back-button:hover {
            background: var(--blue-light);
            border-color: #d6e5ff;
            color: var(--blue);
        }

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .form-header {
            padding: 20px;
            border-bottom: 1px solid var(--border);
        }

        .form-header h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .form-header span {
            display: block;
            margin-top: 4px;
            color: var(--muted);
            font-size: 11px;
        }

        .form-body {
            padding: 25px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .form-control,
        .form-select {
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 10px 12px;
            font-size: 12px;
            color: var(--text);
            box-shadow: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(23,105,224,.08);
        }

        .form-control[readonly] {
            background: #fafbfc;
            color: var(--muted);
        }

        .student-box {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 43px;
            padding: 7px 12px;
            background: #fafbfc;
            border: 1px solid var(--border);
            border-radius: 9px;
        }

        .student-avatar {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .student-name {
            font-size: 12px;
            font-weight: 700;
        }

        .student-code {
            color: var(--muted);
            font-size: 10px;
            margin-top: 2px;
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            padding: 18px 25px;
            border-top: 1px solid var(--border);
            background: #fafbfc;
        }

        .cancel-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: white;
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 10px 15px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }

        .cancel-button:hover {
            background: var(--blue-light);
            color: var(--blue);
            border-color: #d6e5ff;
        }

        .save-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: var(--blue);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 10px 16px;
            font-size: 12px;
            font-weight: 600;
            transition: .2s ease;
        }

        .save-button:hover {
            background: var(--blue-dark);
        }

        .alert {
            border-radius: 10px;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .invalid-feedback {
            font-size: 10px;
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
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .header-actions {
                width: 100%;
            }

            .back-button {
                width: 100%;
                justify-content: center;
            }

            .form-body {
                padding: 20px;
            }

            .form-footer {
                padding: 18px 20px;
            }
        }

        @media (max-width: 575px) {

            .profile-info {
                display: none;
            }

            .topbar-right {
                gap: 8px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .header-actions {
                flex-direction: column;
            }

            .back-button {
                width: 100%;
            }

            .form-footer {
                flex-direction: column-reverse;
            }

            .cancel-button,
            .save-button {
                width: 100%;
            }
        }

    </style>
</head>

<body>

@php

    $teacherName = Auth::user()->name ?? 'Teacher';

    $nameParts = explode(' ', trim($teacherName));

    $initials = '';

    foreach ($nameParts as $part) {

        if ($part !== '') {

            $initials .= strtoupper(substr($part, 0, 1));

        }

    }

    $initials = substr($initials, 0, 2);

    $studentName =
        $attendance->enrollment->student->full_name
        ?? ($attendance->enrollment->student->user->name ?? 'Unknown Student');

    $studentCode =
        $attendance->enrollment->student->student_code
        ?? $attendance->enrollment->student->student_id;

    $studentNameParts = explode(' ', trim($studentName));

    $studentInitials = '';

    foreach ($studentNameParts as $part) {

        if ($part !== '') {

            $studentInitials .= strtoupper(substr($part, 0, 1));

        }

    }

    $studentInitials = substr($studentInitials, 0, 2);

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

    <a href="{{ route('teacher.dashboard') }}" class="menu-link">

        <i class="bi bi-grid-1x2-fill"></i>

        Dashboard

    </a>

    <div class="menu-title">
        Teaching
    </div>

    <a href="{{ route('teacher.classes.index') }}" class="menu-link">

        <i class="bi bi-diagram-3"></i>

        Classes

    </a>

    <a href="{{ route('teacher.subjects.index') }}" class="menu-link">

        <i class="bi bi-book"></i>

        Subjects

    </a>

    <a href="{{ route('teacher.students.index') }}" class="menu-link">

        <i class="bi bi-mortarboard"></i>

        Students

    </a>

    <a href="{{ route('teacher.attendance.index') }}" class="menu-link active">

        <i class="bi bi-calendar-check"></i>

        Attendance

    </a>

    <div class="menu-title">
        Academic
    </div>

    <a href="{{ route('teacher.schedule.index') }}" class="menu-link">

        <i class="bi bi-calendar3"></i>

        Schedule

    </a>

    <div class="menu-title">
        Communication
    </div>

    <a href="{{ route('teacher.announcements.index') }}" class="menu-link">

        <i class="bi bi-megaphone"></i>

        Announcements

    </a>

    <div class="menu-title">
        Account
    </div>

    <a href="{{ route('teacher.profile.edit') }}" class="menu-link">

        <i class="bi bi-person-circle"></i>

        Profile

    </a>

    <div class="sidebar-footer">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="logout">

                <i class="bi bi-box-arrow-right"></i>

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
                    placeholder="Search students..."
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

                    {{ $initials ?: 'T' }}

                </div>

                <div class="profile-info">

                    <strong>
                        {{ $teacherName }}
                    </strong>

                    <span>
                        Teacher
                    </span>

                </div>

            </div>

        </div>

    </header>

    <section class="content">

        <div class="page-header">

            <div>

                <h1>
                    Edit Attendance
                </h1>

                <p>
                    Update the attendance record for this student.
                </p>

            </div>

            <div class="header-actions">

                <a
                    href="{{ route('teacher.attendance.show', $attendance->enrollment->enrollment_id) }}"
                    class="back-button"
                >

                    <i class="bi bi-arrow-left"></i>

                    Back to Attendance

                </a>

            </div>

        </div>

        @if($errors->any())

            <div class="alert alert-danger">

                <i class="bi bi-exclamation-circle me-1"></i>

                Please correct the errors below.

            </div>

        @endif

        <div class="form-card">

            <div class="form-header">

                <h5>
                    Attendance Information
                </h5>

                <span>
                    Edit the date and attendance status for this record.
                </span>

            </div>

            <form
                action="{{ route('teacher.attendance.update', $attendance->attendance_id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')

                <div class="form-body">

                    <div class="row g-4">

                        <div class="col-md-6">

                            <label class="form-label">
                                Student
                            </label>

                            <div class="student-box">

                                <div class="student-avatar">

                                    {{ $studentInitials ?: 'ST' }}

                                </div>

                                <div>

                                    <div class="student-name">
                                        {{ $studentName }}
                                    </div>

                                    <div class="student-code">
                                        ID: {{ $studentCode }}
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                Class
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $attendance->enrollment->classroom->class_name ?? 'N/A' }}"
                                readonly
                            >

                        </div>

                        <div class="col-md-6">

                            <label
                                for="date"
                                class="form-label"
                            >
                                Attendance Date
                            </label>

                            <input
                                type="date"
                                id="date"
                                name="date"
                                class="form-control @error('date') is-invalid @enderror"
                                value="{{ old('date', \Carbon\Carbon::parse($attendance->date)->format('Y-m-d')) }}"
                                required
                            >

                            @error('date')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                        <div class="col-md-6">

                            <label
                                for="status"
                                class="form-label"
                            >
                                Attendance Status
                            </label>

                            <select
                                id="status"
                                name="status"
                                class="form-select @error('status') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Select Status
                                </option>

                                <option
                                    value="Present"
                                    {{ old('status', $attendance->status) === 'Present' ? 'selected' : '' }}
                                >
                                    Present
                                </option>

                                <option
                                    value="Late"
                                    {{ old('status', $attendance->status) === 'Late' ? 'selected' : '' }}
                                >
                                    Late
                                </option>

                                <option
                                    value="Absent"
                                    {{ old('status', $attendance->status) === 'Absent' ? 'selected' : '' }}
                                >
                                    Absent
                                </option>

                            </select>

                            @error('status')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>

                <div class="form-footer">

                    <a
                        href="{{ route('teacher.attendance.show', $attendance->enrollment->enrollment_id) }}"
                        class="cancel-button"
                    >

                        <i class="bi bi-x-lg"></i>

                        Cancel

                    </a>

                    <button
                        type="submit"
                        class="save-button"
                    >

                        <i class="bi bi-check-lg"></i>

                        Update Attendance

                    </button>

                </div>

            </form>

        </div>

    </section>

</main>

<script>

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
