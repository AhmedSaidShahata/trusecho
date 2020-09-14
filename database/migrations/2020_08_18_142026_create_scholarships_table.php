<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('lang');
            $table->string('title');
            $table->string('description');
            $table->text('content');
            $table->text('requirments');
            $table->string('location');
            $table->string('company');
            $table->date('deadline');
            $table->string('email');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('cost_id')->constrained()->onDelete('cascade');
            $table->integer('specialization_id');
            $table->string('picture');
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
        Schema::dropIfExists('scholarships');
    }
}
