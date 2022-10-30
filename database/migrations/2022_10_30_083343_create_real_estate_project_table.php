<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_project', function (Blueprint $table) {
            $table->id();
            $table->longText('name_vi')->nullable()->comment('Tên dự án');
            $table->longText('name_en')->nullable()->comment('Tên dự án');
            $table->longText('slug_vi')->nullable();
            $table->longText('slug_en')->nullable();
            $table->integer('city')->nullable();
            $table->integer('district')->nullable();
            $table->integer('ward')->nullable();
            $table->longText('address_vi')->nullable();
            $table->longText('address_en')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('total_value')->nullable()->comment('Tổng giá trị tài sản');
            $table->bigInteger('part')->nullable()->comment('số phần đầu tư');
            $table->bigInteger('value_part')->nullable()->comment('giá trị 1 phần');
            $table->longText('description_vi')->nullable()->comment('Mô tả chung');
            $table->longText('description_en')->nullable()->comment('Mô tả chung');
            $table->integer('status')->nullable()->comment('trạng thái dự án');
            $table->integer('type')->nullable()->comment('Loại dự án');
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
        Schema::dropIfExists('real_estate_project');
    }
}
