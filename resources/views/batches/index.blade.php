@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Batches</h1>
    <a href="{{ route('batches.create') }}" class="btn btn-primary mb-2">Create batche</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
        @foreach ($batches as $batche)
        <tr>
            <td>{{ $batche->name }}</td>
            <td>{{ $batche->year }}</td>
            <td>
                <a href="{{ route('batches.edit', $batche->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('batches.destroy', $batche->id) }}" method="POST" style="display:inline;">
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
