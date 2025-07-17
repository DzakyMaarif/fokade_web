<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Batch;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasPermissions;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use HasPermissions;

    public function __construct()
    {
        $this->middleware('permission:create_news')->only('index');
        $this->middleware('permission:read_news')->only('create', 'store');
        $this->middleware('permission:update_news')->only('edit', 'update');
        $this->middleware('permission:delete_news')->only('destroy');
    }

    public function index()
    {
        $news = News::with('batch')->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        $batches = Batch::all();
        return view('news.create', compact('batches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'batch_id' => 'required|exists:batches,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $filename = time().'_'.$request->photo->getClientOriginalName();
            $request->photo->move(public_path('uploads/news'), $filename);
            $data['photo'] = '/uploads/news/' . $filename;
        }

        News::create($data);

        return redirect()->route('news.index')
            ->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        $batches = Batch::all();
        return view('news.edit', compact('news', 'batches'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'batch_id' => 'required|exists:batches,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $filename = time().'_'.$request->photo->getClientOriginalName();
            $request->photo->move(public_path('uploads/news'), $filename);
            $data['photo'] = '/uploads/news/' . $filename;
        }

        $news->update($data);

        return redirect()->route('news.index')
            ->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully.');
    }
}
