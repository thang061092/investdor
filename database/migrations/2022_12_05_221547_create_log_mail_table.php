<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogMailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_mail', function (Blueprint $table) {
            $table->id();
            $table->string('emailFrom')->nullable();
            $table->string('nameFrom')->nullable();
            $table->longText('subject')->nullable();
            $table->string('emailTo')->nullable();
            $table->string('nameTo')->nullable();
            $table->longText('template')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('log_mail');
    }
}
