<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seller extends Model
{
    use HasUuids;

    protected $table = 'sellers';

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
}
