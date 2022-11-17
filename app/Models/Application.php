<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_application';
    protected $fillable = [
        'id_user', 'kode_permohonan',
        'id_applicant', 'jenis_permohonan', 'no_surat', 'asal_surat', 'tgl_surat', 'keperluan', 'tgl_awal', 'tgl_akhir', 'lokasi_tujuan', 'judul_atau_data', 'tanggal_permohonan', 'file_surat_pemohon', 'file_proposal_pemohon', 'nomor_agenda', 'tgl_agenda', 'file_surat_permohonan', 'biaya_permohonan', 'status_surat', 'update_oleh', 'role', 'update_waktu_status'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'id_applicant', 'id_applicant');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function type()
    {
        return $this->belongsTo(ApplicationType::class, 'jenis_permohonan', 'id');
    }
    public function addonapplicant()
    {
        return $this->hasMany(AddOnApplicant::class, 'id_application', 'id_application');
    }
    public function logsuratone()
    {
        return $this->hasOne(LogSurat::class, 'id_application', 'id_application')->latest();
    }
    public function logsuratmany()
    {
        return $this->hasMany(LogSurat::class, 'id_application', 'id_application');
    }
    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => 'SO.?', // Format kode yang akan digunakan.
                'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}