<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotDeliveryMethod extends Model
{
    use HasUuids;

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'id', 'lot_id');
    }
}
