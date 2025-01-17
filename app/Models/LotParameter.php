<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class LotParameter extends Model
{
    use HasUuids;

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'id', 'lot_id');
    }
}
