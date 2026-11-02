<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fees & Payments | SchoolSync</title>

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
            --blue: #1769e0;
            --blue-dark: #0d4fb8;
            --yellow: #f7c948;
            --light-blue: #eef5ff;
            --text: #172033;
            --muted: #687386;
            --white: #ffffff;
            --border: #e7ebf2;
            --green: #22a06b;
            --red: #e55353;
            --orange: #f59e0b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f6f8fc;
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

        /* ================================
           SIDEBAR
        ================================= */

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

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.18);
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.30);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 8px;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: var(--white);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .logo-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

        .logo-text {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.4px;
        }

        .menu-title {
            color: rgba(255,255,255,0.42);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 0 10px;
            margin: 22px 0 8px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 4px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            border-radius: 10px;
            color: rgba(255,255,255,0.68);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .sidebar-menu a i {
            font-size: 17px;
            width: 20px;
            text-align: center;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.07);
            color: #fff;
        }

        .sidebar-menu a.active {
            background: var(--blue);
            color: #fff;
            box-shadow: 0 5px 15px rgba(23,105,224,0.22);
        }

        .sidebar-footer {
            margin-top: 25px;
            padding-top: 18px;
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

        /* ================================
           MAIN
        ================================= */

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        /* ================================
           TOPBAR
        ================================= */

        .topbar {
            height: 74px;
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .mobile-menu {
            display: none;
            border: none;
            background: transparent;
            font-size: 23px;
            color: var(--navy);
        }

        .search-box {
            width: 310px;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9aa3b2;
        }

        .search-box input {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px 14px 10px 40px;
            font-size: 13px;
            outline: none;
            background: #fafbfe;
        }

        .search-box input:focus {
            border-color: var(--blue);
            background: #fff;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .top-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #f5f7fb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5f6b7c;
            position: relative;
            text-decoration: none;
        }

        .notification-dot {
            width: 7px;
            height: 7px;
            background: #ef4444;
            border-radius: 50%;
            position: absolute;
            top: 8px;
            right: 8px;
            border: 2px solid white;
        }

        /* ================================
           TOP PROFILE
        ================================= */

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-blue);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
        }

        .profile-info strong {
            display: block;
            font-size: 13px;
        }

        .profile-info span {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 2px;
        }

        /* ================================
           CONTENT
        ================================= */

        .content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-header-left h1 {
            font-size: 24px;
            font-weight: 800;
            color: var(--navy);
            margin: 0 0 6px;
        }

        .page-header-left p {
            margin: 0;
            font-size: 13px;
            color: var(--muted);
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #fff;
            color: var(--text);
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .back-button:hover {
            border-color: var(--blue);
            color: var(--blue);
            background: var(--light-blue);
        }

        /* ================================
           SUMMARY CARDS
        ================================= */

        .stat-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 20px;
            height: 100%;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 17px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .icon-blue {
            background: var(--light-blue);
            color: var(--blue);
        }

        .icon-green {
            background: #eaf8f1;
            color: var(--green);
        }

        .icon-orange {
            background: #fff6e7;
            color: var(--orange);
        }

        .stat-label {
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
        }

        .stat-value {
            color: var(--navy);
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 22px;
            font-weight: 800;
            margin-top: 4px;
        }

        /* ================================
           FEE TABLE
        ================================= */

        .finance-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            overflow: hidden;
            margin-top: 25px;
        }

        .finance-card-header {
            padding: 21px 22px;
            border-bottom: 1px solid var(--border);
        }

        .finance-card-header h3 {
            margin: 0;
            color: var(--navy);
            font-size: 15px;
            font-weight: 800;
        }

        .finance-card-header p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .finance-table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
        }

        .finance-table th {
            background: #fafbfe;
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 18px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .finance-table td {
            padding: 15px 18px;
            border-bottom: 1px solid #eef1f5;
            color: var(--text);
            font-size: 12px;
            vertical-align: middle;
        }

        .finance-table tbody tr:last-child td {
            border-bottom: none;
        }

        .finance-table tbody tr:hover {
            background: #fbfcff;
        }

        .fee-name {
            color: var(--navy);
            font-weight: 700;
        }

        .academic-year {
            color: var(--muted);
            font-size: 11px;
        }

        .amount {
            font-weight: 700;
            white-space: nowrap;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-badge.paid {
            background: #eaf8f1;
            color: var(--green);
        }

        .status-badge.pending {
            background: #fff6e7;
            color: var(--orange);
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* ================================
           PAYMENT TABLE
        ================================= */

        .payment-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            overflow: hidden;
            margin-top: 25px;
        }

        .payment-card-header {
            padding: 21px 22px;
            border-bottom: 1px solid var(--border);
        }

        .payment-card-header h3 {
            margin: 0;
            color: var(--navy);
            font-size: 15px;
            font-weight: 800;
        }

        .payment-card-header p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        .payment-table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
        }

        .payment-table th {
            background: #fafbfe;
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 18px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .payment-table td {
            padding: 15px 18px;
            border-bottom: 1px solid #eef1f5;
            color: var(--text);
            font-size: 12px;
            vertical-align: middle;
        }

        .payment-table tbody tr:last-child td {
            border-bottom: none;
        }

        .payment-date {
            color: var(--navy);
            font-weight: 700;
        }

        .payment-amount {
            color: var(--green);
            font-weight: 800;
            white-space: nowrap;
        }

        .payment-fee {
            color: var(--muted);
            font-size: 11px;
        }

        /* ================================
           EMPTY STATE
        ================================= */

        .empty-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 60px 25px;
            text-align: center;
            margin-top: 25px;
        }

        .empty-icon {
            width: 62px;
            height: 62px;
            border-radius: 16px;
            background: var(--light-blue);
            color: var(--blue);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 16px;
        }

        .empty-card h4 {
            margin: 0 0 6px;
            color: var(--navy);
            font-size: 16px;
            font-weight: 800;
        }

        .empty-card p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 1199px) {

            .search-box {
                width: 230px;
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

            .mobile-menu {
                display: block;
            }

            .content {
                padding: 22px;
            }

            .search-box {
                display: none;
            }

        }

        @media (max-width: 575px) {

            .topbar {
                padding: 0 15px;
            }

            .content {
                padding: 15px;
            }

            .profile-info {
                display: none;
            }

            .topbar-right {
                gap: 8px;
            }

            .page-header {
                align-items: flex-start;
                gap: 15px;
            }

            .page-header-left h1 {
                font-size: 21px;
            }

            .page-header-left p {
                font-size: 11px;
            }

            .stat-value {
                font-size: 20px;
            }

            .finance-table th,
            .finance-table td,
            .payment-table th,
            .payment-table td {
                padding: 13px 14px;
            }

        }

    </style>

</head>

<body>


    <!-- ================================
         SIDEBAR
    ================================= -->

    <aside class="sidebar" id="sidebar">

        <div class="logo">

            <div class="logo-icon">
               <img
            src="{{ asset('images/schoolsync-logo.png') }}"
            alt="SchoolSync"
        >
            </div>

            <div class="logo-text">
                SchoolSync
            </div>

        </div>


        <div class="menu-title">
            Overview
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.dashboard') }}">

                    <i class="bi bi-grid-1x2-fill"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>

        </ul>


        <div class="menu-title">
            School
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.profile.edit') }}">

                    <i class="bi bi-person-circle"></i>

                    <span>
                        Profile
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('student.classes.index') }}">

                    <i class="bi bi-diagram-3"></i>

                    <span>
                        Classes
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('student.subjects.index') }}">

                    <i class="bi bi-book"></i>

                    <span>
                        Subjects
                    </span>

                </a>

            </li>


            <li>

                <a href="{{ route('student.attendance.index') }}">

                    <i class="bi bi-calendar-check"></i>

                    <span>
                        Attendance
                    </span>

                </a>

            </li>


            <!-- <li>

                <a href="{{ route('student.results.index') }}">

                    <i class="bi bi-bar-chart-line"></i>

                    <span>
                        Results
                    </span>

                </a>

            </li> -->

        </ul>


        <div class="menu-title">
            Academic
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.schedule.index') }}">

                    <i class="bi bi-calendar3"></i>

                    <span>
                        Schedule
                    </span>

                </a>

            </li>

        </ul>


        <div class="menu-title">
            Finance
        </div>

        <ul class="sidebar-menu">

            <li>

                <a
                    href="{{ route('student.finance.index') }}"
                    class="active"
                >

                    <i class="bi bi-wallet2"></i>

                    <span>
                        Fees & Payments
                    </span>

                </a>

            </li>

        </ul>


        <div class="menu-title">
            Communication
        </div>

        <ul class="sidebar-menu">

            <li>

                <a href="{{ route('student.announcements.index') }}">

                    <i class="bi bi-megaphone"></i>

                    <span>
                        Announcements
                    </span>

                </a>

            </li>

        </ul>


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

                    <i class="bi bi-box-arrow-left"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    <!-- ================================
         MAIN
    ================================= -->

    <main class="main">


        <!-- ================================
             TOPBAR
        ================================= -->

        <header class="topbar">

            <div class="topbar-left">

                <button
                    class="mobile-menu"
                    id="mobileMenu"
                    type="button"
                >

                    <i class="bi bi-list"></i>

                </button>


                <div class="search-box">

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        placeholder="Search anything..."
                    >

                </div>

            </div>


            <div class="topbar-right">

                <a
                    href="#"
                    class="top-icon"
                >

                    <i class="bi bi-bell"></i>

                    <span class="notification-dot"></span>

                </a>


                <div class="profile">

                    <div class="profile-avatar">

                        {{ strtoupper(substr($user->name ?? 'ST', 0, 2)) }}

                    </div>


                    <div class="profile-info">

                        <strong>
                            {{ $user->name ?? '-' }}
                        </strong>

                        <span>
                            Student
                        </span>

                    </div>

                </div>

            </div>

        </header>


        <!-- ================================
             CONTENT
        ================================= -->

        <div class="content">


            <!-- PAGE HEADER -->

            <div class="page-header">

                <div class="page-header-left">

                    <h1>
                        Fees & Payments
                    </h1>

                    <p>
                        View your assigned fees, payment status, and payment history.
                    </p>

                </div>


                <a
                    href="{{ route('student.dashboard') }}"
                    class="back-button"
                >

                    <i class="bi bi-arrow-left"></i>

                    Back

                </a>

            </div>


            <!-- ================================
                 SUMMARY CARDS
            ================================= -->

            <div class="row g-3">


                <!-- Total Fees -->

                <div class="col-xl-4 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon icon-blue">

                                <i class="bi bi-wallet2"></i>

                            </div>

                        </div>


                        <div class="stat-label">
                            Total Fees
                        </div>

                        <div class="stat-value">

                            {{ number_format($totalFees, 2) }}

                            <span style="font-size: 11px; font-weight: 700;">
                                MMK
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Paid -->

                <div class="col-xl-4 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon icon-green">

                                <i class="bi bi-check-circle-fill"></i>

                            </div>

                        </div>


                        <div class="stat-label">
                            Paid Amount
                        </div>

                        <div class="stat-value">

                            {{ number_format($paidAmount, 2) }}

                            <span style="font-size: 11px; font-weight: 700;">
                                MMK
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Outstanding -->

                <div class="col-xl-4 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon icon-orange">

                                <i class="bi bi-hourglass-split"></i>

                            </div>

                        </div>


                        <div class="stat-label">
                            Outstanding Balance
                        </div>

                        <div class="stat-value">

                            {{ number_format($outstandingAmount, 2) }}

                            <span style="font-size: 11px; font-weight: 700;">
                                MMK
                            </span>

                        </div>

                    </div>

                </div>


            </div>


            <!-- ================================
                 MY FEES
            ================================= -->

            @if($studentFees->count() > 0)

                <div class="finance-card">

                    <div class="finance-card-header">

                        <h3>
                            My Fees
                        </h3>

                        <p>
                            Fees assigned to your SchoolSync account
                        </p>

                    </div>


                    <div class="table-wrapper">

                        <table class="finance-table">

                            <thead>

                                <tr>

                                    <th>
                                        Fee
                                    </th>

                                    <th>
                                        Academic Year
                                    </th>

                                    <th>
                                        Amount
                                    </th>

                                    <th>
                                        Paid
                                    </th>

                                    <th>
                                        Balance
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($studentFees as $studentFee)

                                    <tr>


                                        <!-- Fee -->

                                        <td>

                                            <div class="fee-name">

                                                {{ $studentFee->feeType?->fee_name ?? '-' }}

                                            </div>

                                        </td>


                                        <!-- Academic Year -->

                                        <td>

                                            <div class="academic-year">

                                                {{ $studentFee->academicYear?->year_name ?? '-' }}

                                            </div>

                                        </td>


                                        <!-- Amount -->

                                        <td>

                                            <span class="amount">

                                                {{ number_format($studentFee->total_fee, 2) }}

                                                MMK

                                            </span>

                                        </td>


                                        <!-- Paid -->

                                        <td>

                                            <span class="amount">

                                                {{ number_format($studentFee->total_paid, 2) }}

                                                MMK

                                            </span>

                                        </td>


                                        <!-- Balance -->

                                        <td>

                                            <span class="amount">

                                                {{ number_format($studentFee->balance, 2) }}

                                                MMK

                                            </span>

                                        </td>


                                        <!-- Status -->

                                        <td>

                                            @if($studentFee->payment_status === 'Paid')

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

                                        </td>


                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>


            @else

                <div class="empty-card">

                    <div class="empty-icon">

                        <i class="bi bi-wallet2"></i>

                    </div>

                    <h4>
                        No Fees Assigned
                    </h4>

                    <p>
                        No fees have been assigned to your account yet.
                    </p>

                </div>

            @endif


            <!-- ================================
                 PAYMENT HISTORY
            ================================= -->

            @if($payments->count() > 0)

                <div class="payment-card">

                    <div class="payment-card-header">

                        <h3>
                            Payment History
                        </h3>

                        <p>
                            Your recorded fee payments
                        </p>

                    </div>


                    <div class="table-wrapper">

                        <table class="payment-table">

                            <thead>

                                <tr>

                                    <th>
                                        Payment Date
                                    </th>

                                    <th>
                                        Fee
                                    </th>

                                    <th>
                                        Amount Paid
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($payments as $payment)

                                    <tr>


                                        <!-- Payment Date -->

                                        <td>

                                            <span class="payment-date">

                                                {{ $payment->payment_date?->format('d M Y') ?? '-' }}

                                            </span>

                                        </td>


                                        <!-- Fee -->

                                        <td>

                                            <span class="payment-fee">

                                                {{ $payment->studentFee?->feeType?->fee_name ?? '-' }}

                                            </span>

                                        </td>


                                        <!-- Amount -->

                                        <td>

                                            <span class="payment-amount">

                                                + {{ number_format((float) $payment->amount_paid, 2) }}

                                                MMK

                                            </span>

                                        </td>


                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>


            @else

                <div class="empty-card">

                    <div class="empty-icon">

                        <i class="bi bi-receipt"></i>

                    </div>

                    <h4>
                        No Payment History
                    </h4>

                    <p>
                        No payments have been recorded for your account yet.
                    </p>

                </div>

            @endif


        </div>

    </main>


    <!-- ================================
         JAVASCRIPT
    ================================= -->

    <script>

        const mobileMenu =
            document.getElementById("mobileMenu");

        const sidebar =
            document.getElementById("sidebar");

        mobileMenu.addEventListener(
            "click",
            function () {

                sidebar.classList.toggle("show");

            }
        );

    </script>

</body>

</html>