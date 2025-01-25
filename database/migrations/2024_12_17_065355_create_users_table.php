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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100)->unique();
            $table->binary('password');
            $table->string('google_id', 255)->nullable();
            $table->string('phone', 15)->nullable();
            $table->text('bio')->nullable();
            $table->text('specialties')->nullable();
            $table->decimal('average_rating', 3, 2)->default(0.00)->nullable();
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending')->nullable();
            $table->string('profile_picture', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
