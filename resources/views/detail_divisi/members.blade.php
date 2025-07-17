@extends('layouts.homelayout')

@section('content')
<div class="container my-5" style="padding-top: 100px;">
    <h2 class="mb-4">Anggota Divisi: {{ $division->name }}</h2>

    <form method="GET" action="{{ route('detail_divisi.members', $division->id) }}" class="mb-4">
        <div class="row g-2 align-items-end">
            <div class="col-md-4">
                <label>Filter berdasarkan Batch</label>
                <select name="batch_id" class="form-control">
                    <option value="">-- Semua Batch --</option>
                    @foreach ($batches as $batch)
                        <option value="{{ $batch->id }}" {{ ($batchId == $batch->id) ? 'selected' : '' }}>
                            {{ $batch->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    @if($members->isEmpty())
        <div class="alert alert-info">Belum ada anggota pada filter ini.</div>
    @else
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Batch</th>
                    <th>Asal Sekolah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr>
                    <td>
                        <img src="{{ asset($member->photo ?? 'images/default.jpg') }}" 
                             alt="{{ $member->name }}" 
                             class="img-fluid rounded" style="height:80px;">
                    </td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->batch->name }}</td>
                    <td>{{ $member->school->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
