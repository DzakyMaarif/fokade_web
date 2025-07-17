@extends('layouts.homelayout')

@section('content')
<div class="container py-5" style="margin-top:100px;">
    <h2 class="text-center mb-5">Berita Terbaru</h2>

    <div class="row">
        @foreach ($news as $item)
        <div class="col-md-4 mb-4 text-center">
            <a href="{{ route('detail_news.show', $item->id) }}">
                @if($item->photo)
                    <img src="{{ asset($item->photo) }}" 
                        class="img-fluid mb-3" 
                        style="height:250px; object-fit:cover;"
                        alt="{{ $item->title }}">
                @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center mb-3"
                         style="height:250px;">
                        No Image
                    </div>
                @endif
            </a>
            <h5>
                <a href="{{ route('detail_news.show', $item->id) }}" 
                   class="text-dark text-decoration-none">
                   {{ $item->title }}
                </a>
            </h5>
            <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
        </div>
        @endforeach
    </div>
</div>
@endsection
