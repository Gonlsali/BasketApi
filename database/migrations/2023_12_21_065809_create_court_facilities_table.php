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
        Schema::create('court_facilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('court_id');
            $table->foreign('court_id')
                ->references('id')
                ->on('courts')
                ->onDelete('cascade');
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id')
                ->references('id')
                ->on('facilities')
                ->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('court_facilities');
    }
};
