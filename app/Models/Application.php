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
        'id_applicant', 'jenis_permohonan', 'keperluan', 'waktu_awal', 'waktu_akhir', 'judul_rencana_penelitian', 'file_surat_pemohon', 'file_proposal_pemohon', 'file_surat_permohonan', 'biaya_permohonan', 'status_permohonan', 'update_waktu_status'
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
}