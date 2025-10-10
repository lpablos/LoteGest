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
        Schema::create('linderos', function (Blueprint $table) {
            $table->id();
            $table->string('viento1')->nullable();
            $table->string('colinda1')->nullable();
            $table->string('viento2')->nullable();
            $table->string('colinda2')->nullable();
            $table->string('viento3')->nullable();
            $table->string('colinda3')->nullable();
            $table->string('viento4')->nullable();
            $table->string('colinda4')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linderos');
    }
};
