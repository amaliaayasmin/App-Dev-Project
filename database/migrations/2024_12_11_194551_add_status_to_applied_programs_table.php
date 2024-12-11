<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToAppliedProgramsTable extends Migration
{
    public function up()
    {
        Schema::table('applied_programs', function (Blueprint $table) {
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        });
    }

    public function down()
    {
        Schema::table('applied_programs', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}