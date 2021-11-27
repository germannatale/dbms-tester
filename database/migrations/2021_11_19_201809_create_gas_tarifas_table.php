<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_tarifas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('precio_fijo');
            $table->float('precio_variable');
            $table->bigInteger('tarifario_id')->unsigned();
            $table->bigInteger('categoria_gas_id')->unsigned();            
            $table->bigInteger('subcategoria_gas_id')->unsigned();                      
            $table->timestamps();
            // FKs
            $table->foreign('tarifario_id')->references('id')->on('tarifarios')->onDelete('cascade');
            $table->foreign('categoria_gas_id')->references('id')->on('categoria_gas');
            $table->foreign('subcategoria_gas_id')->references('id')->on('subcategoria_gas');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gas_tarifas');
    }
}
