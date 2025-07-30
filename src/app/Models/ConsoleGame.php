<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConsoleGame extends Model
{
    protected $table = 'console_game';

    protected $fillable = [
        'console_id',
        'game_id',
        'installed',
    ];

    protected $casts = [
        'console_id' => 'integer',
        'game_id'    => 'integer',
        'installed'  => 'boolean',
    ];

    public function console(): BelongsTo
    {
        return $this->belongsTo(Console::class);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
