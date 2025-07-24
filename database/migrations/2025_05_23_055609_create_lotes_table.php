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
            $table->string('medidas_m');
            $table->decimal('superficie_m2', 10, 2)->nullable();
            // $table->decimal('precio_contado', 12, 2)->nullable();
            // $table->decimal('precio_credito', 12, 2)->nullable();
            $table->string('plano')->nullable();
            $table->integer('manzana');
            $table->string('colinda_norte')->nullable();
            $table->string('colinda_sur')->nullable();
            $table->string('colinda_oriente')->nullable();
            $table->string('colinda_poniente')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('cat_estatus_disponibilidad_id');
            $table->foreign('cat_estatus_disponibilidad_id')->references('id')->on('cat_estatus_disponibilidad')->onDelete('restrict');
            $table->unsignedBigInteger('fraccionamiento_id');
            $table->foreign('fraccionamiento_id')->references('id')->on('fraccionamientos')->onDelete('cascade');
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
