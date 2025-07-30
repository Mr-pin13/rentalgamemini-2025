<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Console extends Model
{
    protected $fillable = [
        'name',
        'manufacturer',
        'serial_number',
        'image',
        'hourly_rate',
        'status',
    ];

    protected $casts = [
        'hourly_rate' => 'decimal:2',
    ];

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class)
            ->using(ConsoleGame::class)
            ->withPivot('installed')
            ->withTimestamps();
    }

    public function rentalItems(): HasMany
    {
        return $this->hasMany(RentalItem::class);
    }
}
