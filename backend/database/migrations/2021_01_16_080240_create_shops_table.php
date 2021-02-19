<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('area');
            $table->string('address');
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->integer('wifi');
            $table->integer('outlet');
            $table->integer('station');
            $table->integer('fashionable');
            $table->integer('coffee');
            $table->integer('spot');
            $table->integer('hotel');
            $table->integer('voice');
            $table->integer('capacity');
            $table->integer('cuisine');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('credit');
            $table->integer('smoke');
            $table->integer('pet');
            $table->integer('liquor');
            $table->string('tel')->nullable();
            $table->string('url')->nullable();
            $table->string('close')->nullable();
            $table->text('caution')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('shops');
    }
}
