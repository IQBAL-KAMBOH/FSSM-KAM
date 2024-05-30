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
            $table->double('u_affiliate_commission')->nullable();
            $table->double('u_affiliate_sponser_commission1')->nullable();
            $table->double('u_affiliate_sponser_commission2')->nullable();
            $table->double('u_affiliate_sponser_commission3')->nullable();
            $table->double('u_affiliate_sponser_commission4')->nullable();
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
