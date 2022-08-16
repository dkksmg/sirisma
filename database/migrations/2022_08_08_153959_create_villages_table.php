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
        Schema::create('villages', function (Blueprint $table) {
            $table->id('id_kel');
            $table->unsignedBigInteger('id_prov');
            $table->unsignedBigInteger('id_kota');
            $table->unsignedBigInteger('id_kec');
            $table->string('nama_kelurahan');
            $table
                ->foreign('id_prov')
                ->references('id_provinsi')
                ->on('provinces')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('id_kota')
                ->references('id_kota')
                ->on('districts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('id_kec')
                ->references('id_kec')
                ->on('sub_districts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('villages');
    }
};