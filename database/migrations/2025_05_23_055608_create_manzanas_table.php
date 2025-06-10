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
            $table->integer('num_manzana')->nullable();
            $table->string('colinda_norte')->nullable();
            $table->string('colinda_sur')->nullable();
            $table->string('colinda_este')->nullable();
            $table->string('colinda_oeste')->nullable();
            $table->unsignedBigInteger('fraccionamiento_id');
            $table->foreign('fraccionamiento_id')
                  ->references('id')->on('fraccionamientos')
                  ->onDelete('cascade');
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
