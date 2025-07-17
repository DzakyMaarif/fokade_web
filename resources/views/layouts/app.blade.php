<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fokade - Forum OSIS Kab Demak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="/dashboard-admin-ganteng">Fokade</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-center">

                <!-- Link–link lain -->
                <li class="nav-item"><a class="nav-link" href="{{ route('organizations.index') }}">Organizations</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('divisions.index') }}">Divisions</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('schools.index') }}">Schools</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('batches.index') }}">Batches</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('members.index') }}">Members</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('programs.index') }}">Programs</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('news.index') }}">News</a></li>

                <!-- Logout -->
                @auth
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a
                        class="nav-link text-danger"
                        href="#"
                        onclick="event.preventDefault();
                                 if (confirm('Anda yakin ingin logout?')) {
                                     document.getElementById('logout-form').submit();
                                 }"
                    >
                        Logout
                    </a>
                </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
