@extends('layouts.homelayout')

@section('content')
<div class="container my-5" style="padding-top: 100px;">
    <h2 class="text-center mb-5">Divisi</h2>

    <div class="row">
        @foreach ($divisions as $division)
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4>{{ $division->name }}</h4>
                    <p>{{ $division->description }}</p>
                    <a href="{{ route('detail_divisi.members', $division->id) }}" class="btn btn-primary mt-3">
                        Anggota
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
