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
            $table->decimal('total_building_area', 15, 10)->nullable()->comment('Tổng diện tích xây dựng');
            $table->decimal('nrsf', 15, 10)->nullable();
            $table->decimal('expected_capacity', 15, 10)->nullable()->comment('Công suất dự kiến');
            $table->decimal('target_table', 15, 10)->nullable()->comment('Mục tiêu Lợi tức ổn định trên chi phí');
            $table->decimal('current_price', 15, 10)->nullable()->comment('Giá chi phí cho đến thời điểm hiện tại');
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
