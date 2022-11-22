<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interest', function (Blueprint $table) {
            $table->float('interest')->nullable();
            $table->float('early_interest')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interest', function (Blueprint $table) {
            $table->dropColumn('interest');
            $table->dropColumn('early_interest');
        });
    }
}
