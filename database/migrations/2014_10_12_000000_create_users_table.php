<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('username',45)->unique();
            $table->string('email',45)->unique();
            $table->string('S_Nombre',45);
            $table->string('S_Apellidos',45)->nullable();
            $table->boolean('S_Activo')->default(1);
            $table->string('password',100);
            
            $table->timestamp('email_verified_at')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->unsignedBigInteger('tw_rol_id');
			//se permite la autenticacion por username y email
			
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
