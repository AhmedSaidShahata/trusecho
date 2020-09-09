<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('lang');
            $table->string('title');
            $table->text('description');
            $table->text('picture_company')->nullable();
            $table->string('location')->nullable();
            $table->text('requirments')->nullable();
            $table->date('deadline');
            $table->string('email');
            $table->integer('salary')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('specialization_id')->nullable();
            $table->string('company');
            $table->text('picture');
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
        Schema::dropIfExists('jobs');
    }
}
