<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Batch;
use Illuminate\Http\Request;


class DetailDivisiController extends Controller
{
    public function index()
    {
        $divisions = Division::all();
        $batches = Batch::all(); // untuk filter anggota nanti
        return view('detail_divisi.index', compact('divisions', 'batches'));
    }

    public function members(Request $request, Division $division)
    {
        $batches = Batch::all();

        $batchId = $request->get('batch_id');
        $members = $division->members();

        if ($batchId) {
            $members->where('batch_id', $batchId);
        }

        $members = $members->get();

        return view('detail_divisi.members', compact('division', 'members', 'batches', 'batchId'));
    }
}
