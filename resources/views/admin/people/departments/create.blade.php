<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Department | SchoolSync</title>

    <!-- Bootstrap 5.3.3 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons 1.11.3 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        /* =========================================================
           ROOT
        ========================================================= */

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


        /* =========================================================
           SIDEBAR
        ========================================================= */

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
            flex: 1;
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
            text-decoration: none;
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
            padding: 14px;
            border-top: 1px solid rgba(255,255,255,0.08);
            margin-top: 25px;
            padding-top: 18px;
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


        /* =========================================================
           MAIN
        ========================================================= */

        .main {
            margin-left: 270px;
            min-height: 100vh;
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

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


        /* =========================================================
           CONTENT
        ========================================================= */

        .content {
            padding: 30px 32px;
        }

        .content-wrapper {
            width: 100%;
            max-width: 1080px;
            margin: 0 auto;
        }


        /* =========================================================
           PAGE HEADER
        ========================================================= */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-header-left {
            flex: 1;
        }

        .page-title {
            margin: 0;
            font-family: "Plus Jakarta Sans";
            font-size: 25px;
            font-weight: 800;
            color: var(--text);
        }

        .page-subtitle {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-top: 9px;
            font-size: 11px;
            color: var(--muted);
        }

        .breadcrumb a {
            color: var(--blue);
            text-decoration: none;
            font-weight: 600;
        }

        .breadcrumb i {
            font-size: 9px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            padding: 10px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            color: var(--text);
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            color: var(--blue);
            background: var(--blue-light);
            border-color: #b8cff3;
        }


        /* =========================================================
           FORM CARD
        ========================================================= */

        .form-card {
            width: 100%;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .form-card-header {
            padding: 22px 30px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .form-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .form-card-header h2 {
            font-family: "Plus Jakarta Sans";
            font-size: 16px;
            font-weight: 800;
            color: var(--text);
            margin: 0 0 4px;
        }

        .form-card-header p {
            font-size: 11px;
            color: var(--muted);
            margin: 0;
        }

        .form-body {
            padding: 30px;
        }


        /* =========================================================
           FORM SECTION
        ========================================================= */

        .form-section-title {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 18px;
            font-size: 12px;
            font-weight: 800;
            color: var(--text);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-section-title i {
            color: var(--blue);
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
        }

        .required {
            color: var(--red);
        }

        .form-control {
            width: 100%;
            height: 46px;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0 14px;
            font-family: "Inter", sans-serif;
            font-size: 12px;
            color: var(--text);
            background: #fbfcfe;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #9fc0f2;
            box-shadow: 0 0 0 3px rgba(23,105,224,0.08);
            background: white;
        }

        .form-control::placeholder {
            color: #a0a9b8;
        }

        .form-help {
            margin-top: 7px;
            font-size: 10px;
            color: var(--muted);
        }

        .invalid-feedback {
            display: block;
            color: var(--red);
            font-size: 10px;
            margin-top: 7px;
        }

        .is-invalid {
            border-color: var(--red);
        }


        /* =========================================================
           INFORMATION BOX
        ========================================================= */

        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 15px 16px;
            background: var(--blue-light);
            border: 1px solid #d8e7fb;
            border-radius: 11px;
            color: #42618c;
            font-size: 11px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .info-box i {
            color: var(--blue);
            font-size: 16px;
            flex-shrink: 0;
            margin-top: 1px;
        }


        /* =========================================================
           FORM ACTIONS
        ========================================================= */

        .form-actions {
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .required-note {
            color: var(--muted);
            font-size: 10px;
        }

        .required-note span {
            color: var(--red);
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            min-height: 42px;
            padding: 10px 18px;
            border-radius: 10px;
            font-family: "Inter", sans-serif;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-cancel {
            background: white;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-cancel:hover {
            background: #f1f3f7;
            color: var(--text);
        }

        .btn-primary {
            background: var(--blue);
            color: white;
            border: 1px solid var(--blue);
        }

        .btn-primary:hover {
            background: var(--blue-dark);
            border-color: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 7px 18px rgba(23,105,224,0.22);
        }


        /* =========================================================
           ALERT
        ========================================================= */

        .alert {
            border-radius: 10px;
            padding: 13px 15px;
            margin-bottom: 20px;
            font-size: 11px;
        }

        .alert-danger {
            background: #fff0f0;
            border: 1px solid #f3cccc;
            color: #b83838;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

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

            .content-wrapper {
                max-width: 900px;
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

            .content-wrapper {
                max-width: 100%;
            }
        }


        @media (max-width: 767px) {

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .page-header-right {
                width: 100%;
            }

            .back-btn {
                width: 100%;
            }

            .form-body {
                padding: 22px;
            }

            .form-card-header {
                padding: 20px 22px;
            }

            .form-actions {
                align-items: stretch;
                flex-direction: column;
            }

            .action-buttons {
                width: 100%;
            }

            .btn {
                flex: 1;
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

            .form-card-header {
                padding: 18px;
            }

            .form-body {
                padding: 18px;
            }

            .form-actions {
                gap: 15px;
            }

            .action-buttons {
                flex-direction: column-reverse;
            }

            .action-buttons .btn {
                width: 100%;
            }
        }

    </style>
</head>


<body>


<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside class="sidebar" id="sidebar">

    <div class="brand">

        <div class="brand-logo">
           <img src="{{ asset('images/schoolsync-logo.png') }}"
alt="SchoolSync"
>
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
            class="menu-link active"
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
                <span>Logout</span>
            </button>

        </form>

    </div>

</aside>


<!-- =========================================================
     MAIN
========================================================= -->

<div class="main">


    <!-- TOPBAR -->

    <div class="topbar">

        <button
            type="button"
            class="mobile-btn"
            id="mobileMenu"
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

        <div class="content-wrapper">


            <!-- PAGE HEADER -->

            <div class="page-header">

                <div class="page-header-left">

                    <h1 class="page-title">
                        Create Department
                    </h1>

                    <p class="page-subtitle">
                        Add a new department to your SchoolSync system.
                    </p>

                    <div class="breadcrumb">

                        <a href="{{ route('admin.departments.index') }}">
                            Departments
                        </a>

                        <i class="bi bi-chevron-right"></i>

                        <span>
                            Create Department
                        </span>

                    </div>

                </div>


                <div class="page-header-right">

                    <a
                        href="{{ route('admin.departments.index') }}"
                        class="back-btn"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Back to Departments
                    </a>

                </div>

            </div>


            <!-- VALIDATION ERRORS -->

            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Please fix the following errors:
                    </strong>

                    <ul class="mb-0 mt-2 ps-3">

                        @foreach ($errors->all() as $error)

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


                <!-- CARD HEADER -->

                <div class="form-card-header">

                    <div class="form-icon">
                        <i class="bi bi-building"></i>
                    </div>

                    <div>

                        <h2>
                            Department Information
                        </h2>

                        <p>
                            Enter the basic information for the new department.
                        </p>

                    </div>

                </div>


                <!-- CARD BODY -->

                <div class="form-body">

                    <form
                        action="{{ route('admin.departments.store') }}"
                        method="POST"
                    >

                        @csrf


                        <!-- SECTION TITLE -->

                        <div class="form-section-title">

                            <i class="bi bi-building"></i>

                            Basic Information

                        </div>


                        <!-- DEPARTMENT NAME -->

                        <div class="form-group">

                            <label
                                for="department_name"
                                class="form-label"
                            >

                                Department Name

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <input
                                type="text"
                                id="department_name"
                                name="department_name"
                                class="form-control @error('department_name') is-invalid @enderror"
                                value="{{ old('department_name') }}"
                                placeholder="e.g. Information Technology"
                                maxlength="255"
                                required
                            >


                            @error('department_name')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @else

                                <div class="form-help">
                                    Enter a unique name for this department.
                                </div>

                            @enderror

                        </div>


                        <!-- INFORMATION BOX -->

                        <div class="info-box">

                            <i class="bi bi-info-circle-fill"></i>

                            <div>

                                <strong>Department status</strong>

                                <br>

                                New departments are created as
                                <strong>Active</strong> by default.
                                You can deactivate or reactivate the
                                department later from the Departments
                                management page.

                            </div>

                        </div>


                        <!-- FORM ACTIONS -->

                        <div class="form-actions">

                            <div class="required-note">

                                <span>*</span>
                                Required field

                            </div>


                            <div class="action-buttons">

                                <a
                                    href="{{ route('admin.departments.index') }}"
                                    class="btn btn-cancel"
                                >
                                    <i class="bi bi-x-lg"></i>
                                    Cancel
                                </a>


                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    <i class="bi bi-check-lg"></i>
                                    Create Department
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </main>

</div>


<!-- =========================================================
     MOBILE MENU
========================================================= -->

<script>

    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");

    if (mobileMenu) {

        mobileMenu.addEventListener("click", function () {

            sidebar.classList.toggle("show");

        });

    }

</script>


</body>
</html>

