<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Atlas Haven - Séjours de Luxe au Maroc')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" type="image/png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --gold: #e1a140;
            --puce: #6b2d00;
            --sand: #efcfa0;
            --burnt-orange: #914110;
            --light-sand: #f8f3e9;
            --dark: #212121;
            --white: #ffffff;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--dark);
            background-color: var(--white);
            overflow-x: hidden;
            font-size: 0.9rem;
        }

        * {
            font-family: 'DM Sans', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .navbar-brand {
            font-weight: 400;
        }

        /* Navbar Styles */
        .navbar {
            background-color: rgba(33, 33, 33, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 5px 0;
        }

        .navbar-brand img {
            transition: all 0.3s ease;
            height: 40px;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--white) !important;
            font-size: 1rem;
        }

        .nav-link {
            color: var(--white) !important;
            font-weight: 500;
            padding: 6px 12px !important;
            position: relative;
            transition: all 0.3s ease;
            font-size: 0.85rem;
        }

        .nav-link i {
            font-size: 0.8rem;
            margin-right: 4px;
        }

        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--gold);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }

        .nav-link:hover:after,
        .nav-link.active:after {
            width: 70%;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--gold) !important;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(83, 34, 0, 0.7), rgba(83, 34, 0, 0.6)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            min-height: 80vh;
            color: var(--white);
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero-content h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }

        /* Booking Card */
        .booking-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 20px;
            color: var(--dark);
            border-bottom: 3px solid var(--gold);
            transform: translateY(20px);
        }

        .booking-card h4 {
            font-size: 1.1rem;
        }

        .booking-card label {
            font-weight: 500;
            margin-bottom: 6px;
            color: var(--puce);
            font-size: 0.8rem;
        }

        .booking-card .form-control,
        .booking-card .form-select {
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            background-color: #fafafa;
            transition: all 0.3s ease;
            font-size: 0.85rem;
        }

        .booking-card .form-control:focus,
        .booking-card .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(225, 161, 64, 0.25);
        }

        /* Buttons */
        .btn {
            padding: 8px 16px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
        }

        .btn-lg {
            padding: 10px 20px;
            font-size: 0.9rem;
        }

        .btn-primary {
            background-color: var(--gold);
            border-color: var(--gold);
            color: var(--white);
            box-shadow: 0 4px 12px rgba(225, 161, 64, 0.3);
        }

        .btn-primary:hover {
            background-color: var(--burnt-orange);
            border-color: var(--burnt-orange);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(145, 65, 16, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-outline-light {
            border: 1px solid var(--white);
            color: var(--white);
            background-color: transparent;
        }

        .btn-outline-light:hover {
            background-color: var(--white);
            color: var(--puce);
        }

        /* Section Styling */
        section {
            padding: 70px 0;
        }

        .section-title {
            position: relative;
            margin-bottom: 40px;
            color: var(--puce);
            font-weight: 700;
            font-size: 1.5rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 2px;
            background: var(--gold);
        }

        .section-subtitle {
            color: var(--burnt-orange);
            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 8px;
            font-weight: 500;
        }

        /* Service Cards */
        .service-card {
            transition: all 0.4s ease;
            border: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            background-color: var(--white);
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
            border-bottom: 2px solid transparent;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
            border-bottom: 2px solid var(--gold);
        }

        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            background-color: var(--light-sand) !important;
            color: var(--gold) !important;
            font-size: 1.25rem;
            transition: all 0.3s ease;
        }

        .service-card:hover .icon-box {
            background-color: var(--gold) !important;
            color: var(--white) !important;
            transform: rotateY(180deg);
        }

        .service-card h4 {
            font-size: 1rem;
            margin-bottom: 0.75rem;
        }

        .service-card p {
            font-size: 0.8rem;
            margin-bottom: 0;
        }

        /* Room Cards */
        .room-card {
            border: none;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
            transition: all 0.4s ease;
            background-color: var(--white);
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .room-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .room-img-container {
            position: relative;
            overflow: hidden;
        }

        .room-img {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
            width: 100%;
        }

        .room-card:hover .room-img {
            transform: scale(1.05);
        }

        .room-price {
            position: absolute;
            bottom: 15px;
            right: 15px;
            background-color: var(--gold);
            color: var(--white);
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.8rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .room-card .card-body {
            padding: 15px;
        }

        .room-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--puce);
            font-size: 1rem;
        }

        .amenity-badge {
            background: var(--light-sand);
            color: var(--burnt-orange);
            margin-right: 6px;
            margin-bottom: 6px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.65rem;
            border: 1px solid rgba(145, 65, 16, 0.2);
        }

        .amenity-badge i {
            font-size: 0.6rem;
        }

        /* Footer */
        footer {
            background: var(--puce);
            color: var(--white);
            padding: 50px 0 20px;
            position: relative;
            font-size: 0.85rem;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(to right, var(--gold), var(--burnt-orange), var(--gold));
        }

        footer h5 {
            color: var(--gold);
            font-weight: 600;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
            font-size: 1rem;
        }

        footer h5::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 2px;
            background: var(--gold);
            bottom: -8px;
            left: 0;
        }

        footer a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.85rem;
        }

        footer a:hover {
            color: var(--gold);
            padding-left: 3px;
        }

        footer .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 32px;
            width: 32px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 8px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        footer .social-icons a:hover {
            background-color: var(--gold);
            transform: translateY(-2px);
        }

        footer ul li {
            margin-bottom: 10px;
        }

        footer ul li i {
            margin-right: 8px;
            color: var(--gold);
            font-size: 0.9rem;
        }

        footer .input-group .form-control {
            padding: 8px 12px;
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            color: var(--white);
            border-radius: 6px 0 0 6px;
            font-size: 0.85rem;
        }

        footer .input-group .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.85rem;
        }

        footer .input-group .btn {
            background-color: var(--gold);
            border-color: var(--gold);
            color: var(--white);
            font-weight: 500;
            border-radius: 0 6px 6px 0;
            padding: 8px 12px;
            font-size: 0.85rem;
        }

        footer .input-group .btn:hover {
            background-color: var(--burnt-orange);
            border-color: var(--burnt-orange);
        }

        footer hr {
            background-color: rgba(255, 255, 255, 0.1);
            margin: 20px 0;
        }

        /* Animation delays for AOS */
        [data-aos] {
            transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .navbar-collapse {
                background-color: rgba(33, 33, 33, 0.97);
                padding: 15px;
                border-radius: 8px;
                margin-top: 10px;
            }

            .hero-content h1 {
                font-size: 1.25rem;
            }

            .booking-card {
                margin-top: 30px;
            }
        }

        @media (max-width: 767px) {
            .hero-content h1 {
                font-size: 1.1rem;
            }

            section {
                padding: 50px 0;
            }

            .service-card,
            .room-card {
                margin-bottom: 20px;
            }
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 1.5s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--burnt-orange);
        }
    </style>
    @yield('additional_css')
</head>

<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo-white.png') }}" alt="Atlas Haven" height="40" class="me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="fas fa-home me-1"></i> Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('about') }}">
                            <i class="fas fa-info-circle me-1"></i> À propos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('services') ? 'active' : '' }}"
                            href="{{ url('services') }}">
                            <i class="fas fa-concierge-bell me-1"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('hotels') ? 'active' : '' }}" href="{{ url('hotels') }}">
                            <i class="fas fa-hotel me-1"></i> Hôtels
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('rooms') ? 'active' : '' }}" href="{{ url('rooms') }}">
                            <i class="fas fa-bed me-1"></i> Chambres
                        </a>
                    </li>
                </ul>
                <div class="d-flex">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                            <i class="fas fa-sign-in-alt me-1"></i> Connexion
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            <i class="fas fa-user-plus me-1"></i> Inscription
                        </a>
                    @else
                        <a href="{{ route('my-space') }}" class="btn btn-outline-light me-2">
                            <i class="fas fa-user me-1"></i> Mon Espace
                        </a>
                        <a href="{{ route('logout') }}" class="btn btn-primary"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-1"></i> Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <img src="{{ asset('assets/img/logo-white.png') }}" alt="Atlas Haven" height="60"
                        class="mb-3">
                    <p class="mb-3">Atlas Haven est une référence en matière d'hébergement de luxe au Maroc, offrant
                        des expériences uniques et des séjours mémorables dans les plus beaux riads et hôtels du pays.
                    </p>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <h5>Liens Rapides</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}"><i class="fas fa-chevron-right me-1"></i> Accueil</a></li>
                        <li><a href="{{ url('about') }}"><i class="fas fa-chevron-right me-1"></i> À propos</a></li>
                        <li><a href="{{ url('services') }}"><i class="fas fa-chevron-right me-1"></i> Services</a>
                        </li>
                        <li><a href="{{ url('hotels') }}"><i class="fas fa-chevron-right me-1"></i> Nos Hôtels</a>
                        </li>
                        <li><a href="{{ url('rooms') }}"><i class="fas fa-chevron-right me-1"></i> Chambres</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                    <h5>Nous Contacter</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i> Avenue Mohammed VI, Marrakech 40000, Maroc
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone me-2"></i> +212 5 24 44 44 44
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2"></i> contact@atlas-haven.com
                        </li>
                        <li>
                            <i class="fas fa-clock me-2"></i> Lun-Ven: 9h - 18h
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Newsletter</h5>
                    <p class="mb-3">Abonnez-vous à notre newsletter pour des offres exclusives et des mises à jour
                        sur nos nouvelles
                        destinations.</p>
                    <form action="" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Votre Email"
                                aria-label="Votre Email" required>
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-paper-plane me-1"></i> S'abonner
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0 small">&copy; {{ date('Y') }} Atlas Haven. Tous droits réservés.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="{{ url('privacy-policy') }}" class="me-2 small">Politique de confidentialité</a>
                    <a href="{{ url('terms-of-service') }}" class="me-2 small">Conditions d'utilisation</a>
                    <a href="{{ url('faq') }}" class="small">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Custom JS -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Form input animations
        const formInputs = document.querySelectorAll('.form-control, .form-select');
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
