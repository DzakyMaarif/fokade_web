<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasPermissions;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use HasPermissions;

    public function __construct()
    {
        $this->middleware('permission:create_batches')->only('index');
        $this->middleware('permission:read_batches')->only('create', 'store');
        $this->middleware('permission:update_batches')->only('edit', 'update');
        $this->middleware('permission:delete_batches')->only('destroy');
    }

    public function index()
    {
        $batches = Batch::all();
        return view('batches.index', compact('batches'));
    }

    public function create()
    {
        return view('batches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required|integer',
        ]);

        Batch::create($request->all());

        return redirect()->route('batches.index')
            ->with('success', 'Batch created successfully.');
    }

    public function show(Batch $batch)
    {
        return view('batches.show', compact('batch'));
    }

    public function edit(Batch $batch)
    {
        return view('batches.edit', compact('batch'));
    }

    public function update(Request $request, Batch $batch)
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required|integer',
        ]);

        $batch->update($request->all());

        return redirect()->route('batches.index')
            ->with('success', 'Batch updated successfully.');
    }

    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect()->route('batches.index')
            ->with('success', 'Batch deleted successfully.');
    }
}
