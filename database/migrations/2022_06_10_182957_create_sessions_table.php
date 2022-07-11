<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->date('sessionDate');
            $table->time('sessionTime');
            $table->integer('sessionCapacity');
            $table->integer('sessionGuestCap');
            $table->integer('sessionCurrCap')->default(0);
            $table->integer('sessionCurrGuestCap')->default(0);
            $table->string('sessionDesc');
            $table->string('sessionType');
            $table->string('sessionStatus');
            $table->string('sessionDay');
            $table->integer('mcID');
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
