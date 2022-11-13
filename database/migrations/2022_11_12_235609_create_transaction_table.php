<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->integer('type_method')->nullable()->comment('Loại giao dịch');
            $table->string('source')->nullable()->comment('nguồn tiền');
            $table->string('code')->comment('mã giao dịch')->nullable();
            $table->decimal('amount',50, 15)->comment('số tiền giao dịch');
            $table->integer('status')->nullable();
            $table->json('interest')->nullable();
            $table->decimal('principal', 50, 15)->nullable()->comment('tiền gốc');
            $table->decimal('money_interest', 50, 15)->nullable()->comment('tiền lãi');
            $table->decimal('total_principal_interest', 50, 15)->nullable()->comment('tổng gốc lãi');
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('bills_id')->nullable();
            $table->bigInteger('date_pay')->nullable();
            $table->integer('form')->nullable()->comment('thanh toán tự động hay thủ công');
            $table->json('payment_info')->nullable()->comment('thông tin tài khoản thanh toán');
            $table->bigInteger('profit_before_tax')->nullable()->comment('lãi trước thuế');
            $table->integer('tax')->nullable()->comment('thuế áp dụng');
            $table->longText('image')->nullable()->comment('chứng từ');
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
        Schema::dropIfExists('transaction');
    }
}
