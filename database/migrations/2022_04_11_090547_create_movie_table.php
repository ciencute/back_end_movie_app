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
        Schema::create('movie', function (Blueprint $table) {

            $table->id();
            $table->string("name");
            $table->string("enName");
            $table->string("img");
            $table->string("url");
            $table->unsignedBigInteger("directorId");
            $table->string("bgImg");
            $table->text("description");
            $table->string("countryId");
            $table->smallInteger("duration");
            $table->smallInteger("viewCount");
            $table->unsignedBigInteger("categoryId");
            $table->string("slug");
            $table->double("imdb");
            $table->smallInteger("isMovie18")->default(0);
            $table->smallInteger("isFinished")->default(1);
            $table->smallInteger("isMovieSeries")->default(0);
            $table->smallInteger("totalEpisode")->default(1);
            $table->string("quality")->default("fullHd");
            $table->timestamp("publishedAt");
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
        Schema::dropIfExists('movie');
    }
};
