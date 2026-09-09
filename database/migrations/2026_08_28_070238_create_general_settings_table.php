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
        Schema::create('general_settings', function (Blueprint $table) {
         $table->id();

            $table->string('field_name');

            $table->string('type')
                ->comment('text,file,date,radio,number');

            $table->text('value')
                ->nullable();

            $table->text('extra_value')
                ->nullable()
                ->comment('for radio button(if yes then open a field)');

            $table->boolean('status')
                ->default(true);

            $table->unsignedBigInteger('updated_by')
                ->nullable();

            $table->timestamp('created_at')
                ->nullable();

            $table->timestamp('updated_at')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
