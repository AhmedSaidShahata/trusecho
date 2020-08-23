<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppscholarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appscholars', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('nationality');
            $table->string('address');
            $table->string('father_status');
            $table->string('mother_status');
            $table->string('specialization');
            $table->string('university');
            $table->string('interview_location');
            $table->string('user_picture');
            $table->string('high_school_picture');
            $table->string('university_picture');
            $table->string('letter_picture');
            $table->string('language_picture');
            $table->string('payment_picture');
            $table->string('passport_picture');
            $table->string('research');
            $table->string('degree');
            $table->integer('scholar_id');
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
        Schema::dropIfExists('appscholars');
    }
}
