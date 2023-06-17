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
        Schema::create('jadwal_vaksins', function (Blueprint $table) {
            $table->id();
            $table->dateTime('jadwal');
            $table->string('lokasi');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('data_vaksins_id');
            


            $table->foreign('data_vaksins_id')
            ->references('id')->on('data_vaksins');

            $table->softDeletes();
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
        Schema::dropIfExists('jadwal_vaksins');
    }
};
