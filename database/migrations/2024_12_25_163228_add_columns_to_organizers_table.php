<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('organizers', function (Blueprint $table) {
            $table->integer('year_established')->nullable(); // Add year_est column
            $table->text('description')->nullable(); // Add description column
            $table->string('profile_image')->nullable(); // Add profile_image column
            $table->string('header_image')->nullable(); // Add heeader_image column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organizers', function (Blueprint $table) {
            $table->dropColumn(['year_established', 'description', 'profile_image', 'header_image']); // Drop the columns if rolling back
        });
    }
}