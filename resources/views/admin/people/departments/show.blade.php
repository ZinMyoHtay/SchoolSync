<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Department | SchoolSync</title>

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

        /* =========================
           MAIN
        ========================== */

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

        /* =========================
           PAGE HEADER
        ========================== */

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
            color: var(--muted);
            font-size: 13px;
            margin-top: 6px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border: 1px solid var(--border);
            background: white;
            color: var(--text);
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

        /* =========================
           DETAIL CARD
        ========================== */

        .detail-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .detail-header {
            padding: 24px 26px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .department-heading {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .department-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .department-name {
            font-family: "Plus Jakarta Sans";
            font-size: 20px;
            font-weight: 800;
            margin: 0;
        }

        .department-id {
            color: var(--muted);
            font-size: 11px;
            margin-top: 4px;
        }

        .detail-body {
            padding: 26px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-item {
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 18px;
            background: #fbfcfe;
        }

        .info-label {
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 700;
            color: var(--text);
        }

        /* =========================
           STATUS
        ========================== */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .status-active {
            background: #e8f8f1;
            color: var(--green);
        }

        .status-inactive {
            background: #fff0f0;
            color: var(--red);
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
        }

        /* =========================
           ACTIONS
        ========================== */

        .action-row {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            padding-top: 22px;
            border-top: 1px solid var(--border);
        }

        .btn-edit {
            background: var(--blue);
            color: white;
            border: none;
            padding: 10px 17px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-edit:hover {
            background: var(--blue-dark);
            color: white;
        }

        .btn-deactivate {
            background: white;
            color: var(--red);
            border: 1px solid #f0b8b8;
            padding: 10px 17px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-deactivate:hover {
            background: #fff4f4;
        }

        .btn-activate {
            background: white;
            color: var(--green);
            border: 1px solid #b8e3d0;
            padding: 10px 17px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-activate:hover {
            background: #f0fbf6;
        }

        /* =========================
           STAFF SECTION
        ========================== */

        .staff-section {
            margin-top: 25px;
        }

        .section-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .section-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-title {
            font-family: "Plus Jakarta Sans";
            font-size: 15px;
            font-weight: 800;
            margin: 0;
        }

        .staff-count {
            color: var(--muted);
            font-size: 11px;
        }

        .staff-table {
            width: 100%;
            border-collapse: collapse;
        }

        .staff-table th {
            background: #f8f9fc;
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 13px 20px;
            font-weight: 700;
        }

        .staff-table td {
            padding: 15px 20px;
            border-top: 1px solid var(--border);
            font-size: 12px;
            vertical-align: middle;
        }

        .staff-name {
            font-weight: 700;
        }

        .staff-role {
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        .empty-state {
            padding: 35px 20px;
            text-align: center;
            color: var(--muted);
        }

        .empty-state i {
            font-size: 32px;
            display: block;
            margin-bottom: 10px;
        }

        .empty-state p {
            margin: 0;
            font-size: 12px;
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

            .info-grid {
                grid-template-columns: 1fr;
            }

            .action-row {
                flex-direction: column;
            }

            .action-row a,
            .action-row button {
                width: 100%;
                justify-content: center;
            }

            .staff-table {
                min-width: 600px;
            }

            .section-card {
                overflow-x: auto;
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

            .detail-header {
                padding: 20px;
            }

            .detail-body {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<!-- =========================
     SIDEBAR
========================== -->

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


<!-- =========================
     MAIN
========================== -->

<div class="main">

    <!-- TOPBAR -->

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


    <!-- CONTENT -->

    <main class="content">

        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>
                <h1 class="page-title">
                    View Department
                </h1>

                <div class="page-subtitle">
                    View department information and assigned staff.
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


        <!-- =========================
             DEPARTMENT DETAILS
        ========================== -->

        <div class="detail-card">

            <div class="detail-header">

                <div class="department-heading">

                    <div class="department-icon">
                        <i class="bi bi-building"></i>
                    </div>

                    <div>

                        <h2 class="department-name">
                            {{ $department->department_name }}
                        </h2>

                        <div class="department-id">
                            Department ID:
                            DEP-{{ str_pad($department->department_id, 3, '0', STR_PAD_LEFT) }}
                        </div>

                    </div>

                </div>


                <!-- STATUS -->

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


            <div class="detail-body">

                <div class="info-grid">

                    <!-- DEPARTMENT ID -->

                    <div class="info-item">

                        <div class="info-label">
                            Department ID
                        </div>

                        <div class="info-value">
                            DEP-{{ str_pad($department->department_id, 3, '0', STR_PAD_LEFT) }}
                        </div>

                    </div>


                    <!-- DEPARTMENT NAME -->

                    <div class="info-item">

                        <div class="info-label">
                            Department Name
                        </div>

                        <div class="info-value">
                            {{ $department->department_name }}
                        </div>

                    </div>


                    <!-- STATUS -->

                    <div class="info-item">

                        <div class="info-label">
                            Status
                        </div>

                        <div class="info-value">

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

                    </div>


                    <!-- STAFF COUNT -->

                    <div class="info-item">

                        <div class="info-label">
                            Staff & Teachers
                        </div>

                        <div class="info-value">
                            {{ $department->staff->count() }} Members
                        </div>

                    </div>

                </div>


                <!-- ACTIONS -->

                <div class="action-row">

                    <a
                        href="{{ route('admin.departments.edit', $department->department_id) }}"
                        class="btn-edit"
                    >
                        <i class="bi bi-pencil-square"></i>
                        Edit 
                    </a>


                    <form
                        action="{{ route('admin.departments.toggle-status', $department->department_id) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PATCH')

                        @if($department->status === 'active')

                            <button
                                type="submit"
                                class="btn-deactivate"
                                onclick="return confirm('Deactivate this department?')"
                            >
                                <i class="bi bi-building-dash"></i>
                                Deactivate 
                            </button>

                        @else

                            <button
                                type="submit"
                                class="btn-activate"
                                onclick="return confirm('Activate this department?')"
                            >
                                <i class="bi bi-building-check"></i>
                                Activate Department
                            </button>

                        @endif

                    </form>

                </div>

            </div>

        </div>


        <!-- =========================
             STAFF MEMBERS
        ========================== -->

        <div class="staff-section">

            <div class="section-card">

                <div class="section-header">

                    <div>
                        <h3 class="section-title">
                            Assigned Staff & Teachers
                        </h3>
                    </div>

                    <div class="staff-count">
                        {{ $department->staff->count() }} members
                    </div>

                </div>


                @if($department->staff->count() > 0)

                    <div class="table-responsive">

                        <table class="staff-table">

                            <thead>

                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Hire Date</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($department->staff as $staff)

                                    <tr>

                                        <td>

                                            <div class="staff-name">
                                                {{ $staff->full_name }}
                                            </div>

                                            @if(isset($staff->staff_code))
                                                <div class="staff-role">
                                                    {{ $staff->staff_code }}
                                                </div>
                                            @endif

                                        </td>

                                        <td>
                                            {{ $staff->position ?? '—' }}
                                        </td>

                                        <td>
                                            {{ $staff->phone ?? '—' }}
                                        </td>

                                        <td>
                                            {{ $staff->hire_date
                                                ? \Carbon\Carbon::parse($staff->hire_date)->format('M d, Y')
                                                : '—'
                                            }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty-state">

                        <i class="bi bi-people"></i>

                        <p>
                            No staff or teachers are currently assigned to this department.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </main>

</div>


<!-- =========================
     JAVASCRIPT
========================== -->

<script>

    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {
        sidebar.classList.toggle("show");
    });

</script>

</body>
</html>

