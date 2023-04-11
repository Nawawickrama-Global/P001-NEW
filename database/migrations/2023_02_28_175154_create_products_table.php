<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('title');
            $table->string('sku');
            $table->enum('product_type', ['single','variant'])->default('single');
            $table->bigInteger('sub_category_id');
            $table->bigInteger('brand_id');
            $table->string('feature_image');
            $table->string('product_image');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('clean_and_care');
            $table->text('product_sheet');
            $table->enum('status', ['active','inactive'])->default('active');
            $table->float('price')->nullable();
            $table->float('sale_price')->nullable();
            $table->integer('stock')->nullable();
            $table->softDeletes();
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
}
