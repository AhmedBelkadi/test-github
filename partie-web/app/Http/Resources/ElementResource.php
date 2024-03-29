<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ElementResource extends JsonResource
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
            "name"=>$this->name,
            "module"=> new ModuleResource($this->module) ,
//            "classRoom"=> new ClassRoomResource($this->classRoom) ,
            "professeurs"=> ProfesseurResource::collection($this->professeurs) ,

        ];
    }
}
