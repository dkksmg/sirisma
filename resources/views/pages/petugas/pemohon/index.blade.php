@extends('layouts.pemohon')
@section('title', 'Profil Pemohon')
@section('content')
    <div id="layoutSidenav_content">
        <main class="mb-5">
            <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                <div class="container-xl px-4">
                    <div class="page-header-content">
                        <div class="row align-items-center justify-content-between pt-3">
                            <div class="col-auto mb-3">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="user"></i></div>
                                    Profil Pemohon
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-4">
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Foto Profil</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile img-thumbnail mb-2"
                                    src="{{ Storage::url($data->user->foto_profile) }}"
                                    onerror="this.onerror=null; this.src='{{ url('backend/assets/img/illustrations/profiles/profile-2.png') }}'"
                                    alt="Profil Image" />
                            </div>
                        </div>
                        <div class="card mt-3 mb-xl-0">
                            <div class="card-header">File KTP</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-fluid img-thumbnail rounded mx-auto d-block" width="50%" height="50%"
                                    src="{{ Storage::url($data->file_ktp) }}"
                                    onerror="this.onerror=null; this.src='{{ url('assets/img/no-photo.png') }}'"
                                    alt=" KTP" />
                            </div>
                        </div>
                        <div class="card mt-3 mb-xl-0">
                            <div class="card-header">File KTM</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-fluid img-thumbnail rounded mx-auto d-block" width="50%" height="50%"
                                    src="{{ Storage::url($data->file_ktm) }}"
                                    onerror="this.onerror=null; this.src='{{ url('assets/img/no-photo.png') }}'"
                                    alt=" KTP" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4 mt-3">
                            <div class="card-header">Detail Akun</div>
                            <div class="card-body">
                                <div class="row gx-3 mb-2">
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1"><strong>Nama Lengkap</strong></label>
                                        <p class=" mb-0">{{ $data->user->name }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1"><strong>Email</strong></label>
                                        <p class=" mb-0">{{ $data->user->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row gx-3 mb-2">
                                    <div class="col-md-4">
                                        <label for="exampleFormControlInput1"><strong>NIK</strong></label>
                                        <p class=" mb-0">
                                            @if (isset($data->nik))
                                                {{ $data->nik }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleFormControlInput1"><strong>NIP/NIM</strong></label>
                                        <p class=" mb-0">
                                            @if (isset($data->nim))
                                                {{ $data->nim }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleFormControlInput1"><strong>No HP</strong></label>
                                        <p class=" mb-0">
                                            @if (isset($data->no_hp))
                                                {{ $data->no_hp }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row gx-3 mb-2">
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1"><strong>Alamat KTP</strong></label>
                                        <p class=" mb-0">
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
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1"><strong>Alamat Domisili</strong></label>
                                        <p class=" mb-0">
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
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
