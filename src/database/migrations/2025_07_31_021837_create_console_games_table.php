<?php

use App\Models\Console;
use App\Models\Game;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('console_game', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Console::class);
            $table->foreignIdFor(Game::class);
            $table->boolean('installed')->default(true);
            $table->timestamps();

            $table->unique(['console_id', 'game_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('console_game');
    }
};
