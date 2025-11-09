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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('vendedor_propietario_asc');
            $table->string('vendedor_representante_asc');
            $table->string('comprador_nombre_completo_asc');
            $table->string('propietarios_familia_asc');
            $table->string('ubicacion_escritura_asc');
            $table->string('denominado_como_asc');
            $table->string('ubicacion_zona_asc');
            $table->string('municipio_estado_asc');
            $table->text('textoContrato');
            $table->text('textoContratoSegunda');
            $table->string('fecha_asc_dato');
            $table->string('representante_firma');
            $table->string('comprador_firma');
            $table->text('observaciones');
            $table->bigInteger('compra_id')->unsigned();
            $table->foreign('compra_id')->references('id')->on('compras');
             $table->longText('html_tablas')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
