<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMongoBooksTable extends Migration
{
    protected $connection = 'mongodb';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Por algun motivo no funciona el down() en mongodb
        Schema::connection('mongodb')->dropIfExists('mongo_books');
        Schema::connection('mongodb')->create('mongo_books', function (Blueprint $collection) {
            $collection->bigIncrements('id');
            $collection->string('title');
            $collection->string('author');
            $collection->string('isbn');
            $collection->string('publisher');
            $collection->string('year');
            $collection->longText('ebook')->nullable();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('mongo_books');
    }
}
