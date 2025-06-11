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
        Schema::create('usuario_datos_personales', function (Blueprint $table) {

            $table->id();
            $table->string('edad')->nullable();
            $table->string('domicilio')->nullable();
            $table->text('enfermedades')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('tipo_sangre')->nullable();
            $table->date('fecha_laboral')->nullable();
            $table->string('num_contacto')->nullable();
            $table->string('parentesco')->nullable();
            $table->unsignedBigInteger("usuario_id")->nullable();
            $table->foreign("usuario_id")->references("id")->on("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_datos_personales');
    }
};
