@extends('layouts.app')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Selamat datang di Innovation Lab!</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Temui orang-orang kreatif, bagikan ide, dan bangun masa depan bersama-sama.</h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="{{ route('forum') }}" class="btn-get-started scrollto">Mulai Diskusi!</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="assets/img/hero-home.svg" class="img-fluid animated mt-5 pt-lg-5" style="height: 90%"
                        alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>About</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                        <p>
                            Di sini di Innovation Lab, kita seperti keluarga besar yang suka berbagi ide, curhatan, dan tawa
                            bersama. Gak cuma sekadar forum, tapi rumah bagi semua orang kreatif yang pengen diskusi tanpa batas!
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Tempat Nyaman Berbagi Ide</li>
                            <li><i class="ri-check-double-line"></i> Diskusi yang Asik</li>
                            <li><i class="ri-check-double-line"></i> Komunitas Ramah</li>
                            <li><i class="ri-check-double-line"></i> Komentar Tanpa Beban</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <p>
                            Innovation Lab bukan cuma tempat buat berdiskusi, tapi juga tempat buat bikin kenangan dan
                            pencapaian bareng-bareng. Mari langsung ikutan, temuin teman baru, dan bersama-sama kita ciptakan masa depan yang lebih keren!
                        </p>
                        <a href="#" class="btn-learn-more">Learn More</a>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->


    </main><!-- End #main -->
@endsection
