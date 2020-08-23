<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('country_ar');
            $table->string('country_en');
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('about_ar');
            $table->text('about_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('whatsapp');
            $table->string('picture_org');
            $table->string('picture_cover');
            $table->string('website');
            $table->string('email');
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
        Schema::dropIfExists('organizations');
    }
}
