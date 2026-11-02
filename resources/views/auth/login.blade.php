<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | SchoolSync</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Google Fonts -->
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
            --background: #f7f9fc;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Inter", sans-serif;
            color: var(--text);
            background: var(--background);
        }

        /* =========================
           MAIN LOGIN WRAPPER
        ========================= */

        .login-wrapper {
            min-height: 100vh;
            display: flex;
        }

        /* =========================
           LEFT SIDE
        ========================= */

        .login-brand-section {
            width: 50%;
            min-height: 100vh;
            background:
                linear-gradient(
                    135deg,
                    rgba(11, 31, 58, 0.96),
                    rgba(13, 79, 184, 0.94)
                ),
                url("https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1400&q=85");

            background-size: cover;
            background-position: center;

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .login-brand-section::before {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.06);

            top: -120px;
            right: -100px;
        }

        .login-brand-section::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;

            border-radius: 50%;

            background: rgba(247, 201, 72, 0.08);

            bottom: -100px;
            left: -80px;
        }

        .brand-content {
            max-width: 520px;
            position: relative;
            z-index: 2;
        }

        /* =========================
           LOGO
        ========================= */

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 45px;
        }

        .brand-logo-icon {
            width: 48px;
            height: 48px;

            background: var(--white);
            color: var(--white);

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 24px;
        }

        .brand-logo-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

        .brand-logo-text {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        /* =========================
           LEFT CONTENT
        ========================= */

        .brand-content h1 {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 46px;
            line-height: 1.15;
            font-weight: 800;

            margin-bottom: 22px;
        }

        .brand-content h1 span {
            color: var(--yellow);
        }

        .brand-content p {
            font-size: 16px;
            line-height: 1.8;

            color: rgba(255, 255, 255, 0.78);

            max-width: 480px;
        }

        /* =========================
           FEATURES
        ========================= */

        .login-features {
            margin-top: 38px;
        }

        .feature-item {
            display: flex;
            align-items: center;

            gap: 14px;

            margin-bottom: 18px;

            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
        }

        .feature-icon {
            width: 34px;
            height: 34px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.1);

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--yellow);

            font-size: 16px;
        }

        /* =========================
           RIGHT SIDE
        ========================= */

        .login-form-section {
            width: 50%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 50px;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
        }

        /* =========================
           HEADER
        ========================= */

        .login-header {
            margin-bottom: 32px;
        }

        .login-header h2 {
            font-family: "Plus Jakarta Sans", sans-serif;

            font-size: 32px;
            font-weight: 800;

            color: var(--navy);

            margin-bottom: 10px;
        }

        .login-header p {
            color: var(--muted);
            margin: 0;
            font-size: 15px;
        }

        /* =========================
           FORM
        ========================= */

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: var(--text);

            margin-bottom: 8px;
        }

        .input-group-custom {
            position: relative;
        }

        .input-group-custom .input-icon {
            position: absolute;

            left: 15px;
            top: 50%;

            transform: translateY(-50%);

            color: var(--muted);

            z-index: 5;
        }

        .form-control {
            height: 52px;

            border: 1px solid var(--border);

            border-radius: 9px;

            padding-left: 45px;

            font-size: 14px;

            background: white;

            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--blue);

            box-shadow:
                0 0 0 4px rgba(23, 105, 224, 0.10);
        }

        /* =========================
           PASSWORD TOGGLE
        ========================= */

        .password-toggle {
            position: absolute;

            right: 15px;
            top: 50%;

            transform: translateY(-50%);

            border: none;
            background: transparent;

            color: var(--muted);

            cursor: pointer;

            z-index: 5;
        }

        /* =========================
           OPTIONS
        ========================= */

        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-top: 16px;
            margin-bottom: 24px;
        }

        .form-check-label {
            font-size: 13px;
            color: var(--muted);
        }

        .form-check-input {
            border-color: var(--border);
        }

        .form-check-input:checked {
            background-color: var(--blue);
            border-color: var(--blue);
        }


        /* =========================
           LOGIN BUTTON
        ========================= */

        .btn-login {
            width: 100%;

            height: 52px;

            border: none;
            border-radius: 9px;

            background: var(--blue);
            color: white;

            font-size: 14px;
            font-weight: 600;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 9px;

            transition: all 0.2s ease;
        }

        .btn-login:hover {
            background: var(--blue-dark);

            transform: translateY(-1px);

            box-shadow:
                0 8px 20px rgba(23, 105, 224, 0.18);
        }

        /* =========================
           DIVIDER
        ========================= */

        .divider {
            display: flex;
            align-items: center;

            gap: 15px;

            margin: 30px 0;
        }

        .divider-line {
            flex: 1;
            height: 1px;

            background: var(--border);
        }

        .divider span {
            font-size: 12px;
            color: #9aa3b2;
        }

        /* =========================
           BACK HOME
        ========================= */

        .back-home {
            text-align: center;
        }

        .back-home a {
            color: var(--muted);

            text-decoration: none;

            font-size: 14px;
            font-weight: 500;

            display: inline-flex;
            align-items: center;

            gap: 7px;

            transition: 0.2s;
        }

        .back-home a:hover {
            color: var(--blue);
        }

        /* =========================
           ERROR MESSAGE
        ========================= */

        .alert-danger {
            border: none;

            border-radius: 9px;

            background: #fff1f1;

            color: #b42318;

            font-size: 13px;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 991px) {

            .login-brand-section {
                display: none;
            }

            .login-form-section {
                width: 100%;
                padding: 30px 20px;
            }

            .login-container {
                max-width: 430px;
            }
        }

        @media (max-width: 576px) {

            .login-form-section {
                padding: 25px 18px;
            }

            .login-header h2 {
                font-size: 27px;
            }

            .login-options {
                align-items: flex-start;
                gap: 15px;
            }
        }

    </style>
</head>

<body>

<div class="login-wrapper">

    <!-- =========================
         LEFT BRAND SECTION
    ========================== -->

    <section class="login-brand-section">

        <div class="brand-content">

            <!-- Logo -->

<div class="brand-logo">

    <div class="brand-logo-icon">
        <img
            src="{{ asset('images/schoolsync-logo.png') }}"
            alt="SchoolSync"
        >
    </div>

    <div class="brand-logo-text">
        SchoolSync
    </div>

</div>


            <!-- Main Content -->

            <h1>
                Welcome back to
                <span>SchoolSync.</span>
            </h1>

            <p>
                Manage learning, people, classes and school
                activities through one connected education
                management system.
            </p>


            <!-- Features -->

            <div class="login-features">

                <div class="feature-item">

                    <div class="feature-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <span>
                        Manage students, teachers and staff
                    </span>

                </div>


                <div class="feature-item">

                    <div class="feature-icon">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>

                    <span>
                        Track classes and attendance
                    </span>

                </div>


                <div class="feature-item">

                    <div class="feature-icon">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>

                    <span>
                        Keep school information organized
                    </span>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         RIGHT LOGIN SECTION
    ========================== -->

    <section class="login-form-section">

        <div class="login-container">

            <!-- Header -->

            <div class="login-header">

                <h2>
                    Login
                </h2>

                <p>
                    Enter your account details to continue.
                </p>

            </div>


            <!-- Laravel Error -->

            @if ($errors->any())

                <div class="alert alert-danger mb-4">

                    <div class="d-flex align-items-start gap-2">

                        <i class="bi bi-exclamation-circle-fill"></i>

                        <div>

                            @foreach ($errors->all() as $error)

                                <div>
                                    {{ $error }}
                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            @endif


            <!-- Login Form -->

            <form method="POST" action="{{ route('login') }}">

                @csrf


                <!-- Email -->

                <div class="mb-3">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email Address
                    </label>

                    <div class="input-group-custom">

                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                            autocomplete="email"
                        >

                    </div>

                </div>


                <!-- Password -->

                <div class="mb-3">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>

                    <div class="input-group-custom">

                        <i class="bi bi-lock input-icon"></i>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                        >
                            <i
                                class="bi bi-eye"
                                id="passwordIcon"
                            ></i>
                        </button>

                    </div>

                </div>


                <!-- Remember / Forgot -->

                <div class="login-options">

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="remember"
                            id="remember"
                        >

                        <label
                            class="form-check-label"
                            for="remember"
                        >
                            Remember me
                        </label>

                    </div>




                </div>


                <!-- Login Button -->

                <button
                    type="submit"
                    class="btn-login"
                >

                    <span>
                        Sign in
                    </span>

                    <i class="bi bi-arrow-right"></i>

                </button>

            </form>


            <!-- Divider -->

            <div class="divider">

                <div class="divider-line"></div>

                <span>
                    SchoolSync
                </span>

                <div class="divider-line"></div>

            </div>


            <!-- Back Home -->

            <div class="back-home">

                <a href="{{ url('/') }}">

                    <i class="bi bi-arrow-left"></i>

                    Back to  Home

                </a>

            </div>

        </div>

    </section>

</div>


<!-- =========================
     PASSWORD TOGGLE SCRIPT
========================== -->

<script>

function togglePassword() {

    const password =
        document.getElementById('password');

    const icon =
        document.getElementById('passwordIcon');


    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('bi-eye');

        icon.classList.add('bi-eye-slash');

    } else {

        password.type = 'password';

        icon.classList.remove('bi-eye-slash');

        icon.classList.add('bi-eye');

    }

}

</script>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>