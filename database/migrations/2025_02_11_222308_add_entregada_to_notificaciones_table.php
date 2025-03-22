<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_entregada_to_notificaciones_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEntregadaToNotificacionesTable extends Migration
{
    public function up()
    {
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->boolean('entregada')->default(false); // Este campo indicará si la notificación fue entregada
        });
    }

    public function down()
    {
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->dropColumn('entregada');
        });
    }
}
