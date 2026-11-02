<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>SchoolSync | Education & Learning</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
          rel="stylesheet">


    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

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
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: #ffffff;
            line-height: 1.6;
        }


        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }


        a {
            text-decoration: none;
        }


        .section-padding {
            padding: 100px 0;
        }


        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: var(--blue);

            font-size: 13px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 1.4px;

            margin-bottom: 15px;
        }


        .section-label::before {
            content: "";

            width: 28px;
            height: 3px;

            background: var(--yellow);

            border-radius: 10px;
        }


        .section-title {
            font-size: 42px;
            font-weight: 800;

            line-height: 1.2;

            color: var(--navy);

            margin-bottom: 18px;
        }


        .section-description {
            color: var(--muted);
            max-width: 650px;
        }



        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            position: absolute;

            top: 0;
            left: 0;

            width: 100%;

            z-index: 1000;

            padding: 22px 0;

            background: transparent;
        }


        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #ffffff !important;

            font-size: 23px;
            font-weight: 800;
        }


        .brand-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--white);

            color: var(--white);

            border-radius: 11px;

            font-size: 20px;
        }

        .brand-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}


        .navbar-nav {
            gap: 8px;
        }


        .nav-link {
            color: rgba(255,255,255,0.85) !important;

            font-size: 14px;
            font-weight: 600;

            padding: 9px 15px !important;

            transition: 0.25s ease;
        }


        .nav-link:hover {
            color: var(--yellow) !important;
        }


        .nav-login {
            margin-left: 12px;

            padding: 11px 22px !important;

            border-radius: 8px;

            background: var(--yellow);

            color: var(--navy) !important;

            font-weight: 800;
        }


        .nav-login:hover {
            background: #ffffff;

            color: var(--navy) !important;
        }



        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            position: relative;

            min-height: 760px;

            overflow: hidden;

            background: var(--navy);
        }


        .hero-carousel,
        .hero-carousel .carousel-inner,
        .hero-carousel .carousel-item {
            height: 760px;
        }


        .hero-image {
            width: 100%;
            height: 100%;

            object-fit: cover;

            filter: brightness(42%);
        }


        .hero-overlay {
            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    90deg,
                    rgba(7, 25, 49, 0.96) 0%,
                    rgba(7, 25, 49, 0.75) 42%,
                    rgba(7, 25, 49, 0.25) 100%
                );
        }


        .hero-content {
            position: absolute;

            top: 50%;
            left: 0;

            width: 100%;

            transform: translateY(-42%);
        }


        .hero-content-inner {
            max-width: 720px;
        }


        .hero-eyebrow {
            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding: 8px 14px;

            border: 1px solid rgba(247,201,72,0.4);

            background: rgba(247,201,72,0.1);

            color: var(--yellow);

            border-radius: 50px;

            font-size: 12px;
            font-weight: 800;

            letter-spacing: 1.2px;

            text-transform: uppercase;

            margin-bottom: 24px;
        }


        .hero-eyebrow i {
            font-size: 14px;
        }


        .hero-title {
            color: #ffffff;

            font-size: clamp(45px, 6vw, 72px);

            font-weight: 800;

            line-height: 1.05;

            letter-spacing: -2px;

            margin-bottom: 25px;
        }


        .hero-title span {
            color: var(--yellow);
        }


        .hero-description {
            color: rgba(255,255,255,0.78);

            font-size: 17px;

            line-height: 1.8;

            max-width: 620px;

            margin-bottom: 35px;
        }


        .hero-actions {
            display: flex;

            align-items: center;

            gap: 14px;

            flex-wrap: wrap;
        }


        .btn-primary-custom {
            display: inline-flex;

            align-items: center;

            gap: 9px;

            background: var(--yellow);

            color: var(--navy);

            border: none;

            padding: 14px 24px;

            border-radius: 8px;

            font-size: 14px;
            font-weight: 800;

            transition: 0.3s ease;
        }


        .btn-primary-custom:hover {
            background: #ffffff;

            color: var(--navy);

            transform: translateY(-2px);
        }


        .btn-outline-custom {
            display: inline-flex;

            align-items: center;

            gap: 9px;

            color: #ffffff;

            border: 1px solid rgba(255,255,255,0.4);

            padding: 13px 23px;

            border-radius: 8px;

            font-size: 14px;
            font-weight: 700;

            transition: 0.3s ease;
        }


        .btn-outline-custom:hover {
            background: #ffffff;

            color: var(--navy);

            border-color: #ffffff;
        }


        /* Hero controls */

        .hero-control {
            width: 48px;
            height: 48px;

            top: auto;
            bottom: 45px;

            opacity: 1;

            border: 1px solid rgba(255,255,255,0.25);

            border-radius: 8px;

            background: rgba(0,0,0,0.2);

            transition: 0.3s ease;
        }


        .hero-control:hover {
            background: var(--yellow);
        }


        .carousel-control-prev.hero-control {
            left: auto;
            right: 110px;
        }


        .carousel-control-next.hero-control {
            right: 50px;
        }


        /* =====================================================
           INTRO STRIP
        ===================================================== */

        .intro-strip {
            position: relative;

            margin-top: -1px;

            background: var(--navy);

            padding: 32px 0;
        }


        .intro-item {
            display: flex;

            align-items: center;

            gap: 15px;

            color: #ffffff;
        }


        .intro-icon {
            width: 45px;
            height: 45px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(247,201,72,0.12);

            color: var(--yellow);

            border-radius: 9px;

            font-size: 19px;
        }


        .intro-item h6 {
            margin: 0 0 3px;

            font-size: 14px;
            font-weight: 700;
        }


        .intro-item p {
            margin: 0;

            color: rgba(255,255,255,0.55);

            font-size: 12px;
        }


        .intro-divider {
            width: 1px;

            height: 40px;

            background: rgba(255,255,255,0.12);
        }



        /* =====================================================
           ABOUT
        ===================================================== */

        .about-section {
            background: #ffffff;
        }


        .about-image-wrapper {
            position: relative;

            padding-right: 35px;
        }


        .about-image {
            width: 100%;

            height: 520px;

            object-fit: cover;

            border-radius: 16px;
        }


        .about-accent {
            position: absolute;

            width: 120px;
            height: 120px;

            right: 0;
            bottom: 30px;

            background: var(--yellow);

            border-radius: 16px;

            z-index: -1;
        }


        .about-content {
            padding-left: 35px;
        }


        .about-content p {
            color: var(--muted);

            font-size: 15px;

            line-height: 1.9;

            margin-bottom: 20px;
        }


        .about-points {
            margin-top: 30px;
        }


        .about-point {
            display: flex;

            align-items: flex-start;

            gap: 13px;

            margin-bottom: 18px;
        }


        .about-point-icon {
            width: 32px;
            height: 32px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--light-blue);

            color: var(--blue);

            border-radius: 50%;

            font-size: 14px;
        }


        .about-point strong {
            display: block;

            color: var(--navy);

            font-size: 14px;

            margin-bottom: 2px;
        }


        .about-point span {
            color: var(--muted);

            font-size: 13px;
        }



        /* =====================================================
           COURSES
        ===================================================== */

        .courses-section {
            background: #f7f9fc;
        }


        .course-heading {
            display: flex;

            align-items: end;

            justify-content: space-between;

            margin-bottom: 45px;
        }


        .course-heading-right {
            color: var(--muted);

            font-size: 13px;

            max-width: 300px;

            text-align: right;
        }


        .course-carousel .carousel-inner {
            overflow: visible;
        }


        .course-card {
            position: relative;

            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 16px;

            overflow: hidden;

            transition: 0.35s ease;

            height: 100%;
        }


        .course-card:hover {
            transform: translateY(-7px);

            border-color: rgba(23,105,224,0.2);

            box-shadow: 0 20px 50px rgba(11,31,58,0.1);
        }


        .course-image-wrapper {
            position: relative;

            height: 260px;

            overflow: hidden;
        }


        .course-image {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: 0.5s ease;
        }


        .course-card:hover .course-image {
            transform: scale(1.05);
        }


        .course-overlay {
            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    to top,
                    rgba(11,31,58,0.8),
                    transparent 60%
                );
        }


        .course-tag {
            position: absolute;

            top: 18px;
            left: 18px;

            background: var(--yellow);

            color: var(--navy);

            padding: 6px 11px;

            border-radius: 6px;

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 0.7px;

            text-transform: uppercase;
        }


        .course-number {
            position: absolute;

            right: 18px;
            bottom: 15px;

            color: rgba(255,255,255,0.7);

            font-size: 12px;

            font-weight: 700;
        }


        .course-content {
            padding: 27px;
        }


        .course-icon {
            width: 43px;
            height: 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--light-blue);

            color: var(--blue);

            border-radius: 9px;

            margin-bottom: 17px;

            font-size: 18px;
        }


        .course-content h3 {
            font-size: 21px;

            font-weight: 800;

            color: var(--navy);

            margin-bottom: 11px;
        }


        .course-content p {
            color: var(--muted);

            font-size: 13px;

            line-height: 1.8;

            margin-bottom: 20px;
        }


        .course-link {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            color: var(--blue);

            font-size: 13px;

            font-weight: 800;
        }


        .course-link i {
            transition: 0.25s ease;
        }


        .course-card:hover .course-link i {
            transform: translateX(5px);
        }


        .course-controls {
            display: flex;

            gap: 10px;

            margin-top: 35px;
        }


        .course-control {
            width: 42px;
            height: 42px;

            border: 1px solid var(--border);

            background: #ffffff;

            color: var(--navy);

            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            transition: 0.25s ease;
        }


        .course-control:hover {
            background: var(--navy);

            color: #ffffff;
        }



        /* =====================================================
           LEARNING ENVIRONMENT
        ===================================================== */

        .environment-section {
            background: var(--navy);

            color: #ffffff;

            overflow: hidden;
        }


        .environment-section .section-label {
            color: var(--yellow);
        }


        .environment-section .section-title {
            color: #ffffff;
        }


        .environment-section .section-description {
            color: rgba(255,255,255,0.62);
        }


        .environment-list {
            margin-top: 35px;
        }


        .environment-item {
            display: flex;

            gap: 17px;

            padding: 20px 0;

            border-bottom: 1px solid rgba(255,255,255,0.1);
        }


        .environment-item:last-child {
            border-bottom: none;
        }


        .environment-icon {
            width: 45px;
            height: 45px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(247,201,72,0.12);

            color: var(--yellow);

            border-radius: 9px;
        }


        .environment-item h5 {
            font-size: 15px;

            font-weight: 700;

            margin-bottom: 4px;
        }


        .environment-item p {
            color: rgba(255,255,255,0.55);

            font-size: 13px;

            margin: 0;
        }


        .environment-image {
            position: relative;

            min-height: 520px;

            margin-left: 40px;
        }


        .environment-image img {
            width: 100%;
            height: 520px;

            object-fit: cover;

            border-radius: 16px;
        }


        .environment-badge {
            position: absolute;

            left: -25px;
            bottom: 35px;

            padding: 20px 22px;

            background: var(--yellow);

            color: var(--navy);

            border-radius: 12px;

            box-shadow: 0 15px 35px rgba(0,0,0,0.25);
        }


        .environment-badge strong {
            display: block;

            font-size: 17px;
            font-weight: 800;
        }


        .environment-badge span {
            font-size: 11px;
        }



        /* =====================================================
           PROGRAMS
        ===================================================== */

        .program-section {
            background: #ffffff;
        }


        .program-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px;

            margin-top: 45px;
        }


        .program-box {
            position: relative;

            padding: 30px;

            border: 1px solid var(--border);

            border-radius: 14px;

            transition: 0.3s ease;
        }


        .program-box:hover {
            border-color: rgba(23,105,224,0.3);

            box-shadow: 0 15px 40px rgba(11,31,58,0.07);
        }


        .program-box-number {
            color: #dbe6f5;

            font-size: 48px;

            font-weight: 800;

            line-height: 1;

            margin-bottom: 20px;
        }


        .program-box h4 {
            color: var(--navy);

            font-size: 18px;

            font-weight: 800;

            margin-bottom: 10px;
        }


        .program-box p {
            color: var(--muted);

            font-size: 13px;

            line-height: 1.8;

            margin: 0;
        }



        /* =====================================================
           CTA
        ===================================================== */

        .cta-section {
            padding: 90px 0;
        }


        .cta-box {
            position: relative;

            overflow: hidden;

            padding: 65px;

            background:
                linear-gradient(
                    120deg,
                    #0b1f3a,
                    #123d72
                );

            border-radius: 18px;

            color: #ffffff;
        }


        .cta-box::before {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            border: 1px solid rgba(255,255,255,0.08);

            border-radius: 50%;

            right: -100px;
            top: -150px;
        }


        .cta-box::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            background: rgba(247,201,72,0.08);

            border-radius: 50%;

            right: 80px;
            bottom: -90px;
        }


        .cta-content {
            position: relative;

            z-index: 2;

            max-width: 720px;
        }


        .cta-content h2 {
            font-size: 38px;

            font-weight: 800;

            margin-bottom: 15px;
        }


        .cta-content p {
            color: rgba(255,255,255,0.65);

            font-size: 15px;

            margin-bottom: 28px;
        }



        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            background: #07182d;

            color: #ffffff;

            padding: 65px 0 25px;
        }


        .footer-brand {
            display: flex;

            align-items: center;

            gap: 10px;

            font-size: 21px;

            font-weight: 800;

            margin-bottom: 18px;
        }


        .footer-brand-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--white);

            color: var(--white);

            border-radius: 9px;
        }

        .footer-brand-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}


        .footer-description {
            color: rgba(255,255,255,0.5);

            font-size: 13px;

            line-height: 1.8;

            max-width: 350px;
        }


        .footer-title {
            font-size: 13px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 1px;

            margin-bottom: 20px;
        }


        .footer-links {
            list-style: none;

            padding: 0;

            margin: 0;
        }


        .footer-links li {
            margin-bottom: 11px;
        }


        .footer-links a {
            color: rgba(255,255,255,0.5);

            font-size: 13px;

            transition: 0.2s ease;
        }


        .footer-links a:hover {
            color: var(--yellow);
        }


        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);

            margin-top: 45px;

            padding-top: 22px;

            color: rgba(255,255,255,0.35);

            font-size: 12px;
        }



        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 992px) {

            .navbar {
                background: rgba(7,24,45,0.96);
            }


            .navbar-collapse {
                background: var(--navy);

                margin-top: 15px;

                padding: 15px;

                border-radius: 10px;
            }


            .nav-login {
                display: inline-block;

                margin-left: 0;

                margin-top: 8px;
            }


            .hero,
            .hero-carousel,
            .hero-carousel .carousel-inner,
            .hero-carousel .carousel-item {
                height: 680px;
            }


            .hero-content {
                transform: translateY(-35%);
            }


            .intro-divider {
                display: none;
            }


            .intro-item {
                margin-bottom: 20px;
            }


            .about-content {
                padding-left: 0;

                margin-top: 50px;
            }


            .about-image-wrapper {
                padding-right: 15px;
            }


            .environment-image {
                margin-left: 0;

                margin-top: 45px;
            }


            .program-grid {
                grid-template-columns: 1fr 1fr;
            }

        }


        @media (max-width: 768px) {

            .section-padding {
                padding: 70px 0;
            }


            .section-title {
                font-size: 32px;
            }


            .hero,
            .hero-carousel,
            .hero-carousel .carousel-inner,
            .hero-carousel .carousel-item {
                height: 650px;
            }


            .hero-title {
                font-size: 45px;

                letter-spacing: -1.5px;
            }


            .hero-description {
                font-size: 15px;
            }


            .hero-control {
                bottom: 25px;
            }


            .carousel-control-prev.hero-control {
                right: 75px;
            }


            .carousel-control-next.hero-control {
                right: 20px;
            }


            .course-heading {
                display: block;
            }


            .course-heading-right {
                text-align: left;

                margin-top: 15px;
            }


            .program-grid {
                grid-template-columns: 1fr;
            }


            .cta-box {
                padding: 40px 25px;
            }


            .cta-content h2 {
                font-size: 30px;
            }


            .environment-image img {
                height: 400px;
            }


            .environment-badge {
                left: 15px;
                bottom: 20px;
            }

        }


        @media (max-width: 576px) {

            .hero-title {
                font-size: 38px;
            }


            .hero-actions {
                flex-direction: column;

                align-items: flex-start;
            }


            .about-image {
                height: 400px;
            }


            .course-image-wrapper {
                height: 230px;
            }


            .course-content {
                padding: 23px;
            }


            .environment-image {
                min-height: 400px;
            }


            .environment-image img {
                height: 400px;
            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">

            <span class="brand-icon">
                <img
                    src="{{ asset('images/schoolsync-logo.png') }}"
                    alt="SchoolSync"
                >
            </span>

            SchoolSync

        </a>


        <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">

            <i class="bi bi-list text-white fs-2"></i>

        </button>


        <div class="collapse navbar-collapse"
             id="mainNavbar">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="#home">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#courses">
                        Courses
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        Contact
                    </a>
                </li>

                <li class="nav-item">

                    <a class="nav-link nav-login"
                       href="{{ route('login') }}">

                        Login

                        <i class="bi bi-arrow-up-right ms-1"></i>

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>



<!-- =====================================================
     HERO
===================================================== -->

<section class="hero"
         id="home">


    <div id="heroCarousel"
         class="carousel slide hero-carousel"
         data-bs-ride="carousel"
         data-bs-interval="5500">


        <div class="carousel-inner">


            <!-- =====================
                 SLIDE 1
            ====================== -->

            <div class="carousel-item active">

                <img
                    src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=2000&q=85"
                    class="hero-image"
                    alt="Students learning together"
                >


                <div class="hero-overlay"></div>


                <div class="hero-content">

                    <div class="container">

                        <div class="hero-content-inner">

                            <div class="hero-eyebrow">

                                <i class="bi bi-stars"></i>

                                Welcome to SchoolSync

                            </div>


                            <h1 class="hero-title">

                                Learn Today.<br>

                                <span>Build Tomorrow.</span>

                            </h1>


                            <p class="hero-description">

                                A focused learning environment where
                                technology, language and professional
                                skills come together to prepare students
                                for the future.

                            </p>


                            <div class="hero-actions">

                                <a href="#courses"
                                   class="btn-primary-custom">

                                    Explore Courses

                                    <i class="bi bi-arrow-right"></i>

                                </a>


                                <a href="#about"
                                   class="btn-outline-custom">

                                    Discover SchoolSync

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            <!-- =====================
                 SLIDE 2
            ====================== -->

            <div class="carousel-item">

                <img
                    src="https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?auto=format&fit=crop&w=2000&q=85"
                    class="hero-image"
                    alt="School building"
                >


                <div class="hero-overlay"></div>


                <div class="hero-content">

                    <div class="container">

                        <div class="hero-content-inner">

                            <div class="hero-eyebrow">

                                <i class="bi bi-building"></i>

                                Education Meets Technology

                            </div>


                            <h1 class="hero-title">

                                A Place to

                                <span>Learn & Grow.</span>

                            </h1>


                            <p class="hero-description">

                                SchoolSync connects academic learning
                                with practical skills through a clear,
                                organized and student-focused environment.

                            </p>


                            <div class="hero-actions">

                                <a href="{{ route('login') }}"
                                   class="btn-primary-custom">

                                    Login to SchoolSync

                                    <i class="bi bi-arrow-right"></i>

                                </a>


                                <a href="#contact"
                                   class="btn-outline-custom">

                                    Contact Us

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>


        <!-- NO INDICATORS / NO SLIDE COUNTER -->


        <!-- Previous -->

        <button class="carousel-control-prev hero-control"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="prev">

            <i class="bi bi-arrow-left"></i>

            <span class="visually-hidden">
                Previous
            </span>

        </button>


        <!-- Next -->

        <button class="carousel-control-next hero-control"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="next">

            <i class="bi bi-arrow-right"></i>

            <span class="visually-hidden">
                Next
            </span>

        </button>

    </div>

</section>



<!-- =====================================================
     INTRO STRIP
===================================================== -->

<section class="intro-strip">

    <div class="container">

        <div class="row align-items-center">


            <div class="col-lg-4">

                <div class="intro-item">

                    <div class="intro-icon">
                        <i class="bi bi-laptop"></i>
                    </div>

                    <div>

                        <h6>
                            Technology Focused
                        </h6>

                        <p>
                            Practical digital skills for today's world
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="intro-item">

                    <div class="intro-icon">
                        <i class="bi bi-translate"></i>
                    </div>

                    <div>

                        <h6>
                            Language Learning
                        </h6>

                        <p>
                            Develop communication beyond the classroom
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="intro-item">

                    <div class="intro-icon">
                        <i class="bi bi-lightbulb"></i>
                    </div>

                    <div>

                        <h6>
                            Future Skills
                        </h6>

                        <p>
                            Build knowledge that can be applied in practice
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     ABOUT
===================================================== -->

<section class="about-section section-padding"
         id="about">

    <div class="container">

        <div class="row align-items-center">


            <div class="col-lg-6">

                <div class="about-image-wrapper">
<img
    src="{{ asset('images/students_at_school_campus.jpg') }}"
    class="about-image"
    alt="Students at school"
>

                    <div class="about-accent"></div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="about-content">

                    <span class="section-label">
                        About SchoolSync
                    </span>


                    <h2 class="section-title">
                        Learning designed for the next generation.
                    </h2>


                    <p>
                        SchoolSync is an education-focused platform
                        designed to bring learning, academic activities
                        and school information into one organized
                        environment.
                    </p>


                    <p>
                        Our focus is not only on academic knowledge.
                        Students can develop technology skills,
                        language ability and practical knowledge that
                        supports their future education and career.
                    </p>


                    <div class="about-points">


                        <div class="about-point">

                            <div class="about-point-icon">
                                <i class="bi bi-check-lg"></i>
                            </div>

                            <div>

                                <strong>
                                    Practical Learning
                                </strong>

                                <span>
                                    Connect classroom knowledge with useful skills.
                                </span>

                            </div>

                        </div>


                        <div class="about-point">

                            <div class="about-point-icon">
                                <i class="bi bi-check-lg"></i>
                            </div>

                            <div>

                                <strong>
                                    Student Focused
                                </strong>

                                <span>
                                    Learning paths designed around student development.
                                </span>

                            </div>

                        </div>


                        <div class="about-point">

                            <div class="about-point-icon">
                                <i class="bi bi-check-lg"></i>
                            </div>

                            <div>

                                <strong>
                                    Modern Environment
                                </strong>

                                <span>
                                    Technology-supported education for today's learners.
                                </span>

                            </div>

                        </div>


                    </div>

                </div>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     COURSES
===================================================== -->

<section class="courses-section section-padding"
         id="courses">

    <div class="container">


        <div class="course-heading">

            <div>

                <span class="section-label">
                    Our Courses
                </span>

                <h2 class="section-title mb-0">
                    Learn skills that move you forward.
                </h2>

            </div>


            <div class="course-heading-right">

                Explore our focused learning programs
                designed around technology, language
                and professional development.

            </div>

        </div>



        <div id="courseCarousel"
             class="carousel slide course-carousel">


            <div class="carousel-inner">


                <!-- =====================
                     ITPEC
                ====================== -->

                <div class="carousel-item active">

                    <div class="row">

                        <div class="col-lg-4">

                            <div class="course-card">

                                <div class="course-image-wrapper">

                                    <img
                                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=85"
                                        class="course-image"
                                        alt="ITPEC course"
                                    >

                                    <div class="course-overlay"></div>

                                    <span class="course-tag">
                                        Technology
                                    </span>

                                    <span class="course-number">
                                        01
                                    </span>

                                </div>


                                <div class="course-content">

                                    <div class="course-icon">
                                        <i class="bi bi-cpu"></i>
                                    </div>

                                    <h3>
                                        ITPEC
                                    </h3>

                                    <p>
                                        Develop fundamental IT knowledge,
                                        problem solving skills and technical
                                        understanding for IT-related careers.
                                    </p>

                                    <a href="{{ route('login') }}"
                                       class="course-link">

                                        Learn More

                                        <i class="bi bi-arrow-right"></i>

                                    </a>

                                </div>

                            </div>

                        </div>


                        <div class="col-lg-4">

                            <div class="course-card">

                                <div class="course-image-wrapper">

                                    <img
                                        src="https://images.unsplash.com/photo-1528360983277-13d401cdc186?auto=format&fit=crop&w=1200&q=85"
                                        class="course-image"
                                        alt="Japanese Language course"
                                    >

                                    <div class="course-overlay"></div>

                                    <span class="course-tag">
                                        Language
                                    </span>

                                    <span class="course-number">
                                        02
                                    </span>

                                </div>


                                <div class="course-content">

                                    <div class="course-icon">
                                        <i class="bi bi-translate"></i>
                                    </div>

                                    <h3>
                                        Japanese Language
                                    </h3>

                                    <p>
                                        Build practical Japanese communication
                                        skills through vocabulary, grammar,
                                        listening and everyday conversation.
                                    </p>

                                    <a href="{{ route('login') }}"
                                       class="course-link">

                                        Learn More

                                        <i class="bi bi-arrow-right"></i>

                                    </a>

                                </div>

                            </div>

                        </div>


                        <div class="col-lg-4">

                            <div class="course-card">

                                <div class="course-image-wrapper">

                                    <img
                                        src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=85"
                                        class="course-image"
                                        alt="Software Development course"
                                    >

                                    <div class="course-overlay"></div>

                                    <span class="course-tag">
                                        Development
                                    </span>

                                    <span class="course-number">
                                        03
                                    </span>

                                </div>


                                <div class="course-content">

                                    <div class="course-icon">
                                        <i class="bi bi-code-slash"></i>
                                    </div>

                                    <h3>
                                        Software Development
                                    </h3>

                                    <p>
                                        Learn programming concepts,
                                        web development and the foundations
                                        of building modern software.
                                    </p>

                                    <a href="{{ route('login') }}"
                                       class="course-link">

                                        Learn More

                                        <i class="bi bi-arrow-right"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


            </div>


           

        </div>

    </div>

</section>



<!-- =====================================================
     LEARNING ENVIRONMENT
===================================================== -->

<section class="environment-section section-padding">

    <div class="container">

        <div class="row align-items-center">


            <div class="col-lg-6">

                <span class="section-label">
                    Learning Environment
                </span>


                <h2 class="section-title">
                    More than a classroom.
                </h2>


                <p class="section-description">

                    A strong learning environment gives students
                    the opportunity to explore knowledge, practice
                    skills and prepare for real-world opportunities.

                </p>


                <div class="environment-list">


                    <div class="environment-item">

                        <div class="environment-icon">
                            <i class="bi bi-book"></i>
                        </div>

                        <div>

                            <h5>
                                Structured Learning
                            </h5>

                            <p>
                                Clear learning paths that help students
                                understand their progress.
                            </p>

                        </div>

                    </div>


                    <div class="environment-item">

                        <div class="environment-icon">
                            <i class="bi bi-pc-display"></i>
                        </div>

                        <div>

                            <h5>
                                Technology Integration
                            </h5>

                            <p>
                                Modern technology is incorporated into
                                practical learning experiences.
                            </p>

                        </div>

                    </div>


                    <div class="environment-item">

                        <div class="environment-icon">
                            <i class="bi bi-people"></i>
                        </div>

                        <div>

                            <h5>
                                Collaborative Learning
                            </h5>

                            <p>
                                Students can learn through communication,
                                discussion and shared experiences.
                            </p>

                        </div>

                    </div>


                </div>

            </div>


            <div class="col-lg-6">

                <div class="environment-image">

                    <img
                        src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1200&q=85"
                        alt="Learning environment"
                    >


                    <div class="environment-badge">

                        <strong>
                            Learn. Practice. Grow.
                        </strong>

                        <span>
                            Building skills for tomorrow
                        </span>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     PROGRAMS
===================================================== -->

<section class="program-section section-padding"
         id="programs">

    <div class="container">


        <div class="text-center">

            <span class="section-label">
                Our Approach
            </span>


            <h2 class="section-title">
                Education with purpose.
            </h2>


            <p class="section-description mx-auto">

                SchoolSync focuses on creating an organized,
                practical and supportive learning experience.

            </p>

        </div>



        <div class="program-grid">


            <div class="program-box">

                <div class="program-box-number">
                    01
                </div>

                <h4>
                    Build Knowledge
                </h4>

                <p>
                    Develop strong foundations through structured
                    academic and technical learning.
                </p>

            </div>


            <div class="program-box">

                <div class="program-box-number">
                    02
                </div>

                <h4>
                    Develop Skills
                </h4>

                <p>
                    Turn knowledge into practical skills through
                    technology, language and application.
                </p>

            </div>


            <div class="program-box">

                <div class="program-box-number">
                    03
                </div>

                <h4>
                    Prepare for the Future
                </h4>

                <p>
                    Encourage students to continue learning and
                    prepare for future academic and career goals.
                </p>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     CTA
===================================================== -->

<section class="cta-section"
         id="contact">

    <div class="container">

        <div class="cta-box">

            <div class="cta-content">

                <h2>
                    Ready to start your learning journey?
                </h2>


                <p>
                    Explore SchoolSync and discover learning
                    opportunities in technology, Japanese language
                    and software development.
                </p>


                <a href="{{ route('login') }}"
                   class="btn-primary-custom">

                    Enter SchoolSync

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    <div class="container">

        <div class="row">


<div class="col-lg-5 mb-4 mb-lg-0">

    <div class="footer-brand">

        <span class="footer-brand-icon">
            <img
                src="{{ asset('images/schoolsync-logo.png') }}"
                alt="SchoolSync"
            >
        </span>

        SchoolSync

    </div>


                <p class="footer-description">

                    An organized learning environment connecting
                    education, technology and practical skills.

                </p>

            </div>


            <div class="col-6 col-lg-2">

                <h6 class="footer-title">
                    Explore
                </h6>

                <ul class="footer-links">

                    <li>
                        <a href="#home">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#about">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="#courses">
                            Courses
                        </a>
                    </li>

                    <li>
                        <a href="#programs">
                            Programs
                        </a>
                    </li>

                </ul>

            </div>


            <div class="col-6 col-lg-2">

                <h6 class="footer-title">
                    Courses
                </h6>

                <ul class="footer-links">

                    <li>
                        <a href="#courses">
                            ITPEC
                        </a>
                    </li>

                    <li>
                        <a href="#courses">
                            Japanese Language
                        </a>
                    </li>

                    <li>
                        <a href="#courses">
                            Software Development
                        </a>
                    </li>

                </ul>

            </div>


            <div class="col-lg-3 mt-4 mt-lg-0">

                <h6 class="footer-title">
                    SchoolSync
                </h6>

                <ul class="footer-links">

                    <li>
                        <a href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li>
                        <a href="#contact">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>


        </div>


        <div class="footer-bottom">

            <div class="row">

                <div class="col-md-6">

                    © {{ date('Y') }} SchoolSync.
                    All rights reserved.

                </div>


                <div class="col-md-6 text-md-end mt-2 mt-md-0">

                    Education • Technology • Future

                </div>

            </div>

        </div>

    </div>

</footer>



<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>