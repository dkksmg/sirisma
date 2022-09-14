@extends('layouts.backend')
@section('title', 'CS')
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
                                    <div class="page-header-icon"><i data-feather="filter"></i></div>
                                    Permohonan Penelitian Baru
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">List Data</div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Pemohon</th>
                                    <th>Nomor Surat</th>
                                    <th>Asal Surat</th>
                                    <th>Tgl Surat</th>
                                    <th>Kode Permohonan</th>
                                    <th>Tgl Permohonan</th>
                                    <th>Keperluan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Pemohon</th>
                                    <th>Nomor Surat</th>
                                    <th>Asal Surat</th>
                                    <th>Tgl Surat</th>
                                    <th>Kode Permohonan</th>
                                    <th>Tgl Permohonan</th>
                                    <th>Keperluan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Rakha Dewangga</td>
                                    <td>B/XXI/12/2022/IV</td>
                                    <td>Fakultas Ilmu Komputer UDINUS</td>
                                    <td>{{ \Carbon\Carbon::now()->translatedFormat('d, F Y') }}</td>
                                    <td>3374/2022913/10002</td>
                                    <td>{{ \Carbon\Carbon::yesterday()->translatedFormat('d, F Y') }}</td>
                                    <td>Permohonan Penelitian/Pengambilan data di Puskesmas Kedungmundu</td>
                                    <td>
                                        <div class="badge bg-warning text-white rounded-pill">Kirim</div>
                                        <br>
                                        {{ \Carbon\Carbon::now()->translatedFormat('d-m-Y H:i:s') }}
                                    </td>
                                    <td>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i
                                                data-feather="more-vertical"></i></button>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark"><i
                                                data-feather="trash-2"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rajid Bahama Putra</td>
                                    <td>B/XXI/12/2022/IV</td>
                                    <td>Undip</td>
                                    <td>{{ \Carbon\Carbon::now()->translatedFormat('d, F Y') }}</td>
                                    <td>3374/2022913/10002</td>
                                    <td>{{ \Carbon\Carbon::yesterday()->translatedFormat('d, F Y') }}</td>
                                    <td>Permohonan Penelitian/Pengambilan data di Puskesmas Kedungmundu</td>
                                    <td>
                                        <div class="badge bg-warning text-white rounded-pill">Kirim</div>
                                        <br>
                                        {{ \Carbon\Carbon::now()->translatedFormat('d-m-Y H:i:s') }}
                                    </td>
                                    <td>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i
                                                data-feather="more-vertical"></i></button>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark"><i
                                                data-feather="trash-2"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        @include('includes.cs.footer')
    </div>
@endsection
@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ url('backend/js/datatables/datatables-simple-demo.js') }}"></script>
@endpush
