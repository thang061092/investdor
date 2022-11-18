<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugEnToCategoryNewsTable extends Migration
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
            $table->string('slug_en');
            $table->string('name_en');
            $table->longText('description_en');
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
            $table->dropColumn('slug_en');
            $table->dropColumn('name_en');
            $table->dropColumn('description_en');
        });
    }
}
