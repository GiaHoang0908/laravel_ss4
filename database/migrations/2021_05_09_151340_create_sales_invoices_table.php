<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('Chưa xử lý');
            $table->boolean('prepayment')->default(false);
            $table->integer('total_quantity')->default(0);
            $table->float('total_price')->default(0);
            $table->string('name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('note')->nullable();
            $table->date('delivery_date');
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('sales_invoices');
    }
}
