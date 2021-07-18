<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitalSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('visit_id');
            $table->string('temp', 4)->nullable();
            $table->string('weight', 4)->nullable();
            $table->string('height', 4)->nullable();
            $table->string('bp', 4)->nullable();
            $table->string('rr', 4)->nullable();
            $table->string('hr', 4)->nullable();
            $table->timestamps();


            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('visit_id')->references('id')->on('visits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vital_signs');
    }
}
