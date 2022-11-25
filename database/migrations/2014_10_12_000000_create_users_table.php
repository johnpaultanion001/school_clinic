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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('contact_number')->nullable();
            $table->longText('address')->nullable();
            $table->string('grade_student')->nullable();
            $table->string('lrn')->nullable();
            $table->string('student_id')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('non_personnel_id')->nullable();


            $table->timestamp('email_verified_at')->default(date("Y-m-d H:i:s"));
            $table->string('role');
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
