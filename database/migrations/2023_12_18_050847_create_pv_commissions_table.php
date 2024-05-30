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
        Schema::create('pv_commissions', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->nullable();
            $table->integer('level')->nullable();
            $table->double('pv')->nullable();
            $table->double('commission')->nullable();
            $table->double('percent')->nullable();
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
        Schema::dropIfExists('pv_commissions');
    }
};
