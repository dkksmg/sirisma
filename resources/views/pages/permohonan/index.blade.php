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
                        <a class="btn btn-sm btn-success mb-3" href="{{ route('permohonan.create') }}">Tambah Permohonan</a>
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
                                        <th class="text-center">Waktu</th>
                                        <th class="text-center">Tanggal Permohonan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">File Surat Pengantar</th>
                                        <th class="text-center">File Proposal</th>
                                        <th class="text-center">Biaya</th>
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
                                                {{ \Carbon\Carbon::create($app->waktu_awal)->translatedFormat('d F Y') . ' s/d ' . \Carbon\Carbon::create($app->waktu_akhir)->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $app->tanggal_permohonan)->format('d F Y H:i:s') }}
                                                {{-- {{ $app->tanggal_permohonan }} --}}
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
                                                @if (!empty($app->biaya_permohonan))
                                                    {{ 'Rp' . number_format($data->education->biaya, 0, ',', '.') }}
                                                @else
                                                    Rp0
                                                @endif
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
                                                        <a href="{{ route('permohonan.edit', $app->id_application) }}"
                                                            class="btn btn-secondary btn-sm">Sanggah</a>
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
    <div id="preloader"></div>
@endsection
@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true,
                // order: [
                //     [4, 'desc']
                // ],
                // stateSave: true,
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'All'],
                ],
                lengthChange: true,
                searching: true,
                ordering: false,
                info: true,
                autoWidth: true,
                responsive: true,

            });
        });
    </script>
@endpush
