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
        Schema::table('admin_account_details', function (Blueprint $table) {
            $table->string('pannel_poster_status')->nullable();
            $table->integer('pannel_poster_width')->nullable();
            $table->integer('pannel_poster_height')->nullable();
            $table->string('store_poster_status')->nullable();
            $table->integer('store_poster_width')->nullable();
            $table->integer('store_poster_height')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_account_details', function (Blueprint $table) {
            //
        });
    }
};
