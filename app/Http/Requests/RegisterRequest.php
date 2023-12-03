<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|regex:/^[^0-9]+$/',
            'last_name' => 'required|string|regex:/^[^0-9]+$/',
            'email' => 'required|email|string',
            'phone_code' => 'required',
            'phone' => 'required|regex:/^[0-9()+\- ]+$/',
            'password' => 'required|string|confirmed|min:8|regex:/^(?=.*[0-9]).+$/',
            'password_confirmation' => 'required|string|min:8|regex:/^(?=.*[0-9]).+$/',
        ];
    }
}
