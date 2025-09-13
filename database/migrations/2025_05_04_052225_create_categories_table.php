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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_categori');
            $table->text('description')->nullable();
            $table->decimal('base_price', 10, 2);
            $table->string('photo');
           
            
            // Ukuran lahan pakai panjang x lebar
            $table->integer('panjang_tanah')->nullable(); // dalam meter
            $table->integer('lebar_tanah')->nullable();   // dalam meter
            $table->integer('luas_lahan')->nullable();    // hasil panjang * lebar
            $table->integer('luas_bangunan')->nullable(); // dalam m²
            $table->tinyInteger('lantai')->default(1);    // jumlah lantai
            $table->tinyInteger('kamar_tidur')->default(0);
            $table->tinyInteger('kamar_mandi')->default(0);

            $table->enum('status', ['active', 'inactive'])->default('active'); // 👈 Tambahan status

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
