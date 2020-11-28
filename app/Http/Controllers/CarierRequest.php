<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Request as ModelsRequest;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CarierRequest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carier_requests = Auth::user()->carier_requests()->with(['school', 'criteria'])->get();


        return view('frontend.layouts.dashboard.carier-requests', ['carier_requests' => $carier_requests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $criteria = Criteria::all();
        $shifts = Shift::all();
        return view('frontend.layouts.dashboard.carier-request-create')->with(
            [
                'criterias' => $criteria,
                'shift' => $shifts
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'criteria' => 'required|numeric',
            'shifts' => 'required|numeric',


        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = Auth::user();
            $criteria = Criteria::findorfail($request->criteria);
            $shift = Shift::findorfail($request->shifts);
            $subjectid_arr = [];
            $subjects = $criteria->subjects;

            $student = $user->students;
            $school = $student->school;
            $request =  ModelsRequest::create([

                'school_id' => $school->id,
                'shift_id' => $shift->id,
                'criteria_id' => $criteria->id,
                'student_id' => $student->id,





            ]);
            // for ($i = 0; $i < count($subjects); $i++) {
            //     $subjectid_arr[] = $subjects[$i]->id;
            // }
            $request->subjects()->attach($subjects);

            return redirect()->back()->with('successCreateCarierRequest', 'Carier Request Is Created Successfully');
        }
        // return $school;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
