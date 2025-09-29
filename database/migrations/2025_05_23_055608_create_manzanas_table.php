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
        Schema::create('manzanas', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio_contado', 12, 2)->nullable();
            $table->decimal('precio_credito', 12, 2)->nullable();
            $table->enum('enganche',['10','15','20','30'])->nullable()->comment('Porcentaje de enganche');
            $table->enum('mensualidades',['6','12','18','24','30','36'])->nullable()->comment('Numero de mensualidades');
            $table->integer('num_lotes')->nullable();
            $table->integer('num_manzana')->nullable();            
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
        Schema::dropIfExists('manzanas');
    }
};
