<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RechercherAbsenceRequest extends FormRequest
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
            'id_filiere' => 'nullable|exists:filieres,id',
            'id_semestre' => 'nullable|exists:semestres,id',
            'date' => 'nullable|date',
            'id_element' => 'nullable|exists:elements,id',
            'id_periode' => 'nullable|exists:periodes,id',
        ];
    }
}
