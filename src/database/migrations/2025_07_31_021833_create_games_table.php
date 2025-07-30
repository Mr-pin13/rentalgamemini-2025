<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->nullable()->constrained('categories');
            $table->string('title');
            $table->string('publisher')->nullable();
            $table->year('release_year')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('stock')->default(1);
            $table->decimal('hourly_rate', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
