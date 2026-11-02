<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Profile | SchoolSync</title>

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

            background: rgba(255, 255, 255, 0.07);
        }


        .menu-link.active {
            color: white;

            background: var(--blue);

            box-shadow:
                0 7px 18px rgba(23, 105, 224, 0.25);
        }


        /* =====================================
           SIDEBAR FOOTER
        ===================================== */

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
           WELCOME
        ===================================== */

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
           PROFILE CARDS
        ===================================== */

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


        .card-header-custom i {
            color: var(--blue);

            font-size: 18px;
        }


        .card-body-custom {
            padding: 15px 20px 20px;
        }


        /* =====================================
           PROFILE INFORMATION
        ===================================== */

        .profile-field {
            margin-bottom: 18px;
        }


        .profile-field:last-child {
            margin-bottom: 0;
        }


        .profile-label {
            display: block;

            margin-bottom: 7px;

            color: var(--muted);

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.4px;
        }


        .profile-value {
            width: 100%;

            min-height: 42px;

            display: flex;

            align-items: center;

            padding: 10px 13px;

            background: #f8f9fc;

            border: 1px solid var(--border);

            border-radius: 9px;

            color: var(--text);

            font-size: 13px;

            font-weight: 500;
        }


        .profile-value.muted-value {
            color: var(--muted);
        }


        .role-badge {
            display: inline-flex;

            align-items: center;

            padding: 5px 10px;

            border-radius: 7px;

            background: var(--blue-light);

            color: var(--blue);

            font-size: 11px;

            font-weight: 700;

            text-transform: capitalize;
        }


        /* =====================================
           PASSWORD FORM
        ===================================== */

        .form-group {
            margin-bottom: 18px;
        }


        .form-label-custom {
            display: block;

            margin-bottom: 7px;

            color: var(--text);

            font-size: 12px;

            font-weight: 600;
        }


        .form-control-custom {
            width: 100%;

            height: 42px;

            border: 1px solid var(--border);

            border-radius: 9px;

            padding: 9px 13px;

            outline: none;

            background: white;

            color: var(--text);

            font-size: 13px;

            transition: 0.2s ease;
        }


        .form-control-custom:focus {
            border-color: var(--blue);

            box-shadow:
                0 0 0 3px rgba(23, 105, 224, 0.08);
        }


        .form-control-custom.is-invalid {
            border-color: var(--red);
        }


        .invalid-feedback-custom {
            margin-top: 5px;

            color: var(--red);

            font-size: 11px;
        }


        .password-hint {
            margin-top: 6px;

            color: var(--muted);

            font-size: 10px;
        }


        /* =====================================
           BUTTONS
        ===================================== */

        .button-row {
            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 8px;
        }


        .btn-custom {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            min-height: 40px;

            padding: 9px 15px;

            border-radius: 9px;

            font-size: 12px;

            font-weight: 600;

            text-decoration: none;

            border: none;

            transition: 0.2s ease;

            cursor: pointer;
        }


        .btn-primary-custom {
            background: var(--blue);

            color: white;
        }


        .btn-primary-custom:hover {
            background: var(--blue-dark);

            color: white;
        }


        .btn-secondary-custom {
            background: white;

            color: var(--muted);

            border: 1px solid var(--border);
        }


        .btn-secondary-custom:hover {
            background: #f8f9fc;

            color: var(--text);
        }


        /* =====================================
           ALERT
        ===================================== */

        .alert-custom {
            display: flex;

            align-items: center;

            gap: 10px;

            padding: 12px 15px;

            margin-bottom: 20px;

            border-radius: 10px;

            font-size: 12px;
        }


        .alert-success-custom {
            background: #eafaf3;

            color: var(--green);

            border: 1px solid #ccefe0;
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


            .welcome h1 {
                font-size: 21px;
            }


            .button-row {
                justify-content: stretch;

                flex-direction: column;
            }


            .btn-custom {
                width: 100%;
            }

        }


        @media (max-width: 575px) {

            .profile-info {
                display: none;
            }


            .topbar-right {
                gap: 8px;
            }

        }

    </style>

</head>


<body>


@php

    $user = Auth::user();

    $initials = collect(
        preg_split('/\s+/', trim($user->name))
    )
    ->filter()
    ->map(
        fn ($name) =>
            strtoupper(substr($name, 0, 1))
    )
    ->take(2)
    ->implode('');

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
        class="menu-link"
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
        class="menu-link active"
    >

        <i class="bi bi-person-circle"></i>

        Edit Profile

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

                    {{ $initials }}

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
                    Edit Profile
                </h1>

                <p>
                    View your account information and update your password.
                </p>

            </div>

        </div>



        <!-- Success Message -->

        @if(session('success'))

            <div class="alert-custom alert-success-custom">

                <i class="bi bi-check-circle-fill"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif



        <!-- Validation Errors -->

        @if($errors->any())

            <div
                class="alert-custom"
                style="
                    background:#fff0f0;
                    color:var(--red);
                    border:1px solid #f5cccc;
                "
            >

                <i class="bi bi-exclamation-circle-fill"></i>

                <span>
                    Please check the password fields below.
                </span>

            </div>

        @endif



        <div class="row g-4">


            <!-- =====================================
                 PROFILE INFORMATION
            ====================================== -->

            <div class="col-lg-6">

                <div class="dashboard-card">


                    <!-- Header -->

                    <div class="card-header-custom">

                        <h5>
                            Profile Information
                        </h5>

                        <i class="bi bi-person-badge"></i>

                    </div>


                    <!-- Body -->

                    <div class="card-body-custom">


                        <!-- Full Name -->

                        <div class="profile-field">

                            <label class="profile-label">
                                Full Name
                            </label>

                            <div class="profile-value">

                                {{ $user->name }}

                            </div>

                        </div>


                        <!-- Email -->

                        <div class="profile-field">

                            <label class="profile-label">
                                Email Address
                            </label>

                            <div class="profile-value">

                                {{ $user->email }}

                            </div>

                        </div>


                        <!-- Role -->

                        <div class="profile-field">

                            <label class="profile-label">
                                Account Role
                            </label>

                            <div class="profile-value">

                                <span class="role-badge">

                                    {{ ucfirst($user->role) }}

                                </span>

                            </div>

                        </div>


                        <!-- User ID -->

                        <div class="profile-field">

                            <label class="profile-label">
                                User ID
                            </label>

                            <div class="profile-value">

                                {{ $user->user_id }}

                            </div>

                        </div>


                        <!-- Teacher Code -->

                        <div class="profile-field">

                            <label class="profile-label">
                                Teacher Code
                            </label>

                            <div class="profile-value">

                                {{ $teacher->teacher_code ?? '—' }}

                            </div>

                        </div>


                        <!-- Specialization -->

                        <div class="profile-field">

                            <label class="profile-label">
                                Specialization
                            </label>

                            <div class="profile-value">

                                {{ $teacher->specialization ?? '—' }}

                            </div>

                        </div>


                    </div>

                </div>

            </div>



            <!-- =====================================
                 CHANGE PASSWORD
            ====================================== -->

            <div class="col-lg-6">

                <div class="dashboard-card">


                    <!-- Header -->

                    <div class="card-header-custom">

                        <h5>
                            Change Password
                        </h5>

                        <i class="bi bi-shield-lock"></i>

                    </div>


                    <!-- Body -->

                    <div class="card-body-custom">


                        <form
                            action="{{ route('teacher.profile.update') }}"
                            method="POST"
                        >

                            @csrf

                            @method('PUT')


                            <!-- Current Password -->

                            <div class="form-group">

                                <label
                                    for="current_password"
                                    class="form-label-custom"
                                >

                                    Current Password

                                </label>


                                <input
                                    type="password"
                                    id="current_password"
                                    name="current_password"
                                    class="form-control-custom @error('current_password') is-invalid @enderror"
                                    placeholder="Enter current password"
                                    required
                                >


                                @error('current_password')

                                    <div class="invalid-feedback-custom">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>



                            <!-- New Password -->

                            <div class="form-group">

                                <label
                                    for="password"
                                    class="form-label-custom"
                                >

                                    New Password

                                </label>


                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control-custom @error('password') is-invalid @enderror"
                                    placeholder="Enter new password"
                                    required
                                >


                                <div class="password-hint">

                                    Password must be at least 8 characters.

                                </div>


                                @error('password')

                                    <div class="invalid-feedback-custom">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>



                            <!-- Confirm Password -->

                            <div class="form-group">

                                <label
                                    for="password_confirmation"
                                    class="form-label-custom"
                                >

                                    Confirm New Password

                                </label>


                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-control-custom"
                                    placeholder="Confirm new password"
                                    required
                                >

                            </div>



                            <!-- Buttons -->

                            <div class="button-row">


                                <a
                                    href="{{ route('teacher.dashboard') }}"
                                    class="btn-custom btn-secondary-custom"
                                >

                                    <i class="bi bi-arrow-left"></i>

                                    Back

                                </a>


                                <button
                                    type="submit"
                                    class="btn-custom btn-primary-custom"
                                >

                                    <i class="bi bi-check-lg"></i>

                                    Update Password

                                </button>


                            </div>


                        </form>


                    </div>

                </div>

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

