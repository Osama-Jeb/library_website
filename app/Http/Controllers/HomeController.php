<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'latestBooks' => Book::latest()->take(4)->get(),
            'randomBooks' => Book::orderBy('title', 'asc')->take(4)->get(),
        ]);
    }
}
