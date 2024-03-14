<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentaireResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "commentaire"=>$this->commentaire,
            "user"=>$this->user,
            "date"=>$this->created_at,
//            "post"=> new PostResource($this->post) ,
//            "posts"=>  PostResource::collection($this->posts) ,
        ];
    }
}
