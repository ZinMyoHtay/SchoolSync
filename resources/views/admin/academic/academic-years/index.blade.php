<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academic Years | SchoolSync</title>

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
            font-size: 12px;
            margin-top: 6px;
        }

        .create-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--blue);
            color: white;
            padding: 11px 17px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            box-shadow: 0 7px 18px rgba(23,105,224,0.20);
            transition: 0.2s ease;
        }

        .create-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
        }

        .stat-value {
            font-family: "Plus Jakarta Sans";
            font-size: 25px;
            font-weight: 800;
            margin-top: 8px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--blue-light);
            color: var(--blue);
            font-size: 18px;
        }

        .filter-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
            box-shadow: var(--shadow);
            margin-bottom: 20px;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9aa5b5;
        }

        .search-box input,
        .filter-select {
            width: 100%;
            height: 43px;
            border: 1px solid var(--border);
            background: #f8f9fc;
            border-radius: 9px;
            padding: 0 13px;
            font-size: 12px;
            outline: none;
        }

        .search-box input {
            padding-left: 40px;
        }

        .search-box input:focus,
        .filter-select:focus {
            border-color: #a9c7f5;
            background: white;
        }

        .table-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .table-header {
            padding: 20px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            font-family: "Plus Jakarta Sans";
            font-size: 14px;
            font-weight: 800;
        }

        .table-count {
            color: var(--muted);
            font-size: 11px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            background: #fafbfc;
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .6px;
            font-weight: 700;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        tbody td {
            padding: 16px 20px;
            border-bottom: 1px solid #f0f2f6;
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #fbfcfe;
        }

        .year-name {
            font-weight: 700;
            color: var(--text);
        }

        .year-id {
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        .class-count {
            font-weight: 700;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-active {
            background: #e9f8f1;
            color: var(--green);
        }

        .status-inactive {
            background: #fdeeee;
            color: var(--red);
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            background: white;
            color: var(--muted);
            text-decoration: none;
            transition: .2s ease;
        }

        .action-btn:hover {
            color: var(--blue);
            background: var(--blue-light);
            border-color: #c8daf7;
        }

        .action-form {
            display: inline;
            margin: 0;
        }

        .action-btn.deactivate:hover {
            color: var(--red);
            background: #fdeeee;
            border-color: #f3caca;
        }

        .action-btn.activate:hover {
            color: var(--green);
            background: #e9f8f1;
            border-color: #c7ead9;
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 15px;
            border-radius: 15px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .empty-state h5 {
            font-family: "Plus Jakarta Sans";
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 18px;
        }

        .alert-success {
            border: none;
            border-radius: 10px;
            font-size: 12px;
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

            .stats-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767px) {
            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .create-btn {
                width: 100%;
                justify-content: center;
            }

            .table-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 5px;
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

        <a href="{{ route('admin.academic-years.index') }}"
           class="menu-link active">
            <i class="bi bi-calendar3"></i>
            Academic Years
        </a>

        <a href="{{ route('admin.classes.index') }}"
           class="menu-link">
            <i class="bi bi-diagram-3"></i>
            Classes
        </a>

        <a href="{{ route('admin.subjects.index') }}"
           class="menu-link">
            <i class="bi bi-book"></i>
            Subjects
        </a>

        <a href="{{ route('admin.enrollments.index') }}"
           class="menu-link">
            <i class="bi bi-card-checklist"></i>
            Enrollments
        </a>

        <a href="{{ route('admin.attendance.index') }}"
           class="menu-link">
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

    <header class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button class="mobile-btn" id="mobileMenu">
                <i class="bi bi-list"></i>
            </button>

            <div class="search">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search anything...">
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

    </header>

    <main class="content">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        <div class="page-header">

            <div>
                <h1 class="page-title">
                    Academic Years
                </h1>

                <div class="page-subtitle">
                    Manage SchoolSync academic years and their class schedules.
                </div>
            </div>

            <a href="{{ route('admin.academic-years.create') }}"
               class="create-btn">

                <i class="bi bi-plus-lg"></i>
                Add Academic Year

            </a>

        </div>

        <div class="stats-row">

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label">
                            Total Academic Years
                        </div>

                        <div class="stat-value">
                            {{ $academicYears->count() }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-calendar3"></i>
                    </div>

                </div>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label">
                            Active Years
                        </div>

                        <div class="stat-value">
                            {{ $academicYears->where('status', 'active')->count() }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>

                </div>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label">
                            Inactive Years
                        </div>

                        <div class="stat-value">
                            {{ $academicYears->where('status', 'inactive')->count() }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-pause-circle"></i>
                    </div>

                </div>

            </div>

        </div>

        <div class="filter-card">

            <form action="{{ route('admin.academic-years.index') }}"
                  method="GET">

                <div class="row g-3">

                    <div class="col-lg-8">

                        <div class="search-box">

                            <i class="bi bi-search"></i>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search academic years..."
                            >

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <select name="status"
                                class="filter-select"
                                onchange="this.form.submit()">

                            <option value="">
                                All Years
                            </option>

                            <option value="active"
                                {{ request('status') === 'active' ? 'selected' : '' }}>
                                Active Years
                            </option>

                            <option value="inactive"
                                {{ request('status') === 'inactive' ? 'selected' : '' }}>
                                Inactive Years
                            </option>

                        </select>

                    </div>

                </div>

            </form>

        </div>

        <div class="table-card">

            <div class="table-header">

                <div class="table-title">
                    Academic Year List
                </div>

                <div class="table-count">
                    {{ $academicYears->count() }} records
                </div>

            </div>

            <div class="table-responsive">

                <table>

                    <thead>
                        <tr>
                            <th>Academic Year</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Classes</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($academicYears as $academicYear)

                        <tr>

                            <td>
                                <div class="year-name">
                                    {{ \Carbon\Carbon::parse($academicYear->start_date)->format('Y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($academicYear->end_date)->format('Y') }}
                                </div>

                                <div class="year-id">
                                    ID #{{ $academicYear->academic_year_id }}
                                </div>
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($academicYear->start_date)->format('M d, Y') }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($academicYear->end_date)->format('M d, Y') }}
                            </td>

                            <td>
                                <span class="class-count">
                                    {{ $academicYear->classrooms()->count() }}
                                </span>
                            </td>

                            <td>

                                @if($academicYear->status === 'active')

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

                            </td>

                            <td>

                                <div class="actions">

                                    <a href="{{ route('admin.academic-years.show', $academicYear->academic_year_id) }}"
                                       class="action-btn"
                                       title="View">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                    <a href="{{ route('admin.academic-years.edit', $academicYear->academic_year_id) }}"
                                       class="action-btn"
                                       title="Edit">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <form
                                        action="{{ route('admin.academic-years.toggle-status', $academicYear->academic_year_id) }}"
                                        method="POST"
                                        class="action-form"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        @if($academicYear->status === 'active')

                                            <button type="submit"
                                                    class="action-btn deactivate"
                                                    title="Deactivate"
                                                    onclick="return confirm('Deactivate this academic year?')">

                                                <i class="bi bi-pause-circle"></i>

                                            </button>

                                        @else

                                            <button type="submit"
                                                    class="action-btn activate"
                                                    title="Activate">

                                                <i class="bi bi-play-circle"></i>

                                            </button>

                                        @endif

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="bi bi-calendar3"></i>
                                    </div>

                                    <h5>
                                        No Academic Years Found
                                    </h5>

                                    <p>
                                        Create your first academic year to start managing classes.
                                    </p>

                                    <a href="{{ route('admin.academic-years.create') }}"
                                       class="create-btn">

                                        <i class="bi bi-plus-lg"></i>
                                        Add Academic Year

                                    </a>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {
        sidebar.classList.toggle("show");
    });
</script>

</body>
</html>
