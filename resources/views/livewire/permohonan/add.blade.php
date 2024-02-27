<div>
    <form action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card mb-5">
            <div class="card-header text-left">
                <div class="badge bg-light text-danger">
                    <h6><strong>Jika Pemohon lebih dari satu silakan tambah data pemohon</strong></h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="applicant_table">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>NIM/NIP</th>
                            <th>NIK</th>
                            <th>Nomor HP (WA)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($dataApplicants as $index => $dataApplicant)
                            <tr>
                                <td>
                                    @if ($no > 1)
                                        <input type="text" name="dataApplicants[{{ $index }}][nama_pemohon]"
                                            class="form-control"
                                            wire:model="dataApplicants.{{ $index }}.nama_pemohon"
                                            placeholder="Nama" />
                                    @else
                                        <input type="text" name="dataApplicants[{{ $index }}][nama_pemohon]"
                                            class="form-control"
                                            wire:model="dataApplicants.{{ $index }}.nama_pemohon"
                                            placeholder="Nama" readonly onclick="alertPemohon()" />
                                    @endif
                                </td>
                                <td>
                                    @if ($no > 1)
                                        <input type="text" name="dataApplicants[{{ $index }}][nim_pemohon]"
                                            class="form-control" wire:model="dataApplicants.{{ $index }}.nim"
                                            placeholder="NIM" />
                                    @else
                                        <input type="text" name="dataApplicants[{{ $index }}][nim_pemohon]"
                                            class="form-control" wire:model="dataApplicants.{{ $index }}.nim"
                                            placeholder="NIM" readonly onclick="alertPemohon()" />
                                    @endif
                                </td>
                                <td>
                                    @if ($no > 1)
                                        <input type="number" name="dataApplicants[{{ $index }}][nik]"
                                            class="form-control" wire:model="dataApplicants.{{ $index }}.nik"
                                            placeholder="NIK" />
                                    @else
                                        <input type="number" name="dataApplicants[{{ $index }}][nik]"
                                            class="form-control" wire:model="dataApplicants.{{ $index }}.nik"
                                            placeholder="NIK" readonly onclick="alertPemohon()" />
                                    @endif
                                </td>
                                <td>
                                    @if ($no > 1)
                                        <input type="number" name="dataApplicants[{{ $index }}][no_hp]"
                                            class="form-control" wire:model="dataApplicants.{{ $index }}.no_hp"
                                            placeholder="Nomor HP(WA)" />
                                    @else
                                        <input type="number" name="dataApplicants[{{ $index }}][no_hp]"
                                            class="form-control" wire:model="dataApplicants.{{ $index }}.no_hp"
                                            placeholder="Nomor HP(WA)" readonly onclick="alertPemohon()" />
                                    @endif
                                </td>
                                <td>
                                    @if ($no > 1)
                                        <a href="#" wire:click.prevent="removePemohon({{ $index }})"
                                            class="btn btn-sm btn-outline-danger">Hapus</a>
                                    @else
                                    @endif
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary" wire:click.prevent="addPemohon">Tambah
                            Pemohon</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            {{ Form::hidden('applicant', $data->id_applicant) }}
            <div class="col-md-4" wire:key="UNIQUE_KEY">
                <div class="form-group mb-3 mt-2" wire:ignore>
                    <label for="jenis_permohonan">Jenis Permohonan</label>
                    <select class="form-select @error('jenis_permohonan') is-invalid @enderror" id="jenis_permohonan"
                        name="jenis_permohonan">
                        <option value="">- Pilih Permohonan -</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @if ($type->status_opsi == 'n') disabled @endif
                                {{ $type->id == old('jenis_permohonan') ? 'selected' : '' }}>
                                {{ $type->jenis_permohonan }}</option>
                        @endforeach
                    </select>
                    @error('jenis_permohonan')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-3 mt-2">
                    <label for="no_surat">Nomor Surat Permohonan</label>
                    <input class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" type="text"
                        placeholder="58/UDN/BM.R0/VIII/2022" name="no_surat" value="{{ old('no_surat') }}" />
                    @error('no_surat')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-3 mt-2">
                    <label for="asal_surat">Asal Surat Permohonan</label>
                    <input class="form-control @error('asal_surat') is-invalid @enderror" id="asal_surat" type="text"
                        placeholder="Fakultas Kesehatan Universitas Dian Nuswantoro" name="asal_surat"
                        value="{{ old('asal_surat') }}" />
                    @error('asal_surat')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" wire:key="UNIQUE_KEY">
                <div class="form-group mb-3 mt-2" wire:ignore>
                    <label for="lokasi" class="form-label ">Lokasi</label>
                    <select id="lokasi"
                        class="js-example-basic-multiple js-states form-select @error('lokasi_penelitian') is-invalid @enderror"
                        name="lokasi_penelitian[]" multiple="multiple">
                        @foreach ($lokasis as $lokasi)
                            <option value="{{ $lokasi->lokasi_tujuan }}"
                                @if ($lokasi->status == 'n') disabled @endif
                                {{ in_array($lokasi->lokasi_tujuan, old('lokasi_penelitian') ?: []) ? 'selected' : '' }}>
                                {{ $lokasi->lokasi_tujuan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6" wire:key="UNIQUE_KEY">
                <div class="form-group mb-3 mt-2" wire:ignore>
                    <label for="datepicker-three" class="form-label">Tanggal Surat Permohonan</label>
                    <input type="text" class="form-control @error('tgl_surat') is-invalid @enderror"
                        id="datepicker-three" placeholder="Tanggal Surat Permohonan" name="tgl_surat"
                        value="{{ old('tgl_surat') }}" />
                    @error('tgl_surat')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3 mt-2">
                    <textarea class="form-control @error('keperluan_pemohon') is-invalid @enderror" id="keperluan_pemohon"
                        name="keperluan_pemohon" type="text" placeholder="Keperluan Permohon" style="height: 8rem">{{ old('keperluan_pemohon') }}</textarea>
                    <label for="keperluan_pemohon">Jenis data yang dibutuhkan</label>
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
                    <label for="judul_penelitian">Rencana judul
                        penelitian</label>
                    @error('judul_penelitian')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" wire:key="UNIQUE_KEY">
                <div class="form-group mb-3 mt-2" wire:ignore>
                    <label for="datepicker-one" class="form-label ">Tanggal Pelaksanaan Awal </label>
                    <input type="text" class="form-control @error('waktu_awal') is-invalid @enderror"
                        id="datepicker-one" placeholder="Tanggal Pelaksanaan Awal" name="waktu_awal"
                        value="{{ old('waktu_awal') }}" />
                    @error('waktu_awal')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6" wire:key="UNIQUE_KEY">
                <div class="form-group mb-3 mt-2" wire:ignore>
                    <label for="datepicker-two" class="form-label ">Tanggal Pelaksanaan Akhir </label>
                    <input type="text" class="form-control @error('waktu_akhir') is-invalid @enderror"
                        id="datepicker-two" placeholder="Tanggal Pelaksanaan Akhir" name="waktu_akhir"
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
                    <label for="formFile" class="form-label ">Upload File Surat Permohonan
                    </label>
                    <input class="form-control @error('file_pengantar') is-invalid @enderror" type="file"
                        id="formFile" name="file_pengantar">
                    <span style="font-size: 14px;color:red" class="mt-2">* Format file pdf maks
                        700kb</span>
                    @error('file_pengantar')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating-mb 3">
                    <label for="formFile" class="form-label">Upload File Proposal Penelitian</label>
                    <input class="form-control @error('file_proposal') is-invalid @enderror" type="file"
                        id="formFile" name="file_proposal">
                    <span style="font-size: 14px;color:red" class="mt-2">* Format file pdf maks 2Mb</span>
                    @error('file_proposal')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div> --}}
        <br />
        <div class="text-center mt-5">
            <a class="btn btn-secondary" href="{{ route('permohonan.index') }}">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
