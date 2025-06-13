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
        Schema::create('cat_municipios', function (Blueprint $table) {
            $table->id();
            $table->string('nom_mpio');
            $table->unsignedBigInteger("entidad_fed_id")->nullable();
            $table->foreign("entidad_fed_id")->references("id")->on("cat_entidad_federativas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_municipios');
    }
};
