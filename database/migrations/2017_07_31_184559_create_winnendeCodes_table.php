<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinnendeCodesTable extends Migration
{
    public function up()
    {
        Schema::create('winnendeCodes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('winnendeCode', 60);
            $table->integer('maand')->nullable();
        });
    }

    public function down()
    {
        Schema::drop('winnendeCodes');
    }
}
