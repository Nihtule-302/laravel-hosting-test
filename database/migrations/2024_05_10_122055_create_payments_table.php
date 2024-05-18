<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("appointment_id")->constrained()->onDelete('cascade');
            $table->foreignId("patient_id")->constrained()->onDelete('cascade');
            $table->foreignId("doctor_id")->constrained()->onDelete('cascade');
            $table->enum("status", ["pending", "confirmed"])->default("pending");
            $table->date('payment_date');
            $table->float('amount');
            $table->enum("payment_method", ["Card Payment", "In-person Payment"]);
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
        Schema::dropIfExists('payments');
    }
}
