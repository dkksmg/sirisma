@extends('layouts.app')
@push('addon-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/css/gijgo.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <main id="main">
        <section id="hero-static" class="hero-static">
            <div class="container">
                <div class="section-header">
                    <h2>Permohonan Anda</h2>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-md-start mb-5">
                    <div class="col-md-12">
                        <div class="container px-5 my-5">
                            <div class="card mt-3 mb-5">
                                <div class="card-header text-left">
                                    <div class="">
                                        <h6><strong>Data Pemohon</strong></h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table" id="example" style="font-family:Arial, Helvetica, sans-serif">
                                        <thead>
                                            <tr>
                                                <th class="text-justify">Nama</th>
                                                <th class="text-justify">NIM</th>
                                                <th class="text-justify">NIK</th>
                                                <th class="text-justify">Nomor HP (WA)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->addonapplicant as $pemohon)
                                                <tr>
                                                    <td class="text-justify">{{ $pemohon->nama_pemohon }}</td>
                                                    <td class="text-justify">{{ $pemohon->nim_pemohon }}</td>
                                                    <td class="text-justify">{{ $pemohon->nik }}</td>
                                                    <td class="text-justify">{{ $pemohon->no_hp }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" wire:key="UNIQUE_KEY">
                                    <div class="form-floating mb-3 mt-2" wire:ignore>
                                        <select class="form-select @error('jenis_permohonan') is-invalid @enderror"
                                            id="jenis_permohonan" name="jenis_permohonan" disabled readonly>
                                            <option value="">- Pilih Permohonan -</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}"
                                                    @if ($type->status_opsi == 'n') disabled @endif
                                                    {{ $type->id == $data->jenis_permohonan ? 'selected' : '' }}>
                                                    {{ $type->jenis_permohonan }}</option>
                                            @endforeach
                                        </select>
                                        <label for="jenis_permohonan">Jenis Permohonan</label>
                                        @error('jenis_permohonan')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mt-2">
                                        <input class="form-control id="no_surat" type="text" placeholder="Nomor Surat"
                                            name="no_surat" value="{{ $data->no_surat }}" disabled readonly />
                                        <label for="no_surat">Nomor Surat Pengantar Permohonan</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mt-2">
                                        <input class="form-control" id="asal_surat" type="text" placeholder="Asal Surat"
                                            name="asal_surat" value="{{ $data->asal_surat }}" disabled readonly />
                                        <label for="asal_surat">Asal Surat Pengantar Permohonan</label>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" wire:key="UNIQUE_KEY">
                                    <div class="form-group mb-3 mt-2" wire:ignore>
                                        <label for="lokasi" class="form-label ">Lokasi</label>
                                        <select id="lokasi" class="js-example-basic-multiple js-states form-select "
                                            name="lokasi_penelitian[]" multiple="multiple" disabled readonly>
                                            @php
                                                $lokasiData = json_decode($data->lokasi_tujuan);
                                            @endphp
                                            @foreach ($lokasis as $lokasi)
                                                <option value="{{ $lokasi->lokasi_tujuan }}"
                                                    @if ($lokasi->status == 'n') disabled @endif
                                                    {{ in_array($lokasi->lokasi_tujuan, $lokasiData ?: []) ? 'selected' : '' }}>
                                                    {{ $lokasi->lokasi_tujuan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" wire:key="UNIQUE_KEY">
                                    <div class="form-group mb-3 mt-2" wire:ignore>
                                        <label for="datepicker-three" class="form-label">Tanggal Surat Permohonan</label>
                                        <input type="text" class="form-control" id="datepicker-three"
                                            placeholder="Tanggal Surat Permohonan" name="tgl_surat"
                                            value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_surat)->format('d/m/Y') }}"
                                            disabled readonly />

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mt-2">
                                        <textarea class="form-control" id="keperluan_pemohon" name="keperluan_pemohon" type="text"
                                            placeholder="Keperluan Permohon" style="height: 8rem" disabled readonly>{{ $data->keperluan }}</textarea>
                                        <label for="keperluan_pemohon">Keperluan Pemohon</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mt-2">
                                        <textarea class="form-control" id="judul_penelitian" name="judul_penelitian" type="text"
                                            placeholder="Judul Rencana Penelitian" style="height: 8rem" disabled readonly>{{ $data->judul_atau_data }}</textarea>
                                        <label for="judul_penelitian">Isikan jenis data yang dimaksud/rencana judul
                                            penelitian</label>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" wire:key="UNIQUE_KEY">
                                    <div class="form-group mb-3 mt-2" wire:ignore>
                                        <label for="datepicker-one" class="form-label ">Tanggal Awal </label>
                                        <input type="text" class="form-control" id="datepicker-one"
                                            placeholder="Tanggal Awal" name="waktu_awal"
                                            value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_awal)->format('d/m/Y') }}"
                                            disabled readonly />

                                    </div>
                                </div>
                                <div class="col-md-6" wire:key="UNIQUE_KEY">
                                    <div class="form-group mb-3 mt-2" wire:ignore>
                                        <label for="datepicker-two" class="form-label ">Tanggal Akhir </label>
                                        <input type="text"
                                            class="form-control @error('waktu_akhir') is-invalid @enderror"
                                            id="datepicker-two" placeholder="Tanggal Akhir" name="waktu_akhir"
                                            value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_akhir)->format('d/m/Y') }}"
                                            disabled readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-center"">
                                    <div class="form-floating-mb 3">
                                        <label for="formFile" class="form-label ">File Surat Pengantar
                                            Permohonan</label>
                                        <br>
                                        <object data="{{ url(Storage::url($data->file_surat_pemohon)) }}"
                                            type="application/pdf" width="100%" height="100%"
                                            style="min-height:40vh;min-width:30vw">
                                            <embed src="{{ url(Storage::url($data->file_surat_pemohon)) }}"
                                                type="application/pdf">
                                        </object>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div class="form-floating-mb 3">
                                        <label for="formFile" class="form-label">File Proposal Penelitian</label>
                                        <br>
                                        <object data="{{ url(Storage::url($data->file_proposal_pemohon)) }}"
                                            type="application/pdf" width="100%" height="100%"
                                            style="min-height:40vh;min-width:30vw">
                                            <embed src="{{ url(Storage::url($data->file_proposal_pemohon)) }}"
                                                type="application/pdf">
                                        </object>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a class="btn btn-secondary" href="{{ URL::previous() }}">Kembali</a>
                </div>
            </div>

        </section>
    </main>
@endsection
@push('addon-script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/js/gijgo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script type="text/javascript" src="{{ url('assets/js/function.js') }}"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Pilih Lokasi",
                allowClear: false,
                multiple: true
            });
        });
    </script>
@endpush
