<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Subscribe extends Controller
{
    //
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email|unique:subscribers',

        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            Subscriber::create([

                'email' => $request->email,


            ]);
            return redirect()->back()->with('successSubscribe', 'You are successfully subscribed');
        }
    }
}
