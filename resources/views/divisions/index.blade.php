@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Divisions</h1>
    <a href="{{ route('divisions.create') }}" class="btn btn-primary mb-2">Create division</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        @foreach ($divisions as $division)
        <tr>
            <td>{{ $division->name }}</td>
            <td>{{ $division->description }}</td>
            <td>
                <a href="{{ route('divisions.edit', $division->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('divisions.destroy', $division->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
