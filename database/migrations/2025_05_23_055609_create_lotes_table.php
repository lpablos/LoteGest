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
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fraccionamiento_id')->constrained('fraccionamientos')->cascadeOnDelete();
            $table->string('numero_lote');
            $table->decimal('superficie_m2', 10, 2);
            $table->decimal('frente_m', 8, 2);
            $table->decimal('fondo_m', 8, 2);
            $table->string('orientacion')->nullable();
            $table->boolean('disponible')->default(true);
            $table->decimal('precio_m2', 10, 2)->nullable();
            $table->decimal('precio_total', 12, 2)->nullable();
            $table->enum('uso', ['Habitacional', 'Comercial', 'Mixto', 'Otro'])->default('Habitacional');
            $table->enum('estado_legal', ['Escriturado', 'En proceso', 'Reservado','En trámite'])->default('En proceso');
            $table->text('observaciones')->nullable();
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
