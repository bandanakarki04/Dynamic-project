<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaseRecordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_name' => ['required', 'string', 'max:255'],
            'problem_id' => ['required', 'exists:problems,id'],
            'solution_id' => ['required', 'exists:solutions,id'],
            'kpi_id' => ['required', 'exists:kpis,id'],
            'notes' => ['nullable', 'string'],
        ];
    }
}