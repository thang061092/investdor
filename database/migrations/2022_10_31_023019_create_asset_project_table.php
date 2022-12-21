<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_project', function (Blueprint $table) {
            $table->id();
            $table->integer('year_built')->nullable()->comment('Năm xây dựng');
            $table->bigInteger('total_building_area')->nullable()->comment('Tổng diện tích xây dựng');
            $table->bigInteger('nrsf')->nullable();
            $table->bigInteger('expected_capacity')->nullable()->comment('Công suất dự kiến');
            $table->bigInteger('target_table')->nullable()->comment('Mục tiêu Lợi tức ổn định trên chi phí');
            $table->bigInteger('current_price')->nullable()->comment('Giá chi phí cho đến thời điểm hiện tại');
            $table->longText('project_highlights_vi')->nullable()->comment('Điểm nổi bật của dự án');
            $table->longText('project_highlights_en')->nullable()->comment('Điểm nổi bật của dự án');
            $table->float('longitude', 15, 10)->nullable()->comment('Kinh độ');
            $table->float('latitude', 15, 10)->nullable()->comment('Vĩ độ');
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
        Schema::dropIfExists('asset_project');
    }
}
