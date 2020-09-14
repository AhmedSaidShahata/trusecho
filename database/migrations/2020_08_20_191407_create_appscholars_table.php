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
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->string('father_status')->nullable();
            $table->string('mother_status')->nullable();
            $table->string('siblings')->nullable();
            $table->string('specialization')->nullable();
            $table->string('university')->nullable();
            $table->string('interview_location')->nullable();
            $table->text('user_picture')->nullable();
            $table->text('high_school_picture')->nullable();
            $table->text('university_picture')->nullable();
            $table->text('letter_picture')->nullable();
            $table->text('language_picture')->nullable();
            $table->text('payment_picture')->nullable();
            $table->text('passport_picture')->nullable();
            $table->string('research')->nullable();
            $table->string('degree')->nullable();
            $table->integer('scholar_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->enum('seen',[0,1])->default(0);
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
