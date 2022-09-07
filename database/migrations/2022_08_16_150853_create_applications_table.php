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
            $table->foreignId('id_applicant');
            $table->foreignId('jenis_permohonan');
            $table->text('keperluan');
            $table->date('waktu_awal');
            $table->date('waktu_akhir');
            $table->text('lokasi_tujuan');
            $table->text('judul_rencana_penelitian');
            $table->timestamp('tanggal_permohonan');
            $table->string('file_surat_pemohon');
            $table->string('file_proposal_pemohon');
            $table->string('file_surat_permohonan')->nullable();
            $table->string('biaya_permohonan')->nullable();
            $table->enum('status_permohonan', ['Draft', 'Kirim', 'Periksa', 'Setujui', 'Tolak']);
            $table->timestamp('update_waktu_status');
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