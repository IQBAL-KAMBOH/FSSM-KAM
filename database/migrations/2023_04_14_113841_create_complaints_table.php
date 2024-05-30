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
        // Schema::create('complaints', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name')->nullable();
        //     $table->string('email')->nullable();
        //     $table->string('complaint_name')->nullable();
        //     $table->string('phone')->nullable();
        //     $table->string('complaint_description')->nullable();
        //     $table->string('complaint_status')->nullable();
        //     $table->string('tracking_id')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
};
