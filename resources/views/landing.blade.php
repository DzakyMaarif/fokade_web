@extends('layouts.homelayout')

@section('content')
    @php
        $heroImage =
            $program && $program->photo ? asset('uploads/programs/' . $program->photo) : asset('images/default.jpg');
    @endphp

    <div class="hero-section" style="background-image: url('{{ $heroImage }}')">
        <div class="overlay"></div>
        <div class="hero-text">
            <h1>{{ $organization?->name ?? 'Kosong' }}</h1>

        </div>
    </div>

    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                @if ($organization && $organization->logo)
                    <img src="{{ asset('storage/' . $organization->logo) }}" alt="Logo {{ $organization->name }}"
                        class="img-fluid w-75">
                @else
                    <div class="bg-secondary text-white p-5">No Logo</div>
                @endif
            </div>
            <div class="col-md-9">
                <h1>{{ $organization?->name ?? 'Kosong' }}</h1>

                <p>{{ $organization->description ?? 'Kosong' }}</p>

                <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#visiMisi"
                    aria-expanded="false" aria-controls="visiMisi">
                    Visi / Misi
                </button>

                <div class="collapse mt-3" id="visiMisi">
                    <div class="card card-body">
                        <h5>Visi</h5>
                        <p>{{ $organization->vision ?? 'Kosong' }}</p>
                        <h5>Misi</h5>
                        <p>{{ $organization->mission ?? 'Kosong' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-5 bg-primary text-white p-4 rounded-0">
        <div class="container">
            <h3 class="mt-4 mb-5 text-center">Program Kerja</h3>
            <div class="row">
                @foreach ($programs as $index => $prog)
                    <div class="col-md-6 mb-4">
                        <div class="h-100">
                            <img src="{{ asset('uploads/programs/' . $prog->photo) }}" class="w-100 mb-2 rounded-3"
                                style="height:250px; object-fit:cover;" alt="{{ $prog->name }}">
                            <div class="card-body bg-primary text-white">
                                <h5>
                                    <a data-bs-toggle="collapse" href="#collapseProgram{{ $index }}" role="button"
                                        aria-expanded="false" aria-controls="collapseProgram{{ $index }}"
                                        style="color:rgb(255, 255, 255); text-decoration:none;">
                                        {{ $prog->name }}
                                    </a>
                                </h5>
                                <div class="collapse" id="collapseProgram{{ $index }}">
                                    <p class="mt-2">{{ $prog->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('news.index') }}" class="btn btn-light rounded-pill px-4 py-2">Lihat lebih banyak</a>
            </div>
        </div>
    </div>

    <div class="bg-white py-5">
        <div class="container">
            <h3 class="text-center text-primary mb-5">Delegasi Sekolah</h3>
            <div class="row justify-content-center">
                @foreach ($schools as $index => $school)
                    <div class="col-4 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{ asset($school->logo) }}" alt="Logo Sekolah" class="img-fluid rounded-3"
                            style="height:200px; object-fit:contain;">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-primary text-white py-5">
        <div class="container">
            <h3 class="text-center mb-5">Artikel</h3>

            <div class="row">
                @foreach ($news->take(6) as $item)
                    <div class="col-6 col-md-4 mb-4">
                        <div style="background:white; border-radius:10px; overflow:hidden;" class="h-100">
                            <img src="{{ asset($item->photo) }}" alt="{{ $item->title }}" class="w-100"
                                style="height:250px; object-fit:cover;">
                            <div class="p-2 text-dark text-center">
                                <strong>{{ $item->title }}</strong>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('news.index') }}" class="btn btn-light rounded-pill px-4 py-2">Lihat lebih banyak</a>
            </div>
        </div>
    </div>
@endsection
