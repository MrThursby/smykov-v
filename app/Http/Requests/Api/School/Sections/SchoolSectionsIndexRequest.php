<?php

namespace App\Http\Requests\Api\School\Sections;

use App\Models\School\SchoolCourse;
use App\Models\School\SchoolPurchase;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;

class SchoolSectionsIndexRequest extends FormRequest
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
            'course_id' => 'numeric|required'
        ];
    }
}
