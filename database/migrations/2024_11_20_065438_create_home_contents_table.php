<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section_1_title')->nullable();
            $table->string('section_2_title')->nullable();
            $table->string('section_3_title')->nullable();
            $table->string('section_4_title')->nullable();
            $table->string('section_5_title')->nullable();
            $table->string('section_6_title')->nullable();
            $table->string('section_7_image')->nullable();
            $table->string('section_7_title')->nullable();
            $table->string('section_7_description')->nullable();
            $table->string('section_8_image')->nullable();
            $table->string('section_8_title')->nullable();
            $table->string('section_8_description')->nullable();
            $table->string('section_9_image')->nullable();
            $table->string('section_9_title')->nullable();
            $table->string('section_9_description')->nullable();
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
        Schema::dropIfExists('home_contents');
    }
};
