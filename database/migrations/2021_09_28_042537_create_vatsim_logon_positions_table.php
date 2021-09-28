<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVatsimLogonPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vatsim_logon_positions', function (Blueprint $table) {
            $table->id();
            $table->string('callsign')->unique();
            $table->string('logon_requirement');
            $table->string('type');
            $table->timestamps();
        });

        Schema::table('vatsim_controller_sessions', function (Blueprint $table) {
            $table->foreignId('position_id')->constrained('vatsim_logon_positions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vatsim_controller_sessions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('position_id');
        });

        Schema::dropIfExists('vatsim_logon_positions');

    }
}
