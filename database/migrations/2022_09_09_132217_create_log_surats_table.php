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
        Schema::create('log_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_application');
            $table->enum('status_surat', ['draft', 'kirim', 'proses', 'setuju', 'sanggah', 'selesai', 'tolak', 'sesuai', 'ubah']);
            $table->foreignId('update_oleh');
            $table->dateTime('update_waktu');
            $table->text('keterangan')->nullable();
            $table->string('role');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_application')->references('id_application')->on('applications')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('update_oleh')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_surats');
    }
};