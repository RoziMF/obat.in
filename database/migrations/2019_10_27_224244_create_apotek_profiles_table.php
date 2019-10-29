<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApotekProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apotek_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alamat');
            $table->string('jam_buka');
            $table->string('jam_tutup');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apotek_profiles');
    }
}
