<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSavedProgramsTable extends Migration
{
    public function up()
    {
        Schema::table('saved_programs', function (Blueprint $table) {
            $table->renameColumn('program_id', 'post_id');
        });
    }

    public function down()
    {
        Schema::table('saved_programs', function (Blueprint $table) {
            $table->renameColumn('post_id', 'program_id');
        });
    }
}