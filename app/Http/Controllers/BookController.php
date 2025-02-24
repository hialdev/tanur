<?php

namespace App\Http\Controllers;

use App\Models\BookChapter;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $chapters = BookChapter::all();
        return view('books.index', compact('chapters'));
    }

    public function show($slug){
        $book = BookChapter::where('slug', $slug)->firstOrFail();
        return view('books.show', compact('book'));
    }
}
