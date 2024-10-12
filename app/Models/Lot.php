<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lot extends Model
{
    use HasUuids;

    protected $table = 'lots';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [
        'updated_at'
    ];

    protected $casts = [
        'birthdate' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(LotCategory::class, 'lot_id', 'id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(LotImage::class, 'lot_id', 'id');
    }

    public function parameters(): HasMany
    {
        return $this->hasMany(LotParameter::class, 'lot_id', 'id');
    }

    public function deliveryMethod(): HasOne
    {
        return $this->hasOne(LotDeliveryMethod::class, 'lot_id', 'id');
    }

    public function paymentType(): HasOne
    {
        return $this->hasOne(LotPaymentType::class, 'lot_id', 'id');
    }

    public function paymentMethod(): HasOne
    {
        return $this->hasOne(LotPaymentMethod::class, 'lot_id', 'id');
    }
}