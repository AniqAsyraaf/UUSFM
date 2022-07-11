<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('cID')->nullable();
            $table->string('cName');
            $table->integer('sessionID');
            $table->string('sessionType');
            $table->date('bookDate');
            $table->time('bookTime');
            $table->string('phoneNum');
            $table->boolean('bookAttendance')->default(0);
            $table->string('bookingStatus')->default("Pending");
            $table->binary('bookingReceipt')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
