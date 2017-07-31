<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinnaarsTable extends Migration
{

    public function up()
    {
        Schema::create('winnaars', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('FK_user_id')->unsigned();
            $table->string('winnendeCode', 60);
            $table->string('winnendeMaand', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('winnaars');
    }
}
