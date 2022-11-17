@extends('layouts.app')
@section('content')
    <main id="hero-static" class="hero-static">
        <section>
            <div class="container">
                <div class="section-header">
                    <h2>Perbarui Data Diri</h2>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-md-start">
                    <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="container px-5 my-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('nama_lengkap_pemohon') is-invalid @enderror"
                                                id="nama" type="text" placeholder="Nama"
                                                data-sb-validations="required"
                                                @if (isset(Auth::user()->name)) value="{{ Auth::user()->name }}"@else value="{{ old('nama_lengkap_pemohon') }}" @endif
                                                name="nama_lengkap_pemohon" />
                                            <label for="nama">Nama Lengkap</label>
                                            @error('nama_lengkap_pemohon')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" type="email" placeholder="Email"
                                                data-sb-validations="required"
                                                @if (isset(Auth::user()->email)) value="{{ Auth::user()->email }}" @else value="{{ old('email_pemohon') }}" @endif
                                                disabled name="email_pemohon" />
                                            <label for="email">Email</label>
                                            @error('nama_lengkap_pemohon')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('nik_pemohon') is-invalid @enderror"
                                                id="nik_pemohon" type="number"
                                                placeholder="NIK"@if (isset($data->nik)) value="{{ $data->nik }}" @else value="{{ old('nik_pemohon') }}" @endif
                                                name="nik_pemohon" />
                                            <label for="nik">NIK</label>
                                            @error('nik_pemohon')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('nim_pemohon') is-invalid @enderror"
                                                id="nim" type="text" placeholder="NIP/NIM"
                                                @if (isset($data->nim)) value="{{ $data->nim }}" @else value="{{ old('nim_pemohon') }}" @endif
                                                name="nim_pemohon" />
                                            <label for="nim">NIP/NIM</label>
                                            @error('nim_pemohon')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('nohp_pemohon') is-invalid @enderror"
                                                id="no_hp" type="number"
                                                placeholder="Nomor HP (Terhubung dengan Whatsapp)"
                                                @if (isset($data->no_hp)) value="{{ $data->no_hp }}" @else value="{{ old('nohp_pemohon') }}" @endif
                                                name="nohp_pemohon" />
                                            <label for="no_hp">Nomor HP (Terhubung dengan Whatsapp)</label>
                                            @error('nohp_pemohon')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('jenjang_pemohon') is-invalid @enderror"
                                                id="jenjang" name="jenjang_pemohon">
                                                <option value="">- Pilih Jenjang Pendidikan -</option>
                                                @foreach ($educations as $education)
                                                    @if (isset($data->jenjang))
                                                        <option value="{{ $education->level_pendidikan }}"
                                                            {{ $education->level_pendidikan == $data->jenjang ? 'selected' : '' }}>
                                                            {{ $education->level_pendidikan }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $education->level_pendidikan }}"
                                                            {{ $education->level_pendidikan == old('jenjang_pemohon') ? 'selected' : '' }}>
                                                            {{ $education->level_pendidikan }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="jenjang">Jenjang Pendidikan</label>
                                            @error('jenjang_pemohon')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('status_pemohon') is-invalid @enderror"
                                                id="status" name="status_pemohon">
                                                <option value="">- Pilih Status -</option>
                                                @foreach ($statuses as $status)
                                                    @if (isset($data->status))
                                                        <option value="{{ $status->status_pemohon }}"
                                                            {{ $status->status_pemohon == $data->status ? 'selected' : '' }}>
                                                            {{ $status->status_pemohon }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $status->status_pemohon }}"
                                                            {{ $status->status_pemohon == old('status_pemohon') ? 'selected' : '' }}>
                                                            {{ $status->status_pemohon }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="status">Status</label>
                                            @error('status_pemohon')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('asal_pemohon') is-invalid @enderror"
                                                id="asal" type="text"
                                                placeholder="Sekolah/Universitas/Afiliasi/Kantor"
                                                @if (isset($data->asal)) value="{{ $data->asal }}" @else value="{{ old('asal_pemohon') }}" @endif
                                                name="asal_pemohon" />
                                            <label for="asal">Sekolah/Universitas/Afiliasi/Kantor</label>
                                            @error('asal_pemohon')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('progdi_pemohon') is-invalid @enderror"
                                                id="progdi" type="text" placeholder="Program Studi"
                                                @if (isset($data->program_studi)) value="{{ $data->program_studi }}" @else value="{{ old('progdi_pemohon') }}" @endif
                                                name="progdi_pemohon" />
                                            <label for="progdi">Program Studi</label>
                                            @error('progdi_pemohon')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('semester_pemohon') is-invalid @enderror"
                                                id="semester" type="number" placeholder="Semester"
                                                @if (isset($data->semester)) value="{{ $data->semester }}" @else value="{{ old('semester_pemohon') }}" @endif
                                                name="semester_pemohon" />
                                            <label for="semester">Semester</label>
                                            @error('semester_pemohon')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control  @error('alamat_ktp') is-invalid @enderror" id="alamat_ktp" placeholder="Alamat KTP"
                                                name="alamat_ktp">
                                    @if (!empty($data->alamat_ktp))
{{ $data->alamat_ktp }}
@else
{{ old('alamat_ktp') }}
@endif
                                </textarea>
                                            <label for="alamat_ktp">Alamat KTP</label>
                                            @error('alamat_ktp')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control @error('alamat_domisili') is-invalid @enderror" id="alamat_domisili"
                                                placeholder="Alamat Domisili" name="alamat_domisili">
                                    @if (!empty($data->alamat_domisili))
{{ $data->alamat_domisili }}
@else
{{ old('alamat_domisili') }}
@endif
                                </textarea>
                                            <label for="alamat_domisili">Alamat Domisili</label>
                                            @error('alamat_domisili')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('provinsi_ktp') is-invalid @enderror"
                                                id="provinsi_ktp" name="provinsi_ktp">
                                                <option value="">- Pilih Provinsi -</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id_provinsi }}"
                                                        {{ $province->id_provinsi == old('provinsi_ktp') ? 'selected' : '' }}>
                                                        {{ $province->nama_provinsi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="provinsi_ktp">Provinsi Sesuai KTP</label>
                                            @error('provinsi_ktp')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('kotakab_ktp') is-invalid @enderror"
                                                id="kotakab_ktp" name="kotakab_ktp">
                                            </select>
                                            <label for="kotakab_ktp">Kota/Kab Sesuai KTP</label>
                                            @error('kotakab_ktp')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('kecamatan_ktp') is-invalid @enderror"
                                                id="kecamatan_ktp" name="kecamatan_ktp">
                                            </select>
                                            <label for="kecamatan_ktp">Kecamatan Sesuai KTP</label>
                                            @error('kecamatan_ktp')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('keldesa_ktp') is-invalid @enderror"
                                                id="keldesa_ktp" name="keldesa_ktp">
                                            </select>
                                            <label for="keldesa_ktp">Kelurahan/Desa Sesuai KTP</label>
                                            @error('keldesa_ktp')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('provinsi_domisili') is-invalid @enderror"
                                                id="provinsi_domisili" name="provinsi_domisili">
                                                <option value="">- Pilih Provinsi -</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id_provinsi }}"
                                                        {{ $province->id_provinsi == old('provinsi_domisili') ? 'selected' : '' }}>
                                                        {{ $province->nama_provinsi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="provinsi_domisili">Provinsi Domisili</label>
                                            @error('provinsi_domisili')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('kotakab_domisili') is-invalid @enderror"
                                                id="kotakab_domisili" name="kotakab_domisili">
                                            </select>
                                            <label for="kotakab_domisili">Kota/Kab Domisili</label>
                                            @error('kotakab_domisili')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('kecamatan_domisili') is-invalid @enderror"
                                                id="kecamatan_domisili" name="kecamatan_domisili">
                                            </select>
                                            <label for="kecamatan_domisili">Kecamatan Domisili</label>
                                            @error('kecamatan_domisili')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('keldesa_domisili') is-invalid @enderror"
                                                id="keldesa_domisili" name="keldesa_domisili">
                                            </select>
                                            <label for="keldesa_domisili">Kelurahan/Desa Domisili</label>
                                            @error('keldesa_domisili')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating-mb 3">
                                            <label for="formFile"
                                                class="form-label @error('file_ktp') is-invalid @enderror">Foto
                                                KTP</label>
                                            <input class="form-control" type="file" id="formFile" accept="/*"
                                                name="file_ktp">
                                            @error('file_ktp')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating-mb 3">
                                            <label for="formFile"
                                                class="form-label @error('file_ktm') is-invalid @enderror">Foto KTM/ Kartu
                                                Pelajar</label>
                                            <input class="form-control" type="file" id="formFile" accept="/*"
                                                name="file_ktm">
                                            @error('file_ktm')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-5">
                                        <img @if (empty($data->file_ktp)) src="{{ Storage::url($data->file_ktp) }}"
                                        @else src="{{ url('assets/img/no-photo.png') }}" @endif
                                            alt="foto-ktp" class="img-fluid img-thumbnail rounded mx-auto d-block"
                                            width="75%" height="75%"
                                            onerror="this.onerror=null; this.src='{{ url('assets/img/no-photo.png') }}'" />
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <img @if (empty($data->file_ktm)) src="{{ Storage::url($data->file_ktm) }}"
                                        @else src="{{ url('assets/img/no-photo.png') }}" @endif
                                            alt="foto-ktm" class="img-fluid img-thumbnail rounded mx-auto d-block"
                                            width="75%" height="75%"
                                            onerror="this.onerror=null; this.src='{{ url('assets/img/no-photo.png') }}'" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-secondary" href="{{ URL::previous() }}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </div>
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                </form>
            </div>

        </section>
    </main>
@endsection
@push('addon-script')
    <script type="text/javascript">
        $('textarea#alamat_ktp').html($('textarea#alamat_ktp').html().trim());
        $('textarea#alamat_domisili').html($('textarea#alamat_domisili').html().trim());
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(function() {
                $('#provinsi_ktp').change(function() {
                    var id_provinsi = $('#provinsi_ktp').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkotakab') }}",
                        data: {
                            id_provinsi: id_provinsi,
                        },
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            $("#kotakab_ktp").html(data);
                            $('#kecamatan_ktp').html('')
                            $('#keldesa_ktp').html('')
                        }
                    })
                });
                $('#provinsi_domisili').change(function() {
                    var id_provinsi = $('#provinsi_domisili').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkotakab') }}",
                        data: {
                            id_provinsi: id_provinsi,
                        },
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            $("#kotakab_domisili").html(data);
                            $('#kecamatan_domisili').html('')
                            $('#keldesa_domisili').html('')
                        }
                    })
                });
                $('#kotakab_ktp').change(function() {
                    var id_kota = $('#kotakab_ktp').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkecamatan') }}",
                        data: {
                            id_kota: id_kota,
                        },
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            $("#kecamatan_ktp").html(data);
                            $('#keldesa_ktp').html('')
                        }
                    })
                });
                $('#kotakab_domisili').change(function() {
                    var id_kota = $('#kotakab_domisili').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkecamatan') }}",
                        data: {
                            id_kota: id_kota,
                        },
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            $("#kecamatan_domisili").html(data);
                            $('#keldesa_domisili').html('')
                        }
                    })
                });
                $('#kecamatan_ktp').change(function() {
                    var id_kec = $('#kecamatan_ktp').find(":selected").val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkeldesa') }}",
                        data: {
                            id_kecamatan: id_kec,
                        },
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            $("#keldesa_ktp").html(data);
                        }
                    })
                });
                $('#kecamatan_domisili').change(function() {
                    var id_kecamatan = $('#kecamatan_domisili').find(":selected").val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getkeldesa') }}",
                        data: {
                            id_kecamatan: id_kecamatan,
                        },
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            $("#keldesa_domisili").html(data);
                        }
                    })
                });

            });


        });
    </script>
@endpush
