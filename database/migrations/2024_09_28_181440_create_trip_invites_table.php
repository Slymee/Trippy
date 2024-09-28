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
        Schema::create('trip_invites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invited_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('invited_to')->constrained('users')->onDelete('cascade');
            $table->foreignId('trip_id')->constrained('trips')->onDelete('cascade');
            $table->string('status', 20)->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_invites');
    }
};
