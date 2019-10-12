<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SessionStoreRequest extends FormRequest
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
            'year'  => 'required|min:9|unique:sessions,year'
        ];
    }
    public function messages()
    {
        return [
            'year.required' => 'You must provide an academic year.',
            'year.min' => 'The academic year must be of the format YYYY\\YYYY',
            'year.unique' => 'This academic session already exists'
        ];
    }
}
