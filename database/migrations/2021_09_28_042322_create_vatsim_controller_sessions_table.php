<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVatsimControllerSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vatsim_controller_sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('cid')->index();
            $table->dateTime('logon_time');
            $table->dateTime('logoff_time')->nullable();
            $table->string('frequency');
            $table->integer('visual_range');
            $table->json('text_atis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vatsim_controller_sessions');
    }
}
