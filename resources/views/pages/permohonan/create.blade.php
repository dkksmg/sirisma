@extends('layouts.app')
@push('addon-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/css/gijgo.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                        <form action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{ Form::hidden('applicant', $data->id_applicant) }}
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mt-2">
                                        <select class="form-select @error('jenis_permohonan') is-invalid @enderror"
                                            id="jenis_permohonan" name="jenis_permohonan">
                                            <option value="">- Pilih Permohonan -</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}"
                                                    @if ($type->status_opsi == 'n') disabled @endif
                                                    {{ $type->id == old('jenis_permohonan') ? 'selected' : '' }}>
                                                    {{ $type->jenis_permohonan }}</option>
                                            @endforeach
                                        </select>
                                        <label for="jenis_permohonan">Jenis Permohonan</label>
                                        @error('jenis_permohonan')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3 mt-2">
                                        <input type="text"
                                            class="form-control @error('waktu_akhir') is-invalid @enderror"
                                            id="datepicker-three" placeholder="Tanggal Surat Permohonan" name="waktu_akhir"
                                            value="{{ old('waktu_akhir') }}" />
                                        @error('waktu_akhir')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mt-2">
                                        <input class="form-control @error('nama_pemohon') is-invalid @enderror"
                                            id="nama" type="text" placeholder="Nama" name="nama_pemohon"
                                            value="{{ old('nama_pemohon') }}" />
                                        <label for="nama">Nomor Surat Permohonan</label>
                                        @error('nama_pemohon')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mt-2">
                                        <input class="form-control @error('nama_pemohon') is-invalid @enderror"
                                            id="nama" type="text" placeholder="Nama" name="nama_pemohon"
                                            value="{{ old('nama_pemohon') }}" />
                                        <label for="nama">Asal Surat Permohonan</label>
                                        @error('nama_pemohon')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mt-2">
                                        <textarea class="form-control @error('keperluan_pemohon') is-invalid @enderror" id="keperluan_pemohon"
                                            name="keperluan_pemohon" type="text" placeholder="Keperluan Permohon" style="height: 8rem">{{ old('keperluan_pemohon') }}</textarea>
                                        <label for="keperluan_pemohon">Keperluan Permohon</label>
                                        @error('keperluan_pemohon')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mt-2">
                                        <textarea class="form-control @error('judul_penelitian') is-invalid @enderror" id="judul_penelitian"
                                            name="judul_penelitian" type="text" placeholder="Judul Rencana Penelitian" style="height: 8rem"
                                            data-sb-validations="required">{{ old('judul_penelitian') }}</textarea>
                                        <label for="judul_penelitian">Judul Rencana Penelitian</label>
                                        @error('judul_penelitian')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- <div class="form-floating mb-3 mt-2">
                                        <select class="form-select @error('lokasi_penelitian') is-invalid @enderror"
                                            id="lokasi_penelitian" name="lokasi_penelitian" multiple>
                                            @foreach ($lokasis as $lokasi)
                                                <option value="{{ $lokasi->id }}"
                                                    @if ($lokasi->status == 'n') disabled @endif
                                                    {{ $lokasi->id == old('lokasi_penelitian') ? 'selected' : '' }}>
                                                    {{ $lokasi->lokasi_tujuan }}</option>
                                            @endforeach
                                        </select>
                                        <label for="lokasi_penelitian" class="form-label select-label">Lokasi
                                            Penelitian</label>
                                        @error('lokasi_penelitian')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                    <div class="form-floatin mb-3 mt-2">
                                        <select
                                            class="js-example-basic-multiple js-states form-select @error('lokasi_penelitian') is-invalid @enderror"
                                            name="lokasi[]" multiple="multiple" placeholder="">
                                            @foreach ($lokasis as $lokasi)
                                                <option value="{{ $lokasi->lokasi_tujuan }}"
                                                    @if ($lokasi->status == 'n') disabled @endif
                                                    {{ $lokasi->id == old('lokasi_penelitian') ? 'selected' : '' }}>
                                                    {{ $lokasi->lokasi_tujuan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3 mt-2 ">
                                        <label for="datepicker-one" class="form-label ">Waktu Awal </label>
                                        <input type="text" class="form-control @error('waktu_awal') is-invalid @enderror"
                                            id="datepicker-one" placeholder="Waktu Awal" name="waktu_awal"
                                            value="{{ old('waktu_awal') }}" />
                                        @error('waktu_awal')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3 mt-2 ">
                                        <label for="datepicker-two" class="form-label ">Waktu Akhir </label>
                                        <input type="text"
                                            class="form-control @error('waktu_akhir') is-invalid @enderror"
                                            id="datepicker-two" placeholder="Waktu Akhir" name="waktu_akhir"
                                            value="{{ old('waktu_akhir') }}" />
                                        @error('waktu_akhir')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating-mb 3">
                                        <label for="formFile" class="form-label ">File Surat Pengantar Permohonan </label>
                                        <input class="form-control @error('file_pengantar') is-invalid @enderror"
                                            type="file" id="formFile" name="file_pengantar">
                                        @error('file_pengantar')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating-mb 3">
                                        <label for="formFile" class="form-label">File Proposal Penelitian</label>
                                        <input class="form-control @error('file_proposal') is-invalid @enderror"
                                            type="file" id="formFile" name="file_proposal" accept=".pdf">
                                        @error('file_proposal')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mt-2">
                                        <input class="form-control @error('nama_pemohon') is-invalid @enderror"
                                            id="nama" type="text" placeholder="Nama" name="nama_pemohon"
                                            value="{{ old('nama_pemohon') }}" />
                                        <label for="nama">Nama Pemohon</label>
                                        @error('nama_pemohon')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mt-2">
                                        <input class="form-control @error('nama_pemohon') is-invalid @enderror"
                                            id="nama" type="text" placeholder="Nama" name="nama_pemohon"
                                            value="{{ old('nama_pemohon') }}" />
                                        <label for="nama">NIM Pemohon</label>
                                        @error('nama_pemohon')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mt-2">
                                        <input class="form-control @error('nama_pemohon') is-invalid @enderror"
                                            id="nama" type="text" placeholder="Nama" name="nama_pemohon"
                                            value="{{ old('nama_pemohon') }}" />
                                        <label for="nama">No HP Pemohon</label>
                                        @error('nama_pemohon')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mt-2">
                                        <input class="form-control @error('nama_pemohon') is-invalid @enderror"
                                            id="nama" type="text" placeholder="Nama" name="nama_pemohon"
                                            value="{{ old('nama_pemohon') }}" />
                                        <label for="nama">Nama Pemohon</label>
                                        @error('nama_pemohon')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mt-2">
                                        <input class="form-control @error('nama_pemohon') is-invalid @enderror"
                                            id="nama" type="text" placeholder="Nama" name="nama_pemohon"
                                            value="{{ old('nama_pemohon') }}" />
                                        <label for="nama">NIM Pemohon</label>
                                        @error('nama_pemohon')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mt-2">
                                        <input class="form-control @error('nama_pemohon') is-invalid @enderror"
                                            id="nama" type="text" placeholder="Nama" name="nama_pemohon"
                                            value="{{ old('nama_pemohon') }}" />
                                        <label for="nama">No HP Pemohon</label>
                                        @error('nama_pemohon')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                            <div class="text-center mt-5">
                                <a class="btn btn-secondary" href="{{ route('permohonan.index') }}">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('addon-script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/js/gijgo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Pilih Lokasi Penelitian",
                allowClear: true
            });
        });
        $(function() {
            $('#datepicker-one').datepicker({
                header: true,
                modal: true,
                footer: true,
                keyboardNavigation: true,
                showOtherMonths: true,
                format: 'dd/mm/yyyy',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<i class="fa-solid fa-calendar-days"></i>'
                }
            });
            $('#datepicker-two').datepicker({
                header: true,
                modal: true,
                footer: true,
                keyboardNavigation: true,
                showOtherMonths: true,
                format: 'dd/mm/yyyy',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<i class="fa-solid fa-calendar-days"></i>'
                }
            });
            $('#datepicker-three').datepicker({
                header: true,
                modal: true,
                footer: true,
                keyboardNavigation: true,
                showOtherMonths: true,
                format: 'dd/mm/yyyy',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<i class="fa-solid fa-calendar-days"></i>'
                }
            });
        });
    </script>
@endpush
