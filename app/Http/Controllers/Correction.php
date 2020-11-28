<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class Correction extends Controller
{
    //
    public function index()
    {
        $content = Page::where(['slug' => 'correction'])->get();

        return view('frontend.corrections')->with('data', [
            'content' => $content
        ]);
    }
}
