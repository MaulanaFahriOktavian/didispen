<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDispensationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'category_id'=>['required'],

            'destination_id'=>['required'],

            'purpose'=>['required'],

            'description'=>['required'],

            'dispensation_date'=>['required','date'],

            'out_time'=>['required'],

            'return_time'=>['required'],

        ];
    }
}
