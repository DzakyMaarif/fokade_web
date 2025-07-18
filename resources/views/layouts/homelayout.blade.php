<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fokade - Forum OSIS Kab Demak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Color Palette - Calm & Minimal */
        :root {
            --primary-color: #4a90e2;
            --primary-light: #6ba3e8;
            --primary-dark: #357abd;
            --secondary-color: #64748b;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --text-muted: #94a3b8;
            --bg-light: #f8fafc;
            --bg-white: #ffffff;
            --border-light: #e2e8f0;
            --border-color: #cbd5e1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--bg-white);
        }

        /* Navbar Styles */
        .navbar {
            min-height: 80px;
            background: var(--bg-white) !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-bottom: 1px solid var(--border-light);
        }

        .navbar.scrolled {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
            letter-spacing: -0.5px;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--primary-dark) !important;
        }

        .navbar-nav {
            gap: 0.5rem;
        }

        .nav-item .nav-link {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-dark) !important;
            padding: 0.7rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-item .nav-link:hover {
            color: var(--primary-color) !important;
            background-color: var(--bg-light);
        }

        .nav-item .nav-link.active {
            color: var(--primary-color) !important;
            background-color: var(--bg-light);
            font-weight: 600;
        }

        /* Mobile menu */
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            border-radius: 6px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Main content */
        .main-content {
            padding-top: 100px;
            min-height: calc(100vh - 200px);
        }

        /* Hero section */
        .hero-section {
            position: relative;
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(30, 41, 59, 0.7);
        }

        .hero-section .hero-text {
            position: relative;
            z-index: 2;
            color: #fff;
            text-align: center;
        }

        .hero-section .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        /* Footer Styles */
        .footer {
            background: var(--text-dark);
            color: var(--bg-white);
            position: relative;
        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--bg-white);
        }

        .footer-description {
            font-size: 0.95rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
            margin-bottom: 2rem;
        }

        .footer-link {
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 400;
            transition: all 0.3s ease;
            padding: 0.3rem 0;
        }

        .footer-link:hover {
            color: var(--bg-white);
            padding-left: 0.5rem;
        }

        .footer-section-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--bg-white);
        }

        .footer-social {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: var(--secondary-color);
            border-radius: 8px;
            color: var(--bg-white);
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--primary-color);
            color: var(--bg-white);
            transform: translateY(-2px);
        }

        .footer-bottom {
            border-top: 1px solid var(--secondary-color);
            padding-top: 2rem;
            text-align: center;
        }

        .footer-bottom p {
            margin-bottom: 0.5rem;
            color: var(--text-muted);
        }

        .footer-bottom small {
            color: var(--text-muted);
        }

        /* Scroll to top button */
        .scroll-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
        }

        .scroll-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .scroll-to-top:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(74, 144, 226, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .navbar-brand {
                font-size: 1.6rem;
            }

            .navbar-nav {
                gap: 0.3rem;
                margin-top: 1rem;
            }

            .nav-item .nav-link {
                text-align: center;
                margin-bottom: 0.3rem;
            }

            .footer-links {
                gap: 0.5rem;
            }

            .footer-social {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding-top: 80px;
            }

            .navbar {
                min-height: 70px;
            }

            .navbar-brand {
                font-size: 1.5rem;
            }

            .footer-brand {
                font-size: 1.3rem;
            }

            .footer-description {
                font-size: 0.9rem;
            }

            .hero-section .hero-text h1 {
                font-size: 2.5rem;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Loading animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--bg-white);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .loading.show {
            opacity: 1;
            visibility: visible;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 3px solid var(--border-light);
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Utility classes */
        .text-primary-custom {
            color: var(--primary-color) !important;
        }

        .bg-light-custom {
            background-color: var(--bg-light) !important;
        }

        .border-light-custom {
            border-color: var(--border-light) !important;
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Loading Screen -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-graduation-cap me-2"></i>FOKADE
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">
                            <i class="fas fa-home me-2"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('detail_divisi.*') ? 'active' : '' }}"
                            href="{{ route('detail_divisi.index') }}">
                            <i class="fas fa-users me-2"></i>Divisi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('detail_school.*') ? 'active' : '' }}"
                            href="{{ route('detail_school.index') }}">
                            <i class="fas fa-school me-2"></i>Sekolah
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('detail_programs.*') ? 'active' : '' }}"
                            href="{{ route('detail_programs.index') }}">
                            <i class="fas fa-tasks me-2"></i>Program
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('detail_news.*') ? 'active' : '' }}"
                            href="{{ route('detail_news.index') }}">
                            <i class="fas fa-newspaper me-2"></i>Berita
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h3 class="footer-brand">
                        <i class="fas fa-graduation-cap me-2"></i>FOKADE
                    </h3>
                    <p class="footer-description">
                        Forum OSIS Kabupaten Demak adalah wadah aspirasi dan kreativitas siswa-siswi SMA/SMK se-Kabupaten Demak untuk membangun generasi yang berkarakter dan berprestasi.
                    </p>
                    <div class="footer-social">
                        <a href="#" class="social-link" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" title="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="social-link" title="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5 class="footer-section-title">Menu</h5>
                    <div class="footer-links">
                        <a href="{{ route('home') }}" class="footer-link">Beranda</a>
                        <a href="{{ route('detail_divisi.index') }}" class="footer-link">Divisi</a>
                        <a href="{{ route('detail_school.index') }}" class="footer-link">Sekolah</a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5 class="footer-section-title">Informasi</h5>
                    <div class="footer-links">
                        <a href="{{ route('detail_programs.index') }}" class="footer-link">Program</a>
                        <a href="{{ route('detail_news.index') }}" class="footer-link">Berita</a>
                        <a href="#" class="footer-link">Kontak</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-section-title">Hubungi Kami</h5>
                    <div class="footer-links">
                        <div class="footer-link">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Kabupaten Demak, Jawa Tengah
                        </div>
                        <div class="footer-link">
                            <i class="fas fa-envelope me-2"></i>
                            info@fokade.com
                        </div>
                        <div class="footer-link">
                            <i class="fas fa-phone me-2"></i>
                            (024) 123-4567
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Forum OSIS Kabupaten Demak. All rights reserved.</p>
                <small>Developed with <i class="fas fa-heart" style="color: #ef4444;"></i> by FOKADE Team</small>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" id="scrollToTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Scroll to top button
        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });

        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Loading screen
        window.addEventListener('load', function() {
            const loading = document.getElementById('loading');
            setTimeout(() => {
                loading.classList.remove('show');
            }, 500);
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Auto-collapse navbar on mobile
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', function() {
                const navbarToggler = document.querySelector('.navbar-toggler');
                const navbarCollapse = document.querySelector('.navbar-collapse');
                
                if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
                    navbarToggler.click();
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>