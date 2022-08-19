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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->text('order_date');
            $table->text('order_timestamp');
            $table->float('order_total', 10,2);
            $table->float('tax_total', 10, 2);
            $table->string('order_status')->default('pending');
            $table->float('payment_amount', 10,2)->default(0);
            $table->string('payment_status')->default('pending');
            $table->string('payment_date')->nullable();;
            $table->string('payment_timestamps')->nullable();;
            $table->string('delivery_status')->default('pending');
            $table->string('delivery_date')->nullable();
            $table->string('delivery_timestamp')->nullable();
            $table->text('delivery_address');
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
};
