<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOverviewProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overview_project', function (Blueprint $table) {
            $table->id();
            $table->longText('overview_vi')->nullable();
            $table->longText('overview_en')->nullable();
            $table->longText('address_vi')->nullable();
            $table->longText('address_en')->nullable();
            $table->longText('market_vi')->nullable();
            $table->longText('market_en')->nullable();
            $table->longText('basis_vi')->nullable();
            $table->longText('basis_en')->nullable();
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
        Schema::dropIfExists('overview_project');
    }
}
