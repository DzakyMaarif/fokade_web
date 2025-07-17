@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Programs</h1>
    <a href="{{ route('programs.create') }}" class="btn btn-primary mb-3">Create Program</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Batch</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        @foreach ($programs as $program)
        <tr>
            <td>{{ $program->name }}</td>
            <td>{{ $program->description }}</td>
            <td>{{ $program->batch->name }} ({{ $program->batch->year }})</td>
            <td>
                @if($program->photo)
                    <img src="{{ asset('uploads/programs/'.$program->photo) }}" width="80">
                @endif
            </td>
            <td>
                <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
