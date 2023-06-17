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
        Schema::create('pendaftaran_vaksins', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->string('nama_pemilik');
            $table->integer('jumlah_hewan');

            $table->unsignedBigInteger('jadwal_vaksin_id');

            $table->foreign('jadwal_vaksin_id')
            ->references('id')->on('jadwal_vaksins');

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
        Schema::dropIfExists('pendaftaran_vaksins');
    }
};
