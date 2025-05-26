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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ubicacion');
            $table->decimal('latitud', 10, 7)->nullable();
            $table->decimal('longitud', 10, 7)->nullable();
            $table->decimal('superficie_total_m2', 12, 2);
            $table->integer('cantidad_fraccionamientos')->default(0);
            $table->enum('estado_actual', ['Planificado', 'En desarrollo', 'Finalizado'])->default('Planificado');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin_estimada')->nullable();
            // $table->string('responsable_proyecto')->nullable();
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
        Schema::dropIfExists('proyectos');
    }
};
