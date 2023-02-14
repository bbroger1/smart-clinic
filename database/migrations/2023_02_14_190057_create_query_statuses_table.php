<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueryStatusesTable extends Migration
{

    public function up()
    {
        Schema::create('query_status', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('query_status');
    }
}
