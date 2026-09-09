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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->nullable()->constrained('doctors')->onDelete('cascade');
            $table->foreignId('categoy_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->foreignId('status_updated_by')->nullable()->constrained('users')->onDelete('cascade');

            $table->string('name',150);
            $table->string('phone')->nullable();
            $table->text('message')->nullable();

            $table->enum('status',['compleate','confirm','pending','cancelled'])->default('pending');
             $table->timestamp('status_updated_at')->nullable();
            $table->text('reason')->nullable();
            $table->date('appointment_date');
            $table->time('appointment_time');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
