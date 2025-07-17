@extends('layouts.homelayout')

@section('content')
<div class="container py-5" style="margin-top:100px;">
    <h2 class="mb-4">Delegasi dari: {{ $school->name }}</h2>

    <form method="GET" action="{{ route('detail_school.delegates', $school->id) }}" class="mb-4">
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
        <div class="alert alert-info">Belum ada delegasi pada filter ini.</div>
    @else
        <div class="row">
            @foreach ($members as $member)
            <div class="col-md-3 mb-4">
                <div class="card h-100 text-center">
                    @if($member->photo)
                        <img src="{{ asset($member->photo) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                    @else
                        <div class="bg-secondary text-white p-5">No Photo</div>
                    @endif
                    <div class="card-body">
                        <h6>{{ $member->name }}</h6>
                        <small>Angkatan {{ $member->batch->name }}</small><br>
                        <small>Divisi {{ $member->division ? $member->division->name : '-' }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
