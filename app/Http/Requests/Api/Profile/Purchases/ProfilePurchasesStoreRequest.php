<?php

namespace App\Http\Requests\Api\Profile\Purchases;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePurchasesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_id' => 'numeric|required',
            'fork_id' => 'numeric|nullable'
        ];
    }
}
