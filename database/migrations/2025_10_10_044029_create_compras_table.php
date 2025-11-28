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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('num_solicitud');
            $table->string('num_solicitud_sistema');
            $table->enum('venta_tp', ['precio_credito', 'precio_contado'])->default('precio_contado');
            $table->foreignId('corredor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('estado_id')->constrained('cat_entidad_federativas')->onDelete('restrict');
            $table->foreignId('municipio_id')->constrained('cat_municipios')->onDelete('restrict');
            $table->foreignId('fraccionamiento_id')->constrained('fraccionamientos')->onDelete('restrict');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('restrict');
            $table->unsignedBigInteger("estatus_id")->nullable();
            $table->foreign("estatus_id")->references("id")->on("cat_estatus_proyectos");
            $table->string('superficiel_venta');
            $table->string('total_venta');
            $table->string('enganche_venta_select');
            $table->string('enganche_venta');
            $table->string('mensualidad_venta_select');
            $table->string('pago_mensual_venta');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
