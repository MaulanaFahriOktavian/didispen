<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClassroomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('classroom'));
    }

    public function rules(): array
    {
        $classroomId = $this->route('classroom')->id;

        return [
            'major_id'  => ['required', 'exists:majors,id'],
            'grade'     => ['required', Rule::in(['X', 'XI', 'XII'])],
            'name'      => ['required', 'string', 'max:50'],
            'full_name' => ['required', 'string', 'max:50', Rule::unique('classrooms', 'full_name')->ignore($classroomId)],
            'capacity'  => ['required', 'integer', 'min:1'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}