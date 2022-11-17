@extends('layouts.app')
@section('content')
    <main id="hero-static" class="hero-static">
        <section>
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
                                    <img @if (empty($data->user->foto_profile)) src="{{ url('assets/img/man.png') }}"
                @else src="{{ Storage::url($data->user->foto_profile) }}" @endif
                                        alt="avatar" class="rounded-circle img-fluid" width="100px" height="100px"
                                        data-bs-toggle="modal" data-bs-target="#fotoModal"
                                        onerror="this.onerror=null; this.src='{{ url('assets/img/man.png') }}'">
                                </label>
                                {{-- <input type="file" id="fileField" name="file-img" accept=".png, .jpg, .jpeg"
                                    hidden="true"> --}}
                                <h5 class="my-3">{{ Auth::user()->name }}
                                </h5>
                                <p class="text-muted mb-1">
                                    @if (isset($data->status) && isset($data->jenjang) && isset($data->program_studi))
                                        {{ $data->status }},
                                        {{ $data->jenjang . ' ' . $data->program_studi }}
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
                                    <a @if (empty($data->id_user)) href="{{ route('profile.create') }}" @else href="{{ route('profile.edit', $data->id_applicant) }}" @endif
                                        class="btn btn-outline-warning ms-1">Perbarui
                                        Data Diri</a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                        <p>Foto KTP</p>
                                        <img src="{{ Storage::url($data->file_ktp) }}" alt="foto-ktp"
                                            class="img-fluid img-thumbnail rounded mx-auto d-block" width="50%"
                                            height="50%" data-bs-toggle="modal" data-bs-target="#imgKTP"
                                            onerror="this.onerror=null; this.src='{{ url('assets/img/no-photo.png') }}'">
                                    </li>
                                    <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                        <p>Foto KTM</p>
                                        <img src="{{ Storage::url($data->file_ktm) }}" alt="foto-ktm"
                                            class="img-fluid img-thumbnail rounded mx-auto d-block" width="50%"
                                            height="50%" data-bs-toggle="modal" data-bs-target="#imgKTM"
                                            onerror="this.onerror=null; this.src='{{ url('assets/img/no-photo.png') }}'" />
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
        <div class="modal fade" id="imgKTP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto KTP</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ Storage::url($data->file_ktp) }}" alt="foto-ktp"
                            class="img-fluid img-thumbnail rounded mx-auto d-block" width="auto" height="auto"
                            onerror="this.onerror=null; this.src='{{ url('assets/img/no-photo.png') }}'">
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
                        <h5 class="modal-title" id="exampleModalLabel">Foto KTM</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ Storage::url($data->file_ktm) }}" alt="foto-ktm"
                            class="img-fluid img-thumbnail rounded mx-auto d-block" width="auto" height="auto"
                            onerror="this.onerror=null; this.src='{{ url('assets/img/no-photo.png') }}'">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('imageprofile', Auth::user()->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <img @if (empty($data->user->foto_profile)) src="{{ url('assets/img/man.png') }}"
          @else src="{{ Storage::url($data->user->foto_profile) }}" @endif
                            alt="avatar"
                            class="rounded mx-auto d-block rounded mx-auto d-blockrounded-circle img-fluid img-thumbnail"
                            width="200px" height="auto"
                            onerror="this.onerror=null; this.src='{{ url('assets/img/man.png') }}'" />

                        <div class="input-group mb-3 mt-4">
                            <span class="input-group-text" id="basic-addon1">Nama Lengkap</span>
                            <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror"
                                aria-describedby="basic-addon1" name="nama_pengguna"
                                @if (!empty(Auth::user()->name)) value="{{ Auth::user()->name }}"
            @else
            value="{{ old('nama_pengguna') }}" @endif>
                            @error('nama_pengguna')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3 mt-4">
                            <span class="input-group-text" id="basic-addon1">Alamat Email</span>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                aria-label="Email" aria-describedby="basic-addon1" name="email"
                                @if (!empty(Auth::user()->email)) value="{{ Auth::user()->email }}"
            @else
            value="{{ old('email') }}" @endif>
                            @error('email')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Foto Profile</label>
                            <input type="file" class="form-control @error('imageprofile') is-invalid @enderror"
                                name="imageprofile" id="inputGroupFile01">
                            @error('imageprofile')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div id="preloader"></div>
@endsection
