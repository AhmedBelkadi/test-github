<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjouterFiliereRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $redirect = '/filieres?openModal=1';

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
            'type' => 'required|string|max:255|in:dut,lp',
            'nbr_semestre' => 'required|integer|min:2',
            'id_professeur' => 'required|exists:professeurs,id',
            'id_departement' => 'required|exists:departements,id',
        ];
    }



}
