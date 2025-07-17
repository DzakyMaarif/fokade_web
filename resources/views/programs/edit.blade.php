@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Program</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $program->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $program->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Batch</label>
            <select name="batch_id" class="form-control" required>
                <option value="">-- Select Batch --</option>
                @foreach($batches as $batch)
                    <option value="{{ $batch->id }}" {{ (old('batch_id', $program->batch_id)==$batch->id)?'selected':'' }}>
                        {{ $batch->name }} ({{ $batch->year }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Photo</label><br>
            @if($program->photo)
                <img src="{{ asset($program->photo) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="photo" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
