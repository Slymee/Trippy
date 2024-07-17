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
        Schema::create('iteneraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained('destinations');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iteneraries');
    }
};
