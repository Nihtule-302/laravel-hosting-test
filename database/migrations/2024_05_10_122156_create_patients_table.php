<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('desired_treatment');
            $table->enum("gender", ["Male", "Female"]);
            $table->date('birthday');
            $table->string('treatment_plan')->nullable();
            $table->string('insurance_info')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
