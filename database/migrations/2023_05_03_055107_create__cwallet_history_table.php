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
        Schema::create('cwallet_history', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('user_by')->nullable();
            $table->string('transfer_by')->nullable();
            $table->double('points')->default(0)->nullable();
            $table->string('point_type')->nullable();
            $table->string('detail')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('_cwallet_history');
    }
};
