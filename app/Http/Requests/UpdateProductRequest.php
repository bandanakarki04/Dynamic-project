<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:100',

            'solutions' => 'sometimes|array',
            'solutions.*' => 'integer|distinct|exists:solutions,id',

            'tags' => 'sometimes|array',
            'tags.*' => 'integer|distinct|exists:tags,id',
        ];
    }
}