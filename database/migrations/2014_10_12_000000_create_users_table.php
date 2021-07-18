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
            $table->date('reg_date');
            $table->unsignedBigInteger('role_type_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_no');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('post_code');
            $table->string('company_no')->nullable();;
            $table->string('company')->nullable();;
            $table->string('vat_no')->nullable();;
            $table->string('dept_email')->nullable();;
            $table->string('profile')->nullable();
            $table->string('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
