@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Schools</h1>
    <a href="{{ route('schools.create') }}" class="btn btn-primary mb-3">Create School</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schools as $school)
            <tr>
                <td>
                    @if($school->logo)
                        <img src="{{ asset($school->logo) }}" width="80" alt="Logo {{ $school->name }}">
                    @else
                        <small>No Logo</small>
                    @endif
                </td>
                <td>{{ $school->name }}</td>
                <td>{{ $school->address }}</td>
                <td>
                    <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('schools.destroy', $school->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
