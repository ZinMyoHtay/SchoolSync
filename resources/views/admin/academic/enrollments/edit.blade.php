<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Enrollment | SchoolSync</title>

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


        .back-btn {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding:
                11px 17px;

            border:
                1px solid var(--border);

            border-radius: 10px;

            background: white;

            color: var(--text);

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s ease;
        }


        .back-btn:hover {
            color: var(--blue);

            background:
                var(--blue-light);

            border-color:
                #cfe0fb;
        }


        /* =====================================================
           FORM CARD
        ====================================================== */

        .form-card {
            background: white;

            border:
                1px solid var(--border);

            border-radius: 14px;

            box-shadow: var(--shadow);

            overflow: hidden;
        }


        .form-header {
            padding:
                22px 26px;

            border-bottom:
                1px solid var(--border);
        }


        .form-title {
            margin: 0;

            font-size: 18px;

            font-weight: 700;

            color: var(--text);
        }


        .form-description {
            margin:
                5px 0 0;

            color: var(--muted);

            font-size: 13px;
        }


        .form-body {
            padding:
                28px 26px;
        }


        /* =====================================================
           FORM GROUPS
        ====================================================== */

        .form-group {
            margin-bottom: 22px;
        }


        .form-label {
            display: block;

            margin-bottom: 8px;

            font-size: 13px;

            font-weight: 700;

            color: var(--text);
        }


        .required {
            color: var(--red);
        }


        .form-control,
        .form-select {
            width: 100%;

            height: 46px;

            border:
                1px solid var(--border);

            border-radius: 10px;

            padding:
                0 14px;

            font-size: 13px;

            color: var(--text);

            background: #f8f9fc;

            outline: none;

            transition: 0.2s ease;
        }


        .form-control:focus,
        .form-select:focus {
            background: white;

            border-color:
                #a9c7f5;

            box-shadow:
                0 0 0 3px
                rgba(23,105,224,0.08);
        }


        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color:
                var(--red);
        }


        .form-help {
            margin-top: 7px;

            font-size: 11px;

            color: var(--muted);
        }


        .invalid-feedback {
            font-size: 11px;
        }


        /* =====================================================
           READ ONLY ENROLLMENT ID
        ====================================================== */

        .readonly-field {
            height: 46px;

            display: flex;

            align-items: center;

            padding:
                0 14px;

            border:
                1px solid var(--border);

            border-radius: 10px;

            background: #f3f5f8;

            color: var(--muted);

            font-size: 13px;

            font-weight: 600;
        }


        /* =====================================================
           STATUS INFO
        ====================================================== */

        .current-status {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding:
                7px 12px;

            border-radius: 30px;

            font-size: 11px;

            font-weight: 700;
        }


        .current-status::before {
            content: "";

            width: 6px;
            height: 6px;

            border-radius: 50%;
        }


        .current-status.active {
            background: #eaf8f2;

            color: #147a4e;
        }


        .current-status.active::before {
            background: var(--green);
        }


        .current-status.inactive {
            background: #fff0f0;

            color: #c53d3d;
        }


        .current-status.inactive::before {
            background: var(--red);
        }


        .status-note {
            margin-top: 8px;

            font-size: 11px;

            color: var(--muted);
        }


        /* =====================================================
           FORM FOOTER
        ====================================================== */

        .form-footer {
            padding:
                20px 26px;

            border-top:
                1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 10px;
        }


        .cancel-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            height: 44px;

            padding:
                0 18px;

            border:
                1px solid var(--border);

            border-radius: 10px;

            background: white;

            color: var(--text);

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s ease;
        }


        .cancel-btn:hover {
            background: #f8f9fc;

            color: var(--text);
        }


        .update-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            height: 44px;

            padding:
                0 20px;

            border: none;

            border-radius: 10px;

            background: var(--blue);

            color: white;

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s ease;

            box-shadow:
                0 6px 15px
                rgba(23,105,224,0.20);
        }


        .update-btn:hover {
            background: var(--blue-dark);

            color: white;

            transform:
                translateY(-1px);
        }


        /* =====================================================
           ERROR ALERT
        ====================================================== */

        .alert-danger {
            border: none;

            background: #fff0f0;

            color: #c53d3d;

            border-radius: 10px;

            font-size: 13px;

            padding: 14px 16px;

            margin-bottom: 22px;
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

            .back-btn {
                width: 100%;

                justify-content: center;
            }

            .form-body {
                padding:
                    22px 18px;
            }

            .form-footer {
                padding:
                    18px;

                flex-direction: column-reverse;

                align-items: stretch;
            }

            .cancel-btn,
            .update-btn {
                width: 100%;
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
                    Edit Enrollment
                </h1>

                <p class="page-subtitle">
                    Update the student, class, or enrollment date.
                </p>

            </div>


            <a
                href="{{ route('admin.enrollments.index') }}"
                class="back-btn"
            >

                <i class="bi bi-arrow-left"></i>

                Back to Enrollments

            </a>

        </div>



        <!-- =================================================
             ERRORS
        ================================================== -->

        @if($errors->any())

            <div
                class="alert alert-danger"
                role="alert"
            >

                <div class="fw-bold mb-2">
                    Please fix the following:
                </div>

                <ul class="mb-0 ps-3">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <!-- =================================================
             FORM CARD
        ================================================== -->

        <div class="form-card">


            <!-- FORM HEADER -->

            <div class="form-header">

                <h3 class="form-title">
                    Enrollment Information
                </h3>

                <p class="form-description">
                    Update the enrollment details below.
                </p>

            </div>



            <!-- FORM -->

            <form
                action="{{ route('admin.enrollments.update', $enrollment->enrollment_id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <div class="form-body">


                    <!-- =====================================
                         ENROLLMENT ID
                    ====================================== -->

                    <div class="form-group">

                        <label class="form-label">
                            Enrollment ID
                        </label>

                        <div class="readonly-field">

                            #{{ $enrollment->enrollment_id }}

                        </div>

                        <div class="form-help">
                            Enrollment ID is generated automatically and cannot be changed.
                        </div>

                    </div>



                    <!-- =====================================
                         STUDENT
                    ====================================== -->

                    <div class="form-group">

                        <label
                            for="student_id"
                            class="form-label"
                        >

                            Student

                            <span class="required">
                                *
                            </span>

                        </label>


                        <select
                            name="student_id"
                            id="student_id"
                            class="form-select @error('student_id') is-invalid @enderror"
                            required
                        >

                            <option value="">
                                Select Student
                            </option>


                            @foreach($students as $student)

                                <option
                                    value="{{ $student->student_id }}"
                                    {{ old('student_id', $enrollment->student_id) == $student->student_id ? 'selected' : '' }}
                                >

                                    {{ $student->full_name }}

                                    —
                                    {{ $student->student_code }}

                                </option>

                            @endforeach

                        </select>


                        @error('student_id')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>



                    <!-- =====================================
                         CLASS
                    ====================================== -->

                    <div class="form-group">

                        <label
                            for="class_id"
                            class="form-label"
                        >

                            Class

                            <span class="required">
                                *
                            </span>

                        </label>


                        <select
                            name="class_id"
                            id="class_id"
                            class="form-select @error('class_id') is-invalid @enderror"
                            required
                        >

                            <option value="">
                                Select Class
                            </option>


                            @foreach($classrooms as $classroom)

                                <option
                                    value="{{ $classroom->class_id }}"
                                    {{ old('class_id', $enrollment->class_id) == $classroom->class_id ? 'selected' : '' }}
                                >

                                    {{ $classroom->class_name }}

                                    @if($classroom->academicYear)
                                        — {{ $classroom->academicYear->year_name }}
                                    @endif

                                </option>

                            @endforeach

                        </select>


                        @error('class_id')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror


                        <div class="form-help">
                            Only active classes are available for selection.
                        </div>

                    </div>



                    <!-- =====================================
                         ENROLLMENT DATE
                    ====================================== -->

                    <div class="form-group">

                        <label
                            for="enrollment_date"
                            class="form-label"
                        >

                            Enrollment Date

                            <span class="required">
                                *
                            </span>

                        </label>


                        <input
                            type="date"
                            name="enrollment_date"
                            id="enrollment_date"
                            class="form-control @error('enrollment_date') is-invalid @enderror"
                            value="{{ old('enrollment_date', $enrollment->enrollment_date ? $enrollment->enrollment_date->format('Y-m-d') : '') }}"
                            required
                        >


                        @error('enrollment_date')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror


                        <div class="form-help">
                            The enrollment date cannot be after the selected academic year's end date.
                        </div>

                    </div>



                    <!-- =====================================
                         CURRENT STATUS
                    ====================================== -->

                    <div class="form-group mb-0">

                        <label class="form-label">
                            Current Status
                        </label>


                        @if($enrollment->status === 'active')

                            <span class="current-status active">
                                Active
                            </span>

                        @else

                            <span class="current-status inactive">
                                Inactive
                            </span>

                        @endif


                        <div class="status-note">
                            Enrollment status is changed from the Enrollment Management page using the Activate/Deactivate action.
                        </div>

                    </div>


                </div>



                <!-- =========================================
                     FORM FOOTER
                ========================================== -->

                <div class="form-footer">


                    <a
                        href="{{ route('admin.enrollments.index') }}"
                        class="cancel-btn"
                    >

                        <i class="bi bi-x-lg"></i>

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="update-btn"
                    >

                        <i class="bi bi-check2"></i>

                        Update Enrollment

                    </button>


                </div>


            </form>

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