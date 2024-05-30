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
        Schema::table('packages', function (Blueprint $table) {
            $table->string('sotre_wallet_limit')->nullable();
            $table->string('store_percentage')->nullable();
            $table->string('future_point_pair_count')->nullable();
            $table->string('direct_points_percent')->nullable();
            $table->string('register_points_percent')->nullable();
            $table->string('dp_required')->nullable();
            $table->string('rp_required')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
};
