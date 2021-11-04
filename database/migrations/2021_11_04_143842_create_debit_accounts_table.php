<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_accounts', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('amount');
            $table->string('currency');
            $table->string('tax');
            $table->string('total_amount');
            $table->foreignId('receipt_id')->references('id')->on('receipts');
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
        Schema::dropIfExists('debit_accounts');
    }
}
