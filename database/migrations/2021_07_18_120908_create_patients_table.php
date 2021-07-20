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
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->string('mname', 100)->nullable();
            $table->string('birthdate')->nullable();
            $table->string('sex', 2)->default('NA');
            $table->integer('age')->nullable();
            $table->string('contact_no', 15)->nullable();
            $table->string('civil_stat', 100)->nullable();
            $table->string('occupation', 100)->nullable();
            $table->string('address')->nullable();
            $table->string('hmo', 100)->nullable();
            $table->string('temp_id', 100)->nullable();

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
