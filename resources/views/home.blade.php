<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="{{asset('css/landing.css')}}">
    @include('imports.css')

</head>

<body>

    <header class='main-hero'>
        <!-- Navbar -->
        @include('layouts.navbar')

        <!-- Hero Section -->
        <div class="hero">
            <img class="hero-image" src="{{ asset('images/students-2022.png') }}" alt="Welcome Image" />
            <div class="hero-container">
                <h2 class="hero-caption">SELAMAT <span style="color: #f5ab35;">DATANG</span></h2>
                <p>SMK Negeri 7 Samarinda Sebagai SMK Pusat Keunggulan, Menjadi SMK Unggulan yang Menghasilkan Sumber
                    Daya Manusia Bermutu dan Berdaya Saing Menuju CENTER OF EXCELLENCE.</p>
                <button>JELAJAHI</button>
            </div>
        </div>

    </header>

    <!-- Info Section -->
    <div class="info-section">
        <a href="/blogs" class="info-box box-1"
            style="background-image: url({{asset('images/student-activity-388x370.jpeg')}})">
            <div class="info-link"></div>
            <h2>INFO <span>PENTING</span></h2>
        </a>
        <div class="info-box box-2"
            style="background-image: url({{asset('images/class-activity-388x370.jpeg')}}); ">
            <a href="#" class="info-link"></a>
            <h2>KEGIATAN <span>KELAS</span></h2>
        </div>
        <a href="/teachers" class="info-box box-3"
            style="background-image: url({{asset('/images/teacher-profile-388x370.jpeg')}}); ">
            <div class="info-link"></div>
            <h2>PROFIL <span>GURU</span></h2>
        </a>
    </div>

    <!-- Content Section -->
    <section class="welcome">
        <div class="welcome-text">

            <section class="fcol g-1">
                <div class="h-2">Sambutan Kepala Sekolah</div>
                <div class="h-1">MELANGKAH MENUJU PRESTASI</div>
            </section>

            <p>Mengembangkan bidang keahlian Teknologi Informasi dan Komunikasi, Memberikan kontribusi bagi percepatan
                pembangunan di Kalimantan Timur, Mengembangkan manajemen pendidikan berbasis sekolah secara pro aktif
                dan kreatif, dan Memacu perkembangan pendidikan yang lebih kompetitif dan mandiri.</p>

            <section class="fcol">
                <img class='welcome-signature' src="{{ asset('images/signature.png') }}" alt="Sambutan Kepala Sekolah">
                <div class="sh-1">Anda Supanda, S.Pd., M.Pd.</div>
                <div class='sh-2'>Kepala SMK Negeri 7 Samarinda</div>
            </section>
        </div>

        <div class="welcome-photo">
            <img src="{{ asset('images/1.png') }}" alt="Sambutan Kepala Sekolah">
        </div>
    </section>

    <section class="welcome-850">
        <div class="welcome-text">

            <section class="fcol">
                <img class='welcome-signature' src="{{ asset('images/signature.png') }}" alt="Sambutan Kepala Sekolah">
                <div class="sh-1">Anda Supanda, S.Pd., M.Pd.</div>
                <div class='sh-2'>Kepala SMK Negeri 7 Samarinda</div>
            </section>

            <div class="welcome-photo">
                <img src="{{ asset('images/1.png') }}" alt="Sambutan Kepala Sekolah">
            </div>

            <section class="fcol g-1">
                <div class="h-2">Sambutan Kepala Sekolah</div>
                <div class="h-1">MELANGKAH MENUJU PRESTASI</div>
            </section>

            <p>Mengembangkan bidang keahlian Teknologi Informasi dan Komunikasi, Memberikan kontribusi bagi percepatan
                pembangunan di Kalimantan Timur, Mengembangkan manajemen pendidikan berbasis sekolah secara pro aktif
                dan kreatif, dan Memacu perkembangan pendidikan yang lebih kompetitif dan mandiri.</p>
        </div>

    </section>

    <section class="faith-section fcol">

        <div class="faith-section-header fcol g-2 aicenter jccenter">
            <h3>TAMATAN YANG BERMUTU, KOMPETITIF DAN MANDIRI</h3>
            <p>Menjadi Sekolah Bidang Teknologi Informasi Dan Komunikasi Bertaraf Internasional Berwawasan
                Lingkungan Dilandasi Iman Dan Taqwa</p>
        </div>

        <div class="faith-section-content">

            <div class="fcol">
                <a href="">
                    <div class="faith-logo"><img src="{{ asset('images/we-have-faith-img-1.png') }}" alt="Motivasi">
                    </div>
                </a>
                <h4>Motivasi</h4>
                <p>Menjadikan agama sebagai sumber motivasi dan inspirasi</p>
            </div>

            <div class="fcol">
                <a href="">
                    <div class="faith-logo"><img src="{{ asset('images/we-have-faith-img-2.png') }}" alt="Bersih">
                    </div>
                </a>
                <h4>Bersih</h4>
                <p>Mewujudkan sekolah yang bersih, hijau, dan indah (Green School)</p>
            </div>

            <div class="fcol">
                <a href="">
                    <div class="faith-logo"><img src="{{ asset('images/we-have-faith-img-3.png') }}" alt="Tamatan">
                    </div>
                </a>
                <h4>Tamatan</h4>
                <p>Menyelenggarakan pendidikan yang berstandar internasional</p>
            </div>

            <div class="fcol">
                <a href="">
                    <div class="faith-logo"><img src="{{ asset('images/we-have-faith-img-4.png') }}" alt="Prestasi">
                    </div>
                </a>
                <h4>Prestasi</h4>
                <p>Menghasilkan tamatan yang bermutu, kompetitif dan mandiri.</p>
            </div>
        </div>

    </section>

    <section class="cta-content">
        <img src="{{ asset('images/call-to-action-img.png') }}" alt="CTA">

        <div class="cta-text">
            <section class="fcol">
                <h3>Pendaftaran Peserta Didik Baru</h3>
                <h5>"Ayo bergabung bersama kami !"</h5>
            </section>
            <a href="http://cabdinsamarinda.siap-ppdb.com/" class="cta-btn">DAFTAR</a>
        </div>
    </section>

    <section class="academic-calendar fcol aicenter jcenter">
        <h2>KALENDER AKADEMIK</h2>
        <p>Siswa-siswa kami ialah siswa siswa yang berbakat, tekun dan penuh kreatifitas. Kami mendukung
            dalam mewujudkan ide-ide mereka. Pemanfaatan kesempatan ialah fokus kami. <a href="#">Lihat Jadwal
                Seluruhnya</a>
        </p>
    </section>

    <section class="achievements" style="background-image: {{ asset('images/achievements-bg.jpg') }}">
        <h2 class="achievements-section-header">PRESTASI GURU DAN SISWA</h2>

        <div class="achievements-section-content">

            <div class="fcol">
                <h3 class="home-count" data-no-comma='true'>2002</h3>
                <p>DIDIRIKAN</p>
            </div>

            <div class="fcol">
                <h3 class="home-count">30</h3>
                <p>GURU BERSERTIFIKAT</p>
            </div>

            <div class="fcol">
                <h3 class="home-count">6,000</h3>
                <p>JUMLAH LULUSAN</p>
            </div>

            <div class="fcol">
                <h3 class="home-count">289</h3>
                <p>PENGHARGAAN</p>
            </div>

        </div>
    </section>

    <section class="featured-news fcol ga-4">
        <h2 class="news-header">BERITA TERKINI</h2>

        <div class="news-content frow g-2">
            @foreach ($posts as $post)
                <div class="news-item" onclick="window.location.href = '{{ url('blogs', $post->slug) }}' ">

                    <div class="news-item-meta-data">

                        <section class="frow g-1">
                            <img src="{{ asset('images/cropped-logo_smkn7-1.png') }}" alt="school-icon">
                            <span>{{ $post->user->username ?? 'Unknown Author' }}</span>
                        </section>

                        <div class="news-date-info">
                            <span>{{ $post->created_at->format('d M') }}</span>
                        </div>

                    </div>

                    <div class="item-image">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                    </div>
                    <div class="item-info">
                        <h3>{{ $post->title }}</h3>
                        <p>{!! Str::words(strip_tags($post->content), 50, '...') !!}</p>
                        <a href="{{ url('blogs', $post->slug) }}" class="read-more">Read More</a>
                    </div>

                </div>
            @endforeach
        </div>
    </section>


    <section class="featured-gallery frow">
        <div class="large-image">
            <a href="#"
                onclick="openModal('galleryModal', 'images/gallery-1.jpeg', 'Caption for Image 1'); return false;">
                <img src="images/gallery-1.jpeg" alt="Gallery Image 1">
            </a>
        </div>

        <div class="small-images">
            <a href="#"
                onclick="openModal('galleryModal', 'images/gallery-2.jpeg', 'Caption for Image 2'); return false;">
                <img src="images/gallery-2.jpeg" alt="Gallery Image 2">
            </a>
            <a href="#"
                onclick="openModal('galleryModal', 'images/gallery-4.jpeg', 'Caption for Image 4'); return false;">
                <img src="images/gallery-4.1.jpeg" alt="Gallery Image 4">
            </a>
            <a href="#"
                onclick="openModal('galleryModal', 'images/gallery-3.jpeg', 'Caption for Image 3'); return false;">
                <img src="images/gallery-3.jpeg" alt="Gallery Image 3">
            </a>
            <a href="#"
                onclick="openModal('galleryModal', 'images/gallery-5.jpeg', 'Caption for Image 5'); return false;">
                <img src="images/gallery-5.jpeg" alt="Gallery Image 5">
            </a>
        </div>
    </section>

    <!-- Gallery Modal -->
    <div id="galleryModal" class="gallery-modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal('galleryModal')">&times;</span>
            <img id="modal-image" src="" alt="Gallery Image">
            <p id="modal-caption"></p>
        </div>
    </div>


    <section class="featured-video">
        <div class="featured-desc">
            <h2>PROFIL KAMI</h2>
            <p>
                SMK Negeri 7 Samarinda Sebagai SMK PUSAT KEUNGGULAN. Menjadi SMK Unggulan yang Menghasilkan
                Sumber Daya Manusia Bermutu dan Berdaya Saing Tinggi Menuju CENTER OF EXCELLENCY.
            </p>
            <a href="#" class="primary-link hvr-push">Selengkapnya</a>
        </div>

        <div class="content-video">
            <a class="play-youtube" data-featherlight="iframe"
                href="https://www.youtube.com/embed/ed9ENfQ_Nag?autoplay=1">
                <img src="{{ asset('images/tumb-767x500.png') }}" alt="PROFIL KAMI">
            </a>
        </div>
    </section>

    <section class="impressions">

        <section class="impression-quotes fcol jccenter aicenter">
            <h1>KESAN ALUMNI</h1>
            <div class="col-sm-12">
                <div class="tab-content">

                    <div class="tab-pane" id="testimonial-1" data-tab="2">
                        Pengalaman saya selama belajar di SMKN 7 SAMARINDA, terutama di jurusan Teknologi Komputer
                        dan Jaringan. Di sekolah ini saya tidak hanya diajarkan teori dan praktek saja tetapi saya
                        diajarkan hal-hal lain yang sangat berguna dan dapat diterima siswa yang akhirnya melatih
                        iman, moral, mental, dan karakter siswa. Guru-guru disini pun mengajar dengan karakter
                        masing-masing yang unik, lucu, disiplin, tegas dan membantu saya mengerti materi pengajaran
                        dengan baik. Fasilitas di sekolah ini pun cukup lengkap terdapat lab khusus jurusan yang di
                        dalamya berisi komputer Komputer, kantin di sekolah ini pun sudah menerapkan pembayaran
                        menggunakan QRIS atau Cashless.
                    </div>
                    <div class="tab-pane" id="testimonial-2" data-tab="1">
                        Alhamdulillah, Saya sangat bangga menjadi bagian keluarga besar SMKN 7 Samarinda, dimana
                        guru guru nya sangat disiplin dalam mendidik anak anak didiknya, dan juga di saat yg tepat
                        akan menjadi orang tua yg bijaksana dan bahkan menjadi sahabat. Dengan fasilitas yang
                        lengkap, membuat muridnya bisa membangkitkan bakat bakat terpendam dan mengembangkan diri
                        menjadi murid yg berprestasi di bidangnya.
                    </div>
                    <div class="tab-pane active" id="testimonial-3" data-tab="0">
                        SMKN 7 Samarinda adalah salah satu sekolah yang sangat mendukung tentang bakat dan minat
                        siswa nya, memberi kebebasan dalam berkreasi, juga guru guru yang cukup terampil di
                        bidangnya. Senang bisa bersekolah dan menuntut ilmu di SMKN 7 Samarinda.
                    </div>
                    <div class="tab-pane" id="testimonial-4" data-tab="-1">
                        Pengalaman tahun pertama saya Di SMKN 7 Samarinda, saya merasa wawasan saya menjadi lebih
                        luas dan juga menambah skill coding saya dari ilmu yang di berikan oleh guru di SMKN 7
                        Samarinda, I LOVE SMKN 7 Samarinda ♥️♥️.
                    </div>

                    <div class="tab-pane" id="testimonial-5" data-tab="-2">
                        Selama saya bersekolah di smkn 7 samarinda, saya mendapat banyak pengalaman baru dan banyak
                        motivasi untuk masa depan saya, smkn 7 samarinda merupakan salah satu sekolah pusat
                        keunggulan yang memiliki segudang pretasi didalamnya, memiliki guru-guru yang dapat
                        memotivasi dan mengajarkan begitu banyak hal tentang pelajaran dan kehidupan. Dan smkn 7
                        samarinda mempunyai fasilitas yang sangat luar biasa seperti lab dkv yang dapat digunakan
                        dengan nyaman saat pembelajaran, warung teknologi (wartek) yang sangat nyaman buat jajan,,,
                        nah di wartek ini kita jajan dengan cara baru nih, sudah tidak memakai uang cash karena smkn
                        7 samarinda sangat taat protokol kesehatan pada saat pandemi covid-19. pokoknya sekolah di
                        smkn 7 samarinda sangat menyenangkan
                        <img draggable="false" role="img" class="emoji" alt="😊"
                            src="https://s.w.org/images/core/emoji/14.0.0/svg/1f60a.svg">
                    </div>

                </div>
            </div>
        </section>
        <main class="impression-main-slider" data-sliderz-main data-counter-type="normal"
            style="--height-slider: 400px; --width-slider: 100%;">
            <section class="slider-control">
                <div data-slider_controller="left"> <i class="fa-solid fa-arrow-left"></i> </div>
                <div data-slider_controller="right"> <i class="fa-solid fa-arrow-right"></i> </div>
            </section>

            <div data-slider-holder>
                <ul data-slider-track='normal'>

                    <li class="" data-tab data-slider-item>
                        <section class="impression-child-holder">
                            <section class="impression-image-contain"><img src="{{ asset('images/testi-1.jpeg') }}"
                                    alt="Jelita"></section>
                            <strong>Jelita Islami Delina Putri</strong>
                            <span>Siswa TJKT</span>
                        </section>
                    </li>

                    <li class="" data-tab data-slider-item>
                        <section class="impression-child-holder">
                            <section class="impression-image-contain"><img src="{{ asset('images/testi-2.jpeg') }}"
                                    alt="Ridho"></section>
                            <strong>Ridho Morita</strong>
                            <span>Siswa TJKT</span>
                        </section>
                    </li>

                    <li class="active" data-tab data-slider-item>
                        <section class="impression-child-holder">
                            <section class="impression-image-contain"><img src="{{ asset('images/testi-3.jpg') }}"
                                    alt="Rey"></section>
                            <strong>Rey Azhar Satriaji</strong>
                            <span>Siswa TJKT</span>
                        </section>
                    </li>

                    <li class="" data-tab data-slider-item>
                        <section class="impression-child-holder">
                            <section class="impression-image-contain"><img src="{{ asset('images/testi-4.jpeg') }}"
                                    alt="Ahmad"></section>
                            <strong>Ahmad Ribbiy Aldi</strong>
                            <span>Siswa PPLG</span>
                        </section>
                    </li>

                    <li class="" data-tab data-slider-item>
                        <section class="impression-child-holder">
                            <section class="impression-image-contain"><img src="{{ asset('images/testi-5.jpeg') }}"
                                    alt="Ananda"></section>
                            <strong>Ananda DWI</strong>
                            <span>Siswa DKV</span>
                        </section>
                    </li>
                </ul>

            </div>
            <div class="sliderz-indicator" style="--offset-indicator: -40px" data-sliderz-indicator>
            </div>
        </main>
    </section>

    <section class="page-sponsor">
        <img src="{{ asset('images/google-sm.png') }}" alt="Sponsor Logo">
        <img src="{{ asset('images/bisaai-sm.png') }}" alt="Sponsor Logo">
        <img src="{{ asset('images/kedata.png') }}" alt="Sponsor Logo">
        <img src="{{ asset('images/Jupiter_IT_Solutions_Long.png') }}" alt="Sponsor Logo">
    </section>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js"></script>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>

</body>

</html>
