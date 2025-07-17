@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Organization</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('organizations.update', $organization->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $organization->name) }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $organization->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Vision</label>
            <input type="text" name="vision" class="form-control" value="{{ old('vision', $organization->vision) }}" required>
        </div>
        <div class="mb-3">
            <label>Mission</label>
            <input type="text" name="mission" class="form-control" value="{{ old('mission', $organization->mission) }}" required>
        </div>
        <div class="mb-3">
            <label>Logo</label><br>
            @if ($organization->logo)
                <img src="{{ asset('storage/' . $organization->logo) }}" alt="Logo" width="80" class="mb-2">
            @endif
            <input type="file" name="logo" class="form-control">
            <small class="text-muted">Leave blank if you do not want to change the logo.</small>
        </div>
        <div class="mb-3">
            <label>Logo Philosophy</label>
            <textarea name="logo_philosophy" class="form-control">{{ old('logo_philosophy', $organization->logo_philosophy) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
