<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->bigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('town');
            $table->string('city');
            $table->string('postal_code');
            $table->string('email');
            $table->string('contact_number');
            $table->bigInteger('coupon_id')->nullable();
            $table->bigInteger('shipping_method_id');
            $table->float('total_amount');
            $table->enum('status', ['pending_payment', 'paid', 'delivered'])->default('pending_payment');
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
        Schema::dropIfExists('orders');
    }
}
