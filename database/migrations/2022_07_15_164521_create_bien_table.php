<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bien', function (Blueprint $table) {
            $table->increments('idbien');
            $table->text('cod_pat');//codigo patrimonial
            $table->text('cod_anterior')->nullable();//codigo anterior pat
            $table->text('nom_bien');//monbre bien
            $table->integer('id_marca');//monbre bien
            $table->integer('id_modelo');//monbre bien
            $table->integer('id_tipo');//monbre bien
            $table->integer('id_serie');//monbre bien
            $table->integer('id_color');//monbre bien
            $table->string('dimension');//medidas
            $table->integer('id_estado');//monbre bien
            $table->text('placa')->nullable();//monbre bien
            $table->text('doc_compra');//monbre bien
            $table->text('monto_compra');//monbre bien
            $table->text('observacion')->nullable();//monbre bien
            $table->text('no_depreciable')->nullable();//monbre bien
            $table->text('eliminado')->nullable();//monbre bien
            $table->integer('iduser');//id del usuario
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
        Schema::dropIfExists('bien');
    }
}
