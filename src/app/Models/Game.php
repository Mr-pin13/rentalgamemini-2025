<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'publisher',
        'release_year',
        'image',
        'description',
        'stock',
        'hourly_rate',
    ];

    protected $casts = [
        'category_id'  => 'integer',
        'release_year' => 'integer',
        'stock'        => 'integer',
        'hourly_rate'  => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function consoles(): BelongsToMany
    {
        return $this->belongsToMany(Console::class)
            ->using(ConsoleGame::class)
            ->withPivot('installed')
            ->withTimestamps();
    }

    public function rentalItems(): HasMany
    {
        return $this->hasMany(RentalItem::class);
    }
}
