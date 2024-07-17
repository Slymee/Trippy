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
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('itenerary_id')->constrained('iteneraries')->onDelete('cascade');
            $table->string('transport_name', 255);
            $table->string('transport_type', 255);
            $table->string('transport_vehicle_number', 255)->nullable();
            $table->decimal('price_per_person', 10, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transports');
    }
};
