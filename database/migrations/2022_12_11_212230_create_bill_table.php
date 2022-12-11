<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->bigInteger('amount_money')->nullable();
            $table->string('status')->nullable();
            $table->string('source_payment')->nullable();
            $table->string('type')->nullable();
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('real_estate_project_id')->nullable();
            $table->unsignedBigInteger('interest_id')->nullable();
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->string('order_code')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->string('bank_code')->nullable();
            $table->bigInteger('part')->nullable();
            $table->bigInteger('value_part')->nullable();
            $table->longText('link_qr')->nullable();
            $table->longText('bank_account')->nullable();
            $table->longText('name_account_bank')->nullable();
            $table->longText('name_bank')->nullable();
            $table->longText('note')->nullable();
            $table->bigInteger('payment_date')->nullable();
            $table->longText('image_license')->nullable();
            $table->longText('checksum')->nullable();
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
        Schema::dropIfExists('bill');
    }
}
