<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dob');
            $table->date('fecha_registro');
            $table->string('seudonimo')->nullable();
            $table->string('telefono')->nullable();
            $table->text('avatar')->nullable();
            $table->unsignedBigInteger("role_id")->nullable();
            $table->foreign("role_id")->references("id")->on("roles");
            $table->unsignedBigInteger("estatus_id")->nullable();
            $table->foreign("estatus_id")->references("id")->on("cat_estatus");
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
