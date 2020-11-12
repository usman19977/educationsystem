<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255',
            'school_code' => 'required|min:5|max:255',
            'phone' => 'required|min:5|max:255',
            'address' => 'required|min:5|max:255',
            'manager_name' => 'required|min:5|max:255',
            'manager_phone' => 'required|min:5|max:255',
            'manager_cnic' => 'required|min:5|max:255',
            'manager_address' => 'required|min:5|max:255',
            'manager_password' => 'required|min:6|max:255',


            'manager_email' => 'required|email|unique:users,email'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
