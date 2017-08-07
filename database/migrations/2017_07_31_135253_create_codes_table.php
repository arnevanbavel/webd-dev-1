<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesTable extends Migration
{
    public function up()
    {
        Schema::create('codes', function(Blueprint $table) {
            $table->increments('code_id');
            $table->integer('user_id')->unsigned();
            $table->string('code', 60);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('codes');
    }
}
