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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->string('organizer');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('max_team');
            $table->string('rules');
            $table->unsignedBigInteger('court_id');
            $table->foreign('court_id')
                ->references('id')
                ->on('courts')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
