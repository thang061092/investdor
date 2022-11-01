<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPlaneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_plane', function (Blueprint $table) {
            $table->id();
            $table->longText('title_vi')->nullable();
            $table->longText('title_en')->nullable();
            $table->longText('slug_vi')->nullable();
            $table->longText('slug_en')->nullable();
            $table->longText('description_vi')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('real_estate_project_id');
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
        Schema::dropIfExists('business_plane');
    }
}
