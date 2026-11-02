<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | SchoolSync</title>

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


        /* =========================================
           MAIN WRAPPER
        ========================================= */

        .register-wrapper {
            min-height: 100vh;

            display: flex;
        }


        /* =========================================
           LEFT BRAND SECTION
        ========================================= */

        .register-brand-section {

            width: 42%;

            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    rgba(11, 31, 58, 0.97),
                    rgba(13, 79, 184, 0.94)
                ),
                url("https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1400&q=85");

            background-size: cover;

            background-position: center;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 55px;

            position: relative;

            overflow: hidden;
        }


        .register-brand-section::before {

            content: "";

            position: absolute;

            width: 360px;
            height: 360px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.06);

            top: -130px;

            right: -110px;
        }


        .register-brand-section::after {

            content: "";

            position: absolute;

            width: 280px;
            height: 280px;

            border-radius: 50%;

            background:
                rgba(247, 201, 72, 0.08);

            bottom: -130px;

            left: -100px;
        }


        .brand-content {

            max-width: 460px;

            position: relative;

            z-index: 2;
        }


        /* =========================================
           LOGO
        ========================================= */

        .brand-logo {

            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 45px;
        }


        .brand-logo-icon {

            width: 48px;
            height: 48px;

            background: var(--yellow);

            color: var(--navy);

            border-radius: 12px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 24px;
        }


        .brand-logo-text {

            font-family:
                "Plus Jakarta Sans", sans-serif;

            font-size: 26px;

            font-weight: 800;
        }


        /* =========================================
           BRAND TEXT
        ========================================= */

        .brand-content h1 {

            font-family:
                "Plus Jakarta Sans", sans-serif;

            font-size: 42px;

            line-height: 1.15;

            font-weight: 800;

            margin-bottom: 20px;
        }


        .brand-content h1 span {

            color: var(--yellow);
        }


        .brand-content p {

            font-size: 15px;

            line-height: 1.8;

            color:
                rgba(255, 255, 255, 0.78);
        }


        /* =========================================
           BENEFITS
        ========================================= */

        .register-benefits {

            margin-top: 35px;
        }


        .benefit-item {

            display: flex;

            align-items: center;

            gap: 13px;

            margin-bottom: 17px;

            color:
                rgba(255, 255, 255, 0.9);

            font-size: 14px;
        }


        .benefit-icon {

            width: 34px;
            height: 34px;

            flex-shrink: 0;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.1);

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--yellow);
        }


        /* =========================================
           RIGHT SECTION
        ========================================= */

        .register-form-section {

            width: 58%;

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 45px 60px;
        }


        .register-container {

            width: 100%;

            max-width: 650px;
        }


        /* =========================================
           HEADER
        ========================================= */

        .register-header {

            margin-bottom: 27px;
        }


        .register-header h2 {

            font-family:
                "Plus Jakarta Sans", sans-serif;

            font-size: 31px;

            font-weight: 800;

            color: var(--navy);

            margin-bottom: 9px;
        }


        .register-header p {

            color: var(--muted);

            font-size: 14px;

            margin: 0;
        }


        /* =========================================
           FORM ROW
        ========================================= */

        .form-row {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 18px;
        }


        .form-group {

            margin-bottom: 18px;
        }


        /* =========================================
           LABEL
        ========================================= */

        .form-label {

            font-size: 13px;

            font-weight: 600;

            color: var(--text);

            margin-bottom: 7px;
        }


        /* =========================================
           INPUT
        ========================================= */

        .input-wrapper {

            position: relative;
        }


        .input-icon {

            position: absolute;

            left: 15px;

            top: 50%;

            transform:
                translateY(-50%);

            color: var(--muted);

            z-index: 5;
        }


        .form-control {

            height: 50px;

            border:
                1px solid var(--border);

            border-radius: 9px;

            padding-left: 44px;

            font-size: 13px;

            background: white;

            transition:
                all 0.2s ease;
        }


        .form-control:focus {

            border-color:
                var(--blue);

            box-shadow:
                0 0 0 4px
                rgba(23, 105, 224, 0.10);
        }


        /* =========================================
           PASSWORD TOGGLE
        ========================================= */

        .password-toggle {

            position: absolute;

            right: 14px;

            top: 50%;

            transform:
                translateY(-50%);

            border: none;

            background: transparent;

            color: var(--muted);

            cursor: pointer;

            z-index: 5;
        }


        /* =========================================
           PASSWORD HINT
        ========================================= */

        .password-hint {

            font-size: 11px;

            color: #8a93a2;

            margin-top: 6px;
        }


        /* =========================================
           TERMS
        ========================================= */

        .terms {

            margin-top: 2px;

            margin-bottom: 20px;
        }


        .terms label {

            font-size: 12px;

            color: var(--muted);

            line-height: 1.5;
        }


        .terms a {

            color: var(--blue);

            font-weight: 600;

            text-decoration: none;
        }


        .terms a:hover {

            color: var(--blue-dark);
        }


        .form-check-input {

            border-color:
                var(--border);
        }


        .form-check-input:checked {

            background-color:
                var(--blue);

            border-color:
                var(--blue);
        }


        /* =========================================
           REGISTER BUTTON
        ========================================= */

        .btn-register {

            width: 100%;

            height: 51px;

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

            transition:
                all 0.2s ease;
        }


        .btn-register:hover {

            background:
                var(--blue-dark);

            transform:
                translateY(-1px);

            box-shadow:
                0 8px 20px
                rgba(23, 105, 224, 0.18);
        }


        /* =========================================
           DIVIDER
        ========================================= */

        .divider {

            display: flex;

            align-items: center;

            gap: 15px;

            margin: 24px 0;
        }


        .divider-line {

            flex: 1;

            height: 1px;

            background:
                var(--border);
        }


        .divider span {

            font-size: 11px;

            color: #9aa3b2;
        }


        /* =========================================
           LOGIN LINK
        ========================================= */

        .login-link {

            text-align: center;
        }


        .login-link p {

            margin: 0;

            color: var(--muted);

            font-size: 13px;
        }


        .login-link a {

            color: var(--blue);

            font-weight: 600;

            text-decoration: none;
        }


        .login-link a:hover {

            color: var(--blue-dark);
        }


        /* =========================================
           BACK HOME
        ========================================= */

        .back-home {

            text-align: center;

            margin-top: 18px;
        }


        .back-home a {

            color: var(--muted);

            text-decoration: none;

            font-size: 12px;

            display: inline-flex;

            align-items: center;

            gap: 6px;

            transition: 0.2s;
        }


        .back-home a:hover {

            color: var(--blue);
        }


        /* =========================================
           ALERT
        ========================================= */

        .alert-danger {

            border: none;

            border-radius: 9px;

            background: #fff1f1;

            color: #b42318;

            font-size: 12px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1000px) {

            .register-brand-section {

                width: 38%;

                padding: 35px;
            }

            .register-form-section {

                width: 62%;

                padding: 35px;
            }

            .brand-content h1 {

                font-size: 34px;
            }
        }


        @media (max-width: 800px) {

            .register-brand-section {

                display: none;
            }

            .register-form-section {

                width: 100%;

                padding: 30px 20px;
            }

            .register-container {

                max-width: 550px;
            }
        }


        @media (max-width: 576px) {

            .register-form-section {

                padding:
                    25px 18px;
            }

            .register-header h2 {

                font-size: 27px;
            }

            .form-row {

                grid-template-columns:
                    1fr;

                gap: 0;
            }
        }

    </style>

</head>


<body>


<div class="register-wrapper">


    <!-- =====================================
         LEFT BRAND SECTION
    ====================================== -->

    <section class="register-brand-section">

        <div class="brand-content">


            <!-- Logo -->

            <div class="brand-logo">

                <div class="brand-logo-icon">

                    <i class="bi bi-mortarboard-fill"></i>

                </div>

                <div class="brand-logo-text">

                    SchoolSync

                </div>

            </div>


            <!-- Heading -->

            <h1>

                Build your
                <span>SchoolSync</span>
                account.

            </h1>


            <p>

                Create your account and become part of
                a connected school management environment
                designed for better learning and organization.

            </p>


            <!-- Benefits -->

            <div class="register-benefits">


                <div class="benefit-item">

                    <div class="benefit-icon">

                        <i class="bi bi-person-check-fill"></i>

                    </div>

                    <span>
                        Secure account access
                    </span>

                </div>


                <div class="benefit-item">

                    <div class="benefit-icon">

                        <i class="bi bi-grid-1x2-fill"></i>

                    </div>

                    <span>
                        One place for school information
                    </span>

                </div>


                <div class="benefit-item">

                    <div class="benefit-icon">

                        <i class="bi bi-lightning-charge-fill"></i>

                    </div>

                    <span>
                        Simple and efficient school management
                    </span>

                </div>


            </div>

        </div>

    </section>



    <!-- =====================================
         RIGHT REGISTER SECTION
    ====================================== -->

    <section class="register-form-section">

        <div class="register-container">


            <!-- Header -->

            <div class="register-header">

                <h2>
                    Create an account
                </h2>

                <p>
                    Fill in your information to get started
                    with SchoolSync.
                </p>

            </div>



            <!-- Validation Errors -->

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



            <!-- Register Form -->

            <form
                method="POST"
                action="{{ route('register') }}"
            >

                @csrf


                <!-- Name + Email -->

                <div class="form-row">


                    <!-- Name -->

                    <div class="form-group">

                        <label
                            for="name"
                            class="form-label"
                        >
                            Full Name
                        </label>

                        <div class="input-wrapper">

                            <i
                                class="bi bi-person input-icon"
                            ></i>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="Enter your full name"
                                required
                                autocomplete="name"
                            >

                        </div>

                    </div>



                    <!-- Email -->

                    <div class="form-group">

                        <label
                            for="email"
                            class="form-label"
                        >
                            Email Address
                        </label>

                        <div class="input-wrapper">

                            <i
                                class="bi bi-envelope input-icon"
                            ></i>

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

                </div>



                <!-- Password + Confirm Password -->

                <div class="form-row">


                    <!-- Password -->

                    <div class="form-group">

                        <label
                            for="password"
                            class="form-label"
                        >
                            Password
                        </label>

                        <div class="input-wrapper">

                            <i
                                class="bi bi-lock input-icon"
                            ></i>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Create a password"
                                required
                                autocomplete="new-password"
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword(
                                    'password',
                                    'passwordIcon'
                                )"
                            >

                                <i
                                    class="bi bi-eye"
                                    id="passwordIcon"
                                ></i>

                            </button>

                        </div>

                        <div class="password-hint">
                            Use at least 8 characters.
                        </div>

                    </div>



                    <!-- Confirm Password -->

                    <div class="form-group">

                        <label
                            for="password-confirm"
                            class="form-label"
                        >
                            Confirm Password
                        </label>

                        <div class="input-wrapper">

                            <i
                                class="bi bi-shield-lock input-icon"
                            ></i>

                            <input
                                type="password"
                                name="password_confirmation"
                                id="password-confirm"
                                class="form-control"
                                placeholder="Confirm your password"
                                required
                                autocomplete="new-password"
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword(
                                    'password-confirm',
                                    'confirmPasswordIcon'
                                )"
                            >

                                <i
                                    class="bi bi-eye"
                                    id="confirmPasswordIcon"
                                ></i>

                            </button>

                        </div>

                    </div>

                </div>



                <!-- Terms -->

                <div class="terms">

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="terms"
                            required
                        >

                        <label
                            class="form-check-label"
                            for="terms"
                        >

                            I agree to the
                            <a href="#">
                                Terms of Service
                            </a>
                            and
                            <a href="#">
                                Privacy Policy
                            </a>.

                        </label>

                    </div>

                </div>



                <!-- Register Button -->

                <button
                    type="submit"
                    class="btn-register"
                >

                    <span>
                        Create Account
                    </span>

                    <i class="bi bi-arrow-right"></i>

                </button>

            </form>



            <!-- Divider -->

            <div class="divider">

                <div class="divider-line"></div>

                <span>
                    OR
                </span>

                <div class="divider-line"></div>

            </div>



            <!-- Login -->

            <div class="login-link">

                <p>

                    Already have an account?

                    <a href="{{ route('login') }}">
                        Sign in
                    </a>

                </p>

            </div>



            <!-- Back Home -->

            <div class="back-home">

                <a href="{{ url('/') }}">

                    <i class="bi bi-arrow-left"></i>

                    Back to SchoolSync Home

                </a>

            </div>


        </div>

    </section>

</div>



<!-- =====================================
     PASSWORD TOGGLE
====================================== -->

<script>

function togglePassword(inputId, iconId)
{
    const password =
        document.getElementById(inputId);

    const icon =
        document.getElementById(iconId);


    if (password.type === "password")
    {

        password.type = "text";

        icon.classList.remove(
            "bi-eye"
        );

        icon.classList.add(
            "bi-eye-slash"
        );

    }
    else
    {

        password.type = "password";

        icon.classList.remove(
            "bi-eye-slash"
        );

        icon.classList.add(
            "bi-eye"
        );

    }
}

</script>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>