<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $redirect = '/modules?openModal=1';

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
        'name_semestre' => 'required|exists:semestres,name',
        'nbr_heure' => 'required|numeric',

    ];
    }
}
