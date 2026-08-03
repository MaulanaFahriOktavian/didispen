<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMajorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Policy handles authorization
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:50', 'unique:majors,code'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Major code is required.',
            'code.unique' => 'Major code is already in use.',
            'name.required' => 'Major name is required.',
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => 'major code',
            'name' => 'major name',
        ];
    }
}