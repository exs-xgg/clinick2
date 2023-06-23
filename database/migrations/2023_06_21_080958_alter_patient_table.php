<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('mothers_name', 100);
            $table->string('fathers_name', 100);
            $table->string('emergency_contact_no', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('mothers_name')->change();
            $table->dropColumn('fathers_name')->change();
            $table->dropColumn('emergency_contact_no')->change();
        });
    }
}
