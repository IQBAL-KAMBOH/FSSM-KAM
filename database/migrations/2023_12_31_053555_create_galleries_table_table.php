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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('filename')->nullable();
            $table->string('filepath')->nullable();
            $table->string('filesize')->nullable();
            $table->string('filestype')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('campus_id')->nullable();
            $table->integer('session_id')->nullable();
            $table->integer('is_bank')->nullable();
            $table->string('status')->nullable();
            $table->integer('is_deleted')->nullable();
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
        Schema::dropIfExists('galleries_table');
    }
};
