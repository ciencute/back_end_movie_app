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
        //
        Schema::rename("users", "user");
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
            $table->unsignedBigInteger("roleId");
            $table->string("img");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
