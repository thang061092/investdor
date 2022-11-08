<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnNameFileDocumentProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_project', function (Blueprint $table) {
            $table->string('name_file_vi')->nullable();
            $table->string('name_file_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_project', function (Blueprint $table) {
            $table->dropColumn('name_file_vi');
            $table->dropColumn('name_file_en');
        });
    }
}
