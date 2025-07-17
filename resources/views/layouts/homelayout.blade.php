<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fokade - Forum OSIS Kab Demak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            min-height: 80px;
        }

        .navbar-brand {
            font-weight: bold;
            color: #007bff !important;
            font-size: 35px
        }

        .nav-item .nav-link {
            font-size: 1.15em;
        }

        .hero-section {
            position: relative;
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .hero-section .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-align: center;
        }

        .hero-section .hero-text h1 {
            font-size: 3.5rem;
        }
    </style>
    @stack('styles')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 fixed-top shadow-sm">
        <div class="container-fluid" style="padding-left:100px; padding-right:80px;">
            <a class="navbar-brand" href="/">
                FOKADE
            </a>
            <div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active text-primary fw-bold' : '' }}"
                            href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('detail_divisi.*') ? 'active text-primary fw-bold' : '' }}"
                            href="{{ route('detail_divisi.index') }}">
                            Divisi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('detail_school.*') ? 'active text-primary fw-bold' : '' }}"
                            href="{{ route('detail_school.index') }}">
                            Sekolah
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('detail_programs.*') ? 'active text-primary fw-bold' : '' }}"
                            href="{{ route('detail_programs.index') }}">
                            Programs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('detail_news.*') ? 'active text-primary fw-bold' : '' }}"
                            href="{{ route('detail_news.index') }}">
                            News
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="padding-top:100px;">
        @yield('content')
    </div>

    <footer class="bg-light text-center text-muted py-4 mt-5">
        <div class="container">
            <p class="mb-1">© {{ date('Y') }} Forum OSIS Kabupaten Demak</p>
            <small>Developed by FOKADE Team</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
