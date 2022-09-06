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
        Schema::create('many_applicants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_application');
            $table->string('nama_pemohon');
            $table->string('nim_nik');
            $table->string('no_hp');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('id_application')->references('id_application')->on('applications')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('many_applicants');
    }
};