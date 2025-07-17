<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasPermissions;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use HasPermissions;

    public function __construct()
    {
        $this->middleware('permission:create_divisions')->only('index');
        $this->middleware('permission:read_divisions')->only('create', 'store');
        $this->middleware('permission:update_divisions')->only('edit', 'update');
        $this->middleware('permission:delete_divisions')->only('destroy');
    }

    public function index()
    {
        $divisions = Division::all();
        return view('divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('divisions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Division::create($request->all());

        return redirect()->route('divisions.index')
            ->with('success','Division created successfully.');
    }

    public function show(Division $division)
    {
        return view('divisions.show', compact('division'));
    }

    public function edit(Division $division)
    {
        return view('divisions.edit', compact('division'));
    }

    public function update(Request $request, Division $division)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $division->update($request->all());

        return redirect()->route('divisions.index')
            ->with('success','Division updated successfully.');
    }

    public function destroy(Division $division)
    {
        $division->delete();

        return redirect()->route('divisions.index')
            ->with('success','Division deleted successfully.');
    }
}
