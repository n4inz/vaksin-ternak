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
        Schema::table('jadwal_vaksins', function (Blueprint $table) {
            $table->unsignedBigInteger('kecamatans_id')->nullable();
            $table->unsignedBigInteger('desas_id')->nullable();
            $table->unsignedBigInteger('alamats_id')->nullable();


            $table->foreign('kecamatans_id')
            ->references('id')->on('kecamatans');
            
            $table->foreign('desas_id')
            ->references('id')->on('desas');
            

            $table->foreign('alamats_id')
            ->references('id')->on('alamats');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_vaksins', function (Blueprint $table) {
            //
        });
    }
};
