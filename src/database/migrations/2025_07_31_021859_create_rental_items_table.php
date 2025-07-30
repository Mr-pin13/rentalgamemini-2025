<?php

use App\Models\Console;
use App\Models\Game;
use App\Models\Rental;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rental_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Rental::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Console::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Game::class)->nullable()->constrained()->nullOnDelete();
            $table->integer('quantity')->default(1);
            $table->integer('hours')->default(1);
            $table->decimal('price_per_hour', 10, 2)->default(0);
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rental_items');
    }
};
