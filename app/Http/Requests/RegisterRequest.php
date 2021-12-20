<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Jetstream\Jetstream;

class RegisterRequest extends FormRequest
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
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'dni' => 'required|numeric|unique:users,dni',
            'phone' => 'required|numeric',
            'phone_two' => 'nullable|numeric',
            'address' => 'nullable|string',
            'birthdate' => 'nullable|date',
            'son_number' => 'nullable|numeric',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'role' => 'default:USER',
            'status' => 'default:ACTIVE',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
