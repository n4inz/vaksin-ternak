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
        Schema::create('alamats', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('kecamatans_id')->nullable();
            $table->unsignedBigInteger('desas_id')->nullable();
            $table->foreign('kecamatans_id')
            ->references('id')->on('kecamatans');
            
            $table->foreign('desas_id')
            ->references('id')->on('desas');
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
        Schema::dropIfExists('alamats');
    }
};
