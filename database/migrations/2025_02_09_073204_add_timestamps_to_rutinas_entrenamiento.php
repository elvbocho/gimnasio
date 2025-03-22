<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToRutinasEntrenamiento extends Migration
{
    public function up()
    {
        Schema::table('rutinas_entrenamiento', function (Blueprint $table) {
            $table->timestamps(); // Esto agrega las columnas created_at y updated_at
        });
    }

    public function down()
    {
        Schema::table('rutinas_entrenamiento', function (Blueprint $table) {
            $table->dropTimestamps(); // Elimina las columnas created_at y updated_at
        });
    }
}
