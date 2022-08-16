<?php

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