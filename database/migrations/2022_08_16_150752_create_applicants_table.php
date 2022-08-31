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
            $table->unsignedBigInteger('id_user');
            // $table->string('name');
            // $table->string('email');
            $table->string('nik');
            $table->string('nim');
            $table->string('no_hp');
            $table->text('alamat_ktp');
            $table->text('alamat_domisili');
            $table->unsignedBigInteger('provinsi_ktp');
            $table->unsignedBigInteger('kotakab_ktp');
            $table->unsignedBigInteger('kecamatan_ktp');
            $table->unsignedBigInteger('kelurahan_ktp');
            $table->unsignedBigInteger('provinsi_domisili');
            $table->unsignedBigInteger('kotakab_domisili');
            $table->unsignedBigInteger('kecamatan_domisili');
            $table->unsignedBigInteger('kelurahan_domisili');
            $table->string('status');
            $table->string('jenjang');
            $table->string('asal');
            $table->string('program_studi');
            $table->string('semester');
            $table->string('file_ktp');
            $table->string('file_ktm');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('applicants', function ($table) {
            $table
                ->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('provinsi_ktp')
                ->references('id_provinsi')
                ->on('provinces')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('provinsi_domisili')
                ->references('id_provinsi')
                ->on('provinces')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('kotakab_ktp')
                ->references('id_kota')
                ->on('districts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('kotakab_domisili')
                ->references('id_kota')
                ->on('districts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('kecamatan_ktp')
                ->references('id_kec')
                ->on('sub_districts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('kecamatan_domisili')
                ->references('id_kec')
                ->on('sub_districts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('kelurahan_ktp')
                ->references('id_kel')
                ->on('villages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('kelurahan_domisili')
                ->references('id_kel')
                ->on('villages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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