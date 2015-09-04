<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searches', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('latitude', 255);
            $table->string('longitude', 255);
            $table->binary('json');
            $table->string('request_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('searches');
    }
}
