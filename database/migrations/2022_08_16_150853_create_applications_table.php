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
            $table->integer('id_user');
            $table->foreignId('id_applicant');
            $table->enum('jenis_permohonan', ['Penelitian', 'Pengambilan_data', 'Magang']);
            $table->text('keperluan');
            $table->date('waktu_awal');
            $table->date('waktu_akhir');
            $table->text('judul_rencana_penelitian');
            $table->string('file_surat_pemohon');
            $table->string('file_proposal_pemohon');
            $table->string('file_surat_permohonan');
            $table->enum('status_permohonan', ['Draft', 'Kirim', 'Periksa', 'Setujui', 'Tolak']);
            $table->timestamp('update_waktu_status');
            $table->timestamps();
            $table->foreign('id_applicant')->references('id_applicant')->on('applicants')->onDelete('cascade')->onUpdate('cascade');
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