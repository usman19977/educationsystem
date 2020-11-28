<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class StudentAdmission extends Controller
{
    //
    public function index()
    {
        $content = Page::where(['slug' => 'studentadmission'])->get();

        return view('frontend.studentadmission')->with('data', [
            'content' => $content
        ]);
    }
}
