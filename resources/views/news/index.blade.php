@extends('layouts.app')

@section('content')
<div class="container">
    <h1>News</h1>
    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Create News</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Batch</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        @foreach ($news as $item)
        <tr>
            <td>{{ $item->title }}</td>
            <td>{{ $item->batch->name ?? '-' }}</td>
            <td>
                @if($item->photo)
                    <img src="{{ asset($item->photo) }}" width="60">
                @endif
            </td>
            <td>
                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline;">
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
