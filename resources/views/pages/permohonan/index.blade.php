@extends('layouts.app')
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
                        {{-- <p id="demo"></p> --}}
                        @if (empty($data->id_user))
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
                            <table id="example" class="table table-hover table-bordered table-striped mb-5" width="100%"
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
                                        <th class="text-center" width="110px">Aksi</th>
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
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $app->tanggal_permohonan)->format('d F Y H:i:s') }}
                                            </td>
                                            <td class="text-center">
                                                @if ($app->status_permohonan == 'Kirim')
                                                    <span class="btn btn-sm btn-warning text-light mb-1">Dikirim
                                                    </span>
                                                    <br>
                                                    <span class="time-status">{{ $app->update_waktu_status }}</span>
                                                @elseif ($app->status_permohonan == 'Setujui')
                                                    <span class="btn btn-sm btn-success text-light mb-1">
                                                        Selesai
                                                    </span>
                                                    <br>
                                                    <span class="time-status">{{ $app->update_waktu_status }}</span>
                                                @elseif ($app->status_permohonan == 'Draft')
                                                    <span class="btn btn-sm btn-secondary text-light mb-1">
                                                        Draft
                                                    </span>
                                                    <br>
                                                    <span class="time-status">{{ $app->update_waktu_status }}</span>
                                                @elseif ($app->status_permohonan == 'Periksa')
                                                    <span class="btn btn-sm btn-info text-light mb-1">
                                                        Diproses
                                                    </span>
                                                    <br>
                                                    <span class="time-status">{{ $app->update_waktu_status }}</span>
                                                @else
                                                    <span class="btn btn-sm btn-danger text-light mb-1">
                                                        Ditolak
                                                    </span>
                                                    <br>
                                                    <span class="time-status">{{ $app->update_waktu_status }}</span>
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
                                                @if ($app->status_permohonan == 'Setujui')
                                                    <button class="btn btn-md bi bi-file-earmark-pdf color-orange"
                                                        onClick="window.open('{{ Storage::url($app->file_surat_permohonan) }}','_blank', 'location=yes,height=800,width=700,scrollbars=yes,status=yes');">
                                                    </button>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            @if ($app->status_permohonan == 'Setujui')
                                                @php
                                                    $date1 = new DateTime($timenow);
                                                    $date2 = new DateTime($app->update_waktu_status);
                                                    $diff = $date1->diff($date2);
                                                @endphp
                                                @if ($diff->m == 1 or $diff->d == 30)
                                                    <td class="text-center">
                                                        -
                                                    </td>
                                                @else
                                                    <td class="text-center">
                                                        {{-- <a href="{{ route('sanggah-permohonan', $app->id_application) }}"
                                            class="btn btn-secondary btn-sm">Sanggah</a> --}}
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#staticBackdrop{{ $app->id_application }}"
                                                            data-id="{{ $app->kode_permohonan }}">
                                                            Revisi
                                                        </button>
                                                    </td>
                                                @endif
                                            @elseif($app->status_permohonan == 'Kirim' or $app->status_permohonan == 'Periksa')
                                                <td class="text-center">
                                                    -
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <a href="{{ route('permohonan.edit', $app->id_application) }}"
                                                        class="btn btn-warning btn-sm ml-3"><i
                                                            class="fa-solid fa-pen-to-square"
                                                            title="Edit Permohonan {{ $app->keperluan }}"></i></a>
                                                    <a href="{{ route('permohonan.edit', $app->id_application) }}"
                                                        class="btn btn-warning btn-sm ml-3"><i
                                                            class="fa-solid fa-pen-to-square"
                                                            title="Edit Permohonan {{ $app->keperluan }}"></i></a>
                                                    <form action="{{ route('permohonan.destroy', $app->id_application) }}"
                                                        method="post" class="d-inline"
                                                        title="Hapus Permohonan {{ $app->keperluan }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
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
    {{-- <div id="preloader"></div> --}}
    @foreach ($applications as $app)
        @if ($app->status_permohonan == 'Setujui')
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop{{ $app->id_application }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Sanggah Permohonan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
@push('addon-script')
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
                // paging: true,
                // order: [
                //     [4, 'desc']
                // ],
                // stateSave: true,
                // pageLength: 10,
                // lengthMenu: [
                //     [5, 10, 25, 50, -1],
                //     [5, 10, 25, 50, 'All'],
                // ],
                // lengthChange: true,
                // searching: true,
                // ordering: true,
                // info: true,
                // autoWidth: true,
                // responsive: true,

            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
