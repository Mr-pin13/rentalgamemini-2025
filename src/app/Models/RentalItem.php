<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentalItem extends Model
{
    protected $fillable = [
        'rental_id',
        'console_id',
        'game_id',
        'quantity',
        'hours',
        'price_per_hour',
        'subtotal',
    ];

    protected $casts = [
        'rental_id'     => 'integer',
        'console_id'    => 'integer',
        'game_id'       => 'integer',
        'quantity'      => 'integer',
        'hours'         => 'integer',
        'price_per_hour'=> 'decimal:2',
        'subtotal'      => 'decimal:2',
    ];

    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class);
    }

    public function console(): BelongsTo
    {
        return $this->belongsTo(Console::class);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
