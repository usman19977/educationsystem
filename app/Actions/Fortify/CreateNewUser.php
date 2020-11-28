<?php

namespace App\Actions\Fortify;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [

            'name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'min:11'],
            'address' => ['required', 'string', 'max:255'],
            'cnic' => ['required', 'numeric', 'min:14'],
            'religion' => ['required', 'string', 'max:255'],
            'school_rollnumber' =>  ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'school_select' => ['required'],
            'date_of_birth' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ]);


        $student = Student::create([
            'candidate_name' => $input['name'],
            'father_name' => $input['father_name'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'cnic' => $input['cnic'],
            'school_rollnumber' => $input['school_rollnumber'],
            'religion' => $input['religion'],
            'gender' => $input['gender'],
            'image' => $input['image'],

            'date_of_birth' => $input['date_of_birth'],
            'school_id' => $input['school_select'],
            'user_id' =>  $user->id,


        ]);
        return $user;
    }
}
