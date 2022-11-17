@extends('layouts.app')
@section('content')
    @include('includes.description')

    <main id="main" class="mb-5">
        <!-- ======= Features Section ======= -->
        <section id="syarat" class="features">
            <div class="container" data-aos="fade-up">
                <ul class="nav nav-tabs row gy-4 d-flex">

                    <li class="nav-item col-6 col-md-4 col-lg-3">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                            <i class="bi bi-binoculars color-cyan"></i>
                            <h4>Permohonan Riset/Penelitian</h4>
                        </a>
                    </li><!-- End Tab 1 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                            <i class="bi bi-box-seam color-indigo"></i>
                            <h4>Permohonan Magang/PKL</h4>
                        </a>
                    </li><!-- End Tab 2 Nav -->

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row gy-4">
                            <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                                <h3>Syarat Permohonan</h3>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Mengisi form data pemohon.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Upload Surat Permohonan dari instansi
                                        terkait (pdf).</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Upload Proposal rencana penelitian (pdf,
                                        optional).</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Upload Foto KTP (jpg, png, pdf).</li>
                                </ul>
                                <h3>Biaya</h3>
                                <p class="mt-3 mb-1" style="font-size: 16px">Rp. 100.000 - Rp. 400.000 per judul per
                                    peneliti</p>
                                <p class="text-danger mb-3" style="font-size: 12px">* Biaya disesuaikan dengan jenjang
                                    pendidikan pemohon sesuai dengan <a
                                        href="https://jdih.semarangkota.go.id/ildis_v2/public/pencarian/1333/detail"
                                        style="text-decoration: none" target="_blank">Peraturan Walikota Semarang</a> Nomor
                                    23 Tahun 2022 Tentang Tarif Pelayanan Badan Layanan Umum Daerah Unit Pelaksana Teknis
                                    Dinas Pusat Kesehatan Masyarakat</p>
                                <h3>Estimasi Proses</h3>
                                <p class="mt-3 mb-3" style="font-size: 16px">3 Hari Kerja (Tidak termasuk hari Sabtu/Minggu
                                    dan hari libur nasional)</p>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="assets/img/features-1.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 1 -->

                    <div class="tab-pane" id="tab-2">
                        <div class="row gy-4">
                            <div class="col-lg-6 order-2 order-lg-1">
                                <h3>Syarat Permohonan</h3>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Cek kuota magang/PKL.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Pengajuan permohonan magang <b>wajib 1 bulan
                                            sebelum magang</b>.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Mengisi form data pemohon.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Upload Surat Permohonan dari instansi
                                        terkait (pdf).</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Upload Proposal rencana penelitian (pdf,
                                        optional).</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Upload Foto KTP (jpg, png, pdf).</li>
                                </ul>
                                <h3>Biaya</h3>
                                <p class="mt-3 mb-1" style="font-size: 16px">Rp. 40.000 - Rp. 200.000 per orang per
                                    minggu</p>
                                <p class="text-danger mb-3" style="font-size: 12px">* Biaya disesuaikan dengan jenjang
                                    pendidikan pemohon sesuai dengan <a
                                        href="https://jdih.semarangkota.go.id/ildis_v2/public/pencarian/1333/detail"
                                        style="text-decoration: none" target="_blank">Peraturan Walikota Semarang</a> Nomor
                                    23 Tahun 2022 Tentang Tarif Pelayanan Badan Layanan Umum Daerah Unit Pelaksana Teknis
                                    Dinas Pusat Kesehatan Masyarakat</p>
                                <h3>Estimasi Proses</h3>
                                <p class="mt-3 mb-3" style="font-size: 16px">3 Hari Kerja (Tidak termasuk hari Sabtu/Minggu
                                    dan hari libur nasional)</p>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="assets/img/features-2.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 2 -->

                </div>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="panduan" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Panduan</h2>
                </div>

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="pricing-item">

                            <div class="pricing-header">
                                <h3>Free Plan</h3>
                                <h4><sup>$</sup>0<span> / month</span></h4>
                            </div>

                            <ul>
                                <li><i class="bi bi-dot"></i> <span>Quam adipiscing vitae proin</span></li>
                                <li><i class="bi bi-dot"></i> <span>Nec feugiat nisl pretium</span></li>
                                <li><i class="bi bi-dot"></i> <span>Nulla at volutpat diam uteera</span></li>
                                <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
                                <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span>
                                </li>
                            </ul>

                            <div class="text-center mt-auto">
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>

                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                        <div class="pricing-item featured">

                            <div class="pricing-header">
                                <h3>Business Plan</h3>
                                <h4><sup>$</sup>29<span> / month</span></h4>
                            </div>

                            <ul>
                                <li><i class="bi bi-dot"></i> <span>Quam adipiscing vitae proin</span></li>
                                <li><i class="bi bi-dot"></i> <span>Nec feugiat nisl pretium</span></li>
                                <li><i class="bi bi-dot"></i> <span>Nulla at volutpat diam uteera</spa>
                                </li>
                                <li><i class="bi bi-dot"></i> <span>Pharetra massa massa ultricies</spa>
                                </li>
                                <li><i class="bi bi-dot"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                            </ul>

                            <div class="text-center mt-auto">
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>

                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="600">
                        <div class="pricing-item">

                            <div class="pricing-header">
                                <h3>Developer Plan</h3>
                                <h4><sup>$</sup>49<span> / month</span></h4>
                            </div>

                            <ul>
                                <li><i class="bi bi-dot"></i> <span>Quam adipiscing vitae proin</span></li>
                                <li><i class="bi bi-dot"></i> <span>Nec feugiat nisl pretium</span></li>
                                <li><i class="bi bi-dot"></i> <span>Nulla at volutpat diam uteera</span></li>
                                <li><i class="bi bi-dot"></i> <span>Pharetra massa massa ultricies</span></li>
                                <li><i class="bi bi-dot"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                            </ul>

                            <div class="text-center mt-auto">
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>

                        </div>
                    </div><!-- End Pricing Item -->

                </div>

            </div>
        </section>
        <!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row gy-4">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content px-xl-5">
                            <h3>Frequently Asked <strong>Questions</strong></h3>
                            {{-- <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            </p> --}}
                        </div>

                        <div class="accordion accordion-flush px-xl-5" id="faqlist">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($faqs as $faq)
                                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $no }}">
                                            <i class="bi bi-question-circle question-icon"></i>
                                            {{ $faq->judul_faq }}
                                        </button>
                                    </h3>
                                    <div id="faq-content-{{ $no }}" class="accordion-collapse collapse"
                                        data-bs-parent="#faqlist">
                                        <div class="accordion-body">
                                            {{ $faq->isi_faq }}
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $no++;
                                @endphp
                                <!-- # Faq item-->
                            @endforeach
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-image: url("{{ url('assets/img/faq.jpg') }}");'>&nbsp;</div>
                </div>

            </div>
        </section><!-- End F.A.Q Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-header">
                    <h2>Kontak Kami</h2>
                    <p>Untuk pertanyaan serta umpan balik mengenai permohonan penelitian atau magang, silakan hubungi kami
                        melalui formulir
                        dibawah.</p>
                </div>

            </div>

            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1884457880283!2d110.41243491472099!3d-6.987070294952565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b5ab6b34b67%3A0x4eba79d618667033!2sSemarang%20City%20Health%20Office!5e0!3m2!1sen!2sid!4v1659495326150!5m2!1sen!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="yes" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div><!-- End Google Maps -->

            <div class="container">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4">

                        <div class="info">
                            {{-- <h3>Get in touch</h3>
                            <p>Et id eius voluptates atque nihil voluptatem enim in tempore minima sit ad mollitia commodi
                                minus.</p> --}}

                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Lokasi:</h4>
                                    <p> Jl. Pandanaran No.79, Mugassari, Kec. Semarang Selatan, Kota Semarang, Jawa Tengah
                                        50249</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p><a href="mailto:infokes.dkksemarang@gmail.com" target="_blank"
                                            class="text-decoration-none text-muted">infokes.dkksemarang@gmail.com</a>
                                    </p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Telp:</h4>
                                    <p>
                                        <a href="tel:0248318070" target="_blank"
                                            class="text-decoration-none text-muted">(024) 8318070</a>
                                    </p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                    <div class="col-lg-8">
                        <form action="{{ route('simpan-pesan') }}" method="POST" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="nama_lengkap"
                                        class="form-control @error('nama_lengkap') is-invalid @enderror" id="name"
                                        placeholder="Nama Lengkap" <?php if(isset(Auth::user()->name)):?> value="{{ Auth::user()->name }}"
                                        <?php else: ?> value="{{ old('nama_lengkap') }}" <?php endif ?>>
                                    @error('nama_lengkap')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Alamat Email"<?php if(isset(Auth::user()->name)):?>
                                        value="{{ Auth::user()->email }}" <?php else: ?> value="{{ old('email') }}"
                                        <?php endif ?>>
                                    @error('email')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control @error('subject_kontak') is-invalid @enderror"
                                    name="subject_kontak" id="subject" placeholder="Subjek"
                                    value="{{ old('subject_kontak') }}">
                                @error('subject_kontak')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" placeholder="Pesan">{{ old('pesan') }}</textarea>
                                @error('pesan')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="my-3">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="text-center"><button type="submit" class="btn btn-md">Kirim</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

    </main><!-- End #main -->
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
@endsection
