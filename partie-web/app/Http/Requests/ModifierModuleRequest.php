<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifierModuleRequest extends FormRequest
{

//    protected $redirect = '/modules?openModal=1';

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
            'name' => 'required|string|max:255',
            'id_filiere' => 'required|exists:filieres,id',
            'id_semestre' => 'required|exists:semestres,id',
            'nbr_heure' => 'required|numeric',
        ];
    }
}
