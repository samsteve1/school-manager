<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClassStoreRequest extends FormRequest
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
            'code' => 'required|min:3|max:10|unique:courses,code',
            'title' => 'required|min:3|max:200|unique:courses,title',
            'semester' => 'required|exists:semesters,id'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Please provide a valid course code',
            'code.min'      =>  'Course code must be a minimum of 3 characters',
            'code.max'      =>  'Course code cannot be more than 10 characters',
            'code.unique' =>    'Course code already exists.',
            'title.required' => 'Please provide a valid course title',
            'title.min'      =>  'Course title must be a minimum of 3 characters',
            'title.max'      =>  'Course title cannot be more than 10 characters',
            'title.unique' =>    'Course title already exists.',
            'semester.required' => 'An active semester is required',
            'semester.exists' =>  'An active semester is required'
        ];
    }
}
