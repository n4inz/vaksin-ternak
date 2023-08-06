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
        Schema::table('pendaftaran_vaksins', function (Blueprint $table) {
            $table->string('kecamatan')->after('no_hp')->nullable();
            $table->string('desa')->after('kecamatan')->nullable();
            $table->string('alamat')->after('desa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftaran_vaksins', function (Blueprint $table) {
            //
        });
    }
};
