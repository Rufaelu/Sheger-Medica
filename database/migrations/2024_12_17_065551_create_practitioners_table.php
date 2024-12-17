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
        Schema::create('practitioners', function (Blueprint $table) {
            $table->id('practitioner_id');
            $table->unsignedBigInteger('user_id');
            $table->text('specialties');
            $table->string('region', 100);
            $table->string('contact_info', 255)->nullable();
            $table->integer('reviews_count')->default(0);
            $table->decimal('average_rating', 3, 2)->default(0.00);
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('approved');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practitioners');
    }
};
