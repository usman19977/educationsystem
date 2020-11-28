<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class Feestructure extends Controller
{
    //
    public function index()
    {
        $content = Page::where(['slug' => 'feestructure'])->get();

        return view('frontend.feestructure')->with('data', [
            'content' => $content
        ]);
    }
}
