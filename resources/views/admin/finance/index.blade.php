<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Finance</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

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

        h1, h2, h3, h4, h5, h6 {
            font-family: "Plus Jakarta Sans", sans-serif;
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
            margin-top: 25px;
            padding: 18px 14px 14px;
            border-top: 1px solid rgba(255,255,255,0.08);
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
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 13px;
            margin: 0;
        }

        .create-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--blue);
            color: white;
            padding: 11px 17px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            transition: 0.2s ease;
        }

        .create-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
        }

        .secondary-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            color: var(--blue);
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid #c9ddfa;
            transition: 0.2s ease;
        }

        .secondary-btn:hover {
            background: var(--blue-light);
            color: var(--blue-dark);
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
            box-shadow: var(--shadow);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-icon.blue {
            color: var(--blue);
            background: var(--blue-light);
        }

        .stat-icon.green {
            color: var(--green);
            background: #eefaf5;
        }

        .stat-icon.orange {
            color: var(--orange);
            background: #fff7e9;
        }

        .stat-icon.red {
            color: var(--red);
            background: #fff0f0;
        }

        .stat-label {
            color: var(--muted);
            font-size: 10px;
            font-weight: 600;
        }

        .stat-value {
            font-family: "Plus Jakarta Sans";
            font-size: 20px;
            font-weight: 800;
            color: var(--text);
        }

        .stat-description {
            color: var(--muted);
            font-size: 9px;
            margin-top: 3px;
        }

        .filter-card,
        .management-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
        }

        .filter-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 12px;
        }

        .form-control-custom,
        .form-select-custom {
            width: 100%;
            height: 42px;
            border: 1px solid var(--border);
            background: #f8f9fc;
            border-radius: 9px;
            font-size: 12px;
            outline: none;
        }

        .form-control-custom {
            padding: 0 12px;
        }

        .form-select-custom {
            padding: 0 12px;
            color: var(--text);
        }

        .form-control-custom:focus,
        .form-select-custom:focus {
            background: white;
            border-color: #a9c7f5;
            box-shadow: none;
        }

        .management-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .management-title {
            font-family: "Plus Jakarta Sans";
            font-size: 15px;
            font-weight: 700;
            margin: 0;
        }

        .management-subtitle {
            color: var(--muted);
            font-size: 10px;
            margin-top: 4px;
        }

        .management-actions {
            display: flex;
            gap: 8px;
        }

        .mini-table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .mini-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        .mini-table th {
            background: #f8f9fc;
            color: #738096;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            font-weight: 700;
            padding: 12px 15px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .mini-table td {
            padding: 13px 15px;
            border-bottom: 1px solid var(--border);
            font-size: 12px;
            vertical-align: middle;
        }

        .mini-table tr:last-child td {
            border-bottom: none;
        }

        .mini-table tr:hover {
            background: #fbfcfe;
        }

        .fee-name {
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
        }

        .fee-amount {
            font-size: 11px;
            font-weight: 700;
            color: var(--blue);
        }

        .academic-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 22px;
            border-bottom: 1px solid var(--border);
        }

        .table-title {
            font-family: "Plus Jakarta Sans";
            font-size: 15px;
            font-weight: 700;
            margin: 0;
        }

        .table-header-text {
            font-size: 11px;
            color: var(--muted);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .academic-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        .academic-table thead th {
            background: #f8f9fc;
            color: #738096;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            font-weight: 700;
            padding: 13px 18px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .academic-table tbody td {
            padding: 15px 18px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
            font-size: 12px;
        }

        .academic-table tbody tr:last-child td {
            border-bottom: none;
        }

        .academic-table tbody tr:hover {
            background: #fbfcfe;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            flex-shrink: 0;
        }

        .student-name {
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
        }

        .student-id {
            font-size: 10px;
            color: var(--muted);
            margin-top: 3px;
        }

        .class-badge {
            display: inline-flex;
            padding: 6px 10px;
            border-radius: 20px;
            background: #eef5ff;
            color: var(--blue);
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .fee-type-text {
            color: #5e6a7d;
            font-size: 11px;
        }

        .amount-text {
            color: var(--text);
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .paid-text {
            color: var(--green);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .balance-text {
            color: var(--red);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            font-weight: 600;
        }

        .status-badge.paid {
            color: var(--green);
        }

 
.status-badge.unpaid {
    color: #e55353;
}

.status-badge.unpaid .status-dot {
    background: #e55353;
}


        .status-badge.pending {
            color: var(--orange);
        }

        .status-badge.overdue {
            color: var(--red);
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .status-badge.paid .status-dot {
            background: var(--green);
        }

        .status-badge.pending .status-dot {
            background: var(--orange);
        }

        .status-badge.overdue .status-dot {
            background: var(--red);
        }

        .status-badge.active {
    color: var(--green);
}

.status-badge.inactive {
    color: var(--red);
}

.status-badge.active .status-dot {
    background: var(--green);
}

.status-badge.inactive .status-dot {
    background: var(--red);
}

        .action-group {
            display: flex;
            gap: 6px;
        }

        .action-btn {
            width: 31px;
            height: 31px;
            border: 1px solid var(--border);
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            background: white;
            transition: 0.2s ease;
        }

        .action-btn:hover {
            color: var(--blue);
            background: var(--blue-light);
            border-color: #c9ddfa;
        }

        .action-btn.pay:hover {
            color: var(--green);
            background: #eefaf5;
            border-color: #c8eadb;
        }

        .action-btn.edit:hover {
            color: var(--orange);
            background: #fff7e9;
            border-color: #f4dfb8;
        }

        .action-btn.delete:hover {
            color: var(--red);
            background: #fff0f0;
            border-color: #f3cccc;
        }

        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-top: 1px solid var(--border);
        }

        .table-footer-text {
            font-size: 11px;
            color: var(--muted);
        }

        .empty-state {
            padding: 55px 20px;
            text-align: center;
        }

        .empty-state i {
            font-size: 38px;
            color: var(--green);
        }

        .empty-state-title {
            margin-top: 12px;
            font-size: 13px;
            font-weight: 700;
        }

        .empty-state-text {
            margin-top: 5px;
            color: var(--muted);
            font-size: 11px;
        }

        .alert-custom {
            font-size: 11px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .progress-wrapper {
            margin-top: 16px;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 7px;
        }

        .progress-label {
            color: var(--muted);
            font-size: 10px;
            font-weight: 600;
        }

        .progress-value {
            color: var(--green);
            font-size: 10px;
            font-weight: 700;
        }

        .progress {
            height: 7px;
            background: #edf0f5;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: var(--green);
            border-radius: 10px;
        }

        .modal-content {
            border: none;
            border-radius: 14px;
            box-shadow: 0 15px 45px rgba(16,35,60,0.15);
        }

        .modal-header {
            padding: 20px 22px;
            border-bottom: 1px solid var(--border);
        }

        .modal-title {
            font-family: "Plus Jakarta Sans";
            font-size: 16px;
            font-weight: 700;
        }

        .modal-body {
            padding: 22px;
        }

        .modal-footer {
            padding: 15px 22px;
            border-top: 1px solid var(--border);
        }

        .form-label-custom {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 7px;
        }

        .modal .form-control,
        .modal .form-select {
            height: 42px;
            border: 1px solid var(--border);
            background: #f8f9fc;
            border-radius: 9px;
            font-size: 12px;
        }

        .modal .form-control:focus,
        .modal .form-select:focus {
            background: white;
            border-color: #a9c7f5;
            box-shadow: none;
        }

        .btn-modal-primary {
            background: var(--blue);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 9px 15px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-modal-primary:hover {
            background: var(--blue-dark);
            color: white;
        }

        .btn-modal-secondary {
            background: white;
            color: var(--muted);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 9px 15px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-modal-secondary:hover {
            background: #f8f9fc;
            color: var(--text);
        }

        .btn-modal-danger {
            background: var(--red);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 9px 15px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-modal-danger:hover {
            background: #c94141;
            color: white;
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

            .stats-row {
                grid-template-columns: repeat(2, 1fr);
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

            .create-btn {
                width: 100%;
                justify-content: center;
            }

            .filter-row {
                grid-template-columns: 1fr;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }

            .table-header,
            .table-footer,
            .management-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .management-actions {
                width: 100%;
            }

            .secondary-btn {
                width: 100%;
                justify-content: center;
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

        <a href="{{ route('admin.finance.index') }}" class="menu-link active">
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

                <span>
                    Logout
                </span>
            </button>
        </form>

    </div>

</aside>

<main class="main">

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



                <i class="bi bi-chevron-down text-muted small"></i>

            </div>

        </div>

    </header>

    <section class="content">

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Finance & Payments
                </h1>

                <p class="page-subtitle">
                    Manage SchoolSync student fees, payments and outstanding balances.
                </p>

            </div>

            <a
                href="{{ route('admin.finance.create') }}"
                class="create-btn"
            >
                <i class="bi bi-plus-lg"></i>
                Record Payment
            </a>

        </div>

        @if(session('success'))
            <div class="alert alert-success alert-custom">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-custom">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-custom">
                {{ $errors->first() }}
            </div>
        @endif

        @php
            $collectionPercentage = 0;

            if ((float) $totalFees > 0) {
                $collectionPercentage = round(
                    ((float) $paidAmount / (float) $totalFees) * 100
                );

                $collectionPercentage = max(
                    0,
                    min(100, $collectionPercentage)
                );
            }
        @endphp

        <div class="stats-row">

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Total Fees
                        </div>

                        <div class="stat-value">
                            ${{ number_format((float) $totalFees, 2) }}
                        </div>

                        <div class="stat-description">
                            Total assigned student fees
                        </div>

                    </div>

                    <div class="stat-icon blue">
                        <i class="bi bi-receipt"></i>
                    </div>

                </div>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Paid Amount
                        </div>

                        <div class="stat-value">
                            ${{ number_format((float) $paidAmount, 2) }}
                        </div>

                        <div class="stat-description">
                            Total payments received
                        </div>

                    </div>

                    <div class="stat-icon green">
                        <i class="bi bi-check-circle"></i>
                    </div>

                </div>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            Outstanding
                        </div>

                        <div class="stat-value">
                            ${{ number_format((float) $outstandingAmount, 2) }}
                        </div>

                        <div class="stat-description">
                            Remaining student balances
                        </div>

                    </div>

                    <div class="stat-icon orange">
                        <i class="bi bi-hourglass-split"></i>
                    </div>

                </div>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div>

                        <div class="stat-label">
                            This Month
                        </div>

                        <div class="stat-value">
                            ${{ number_format((float) $paymentsThisMonth, 2) }}
                        </div>

                        <div class="stat-description">
                            Payments received this month
                        </div>

                    </div>

                    <div class="stat-icon red">
                        <i class="bi bi-calendar-check"></i>
                    </div>

                </div>

            </div>

        </div>

        <div class="filter-card">

            <form
                method="GET"
                action="{{ route('admin.finance.index') }}"
                id="financeFilterForm"
            >

                <div class="filter-row">

                    <div>

                        <input
                            type="text"
                            name="search"
                            class="form-control-custom"
                            placeholder="Search student, ID or payment..."
                            value="{{ request('search') }}"
                            id="financeSearch"
                        >

                    </div>

                    <div>

                        <select
                            name="fee_type_id"
                            class="form-select-custom"
                            onchange="document.getElementById('financeFilterForm').submit()"
                        >

                            <option value="">
                                All Fee Types
                            </option>

                            @foreach($feeTypes as $feeType)

                                <option
                                    value="{{ $feeType->fee_type_id }}"
                                    {{ request('fee_type_id') == $feeType->fee_type_id ? 'selected' : '' }}
                                >
                                    {{ $feeType->fee_name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <select
                            name="status"
                            class="form-select-custom"
                            onchange="document.getElementById('financeFilterForm').submit()"
                        >

                            <option value="">
                                All Status
                            </option>

                            <option
                                value="Paid"
                                {{ request('status') === 'Paid' ? 'selected' : '' }}
                            >
                                Paid
                            </option>

                            <option
                                value="Pending"
                                {{ request('status') === 'Pending' ? 'selected' : '' }}
                            >
                                Partially Paid

                            </option>

                           
<option
    value="Unpaid"
    {{ request('status') === 'Unpaid' ? 'selected' : '' }}
>
    Unpaid
</option>


                            <option
                                value="Overdue"
                                {{ request('status') === 'Overdue' ? 'selected' : '' }}
                            >
                                Overdue
                            </option>

                        </select>

                    </div>

                </div>

            </form>

        </div>

        <div class="management-card">

            <div class="management-header">

                <div>

                    <h3 class="management-title">
                        Fee Types
                    </h3>

                    <div class="management-subtitle">
                        Manage the fee types and default amounts used by SchoolSync.
                    </div>

                </div>

                <div class="management-actions">

                    <button
                        type="button"
                        class="secondary-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#assignStudentFeeModal"
                    >
                        <i class="bi bi-person-plus"></i>
                        Assign Student Fee
                    </button>

                    <button
                        type="button"
                        class="create-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#addFeeTypeModal"
                    >
                        <i class="bi bi-plus-lg"></i>
                        Add Fee Type
                    </button>

                </div>

            </div>

            <div class="mini-table-wrapper">

                <table class="mini-table">

                    <thead>

                        <tr>

                            <th>
                                Fee Name
                            </th>

                            <th>
                                Default Amount
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($feeTypes as $feeType)

                            <tr>

                                <td>

                                    <div class="fee-name">
                                        {{ $feeType->fee_name }}
                                    </div>

                                </td>

<td>

    <span class="fee-amount">
        ${{ number_format((float) $feeType->default_amount, 2) }}
    </span>

</td>

<td>

    @if($feeType->status === 'active')

        <span class="status-badge active">
            <span class="status-dot"></span>
            Active
        </span>

    @else

        <span class="status-badge inactive">
            <span class="status-dot"></span>
            Inactive
        </span>

    @endif

</td>

<td>

                                <td>

                                    <div class="action-group">

                                        <button
                                            type="button"
                                            class="action-btn edit"
                                            title="Edit Fee Type"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editFeeTypeModal{{ $feeType->fee_type_id }}"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                      <form
    action="{{ route('admin.finance.fee-types.destroy', $feeType->fee_type_id) }}"
    method="POST"
>

    @csrf
    @method('DELETE')

    @if($feeType->status === 'active')

        <button
            type="submit"
            class="action-btn delete"
            title="Deactivate Fee Type"
        >
            <i class="bi bi-toggle-on"></i>
        </button>

    @else

        <button
            type="submit"
            class="action-btn pay"
            title="Activate Fee Type"
        >
            <i class="bi bi-toggle-off"></i>
        </button>

    @endif

</form>  

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4">

                                    <div class="empty-state">

                                        <i class="bi bi-receipt"></i>

                                        <div class="empty-state-title">
                                            No fee types found
                                        </div>

                                        <div class="empty-state-text">
                                            Add your first fee type to start assigning student fees.
                                        </div>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="academic-card">

            <div class="table-header">

                <div>

                    <h3 class="table-title">
        
                    Outstanding Fees
                    </h3>

                    <div class="progress-wrapper">

                        <div class="progress-info">

                            <span class="progress-label">
                                Collection Progress
                            </span>

                            <span class="progress-value">
                                {{ $collectionPercentage }}%
                            </span>

                        </div>

                        <div
                            class="progress"
                            data-progress="{{ $collectionPercentage }}"
                        >

                            <div
                                class="progress-bar"
                                id="collectionProgress"
                            ></div>

                        </div>

                    </div>

                </div>

                <span class="table-header-text">

                    {{ $financeRecords->count() }}

                    {{ $financeRecords->count() === 1 ? 'record' : 'records' }}

                </span>

            </div>

            <div class="table-wrapper">

                <table class="academic-table">

                    <thead>

                        <tr>

                            <th>
                                Student
                            </th>

                            <th>
                                Class
                            </th>

                            <th>
                                Fee Type
                            </th>

                            <th>
                                Amount Due
                            </th>

                            <th>
                                Amount Paid
                            </th>

                            <th>
                                Balance
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($financeRecords as $studentFee)

                            @php

                                $enrollment =
                                    $studentFee->student?->enrollments
                                        ?->sortByDesc('enrollment_id')
                                        ->first();

                                $className =
                                    $enrollment?->classroom?->class_name
                                    ?? 'Not assigned';

                            @endphp

                            <tr>

                                <td>

                                    <div class="student-info">

                                        <div class="student-avatar">
                                            <i class="bi bi-person"></i>
                                        </div>

                                        <div>

                                            <div class="student-name">
                                                {{ $studentFee->student->full_name ?? 'Unknown Student' }}
                                            </div>

                                            <div class="student-id">
                                                {{ $studentFee->student->student_code ?? 'No ID' }}
                                            </div>

                                        </div>

                                    </div>

                                </td>

                                <td>

                                    <span class="class-badge">
                                        {{ $className }}
                                    </span>

                                </td>

                                <td>

                                    <span class="fee-type-text">
                                        {{ $studentFee->feeType->fee_name ?? '—' }}
                                    </span>

                                </td>

                                <td>

                                    <span class="amount-text">
                                        ${{ number_format((float) $studentFee->total_fee, 2) }}
                                    </span>

                                </td>

                                <td>

                                    <span class="paid-text">
                                        ${{ number_format((float) $studentFee->total_paid, 2) }}
                                    </span>

                                </td>

                                <td>

                                    <span class="balance-text">
                                        ${{ number_format((float) $studentFee->balance, 2) }}
                                    </span>

                                </td>

<td>
    @if((float) $studentFee->balance <= 0)
        <span class="status-badge paid">
            <span class="status-dot"></span>
            Paid
        </span>

    @elseif((float) $studentFee->total_paid <= 0)
        <span class="status-badge unpaid">
            <span class="status-dot"></span>
            Unpaid
        </span>

    @elseif($studentFee->payment_status === 'Overdue')
        <span class="status-badge overdue">
            <span class="status-dot"></span>
            Overdue
        </span>

    @else
        <span class="status-badge pending">
            <span class="status-dot"></span>
            Partially Paid
        </span>
    @endif
</td>


                                <td>

                                    <div class="action-group">

                                        @if((float) $studentFee->balance > 0)

                                            <a
                                                href="{{ route('admin.finance.create', ['student_fee_id' => $studentFee->student_fee_id]) }}"
                                                class="action-btn pay"
                                                title="Record Payment"
                                            >
                                                <i class="bi bi-credit-card"></i>
                                            </a>

                                        @endif

                                        <a
                                            href="{{ route('admin.finance.show', $studentFee->student_fee_id) }}"
                                            class="action-btn"
                                            title="View"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8">

                                    <div class="empty-state">

                                        <i class="bi bi-check-circle"></i>

                                        <div class="empty-state-title">
                                            No finance records found
                                        </div>

                                        <div class="empty-state-text">
                                            There are currently no student fee records matching your filters.
                                        </div>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="table-footer">

                <div class="table-footer-text">

                    Showing

                    {{ $financeRecords->count() }}

                    {{ $financeRecords->count() === 1 ? 'finance record' : 'finance records' }}

                </div>

                <div class="table-footer-text">

                    Outstanding:

                    <strong>
                        ${{ number_format((float) $outstandingAmount, 2) }}
                    </strong>

                </div>

            </div>

        </div>

    </section>

</main>

@foreach($feeTypes as $feeType)

    <div
        class="modal fade"
        id="editFeeTypeModal{{ $feeType->fee_type_id }}"
        tabindex="-1"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <form
                    action="{{ route('admin.finance.fee-types.update', $feeType->fee_type_id) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')

                    <div class="modal-header">

                        <h5 class="modal-title">
                            Edit Fee Type
                        </h5>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                        ></button>

                    </div>

                    <div class="modal-body">

                        <div class="mb-3">

                            <label class="form-label-custom">
                                Fee Name
                            </label>

                            <input
                                type="text"
                                name="fee_name"
                                class="form-control"
                                value="{{ $feeType->fee_name }}"
                                required
                            >

                        </div>

                        <div>

                            <label class="form-label-custom">
                                Default Amount
                            </label>

                            <input
                                type="number"
                                name="default_amount"
                                class="form-control"
                                value="{{ $feeType->default_amount }}"
                                min="0"
                                step="0.01"
                                required
                            >

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn-modal-secondary"
                            data-bs-dismiss="modal"
                        >
                            Cancel
                        </button>

                        <button
                            type="submit"
                            class="btn-modal-primary"
                        >
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endforeach

<div
    class="modal fade"
    id="addFeeTypeModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <form
                action="{{ route('admin.finance.fee-types.store') }}"
                method="POST"
            >

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title">
                        Add Fee Type
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                    ></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label-custom">
                            Fee Name
                        </label>

                        <input
                            type="text"
                            name="fee_name"
                            class="form-control"
                            placeholder="Example: Tuition Fee"
                            required
                        >

                    </div>

                    <div>

                        <label class="form-label-custom">
                            Default Amount
                        </label>

                        <input
                            type="number"
                            name="default_amount"
                            class="form-control"
                            placeholder="Example: 500000"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn-modal-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="btn-modal-primary"
                    >
                        Create Fee Type
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<div
    class="modal fade"
    id="assignStudentFeeModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <form
                action="{{ route('admin.finance.student-fees.store') }}"
                method="POST"
            >

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title">
                        Assign Student Fee
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                    ></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label-custom">
                            Student
                        </label>

                        <select
                            name="student_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Student
                            </option>

                            @foreach($students as $student)

                                <option value="{{ $student->student_id }}">
                                    {{ $student->full_name }}
                                    @if($student->student_code)
                                        — {{ $student->student_code }}
                                    @endif
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label-custom">
                            Fee Type
                        </label>

                        <select
                            name="fee_type_id"
                            class="form-select"
                            id="assignFeeType"
                            required
                        >

                            <option value="">
                                Select Fee Type
                            </option>

                            @foreach($activeFeeTypes as $feeType)

                                <option
                                    value="{{ $feeType->fee_type_id }}"
                                    data-amount="{{ $feeType->default_amount }}"
                                >
                                    {{ $feeType->fee_name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label-custom">
                            Academic Year
                        </label>

                        <select
                            name="academic_year_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Academic Year
                            </option>

                            @foreach($academicYears as $academicYear)

                                <option value="{{ $academicYear->academic_year_id }}">
                                    {{ $academicYear->year_name ?? $academicYear->academic_year ?? $academicYear->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <label class="form-label-custom">
                            Amount
                        </label>

                        <input
                            type="number"
                            name="net_amount"
                            class="form-control"
                            id="assignFeeAmount"
                            min="0.01"
                            step="0.01"
                            placeholder="Enter fee amount"
                            required
                        >

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn-modal-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="btn-modal-primary"
                    >
                        Assign Fee
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

    const mobileMenu =
        document.getElementById('mobileMenu');

    const sidebar =
        document.getElementById('sidebar');

    if (mobileMenu && sidebar) {

        mobileMenu.addEventListener('click', function () {

            sidebar.classList.toggle('show');

        });

    }

    const financeSearch =
        document.getElementById('financeSearch');

    if (financeSearch) {

        financeSearch.addEventListener(
            'keydown',
            function (event) {

                if (event.key === 'Enter') {

                    event.preventDefault();

                    document
                        .getElementById('financeFilterForm')
                        .submit();

                }

            }
        );

    }

    const progress =
        document.querySelector('.progress');

    const progressBar =
        document.getElementById('collectionProgress');

    if (progress && progressBar) {

        const percentage =
            progress.getAttribute('data-progress');

        progressBar.style.width =
            percentage + '%';

    }

    const assignFeeType =
        document.getElementById('assignFeeType');

    const assignFeeAmount =
        document.getElementById('assignFeeAmount');

    if (assignFeeType && assignFeeAmount) {

        assignFeeType.addEventListener(
            'change',
            function () {

                const selectedOption =
                    this.options[this.selectedIndex];

                const amount =
                    selectedOption.getAttribute('data-amount');

                if (amount) {
                    assignFeeAmount.value = amount;
                }

            }
        );

    }

</script>

</body>
</html>