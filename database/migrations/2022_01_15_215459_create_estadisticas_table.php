<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticasTable extends Migration
{
    protected $connection = 'mysql';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('estadisticas', function (Blueprint $table) {
            $table->id();
            $table->string('test_tipo');          
            $table->string('test_value');
            $table->integer('test_cant');
            $table->decimal('tiempo_maria', 14, 10);
            $table->decimal('tiempo_mongo', 14, 10);
            $table->decimal('tiempo_postgres', 14, 10);            
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
        Schema::dropIfExists('estadisticas');
    }
}
