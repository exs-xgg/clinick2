<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
class InsertUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        $ar = [
            "name" => "Dominic Santos",
            "email" => "nikisantos@yahoo.com",
            "password" => bcrypt("bulalo114"),
        ];
        $user = new User;
        $user->fill($ar)->save();
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
