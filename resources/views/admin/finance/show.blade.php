<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Finance Details</title>

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
        ========================= */

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

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 270px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */

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
        ========================= */

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

        .header-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn,
        .create-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 17px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .back-btn {
            background: white;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .back-btn:hover {
            color: var(--blue);
            background: var(--blue-light);
            border-color: #c9ddfa;
        }

        .create-btn {
            background: var(--blue);
            color: white;
            border: none;
        }

        .create-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
        }

        /* =========================
           INFORMATION CARDS
        ========================= */

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .info-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-header {
            padding: 20px 22px;
            border-bottom: 1px solid var(--border);
        }

        .card-title {
            font-family: "Plus Jakarta Sans";
            font-size: 15px;
            font-weight: 700;
            margin: 0;
        }

        .card-subtitle {
            color: var(--muted);
            font-size: 11px;
            margin-top: 4px;
        }

        .card-body {
            padding: 20px 22px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 11px 0;
            border-bottom: 1px solid var(--border);
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-row:first-child {
            padding-top: 0;
        }

        .info-label {
            color: var(--muted);
            font-size: 11px;
        }

        .info-value {
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
            text-align: right;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .student-avatar {
            width: 44px;
            height: 44px;
            border-radius: 11px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .student-name {
            font-size: 13px;
            font-weight: 700;
        }

        .student-id {
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        /* =========================
           STATUS
        ========================= */

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

        /* =========================
           AMOUNT SUMMARY
        ========================= */

        .amount-summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .amount-box {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .amount-label {
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .amount-value {
            color: var(--text);
            font-family: "Plus Jakarta Sans";
            font-size: 22px;
            font-weight: 800;
        }

        .amount-value.paid {
            color: var(--green);
        }

        .amount-value.balance {
            color: var(--orange);
        }

        /* =========================
           PAYMENT HISTORY
        ========================= */

        .payment-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .payment-table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .payment-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        .payment-table thead th {
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

        .payment-table tbody td {
            padding: 15px 18px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
            font-size: 12px;
        }

        .payment-table tbody tr:last-child td {
            border-bottom: none;
        }

        .payment-table tbody tr:hover {
            background: #fbfcfe;
        }

        .payment-number {
            color: var(--muted);
            font-size: 11px;
        }

        .payment-date {
            color: var(--text);
            font-size: 11px;
            font-weight: 500;
        }

        .payment-amount {
            color: var(--green);
            font-size: 12px;
            font-weight: 700;
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-state i {
            color: #b5bfce;
            font-size: 35px;
        }

        .empty-state-title {
            color: var(--text);
            font-size: 13px;
            font-weight: 700;
            margin-top: 10px;
        }

        .empty-state-text {
            color: var(--muted);
            font-size: 11px;
            margin-top: 4px;
        }

        /* =========================
           FOOTER ACTIONS
        ========================= */

        .bottom-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 20px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

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

            .info-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 767px) {

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .header-actions {
                width: 100%;
            }

            .back-btn,
            .create-btn {
                flex: 1;
                justify-content: center;
            }

            .amount-summary {
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

            .header-actions {
                flex-direction: column;
            }

            .back-btn,
            .create-btn {
                width: 100%;
            }

            .info-row {
                align-items: flex-start;
                flex-direction: column;
                gap: 5px;
            }

            .info-value {
                text-align: left;
            }

        }

    </style>

</head>

<body>

<!-- =========================
     SIDEBAR
========================= -->

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

        <a
            href="{{ url('/admin/dashboard') }}"
            class="menu-link"
        >
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>


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


        <div class="sidebar-section">
            Finance
        </div>

        <a
            href="{{ route('admin.finance.index') }}"
            class="menu-link active"
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


<!-- =========================
     MAIN
========================= -->

<main class="main">


    <!-- TOPBAR -->

    <header class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button
                class="mobile-btn"
                id="mobileMenu"
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

            <a
                href="#"
                class="top-icon"
            >
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


    <!-- CONTENT -->

    <section class="content">


        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Finance Details
                </h1>

                <p class="page-subtitle">
                    View student fee information and payment history.
                </p>

            </div>


            <div class="header-actions">

                <a
                    href="{{ route('admin.finance.index') }}"
                    class="back-btn"
                >
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>


                @if($balance > 0)

                    <a
                        href="{{ route('admin.finance.create', ['student_fee_id' => $studentFee->student_fee_id]) }}"
                        class="create-btn"
                    >
                        <i class="bi bi-credit-card"></i>
                        Record Payment
                    </a>

                @endif

            </div>

        </div>


        <!-- =========================
             INFORMATION CARDS
        ========================= -->

        <div class="info-grid">


            <!-- STUDENT INFORMATION -->

            <div class="info-card">

                <div class="card-header">

                    <h3 class="card-title">
                        Student Information
                    </h3>

                    <div class="card-subtitle">
                        Student assigned to this fee.
                    </div>

                </div>


                <div class="card-body">

                    <div class="student-info">

                        <div class="student-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <div>

                            <div class="student-name">

                                {{ $studentFee->student->user->name
                                    ?? $studentFee->student->full_name
                                    ?? 'Unknown Student' }}

                            </div>

                            <div class="student-id">

                                Student ID:
                                {{ $studentFee->student->student_id ?? '—' }}

                            </div>

                        </div>

                    </div>


                    <div class="info-row">

                        <span class="info-label">
                            Class
                        </span>

                        <span class="info-value">

                            @php
                                $enrollment = $studentFee->student
                                    ? $studentFee->student->enrollments->first()
                                    : null;
                            @endphp

                            @if($enrollment && $enrollment->classroom)

                                {{ $enrollment->classroom->class_name }}

                            @else

                                Not assigned

                            @endif

                        </span>

                    </div>


                    <div class="info-row">

                        <span class="info-label">
                            Academic Year
                        </span>

                        <span class="info-value">

                            @if($studentFee->academicYear)

                                {{ $studentFee->academicYear->start_date }}
                                -
                                {{ $studentFee->academicYear->end_date }}

                            @else

                                Not assigned

                            @endif

                        </span>

                    </div>

                </div>

            </div>


            <!-- FEE INFORMATION -->

            <div class="info-card">

                <div class="card-header">

                    <h3 class="card-title">
                        Fee Information
                    </h3>

                    <div class="card-subtitle">
                        Details of the assigned fee.
                    </div>

                </div>


                <div class="card-body">


                    <div class="info-row">

                        <span class="info-label">
                            Fee Type
                        </span>

                        <span class="info-value">

                            {{ $studentFee->feeType->fee_name ?? '—' }}

                        </span>

                    </div>


                    <div class="info-row">

                        <span class="info-label">
                            Assigned Amount
                        </span>

                        <span class="info-value">

                            ${{ number_format((float) $studentFee->net_amount, 2) }}

                        </span>

                    </div>


                    <div class="info-row">

                        <span class="info-label">
                            Payment Status
                        </span>

                        <span class="info-value">

                            @if($paymentStatus === 'Paid')

                                <span class="status-badge paid">

                                    <span class="status-dot"></span>

                                    Paid

                                </span>

                            @else

                                <span class="status-badge pending">

                                    <span class="status-dot"></span>

                                    Partially Paid

                                </span>

                            @endif

                        </span>

                    </div>

                </div>

            </div>

        </div>


        <!-- =========================
             AMOUNT SUMMARY
        ========================= -->

        <div class="amount-summary">


            <div class="amount-box">

                <div class="amount-label">
                    Total Fee
                </div>

                <div class="amount-value">

                    ${{ number_format($totalFee, 2) }}

                </div>

            </div>


            <div class="amount-box">

                <div class="amount-label">
                    Amount Paid
                </div>

                <div class="amount-value paid">

                    ${{ number_format($totalPaid, 2) }}

                </div>

            </div>


            <div class="amount-box">

                <div class="amount-label">
                    Balance
                </div>

                <div class="amount-value balance">

                    ${{ number_format($balance, 2) }}

                </div>

            </div>

        </div>


        <!-- =========================
             PAYMENT HISTORY
        ========================= -->

        <div class="payment-card">


            <div class="card-header">

                <h3 class="card-title">
                    Payment History
                </h3>

                <div class="card-subtitle">
                    All payments recorded for this student fee.
                </div>

            </div>


            <div class="payment-table-wrapper">

        @if($studentFee->payments->count() > 0)

    <table class="payment-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Payment Date</th>
                <th>Amount Paid</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach(
                $studentFee->payments->sortByDesc('payment_date')
                as $payment
            )
                <tr>
                    <td>
                        <span class="payment-number">
                            {{ $loop->iteration }}
                        </span>
                    </td>

                    <td>
                        <span class="payment-date">
                            {{ $payment->payment_date
                                ? $payment->payment_date->format('d M Y')
                                : '—' }}
                        </span>
                    </td>

                    <td>
                        <span class="payment-amount">
                            ${{ number_format(
                                (float) $payment->amount_paid,
                                2
                            ) }}
                        </span>
                    </td>

                    <td>
                        <a
                            href="{{ route(
                                'admin.finance.payments.edit',
                                $payment->payment_id
                            ) }}"
                            class="action-btn edit"
                            title="Edit Payment"
                        >
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@else

    <div class="empty-state">
        <i class="bi bi-receipt"></i>

        <div class="empty-state-title">
            No payments recorded
        </div>

        <div class="empty-state-text">
            No payment has been recorded for this student fee yet.
        </div>
    </div>

@endif



            </div>

        </div>


        <!-- BOTTOM ACTION -->

        <div class="bottom-actions">

            <a
                href="{{ route('admin.finance.index') }}"
                class="back-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Back to Finance
            </a>

        </div>


    </section>

</main>


<script>

    const mobileMenu = document.getElementById("mobileMenu");

    const sidebar = document.getElementById("sidebar");

    mobileMenu.addEventListener("click", function () {

        sidebar.classList.toggle("show");

    });

</script>


</body>
</html>

