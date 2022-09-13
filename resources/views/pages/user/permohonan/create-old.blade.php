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
              <div class="col-md-4">
                <div class="form-floating mb-3 mt-2">
                  <select class="form-select @error('jenis_permohonan') is-invalid @enderror" id="jenis_permohonan" name="jenis_permohonan">
                    <option value="">- Pilih Permohonan -</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if ($type->status_opsi == 'n') disabled @endif
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
              <div class="col-md-4">
                <div class="form-floating mb-3 mt-2">
                  <input class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" type="text" placeholder="Nomor Surat" name="no_surat" value="{{ old('no_surat') }}" />
                  <label for="no_surat">Nomor Surat Permohonan</label>
                  @error('no_surat')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mb-3 mt-2">
                  <input class="form-control @error('asal_surat') is-invalid @enderror" id="asal_surat" type="text" placeholder="Asal Surat" name="asal_surat" value="{{ old('asal_surat') }}" />
                  <label for="asal_surat">Asal Surat Permohonan</label>
                  @error('asal_surat')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3 mt-2">
                  <label for="lokasi" class="form-label ">Lokasi</label>
                  <select id="lokasi" class="js-example-basic-multiple js-states form-select @error('lokasi_penelitian') is-invalid @enderror" name="lokasi_penelitian[]" multiple="multiple">
                    @foreach ($lokasis as $lokasi)
                    <option value="{{ $lokasi->lokasi_tujuan }}" @if ($lokasi->status == 'n') disabled @endif
                      {{ $lokasi->id == old('lokasi_penelitian') ? 'selected' : '' }}>
                      {{ $lokasi->lokasi_tujuan }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3 mt-2">
                  <label for="datepicker-three" class="form-label">Tanggal Surat Permohonan</label>
                  <input type="text" class="form-control @error('tgl_surat') is-invalid @enderror" id="datepicker-three" placeholder="Tanggal Surat Permohonan" name="tgl_surat" value="{{ old('tgl_surat') }}" />
                  @error('tgl_surat')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3 mt-2">
                  <textarea class="form-control @error('keperluan_pemohon') is-invalid @enderror" id="keperluan_pemohon" name="keperluan_pemohon" type="text" placeholder="Keperluan Permohon" style="height: 8rem">{{ old('keperluan_pemohon') }}</textarea>
                  <label for="keperluan_pemohon">Keperluan Pemohon</label>
                  @error('keperluan_pemohon')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3 mt-2">
                  <textarea class="form-control @error('judul_penelitian') is-invalid @enderror" id="judul_penelitian" name="judul_penelitian" type="text" placeholder="Judul Rencana Penelitian" style="height: 8rem" data-sb-validations="required">{{ old('judul_penelitian') }}</textarea>
                  <label for="judul_penelitian">Isikan jenis data yang dimaksud/rencana judul
                    penelitian</label>
                  @error('judul_penelitian')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3 mt-2 ">
                  <label for="datepicker-one" class="form-label ">Tanggal Awal </label>
                  <input type="text" class="form-control @error('waktu_awal') is-invalid @enderror" id="datepicker-one" placeholder="Tanggal Awal" name="waktu_awal" value="{{ old('waktu_awal') }}" />
                  @error('waktu_awal')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3 mt-2 ">
                  <label for="datepicker-two" class="form-label ">Tanggal Akhir </label>
                  <input type="text" class="form-control @error('waktu_akhir') is-invalid @enderror" id="datepicker-two" placeholder="Tanggal Akhir" name="waktu_akhir" value="{{ old('waktu_akhir') }}" />
                  @error('waktu_akhir')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating-mb 3">
                  <label for="formFile" class="form-label ">Upload File Surat Pengantar Permohonan
                  </label>
                  <input class="form-control @error('file_pengantar') is-invalid @enderror" type="file" id="formFile" name="file_pengantar">
                  <span style="font-size: 14px;color:red" class="mt-2">* Format file pdf, jpg, png maks 700kb</span>
                  @error('file_pengantar')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating-mb 3">
                  <label for="formFile" class="form-label">Upload File Proposal Penelitian</label>
                  <input class="form-control @error('file_proposal') is-invalid @enderror" type="file" id="formFile" name="file_proposal" accept=".pdf">
                  <span style="font-size: 14px;color:red" class="mt-2">* Format file pdf maks 2Mb</span>
                  @error('file_proposal')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row mt-5">
              <p style="font-size: 16px;color:black">Tambahkan data pemohon jika lebih
                dari satu orang</p>
              <div class="col-md-4">
                <div class="form-floating mb-3 mt-2">
                  <input class="form-control @error('nama_pemohon') is-invalid @enderror" id="nama" type="text" placeholder="Nama" name="nama_pemohon[]" readonly disabled @if (isset($data->user->name)) value="{{ $data->user->name }}" @else value="{{ old('nama_pemohon') }}" @endif />
                  <label for="nama">Nama Pemohon</label>
                  @error('nama_pemohon')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mb-3 mt-2">
                  <input class="form-control @error('nama_pemohon') is-invalid @enderror" id="nama" type="text" placeholder="Nama" name="nim_pemohon[0]" readonly disabled @if (isset($data->nim)) value="{{ $data->nim }}" @else value="{{ old('nim_pemohon') }}" @endif />
                  <label for="nama">NIM/NIK Pemohon</label>
                  @error('nama_pemohon')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mb-3 mt-2">
                  <input class="form-control @error('nama_pemohon') is-invalid @enderror" id="nama" type="text" placeholder="Nama" name="nohp_pemohon[0]" readonly disabled @if (isset($data->no_hp)) value="{{ $data->no_hp }}" @else value="{{ old('nohp_pemohon') }}" @endif />
                  <label for="nama">No HP Pemohon</label>
                  @error('nohp_pemohon')
                  <div class="invalid-feedback" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div id="tambah_inputan"> </div>
            <div class="form-group mt-3">
              <button type="button" class="mr-2 btn btn-warning bt-sm" value="Tambah pemohon" id="tambah" title="Tambah Pemohon">
                Tambah Pemohon</i>
              </button>
              <button type="button" class="ml-2 btn btn-outline-danger bt-sm" value="Hapus pemohon" id="hapus" title="Hapus Pemohon">
                Hapus Pemohon</i>
              </button>
            </div>
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
<script type="text/javascript" src="{{ url('assets/js/function.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var id = 0;

    $('#tambah').click(function() {
      id++;
      $('#tambah_inputan').append(`<div class="row mt-2" id="form` + id + `">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mt-2">
                                    <input class="form-control @error('nama_pemohon') is-invalid @enderror"
                                        id="nama" type="text" placeholder="Nama" name="nama_pemohon[]"
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
                                        id="nama" type="text" placeholder="Nama" name="nim_pemohon[` + id + `]"
                                        value="{{ old('nama_pemohon') }}" />
                                    <label for="nama">NIM/NIK Pemohon</label>
                                    @error('nama_pemohon')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mt-2">
                                    <input class="form-control @error('nama_pemohon') is-invalid @enderror"
                                        id="nama" type="text" placeholder="Nama" name="nohp_pemohon[` + id + `]"
                                        value="{{ old('nama_pemohon') }}" />
                                    <label for="nama">No HP Pemohon</label>
                                    @error('nama_pemohon')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>`)
    });
    $('#hapus').click(function() {
      $('#form' + id).remove();
      id--
    });
  })

</script>
@endpush
