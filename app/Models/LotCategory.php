<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class LotCategory extends Model
{
    use HasUuids;

    protected $table = 'lot_categories';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = transliterate($model->name);
            $model->slug = $slug;
        });
    }

    public function lot()
    {
        return $this->hasOne(Lot::class, 'lot_id', 'id');
    }
}
