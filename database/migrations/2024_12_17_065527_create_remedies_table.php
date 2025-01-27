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
        Schema::create('remedies', function (Blueprint $table) {
            $table->id('remedy_id');
            $table->string('title', 100);
            $table->text('preparation_steps');
            $table->string('dosage', 100)->nullable();
            $table->string('ailment', 100);
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
        Schema::dropIfExists('remedies');
    }
};
