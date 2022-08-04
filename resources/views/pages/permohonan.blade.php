@extends('layouts.app')
@section('content')
    <main id="main">
        <section id="hero-static" class="hero-static">
            <div class="container">
                <div class="section-header">
                    <h2>Daftar Permohonan</h2>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Instansi</th>
                                    <th class="text-center">Jenis Permohonan</th>
                                    <th class="text-center">Keperluan</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-center">File Surat Pengantar</th>
                                    <th class="text-center">File Proposal</th>
                                    <th class="text-center">Tanggal Permohonan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">File Permohonan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">Tiger Nixon</td>
                                    <td class="text-center">UDINUS</td>
                                    <td class="text-center">Permohonan Pengambilan Data</td>
                                    <td class="text-center">Pengambilan Data COVID-19 di Puskemas Rowosari pada bulan
                                        Desember 2021 hingga Maret 2022</td>
                                    <td class="text-center">1 Desember 2021 - 30 Maret 2022</td>
                                    <td class="text-center">surat_saya.pdf</td>
                                    <td class="text-center">testing.pdf</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Garrett Winters</td>
                                    <td class="text-center">Accountant</td>
                                    <td class="text-center">Tokyo</td>
                                    <td class="text-center">63</td>
                                    <td class="text-center">2011-07-25</td>
                                    <td class="text-center">$170,750</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Ashton Cox</td>
                                    <td class="text-center">Junior Technical Author</td>
                                    <td class="text-center">San Francisco</td>
                                    <td class="text-center">66</td>
                                    <td class="text-center">2009-01-12</td>
                                    <td class="text-center">$86,000</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Cedric Kelly</td>
                                    <td class="text-center">Senior Javascript Developer</td>
                                    <td class="text-center">Edinburgh</td>
                                    <td class="text-center">22</td>
                                    <td class="text-center">2012-03-29</td>
                                    <td class="text-center">$433,060</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Airi Satou</td>
                                    <td class="text-center">Accountant</td>
                                    <td class="text-center">Tokyo</td>
                                    <td class="text-center">33</td>
                                    <td class="text-center">2008-11-28</td>
                                    <td class="text-center">$162,700</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Direvisi</td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Brielle Williamson</td>
                                    <td class="text-center">Integration Specialist</td>
                                    <td class="text-center">New York</td>
                                    <td class="text-center">61</td>
                                    <td class="text-center">2012-12-02</td>
                                    <td class="text-center">$372,000</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Direvisi</td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Herrod Chandler</td>
                                    <td class="text-center">Sales Assistant</td>
                                    <td class="text-center">San Francisco</td>
                                    <td class="text-center">59</td>
                                    <td class="text-center">2012-08-06</td>
                                    <td class="text-center">$137,500</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Rhona Davidson</td>
                                    <td class="text-center">Integration Specialist</td>
                                    <td class="text-center">Tokyo</td>
                                    <td class="text-center">55</td>
                                    <td class="text-center">2010-10-14</td>
                                    <td class="text-center">$327,900</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Colleen Hurst</td>
                                    <td class="text-center">Javascript Developer</td>
                                    <td class="text-center">San Francisco</td>
                                    <td class="text-center">39</td>
                                    <td class="text-center">2009-09-15</td>
                                    <td class="text-center">$205,500</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Sonya Frost</td>
                                    <td class="text-center">Software Engineer</td>
                                    <td class="text-center">Edinburgh</td>
                                    <td class="text-center">23</td>
                                    <td class="text-center">2008-12-13</td>
                                    <td class="text-center">$103,600</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Jena Gaines</td>
                                    <td class="text-center">Office Manager</td>
                                    <td class="text-center">London</td>
                                    <td class="text-center">30</td>
                                    <td class="text-center">2008-12-19</td>
                                    <td class="text-center">$90,560</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Quinn Flynn</td>
                                    <td class="text-center">Support Lead</td>
                                    <td class="text-center">Edinburgh</td>
                                    <td class="text-center">22</td>
                                    <td class="text-center">2013-03-03</td>
                                    <td class="text-center">$342,000</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Charde Marshall</td>
                                    <td class="text-center">Regional Director</td>
                                    <td class="text-center">San Francisco</td>
                                    <td class="text-center">36</td>
                                    <td class="text-center">2008-10-16</td>
                                    <td class="text-center">$470,600</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Haley Kennedy</td>
                                    <td class="text-center">Senior Marketing Designer</td>
                                    <td class="text-center">London</td>
                                    <td class="text-center">43</td>
                                    <td class="text-center">2012-12-18</td>
                                    <td class="text-center">$313,500</td>
                                    <td class="text-center">Testing</td>
                                    <td class="text-center">{{ date('d F Y H:i:s') }}</td>
                                    <td class="text-center">Disetujui</td>
                                    <td class="text-center"><i class="btn btn-md bi bi-file-earmark-pdf color-orange"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollY: '150vh',
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                stateSave: true,
                responsive: true,
            });
        });
    </script>
@endpush
