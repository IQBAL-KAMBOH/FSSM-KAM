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
        Schema::table('users', function (Blueprint $table) {
            $table->string('refral_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('cnic')->nullable();
            $table->integer('refral_id')->nullable();
            $table->integer('plan_id')->nullable();
            $table->double('x_wallet')->default(0.00)->nullable();
            $table->double('online_store_wallet')->default(0.00)->nullable();
            $table->double('total_earning')->default(0.00)->nullable();
            $table->double('enjoy_store_discount')->default(0.00)->nullable();
            $table->double('regular_points')->default(0)->nullable();
            $table->string('refral_side')->nullable();
            $table->string('rank')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
