<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento', function (Blueprint $table) {
            $table->increments('idmovimiento');
            $table->integer('id_bien');//monbre bien
            $table->integer('id_motivo_movimiento');//monbre bien
            $table->integer('oficina_ini');//monbre bien
            $table->integer('oficina_end');//monbre bien
            $table->integer('user_ini');//monbre bien
            $table->integer('user_end');//monbre bien
            $table->integer('numero_cargo_in');//monbre bien
            $table->integer('numero_cargo_end');
            $table->text('fecha_cargo_in');//monbre bien
            $table->text('fecha_cargo_end');//monbre bien
            $table->text('n_documento');//monbre bien
            $table->text('fecha');//monbre bien
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento');
    }
}
