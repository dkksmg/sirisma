@extends('layouts.backend')
@section('title', 'Preview Permohonan | KASI')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                    Permohonan {{ $data->type->jenis_permohonan }}<br />{{ $data->kode_permohonan }}
                                </h1>
                                {{-- <div class="page-header-subtitle">Dynamic form components to give your users informative and
                                intuitive inputs</div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- Default Bootstrap Form Controls-->
                        <div id="default">
                            <div class="card mb-4">
                                <div class="card-header">Data Pemohon</div>
                                <div class="card-body">
                                    <!-- Component Preview-->
                                    <div class="sbp-preview">
                                        <div class="sbp-preview-content">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-justify">Nama</th>
                                                            <th class="text-justify">NIM</th>
                                                            <th class="text-justify">NIK</th>
                                                            <th class="text-justify">Nomor HP</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data->addonapplicant as $pemohon)
                                                            <tr>
                                                                <td class="text-justify">
                                                                    <p>{{ $pemohon->nama_pemohon }}</p>
                                                                </td>
                                                                <td class="text-justify">
                                                                    <p>{{ $pemohon->nim_pemohon }}</p>
                                                                </td>
                                                                <td class="text-justify">
                                                                    <p>{{ $pemohon->nik }}</p>
                                                                </td>
                                                                <td class="text-justify">
                                                                    <p>{{ $pemohon->no_hp }}</p>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">Data Permohonan</div>
                                <div class="card-body">
                                    <!-- Component Preview-->
                                    <div class="sbp-preview">
                                        <div class="sbp-preview-content">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"><strong>Nomor
                                                                    Agenda</strong></label>
                                                            <p>{{ $data->nomor_agenda }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"><strong>Tanggal
                                                                    Agenda</strong></label>
                                                            <p>{{ \Carbon\Carbon::create($data->tgl_agenda)->translatedFormat('d F Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"><strong>Tanggal Pengajuan
                                                                    Permohonan</strong></label>
                                                            <p>{{ \Carbon\Carbon::create($data->tanggal_permohonan)->translatedFormat('d F Y, H:i:s') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"><strong>Nomor
                                                                    Surat</strong></label>
                                                            <p>{{ $data->no_surat }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"><strong>Asal
                                                                    Surat</strong></label>
                                                            <p>{{ $data->asal_surat }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"><strong>Tanggal
                                                                    Surat</strong></label>
                                                            <p>{{ \Carbon\Carbon::create($data->tgl_surat)->translatedFormat('d F Y') }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"><strong>Lokasi
                                                                    Penelitian</strong></label>
                                                            <p>{{ preg_replace('/[^a-zA-Z-,]/', ' ', $data->lokasi_tujuan) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label
                                                                for="exampleFormControlInput1"><strong>Keperluan</strong></label>
                                                            <p>{{ $data->keperluan }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"><strong>Rencana Judul
                                                                    Penelitian/Jenis Data</strong></label>
                                                            <p>{{ $data->judul_atau_data }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleFormControlInput1"><strong>Tanggal
                                                                Penelitian</strong></label>
                                                        <p>{{ \Carbon\Carbon::create($data->tgl_awal)->translatedFormat('d F Y') . ' s/d ' . \Carbon\Carbon::create($data->tgl_akhir)->translatedFormat('d F Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 d-flex mx-3 -ml-3 justify-content-end">
                                                        <div class="mb-3">
                                                            <div class="card" style="width: auto">
                                                                <div class="card-body">
                                                                    <label class="card-title"><strong>Data
                                                                            Pelengkap</strong></label>
                                                                    <div class="card-text">
                                                                        <div class="table-responsive">
                                                                            <table class="">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>
                                                                                            <button
                                                                                                class="btn btn-sm btn-warning"
                                                                                                onClick="window.open('{{ Storage::url($data->file_surat_pemohon) }}','_blank', 'location=yes,height=800,width=700,scrollbars=yes,status=yes');">
                                                                                                Surat
                                                                                            </button>
                                                                                        </th>
                                                                                        <th>
                                                                                            <button
                                                                                                class="btn btn-sm btn-warning"
                                                                                                onClick="window.open('{{ Storage::url($data->file_proposal_pemohon) }}','_blank', 'location=yes,height=800,width=700,scrollbars=yes,status=yes');">
                                                                                                Proposal</button>
                                                                                        </th>
                                                                                        <th>
                                                                                            <button
                                                                                                class="btn btn-sm btn-warning"
                                                                                                onClick="window.open('{{ route('kasi.profile-pemohon', Crypt::encrypt($data->id_application)) }}','_blank', 'location=yes,height=800,width=700,scrollbars=yes,status=yes');">
                                                                                                Pemohon</button>
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 d-flex justify-content-center">
                                                        <div class="mb-3">
                                                            <a href="{{ route('kasi.penelitian-baru') }}"
                                                                class="btn btn-md btn-secondary">Kembali</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
@endsection
