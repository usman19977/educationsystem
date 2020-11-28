<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class Scholarship extends Controller
{
    //
    public function index()
    {
        $content = Page::where(['slug' => 'scholarship'])->get();

        return view('frontend.scholarship')->with('data', [
            'content' => $content
        ]);
    }
}
