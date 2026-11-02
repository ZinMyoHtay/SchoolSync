<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Enrollment | SchoolSync</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

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
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-title {
            font-family: "Plus Jakarta Sans";
            font-size: 25px;
            font-weight: 800;
            margin: 0;
        }

        .page-subtitle {
            color: var(--muted);
            margin: 6px 0 0;
            font-size: 12px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 1px solid var(--border);
            color: var(--text);
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            background: var(--blue-light);
            border-color: #c9dcfa;
            color: var(--blue);
        }

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(16, 35, 60, 0.06);
            overflow: hidden;
        }

        .card-header-custom {
            padding: 22px 25px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .header-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .card-header-title {
            font-family: "Plus Jakarta Sans";
            font-size: 15px;
            font-weight: 800;
            margin: 0;
        }

        .card-header-subtitle {
            color: var(--muted);
            font-size: 11px;
            margin: 3px 0 0;
        }

        .form-body {
            padding: 28px 25px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 11px 13px;
            font-size: 12px;
            color: var(--text);
            min-height: 44px;
            box-shadow: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #a9c7f5;
            box-shadow: 0 0 0 3px rgba(23,105,224,0.08);
        }

        .form-text {
            color: var(--muted);
            font-size: 10px;
            margin-top: 6px;
        }

        .required {
            color: var(--red);
        }

        .student-option,
        .class-option {
            font-size: 12px;
        }

        .info-box {
            background: var(--blue-light);
            border: 1px solid #d7e6fb;
            border-radius: 11px;
            padding: 13px 15px;
            color: #49627e;
            font-size: 11px;
            display: flex;
            gap: 10px;
            align-items: flex-start;
            margin-top: 5px;
        }

        .info-box i {
            color: var(--blue);
            font-size: 16px;
            margin-top: 1px;
        }

        .form-footer {
            padding: 18px 25px;
            border-top: 1px solid var(--border);
            background: #fbfcfe;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-cancel {
            background: white;
            color: var(--text);
            border: 1px solid var(--border);
            padding: 10px 18px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-cancel:hover {
            background: #f3f5f8;
            color: var(--text);
        }

        .btn-save {
            background: var(--blue);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(23,105,224,0.2);
        }

        .btn-save:hover {
            background: var(--blue-dark);
            color: white;
        }

        .invalid-feedback {
            font-size: 10px;
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: var(--red);
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
                padding: 22px 18px;
            }

            .form-footer {
                padding: 16px 18px;
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
            .btn-save {
                width: 100%;
            }
        }

        .mobile-btn {
            display: none;
            border: none;
            background: transparent;
            font-size: 22px;
            color: var(--text);
        }

        @media (max-width: 991px) {
            .mobile-btn {
                display: block;
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

        <a href="{{ route('admin.classes.index') }}" class="menu-link">
            <i class="bi bi-diagram-3"></i>
            Classes
        </a>

        <a href="{{ route('admin.subjects.index') }}" class="menu-link">
            <i class="bi bi-book"></i>
            Subjects
        </a>

        <a href="{{ route('admin.enrollments.index') }}" class="menu-link active">
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

        <div class="d-flex align-items-center gap-3">

            <button class="mobile-btn" id="mobileMenu">
                <i class="bi bi-list"></i>
            </button>

            <div class="search">
                <i class="bi bi-search"></i>
                <input
                    type="text"
                    placeholder="Search anything..."
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

           </div>
        </div>
    </div>


    <main class="content">

        <div class="page-header">

            <div>
                <h1 class="page-title">
                    Create Enrollment
                </h1>

                <p class="page-subtitle">
                    Enroll a student into an active class.
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


        @if($errors->any())

            <div class="alert alert-danger border-0 shadow-sm mb-4">
                <div class="fw-semibold mb-1">
                    Please correct the following errors:
                </div>

                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif


        <div class="form-card">

            <div class="card-header-custom">

                <div class="header-icon">
                    <i class="bi bi-card-checklist"></i>
                </div>

                <div>
                    <h2 class="card-header-title">
                        Enrollment Information
                    </h2>

                    <p class="card-header-subtitle">
                        Select a student, class, and enrollment date.
                    </p>
                </div>

            </div>


            <form
                action="{{ route('admin.enrollments.store') }}"
                method="POST"
            >

                @csrf

                <div class="form-body">

                    <div class="row g-4">

                        <div class="col-md-6">

                            <label
                                for="student_id"
                                class="form-label"
                            >
                                Student <span class="required">*</span>
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
                                        {{ old('student_id') == $student->student_id ? 'selected' : '' }}
                                    >
                                        {{ $student->full_name }}
                                        — {{ $student->student_code }}
                                    </option>

                                @endforeach

                            </select>

                            @error('student_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-text">
                                Select the student who will be enrolled.
                            </div>

                        </div>


                        <div class="col-md-6">

                            <label
                                for="class_id"
                                class="form-label"
                            >
                                Class <span class="required">*</span>
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
                                        {{ old('class_id') == $classroom->class_id ? 'selected' : '' }}
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

                            <div class="form-text">
                                Only active classes are available.
                            </div>

                        </div>


                        <div class="col-md-6">

                            <label
                                for="enrollment_date"
                                class="form-label"
                            >
                                Enrollment Date <span class="required">*</span>
                            </label>

<input
    type="date"
    name="enrollment_date"
    id="enrollment_date"
    class="form-control @error('enrollment_date') is-invalid @enderror"
    value="{{ old('enrollment_date', now()->format('Y-m-d')) }}"
    required
>

                            @error('enrollment_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-text">
                                Date when the student is enrolled.
                            </div>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Enrollment Status
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="Active"
                                disabled
                            >

                            <div class="form-text">
                                New enrollments are automatically created as active.
                            </div>

                        </div>


                        <div class="col-12">

                            <div class="info-box">

                                <i class="bi bi-info-circle-fill"></i>

                                <div>
                                    A student cannot have two active enrollments
                                    in the same class. If the student is already
                                    actively enrolled, the system will prevent
                                    duplicate enrollment.
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="form-footer">

                    <a
                        href="{{ route('admin.enrollments.index') }}"
                        class="btn-cancel"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="btn-save"
                    >
                        <i class="bi bi-check2 me-1"></i>
                        Create Enrollment
                    </button>

                </div>

            </form>

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

</script>

</body>
</html>
