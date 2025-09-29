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
            $table->string('nombre')->nullable();
            $table->string('imagen')->nullable();
            $table->string('responsable')->nullable();
            $table->string('propietaria')->nullable();
            $table->decimal('superficie', 10, 2)->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('viento1')->nullable();
            $table->string('viento2')->nullable();
            $table->string('viento3')->nullable();
            $table->string('viento4')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger("tipo_predios_id")->nullable();
            $table->foreign("tipo_predios_id")->references("id")->on("cat_tipo_predios");
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
