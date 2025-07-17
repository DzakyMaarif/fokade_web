@extends('layouts.homelayout')

@section('content')
<div class="container py-5" style="margin-top:100px;">
    <h2 class="text-center mb-5">Sekolah</h2>

    <div class="row">
        @foreach ($schools as $school)
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                @if($school->logo)
                    <img src="{{ asset($school->logo) }}" class="card-img-top p-3" style="height:200px; object-fit:contain;">
                @else
                    <div class="bg-secondary text-white p-5">No Logo</div>
                @endif
                <div class="card-body">
                    <h5>{{ $school->name }}</h5>
                    <div class="mt-3">
                        @if($school->address)
                            <a href="{{ $school->address }}" target="_blank" class="btn btn-outline-primary mb-2">Lihat di Google Maps</a>
                        @endif
                        <a href="{{ route('detail_school.delegates', $school->id) }}" class="btn btn-primary">Delegasi</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
