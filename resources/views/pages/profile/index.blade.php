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
                                <label for="fileField">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                        alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                </label>
                                <input type="file" id="fileField" name="file-img" accept=".png, .jpg, .jpeg"
                                    hidden="true">
                                <h5 class="my-3">{{ Auth::user()->name }}</h5>
                                <p class="text-muted mb-1">
                                    @if (isset($data->status) && isset($data->jenjang) && isset($data->program_studi))
                                        {{ $data->status }},
                                        {{ $data->jenjang }}{{ $data->program_studi }}
                                    @else
                                        -
                                    @endif
                                </p>
                                <p class="text-muted mb-4">
                                    @if (isset($data->asal))
                                        {{ $data->asal }}
                                    @else
                                        -
                                    @endif
                                </p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="{{ route('password.request') }}" class="btn btn-danger">Ubah Password</a>
                                    <button type="button" class="btn btn-outline-warning ms-1" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Perbarui Data Diri</button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                        {{-- <p class="mb-0">Foto KTP</p> --}}
                                        <img src="{{ url('assets/img/ktp/ktp.png') }}" alt="foto-ktp"
                                            class="img-fluid img-thumbnail rounded mx-auto d-block" width="50%"
                                            height="50%" data-bs-toggle="modal" data-bs-target="#imgKTP">
                                        {{-- <i class="fas fa-globe fa-lg text-warning"></i> --}}
                                        {{-- <a href="{{ route('permohonan.tambah') }}"
                                    class="mb-0 btn btn-sm btn-success ">Tambah
                                    Permohonan</a> --}}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                        {{-- <i class="fab fa-github fa-lg" style="color: #333333;"></i> --}}
                                        {{-- <a href="" class="mb-0 btn btn-sm btn-warning">Riwayat Permohonan</a> --}}
                                        <img src="{{ url('assets/img/ktm/ktm.jpg') }}" alt="foto-ktm"
                                            class="img-fluid img-thumbnail rounded mx-auto d-block" width="50%"
                                            height="50%" data-bs-toggle="modal" data-bs-target="#imgKTM" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nama Lengkap</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">NIK</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            @if (isset($data->nik))
                                                {{ $data->nik }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">NIP/NIM</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            @if (isset($data->nim))
                                                {{ $data->nim }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">No HP</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            @if (isset($data->no_hp))
                                                {{ $data->no_hp }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Alamat Sesuai KTP</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            @if (isset($data->alamat_ktp) &&
                                                isset($data->village_ktp->nama_kelurahan) &&
                                                isset($data->sub_district_ktp->nama_kecamatan) &&
                                                isset($data->district_ktp->nama_kota) &&
                                                isset($data->province_ktp->nama_provinsi))
                                                {{ $data->alamat_ktp }}, Kelurahan/Desa
                                                {{ $data->village_ktp->nama_kelurahan }}
                                                Kecamatan {{ $data->sub_district_ktp->nama_kecamatan }},
                                                {{ $data->district_ktp->nama_kota }}
                                                Provinsi
                                                {{ $data->province_ktp->nama_provinsi }}
                                            @else
                                                -
                                            @endif
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
                                            @if (isset($data->alamat_domisili) &&
                                                isset($data->village_domisili->nama_kelurahan) &&
                                                isset($data->sub_district_domisili->nama_kecamatan) &&
                                                isset($data->district_domisili->nama_kota) &&
                                                isset($data->province_domisili->nama_provinsi))
                                                {{ $data->alamat_domisili }}, Kelurahan/Desa
                                                {{ $data->village_domisili->nama_kelurahan }}
                                                Kecamatan {{ $data->sub_district_domisili->nama_kecamatan }},
                                                {{ $data->district_domisili->nama_kota }}
                                                Provinsi
                                                {{ $data->province_domisili->nama_provinsi }}
                                            @else
                                                -
                                            @endif
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
                    <div class="modal-body">
                        <form id="contactForm" method="POST" action="{{ route('profile') }}">
                            <div class="container">
                                <div class="row justify-content-md-start">
                                    <div class="col-md-12">
                                        <div class="container px-5 my-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="nama" type="text"
                                                            placeholder="Nama" data-sb-validations="required"
                                                            @if (isset(Auth::user()->name)) value="{{ Auth::user()->name }}"
                                                    @else
                                                    value="" @endif
                                                            name="nama_lengkap_pemohon" />
                                                        <label for="nama">Nama Lengkap</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nama:required">
                                                            Nama is required.
                                                        </div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="email" type="email"
                                                            placeholder="Email" data-sb-validations="required"
                                                            @if (isset(Auth::user()->email)) value="{{ Auth::user()->email }}"
                                                    @else
                                                    value="" @endif
                                                            disabled />
                                                        <label for="email">Email</label>
                                                        <div class="invalid-feedback" data-sb-feedback="email:required">
                                                            Email is required.
                                                        </div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="nik_pemohon" type="text"
                                                            placeholder="NIK" data-sb-validations="required"
                                                            @if (isset($data->nik)) value="{{ $data->nik }}"
                                                    @else
                                                    value="" @endif
                                                            name="nik_pemohon" />
                                                        <label for="nik">NIK</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nik:required">NIK
                                                            is required.</div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="nim" type="text"
                                                            placeholder="NIP/NIM"
                                                            @if (isset($data->nim)) value="{{ $data->nim }}"
                                                    @else
                                                    value="" @endif
                                                            name="nim_pemohon" />
                                                        <label for="nim">NIP/NIM</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nim:required">NIM
                                                            is required.</div>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="nik" type="number"
                                                            placeholder="Nomor HP (Terhubung dengan Whatsapp)"
                                                            data-sb-validations="required"
                                                            @if (isset($data->no_hp)) value="{{ $data->no_hp }}"
                                                    @else
                                                    value="" @endif
                                                            name="nohp_pemohon" />
                                                        <label for="nik">Nomor HP (Terhubung dengan Whatsapp)</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nik:required">
                                                            Nomor HP is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="jenjang"
                                                            name="jenjang_pemohon">
                                                            <option>- Pilih Jenjang Pendidikan -</option>
                                                            @foreach ($educations as $education)
                                                                @if (isset($data->jenjang))
                                                                    <option value="{{ $education->level_pendidikan }}"
                                                                        {{ $education->level_pendidikan == $data->jenjang ? 'selected' : '' }}>
                                                                        {{ $education->level_pendidikan }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $education->level_pendidikan }}">
                                                                        {{ $education->level_pendidikan }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <label for="jenjang">Jenjang Pendidikan</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="status" name="status_pemohon">
                                                            <option>- Pilih Status -</option>
                                                            @foreach ($statuses as $status)
                                                                @if (isset($data->status))
                                                                    <option value="{{ $status->status_pemohon }}"
                                                                        {{ $status->status_pemohon == $data->status ? 'selected' : '' }}>
                                                                        {{ $status->status_pemohon }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $status->status_pemohon }}">
                                                                        {{ $status->status_pemohon }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <label for="status">Status</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="asal" type="text"
                                                            data-sb-validations="required"
                                                            placeholder="Sekolah/Universitas/Afiliasi/Kantor"
                                                            @if (isset($data->asal)) value="{{ $data->asal }}"
                                                    @else
                                                    value="" @endif
                                                            name="asal_pemohon" />
                                                        <label for="asal">Sekolah/Universitas/Afiliasi/Kantor</label>
                                                        <div class="invalid-feedback" data-sb-feedback="asal:required">
                                                            Asal is required.
                                                        </div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="progdi" type="text"
                                                            placeholder="Program Studi"
                                                            @if (isset($data->program_studi)) value="{{ $data->program_studi }}"
                                                    @else
                                                    value="" @endif
                                                            name="progdi_pemohon" />
                                                        <label for="progdi">Program Studi</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nik:required">
                                                            Program Studi is
                                                            required.</div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="semester" type="number"
                                                            placeholder="Semester" {{-- @if (isset($data->semester)) value="{{ $data->semester }}"
                                                    @else
                                                    value="" @endif --}}
                                                            name="semester_pemohon" />
                                                        <label for="semester">Semester</label>
                                                        <div class="invalid-feedback" data-sb-feedback="nik:required">
                                                            Semester is
                                                            required.</div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="alamat_ktp" placeholder="Alamat KTP" name="alamat_ktp">
                                                            @if (!empty($data->alamat_ktp))
{{ $data->alamat_ktp }}
@endif
                                                        </textarea>
                                                        <label for="alamat_ktp">Alamat KTP</label>
                                                        <div class="invalid-feedback"
                                                            data-sb-feedback="alamat_ktp:required">
                                                            Alamat KTP is
                                                            required.</div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="alamat_domisili" placeholder="Alamat Domisili" name="alamat_domisili">
                                                            @if (!empty($data->alamat_domisili))
{{ $data->alamat_domisili }}
@endif
                                                        </textarea>
                                                        <label for="alamat_domisili">Alamat Domisili</label>
                                                        <div class="invalid-feedback"
                                                            data-sb-feedback="alamat_domisili:required">
                                                            Alamat Domisili is
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
                                                                {{-- @if (isset($data->provinsi_ktp))
                                                                    <option value="{{ $province->id_provinsi }}"
                                                                        {{ $province->id_provinsi == $data->provinsi_ktp ? 'selected' : '' }}>
                                                                        {{ $province->nama_provinsi }}
                                                                    </option>
                                                                @else --}}
                                                                <option value="{{ $province->id_provinsi }}">
                                                                    {{ $province->nama_provinsi }}
                                                                </option>
                                                                {{-- @endif --}}
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
                                                                @if (isset($data->provinsi_domisili))
                                                                    <option value="{{ $province->id_provinsi }}"
                                                                        {{ $province->id_provinsi == $data->provinsi_domisili ? 'selected' : '' }}>
                                                                        {{ $province->nama_provinsi }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $province->id_provinsi }}">
                                                                        {{ $province->nama_provinsi }}
                                                                    </option>
                                                                @endif
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
                                                <div class="col-md-6">
                                                    <div class="form-floating-mb 3">
                                                        <label for="formFile" class="form-label">Foto KTM/ Kartu
                                                            Pelajar</label>
                                                        <input class="form-control" type="file" id="formFile"
                                                            accept="/*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-5">
                                                    <img src="{{ url('assets/img/ktp/ktp.png') }}" alt="foto-ktm"
                                                        class="img-fluid img-thumbnail rounded mx-auto d-block"
                                                        width="75%" height="75%" />
                                                </div>
                                                <div class="col-md-6 mt-5">
                                                    <img src="{{ url('assets/img/ktm/ktm.jpg') }}" alt="foto-ktm"
                                                        class="img-fluid img-thumbnail rounded mx-auto d-block"
                                                        width="75%" height="75%" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="imgKTP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto KTP</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ url('assets/img/ktp/ktp.png') }}" alt="foto-ktp"
                            class="img-fluid img-thumbnail rounded mx-auto d-block" width="auto" height="auto">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> <!-- Modal -->
        <div class="modal fade" id="imgKTM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto KTM/Kartu Pelajar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ url('assets/img/ktm/ktm.jpg') }}" alt="foto-ktm"
                            class="img-fluid img-thumbnail rounded mx-auto d-block" width="auto" height="auto">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('addon-script')
    @if (empty($data->id_user))
        @include('pages.profile.js-new')
    @else
        @include('pages.profile.js-edit')
    @endif
@endpush
