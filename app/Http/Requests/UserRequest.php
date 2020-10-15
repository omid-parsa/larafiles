<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules=
            [
                'full_name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'

            ];
        // here we check is the request from update or create
        if (request()->route('user_id') && intval(request()->route('user_id')>0 )) {
            //remove an item from array
            unset($rules['password']);
        }
        return $rules;
    }

//    public function messages()
//    {
//        return [
//            'full_name.required' => 'Please enter full name',
//            'email.required' => 'Please enter email',
//            'email.email' => 'The email format is not correct',
//            'password.required' => 'Please enter password',
//            'password.min' => 'Password should be at least 6 characters',
//            'password.max' => 'Password should be at last 20 characters'
//        ];
//    }
}
