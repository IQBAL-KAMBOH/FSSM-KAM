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
            $table->integer('l1')->nullable();
            $table->integer('l2')->nullable();
            $table->integer('l3')->nullable();
            $table->integer('l4')->nullable();
            $table->integer('l5')->nullable();
            $table->integer('l6')->nullable();
            $table->integer('l7')->nullable();
            $table->integer('l8')->nullable();
            $table->integer('l9')->nullable();
            $table->integer('l10')->nullable();
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
