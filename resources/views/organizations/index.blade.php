@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Organizations</h1>
    <a href="{{ route('organizations.create') }}" class="btn btn-primary mb-2">Create Organization</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Logo</th>
            <th>Name</th>
            <th>Description</th>
            <th>Vision</th>
            <th>Mission</th>
            <th>Logo Philosophy</th>
            <th>Actions</th>
        </tr>
        @foreach ($organizations as $organization)
        <tr>
            <td>
                @if ($organization->logo)
                    <img src="{{ asset('storage/' . $organization->logo) }}" alt="Logo" width="60">
                @else
                    <span class="text-muted">No logo</span>
                @endif
            </td>
            <td>{{ $organization->name }}</td>
            <td>{{ $organization->description }}</td>
            <td>{{ $organization->vision }}</td>
            <td>{{ $organization->mission }}</td>
            <td>{{ $organization->logo_philosophy }}</td>
            <td>
                <a href="{{ route('organizations.edit', $organization->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST" style="display:inline;">
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
