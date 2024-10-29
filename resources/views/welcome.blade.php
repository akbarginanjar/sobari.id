@extends('layouts.member')

@section('js')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
@endsection


@section('content')
    @php
        use Illuminate\Support\Facades\Http;
        use App\Models\Tb_tentang;
        use App\Models\Tb_keuntungan;
        use App\Models\Tb_pertanyan;
        use App\Models\Produk;
        use App\Models\Tb_artikel;
        use App\Models\Tb_slide;
        use Illuminate\Support\Carbon;
        use App\Models\Tb_setting;
        $setting = Tb_setting::find(1);
        $tentang = Tb_tentang::find(1);
        $keuntungan = Tb_keuntungan::find(1);
        $pertanyaan = Tb_pertanyan::all();
        $artikel = Tb_artikel::orderBy('created_at', 'desc')->paginate(8);
        $produk = Produk::all();
        $slide = Tb_slide::all();
    @endphp
    <!-- ======= Hero Section ======= -->
    <br><br><br>

    <style>
        .card-artikel {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 10px;
            width: 100%;
            border-radius: 13px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .card-artikel:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .list-tile__title {
            margin: 0;
            font-size: 1.1em;
            color: #333;
            font-weight: bold;
        }

        .list-tile__subtitle {
            margin: 5px 0 0;
            font-size: 0.8em;
            color: #666;
        }
    </style>

    {{-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($slide as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('images/slide/' . $item->gambar) }}" class="" style="width: 100%" alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --}}

    <div
        style="background: rgb(15,26,48);
    background: linear-gradient(217deg, rgba(15,26,48,1) 0%, rgba(46,67,112,1) 67%); border-bottom-left-radius: 100px; border-bottom-right-radius: 100px;">
        <div class="container"style="padding-top: 70px;">
            <div class="row mb-5">
                <div class="col-sm-5">
                    <center>
                        <img src="{{ asset('images/sobari.png') }}" data-aos="fade-right"
                            style="width: 300px; border-radius: 50%;" alt=""><br>
                    </center>
                </div>
                <div class="col-sm">
                    <div class="mt-4 text-white" style="margin-left: 30px;">
                        <h3 data-aos="fade-left"><b>DR. SOBARI., SE., MM., AK</b></h3>
                        <h4 data-aos="fade-left"><b>C.FR., C.Ht., C.DM., C.HRP., C.CC, C.IB, C.PMM</b></h4>
                        <hr>
                        <h5 data-aos="fade-up">Menguasai Bidang Keuangan, Audit, Analisis Keuangan, Manajemen, Human
                            Resource, Digital
                            Marketing,
                            Content Creator, Motivator, Hpnotheraphy, Training dan Konsultan.</h5>
                        <br>
                        <h5 data-aos="fade-up">NIDN. <b>0420108705</b></h5>
                        <br>
                        <a href="https://wa.me/{{ $setting->call_us }}" target="_blank">
                            <div data-aos="fade-up" class="btn text-black border-0 me-2 mb-2"
                                style="background: white; border-radius: 50px; ">
                                +{{ $setting->call_us }}</div>
                        </a>
                        <a href="mailto:{{ $setting->email_us }}" target="_blank">
                            <div data-aos="fade-up" class="btn text-black border-0 mb-2"
                                style="background: white; border-radius: 50px; ">
                                {{ $setting->email_us }}</div>
                        </a>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>


    <main id="main">




        {{-- <div class="" style="margin-top: 70px;">
            <div class="card border-0 text-white">
                <img src="{{ asset('images/bread.jpg') }}" style="height: 250px; object-fit: cover;" class="card-img"
                    alt="...">
                <div class="card-img-overlay" style=" background: rgba(0, 0, 0, 0.459);">
                    <div class="container mt-5">
                        <h5 class="h2"><b>Kontak Kami</b></h5>
                        Silahkan klik tombol untuk menghubungi kami dengan segera <br><br>
                        <a href="https://wa.me/{{ $setting->call_us }}" class="btn col-sm-2 text-black"
                            style="background: white; border-radius: 50px; box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.637);">Hubungi
                            Kami</a>
                    </div>
                </div>
            </div>
        </div> --}}

        <div>
            <div class="container py-3">
                <section id="recent-blog-posts" class="recent-blog-posts">

                    <div class="container" data-aos="fade-up">
                        {{-- <h4 class="" style="font-family: 'Nunito', sans-serif; color: #2E4370"><b>Artikel</b>
                        </h4> --}}
                        <div class="row">
                            @foreach ($artikel as $item)
                                <div class="col-lg-6 mt-3">
                                    <a href="/artikel/{{ $item->kategoriArtikel->slug }}/{{ $item->slug }}">
                                        <div class="row card-artikel">
                                            <div class="col-sm-3">
                                                <img src="{{ $item->gambar() }}" class="mb-2"
                                                    style="object-fit: cover; height: 120px; width: 100%; border-radius: 13px;"
                                                    alt="Avatar">
                                            </div>
                                            <div class="col-sm">
                                                <h3 class="list-tile__title">{!! Str::limit($item->judul, 30) !!}</h3>
                                                <span class="list-tile__subtitle"
                                                    style="">{{ Carbon::parse($artikel->tgl_pembuatan)->translatedFormat('D, d F Y') }}
                                                </span>
                                                <div class="text-primary">Lihat Detail</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="row">
                            <div class="col">
                                {!! $artikel->links() !!}
                            </div>
                            <div class="col">
                                <a href="/artikel" data-aos="fade-up" class="btn btn-sm btn-outline-secondary"
                                    style="float: right;">Lihat Semua Artikel</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- ======= About Section ======= -->
        {{-- <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="rounded shadow content" style="background: #0069FF;">
                            <h1 class="text-white">{{ $tentang->judul }}</h1>
                            <h2 class="text-white"> {{ $tentang->teks }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ $tentang->gambar() }}" class="" style="margin-left: 20px;" width="450"
                            alt="">
                    </div>

                </div>
            </div>

        </section> --}}
        <!-- End About Section -->




        <!-- ======= Counts Section ======= -->

        {{-- <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">
                <header class="section-header">

                    <p>List Materi Populer</p>
                </header>


                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #205eee;"></i>
                            <div>
                                <span>
                                    <h3>Matematika</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                            <div>
                                <span>
                                    <h3>UTBK</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #f938a2;"></i>
                            <div>
                                <span>
                                    <h3>Bisnis</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #06f077;"></i>
                            <div>
                                <span>
                                    <h3>Puisi</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gy-4" style="margin-top: 2%;">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #b7f7f9;"></i>
                            <div>
                                <span>
                                    <h3>Bahasa Arab</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #8e776a;"></i>
                            <div>
                                <span>
                                    <h3>Kimia</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #df7676;"></i>
                            <div>
                                <span>
                                    <h3>IT</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: ##31d71b;"></i>
                            <div>
                                <span>
                                    <h3>Bahasa korea</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section> --}}
        <!-- End Counts Section -->

        <!-- ======= Features Section ======= -->
        {{-- <section id="features" class="features">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>Keuntungan Berlangganan</p>
                </header>

                <div class="row">

                    <div class="col-lg-6">
                        <img src="{{ $keuntungan->gambar() }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks1 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks2 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks3 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Game Pembelajaran</h3>
                                    <h3>{{ $keuntungan->teks4 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks5 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks6 }}</h3>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> 

            </div>

        </section> --}}
        <!-- End Features Section -->


        {{-- <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Blog</h2>
                    <p>Produk Dan Layanan Kami</p>
                </header>

                <div class="row">
                    @foreach ($produk as $data_produk)
                        <div class="col-lg-4 mb-4">
                            <div class="post-box">
                                <div class=""><img src="{{ $data_produk->cover() }}"
                                        style="width: 100%; height: 150px; object-fit: cover;" class=""
                                        alt="">
                                </div>
                                <h3 class="post-title">{{ $data_produk->nama }}
                                </h3>
                                <div class="">{!! Str::limit($data_produk->deskripsi, 30) !!}</div>
                                <a href="/produk/{{ $data_produk->slug }}" class="readmore stretched-link mt-auto"
                                    style="margin-top: 50px;"><span>Lihat
                                        Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>

        </section> --}}

        <!-- ======= Services Section ======= -->
        {{-- <section id="services" class="services">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>Pelayanan Belajar.Link</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Fleksibel</h3>
                            <p>memudahkanmu dalam mengakses pembelajaran</p>
                            <a href="#" class=""></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-box orange">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Sertifikat</h3>
                            <p>Mendapatkan sertifikat resmi untuk kamu</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box #31d71b">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Interaktif</h3>
                            <p>Kamu akan mendapatkan pembelajaran melalui video Interaktif,game pembelajaran yang menarik
                                dan kuis yang dapat meningkatkan pembelajaranmu.</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-box red">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Tutor ahli</h3>
                            <p>Kamu akan mendapatkan tutor yang ahli dibidangnya sehingga dapat meningkatkan kemampuanmu.
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-box purple">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Tanya pembelajaran</h3>
                            <p>Kamu dapat bertanya kepada tutormu materi-materi yang tidak kamu pahami</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
                        <div class="service-box pink">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Referensi ervariasi</h3>
                            <p>Kamu akan mendapatkan latihan soal,mendapatkan e-book, vidio pembelajaran,dan salindia
                                mengenai materi pembelajaran.</p>

                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End Services Section -->





        {{-- <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Blog</h2>
                    <p>Recent posts form our Blog</p>
                </header>

                <div class="row">

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-1.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Tue, September 15</span>
                            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit
                            </h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-2.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Fri, August 28</span>
                            <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-3.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Mon, July 11</span>
                            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-3.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Mon, July 11</span>
                            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End Recent Blog Posts Section -->






        <!-- ======= F.A.Q Section ======= -->
        {{-- <section id="faq" class="faq">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>F.A.Q</h2>
                    <p>Pertanyaan Yang Sering Ditanyakan</p>
                </header>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="accordion accordion-flush" id="faqlist1">
                            @foreach ($pertanyaan as $item)
                                @if ($item->id <= 3)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq-content-{{ $item->id }}">
                                                {{ $item->pertanyaan }}
                                            </button>
                                        </h2>
                                        <div id="faq-content-{{ $item->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#faqlist1">
                                            <div class="accordion-body">
                                                {{ $item->jawaban }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6">

                        <div class="accordion accordion-flush" id="faqlist2">
                            @foreach ($pertanyaan as $item)
                                @if ($item->id > 3)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq2-content-{{ $item->id }}">
                                                {{ $item->pertanyaan }}
                                            </button>
                                        </h2>
                                        <div id="faq2-content-{{ $item->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#faqlist2">
                                            <div class="accordion-body">
                                                {{ $item->jawaban }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End F.A.Q Section -->







        <!-- ======= Portfolio Section ======= -->
        {{-- <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Portfolio</h2>
                    <p>Check our latest work</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-1.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-1.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-2.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-2.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-3.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-3.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 2"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-4.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-4.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 2"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-5.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-5.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 2"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-6.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-6.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-7.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 1</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-7.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 1"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-8.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 3</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-8.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-9.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-9.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        {{-- <section id="testimonials" class="testimonials">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Testimonials</h2>
                    <p>What they are saying about us</p>
                </header>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-1.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Saul Goodman</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-2.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Sara Wilsson</h3>
                                    <h4>Designer</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                                    duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-3.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Jena Karlis</h3>
                                    <h4>Store Owner</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                                    minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore
                                    labore illum veniam.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-4.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Matt Brandon</h3>
                                    <h4>Freelancer</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                    culpa fore nisi cillum quid.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-5.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>John Larson</h3>
                                    <h4>Entrepreneur</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section> --}}
        <!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        {{-- <section id="team" class="team">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Team</h2>
                    <p>Our hard working team</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-1.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum
                                    exercitationem iure minima enim corporis et voluptate.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-2.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit
                                    corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-3.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates
                                    enim aut architecto porro aspernatur molestiae modi.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-4.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid
                                    doloremque ut possimus ipsum officia.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End Team Section -->

        <!-- ======= Clients Section ======= -->
        {{-- <section id="clients" class="clients">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Our Clients</h2>
                    <p>Temporibus omnis officia</p>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-1.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-2.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-3.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-4.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-5.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-6.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-7.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-8.png') }}" class="img-fluid"
                                alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section> --}}
        <!-- End Clients Section -->

        <!-- ======= Recent Blog Posts Section ======= -->

        <!-- ======= Contact Section ======= -->
        {{-- <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Kontak</h2>
                    <p>Hubungi Kami</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>Bahagia Permai Raya<br>Buah Batu</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Telepone</h3>
                                    <p>+62 **** **** **<br>+62 **** **** **</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>Belajar.Link@gmail.com<br></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <!-- <h3>Open Hours</h3>
                                                              <p>Monday - Friday<br>9:00AM - 05:00PM</p> -->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </section> --}}
        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
