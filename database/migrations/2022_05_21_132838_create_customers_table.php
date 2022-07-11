<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('cName');
            $table->string('cPassword');
            $table->string('cEmail');
            $table->string('cPhoneNum');
            $table->binary('cFaceImage')->nullable();
            $table->binary('cMatricImage')->nullable();
            $table->string('cRole');
            $table->string('cVerifyStatus')->nullable()->default("Unverified");
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
        Schema::dropIfExists('customers');
    }
}
