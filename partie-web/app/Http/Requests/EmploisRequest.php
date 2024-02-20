<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploisRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'id_filiere' => 'required|exists:filieres,id',
            'name_semestre' => 'nullable',
        ];
    }
}
