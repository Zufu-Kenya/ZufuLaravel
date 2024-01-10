<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sell_to_us', function (Blueprint $table) {
            $table->id();
            $table->string('product_brand');
            $table->string('product_model');
            $table->string('buy_date');
            $table->string('physical_condition');
            $table->string('damages');
            $table->string('sell_amount');
            $table->string('item_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_to_us');
    }
};
