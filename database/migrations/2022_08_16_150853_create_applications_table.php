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
            $table->foreignId('id_applicant');
            $table->enum('jenis_permohonan', ['penelitian', 'pengambilan_data', 'magang']);
            $table->text('keperluan');
            $table->date('waktu_awal');
            $table->date('waktu_akhir');
            $table->text('judul_rencana_penelitian');
            $table->string('file_surat_pemohon');
            $table->string('file_proposal_pemohon');
            $table->string('file_surat_permohonan');
            $table->string('status_permohonan');
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