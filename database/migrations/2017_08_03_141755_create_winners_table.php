<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinnersTable extends Migration
{
    public function up()
    {
        Schema::create('winners', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('winnendeCode', 60);
            $table->string('maand', 60);
            $table->string('land', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('winners');
    }
}
