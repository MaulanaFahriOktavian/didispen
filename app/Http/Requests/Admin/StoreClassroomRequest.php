<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClassroomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', \App\Models\Classroom::class);
    }

    public function rules(): array
    {
        return [
            'major_id'  => ['required', 'exists:majors,id'],
            'grade'     => ['required', Rule::in(['X', 'XI', 'XII'])],
            'name'      => ['required', 'string', 'max:50'],
            'full_name' => ['required', 'string', 'max:50', Rule::unique('classrooms', 'full_name')],
            'capacity'  => ['required', 'integer', 'min:1'],
            'is_active' => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.unique' => 'Nama kelas lengkap sudah terdaftar.',
            'grade.in' => 'Tingkat kelas harus X, XI, atau XII.',
        ];
    }
}