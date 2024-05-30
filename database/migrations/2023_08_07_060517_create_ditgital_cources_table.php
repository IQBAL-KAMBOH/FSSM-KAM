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
        Schema::create('digital_cources', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->double('purchase_price')->default(0)->nullable();
            $table->double('sale_price')->default(0)->nullable();
            $table->double('quantity')->default(0)->nullable();
            $table->double('tax')->default(0)->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->double('custom_id')->nullable();
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
        Schema::dropIfExists('ditgital_cources');
    }
};
