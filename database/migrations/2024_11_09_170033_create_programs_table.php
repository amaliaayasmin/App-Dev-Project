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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();  // Primary Key: id
            $table->string('title');  // Program title
            $table->text('description')->nullable();  // Program description
            $table->string('location');  // Program location
            $table->date('start_date');  // Start date of the program
            $table->date('end_date')->nullable();  // End date of the program
            $table->time('start_time');  // Start time of the program
            $table->time('end_time')->nullable();  // End time of the program
            $table->string('benefits')->nullable();  // Benefits of the program
            $table->timestamps();  // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};

