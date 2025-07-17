@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Members</h1>
    <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">Create Member</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Batch</th>
            <th>Division</th>
            <th>School</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        @foreach ($members as $member)
        <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->batch->name ?? '-' }}</td>
            <td>{{ $member->division->name ?? '-' }}</td>
            <td>{{ $member->school->name ?? '-' }}</td>
            <td>
                @if($member->photo)
                    <img src="{{ asset($member->photo) }}" width="60">
                @endif
            </td>
            <td>
                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
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
