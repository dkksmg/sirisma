@extends('layouts.app')
@push('addon-styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush
@section('content')
    <main id="hero-static" class="hero-static">
        <div class="container">
            <div class="section-header">
                <h2>Tambah Permohonan</h2>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-md-start">
                <div class="col-md-12">
                    <div class="container px-5 my-5">
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nama" type="text" placeholder="Nama"
                                            readonly disabled data-sb-validations="required" <?php if(isset(Auth::user()->name)):?>
                                            value="{{ Auth::user()->name }}" <?php else: ?> value=""
                                            <?php endif ?> />
                                        <label for="nama">Nama Pemohon</label>
                                        <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="jenjang">
                                            <option>- Pilih Permohonan -</option>
                                            <option>Penelitian</option>
                                            <option disabled>Magang</option>
                                        </select>
                                        <label for="jenjang">Jenis Permohonan</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" class="form-control">
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-white d-block">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                        <label for="nama">Waktu</label>
                                        <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <div class="input-group date" id="datepicker">
                                            <input class="form-control" id="nama" type="text"
                                                data-sb-validations="required" />
                                            <label for="nama">Nama Pemohon</label>
                                        </div>
                                        <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nama" type="text"
                                            placeholder="Judul Rencana Penelitian" data-sb-validations="required"
                                            value="" />
                                        <label for="nama">Judul Rencana Penelitian</label>
                                        <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="keperluan_pemohon" name="keperluan_pemohon" type="text" placeholder="Keperluan"
                                            style="height: 8rem" data-sb-validations="required"></textarea>
                                        <label for="keperluan_pemohon">Keperluan</label>
                                        <div class="invalid-feedback" data-sb-feedback="keperluan_pemohon:required">
                                            Keperluan is
                                            required.</div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating-mb 3">
                                        <label for="formFile" class="form-label">File Surat Permohonan</label>
                                        <input class="form-control" type="file" id="formFile" accept=".pdf">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating-mb 3">
                                        <label for="formFile" class="form-label">FIle Proposal</label>
                                        <input class="form-control" type="file" id="formFile" accept=".pdf">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-md-center" style="margin-top: 50px; margin-bottom:20px">
                                <button class="btn btn-primary btn-md" id="submitButton" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('addon-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(function() {
                $('#provinsi_ktp').on('change', function() {
                    let id_provinsi = $('#provinsi_ktp').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkotakab') }}",
                        data: {
                            id_provinsi: id_provinsi
                        },
                        cache: false,
                        success: function(msg) {
                            $('#kotakab_ktp').html(msg)
                            $('#kecamatan_ktp').html('')
                            $('#keldesa_ktp').html('')
                        },
                        error: function(data) {
                            console.log('error :', data);
                        },
                    })
                });
                $('#provinsi_domisili').on('change', function() {
                    let id_provinsi = $('#provinsi_domisili').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkotakab') }}",
                        data: {
                            id_provinsi: id_provinsi
                        },
                        cache: false,
                        success: function(msg) {
                            $('#kotakab_domisili').html(msg)
                            $('#kecamatan_domisili').html('')
                            $('#keldesa_domisili').html('')
                        },
                        error: function(data) {
                            console.log('error :', data);
                        },
                    })
                });
                $('#kotakab_ktp').on('change', function() {
                    let id_kotakab = $('#kotakab_ktp').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkecamatan') }}",
                        data: {
                            id_kotakab: id_kotakab
                        },
                        cache: false,
                        success: function(msg) {
                            $('#kecamatan_ktp').html(msg)
                            $('#keldesa_ktp').html('')
                        },
                        error: function(data) {
                            console.log('error :', data);
                        },
                    });

                });
                $('#kotakab_domisili').on('change', function() {
                    let id_kotakab = $('#kotakab_domisili').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkecamatan') }}",
                        data: {
                            id_kotakab: id_kotakab
                        },
                        cache: false,
                        success: function(msg) {

                            $('#kecamatan_domisili').html(msg)
                            $('#keldesa_domisili').html('')
                        },
                        error: function(data) {
                            console.log('error :', data);
                        },
                    })
                });
                $('#kecamatan_ktp').on('change', function() {
                    var id_kotakab = $('#kotakab_ktp').find(":selected").val();
                    var id_kecamatan = $('#kecamatan_ktp').find(":selected").val();
                    console.log(id_kotakab, id_kecamatan);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkeldesa') }}",
                        data: {
                            'id_kotakab': id_kotakab,
                            'id_kecamatan': id_kecamatan
                        },
                        cache: false,
                        success: function(msg) {
                            $('#keldesa_ktp').html(msg)
                        },
                        error: function(data) {
                            console.log('error :', data);
                        },
                    })
                });
                $('#kecamatan_domisili').on('change', function() {
                    var id_kotakab = $('#kotakab_domisili').find(":selected").val();
                    var id_kecamatan = $('#kecamatan_domisili').find(":selected").val();
                    console.log(id_kotakab, id_kecamatan);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkeldesa') }}",
                        data: {
                            'id_kotakab': id_kotakab,
                            'id_kecamatan': id_kecamatan
                        },
                        cache: false,
                        success: function(msg) {
                            $('#keldesa_domisili').html(msg)
                        },
                        error: function(data) {
                            console.log('error :', data);
                        },
                    })
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
@endpush
