<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Create Announcement</title>

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

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
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
            --purple: #7655d6;
            --bg: #f5f7fb;
            --white: #ffffff;
            --text: #172033;
            --muted: #738096;
            --border: #e7ebf2;

            --shadow:
                0 8px 30px rgba(16, 35, 60, 0.06);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: "Inter", sans-serif;
            font-size: 14px;
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
                1px solid rgba(255,255,255,0.08);
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
                1px solid rgba(255,255,255,0.08);
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

            background: #dc3545;

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

        /* =========================================================
           CONTENT
        ========================================================= */

        .content {

            padding: 32px 34px;
        }

        .page-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 25px;
        }

        .page-title {

            font-size: 27px;

            font-weight: 800;

            margin: 0 0 7px;

            color: var(--text);
        }

        .page-subtitle {

            margin: 0;

            color: var(--muted);

            font-size: 14px;
        }

        .back-btn {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            background: white;

            color: var(--text);

            border:
                1px solid var(--border);

            border-radius: 10px;

            padding: 11px 17px;

            font-size: 13px;

            font-weight: 700;

            transition: 0.2s ease;
        }

        .back-btn:hover {

            color: var(--blue);

            background: var(--blue-light);

            border-color: #cfe0fb;
        }

        /* =========================================================
           CARD
        ========================================================= */

        .card-box {

            background: white;

            border:
                1px solid var(--border);

            border-radius: 14px;

            box-shadow: var(--shadow);

            overflow: hidden;
        }

        .card-header-custom {

            padding: 22px 24px;

            border-bottom:
                1px solid var(--border);
        }

        .card-title {

            font-size: 17px;

            font-weight: 800;

            margin: 0 0 5px;

            color: var(--text);
        }

        .card-subtitle {

            margin: 0;

            color: var(--muted);

            font-size: 13px;
        }

        .form-body {

            padding: 24px;
        }

        /* =========================================================
           FORM
        ========================================================= */

        .form-label {

            font-size: 12px;

            font-weight: 700;

            color: #65738a;

            margin-bottom: 8px;
        }

        .required {

            color: #dc3545;
        }

        .form-control,
        .form-select {

            width: 100%;

            height: 46px;

            border:
                1px solid var(--border);

            border-radius: 10px;

            background: #f8f9fc;

            padding: 0 14px;

            font-size: 13px;

            color: var(--text);

            outline: none;

            transition: 0.2s ease;
        }

        textarea.form-control {

            height: auto;

            min-height: 190px;

            padding: 13px 14px;

            resize: vertical;

            line-height: 1.6;
        }

        .form-control:focus,
        .form-select:focus {

            background: white;

            border-color: #a9c7f5;

            box-shadow:
                0 0 0 3px
                rgba(23,105,224,0.06);
        }

        .form-control::placeholder {

            color: #9aa5b5;
        }

        .form-text {

            color: var(--muted);

            font-size: 11px;

            margin-top: 7px;
        }

        .invalid-feedback {

            font-size: 11px;
        }

        /* =========================================================
           FOOTER
        ========================================================= */

        .card-footer-custom {

            padding: 15px 24px;

            border-top:
                1px solid var(--border);

            background: #fcfdff;

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 10px;
        }

        .cancel-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            height: 42px;

            padding: 0 17px;

            border:
                1px solid var(--border);

            background: white;

            color: var(--text);

            border-radius: 9px;

            font-size: 13px;

            font-weight: 700;

            transition: 0.2s ease;
        }

        .cancel-btn:hover {

            background: #f8f9fc;

            color: var(--text);
        }

        .save-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            height: 42px;

            padding: 0 18px;

            border: none;

            background: var(--blue);

            color: white;

            border-radius: 9px;

            font-size: 13px;

            font-weight: 700;

            transition: 0.2s ease;
        }

        .save-btn:hover {

            background: var(--blue-dark);

            color: white;

            transform:
                translateY(-1px);
        }

        .alert-custom {

            border: none;

            border-radius: 10px;

            font-size: 13px;

            padding: 13px 16px;

            margin-bottom: 20px;
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

                padding: 0 20px;
            }

            .content {

                padding: 24px 20px;
            }

            .page-header {

                align-items: flex-start;

                flex-direction: column;
            }
        }

        @media (max-width: 575px) {

            .content {

                padding: 20px 14px;
            }

            .topbar {

                height: 70px;
            }

            .profile-name,
            .profile-role {

                display: none;
            }

            .page-title {

                font-size: 23px;
            }

            .page-subtitle {

                font-size: 13px;
            }

            .card-header-custom {

                padding: 18px;
            }

            .form-body {

                padding: 18px;
            }

            .card-footer-custom {

                padding: 15px 18px;

                flex-direction: column-reverse;

                align-items: stretch;
            }

            .cancel-btn,
            .save-btn {

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

            <img src="{{ asset('images/schoolsync-logo.png') }}" alt="SchoolSync">

        </div>

        <div class="brand-name">

            School<span>Sync</span>

        </div>

    </div>


    <div class="sidebar-scroll">


        <!-- Overview -->

        <div class="sidebar-section">
            Overview
        </div>


        <a
            href="{{ route('admin.dashboard') }}"
            class="menu-link"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>


        <!-- People -->

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


        <!-- Academic -->

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


        <!-- Finance -->

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


        <!-- Announcements -->

        <div class="sidebar-section">
            Announcements
        </div>


        <a
            href="{{ route('admin.announcements.index') }}"
            class="menu-link active"
        >

            <i class="bi bi-megaphone"></i>

            Announcements

        </a>


    </div>


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



<!-- =========================================================
     MAIN
========================================================= -->

<div class="main">


    <!-- =====================================================
         TOPBAR
    ====================================================== -->

    <div class="topbar">


        <div class="d-flex align-items-center gap-3">


            <button
                class="mobile-btn"
                id="mobileMenuBtn"
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


                <i
                    class="bi bi-chevron-down"
                    style="font-size:11px;color:#738096;"
                ></i>


            </div>


        </div>


    </div>



    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <div class="content">


        <!-- PAGE HEADER -->

        <div class="page-header">


            <div>

                <h1 class="page-title">

                    Create Announcement

                </h1>


                <p class="page-subtitle">

                    Create a new announcement for teachers and students.

                </p>

            </div>


            <a
                href="{{ route('admin.announcements.index') }}"
                class="back-btn"
            >

                <i class="bi bi-arrow-left"></i>

                Back to Announcements

            </a>


        </div>



        <!-- VALIDATION ERROR -->

        @if($errors->any())

            <div
                class="alert alert-danger alert-custom"
                role="alert"
            >

                <i class="bi bi-exclamation-circle me-2"></i>

                Please check the form for errors.

            </div>

        @endif



        <!-- FORM CARD -->

        <div class="card-box">


            <!-- CARD HEADER -->

            <div class="card-header-custom">

                <h3 class="card-title">

                    Announcement Information

                </h3>


                <p class="card-subtitle">

                    Enter the announcement details below.

                </p>

            </div>



            <!-- FORM BODY -->

            <form
                action="{{ route('admin.announcements.store') }}"
                method="POST"
            >

                @csrf


                <div class="form-body">


                    <div class="row g-4">


                        <!-- TITLE -->

                        <div class="col-12">


                            <label
                                for="title"
                                class="form-label"
                            >

                                Announcement Title

                                <span class="required">*</span>

                            </label>


                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}"
                                placeholder="Enter announcement title"
                                maxlength="255"
                                required
                            >


                            @error('title')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                            <div class="form-text">

                                Enter the title of the announcement.

                            </div>


                        </div>



                        <!-- CONTENT -->

                        <div class="col-12">


                            <label
                                for="content"
                                class="form-label"
                            >

                                Announcement Content

                                <span class="required">*</span>

                            </label>


                            <textarea
                                id="content"
                                name="content"
                                class="form-control @error('content') is-invalid @enderror"
                                placeholder="Enter announcement content..."
                                required
                            >{{ old('content') }}</textarea>


                            @error('content')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                            <div class="form-text">

                                Enter the complete announcement message.

                            </div>


                        </div>


<input type="hidden" name="status" value="active">
                    



                <!-- CARD FOOTER -->

                <div class="card-footer-custom">


                    <a
                        href="{{ route('admin.announcements.index') }}"
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

                        Create Announcement

                    </button>


                </div>


            </form>


        </div>


    </div>


</div>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

    const mobileMenuBtn =
        document.getElementById('mobileMenuBtn');

    const sidebar =
        document.getElementById('sidebar');


    if (mobileMenuBtn) {

        mobileMenuBtn.addEventListener(
            'click',
            function () {

                sidebar.classList.toggle('show');

            }
        );

    }

</script>


</body>

</html>