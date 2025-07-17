<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasPermissions;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use HasPermissions;

    public function __construct()
    {
        $this->middleware('permission:create_organizations')->only('index');
        $this->middleware('permission:read_organizations')->only('create', 'store');
        $this->middleware('permission:update_organizations')->only('edit', 'update');
        $this->middleware('permission:delete_organizations')->only('destroy');
    }

    public function index()
    {
        $organizations = Organization::all();
        return view('organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('organizations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'logo_philosophy' => 'nullable',
        ]);

        $data = $request->all();

        // handle file upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Organization::create($data);

        return redirect()->route('organizations.index')
            ->with('success', 'Organization created successfully.');
    }

    public function show(Organization $organization)
    {
        return view('organizations.show', compact('organization'));
    }

    public function edit(Organization $organization)
    {
        return view('organizations.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'logo_philosophy' => 'nullable',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $organization->update($data);

        return redirect()->route('organizations.index')
            ->with('success', 'Organization updated successfully.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();

        return redirect()->route('organizations.index')
            ->with('success', 'Organization deleted successfully.');
    }
}
