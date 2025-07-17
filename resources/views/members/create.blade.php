@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Member</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label>Batch</label>
            <select name="batch_id" class="form-control" required>
                <option value="">-- Select Batch --</option>
                @foreach($batches as $batch)
                    <option value="{{ $batch->id }}" {{ old('batch_id')==$batch->id?'selected':'' }}>
                        {{ $batch->name }} ({{ $batch->year }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Division</label>
            <select name="division_id" class="form-control" required>
                <option value="">-- Select Division --</option>
                @foreach($divisions as $division)
                    <option value="{{ $division->id }}" {{ old('division_id')==$division->id?'selected':'' }}>
                        {{ $division->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>School</label>
            <select name="school_id" class="form-control" required>
                <option value="">-- Select School --</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}" {{ old('school_id')==$school->id?'selected':'' }}>
                        {{ $school->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
