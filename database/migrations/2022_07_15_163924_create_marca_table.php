<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marca', function (Blueprint $table) {
            $table->increments('idmarca');
            $table->text('des_marca');//descriopcion de la marca
            $table->integer('stado_marca');//activo, descaivad(1,0)
            $table->integer('id_tipo');//a que tipo pertenece la marca marca samsung para tipo monitor, HP para el tipo CPU
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
        Schema::dropIfExists('marca');
    }
}
