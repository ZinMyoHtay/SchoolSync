<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Edit Department</title>

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

        /* =========================
           SIDEBAR FOOTER
        ========================== */

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

        .content-wrapper {
            max-width: 1080px;
            margin: 0 auto;
        }

        /* =========================
           PAGE HEADER
        ========================== */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 13px;
            margin: 0;
        }

        .breadcrumb-text {
            color: var(--muted);
            font-size: 10px;
            margin-top: 8px;
        }

        .breadcrumb-text span {
            color: var(--blue);
            font-weight: 600;
        }

        /* =========================
           BACK BUTTON
        ========================== */

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border-radius: 10px;
            background: white;
            color: var(--text);
            border: 1px solid var(--border);
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            color: var(--blue);
            border-color: #c9ddfa;
            background: var(--blue-light);
        }

        /* =========================
           FORM CARD
        ========================== */

        .form-card {
            width: 100%;
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
            font-size: 15px;
            font-weight: 700;
            margin: 0 0 5px;
        }

        .form-subtitle {
            color: var(--muted);
            font-size: 11px;
            margin: 0;
        }

        .form-body {
            padding: 25px 22px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 11px 13px;
            font-size: 12px;
            color: var(--text);
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #a9c7f5;
            box-shadow: 0 0 0 3px rgba(23,105,224,0.08);
        }

        .form-control:disabled {
            background: #f8f9fc;
            color: var(--muted);
            cursor: not-allowed;
        }

        .field-help {
            color: var(--muted);
            font-size: 10px;
            margin-top: 6px;
        }

        /* =========================
           INFO BOX
        ========================== */

        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 13px 14px;
            background: var(--blue-light);
            border: 1px solid #d8e7fc;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        .info-box i {
            color: var(--blue);
            font-size: 16px;
            margin-top: 1px;
        }

        .info-box-text {
            color: #47617f;
            font-size: 11px;
            line-height: 1.6;
        }

        /* =========================
           STATUS
        ========================== */

        .status-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 13px 15px;
            background: #fafbfc;
            border: 1px solid var(--border);
            border-radius: 10px;
        }

        .status-label {
            font-size: 11px;
            font-weight: 700;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        .status-active {
            color: #087a4c;
            background: #e8f8f1;
        }

        .status-inactive {
            color: #a85d0a;
            background: #fff3df;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* =========================
           FORM ACTIONS
        ========================== */

        .form-actions {
            padding: 18px 22px;
            border-top: 1px solid var(--border);
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
            padding: 10px 17px;
            border-radius: 9px;
            background: white;
            color: var(--text);
            border: 1px solid var(--border);
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .cancel-btn:hover {
            background: #f8f9fc;
            color: var(--text);
            border-color: #cdd4df;
        }

        .save-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 18px;
            border-radius: 9px;
            background: var(--blue);
            color: white;
            border: none;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 7px 18px rgba(23,105,224,0.20);
            transition: 0.2s ease;
        }

        .save-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
        }

        /* =========================
           VALIDATION
        ========================== */

        .invalid-feedback {
            font-size: 10px;
        }

        /* =========================
           RESPONSIVE
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

            .content-wrapper {
                max-width: 100%;
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

            .back-btn {
                width: 100%;
                justify-content: center;
            }

            .form-actions {
                flex-direction: column-reverse;
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

            .page-subtitle {
                font-size: 12px;
            }

            .form-body {
                padding: 20px 17px;
            }

            .form-header {
                padding: 17px;
            }

            .form-actions {
                padding: 15px 17px;
            }
        }

    </style>

</head>

<body>

<!-- =====================================================
     SIDEBAR
===================================================== -->

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

        <a href="{{ route('admin.departments.index') }}" class="menu-link active">
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

        <a href="{{ route('admin.classes.index') }}" class="menu-link">
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
                <span>Logout</span>
            </button>
        </form>

    </div>

</aside>

<!-- =====================================================
     MAIN
===================================================== -->

<main class="main">

    <!-- TOPBAR -->

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

        </div>

    </header>

    <!-- CONTENT -->

    <section class="content">

        <div class="content-wrapper">

            <!-- PAGE HEADER -->

            <div class="page-header">

                <div>

                    <h1 class="page-title">
                        Edit Department
                    </h1>

                    <p class="page-subtitle">
                        Update department information and organizational details.
                    </p>

                    <div class="breadcrumb-text">
                        Departments / <span>Edit Department</span>
                    </div>

                </div>

                <a
                    href="{{ route('admin.departments.index') }}"
                    class="back-btn"
                >
                    <i class="bi bi-arrow-left"></i>
                    Back to Departments
                </a>

            </div>

            <!-- VALIDATION ERRORS -->

            @if($errors->any())

                <div
                    class="alert alert-danger"
                    style="font-size:12px; border-radius:10px;"
                >

                    <div class="fw-semibold mb-2">

                        <i class="bi bi-exclamation-circle me-1"></i>

                        Please correct the following errors:

                    </div>

                    <ul class="mb-0 ps-3">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif

            <!-- FORM CARD -->

            <div class="form-card">

                <div class="form-header">

                    <h3 class="form-title">
                        Department Information
                    </h3>

                    <p class="form-subtitle">
                        Edit the information for this department.
                    </p>

                </div>

                <form
                    action="{{ route('admin.departments.update', $department->department_id) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')

                    <div class="form-body">

                        <!-- INFO -->

                        <div class="info-box">

                            <i class="bi bi-info-circle-fill"></i>

                            <div class="info-box-text">

                                The department ID is generated automatically
                                and cannot be changed. Department status is
                                managed separately from this form.

                            </div>

                        </div>

                        <div class="row g-4">

                            <!-- DEPARTMENT ID -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Department ID
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="DEP-{{ str_pad($department->department_id, 3, '0', STR_PAD_LEFT) }}"
                                    disabled
                                >

                                <div class="field-help">
                                    Generated automatically and cannot be changed.
                                </div>

                            </div>

                            <!-- STATUS -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Status
                                </label>

                                <div class="status-row">

                                    <span class="status-label">
                                        Current Status
                                    </span>

                                    @if($department->status === 'active')

                                        <span class="status-badge status-active">
                                            <span class="status-dot"></span>
                                            Active
                                        </span>

                                    @else

                                        <span class="status-badge status-inactive">
                                            <span class="status-dot"></span>
                                            Inactive
                                        </span>

                                    @endif

                                </div>

                                <div class="field-help">
                                    Change status from the Department Management page.
                                </div>

                            </div>

                            <!-- DEPARTMENT NAME -->

                            <div class="col-12">

                                <label
                                    for="department_name"
                                    class="form-label"
                                >
                                    Department Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="department_name"
                                    name="department_name"
                                    class="form-control @error('department_name') is-invalid @enderror"
                                    value="{{ old('department_name', $department->department_name) }}"
                                    placeholder="Enter department name"
                                    maxlength="255"
                                    required
                                    autofocus
                                >

                                @error('department_name')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @else

                                    <div class="field-help">
                                        Enter the official name of the department.
                                    </div>

                                @enderror

                            </div>

                        </div>

                    </div>

                    <!-- FORM ACTIONS -->

                    <div class="form-actions">

                        <a
                            href="{{ route('admin.departments.index') }}"
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
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>

</main>

<!-- MOBILE MENU -->

<script>

    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {
        sidebar.classList.toggle("show");
    });

</script>

</body>

</html>

