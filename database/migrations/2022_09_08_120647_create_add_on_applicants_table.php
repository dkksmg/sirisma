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
        Schema::create('add_on_applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_application');
            // $table->foreignId('application_id_application');
            $table->string('nama_pemohon');
            $table->string('nim_pemohon');
            $table->string('nik');
            $table->string('no_hp');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('add_on_applicants');
    }
};