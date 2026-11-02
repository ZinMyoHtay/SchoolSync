<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Academic Year | SchoolSync</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

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

        a {
            text-decoration: none;
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
            background: transparent;
            font-size: 22px;
            color: var(--navy);
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
            text-transform: capitalize;
        }

        .content {
            padding: 30px 32px;
        }

        .content-wrapper {
            max-width: 1080px;
            margin: 0 auto;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-title {
            font-family: "Plus Jakarta Sans";
            font-size: 26px;
            font-weight: 800;
            margin: 0;
        }

        .page-subtitle {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .breadcrumb-text {
            margin-top: 8px;
            font-size: 11px;
            color: var(--muted);
        }

        .breadcrumb-text a {
            color: var(--blue);
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 1px solid var(--border);
            color: var(--text);
            padding: 10px 15px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            background: var(--blue-light);
            color: var(--blue);
            border-color: #c9dcfa;
        }

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .form-card-header {
            padding: 22px 25px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .form-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--blue-light);
            color: var(--blue);
            font-size: 19px;
        }

        .form-card-title {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .form-card-subtitle {
            margin: 3px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .form-body {
            padding: 28px 30px;
        }

        .section-title {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--navy);
            margin-bottom: 18px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text);
        }

        .form-control {
            min-height: 45px;
            border: 1px solid var(--border);
            border-radius: 9px;
            font-size: 12px;
            padding: 10px 13px;
        }

        .form-control:focus {
            border-color: #9fc1f5;
            box-shadow: 0 0 0 3px rgba(23,105,224,0.08);
        }

        .field-help {
            font-size: 10px;
            color: var(--muted);
            margin-top: 7px;
        }

        .info-box {
            display: flex;
            gap: 12px;
            background: var(--blue-light);
            border: 1px solid #d8e7fc;
            border-radius: 10px;
            padding: 14px 16px;
            margin-top: 25px;
        }

        .info-box i {
            color: var(--blue);
            font-size: 17px;
            margin-top: 1px;
        }

        .info-box-text {
            font-size: 11px;
            line-height: 1.6;
            color: #52627a;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 25px;
            margin-top: 25px;
            border-top: 1px solid var(--border);
        }

        .cancel-btn {
            border: 1px solid var(--border);
            background: white;
            color: var(--text);
            padding: 10px 18px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
        }

        .cancel-btn:hover {
            background: #f7f8fa;
        }

        .save-btn {
            border: none;
            background: var(--blue);
            color: white;
            padding: 10px 19px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .save-btn:hover {
            background: var(--blue-dark);
        }

        .is-invalid {
            border-color: var(--red) !important;
        }

        .invalid-feedback {
            font-size: 10px;
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

            .form-body {
                padding: 22px 20px;
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

            .form-actions {
                flex-direction: column-reverse;
            }

            .cancel-btn,
            .save-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

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

        <a href="{{ route('admin.departments.index') }}" class="menu-link">
            <i class="bi bi-building"></i>
            Departments
        </a>

        <div class="sidebar-section">
            Academic
        </div>

        <a href="{{ route('admin.academic-years.index') }}" class="menu-link active">
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


<div class="main">

    <div class="topbar">

        <button class="mobile-btn" id="mobileMenu">
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


    <main class="content">

        <div class="content-wrapper">

            <div class="page-header">

                <div>
                    <h1 class="page-title">
                        Create Academic Year
                    </h1>

                    <p class="page-subtitle">
                        Add a new academic year to SchoolSync.
                    </p>

                    <div class="breadcrumb-text">
                        <a href="{{ route('admin.academic-years.index') }}">
                            Academic Years
                        </a>
                        <span class="mx-1">/</span>
                        Create
                    </div>
                </div>

                <a
                    href="{{ route('admin.academic-years.index') }}"
                    class="back-btn"
                >
                    <i class="bi bi-arrow-left"></i>
                    Back to Academic Years
                </a>

            </div>


            <div class="form-card">

                <div class="form-card-header">

                    <div class="form-icon">
                        <i class="bi bi-calendar-plus"></i>
                    </div>

                    <div>
                        <h2 class="form-card-title">
                            Academic Year Information
                        </h2>

                        <p class="form-card-subtitle">
                            Define the academic year period and dates.
                        </p>
                    </div>

                </div>


                <div class="form-body">

                    <div class="section-title">
                        Basic Information
                    </div>


                    <form
                        action="{{ route('admin.academic-years.store') }}"
                        method="POST"
                    >

                        @csrf


                        <div class="row g-4">

                            <div class="col-md-12">

                                <label
                                    for="year_name"
                                    class="form-label"
                                >
                                    Academic Year Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="year_name"
                                    name="year_name"
                                    class="form-control @error('year_name') is-invalid @enderror"
                                    value="{{ old('year_name') }}"
                                    placeholder="e.g. 2025-2026"
                                    maxlength="9"
                                    required
                                >

                                @error('year_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="field-help">
                                    Enter the academic year range in YYYY-YYYY format.
                                    For example: 2025-2026 or 2025-2027.
                                </div>

                            </div>


                            <div class="col-md-6">

                                <label
                                    for="start_date"
                                    class="form-label"
                                >
                                    Start Date
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    id="start_date"
                                    name="start_date"
                                    class="form-control @error('start_date') is-invalid @enderror"
                                    value="{{ old('start_date') }}"
                                    required
                                >

                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="field-help">
                                    The Start Date must be within the first year.
                                </div>

                            </div>


                            <div class="col-md-6">

                                <label
                                    for="end_date"
                                    class="form-label"
                                >
                                    End Date
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    id="end_date"
                                    name="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror"
                                    value="{{ old('end_date') }}"
                                    required
                                >

                                @error('end_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="field-help">
                                    The End Date must be within the last year.
                                </div>

                            </div>

                        </div>


                        <div class="info-box">

                            <i class="bi bi-info-circle-fill"></i>

                            <div class="info-box-text">
                                <strong>Academic Year Date Rule:</strong>
                                The Start Date must belong to the first year
                                and the End Date must belong to the last year
                                entered in the Academic Year Name.
                            </div>

                        </div>


                        <div class="form-actions">

                            <a
                                href="{{ route('admin.academic-years.index') }}"
                                class="cancel-btn"
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="save-btn"
                            >
                                <i class="bi bi-check-lg me-1"></i>
                                Create Academic Year
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </main>

</div>


<script>
    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");

    if (mobileMenu) {
        mobileMenu.addEventListener("click", function () {
            sidebar.classList.toggle("show");
        });
    }


    const yearNameInput = document.getElementById("year_name");
    const startDateInput = document.getElementById("start_date");
    const endDateInput = document.getElementById("end_date");


    function updateAcademicYearDates() {

        const value = yearNameInput.value.trim();

        const match = value.match(/^(\d{4})-(\d{4})$/);


        if (!match) {

            startDateInput.removeAttribute("min");
            startDateInput.removeAttribute("max");

            endDateInput.removeAttribute("min");
            endDateInput.removeAttribute("max");

            return;
        }


        const startYear = parseInt(match[1]);
        const endYear = parseInt(match[2]);


        if (endYear <= startYear) {

            startDateInput.removeAttribute("min");
            startDateInput.removeAttribute("max");

            endDateInput.removeAttribute("min");
            endDateInput.removeAttribute("max");

            return;
        }


        startDateInput.min = `${startYear}-01-01`;
        startDateInput.max = `${startYear}-12-31`;


        endDateInput.min = `${endYear}-01-01`;
        endDateInput.max = `${endYear}-12-31`;


        if (startDateInput.value) {

            const selectedStartYear =
                new Date(startDateInput.value + "T00:00:00").getFullYear();

            if (selectedStartYear !== startYear) {
                startDateInput.value = "";
            }
        }


        if (endDateInput.value) {

            const selectedEndYear =
                new Date(endDateInput.value + "T00:00:00").getFullYear();

            if (selectedEndYear !== endYear) {
                endDateInput.value = "";
            }
        }
    }


    yearNameInput.addEventListener(
        "input",
        updateAcademicYearDates
    );

    yearNameInput.addEventListener(
        "change",
        updateAcademicYearDates
    );


    updateAcademicYearDates();
</script>

</body>
</html>

