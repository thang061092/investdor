<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnLinkQrBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->longText('link_qr')->nullable();
            $table->longText('bank_account')->nullable();
            $table->longText('name_account_bank')->nullable();
            $table->longText('name_bank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn('link_qr');
            $table->dropColumn('bank_account');
            $table->dropColumn('name_account_bank');
            $table->dropColumn('name_bank');
        });
    }
}
