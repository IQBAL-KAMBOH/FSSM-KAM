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
        Schema::table('purchased_plans', function (Blueprint $table) {
            $table->renameColumn('eco_point', 'direct_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchased_plans', function (Blueprint $table) {
            $table->renameColumn('direct_points', 'eco_point');
        });
    }
};
