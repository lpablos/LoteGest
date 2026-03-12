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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_pago');
            $table->enum('concepto', ['apartado','enganche','mensualidad','abono','liquidacion'])->nullable();
            $table->enum('metodo_pago', ['efectivo','transferencia','deposito','cheque','tarjeta'])->nullable();
            $table->decimal('monto', 12, 2);
            $table->decimal('saldo_despues', 12, 2)->nullable();
            $table->foreignId('compra_id')->constrained('compras')->onDelete('cascade');
            $table->string('folio_recibo')->nullable();
            $table->string('referencia')->nullable();
            $table->text('observaciones')->nullable();
            $table->foreignId('recibido_por')->nullable()->constrained('users');
            $table->text('motivo_baja')->nullable();
            $table->string('comprobante_url')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
