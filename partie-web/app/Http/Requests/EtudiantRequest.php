<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantRequest extends FormRequest
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
            'cne' => 'required|string|max:255',
           'apogee' => 'required|string|max:255',
            'id_filiere' => 'required|exists:filieres,id',
            'user_id' => 'required|exists:users,id',

        ];
    }
}
