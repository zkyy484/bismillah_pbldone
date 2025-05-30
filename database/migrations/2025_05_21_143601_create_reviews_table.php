<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('rating'); // 1-5
            $table->text('comment')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->timestamps();

            $table->unique(['user_id', 'order_id']); // ulasan hanya 1x per order per user
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};