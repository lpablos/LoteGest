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
        Schema::create('compra_lote_linderos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compra_id')->constrained('compras')->onDelete('cascade');
            $table->foreignId('lote_id')->constrained('lotes')->onDelete('cascade');
            $table->string('superficie_m2');
            $table->string('precio');
            $table->foreignId('lindero_id')->constrained('linderos')->onDelete('cascade');
            $table->enum('campo', ['individual', 'union']);
            // $table->string('descripcion')->nullable(); // Ej: "Lado norte del lote 3"

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_lote_linderos');
    }
};
