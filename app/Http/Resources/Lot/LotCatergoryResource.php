<?php

namespace App\Http\Resources\Lot;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LotCatergoryResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description ?? null,
            'image' => $this->image_url ?? null,
        ];
    }
}
