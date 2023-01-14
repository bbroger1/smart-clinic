<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->string('name', 20);
            $table->string('lastName', 20);

            $table->string('phoneNumber', 15);
            $table->string('cpf', 14);
            $table->string('sexo', 15); // change to fk

            $table->string('state', 20);
            $table->char('uf', 2);

            $table->string('area', 25);

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
