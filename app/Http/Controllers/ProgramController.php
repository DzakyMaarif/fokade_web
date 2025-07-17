<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Batch;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasPermissions;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use HasPermissions;

    public function __construct()
    {
        $this->middleware('permission:create_programs')->only('index');
        $this->middleware('permission:read_programs')->only('create', 'store');
        $this->middleware('permission:update_programs')->only('edit', 'update');
        $this->middleware('permission:delete_programs')->only('destroy');
    }

    public function index()
    {
        $programs = Program::with('batch')->get();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        $batches = Batch::all();
        return view('programs.create', compact('batches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'batch_id' => 'required|exists:batches,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $filename = time().'_'.$request->photo->getClientOriginalName();
            $request->photo->move(public_path('uploads/programs'), $filename);
            $data['photo'] = $filename; // hanya nama file
        }

        Program::create($data);

        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    public function edit(Program $program)
    {
        $batches = Batch::all();
        return view('programs.edit', compact('program', 'batches'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'batch_id' => 'required|exists:batches,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $filename = time().'_'.$request->photo->getClientOriginalName();
            $request->photo->move(public_path('uploads/programs'), $filename);
            $data['photo'] = $filename; // hanya nama file
        }

        $program->update($data);

        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }
}
