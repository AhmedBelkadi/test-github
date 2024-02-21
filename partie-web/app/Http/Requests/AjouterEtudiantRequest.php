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

            'name_a' => 'required:users',
            'email_a' => 'required|email|unique:users',
            'tele_a' => 'required:users',
            'adresse_a' => 'required:users',
            'cin_a' => 'required|unique:users',
            'cne_a' => 'required|unique:etudiants',
            'apogee_a' => 'required:etudiants',
            'id_filiere_a' => 'required:filieres,id_filiere',

    ];
}
}
