<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartidaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'puntuacion' => $this->puntuacion,
            'tiempo' => $this->tiempo,
            'usuario' => $this->user?->name,
            'categoria' => $this->categoria?->nombre
        ];
    }
}
