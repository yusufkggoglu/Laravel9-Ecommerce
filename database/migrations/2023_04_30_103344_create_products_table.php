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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('collection_id');
            $table->string('title');
            $table->decimal('price');
            $table->string('brand')->nullable();
            $table->string('color')->nullable();
            $table->string('color_hex_code')->nullable();
            $table->string('product_code');
            $table->string('keywords')->nullable();
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->string('image')->nullable();
            $table->string('status',6);
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
        Schema::dropIfExists('products');
    }
};
