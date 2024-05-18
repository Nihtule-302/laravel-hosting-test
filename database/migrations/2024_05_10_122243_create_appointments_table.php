<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("patient_id")->nullable()->constrained()->onDelete('cascade');
            $table->foreignId("doctor_id")->constrained()->onDelete('cascade');
            $table->dateTime('date');
            $table->float('price');
            $table->enum("status", ["Available", "Booked"])->default("Available");
            $table->enum("type", ["Online", "Offline"]);
            $table->string('location');
            $table->string('duration');
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
        Schema::dropIfExists('appointments');
    }
}
