<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCascadeDeletesToForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * Add ON DELETE CASCADE to all foreign keys so that deleting a patient
     * automatically removes related visits, images, vital signs, and activity logs.
     *
     * @return void
     */
    public function up()
    {
        // vital_signs: drop both FKs first (depends on visits and patients)
        Schema::table('vital_signs', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['visit_id']);

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('cascade');

            $table->foreign('visit_id')
                  ->references('id')
                  ->on('visits')
                  ->onDelete('cascade');
        });

        // visits
        Schema::table('visits', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('cascade');
        });

        // images
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('cascade');
        });

        // activity_logs
        Schema::table('activity_logs', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Revert all foreign keys back to their original state (no cascade).
     *
     * @return void
     */
    public function down()
    {
        // vital_signs
        Schema::table('vital_signs', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['visit_id']);

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients');

            $table->foreign('visit_id')
                  ->references('id')
                  ->on('visits');
        });

        // visits
        Schema::table('visits', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients');
        });

        // images
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients');
        });

        // activity_logs
        Schema::table('activity_logs', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients');
        });
    }
}
