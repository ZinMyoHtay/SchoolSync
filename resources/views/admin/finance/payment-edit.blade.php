<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Edit Payment</title>

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

        h1, h2, h3, h4, h5, h6 {
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

        /* =========================
           FORM CARD
        ========================= */

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

        .form-body {
            padding: 24px 22px;
        }

        /* =========================
           INFORMATION
        ========================= */

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .info-box {
            background: #f8f9fc;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 15px 16px;
        }

        .info-label {
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 6px;
        }

        .info-value {
            color: var(--text);
            font-size: 12px;
            font-weight: 700;
        }

        /* =========================
           FORM
        ========================= */

        .form-section-title {
            font-family: "Plus Jakarta Sans";
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 17px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 7px;
        }

        .form-control {
            height: 42px;
            border: 1px solid var(--border);
            background: #f8f9fc;
            border-radius: 9px;
            font-size: 12px;
            color: var(--text);
            outline: none;
        }

        .form-control:focus {
            background: white;
            border-color: #a9c7f5;
            box-shadow: none;
        }

        .form-error {
            color: var(--red);
            font-size: 10px;
            margin-top: 5px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .cancel-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: white;
            color: var(--muted);
            border: 1px solid var(--border);
            padding: 10px 17px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .cancel-btn:hover {
            background: #f8f9fc;
            color: var(--text);
        }

        .update-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: var(--blue);
            color: white;
            border: none;
            padding: 10px 17px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .update-btn:hover {
            background: var(--blue-dark);
            color: white;
            transform: translateY(-1px);
        }

        /* =========================
           ALERT
        ========================= */

        .alert-box {
            background: #fff1f1;
            border: 1px solid #f3c8c8;
            color: var(--red);
            border-radius: 10px;
            padding: 13px 15px;
            font-size: 11px;
            margin-bottom: 20px;
        }

        .alert-box ul {
            margin: 0;
            padding-left: 18px;
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

            .info-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                align-items: stretch;
                flex-direction: column-reverse;
            }

            .cancel-btn,
            .update-btn {
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

            .form-body {
                padding: 20px 16px;
            }

            .table-header {
                padding: 17px 18px;
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


        <!-- Overview -->

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


        <!-- People -->

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


        <!-- Academic -->

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


        <!-- Finance -->

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


    <!-- Logout -->

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
                    Edit Payment
                </h1>

                <p class="page-subtitle">
                    Update the payment information for this student fee.
                </p>

            </div>


            <a
                href="{{ route(
                    'admin.finance.show',
                    $payment->student_fee_id
                ) }}"
                class="create-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Back to Fee
            </a>

        </div>


        <!-- VALIDATION ERRORS -->

        @if($errors->any())

            <div class="alert-box">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- PAYMENT CARD -->

        <div class="academic-card">


            <!-- CARD HEADER -->

            <div class="table-header">

                <div>

                    <h3 class="table-title">
                        Payment Information
                    </h3>

                    <div class="table-header-text">
                        Payment ID #{{ $payment->payment_id }}
                    </div>

                </div>

            </div>


            <!-- CARD BODY -->

            <div class="form-body">


                <!-- STUDENT INFORMATION -->

                <div class="info-grid">


                    <div class="info-box">

                        <div class="info-label">
                            Student
                        </div>

                        <div class="info-value">

                            {{ $payment->studentFee->student->user->name
                                ?? $payment->studentFee->student->full_name
                                ?? 'Unknown Student' }}

                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Fee Type
                        </div>

                        <div class="info-value">

                            {{ $payment->studentFee->feeType->fee_name
                                ?? '—' }}

                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Assigned Fee
                        </div>

                        <div class="info-value">

                            ${{ number_format(
                                (float) $payment->studentFee->net_amount,
                                2
                            ) }}

                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Payment ID
                        </div>

                        <div class="info-value">

                            #{{ $payment->payment_id }}

                        </div>

                    </div>


                </div>


                <!-- FORM TITLE -->

                <div class="form-section-title">
                    Edit Payment Details
                </div>


                <!-- FORM -->

                <form
                    action="{{ route(
                        'admin.finance.payments.update',
                        $payment->payment_id
                    ) }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


                    <div class="row g-3">


                        <!-- PAYMENT DATE -->

                        <div class="col-md-6">

                            <label
                                for="payment_date"
                                class="form-label"
                            >
                                Payment Date
                            </label>

                            <input
                                type="date"
                                id="payment_date"
                                name="payment_date"
                                class="form-control"
                                value="{{ old(
                                    'payment_date',
                                    $payment->payment_date
                                        ? $payment->payment_date->format('Y-m-d')
                                        : ''
                                ) }}"
                                required
                            >

                            @error('payment_date')

                                <div class="form-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- AMOUNT PAID -->

                        <div class="col-md-6">

                            <label
                                for="amount_paid"
                                class="form-label"
                            >
                                Amount Paid
                            </label>

                            <input
                                type="number"
                                id="amount_paid"
                                name="amount_paid"
                                class="form-control"
                                value="{{ old(
                                    'amount_paid',
                                    $payment->amount_paid
                                ) }}"
                                min="0.01"
                                step="0.01"
                                required
                            >

                            @error('amount_paid')

                                <div class="form-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                    </div>


                    <!-- ACTIONS -->

                    <div class="form-actions">

                        <a
                            href="{{ route(
                                'admin.finance.show',
                                $payment->student_fee_id
                            ) }}"
                            class="cancel-btn"
                        >
                            <i class="bi bi-x-lg"></i>
                            Cancel
                        </a>


                        <button
                            type="submit"
                            class="update-btn"
                        >
                            <i class="bi bi-check-lg"></i>
                            Update Payment
                        </button>

                    </div>


                </form>


            </div>

        </div>


    </section>

</main>


<!-- =========================
     JAVASCRIPT
========================= -->

<script>

    const mobileMenu =
        document.getElementById("mobileMenu");

    const sidebar =
        document.getElementById("sidebar");

    if (mobileMenu) {

        mobileMenu.addEventListener("click", function () {

            sidebar.classList.toggle("show");

        });

    }

</script>


</body>
</html>