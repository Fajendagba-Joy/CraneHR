<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->string('grn_no')->unique();
            $table->string('vendor');
            $table->string('invoice_no');
            $table->string('payment_type');
            $table->string('purchase_date');
            $table->string('store');
            $table->string('details')->nullable();
            $table->string('stock')->nullable();
            $table->string('second_total')->nullable();
            $table->string('discount')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('due_amount')->nullable();
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
        Schema::dropIfExists('purchase_details');
    }
}
