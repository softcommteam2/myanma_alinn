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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_voucher')->unique();
            $table->string('sale_voucher_sku');
            $table->integer('sale_voucher_sku_id');
            $table->string('customer_id');
            $table->dateTime('record_date');
            $table->dateTime('sale_date');
            $table->string('item_id');
            $table->string('itemsku_id');
            $table->string('description')->nullable();
            $table->dateTime('specified_date');
            $table->dateTime('received_date');
            $table->float('inches', 15,2);
            $table->integer('columns');
            $table->float('quantity', 15,2);
            $table->float('total_inches', 15,2);
            $table->string('times');
            $table->float('price',15,2);
            $table->float('timeprice',15,2);
            $table->float('total_price',15,2);
            $table->float('total_amount', 15,2);
            $table->float('discount_amount',15,2);
            $table->float('change_date_status');
            $table->string('comments')->nullable();
            $table->string('paid_id');
            $table->string('payment_comment')->nullable();
            $table->integer('status')->nullable();
            $table->integer('cancel')->nullable();
            $table->string('budget_year')->nullable();
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
        Schema::dropIfExists('sales');
    }

};
