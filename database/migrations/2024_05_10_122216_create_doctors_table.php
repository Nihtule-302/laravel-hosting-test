<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->float('average_rating');
            $table->string('phone_number');
            $table->string('medical_license');
            $table->string('certifications');
            $table->enum("specialization", ["Mental", "Physical"]);
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
        Schema::dropIfExists('doctors');
    }
}
