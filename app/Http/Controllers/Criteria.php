<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class Criteria extends Controller
{
    //
    public function getRelatedSubjectsofCriteria($id)
    {
        $subjects =  Subject::where(['criteria_id' => $id])->select('name')->get();
        return $subjects;
    }
}
