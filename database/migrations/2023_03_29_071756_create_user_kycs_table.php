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
        Schema::create('user_kycs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('status')->nullable();
            $table->string('cnic')->nullable();
            $table->string('idcard_front')->nullable();
            $table->string('idcard_back')->nullable();
            $table->string('under_age_form')->nullable();
            $table->string('dob')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('bank_details')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_title')->nullable();
            $table->string('easypaisa_name')->nullable();
            $table->string('easypaisa_account')->nullable();
            $table->string('jazzcash_name')->nullable();
            $table->string('jazzcash_account')->nullable();
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
        Schema::dropIfExists('user_kycs');
    }
};
