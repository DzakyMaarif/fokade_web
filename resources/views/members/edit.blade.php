@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Member</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Batch</label>
            <select name="batch_id" class="form-control" required>
                <option value="">-- Select Batch --</option>
                @foreach($batches as $batch)
                    <option value="{{ $batch->id }}" {{ old('batch_id', $member->batch_id)==$batch->id?'selected':'' }}>
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
                    <option value="{{ $division->id }}" {{ old('division_id', $member->division_id)==$division->id?'selected':'' }}>
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
                    <option value="{{ $school->id }}" {{ old('school_id', $member->school_id)==$school->id?'selected':'' }}>
                        {{ $school->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Photo</label><br>
            @if($member->photo)
                <img src="{{ asset($member->photo) }}" width="100" class="mb-2"><br>
            @endif
            <input type="file" name="photo" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
