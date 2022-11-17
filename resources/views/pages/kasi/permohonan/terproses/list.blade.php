@extends('layouts.backend')
@section('title', 'KASI')
@push('addon-styles')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ url('backend/css/styles.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> --}}
    <style>
        /* @import url("https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap"); */

        .time-status {
            font-size: 11px;
            font-family: "Courier New", Courier, monospace;
        }
    </style>
@endpush
@section('content')
    <div id="layoutSidenav_content">
        <main class="mb-5">
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="filter"></i></div>
                                    Permohonan Penelitian (Terproses)
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">Data Penelitian</div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Pemohon</th>
                                    <th>Nomor Surat</th>
                                    <th>Instansi</th>
                                    <th>Tgl Surat</th>
                                    <th>Kode Permohonan</th>
                                    <th>Tgl Permohonan</th>
                                    <th>Keperluan</th>
                                    <th>Status Terakhir</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Pemohon</th>
                                    <th>Nomor Surat</th>
                                    <th>Instansi</th>
                                    <th>Tgl Surat</th>
                                    <th>Kode Permohonan</th>
                                    <th>Tgl Permohonan</th>
                                    <th>Keperluan</th>
                                    <th>Status Terakhir</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($penelitianProses as $permohonan)
                                    <tr>
                                        <td>{{ $permohonan->name }}</td>
                                        <td>{{ $permohonan->no_surat }}</td>
                                        <td>{{ $permohonan->asal_surat }}</td>
                                        <td>{{ \Carbon\Carbon::create($permohonan->tgl_surat)->translatedFormat('d, F Y') }}
                                        </td>
                                        <td>{{ $permohonan->kode_permohonan }}</td>
                                        <td>{{ \Carbon\Carbon::create($permohonan->tanggal_permohonan)->translatedFormat('d, F Y') }}
                                        </td>
                                        <td>{{ $permohonan->keperluan }}</td>
                                        <td>
                                            @if ($permohonan->status_surat == 'proses')
                                                <div class="badge bg-info text-white rounded-pill">
                                                    {{ $permohonan->status_surat }}
                                                </div>
                                            @elseif ($permohonan->status_surat == 'tolak')
                                                <div class="badge bg-danger text-white rounded-pill">
                                                    {{ $permohonan->status_surat }}
                                                </div>
                                            @else
                                                <div class="badge bg-warning text-white rounded-pill">
                                                    {{ $permohonan->status_surat }}
                                                </div>
                                            @endif
                                            <br>
                                            <span class="time-status">
                                                {{ 'Oleh ' . $permohonan->role }}
                                                <br>
                                                {{ \Carbon\Carbon::create($permohonan->update_waktu)->translatedFormat('d-m-Y H:i:s') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card mb-4">
                    <div class="card-header">Surat</div>
                    <div class="card-body">
                        <table id="datatablesSimpleTwo">
                            <thead>
                                <tr>
                                    <th>Pemohon</th>
                                    <th>Nomor Surat</th>
                                    <th>Instansi</th>
                                    <th>Tgl Surat</th>
                                    <th>Nomor Agenda</th>
                                    <th>Tanggal Agenda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Pemohon</th>
                                    <th>Nomor Surat</th>
                                    <th>Instansi</th>
                                    <th>Tgl Surat</th>
                                    <th>Nomor Agenda</th>
                                    <th>Tanggal Agenda</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($penelitianProses as $permohonan)
                                    <tr>
                                        <td>{{ $permohonan->name }}</td>
                                        <td>{{ $permohonan->no_surat }}</td>
                                        <td>{{ $permohonan->asal_surat }}</td>
                                        <td>{{ \Carbon\Carbon::create($permohonan->tgl_surat)->translatedFormat('d F Y') }}
                                        </td>
                                        <td>
                                            @if (empty($permohonan->nomor_agenda))
                                                -
                                            @else
                                                {{ $permohonan->nomor_agenda }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (empty($permohonan->tgl_agenda))
                                                -
                                            @else
                                                {{ \Carbon\Carbon::create($permohonan->tgl_agenda)->translatedFormat('d F Y') }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $permohonan->id_application }}"
                                                title="Simpan"><i class="fa-solid fa-floppy-disk"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
        </main>
        @include('includes.cs.footer')
    </div>
    <!-- Agenda Modal -->
    {{-- @foreach ($penelitianProses as $agenda)
        <div class="modal fade" id="staticBackdrop{{ $agenda->id_application }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('penelitian-baru-kabid.update', $agenda->id_application) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Permohonan {{ $agenda->no_surat }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="default">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <!-- Component Preview-->
                                        <div class="sbp-preview">
                                            <div class="sbp-preview-content">
                                                <div class="mb-3">
                                                    <label for="status">Status</label>
                                                    <select class="form-control form-select" id="status"
                                                        name="status_surat">
                                                        <option value="">- Pilih -</option>
                                                        <option value="tolak"
                                                            {{ $agenda->status_surat == 'tolak' ? 'selected' : '' }}>
                                                            Tolak
                                                        </option>
                                                        <option value="proses"
                                                            {{ $agenda->status_surat == 'proses' ? 'selected' : '' }}>
                                                            Setujui
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="keterangan">Keterangan</label>
                                                    <textarea id="keterangan" placeholder="Keterangan" class="form-control keterangan" name="keterangan">
@if (empty($agenda->keterangan))
{{ trim(old('keterangan')) }}
@else
{{ trim($agenda->keterangan) }}
@endif
</textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach --}}
@endsection
@push('addon-script')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ url('backend/js/datatables/datatables-simple-demo.js') }}"></script>
    <script>
        var ds = document.getElementsByClassName('textarea')
        for (var i = 0; i < ds.length; i++) {
            (`${ds[i]}`).html().trim()
        }
    </script>
@endpush
