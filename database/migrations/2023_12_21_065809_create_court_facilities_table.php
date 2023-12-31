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
            $table->timestamps();
            $table->unsignedBigInteger('court_id');
            $table->unsignedBigInteger('facility_id');
            $table->foreignId('court_id')
                ->constrained(table: 'courts', indexName: 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('facility_id')
                ->constrained(table: 'facilities', indexName: 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
