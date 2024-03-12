<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjouterProfesseurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

     protected $redirect = '/professeurs?openModal=1';


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

                'name_a' => 'required',
                'email_a' => 'required',
                'tele_a' => 'required',
                'adresse_a' => 'required',
                'cin_a' => 'required',
                'gender_a' => 'required',



        ];
    }
}
