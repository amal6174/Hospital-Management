<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
     return [

            'category_id' => 'required',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'name' => 'required|string|max:255',
            'slug' => 'required|string',

            'gender' => 'required|in:Male,Female,Other',

            'designation' => 'required|string|max:255',

            'experience' => 'required|integer|min:0',

            // 'consultant_fee' => 'required|numeric|min:0',

            'email' => 'required|email|unique:doctors,email',

            'phone' => 'required|digits:10',

            'address' => 'required|string',

            'status' => 'required|boolean',

            'qualification_name' => 'required|array',
     ];
    }


    public function messages(): array
    {
        return [


            'name.required' =>
                'Bhai tera name Likh.',

             'phone.required' =>
                     'Bhai tera MObile Number Likh',
        ];

    }

}
