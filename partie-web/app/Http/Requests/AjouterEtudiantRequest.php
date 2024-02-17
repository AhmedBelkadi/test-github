<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjouterEtudiantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $redirect = '/etudiants?openModal=1';

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

            'name' => 'required:users',
            'email' => 'required|email|unique:users',
            'tele' => 'required:users',
            'adresse' => 'required:users',
            'cin' => 'required|unique:users',
            'cne' => 'required|unique:etudiants',
            'apogee' => 'required:etudiants',
            'id_filiere' => 'required:filieres,id_filiere',

    ];
}
}
