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
        Schema::create('herb_remedy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('herb_id'); // Foreign key to herbs.herb_id
            $table->unsignedBigInteger('remedy_id'); // Foreign key to remedies.remedy_id
            $table->timestamps();

            $table->foreign('herb_id')->references('herb_id')->on('herbs')->onDelete('cascade');
            $table->foreign('remedy_id')->references('remedy_id')->on('remedies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('herb_remedy');
    }
};
