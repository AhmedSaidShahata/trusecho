<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('description_en');
            $table->text('content_en');
            $table->text('heading_details_en');
            $table->string('location_en');
            $table->text('requirments_en');
            $table->string('title_ar');
            $table->string('description_ar');
            $table->text('content_ar');
            $table->text('heading_details_ar');
            $table->string('location_ar');
            $table->text('requirments_ar');
            $table->date('deadline');
            $table->string('email');
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
        Schema::dropIfExists('opportunities');
    }
}
