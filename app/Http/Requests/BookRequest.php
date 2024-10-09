<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_id' => ['required', 'integer'],
            'age_limit_id' => ['required', 'integer'],
            'annotation_id' => ['required', 'integer'],
            'year_id' => ['required', 'integer'],
            'house_id' => ['required', 'integer'],
            'language_id' => ['required', 'integer'],
            'binding_id' => ['required', 'integer'],
            'type_id' => ['required', 'integer'],
            'ISBN' => ['required', 'string'],
            'cover' => ['file']
        ];
    }
}
