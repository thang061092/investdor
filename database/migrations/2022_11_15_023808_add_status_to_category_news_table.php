<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToCategoryNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_news', function (Blueprint $table) {
            //
            $table->string('status');
            $table->string('created_by');
            $table->string('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_news', function (Blueprint $table) {
            //
            $table->dropColumn('status');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });
    }
}
