<?php

namespace App\Http\Resources\Lot;

use App\Http\Resources\Seller\SellerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LotResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description ?? null,
            'price' => $this->price ?? null,
            'quantity' => $this->quantity ?? null,
            'start_date' => $this->start_date ?? null,
            'end_date' => $this->end_date ?? null,
            'seller' => $this->seller ? SellerResource::make($this->seller) : null,
            'category' => $this->category ? LotCatergoryResource::make($this->category) : null
        ];
    }
}
