<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('patient_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->foreignId('patient_id')->constrained('patients');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_appointments');
    }
}
