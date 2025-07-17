@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Organization</h1>

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

    <form action="{{ route('organizations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Vision</label>
            <input type="text" name="vision" class="form-control" value="{{ old('vision') }}" required>
        </div>
        <div class="mb-3">
            <label>Mission</label>
            <input type="text" name="mission" class="form-control" value="{{ old('mission') }}" required>
        </div>
        <div class="mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Logo Philosophy</label>
            <textarea name="logo_philosophy" class="form-control">{{ old('logo_philosophy') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
