<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueriesTable extends Migration
{

    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->time('time');
            $table->date('date');
            $table->string('email');

            $table->foreignId('genre_id')->references('id')->on('genres');
            $table->foreignId('doctor_id')->references('id')->on('doctors');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('queries');
    }
}
