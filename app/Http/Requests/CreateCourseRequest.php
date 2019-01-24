<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole('admin') && $this->user()->can('store_course');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'category_id'   => 'required|integer|exists:category_course,id',
            'time' => 'nullable|string',
            'period' => 'nullable|string',
            'target_age' => 'nullable|string',
            'student_number' => 'nullable|string',
            'lessons_number' => 'nullable|string',
            'trainer_name' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ];
    }
}