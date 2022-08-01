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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id('id_applicant');
            $table->string('name');
            $table->integer('nik');
            $table->string('nim');
            $table->integer('no_hp');
            $table->string('email');
            $table->string('alamat');
            $table->enum('status', ['Pelajar', 'Mahasiswa', 'Dosen']);
            $table->enum('jenjang', ['SMA', 'SMK', 'Diploma 3', 'Diploma 4', 'Sarjana', 'Magister', 'Doktor', 'Profesor']);
            $table->string('asal');
            $table->string('program_studi');
            $table->string('semester');
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
        Schema::dropIfExists('applicants');
    }
};