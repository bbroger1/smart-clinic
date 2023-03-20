<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockedDaysTable extends Migration
{
    public function up()
    {
        Schema::create('blocked_days', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blocked_days');
    }
}
