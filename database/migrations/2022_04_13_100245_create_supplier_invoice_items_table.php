<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_invoice_items', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->foreignId('product_id');
            $table->string('status')->default('1');
            $table->foreignId('supplier_invoice_id');
            $table->foreignId('supplier_id');
            $table->double('quantity');
            $table->double('unit_price');
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
        Schema::dropIfExists('supplier_invoice_items');
    }
}
