<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_hospital_medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hospital')->references('id')->on('hospitals');
            $table->foreignId('id_patient')->references('id')->on('patients');
            $table->foreignId('id_medicine')->references('id')->on('medicines');
    
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
        Schema::dropIfExists('patients_hospital_medicines');
    }
};
