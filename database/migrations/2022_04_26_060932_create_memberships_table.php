<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->integer('cID');
            $table->string('membershipType');
            $table->integer('membershipEntry')->nullable();
            $table->date('membershipExpired')->nullable();
            $table->string('membershipStatus')->default("Pending");;
            $table->binary('membershipReceipt')->nullable();
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
        Schema::dropIfExists('memberships');
    }
}
