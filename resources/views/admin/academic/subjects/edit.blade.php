<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Subject | SchoolSync</title>

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
            font-size: 13px;
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
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-title {
            margin: 0;
            font-family: "Plus Jakarta Sans";
            font-size: 25px;
            font-weight: 800;
            color: var(--navy);
        }

        .page-subtitle {
            margin-top: 6px;
            color: var(--muted);
            font-size: 12px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
        }

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .form-header {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
        }

        .form-title {
            margin: 0;
            font-family: "Plus Jakarta Sans";
            font-size: 15px;
            font-weight: 800;
            color: var(--navy);
        }

        .form-description {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .form-body {
            padding: 24px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 7px;
        }

        .readonly-field,
        .form-control,
        .status-field {
            width: 100%;
            height: 44px;
            border-radius: 9px;
        }

        .readonly-field {
            display: flex;
            align-items: center;
            padding: 0 13px;
            background: #f8f9fc;
            border: 1px solid var(--border);
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
        }

        .form-control {
            border: 1px solid var(--border);
            font-size: 12px;
            padding: 0 13px;
        }

        .form-control:focus {
            border-color: #a9c7f5;
            box-shadow: 0 0 0 3px rgba(23,105,224,0.08);
        }

        .status-field {
            display: flex;
            align-items: center;
            padding: 0 13px;
            background: #ecf9f3;
            border: 1px solid #ccefe0;
            color: #168a5b;
            font-size: 12px;
            font-weight: 700;
        }

        .status-field.inactive {
            background: #fff1f1;
            border-color: #f5d0d0;
            color: var(--red);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            margin-right: 9px;
            border-radius: 50%;
            background: var(--green);
        }

        .status-field.inactive .status-dot {
            background: var(--red);
        }

        .help-text {
            margin-top: 6px;
            color: var(--muted);
            font-size: 10px;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 9px;
            padding: 18px 24px;
            background: #fbfcfe;
            border-top: 1px solid var(--border);
        }

        .btn-cancel,
        .btn-update {
            height: 40px;
            padding: 0 17px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
        }

        .btn-cancel {
            border: 1px solid var(--border);
            background: white;
            color: var(--text);
        }

        .btn-update {
            border: none;
            background: var(--blue);
            color: white;
        }

        .btn-update:hover {
            background: var(--blue-dark);
            color: white;
        }

        .invalid-feedback {
            font-size: 10px;
        }

        .mobile-btn {
            display: none;
            border: none;
            background: transparent;
            font-size: 22px;
            color: var(--navy);
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

            .form-footer {
                flex-direction: column-reverse;
            }

            .btn-cancel,
            .btn-update {
                width: 100%;
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

        <div class="sidebar-section">Overview</div>

        <a href="{{ url('/admin/dashboard') }}" class="menu-link">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>

        <div class="sidebar-section">People</div>

        <a href="{{ route('admin.users.index') }}" class="menu-link">
            <i class="bi bi-person-gear"></i>
            User Management
        </a>

        <a href="{{ route('admin.departments.index') }}" class="menu-link">
            <i class="bi bi-building"></i>
            Departments
        </a>

        <div class="sidebar-section">Academic</div>

        <a href="{{ route('admin.academic-years.index') }}" class="menu-link">
            <i class="bi bi-calendar3"></i>
            Academic Years
        </a>

        <a href="{{ route('admin.classes.index') }}" class="menu-link">
            <i class="bi bi-diagram-3"></i>
            Classes
        </a>

        <a href="{{ route('admin.subjects.index') }}" class="menu-link active">
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

        <div class="sidebar-section">Finance</div>

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

    <header class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button class="mobile-btn" id="mobileMenu">
                <i class="bi bi-list"></i>
            </button>

            <div class="search">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search...">
            </div>

        </div>

        <div class="top-right">

            <div class="top-icon">
                <i class="bi bi-bell"></i>
                <span class="notification-dot"></span>
            </div>

            <div class="profile">

                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>

                <div>
                    <div class="profile-name">
                        {{ Auth::user()->name ?? 'Admin' }}
                    </div>

                    <div class="profile-role">
                        Administrator
                    </div>
                </div>

            </div>

        </div>

    </header>

    <main class="content">

        <div class="page-header">

            <div>
                <h1 class="page-title">Edit Subject</h1>

                <div class="page-subtitle">
                    Update subject information.
                </div>
            </div>

            <a
                href="{{ route('admin.subjects.index') }}"
                class="back-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Back to Subjects
            </a>

        </div>

        <div class="form-card">

            <div class="form-header">

                <h2 class="form-title">
                    Subject Information
                </h2>

                <p class="form-description">
                    Update the subject details below.
                </p>

            </div>

            <form
                action="{{ route('admin.subjects.update', $subject->subject_id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="form-body">

                    <div class="row g-4">

                        <div class="col-md-6">

                            <label class="form-label">
                                Subject Code
                            </label>

                            <div class="readonly-field">
                                {{ $subject->subject_code }}
                            </div>

                            <div class="help-text">
                                Subject code cannot be changed.
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label
                                for="subject_name"
                                class="form-label"
                            >
                                Subject Name
                            </label>

                            <input
                                type="text"
                                name="subject_name"
                                id="subject_name"
                                class="form-control @error('subject_name') is-invalid @enderror"
                                value="{{ old('subject_name', $subject->subject_name) }}"
                                required
                            >

                            @error('subject_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                Status
                            </label>

                            <div class="status-field {{ $subject->status === 'inactive' ? 'inactive' : '' }}">

                                <span class="status-dot"></span>

                                {{ ucfirst($subject->status) }}

                            </div>

                            <div class="help-text">
                                Status is managed from the Subjects page.
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                Subject ID
                            </label>

                            <div class="readonly-field">
                                {{ $subject->subject_id }}
                            </div>

                            <div class="help-text">
                                System-generated ID.
                            </div>

                        </div>

                    </div>

                </div>

                <div class="form-footer">

                    <a
                        href="{{ route('admin.subjects.index') }}"
                        class="btn-cancel"
                    >
                        <i class="bi bi-x-lg"></i>
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="btn-update"
                    >
                        <i class="bi bi-check-lg"></i>
                        Update Subject
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

<script>
    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {
        sidebar.classList.toggle("show");
    });
</script>

</body>
</html>

