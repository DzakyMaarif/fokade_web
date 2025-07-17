@extends('layouts.homelayout')

@section('content')
<div class="container py-5" style="margin-top:100px; max-width:800px;">
    <h2 class="mb-4 text-center">{{ $news->title }}</h2>

    @if($news->photo)
        <img src="{{ asset($news->photo) }}" 
             class="img-fluid mb-4" 
             style="max-height:400px; object-fit:cover; display:block; margin:auto;"
             alt="{{ $news->title }}">
    @else
        <div class="bg-secondary text-white d-flex align-items-center justify-content-center mb-4"
             style="height:300px;">
            No Image
        </div>
    @endif

    <div class="mb-3 text-muted text-center">
        Diterbitkan pada {{ $news->created_at->format('d M Y') }}
    </div>

    <div class="news-content">
        {!! nl2br(e($news->content)) !!}
    </div>
</div>
@endsection

@push('styles')
<style>
.news-content {
    word-break: break-all;
    overflow-wrap: break-word;
    white-space: pre-wrap; /* menjaga enter */
}
</style>
@endpush
