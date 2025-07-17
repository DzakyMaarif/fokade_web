@extends('layouts.homelayout')

@section('content')
<div class="container py-5" style="margin-top:100px;">
    <h2 class="text-center mb-5">Program Kerja</h2>

    @foreach ($programs as $program)
    <div class="row mb-4 align-items-center">
        <div class="col-md-4">
            @if($program->photo)
                <img src="{{ asset('uploads/programs/'.$program->photo) }}" 
                     class="img-fluid rounded" 
                     alt="{{ $program->name }}">
            @else
                <div class="bg-secondary text-white text-center p-5">
                    No Image
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <h4>{{ $program->name }}</h4>
            <p>{{ $program->description }}</p>
        </div>
    </div>
    <hr>
    @endforeach
</div>
@endsection
