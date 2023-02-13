<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameForeingKeysQueries extends Migration
{

    public function up()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->renameColumn('genre_id', 'genre');
        });
    }


    public function down()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->renameColumn('genre', 'genre_id');
        });
    }
}
