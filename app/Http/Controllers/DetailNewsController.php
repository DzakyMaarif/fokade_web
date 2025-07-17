<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class DetailNewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('detail_news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('detail_news.show', compact('news'));
    }
}
