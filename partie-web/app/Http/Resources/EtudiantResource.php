<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EtudiantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "name"=>$this->user->name,
            "gender"=>$this->user->gender,
            "image"=>$this->user->image,
            "email"=>$this->user->email,
            "numTele"=>$this->user->tele,
            "cin"=>$this->user->cin,
            "cne"=>$this->cne,
            "apogee"=>$this->apogee,
            "filiere"=> new FiliereResource($this->filiere),
        ];
    }
}
