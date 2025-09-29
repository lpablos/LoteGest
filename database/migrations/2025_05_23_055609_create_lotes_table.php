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
            $table->integer('num_lote');
            $table->string('medidas_m')->nullable();
            $table->decimal('superficie_m2', 10, 2)->nullable();
            $table->string('plano')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('disponibilidad_id');
            $table->foreign('disponibilidad_id')->references('id')->on('cat_estatus_disponibilidad')->onDelete('restrict');
            $table->unsignedBigInteger('manzana_id');
            $table->foreign('manzana_id')->references('id')->on('manzanas')->onDelete('cascade');
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
