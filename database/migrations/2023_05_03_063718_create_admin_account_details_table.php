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
        Schema::create('admin_account_details', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('bank_details')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_title')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_iban')->nullable();
            $table->string('easypaisa_name')->nullable();
            $table->string('easypaisa_account')->nullable();
            $table->string('jazzcash_name')->nullable();
            $table->string('jazzcash_account')->nullable();
            $table->string('whats_app')->nullable();
            $table->string('whats_app_b')->nullable();
            $table->string('whats_app_c')->nullable();
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
        Schema::dropIfExists('admin_account_details');
    }
};
