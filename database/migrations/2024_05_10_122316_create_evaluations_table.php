<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("appointment_id")->constrained()->onDelete('cascade');
            $table->foreignId("patient_id")->constrained()->onDelete('cascade');
            $table->foreignId("doctor_id")->constrained()->onDelete('cascade');
            $table->enum("status", ["Checked", "Unchecked"])->default("Unchecked");
            $table->enum("type", ["Doctor Evaluation", "Experience Evaluation"]);
            $table->float('rating');
            $table->string('details');
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
        Schema::dropIfExists('evaluations');
    }
}
