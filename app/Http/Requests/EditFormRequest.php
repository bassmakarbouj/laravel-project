<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole('admin') ||  $this->user()->hasRole('trainer');
//        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_name' => 'nullable|string',
            'studing_year' => 'nullable|string',
            'class' => 'nullable|string',
            'category' => 'nullable|string',
            'group' => 'nullable|string',
            'facebook_link' => 'nullable|string',
            'accepted' => 'nullable|boolean',
            'email' => 'nullable|string',
        ];
    }
}
