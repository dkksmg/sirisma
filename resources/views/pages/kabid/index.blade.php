@extends('layouts.backend')
@section('title', 'Kabid')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-5">
                <!-- Custom page header alternative example-->
                <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                    <div class="me-4 mb-3 mb-sm-0">
                        <h1 class="mb-0">Dashboard</h1>
                        <div class="small">
                            <span class="fw-500 text-primary">{{ \Carbon\Carbon::now()->translatedFormat('l') }}</span>
                            <span> &middot; {{ \Carbon\Carbon::now()->translatedFormat('d, F Y') }} &middot; </span>
                            <span id="jam"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <!-- Dashboard info widget 1-->
                        <div class="card border-start-lg border-start-primary h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold text-primary mb-1">Penelitian (Baru)</div>
                                        <div class="h5">1</div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-book fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <!-- Dashboard info widget 2-->
                        <div class="card border-start-lg border-start-secondary h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold text-secondary mb-1">Penelitian (Terproses)</div>
                                        <div class="h5">0</div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-building-columns fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <!-- Dashboard info widget 3-->
                        <div class="card border-start-lg border-start-success h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold text-success mb-1">Magang (Baru)</div>
                                        <div class="h5">0</div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-bars-progress fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <!-- Dashboard info widget 4-->
                        <div class="card border-start-lg border-start-info h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold text-info mb-1">Magang (Terproses)</div>
                                        <div class="h5">0</div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-users fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <!-- Area chart example-->
                        <div class="card mb-4">
                            <div class="card-header">Grafik Permohonan</div>
                            <div class="card-body">
                                <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Bar chart example-->
                                <div class="card h-100">
                                    <div class="card-header">Sales Reporting</div>
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <div class="chart-bar"><canvas id="myBarChart" width="100%"
                                                height="30"></canvas></div>
                                    </div>
                                    <div class="card-footer position-relative">
                                        <a class="stretched-link" href="#!">
                                            <div class="text-xs d-flex align-items-center justify-content-between">
                                                View More Reports
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Pie chart example-->
                                <div class="card h-100">
                                    <div class="card-header">Traffic Sources</div>
                                    <div class="card-body">
                                        <div class="chart-pie mb-4"><canvas id="myPieChart" width="100%"
                                                height="50"></canvas></div>
                                        <div class="list-group list-group-flush">
                                            <div
                                                class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                                <div class="me-3">
                                                    <i class="fas fa-circle fa-sm me-1 text-blue"></i>
                                                    Direct
                                                </div>
                                                <div class="fw-500 text-dark">55%</div>
                                            </div>
                                            <div
                                                class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                                <div class="me-3">
                                                    <i class="fas fa-circle fa-sm me-1 text-purple"></i>
                                                    Social
                                                </div>
                                                <div class="fw-500 text-dark">15%</div>
                                            </div>
                                            <div
                                                class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                                <div class="me-3">
                                                    <i class="fas fa-circle fa-sm me-1 text-green"></i>
                                                    Referral
                                                </div>
                                                <div class="fw-500 text-dark">30%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('includes.cs.footer')
    </div>
@endsection
@push('addon-script')
    <script type="text/javascript">
        function showTime() {
            var tanggal = new Date();
            var jam = tanggal.getHours();
            var menit = tanggal.getMinutes();
            var detik = tanggal.getSeconds();

            if (jam == 0) {
                jam = 24;
            }
            if (jam > 24) {
                jam = jam - 24;
            }
            jam = checkTime(jam);
            menit = checkTime(menit);
            detik = checkTime(detik);
            document.getElementById("jam").innerHTML = jam + ":" + menit + ":" + detik;
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        setInterval(showTime, 500);
    </script>
@endpush
