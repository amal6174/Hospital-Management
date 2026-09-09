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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('small_title')->nullable();

            $table->text('small_description')->nullable();
            $table->string('comment')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('like')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
