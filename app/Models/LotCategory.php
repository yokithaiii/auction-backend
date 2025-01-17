<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LotCategory extends Model
{
    use HasUuids;

    protected $table = 'lot_categories';

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = transliterate($model->name);
            $model->slug = $slug;
        });
    }

    public function lot(): HasOne
    {
        return $this->hasOne(Lot::class, 'lot_id', 'id');
    }
}
