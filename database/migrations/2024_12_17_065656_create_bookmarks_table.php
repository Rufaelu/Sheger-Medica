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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id('bookmark_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('herb_id')->nullable();
            $table->unsignedBigInteger('remedy_id')->nullable();
            $table->unsignedBigInteger('practitioner_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('herb_id')->references('herb_id')->on('herbs');
            $table->foreign('remedy_id')->references('remedy_id')->on('remedies');
            $table->foreign('practitioner_id')->references('practitioner_id')->on('practitioners');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
