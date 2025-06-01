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
            $table->date('fecha_inicio')->nullable();
            $table->string('responsable_proyecto')->nullable();
            // $table->string('clave')->unique();
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('estatus_proyecto_id');
            $table->foreign('estatus_proyecto_id')
                ->references('id')
                ->on('cat_estatus_proyectos')
                ->onDelete('restrict');
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
