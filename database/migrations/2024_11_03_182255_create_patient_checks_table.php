<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientChecksTable extends Migration
{
    public function up()
    {
        Schema::create('patient_checks', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('patient_id')->constrained('patients');
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_checks');
    }
}
