<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifierSeanceRequest extends FormRequest
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
            "id_emploi_du_temps" => "required|exists:emploi_du_temps,id",
            "id_element" => "required|exists:elements,id",
            "id_periode" => "required|exists:periodes,id",
            "type" => "required|in:cour,tp",
            "day" => "required|in:Monday,Tuesday,Wednesday,Thursday,Friday"  ,
            "id_salle" => "required|exists:salles,id",
        ];
    }
}
