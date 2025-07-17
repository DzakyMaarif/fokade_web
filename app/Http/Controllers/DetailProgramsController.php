<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class DetailProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('detail_programs.index', compact('programs'));
    }
}
