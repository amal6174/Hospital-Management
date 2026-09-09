<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Doctor;
// use App\Http\Requests\Rule;
use Illuminate\Validation\Rule;

class DoctorUpdateRequest extends FormRequest
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
       $id = $this->route('id');


        return [
                 'category_id' => [
                                   'required',
                                   'exists:categories,id',
                                  ],

                 'name' => [
                             'required',
                             'string',
                            'max:255',
                           ],

                'specialization' => [
                                      'nullable',
                                      'string',
                                      'max:255',
                                      ],

        'designation' => [
            'nullable',
            'string',
            'max:150',
        ],

        'experience' => [
            'required',
            'string',
            'max:255',
        ],

        // 'consultant_fee' => [
        //     'nullable',
        //     'numeric',
        //     'min:0',
        // ],

        'email' => [
            'nullable',
            'email',
            'max:255',
            //   Rule::unique('doctors', 'email')->ignore($id),
        ],

        'phone' => [
            'nullable',
            'string',
            'max:255',
        ],

        'image' => [
            'nullable',
            'image',
            'mimes:jpg,jpeg,png,webp',
            'max:2048',
        ],

        'gender' => [
            'required',
            'in:Male,Female,Other',
        ],

        'address' => [
            'nullable',
            'string',
            'max:255',
        ],

        'status' => [
            'required',
            'boolean',
        ],
        ];
    }
}
