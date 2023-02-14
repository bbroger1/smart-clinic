<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusColumnQueryTable extends Migration
{
    public function up()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->foreignId('status')->default(1)->references('id')->on('query_status');
        });
    }

    public function down()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
