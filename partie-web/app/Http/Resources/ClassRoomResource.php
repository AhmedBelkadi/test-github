<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassRoomResource extends JsonResource
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
            "image"=>$this->image,
            "description"=>$this->description,
            "element"=> new ElementResource($this->element) ,
            "posts"=>  PostResource::collection($this->posts) ,
        ];
    }
}
