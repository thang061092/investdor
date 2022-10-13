<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('full_name')->nullable();
            $table->string('status')->nullable();
            $table->integer('type')->comment('Phân loại user')->nullable();
            $table->string('channels')->nullable();
            $table->string('avatar')->nullable()->comment('anh dai dien');
            $table->string('photo')->nullable()->comment('anh chan dung');
            $table->string('otp')->nullable();
            $table->string('time_otp')->nullable();
            $table->string('reviews')->nullable()->comment('xep hang');
            $table->longText('token_web')->nullable();
            $table->longText('token_app')->nullable();
            $table->string('card_back')->nullable();
            $table->string('front_facing_card')->nullable();
            $table->string('identity')->nullable();
            $table->string('created_by')->nullable();
            $table->string('source')->nullable();
            $table->longText('data_source')->nullable();
            $table->string('referral_code')->nullable();
            $table->smallInteger('is_admin')->default(0);
            $table->smallInteger('accuracy')->default(0);
            $table->string('updated_by')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('job')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('ward')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('active_at')->nullable();
            $table->string('id_facebook')->nullable();
            $table->string('id_google')->nullable();
            $table->longText('address')->nullable();
            $table->longText('date_identity')->nullable()->comment('ngày cấp chứng minh thư');
            $table->longText('address_identity')->nullable()->comment('nơi cấp chứng minh thư');
            $table->unsignedBigInteger('referral_id')->nullable();
            $table->timestamp('referral_date')->nullable();
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
        Schema::dropIfExists('users');
    }
}
