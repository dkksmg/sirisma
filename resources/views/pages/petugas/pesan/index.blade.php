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
                                    Pesan Masuk Pemohon
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">Data Pesan</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-152">
                                <table class="table table-striped border datatable" id="datatablesSimple">
                                    {{-- <table id="" class="table table-bordered"> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Subjek</th>
                                            <th>Detail Pesan</th>
                                            <th>Dikirim Pada</th>
                                            <th>Data Akun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('includes.cs.footer')
    </div>
@endsection
@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    {{-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ url('backend/js/datatables/datatables-simple-demo.js') }}"></script> --}}
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        var ds = document.getElementsByClassName('textarea')
        for (var i = 0; i < ds.length; i++) {
            (`${ds[i]}`).html().trim()
        }
    </script>
    <script type="text/javascript">
        $(function() {

            $('#datatablesSimple').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! url()->current() !!}",
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'nama_lengkap',
                    }, {
                        data: 'email',
                    },
                    {
                        data: 'subject_kontak',
                    }, {
                        data: 'pesan',
                    }, {
                        data: 'created_at',
                    },
                    {
                        data: 'akun',
                        name: 'akun',
                        orderable: true,
                        searchable: true
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endpush
