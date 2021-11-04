<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_issuer');
            $table->string('receipt_collection_method');
            $table->string('receipt_credit_account');
            $table->text('receipt_reason');

            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->text('recipient_address');
            $table->string('receipt_type');
            $table->string('bank_name')->nullable();
            $table->string('check_number')->nullable();


            $table->double('total_amount',11,2);
            $table->double('total_tax',11,2)->default(0);
            $table->double('sub_total',11,2);


            $table->string('supplier_name')->nullable();
            $table->integer('supplier_no')->nullable();
            $table->string('tax_number')->nullable();



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
        Schema::dropIfExists('receipts');
    }
}
