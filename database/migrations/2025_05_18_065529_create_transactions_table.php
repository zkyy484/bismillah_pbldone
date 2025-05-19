<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('payment_method');  // e.g. bank transfer, e-wallet, etc.
            $table->decimal('amount', 15, 2);  // Jumlah uang yang dibayar
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('payment_receipt')->nullable();  // File bukti pembayaran (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
