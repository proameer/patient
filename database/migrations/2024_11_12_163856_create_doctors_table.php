<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('third_name');
            $table->string('fourth_name');
            $table->integer('age');
            $table->foreignId('general_specialization_id')->constrained()->cascadeOnDelete();
            $table->foreignId('specific_specialization_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
