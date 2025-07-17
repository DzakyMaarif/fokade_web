<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasPermissions;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HasPermissions;

    public function __construct()
    {
        $this->middleware('permission:create_schools')->only('index');
        $this->middleware('permission:read_schools')->only('create', 'store');
        $this->middleware('permission:update_schools')->only('edit', 'update');
        $this->middleware('permission:delete_schools')->only('destroy');
    }
    
    public function index()
    {
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $filename = time().'_'.$request->logo->getClientOriginalName();
            $request->logo->move(public_path('uploads/schools'), $filename);
            $data['logo'] = 'uploads/schools/' . $filename;
        }

        School::create($data);

        return redirect()->route('schools.index')
            ->with('success', 'School created successfully.');
    }

    public function show(School $school)
    {
        return view('schools.show', compact('school'));
    }

    public function edit(School $school)
    {
        return view('schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $filename = time().'_'.$request->logo->getClientOriginalName();
            $request->logo->move(public_path('uploads/schools'), $filename);
            $data['logo'] = 'uploads/schools/' . $filename;
        }

        $school->update($data);

        return redirect()->route('schools.index')
            ->with('success', 'School updated successfully.');
    }

    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->route('schools.index')
            ->with('success', 'School deleted successfully.');
    }
}
