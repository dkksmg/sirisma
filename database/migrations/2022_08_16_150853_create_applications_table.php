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
        Schema::create('applications', function (Blueprint $table) {
            $table->id('id_application');
            $table->string('kode_permohonan')->index();
            $table->integer('id_user');
            $table->foreignId('id_applicant')->index();
            $table->foreignId('jenis_permohonan');
            $table->string('no_surat');
            $table->string('asal_surat');
            $table->date('tgl_surat');
            $table->text('keperluan');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->text('lokasi_tujuan');
            $table->text('judul_atau_data');
            $table->timestamp('tanggal_permohonan');
            $table->string('file_surat_pemohon');
            $table->string('file_proposal_pemohon');
            $table->string('file_surat_permohonan')->nullable();
            $table->string('biaya_permohonan')->nullable();
            $table->timestamps();
            $table->foreign('id_applicant')->references('id_applicant')->on('applicants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_permohonan')->references('id')->on('application_types')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};