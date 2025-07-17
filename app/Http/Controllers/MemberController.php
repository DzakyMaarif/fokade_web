<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Batch;
use App\Models\Division;
use App\Models\School;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasPermissions;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HasPermissions;

    public function __construct()
    {
        $this->middleware('permission:create_members')->only('index');
        $this->middleware('permission:read_members')->only('create', 'store');
        $this->middleware('permission:update_members')->only('edit', 'update');
        $this->middleware('permission:delete_members')->only('destroy');
    }

    public function index()
    {
        $members = Member::with(['batch', 'division', 'school'])->get();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $batches = Batch::all();
        $divisions = Division::all();
        $schools = School::all();
        return view('members.create', compact('batches', 'divisions', 'schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'batch_id' => 'required|exists:batches,id',
            'division_id' => 'required|exists:divisions,id',
            'school_id' => 'required|exists:schools,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $filename = time().'_'.$request->photo->getClientOriginalName();
            $request->photo->move(public_path('uploads/members'), $filename);
            $data['photo'] = '/uploads/members/' . $filename;
        }

        Member::create($data);

        return redirect()->route('members.index')
            ->with('success', 'Member created successfully.');
    }

    public function edit(Member $member)
    {
        $batches = Batch::all();
        $divisions = Division::all();
        $schools = School::all();
        return view('members.edit', compact('member', 'batches', 'divisions', 'schools'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'batch_id' => 'required|exists:batches,id',
            'division_id' => 'required|exists:divisions,id',
            'school_id' => 'required|exists:schools,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $filename = time().'_'.$request->photo->getClientOriginalName();
            $request->photo->move(public_path('uploads/members'), $filename);
            $data['photo'] = '/uploads/members/' . $filename;
        }

        $member->update($data);

        return redirect()->route('members.index')
            ->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')
            ->with('success', 'Member deleted successfully.');
    }
}
