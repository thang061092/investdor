<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->string('maintain')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->integer('period')->nullable();
            $table->integer('date_interest')->nullable();
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
        Schema::dropIfExists('interest');
    }
}
