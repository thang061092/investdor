<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedBackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_back', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('job_vi')->nullable();
            $table->string('job_en')->nullable();
            $table->string('avatar')->nullable()->comment('anh dai dien');
            $table->longText('feedback_vi')->nullable();
            $table->longText('feedback_en')->nullable();
            $table->string('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('feed_back');
    }
}
