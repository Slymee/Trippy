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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('trip_type',255);
            $table->string('trip_name', 255);
            $table->text('trip_description');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('number_of_days');
            $table->decimal('trip_price', 10, 2);
            $table->string('total_people', 255);
            $table->string('means_of_transport', 255);
            $table->boolean('is_private')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
