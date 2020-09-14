<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidnde
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('lang');
            $table->string('country');
            $table->string('name');
            $table->text('about');
            $table->text('description');
            $table->string('whatsapp');
            $table->string('picture_org');
            $table->string('picture_cover');
            $table->string('website');
            $table->integer('user_id');
            $table->string('email');
            $table->string('location');
            $table->integer('type_id');
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
