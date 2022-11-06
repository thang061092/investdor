<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_company', function (Blueprint $table) {
            $table->id();
            $table->string('name_member')->nullable();
            $table->longText('avatar_member')->nullable();
            $table->longText('position_member_vi')->nullable();
            $table->longText('position_member_en')->nullable();
            $table->unsignedBigInteger('investor_project_id')->nullable();
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
        Schema::dropIfExists('member_company');
    }
}
