<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'candidate_name' => 'required|min:5|max:255',
            'father_name' => 'required|min:5|max:255',
            'phone' => 'required|min:5|max:255',
            'address' => 'required|min:5|max:255',
            'cnic' => 'required|min:5|max:255',
            'school_rollnumber' => 'required|min:5|max:255',
            'religion' => 'required|min:5|max:255',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'school_id' => 'required',
            'image' => 'required'


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
