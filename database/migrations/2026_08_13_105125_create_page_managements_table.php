<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('page_managements', function (Blueprint $table) {
            $table->id();



            $table->string('page_name');
            $table->string('section_name');

            $table->string('small_title_1')->nullable();
            $table->string('small_title_2')->nullable();
            $table->string('small_title_3')->nullable();
            $table->string('small_title_4')->nullable();
            $table->string('small_title_5')->nullable();



            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->string('title_3')->nullable();
            $table->string('title_4')->nullable();
            $table->string('title_5')->nullable();



            /*
            |--------------------------------------------------------------------------
            | SMALL DESCRIPTIONS
            |--------------------------------------------------------------------------
            */

            $table->string('small_description_1')->nullable();
            $table->string('small_description_2')->nullable();
            $table->string('small_description_3')->nullable();
            $table->string('small_description_4')->nullable();
            $table->string('small_description_5')->nullable();



            $table->text('description_1')->nullable();
            $table->text('description_2')->nullable();
            $table->text('description_3')->nullable();
            $table->text('description_4')->nullable();
            $table->text('description_5')->nullable();



            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('image_5')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_managements');
    }
};
