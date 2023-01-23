<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVitalSigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vital_signs', function($table) {
            $table->dropForeign(['visit_id']);
            $table->dropColumn('visit_id');

            $table->string('waist_circumference', 6 )->nullable();
            $table->string('pr', 6 )->nullable();
            $table->string('muac', 6 )->nullable(); //mid upper arm circumference
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
