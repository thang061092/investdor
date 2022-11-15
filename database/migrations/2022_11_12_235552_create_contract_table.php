<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->unique();
            $table->unsignedBigInteger('user_id');
            $table->json('interest')->nullable();
            $table->string('created_by')->nullable();
            $table->bigInteger('amount');
            $table->bigInteger('part');
            $table->bigInteger('value_part');
            $table->bigInteger('date_init')->comment('ngay bat dau tich luy')->nullable();
            $table->bigInteger('due_date')->comment('ngay kết thúc tich luy')->nullable();
            $table->string('month')->nullable();
            $table->unsignedBigInteger('interest_id')->nullable();
            $table->unsignedBigInteger('real_estate_project_id')->nullable();
            $table->integer('status')->default(1)->comment('trang thai cua so tich luy, mac dinh con hieu luc');
            $table->bigInteger('expire_date')->nullable()->comment('Ngày đáo hạn thực tế');
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
        Schema::dropIfExists('contract');
    }
}
