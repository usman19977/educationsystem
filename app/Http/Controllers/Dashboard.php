<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $total_request = Auth::user()->carier_requests()->count();
        // $pending_request = Auth::user()->carier_requests()->count();
        $pending_request = Auth::user()->carier_requests()->where('requests.status', '=', 'Pending')->count();

        $approved_request = Auth::user()->carier_requests()->where('requests.status', '=', 'Admit Card Generated')->count();

        $admit_card = Auth::user()->admitcards()->count();


        $response = [
            'total_requests' => $total_request,
            'pending_request' =>  $pending_request,
            'approved_request' => $approved_request,
            'admit_card' => $admit_card
        ];

        return view('frontend.layouts.dashboard.dashboard', ['data' => $response]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
