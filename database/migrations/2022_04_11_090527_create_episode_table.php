<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("movieId");
            $table->string("url");
            $table->unsignedBigInteger("seasonId");
            $table->timestamps();
            $table->string("slug");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episode');
    }
};
