<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Program;
use App\Models\School;
use App\Models\News;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $program = Program::latest()->first();
        $organization = Organization::latest()->first();
        $programs = Program::latest()->take(4)->get();
        $schools = School::all();
        $news = News::latest()->get();
        return view('landing', compact('program', 'organization', 'programs', 'schools', 'news'));
    }
}
