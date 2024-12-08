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
        Schema::create('guide_ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('rate');
            $table->unsignedBigInteger('guide_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('guide_id')->references('id')->on('guides');
            $table->foreign('user_id')->references('id')->on('users');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guide_ratings');
    }
};
