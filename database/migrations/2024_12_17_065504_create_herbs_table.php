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
        Schema::create('herbs', function (Blueprint $table) {
            $table->id('herb_id');
            $table->string('local_name', 100)->unique();
            $table->string('scientific_name', 100)->nullable()->unique();
            $table->string('region', 100)->nullable();
            $table->text('benefits');
            $table->text('risks')->nullable();
            $table->string('image_path', 255)->nullable();
            $table->unsignedBigInteger('posted_by');
            $table->timestamps();

            $table->foreign('posted_by')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('herbs');
    }
};
