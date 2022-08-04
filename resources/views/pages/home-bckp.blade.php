@extends('layouts.main')
@section('content')
<div class="container py-3">
    <header class="p-3 mb-3 border-bottom">
        @include('includes.navbar')

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h3 class="fw-normal mb-5"><strong>Sistem Informasi Riset/Penelitian & Magang Dinas Kesehatan Kota Semarang</strong></h3>
            <p class="fs-5 text-muted">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
        </div>
    </header>



    <main>
        <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Permohonan Riset/Penelitian</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pricing-card-title text-left">Syarat Permohonan :</h5>
                        <ol class="list-group list-group-numbered mt-3 mb-3">
                            <li class="list-group-item">Mengisi form data pemohon</li>
                            <li class="list-group-item">Upload Surat Permohonan dari instansi terkait (pdf)</li>
                            <li class="list-group-item">Upload Proposal rencana penelitian (pdf, optional)</li>
                            <li class="list-group-item">Upload Foto KTP (jpg,png,pdf)</li>
                        </ol>
                        <h5 class="card-title pricing-card-title text-left">Biaya :</h5>
                        <p class="mt-3 mb-1" style="font-size: 16px">Rp. 100.000 - Rp. 400.000 per judul per peneliti</p>
                        <p class="text-danger mb-3" style="font-size: 12px">* Biaya disesuaikan dengan jenjang pendidikan pemohon sesuai dengan <a href="https://jdih.semarangkota.go.id/ildis_v2/public/pencarian/1333/detail" style="text-decoration: none" target="_blank">Peraturan Walikota Semarang</a></p>
                        <h5 class="card-title pricing-card-title text-left">Estimasi Proses :</h5>
                        <p class="mt-3 mb-3" style="font-size: 16px">3 Hari Kerja (Tidak termasuk hari Sabtu/Minggu dan hari libur nasional)</p>
                        <button type="button" class="w-100 btn btn-lg btn-secondary">Ajukan</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Permohonan Magang</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pricing-card-title">Syarat Permohonan</h5>
                        <ol class="list-group list-group-numbered mt-3 mb-3">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Cras justo odio</li>
                        </ol>
                        <button type="button" class="w-100 btn btn-lg btn-secondary" onclick="return(alert('Cooming Soon'))">Ajukan</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
