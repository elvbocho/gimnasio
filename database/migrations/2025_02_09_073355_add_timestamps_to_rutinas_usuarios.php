<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToRutinasUsuarios extends Migration
{
    public function up()
    {
        Schema::table('rutinas_usuarios', function (Blueprint $table) {
            $table->timestamps(); // Esto agrega las columnas created_at y updated_at
        });
    }

    public function down()
    {
        Schema::table('rutinas_usuarios', function (Blueprint $table) {
            $table->dropTimestamps(); // Elimina las columnas created_at y updated_at
        });
    }
}
