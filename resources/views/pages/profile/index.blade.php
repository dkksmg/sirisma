@extends('layouts.app')
@section('content')
    <main id="hero-static" class="hero-static">
        <section style="background-color: #eee;">
            <div class="container">
                <div class="section-header">
                    <h2>Data Anda</h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                    alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{ Auth::user()->name }}</h5>
                                <p class="text-muted mb-1">{{ $data->status }}</p>
                                <p class="text-muted mb-4">{{ $data->asal }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-danger">Ubah Password</button>
                                    <button type="button" class="btn btn-outline-warning ms-1" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Perbarui Data Diri</button>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fas fa-globe fa-lg text-warning"></i>
                                        <p class="mb-0">https://mdbootstrap.com</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                        <p class="mb-0">@mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nama Lengkap</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $data->user->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">NIK</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $data->nik }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">NIP/NIM</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $data->nim }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $data->user->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">No HP</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $data->no_hp }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Alamat Sesuai KTP</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            {{ $data->alamat_ktp }}, Kelurahan/Desa
                                            {{ $data->village_ktp->nama_kelurahan }}
                                            Kecamatan {{ $data->sub_district_ktp->nama_kecamatan }},
                                            {{ $data->district_ktp->nama_kota }}
                                            Provinsi
                                            {{ $data->province_ktp->nama_provinsi }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Alamat Domisili</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            {{ $data->alamat_domisili }}, Kelurahan/Desa
                                            {{ $data->village_domisili->nama_kelurahan }}
                                            Kecamatan {{ $data->sub_district_domisili->nama_kecamatan }},
                                            {{ $data->district_domisili->nama_kota }}
                                            Provinsi
                                            {{ $data->province_domisili->nama_provinsi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span>
                                            Project Status
                                        </p>
                                        <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 72%"
                                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 89%"
                                                aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 55%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                        <div class="progress rounded mb-2" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 66%"
                                                aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span>
                                            Project Status
                                        </p>
                                        <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 72%"
                                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 89%"
                                                aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 55%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                        <div class="progress rounded mb-2" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 66%"
                                                aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perbarui Data Diri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="contactForm" method="POST" action="{{ route('profile') }}">
                        <div class="modal-body">
                            <div class="container">
                                <div class="row justify-content-md-start">
                                    <div class="col-md-12">
                                        <div class="container px-5 my-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="nama" type="text"
                                                            placeholder="Nama" data-sb-validations="required"
                                                            <?php if(isset(Auth::user()->name)):?> value="{{ Auth::user()->name }}"
                                                            <?php else: ?> value="" <?php endif ?> />
                                                        <label for="nama">Nama Lengkap</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nama:required">
                                                            Nama is required.
                                                        </div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="nik" type="text"
                                                            placeholder="NIK" data-sb-validations="required" />
                                                        <label for="nik">NIK</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nik:required">NIK
                                                            is required.</div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="nim" type="text"
                                                            placeholder="NIM" />
                                                        <label for="nim">NIM</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nik:required">NIK
                                                            is required.</div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="email" type="email"
                                                            placeholder="Email" data-sb-validations="required"
                                                            <?php if(isset(Auth::user()->name)):?> value="{{ Auth::user()->email }}"
                                                            <?php else: ?> value="" <?php endif ?>
                                                            disabled />
                                                        <label for="email">Email</label>
                                                        <div class="invalid-feedback" data-sb-feedback="email:required">
                                                            Email is required.
                                                        </div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="nik" type="number"
                                                            placeholder="Nomor HP (Terhubung dengan Whatsapp)"
                                                            data-sb-validations="required" />
                                                        <label for="nik">Nomor HP (Terhubung dengan Whatsapp)</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nik:required">
                                                            Nomor HP is required.
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
                                                        <div class="invalid-feedback" data-sb-feedback="email:required">
                                                            Email is required.
                                                        </div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="nim" type="text"
                                                            placeholder="Program Studi" />
                                                        <label for="nim">Program Studi</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nik:required">
                                                            Program Studi is
                                                            required.</div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="nim" type="text"
                                                            placeholder="Semester" />
                                                        <label for="nim">Semester</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nik:required">
                                                            Semester is
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
                                                        <div class="invalid-feedback" data-sb-feedback="message:required">
                                                            Message is
                                                            required.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 8rem"
                                                            data-sb-validations="required"></textarea>
                                                        <label for="message">Alamat Domisili</label>
                                                        <div class="invalid-feedback" data-sb-feedback="message:required">
                                                            Message is
                                                            required.</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="provinsi_ktp"
                                                            name="provinsi_ktp">
                                                            <option>- Pilih Provinsi -</option>
                                                            @foreach ($provinces as $province)
                                                                <option value="{{ $province->id_provinsi }}">
                                                                    {{ $province->nama_provinsi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="provinsi_ktp">Provinsi Sesuai KTP</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="kecamatan_ktp"
                                                            name="kecamatan_ktp">

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
                                                        <select class="form-select" id="provinsi_domisili"
                                                            name="provinsi_domisili">
                                                            <option>- Pilih Provinsi -</option>
                                                            @foreach ($provinces as $province)
                                                                <option value="{{ $province->id_provinsi }}">
                                                                    {{ $province->nama_provinsi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="provinsi_domisili">Provinsi Domisili</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="kecamatan_domisili"
                                                            name="kecamatan_domisili">

                                                        </select>
                                                        <label for="kecamatan_domisili">Kecamatan Domisili</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="kotakab_domisili"
                                                            name="kotakab_domisili">

                                                        </select>
                                                        <label for="kotakab_domisili">Kota/Kab Domisili</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="keldesa_domisili"
                                                            name="keldesa_domisili">

                                                        </select>
                                                        <label for="keldesa_domisili">Kelurahan/Desa Domisili</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating-mb 3">
                                                        <label for="formFile" class="form-label">Foto KTP</label>
                                                        <input class="form-control" type="file" id="formFile"
                                                            accept="/*">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="mt-6 text-md-center" style="margin-top: 50px; margin-bottom:20px">
                                                <button class="btn btn-primary btn-md" id="submitButton"
                                                    type="submit">Submit</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
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
