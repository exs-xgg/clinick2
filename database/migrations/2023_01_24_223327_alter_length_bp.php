<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterLengthBp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vital_signs', function($table) {
            $table->string('temp', 10 )->change();
            $table->string('weight', 10 )->change();
            $table->string('height', 10 )->change();
            $table->string('bp', 10 )->change();
            $table->string('rr', 10 )->change();
            $table->string('hr', 10 )->change();
            $table->string('waist', 10 )->change();
            $table->string('pr', 10 )->change();
            $table->string('muac', 10 )->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
