<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('status')->nullable();
            $table->string('image_avatar')->nullable();
            $table->string('type_of_real_estate')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_address')->nullable();
            $table->integer('total_number_of_parts')->nullable();
            $table->string('expected_profit')->nullable();
            $table->string('describe_project')->nullable();
            $table->integer('price')->nullable();
            $table->longText('project_overview')->nullable();
            $table->longText('project_site_overview')->nullable();
            $table->longText('market_overview')->nullable();
            $table->longText('platform_overview')->nullable();
            $table->string('year_built')->nullable();
            $table->string('total_building_area')->nullable();
            $table->string('nrsf')->nullable();
            $table->string('expected_capacity')->nullable();
            $table->string('target_stable_return_on_cost')->nullable();
            $table->string('cost_so_far')->nullable();
            $table->string('project_highlights')->nullable();
            $table->string('introducing_investor')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_description')->nullable();
            $table->string('description_business_plan')->nullable();
            $table->string('description_other_documents')->nullable();
            $table->string('project_location_description')->nullable();

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
        Schema::dropIfExists('projects');
    }
}
