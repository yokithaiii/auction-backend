<?php

namespace App\Http\Resources\Seller;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
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
            'user_id' => $this->user_id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname ?? null,
            'phone' => $this->phone ?? null,
            'email' => $this->email ?? null,
            'sex' => $this->sex ?? null,
            'avatar' => $this->avatar_url ?? null,
        ];
    }
}
