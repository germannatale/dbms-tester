<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtefactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artefactos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('artefacto_tipo_id')->unsigned();            
            $table->string('energia');
            $table->float('consumo_hora');
            $table->float('horas_uso_prom');
            $table->bigInteger('ambiente_id')->unsigned();
            $table->timestamps();
            // FKs
            $table->foreign('artefacto_tipo_id')->references('id')->on('artefacto_tipos');
            $table->foreign('ambiente_id')->references('id')->on('ambientes')->onDelete('cascade')->nulleable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artefactos');
    }
}
