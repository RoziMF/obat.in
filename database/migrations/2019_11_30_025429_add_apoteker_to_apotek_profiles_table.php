<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApotekerToApotekProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apotek_profiles', function (Blueprint $table) {
            $table->string('apoteker');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apotek_profiles', function (Blueprint $table) {
            $table->dropIfExists(['apoteker']);
        });
    }
}
