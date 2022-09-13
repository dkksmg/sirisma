@extends('layouts.app')
@push('addon-styles')
    <link href="{{ url('assets/css/log.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" rel="stylesheet">
@endpush
@section('content')
    <main id="main">
        <section id="hero-static" class="hero-static">
            <div class="container">
                <div class="section-header">
                    <h2>Daftar Permohonan Anda</h2>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-left mb-4">
                    <div class="col-md-3">
                        @if (empty($data->id_user) or empty($data->nik) or empty($data->file_ktp))
                            <a class="btn btn-sm btn-success mb-3" id="btn-add">Tambah
                                Permohonan</a>
                        @else
                            <a class="btn btn-sm btn-success mb-3" href="{{ route('permohonan.create') }}">Tambah
                                Permohonan</a>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-striped mb-5" width="100%"
                                height="auto">
                                <thead class="table-info">
                                    <tr>
                                        <th class="text-center">No Permohonan</th>
                                        <th class="text-center">Jenis Permohonan</th>
                                        <th class="text-center">Keperluan</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Tanggal Permohonan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">File Surat Pengantar</th>
                                        <th class="text-center">File Proposal</th>
                                        <th class="text-center">File Permohonan</th>
                                        <th class="text-center" width="auto">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $app)
                                        <tr>
                                            <td class="text-center">{{ $app->kode_permohonan }}</td>
                                            <td class="text-center">{{ $app->type->jenis_permohonan }}</td>
                                            <td class="text-center">{{ $app->keperluan }}</td>
                                            <td class="text-center" width="auto">
                                                {{ \Carbon\Carbon::create($app->waktu_awal)->translatedFormat('d F Y') .
                                                    ' s/d ' .
                                                    \Carbon\Carbon::create($app->waktu_akhir)->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $app->tanggal_permohonan)->format('d F Y') }}
                                            </td>
                                            <td class="text-center">
                                                @if ($app->logsuratone->status_surat == 'kirim')
                                                    <span class="btn btn-sm btn-warning text-light mb-1"
                                                        title="Lihat detail status" data-bs-toggle="modal"
                                                        data-bs-target="#statusModal{{ $app->id_application }}">Dikirim
                                                    </span>
                                                    <br>
                                                    <span
                                                        class="time-status">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $app->logsuratone->update_waktu)->format('d-m-Y H:i:s') }}</span>
                                                @elseif ($app->logsuratone->status_surat == 'setuju')
                                                    <span class="btn btn-sm btn-info text-light mb-1"
                                                        title="Lihat detail status" data-bs-toggle="modal"
                                                        data-bs-target="#statusModal{{ $app->id_application }}">
                                                        Diproses
                                                    </span>
                                                    <br>
                                                    <span
                                                        class="time-status">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $app->logsuratone->update_waktu)->format('d-m-Y H:i:s') }}</span>
                                                @elseif ($app->logsuratone->status_surat == 'selesai')
                                                    <span class="btn btn-sm btn-success text-light mb-1"
                                                        title="Lihat detail status" data-bs-toggle="modal"
                                                        data-bs-target="#statusModal{{ $app->id_application }}">
                                                        Selesai
                                                    </span>
                                                    <br>
                                                    <span
                                                        class="time-status">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $app->logsuratone->update_waktu)->format('d-m-Y H:i:s') }}</span>
                                                @elseif ($app->logsuratone->status_surat == 'draft')
                                                    <span class="btn btn-sm btn-secondary text-light mb-1"
                                                        title="Lihat detail status" data-bs-toggle="modal"
                                                        data-bs-target="#statusModal{{ $app->id_application }}">
                                                        Draft
                                                    </span>
                                                    <br>
                                                    <span
                                                        class="time-status">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $app->logsuratone->update_waktu)->format('d-m-Y H:i:s') }}</span>
                                                @elseif ($app->logsuratone->status_surat == 'proses')
                                                    <span class="btn btn-sm btn-info text-light mb-1"
                                                        title="Lihat detail status" data-bs-toggle="modal"
                                                        data-bs-target="#statusModal{{ $app->id_application }}">
                                                        Diproses
                                                    </span>
                                                    <br>
                                                    <span
                                                        class="time-status">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $app->logsuratone->update_waktu)->format('d-m-Y H:i:s') }}</span>
                                                @else
                                                    <span class="btn btn-sm btn-danger text-light mb-1"
                                                        title="Lihat detail status" data-bs-toggle="modal"
                                                        data-bs-target="#statusModal{{ $app->id_application }}">
                                                        Ditolak
                                                    </span>
                                                    <br>
                                                    <span
                                                        class="time-status">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $app->logsuratone->update_waktu)->format('d-m-Y H:i:s') }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">

                                                <button class="btn btn-md bi bi-file-earmark-pdf color-orange"
                                                    onClick="window.open('{{ Storage::url($app->file_surat_pemohon) }}','_blank', 'location=yes,height=800,width=700,scrollbars=yes,status=yes');">
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-md bi bi-file-earmark-pdf color-orange"
                                                    onClick="window.open('{{ Storage::url($app->file_proposal_pemohon) }}','_blank', 'location=yes,height=800,width=700,scrollbars=yes,status=yes');">
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                @if ($app->logsuratone->status_surat == 'setuju')
                                                    <button class="btn btn-md bi bi-file-earmark-pdf color-orange"
                                                        onClick="window.open('{{ Storage::url($app->file_surat_permohonan) }}','_blank', 'location=yes,height=800,width=700,scrollbars=yes,status=yes');">
                                                    </button>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            @if ($app->logsuratone->status_surat == 'selesai')
                                                @php
                                                    $date1 = new DateTime($timenow);
                                                    $date2 = new DateTime($app->logsuratone->update_waktu);
                                                    $diff = $date1->diff($date2);
                                                @endphp
                                                @if ($diff->m == 1 or $diff->d == 30)
                                                    <td class="text-center">
                                                        -
                                                    </td>
                                                @else
                                                    <td class="text-center">
                                                        <a class="btn-revisi btn btn-secondary btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#staticBackdrop{{ $app->id_application }}"
                                                            data-id="{{ $app->kode_permohonan }}">
                                                            Revisi
                                                        </a>
                                                    </td>
                                                @endif
                                            @elseif($app->logsuratone->status_surat == 'proses' || $app->logsuratone->status_surat == 'setuju')
                                                <td class="text-center">
                                                    <table>
                                                        <tr>
                                                            <th class="text-center"><a
                                                                    href="{{ route('permohonan.show', $app->id_application) }}"
                                                                    class="btn btn-info btn-sm ml-3"><i
                                                                        class="fa-sharp fa-solid fa-eye"
                                                                        title="Lihat Permohonan {{ $app->keperluan }}"></i></a>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </td>
                                            @elseif($app->logsuratone->status_surat == 'kirim' ||
                                                $app->logsuratone->status_surat == 'draft' ||
                                                $app->logsuratone->status_surat == 'tolak')
                                                <td class="text-center">
                                                    <table>
                                                        <tr>
                                                            <th><a href="{{ route('permohonan.show', $app->id_application) }}"
                                                                    class="btn btn-info btn-sm ml-3"><i
                                                                        class="fa-sharp fa-solid fa-eye"
                                                                        title="Lihat Permohonan {{ $app->keperluan }}"></i></a>
                                                            </th>
                                                            <th><a href="{{ route('permohonan.edit', $app->id_application) }}"
                                                                    class="btn btn-warning btn-sm ml-3"><i
                                                                        class="fa-solid fa-pen-to-square"
                                                                        title="Edit Permohonan {{ $app->keperluan }}"></i></a>
                                                            </th>
                                                            <th>
                                                                <form
                                                                    action="{{ route('permohonan.destroy', $app->id_application) }}"
                                                                    method="post" class="d-inline"
                                                                    title="Hapus Permohonan {{ $app->keperluan }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger btn-sm">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    -
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
    @foreach ($logsurats as $logsurat)
        <!-- Modal -->
        <div class="modal fade" id="statusModal{{ $logsurat->id_application }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Status Surat {{ $logsurat->kode_permohonan }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <section style="background-color: #F0F2F5;">
                            <div class="d-flex justify-content-center">
                                <div class="container py-2 px-5">
                                    <div class="main-timeline">
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($logsurat->logsuratmany as $log)
                                            <div
                                                class="timeline @if ($no % 2) right
                                             @else left @endif">
                                                <div class="card">
                                                    <div class="card-body p-4">
                                                        <h3>
                                                            @if ($log->status_surat == 'kirim')
                                                                <span class="badge bg-warning">Dikirim</span>
                                                            @elseif ($log->status_surat == 'proses')
                                                                <span class="badge bg-info">
                                                                    Diproses
                                                                </span>
                                                            @elseif ($log->status_surat == 'setuju')
                                                                <span class="badge bg-info">Diproses</span>
                                                            @elseif ($log->status_surat == 'sanggah')
                                                                <span class="badge bg-secondary">Disanggah</span>
                                                            @elseif ($log->status_surat == 'draft')
                                                                <span class="badge bg-secondary">Draft</span>
                                                            @elseif ($log->status_surat == 'selesai')
                                                                <span class="badge bg-success">Selesai</span>
                                                            @elseif ($log->status_surat == 'tolak')
                                                                <span class="badge bg-danger">Ditolak</span>
                                                            @endif

                                                        </h3>
                                                        <p class="mb-2">
                                                            @if (!empty($log->keterangan))
                                                                {{ $log->keterangan }}
                                                            @endif
                                                        </p>
                                                        <p class="mb-0">
                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $log->update_waktu)->format('d-m-Y H:i:s') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($applications as $app)
        @if ($app->logsuratone->status_surat == 'selesai')
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop{{ $app->id_application }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('revisi') }}" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Revisi Permohonan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row justify-content-md-start">
                                        <div class="container px-5 my-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="no_permohonan"
                                                            name="no_permohonan" placeholder="Nomor Permohonan"
                                                            value="{{ $app->kode_permohonan }}" disabled readonly>
                                                        <label for="no_permohonan">Nomor Permohonan</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingPassword"
                                                            placeholder="Jenis Permohonan"
                                                            value="{{ $app->type->jenis_permohonan }}" disabled readonly>
                                                        <label for="floatingPassword">Jenis Permohonan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Detail Revisi" id="detail_revisi" name="detail_revisi"
                                                        style="height: 8rem"></textarea>
                                                    <label for="detail_revisi">Detail Revisi</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
            </div>
        @endif
    @endforeach
@endsection
@push('addon-script')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        document.getElementById("btn-add").addEventListener("click", alertBtn);

        function alertBtn() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data profile Anda belum lengkap!',
                footer: '<a href="{{ route('profile.index') }}"> Lengkapi disini </a>'
            })
        }
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true,
                order: [
                    [4, 'desc']
                ],
                stateSave: true,
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'All'],
                ],
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                responsive: true,

            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
