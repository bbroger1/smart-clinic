<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameForeingKeyDoctor extends Migration
{

    public function up()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->renameColumn('doctor_id', 'doctor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->renameColumn('doctor', 'doctor_id');
        });
    }
}
