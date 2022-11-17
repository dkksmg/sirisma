<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('assets/img/favicon.png') }}" type="image/x-icon" />
    <title>Surat Permohonan {{ $data->kode_permohonan }}</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <style type="text/css">
        body {
            font-family: Arial;
            background-color: #ccc
        }

        .rangkasurat {
            width: 790px;
            margin: 0 auto;
            background-color: #fff;
            height: 1200px;
            padding: 20px;
        }

        .header {
            border-bottom: 5px solid #000;
            padding: 2px
        }

        hr {
            border: 1px solid #000;
        }

        .tengah {
            text-align: center;
            line-height: 5px;

        }

        .tujuan {
            margin-top: 5px
        }

        .detail-tujuan {
            padding-left: 100px
        }

        .isi-surat {
            margin-top: 5px;
            width: 790px
        }

        .tab-1 {
            display: inline-block;
            margin-left: 100px;
            text-indent: 50px;
            margin-bottom: 0;
            word-spacing: 1.5px;
            /* text-align: justify */
        }

        .tab-2 {
            display: inline-block;
            margin-left: 100px;
            text-indent: 50px;
            margin-bottom: 5;
            margin-top: 1;
            word-spacing: 1.5px;
            text-align: justify
        }

        .tab-dua {
            display: inline-block;
            margin-left: 100px;
            text-indent: 0px;
            margin-bottom: 0;
            text-align: justify;
            word-spacing: 1.5px;
            font-family: Arial;
        }

        .tab-tiga {
            display: inline-block;
            margin-left: 100px;
            text-indent: 0px;
            margin-top: 2;
            margin-bottom: 0;
            text-align: justify;
            word-spacing: 1.5px;
            font-family: Arial;
        }

        .tembusan {
            margin-top: 250px;
            float: left
        }

        input[type=text],
        select {
            width: auto;
            padding: 5px 5px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <form action="{{ route('simpan-surat', $data->id_application) }}" method="post">
        @csrf
        @method('PUT')
        <div class="rangkasurat">
            <table width="100%" class="header">
                <tr>
                    <td class="img-pemkot"><img src="{{ url('/assets/img/pemkot.png') }}" width="80px"
                            style="margin-inline-start: 20px;"alt="logo-pemkot">
                    </td>
                    <td class="tengah">
                        <h2>PEMERINTAH KOTA SEMARANG</h2>
                        <h2>DINAS KESEHATAN</h2>
                        <b>Jl. Pandanaran 79 Telp. (024) 8415269 - 8318771 Kode Pos : 50241 SEMARANG</b>
                    </td>
                </tr>
            </table>
            <hr>
            <table width="100%" border="0" class="tujuan">
                <tr>
                    <td>
                        <table border="0" width="400px">
                            <tr>
                                <td>
                                    Nomor
                                </td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    Lampiran
                                </td>
                                <td>:</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>
                                    Perihal
                                </td>
                                <td>:</td>
                                <td>Permohonan {{ $data->type->jenis_permohonan }}</td>
                            </tr>
                        </table>
                    </td>
                    <td class="detail-tujuan">
                        <table border="0"width="auto">
                            <tr height="20px">
                                <td>Semarang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr height="30px">
                                {{-- <td>Semarang</td> --}}
                            </tr>
                            <tr height="30px">
                                {{-- <td>Semarang</td> --}}
                            </tr>
                            <tr height="30px">
                                {{-- <td>Semarang</td> --}}
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table border="0">
                <tbody>
                    <tr>
                        <td></td>
                        <td>Kepada ;</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;vertical-align: middle;">Yth.</td>
                        @php
                            $kepada = json_decode($data->lokasi_tujuan, true);
                        @endphp
                        <td>
                            <table style="text-align: left;vertical-align: top;">
                                <tbody style="text-align: left;vertical-align: top;">
                                    <tr>
                                        <ol>
                                            @foreach ($kepada as $kpd)
                                                <li>
                                                    @if ($kpd == 'Dinas Kesehatan')
                                                        {{ 'Kepala ' . $kpd }}
                                                    @else
                                                        {{ 'Ka. ' . $kpd }}
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ol>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-indent: 20px;">di -</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-indent: 50px;"><u>SEMARANG</u></td>
                    </tr>
                </tbody>
            </table>
            <div class="isi-surat">
                <p class="tab-1" style="text-align: justify">Dasar surat dari
                    {{ $data->asal_surat }}, tanggal
                    {{ \Carbon\Carbon::create($data->tgl_surat)->translatedFormat('d F Y') }}, Nomor
                    {{ $data->no_surat }}
                    perihal tersebut pada pokok surat.
                </p>
                <p class="tab-2" style="text-align: justify">Sehubungan hal tersebut diatas, bersama ini kami hadapkan
                    mahasiswa atas nama :
                </p>
                @if ($data->addonapplicant_count > 1)
                    <table class="tab-1"border="1">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <table style="margin-left: 150px;text-align:justify;word-spacing:1px" border="0">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $data->user->name }}</td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>:</td>
                                <td>{{ $data->applicant->nim }}</td>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                                <td>{{ $data->judul_atau_data }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endif
                <p class="tab-dua">
                    Yang akan melaksanakan kegiatan {{ $data->type->jenis_permohonan }} di wilayah kerja Puskesmas
                    Saudara,
                    dilaksanakan pada {{ \Carbon\Carbon::create($data->tgl_awal)->translatedFormat('d F Y') }} s/d
                    {{ \Carbon\Carbon::create($data->tgl_akhir)->translatedFormat('d F Y') }} dengan catatan selama
                    melaksanakan kegiatan tersebut tetap harus mentaati peraturan dan protokol kesehatan yang berlaku di
                    Puskesmas dan Pemerintah Kota Semarang. <i>Segala biaya yang timbul sehubungan dengan pelayanan
                        penelitian didasarkan pada peraturan Walikota Semarang No.23 Tahun 2022 tentang tarif Pelayanan
                        Umum
                        Daerah Unit Pelaksana Teknis Dinas Pusat Kesehatan Masyarakat.</i>
                </p>
                <p class="tab-tiga">Demikian harap maklum, atas
                    perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
                <table style="margin-top:50px;float:right" border="0">
                    <tbody style="text-align: center">
                        <tr>
                            <td>a.n. KEPALA DINAS KESEHATAN</td>
                        </tr>
                        <tr>
                            <td>Ka. Bidang SDK</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="{{ url('assets/img/ttd-pak-edy.jpg') }}" alt="tanda tangan" width="200px"
                                    height="auto">
                            </td>
                        </tr>
                        <tr>
                            <td>dr. Noegroho Edy Rijanto, M.Kes</td>
                        </tr>
                    </tbody>
                </table>
                <table class="tembusan" border="0">
                    <tbody>
                        <tr style="text-align: justify">
                            <td>TEMBUSAN, Kepada Yth :</td>
                        </tr>
                        <tr style="text-align: left">
                            <td>
                                <ol>
                                    <li>
                                        Kepala Dinas Kesehatan (sebagai laporan);
                                    </li>
                                    <li>
                                        Rektor <input value="{{ $data->applicant->asal }}" type="text"
                                            width="100%" />;
                                    </li>
                                    <li> Yang Bersangkutan;

                                    </li>
                                    <li>
                                        Arsip
                                    </li>
                                </ol>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <button type="submit">Kirim ke CS</button>
            <button type="button">Kembali</button>
        </div>
    </form>

</body>

</html>
