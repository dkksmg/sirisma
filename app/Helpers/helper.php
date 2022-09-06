<?php

use Carbon\Carbon;
use App\Models\Application;

function salam()
{
    //ubah timezone menjadi jakarta
    date_default_timezone_set('Asia/Jakarta');
    //ambil jam dan menit
    $jam = date('H:i');
    // $salam = "alayekum";
    //atur salam menggunakan IF
    if ($jam >= '00:00' && $jam < '11:00') {
        $salam = 'Pagi';
    } elseif ($jam >= '11:00' && $jam < '15:00') {
        $salam = 'Siang';
    } elseif ($jam >= '15:00' && $jam < '18:00') {
        $salam = 'Sore';
    } else if ($jam >= '18:00' && $jam <= '23:59') {
        $salam = 'Malam';
    } else {
        $salam = 'Datang';
    }
    //tampilkan pesan
    echo 'Selamat ' . $salam;
}
function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    echo $hasil_rupiah;
}
function kodepermohonan()
{
    $now = Carbon::now();
    $date_now = $now->year . $now->month . $now->day;
    $cek = Application::count();
    if ($cek == 0) {
        $urut = 10001;
        $nomer = '3374/' . $date_now . '/' . $urut;
    } else {
        $ambil = Application::all()->last();
        $urut = (int)substr($ambil->kode_permohonan, -5) + 1;
        $nomer = '3374/' . $date_now . '/' . $urut;
    }
    return $nomer;
}