<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnQueries extends Migration
{

    public function up()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->string('message')->nullable();
        });
    }

    public function down()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->dropColumn('message');
        });
    }
}
