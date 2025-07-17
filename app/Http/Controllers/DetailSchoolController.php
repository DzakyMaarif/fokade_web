<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Batch;
use Illuminate\Http\Request;

class DetailSchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('detail_school.index', compact('schools'));
    }

    public function delegates(Request $request, School $school)
    {
        $batchId = $request->get('batch_id');
        $batches = Batch::all();

        $members = $school->members()
            ->when($batchId, fn($q) => $q->where('batch_id', $batchId))
            ->get();

        return view('detail_school.delegates', compact('school', 'members', 'batches', 'batchId'));
    }
}
