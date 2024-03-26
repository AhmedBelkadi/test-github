<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AbsenceResourceExportProfesseur extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "cne" => $this->etudiant->cne,
            "etudiant" => $this->etudiant->user->name,
            "element" => $this->seance->element->name,
            "date" => $this->date,
            "periode" => $this->seance->periode->libelle,
            "seance_type" => $this->seance->type,
            "etat" => $this->etat,
        ];
    }
}
