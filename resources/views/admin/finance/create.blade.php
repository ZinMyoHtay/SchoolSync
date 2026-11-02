<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Record Payment</title>

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

        .status-badge.pending {
            color: var(--orange);
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

        .payment-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-top: 20px;
        }

        .payment-form {
            padding: 22px;
        }

        .form-label-custom {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 7px;
        }

        .form-control-custom {
            width: 100%;
            height: 42px;
            border: 1px solid var(--border);
            background: #f8f9fc;
            border-radius: 9px;
            padding: 0 12px;
            font-size: 12px;
            color: var(--text);
            outline: none;
        }

        .form-control-custom:focus {
            background: white;
            border-color: #a9c7f5;
            box-shadow: none;
        }

        .selected-fee {
            background: var(--blue-light);
            border: 1px solid #d8e7fc;
            border-radius: 10px;
            padding: 15px 17px;
            margin-bottom: 20px;
        }

        .selected-fee-title {
            color: var(--blue);
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .selected-fee-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .selected-fee-item span {
            display: block;
            color: var(--muted);
            font-size: 9px;
            margin-bottom: 4px;
        }

        .selected-fee-item strong {
            color: var(--text);
            font-size: 11px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid var(--border);
        }

        .cancel-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: white;
            color: var(--muted);
            border: 1px solid var(--border);
            padding: 10px 16px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 600;
        }

        .cancel-btn:hover {
            color: var(--text);
            background: #f8f9fc;
        }

        .record-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--blue);
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 600;
        }

        .record-btn:hover {
            background: var(--blue-dark);
            color: white;
        }

        .alert-custom {
            font-size: 11px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .invalid-feedback {
            display: block;
            font-size: 10px;
            margin-top: 5px;
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

            .selected-fee-grid {
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

            .table-header,
            .table-footer {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .selected-fee-grid {
                grid-template-columns: 1fr;
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
                    Record Payment
                </h1>

                <p class="page-subtitle">
                    Select an outstanding student fee and record the payment.
                </p>

            </div>


            <a
                href="{{ route('admin.finance.index') }}"
                class="create-btn"
            >

                <i class="bi bi-arrow-left"></i>

                Back to Finance

            </a>

        </div>


        @if($errors->any())

            <div class="alert alert-danger alert-custom">

                <ul class="mb-0 ps-3">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="academic-card">

            <div class="table-header">

                <h3 class="table-title">
                    Outstanding Fees
                </h3>

                <span class="table-header-text">

                    {{ $studentFees->filter(function ($studentFee) {

                        $totalFee =
                            (float) $studentFee->net_amount;

                        $totalPaid =
                            (float) $studentFee->payments->sum('amount_paid');

                        return ($totalFee - $totalPaid) > 0;

                    })->count() }}

                    outstanding
                    {{ $studentFees->filter(function ($studentFee) {

                        $totalFee =
                            (float) $studentFee->net_amount;

                        $totalPaid =
                            (float) $studentFee->payments->sum('amount_paid');

                        return ($totalFee - $totalPaid) > 0;

                    })->count() === 1 ? 'fee' : 'fees' }}

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

                        @forelse($studentFees as $studentFee)

                            @php

                                $totalFee =
                                    (float) $studentFee->net_amount;

                                $totalPaid =
                                    (float) $studentFee->payments->sum('amount_paid');

                                $balance =
                                    max($totalFee - $totalPaid, 0);

                                $enrollment =
                                    $studentFee->student?->enrollments
                                        ?->sortByDesc('enrollment_id')
                                        ->first();

                                $className =
                                    $enrollment?->classroom?->class_name
                                    ?? 'Not assigned';

                            @endphp


                            @if($balance > 0)

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

                                            ${{ number_format($totalFee, 2) }}

                                        </span>

                                    </td>


                                    <td>

                                        <span class="paid-text">

                                            ${{ number_format($totalPaid, 2) }}

                                        </span>

                                    </td>


                                    <td>

                                        <span class="balance-text">

                                            ${{ number_format($balance, 2) }}

                                        </span>

                                    </td>


                                    <td>

                                        <span class="status-badge pending">

                                            <span class="status-dot"></span>

                                            Partially Paid

                                        </span>

                                    </td>


                                    <td>

                                        <div class="action-group">

                                            <a
                                                href="{{ route('admin.finance.create', ['student_fee_id' => $studentFee->student_fee_id]) }}"
                                                class="action-btn pay"
                                                title="Pay"
                                            >

                                                <i class="bi bi-credit-card"></i>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endif

                        @empty

                            <tr>

                                <td colspan="8">

                                    <div class="empty-state">

                                        <i class="bi bi-check-circle"></i>

                                        <div class="empty-state-title">
                                            No outstanding fees
                                        </div>

                                        <div class="empty-state-text">
                                            All student fees have been paid.
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
                    Select a student fee to record a payment.
                </div>

            </div>

        </div>


        @if(request('student_fee_id'))

            @php

                $selectedFee =
                    $studentFees->firstWhere(
                        'student_fee_id',
                        request('student_fee_id')
                    );

            @endphp


            @if($selectedFee)

                @php

                    $selectedTotal =
                        (float) $selectedFee->net_amount;

                    $selectedPaid =
                        (float) $selectedFee->payments->sum('amount_paid');

                    $selectedBalance =
                        max($selectedTotal - $selectedPaid, 0);

                    $selectedEnrollment =
                        $selectedFee->student?->enrollments
                            ?->sortByDesc('enrollment_id')
                            ->first();

                    $selectedClass =
                        $selectedEnrollment?->classroom?->class_name
                        ?? 'Not assigned';

                @endphp


                <div class="payment-card">

                    <div class="table-header">

                        <h3 class="table-title">
                            Payment Information
                        </h3>

                        <span class="table-header-text">
                            Selected fee
                        </span>

                    </div>


                    <div class="payment-form">


                        <div class="selected-fee">

                            <div class="selected-fee-title">
                                Selected Student Fee
                            </div>


                            <div class="selected-fee-grid">

                                <div class="selected-fee-item">

                                    <span>
                                        Student
                                    </span>

                                    <strong>
                                        {{ $selectedFee->student->full_name ?? 'Unknown Student' }}
                                    </strong>

                                </div>


                                <div class="selected-fee-item">

                                    <span>
                                        Class
                                    </span>

                                    <strong>
                                        {{ $selectedClass }}
                                    </strong>

                                </div>


                                <div class="selected-fee-item">

                                    <span>
                                        Fee Type
                                    </span>

                                    <strong>
                                        {{ $selectedFee->feeType->fee_name ?? '—' }}
                                    </strong>

                                </div>


                                <div class="selected-fee-item">

                                    <span>
                                        Balance
                                    </span>

                                    <strong>
                                        ${{ number_format($selectedBalance, 2) }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        @if($selectedBalance > 0)

                            <form
                                action="{{ route('admin.finance.store') }}"
                                method="POST"
                            >

                                @csrf


                                <input
                                    type="hidden"
                                    name="student_fee_id"
                                    value="{{ $selectedFee->student_fee_id }}"
                                >


                                <div class="row g-3">


                                    <div class="col-md-6">

                                        <label class="form-label-custom">
                                            Amount Paid
                                        </label>

                                        <input
                                            type="number"
                                            name="amount_paid"
                                            class="form-control-custom"
                                            value="{{ old('amount_paid') }}"
                                            min="0.01"
                                            max="{{ $selectedBalance }}"
                                            step="0.01"
                                            placeholder="Enter payment amount"
                                            required
                                        >

                                        @error('amount_paid')

                                            <div class="invalid-feedback text-danger">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    <div class="col-md-6">

                                        <label class="form-label-custom">
                                            Payment Date
                                        </label>

                                        <input
                                            type="date"
                                            name="payment_date"
                                            class="form-control-custom"
                                            value="{{ old('payment_date', date('Y-m-d')) }}"
                                            required
                                        >

                                        @error('payment_date')

                                            <div class="invalid-feedback text-danger">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                </div>


                                <div class="form-actions">

                                    <a
                                        href="{{ route('admin.finance.create') }}"
                                        class="cancel-btn"
                                    >

                                        <i class="bi bi-x-lg"></i>

                                        Cancel

                                    </a>


                                    <button
                                        type="submit"
                                        class="record-btn"
                                    >

                                        <i class="bi bi-check-lg"></i>

                                        Record Payment

                                    </button>

                                </div>

                            </form>

                        @else

                            <div class="alert alert-success alert-custom mb-0">

                                <i class="bi bi-check-circle me-1"></i>

                                This fee has already been fully paid.

                            </div>

                        @endif

                    </div>

                </div>

            @endif

        @endif


    </section>

</main>


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

</script>

</body>
</html>

