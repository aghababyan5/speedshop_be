<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'am_title' => 'required|string',
            'am_description' => 'required|string',
            'am_short_description' => 'required|string',
            'ru_title' => 'required|string',
            'ru_description' => 'required|string',
            'ru_short_description' => 'required|string',
            'en_title' => 'required|string',
            'en_description' => 'required|string',
            'en_short_description' => 'required|string',
            'price' => 'required|integer',
            'img' => 'required|image|mimes:jpeg, jpg, png, gif',
            'user_id' => 'required'
        ];
    }
}
