@extends('layouts.app')
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
                                            data-sb-validations="required" <?php if(isset(Auth::user()->name)):?>
                                            value="{{ Auth::user()->name }}" <?php else: ?> value=""
                                            <?php endif ?> />
                                        <label for="nama">Nama Lengkap</label>
                                        <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nik" type="text" placeholder="NIK"
                                            data-sb-validations="required" />
                                        <label for="nik">NIK</label>
                                        <div class="invalid-feedback" data-sb-feedback="nik:required">NIK is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nim" type="text" placeholder="NIM" />
                                        <label for="nim">NIM</label>
                                        {{-- <div class="invalid-feedback" data-sb-feedback="nik:required">NIK is required.</div> --}}
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" type="email" placeholder="Email"
                                            data-sb-validations="required" <?php if(isset(Auth::user()->name)):?>
                                            value="{{ Auth::user()->email }}" <?php else: ?> value=""
                                            <?php endif ?> disabled />
                                        <label for="email">Email</label>
                                        <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nik" type="number"
                                            placeholder="Nomor HP (Terhubung dengan Whatsapp)"
                                            data-sb-validations="required" />
                                        <label for="nik">Nomor HP (Terhubung dengan Whatsapp)</label>
                                        <div class="invalid-feedback" data-sb-feedback="nik:required">Nomor HP is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="jenjang">
                                            <option>- Pilih -</option>
                                            <option>D1</option>
                                            <option>D2</option>
                                            <option>D3</option>
                                            <option>S1/D4</option>
                                            <option>S2</option>
                                            <option>S3</option>
                                            <option>S4</option>
                                            <option>Institusi/Organisasi</option>
                                        </select>
                                        <label for="jenjang">Jenjang</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="status">
                                            <option>- Pilih -</option>
                                            <option>Mahasiswa</option>
                                            <option>Dosen</option>
                                            <option>Lain - lain</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" type="email"
                                            data-sb-validations="required"
                                            placeholder=">Sekolah/Universitas/Afiliasi/Kantor" />
                                        <label for="email">Sekolah/Universitas/Afiliasi/Kantor</label>
                                        <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nim" type="text"
                                            placeholder="Program Studi" />
                                        <label for="nim">Program Studi</label>
                                        <div class="invalid-feedback" data-sb-feedback="nik:required">Program Studi is
                                            required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nim" type="text" placeholder="Semester" />
                                        <label for="nim">Semester</label>
                                        <div class="invalid-feedback" data-sb-feedback="nik:required">Semester is
                                            required.</div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 8rem"
                                            data-sb-validations="required"></textarea>
                                        <label for="message">Alamat sesuai KTP</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">Message is
                                            required.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 8rem"
                                            data-sb-validations="required"></textarea>
                                        <label for="message">Alamat Domisili</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">Message is
                                            required.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="provinsi_ktp" name="provinsi_ktp">
                                            <option>- Pilih Provinsi -</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id_provinsi }}">{{ $province->nama_provinsi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="provinsi_ktp">Provinsi Sesuai KTP</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="kecamatan_ktp" name="kecamatan_ktp">

                                        </select>
                                        <label for="kecamatan_ktp">Kecamatan Sesuai KTP</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="kotakab_ktp" name="kotakab_ktp">

                                        </select>
                                        <label for="kotakab_ktp">Kota/Kab Sesuai KTP</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="keldesa_ktp" name="keldesa_ktp">

                                        </select>
                                        <label for="keldesa_ktp">Kelurahan/Desa Sesuai KTP</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="provinsi_domisili" name="provinsi_domisili">
                                            <option>- Pilih Provinsi -</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id_provinsi }}">{{ $province->nama_provinsi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="provinsi_domisili">Provinsi Domisili</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="kecamatan_domisili" name="kecamatan_domisili">

                                        </select>
                                        <label for="kecamatan_domisili">Kecamatan Domisili</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="kotakab_domisili" name="kotakab_domisili">

                                        </select>
                                        <label for="kotakab_domisili">Kota/Kab Domisili</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="keldesa_domisili" name="keldesa_domisili">

                                        </select>
                                        <label for="keldesa_domisili">Kelurahan/Desa Domisili</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating-mb 3">
                                        <label for="formFile" class="form-label">Foto KTP</label>
                                        <input class="form-control" type="file" id="formFile" accept="/*">
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
@endpush
