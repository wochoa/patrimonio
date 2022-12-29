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
            $table->integer('user_ini');//usuario inicial
            $table->integer('user_end');//usuario final
            $table->integer('numero_cargo_in');//numero de cargo inicial
            $table->integer('numero_cargo_end');// numero cargo final
            $table->text('fecha_cargo_in');//fecha cargo inicial
            $table->text('fecha_cargo_end');//fecha cargo final
            $table->text('n_documento');//numero documento
            $table->text('fecha');//fecha registro
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
