<?php

namespace App\Http\Requests\Api\School\Homework;

use Illuminate\Foundation\Http\FormRequest;

class SchoolHomeworkIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->user()->isAbleTo('school_lessons-read');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lesson_id' => 'numeric|required'
        ];
    }
}
