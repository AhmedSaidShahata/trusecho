<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->default('img/avatar.png');
            $table->string('nationality')->nullable();
            $table->string('job')->nullable();
            $table->string('fullname')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->date('date_of_birth')->nullable();
            $table->string('education_level')->nullable();
            $table->string('address')->nullable();
            $table->string('specialization')->nullable();
            $table->text('personal_desc')->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->integer('user_id');
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
        Schema::dropIfExists('profiles');
    }
}
