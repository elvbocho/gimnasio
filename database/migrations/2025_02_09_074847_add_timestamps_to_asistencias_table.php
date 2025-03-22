<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('asistencias', function (Blueprint $table) {
            $table->timestamps(); // Esto agrega 'created_at' y 'updated_at'
        });
    }
    
    public function down()
    {
        Schema::table('asistencias', function (Blueprint $table) {
            $table->dropTimestamps(); // Esto elimina 'created_at' y 'updated_at'
        });
    }
    
};
