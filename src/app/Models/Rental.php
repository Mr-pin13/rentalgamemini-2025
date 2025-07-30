<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rental extends Model
{
    protected $fillable = [
        'client_id',
        'start_at',
        'end_at',
        'status',
        'total',
        'notes',
    ];

    protected $casts = [
        'client_id' => 'integer',
        'start_at'  => 'datetime',
        'end_at'    => 'datetime',
        'total'     => 'decimal:2',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(RentalItem::class);
    }
}
