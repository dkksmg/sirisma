@extends('layouts.backend')
@section('title', 'PETUGAS')
@push('addon-styles')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ url('backend/css/styles.css') }}" rel="stylesheet" />
@endpush
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
                                                                                                onClick="window.open('{{ route('petugas.profile-pemohon', $data->id_application) }}','_blank', 'location=yes,height=800,width=700,scrollbars=yes,status=yes');">
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
                                                            <a href="{{ route('penelitian-baru-petugas.index') }}"
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
                    <!-- Sticky Navigation-->
                    <div class="col-lg-3">
                        <div class="nav-sticky">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav flex-column" id="stickyNav">
                                        <div class="card-mb-3">
                                            {{-- <div class="card-header">Cek Data Permohonan</div> --}}
                                            {{-- @php
                                                dd($cekpenelitian);
                                            @endphp --}}
                                            @if (empty($cekpenelitian->status_surat) or $cekpenelitian->role != 'PETUGAS')
                                                <div class="card-body">
                                                    <div class="sbp-preview">
                                                        <div class="sbp-preview-content">
                                                            <form
                                                                action="{{ route('penelitian-baru-petugas.update', $data->id_application) }}"
                                                                class="" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-md-auto">
                                                                        <div class="mb-3">
                                                                            <span>Data Permohonan sudah sesuai dan lengkap
                                                                                ?</span>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="status_surat"
                                                                                    id="status_surat" value="sesuai"
                                                                                    {{ old('status_surat') == 'sesuai' ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="status_surat">
                                                                                    Sesuai
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="status_surat"
                                                                                    id="status_surat" value="tolak"
                                                                                    {{ old('status_surat') == 'tolak' ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="status_surat">
                                                                                    Belum
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-auto mb-3">
                                                                        <span>Jika data <strong>belum</strong> lengkap atau
                                                                            sesuai,
                                                                            isi form keterangan</span>
                                                                        <div class="mt-1"><label
                                                                                for="exampleFormControlTextarea1"></label>
                                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Keterangan"
                                                                                name="keterangan"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="text-center">
                                                                        <div class="col-md-auto ">
                                                                            <button type="submit"
                                                                                class="btn btn-md btn-warning">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="card-body">
                                                    <div class="sbp-preview">
                                                        <div class="sbp-preview-content">
                                                            <div class="form-group text-center">
                                                                <div class="col-md-12">
                                                                    <label>Generate Permohonan</label>
                                                                    <a href="{{ route('generate-penelitian', $data->id_application) }}"
                                                                        class="btn btn-danger mt-2" target="_blank"><i
                                                                            class="fa-solid fa-file-pdf"></i></a>
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <label>Perbaiki Data Permohonan</label>
                                                                    <a href="{{ route('generate-penelitian', $data->id_application) }}"
                                                                        class="btn btn-warning mt-2" target="_blank"><i
                                                                            class="fa-solid fa-pencil"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
@push('addon-script')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ url('backend/js/datatables/datatables-simple-demo.js') }}"></script>
@endpush
