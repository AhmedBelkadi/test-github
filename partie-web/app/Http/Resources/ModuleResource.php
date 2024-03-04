<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "nbrHeure" => $this->nbr_heure,
            "filiere" => new FiliereResource($this->filiere),
            "semestre" => new SemestreResource($this->semestre),
        ];
    }
}
