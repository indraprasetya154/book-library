<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'string|required|max:100',
            'place_of_birth' => 'string|nullable|max:50',
            'date_of_birth' => 'date_format:Y-m-d|nullable',
            'date_of_birth' => 'date_format:Y-m-d|nullable',
            'phone_number' => 'string|nullable|max:14',
            'address' => 'nullable',
            'biography' => 'nullable',
        ];
    }
}
