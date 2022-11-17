@extends('layouts.backend')
@section('title', 'CS')
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
                                    <th>Tgl Permohonan</th>
                                    <th>Nomor Agenda</th>
                                    <th>Tanggal Agenda</th>
                                    <th>Kode Permohonan</th>
                                    <th>Status Terakhir</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Pemohon</th>
                                    <th>Nomor Surat</th>
                                    <th>Instansi</th>
                                    <th>Tgl Surat</th>
                                    <th>Tgl Permohonan</th>
                                    <th>Nomor Agenda</th>
                                    <th>Tanggal Agenda</th>
                                    <th>Kode Permohonan</th>
                                    <th>Status Terakhir</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($penelitianProses as $permohonan)
                                    <tr>
                                        <td>{{ $permohonan->name }}</td>
                                        <td>{{ $permohonan->jenis_permohonan }}</td>
                                        <td>
                                            {{ $permohonan->asal_surat }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::create($permohonan->tgl_surat)->translatedFormat('d F Y') }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::create($permohonan->tanggal_permohonan)->translatedFormat('d F Y') }}
                                        </td>
                                        <td>{{ $permohonan->nomor_agenda }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::create($permohonan->tgl_agenda)->translatedFormat('d F Y') }}
                                        </td>
                                        <td>{{ $permohonan->kode_permohonan }}</td>
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
            </div>
        </main>
        @include('includes.cs.footer')
    </div>
    <!-- Agenda Modal -->
    {{-- @foreach ($penelitianProses as $agenda)
        <div class="modal fade" id="staticBackdrop{{ $agenda->id_application }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('penelitian-baru-cs.update', $agenda->id_application) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Disposisi Permohonan {{ $agenda->no_surat }}
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
                                                    <label for="agenda">Nomor Agenda</label>
                                                    <input type="text" id="agenda" placeholder="Nomor Agenda"
                                                        class="form-control" name="nomor_agenda"
                                                        @if (empty($agenda->nomor_agenda)) value="{{ old('nomor_agenda') }}"
                                                        @else
                                                        value="{{ $agenda->nomor_agenda }}" @endif />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tgl_agenda">Tanggal Agenda</label>
                                                    <input type="date"
                                                        class="form-control tanggal @error('tgl_agenda') is-invalid @enderror"
                                                        id="tgl_agenda" placeholder="Tanggal Agenda" name="tgl_agenda"
                                                        @if (empty($agenda->tgl_agenda)) value="{{ old('tgl_agenda') }}" @else
                                                    value="{{ $agenda->tgl_agenda }}" @endif />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="keterangan">Keterangan</label>
                                                    <textarea id="keterangan" placeholder="Keterangan" class="form-control" name="keterangan">
                                                        @if (empty($agenda->keterangan))
{{ old('keterangan') }}
@endif
                                                            </textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status">Disposisikan Ke</label>
                                                    <select class="form-control form-select" id="status"
                                                        name="status_surat">
                                                        <option value="">- Pilih -</option>
                                                        <option value="draft"
                                                            {{ $agenda->status_surat == 'draft' ? 'selected' : '' }}>Draft
                                                        </option>
                                                        <option value="proses"
                                                            {{ $agenda->status_surat == 'proses' ? 'selected' : '' }}>SDK
                                                        </option>
                                                    </select>
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
@endpush
