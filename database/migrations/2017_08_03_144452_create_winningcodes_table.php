<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinningcodesTable extends Migration
{

    public function up()
    {
        Schema::create('winningcodes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('winnendeCode', 60);
            $table->string('Land', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('winningcodes');
    }
}
