<?php

namespace App\Http\Resources;

use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeanceResource extends JsonResource
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
            "type" => $this->type,
            "day" => $this->day,
            "salle" => new SalleResource($this->salle),
            "periode" => new PeriodeResource($this->periode),
            "element" => new ElementResource($this->element),
        ];
    }
}
