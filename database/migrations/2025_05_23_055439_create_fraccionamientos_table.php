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
        Schema::create('fraccionamientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained('proyectos')->cascadeOnDelete();
            $table->string('nombre');
            $table->decimal('superficie_m2', 12, 2);
            $table->integer('cantidad_lotes')->default(0);
            $table->enum('uso_predominante', ['Habitacional', 'Comercial', 'Mixto']);
            $table->string('etapa')->nullable();
            $table->json('servicios_disponibles')->nullable(); // agua, luz, drenaje, etc.
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
        Schema::dropIfExists('fraccionamientos');
    }
};
