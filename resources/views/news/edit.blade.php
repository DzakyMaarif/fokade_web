@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit News</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="4" required>{{ old('content', $news->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Batch</label>
            <select name="batch_id" class="form-control" required>
                <option value="">-- Select Batch --</option>
                @foreach($batches as $batch)
                    <option value="{{ $batch->id }}" {{ old('batch_id', $news->batch_id)==$batch->id?'selected':'' }}>
                        {{ $batch->name }} ({{ $batch->year }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Photo</label><br>
            @if($news->photo)
                <img src="{{ asset($news->photo) }}" width="100" class="mb-2"><br>
            @endif
            <input type="file" name="photo" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
