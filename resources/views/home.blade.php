<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Link to the CSS file -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
</head>
<body>
    <header>
    <!-- Navbar -->
    @include('layouts.partials.navbar')

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="hero-content">
                    <div class="image-container">
                    <img src="{{ asset('images/students-2022.png') }}" alt="Welcome Image" />
                    </div>
                    <div class="hero-container">
                        <h2 class="hero-caption">SELAMAT <span style="color: #f5ab35;">DATANG</span></h2>
                        <p>SMK Negeri 7 Samarinda Sebagai SMK Pusat Keunggulan, Menjadi SMK Unggulan yang Menghasilkan Sumber Daya Manusia Bermutu dan Berdaya Saing Menuju CENTER OF EXCELLENCE.</p>
                        <button>JELAJAHI</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </header>

<!-- Info Section -->
    <div class="info-section">
        <div class="info-box box-1" style="background-image: url(https://smkn7-smr.sch.id/wp-content/uploads/2022/06/student-activity-388x370.jpeg)">
            <a href="/berita " class="info-link"></a>
            <h2>INFO <span>PENTING</span></h2>
        </div>
        <div class="info-box box-2" style="background-image: url(https://smkn7-smr.sch.id/wp-content/uploads/2022/06/class-activity-388x370.jpeg)">
            <a href="#" class="info-link"></a>
            <h2>KEGIATAN <span>KELAS</span></h2>
        </div>
        <div class="info-box box-3" style="background-image: url(https://smkn7-smr.sch.id/wp-content/uploads/2022/06/teacher-profile-388x370.jpeg)">
            <a href="/teachers" class="info-link"></a>
            <h2>PROFIL <span>GURU</span></h2>
        </div>
    </div>

    <!-- Content Section -->
    <section class="welcome">
        <div class="container">
            <div class="welcome-section">
            <div class="welcome-text">
                <div class="welcome-content">
                    <h3>
                        <span>Sambutan Kepala Sekolah</span>
                        MELANGKAH MENUJU PRESTASI
                    </h3>
    
                    <p>Mengembangkan bidang keahlian Teknologi Informasi dan Komunikasi, Memberikan kontribusi bagi percepatan pembangunan di Kalimantan Timur, Mengembangkan manajemen pendidikan berbasis sekolah secara pro aktif dan kreatif, dan Memacu perkembangan pendidikan yang lebih kompetitif dan mandiri.</p>
                    <img src="{{ asset('images/signature.png') }}" alt="Sambutan Kepala Sekolah"><br>
                    <strong class="author">
                        Anda Supanda, S.Pd., M.Pd.
                        <span>Kepala SMK Negeri 7 Samarinda</span>
                    </strong>
                </div>
            </div>
    
            <div class="headmaster-photo">
                <img src="{{ asset('images/1.png') }}" alt="Sambutan Kepala Sekolah">
            </div>
        </div>
        </div>
    </section>


    
    <section class="we-have-faith">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h3>TAMATAN YANG BERMUTU, KOMPETITIF DAN MANDIRI</h3>
                    <p>Menjadi Sekolah Bidang Teknologi Informasi Dan Komunikasi Bertaraf Internasional Berwawasan Lingkungan Dilandasi Iman Dan Taqwa</p>
                </div>
                <div class="section-content">
                    <div class="photo-section">
                        <img src="{{ asset('images/we-have-faith-img-1.png') }}" alt="Motivasi">
                        <h4>Motivasi</h4>
                        <p>Menjadikan agama sebagai sumber motivasi dan inspirasi</p>
                    </div>
                    <div class="photo-content"> 
                        <a href=""> <img src="{{ asset('images/we-have-faith-img-2.png') }}" alt="Bersih"></a>
                        <h4>Bersih</h4>
                        <p>Mewujudkan sekolah yang bersih, hijau, dan indah (Green School)</p>
                    </div>
                    <div class="photo-content">
                        <a href=""> <img src="{{ asset('images/we-have-faith-img-3.png') }}" alt="Tamatan"></a>  
                        <h4>Tamatan</h4>
                        <p>Menyelenggarakan pendidikan yang berstandar internasional</p>
                    </div>
                    <div class="photo-content">
                        <a href=""> <img src="{{ asset('images/we-have-faith-img-4.png') }}" alt="Prestasi"></a>
                        <h4>Prestasi</h4>
                        <p>Menghasilkan tamatan yang bermutu, kompetitif dan mandiri.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="call-to-action">
        <div class="container">
                <div class="call-to-action-content clearfix">
                    <div class="register-content">
                        <img src="{{ asset('images/call-to-action-img.png') }}" alt="CTA">
                        <p>
                            <strong>Pendaftaran Peserta Didik Baru</strong>
                            "Ayo bergabung bersama kami !"
                        </p>
                    </div>
                    <a href="http://cabdinsamarinda.siap-ppdb.com/" class="daftar-btn">DAFTAR</a>
                </div>
            </div>
    </section>

    <section class="academic-calendar">
        <div class="container">
            <div class="row">
                <div class="academic-calendar-header">
                    <h2>KALENDER AKADEMIK</h2>
                    <p>Siswa-siswa kami ialah siswa siswa yang berbakat, tekun dan penuh kreatifitas. Kami mendukung dalam mewujudkan ide-ide mereka. Pemanfaatan kesempatan ialah fokus kami. <a href="#">Lihat Jadwal Seluruhnya</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="achievements" style="background-image: {{ asset('images/achievements-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2>PRESTASI GURU DAN SISWA</h2>    
                </div>
                <div class="row">
                    <div class="section-content">
                        <div class="col-sm-3">
                            <h3 class="home-count">2,002</h3>
                            <p>DIDIRIKAN</p>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="home-count">30</h3>
                            <p>GURU BERSERTIFIKAT</p>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="home-count">6,000</h3>
                            <p>JUMLAH LULUSAN</p>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="home-count">289</h3>
                            <p>PENGHARGAAN</p>
                        </div>
                    </div>
                </div>
            </div>    
        </div>    
    </section>

    <section class="featured-news">
        <div class="container">
            <div class="row">
                <h2 class="section-header">BERITA TERKINI</h2>
            </div>
            <div class="row section-content">
                @foreach($posts as $post)
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <a href="{{ route('berita.show', $post->slug) }}" class="news-item-link">
                            <div class="news-item">
                                <div class="item-meta-data">
                                    <div class="author-info">
                                        <img src="{{ asset('images/cropped-logo_smkn7-1.png') }}" alt="school-icon" style="width: 20px; height: 20px; margin-right: 5px;">
                                        <span>{{ $post->user->username ?? 'Unknown Author' }}</span>
                                    </div>
                                    <div class="date-info">
                                        <span>{{ $post->created_at->format('d M') }}</span>
                                    </div>
                                </div>
                                <div class="item-image">
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" style="width: 100%; height: auto;">
                                </div>
                                <div class="item-info">
                                    <h3 style="text-align: center; font-weight: 300;">{{ $post->title }}</h3>
                                    <p>{!! Str::words(strip_tags($post->content), 50, '...') !!}</p>
                                    <a href="{{ route('berita.show', $post->slug) }}" class="read-more">Read More</a>
                                </div>
                                
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    

    <section class="featured-gallery">
        <div class="row">
            <div class="large-image">
                <a href="#" onclick="openModal('galleryModal', 'images/gallery-1.jpeg', 'Caption for Image 1'); return false;">
                    <img src="images/gallery-1.jpeg" alt="Gallery Image 1">
                </a>
            </div>
            <div class="small-images">
                <a href="#" onclick="openModal('galleryModal', 'images/gallery-2.jpeg', 'Caption for Image 2'); return false;">
                    <img src="images/gallery-2.jpeg" alt="Gallery Image 2">
                </a>
                <a href="#" onclick="openModal('galleryModal', 'images/gallery-4.jpeg', 'Caption for Image 4'); return false;">
                    <img src="images/gallery-4.1.jpeg" alt="Gallery Image 4">
                </a>
                <a href="#" onclick="openModal('galleryModal', 'images/gallery-3.jpeg', 'Caption for Image 3'); return false;">
                    <img src="images/gallery-3.jpeg" alt="Gallery Image 3">
                </a>
                <a href="#" onclick="openModal('galleryModal', 'images/gallery-5.jpeg', 'Caption for Image 5'); return false;">
                    <img src="images/gallery-5.jpeg" alt="Gallery Image 5">
                </a>
            </div>
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
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>PROFIL KAMI</h2>
                    <p>
                        SMK Negeri 7 Samarinda Sebagai SMK PUSAT KEUNGGULAN. Menjadi SMK Unggulan yang Menghasilkan Sumber Daya Manusia Bermutu dan Berdaya Saing Tinggi Menuju CENTER OF EXCELLENCY.
                    </p>
                    <a href="#" class="primary-link hvr-push">Selengkapnya</a>
                </div>
                <div class="col-sm-6">
                    <div class="content-video">
                        <a class="play-youtube" data-featherlight="iframe" href="https://www.youtube.com/embed/ed9ENfQ_Nag?autoplay=1">
                            <img src="https://smkn7-smr.sch.id/wp-content/uploads/2022/06/tumb-767x500.png" alt="PROFIL KAMI">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="tab-content">
                        <div class="tab-pane" id="testimonial-1">
                            Pengalaman saya selama belajar di SMKN 7 SAMARINDA, terutama di jurusan Teknologi Komputer dan Jaringan. Di sekolah ini saya tidak hanya diajarkan teori dan praktek saja tetapi saya diajarkan hal-hal lain yang sangat berguna dan dapat diterima siswa yang akhirnya melatih iman, moral, mental, dan karakter siswa. Guru-guru disini pun mengajar dengan karakter masing-masing yang unik, lucu, disiplin, tegas dan membantu saya mengerti materi pengajaran dengan baik. Fasilitas di sekolah ini pun cukup lengkap terdapat lab khusus jurusan yang di dalamya berisi komputer Komputer, kantin di sekolah ini pun sudah menerapkan pembayaran menggunakan QRIS atau Cashless.	
                        </div>
                        <div class="tab-pane" id="testimonial-2">
                            Alhamdulillah, Saya sangat bangga menjadi bagian keluarga besar SMKN 7 Samarinda, dimana guru guru nya sangat disiplin dalam mendidik anak anak didiknya, dan juga di saat yg tepat akan menjadi orang tua yg bijaksana dan bahkan menjadi sahabat. Dengan fasilitas yang lengkap, membuat muridnya bisa membangkitkan bakat bakat terpendam dan mengembangkan diri menjadi murid yg berprestasi di bidangnya.
                        </div>
                        <div class="tab-pane active" id="testimonial-3">
                            SMKN 7 Samarinda adalah salah satu sekolah yang sangat mendukung tentang bakat dan minat siswa nya, memberi kebebasan dalam berkreasi, juga guru guru yang cukup terampil di bidangnya. Senang bisa bersekolah dan menuntut ilmu di SMKN 7 Samarinda.
                        </div>
                        <div class="tab-pane" id="testimonial-4">
                            Pengalaman tahun pertama saya Di SMKN 7 Samarinda, saya merasa wawasan saya menjadi lebih luas dan juga menambah skill coding saya dari ilmu yang di berikan oleh guru di SMKN 7 Samarinda, I LOVE SMKN 7 Samarinda ♥️♥️.
                        </div>
                        <div class="tab-pane" id="testimonial-5">
                            Selama saya bersekolah di smkn 7 samarinda, saya mendapat banyak pengalaman baru dan banyak motivasi untuk masa depan saya, smkn 7 samarinda merupakan salah satu sekolah pusat keunggulan yang memiliki segudang pretasi didalamnya, memiliki guru-guru yang dapat memotivasi dan mengajarkan begitu banyak hal tentang pelajaran dan kehidupan. Dan smkn 7 samarinda mempunyai fasilitas yang sangat luar biasa seperti lab dkv yang dapat digunakan dengan nyaman saat pembelajaran, warung teknologi (wartek) yang sangat nyaman buat jajan,,, nah di wartek ini kita jajan dengan cara baru nih, sudah tidak memakai uang cash karena smkn 7 samarinda sangat taat protokol kesehatan pada saat pandemi covid-19. pokoknya sekolah di smkn 7 samarinda sangat menyenangkan
                            <img draggable="false" role="img" class="emoji" alt="😊" src="https://s.w.org/images/core/emoji/14.0.0/svg/1f60a.svg"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav">
                        <li class="">
                            <a href="#testimonial-1" data-bs-toggle="tab">
                                <img src="{{ asset('images/testi-1.jpeg') }}" alt="Jelita">
                                <strong>Jelita Islami Delina Putri</strong>
                                <span>Siswa TJKT</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#testimonial-2" data-bs-toggle="tab">
                                <img src="{{ asset('images/testi-2.jpeg') }}" alt="Ridho">
                                <strong>Ridho Morita</strong>
                                <span>Siswa TJKT</span>
                            </a>
                        </li>
                        <li class="active"> 
                            <a href="#testimonial-3" data-bs-toggle="tab">
                                <img src="{{ asset('images/testi-3.jpg') }}" alt="Rey">
                                <strong>Rey Azhar Satriaji</strong>
                                <span>Siswa TJKT</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#testimonial-4" data-bs-toggle="tab">
                                <img src="{{ asset('images/testi-4.jpeg') }}" alt="Ahmad">
                                <strong>Ahmad Ribbiy Aldi</strong>
                                <span>Siswa PPLG</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#testimonial-5" data-bs-toggle="tab">
                                <img src="{{ asset('images/testi-5.jpeg') }}" alt="Ananda">
                                <strong>Ananda DWI</strong>
                                <span>Siswa DKV</span>
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </section>

    <section class="page-sponsor">
        <div class="container">
            <div class="row">
                <div class="sponsor-logo">
                    <div class="col-sm-3"><img src="{{ asset('images/google-sm.png') }}" alt="Sponsor Logo"></div>
                    <div class="col-sm-3"><img src="{{ asset('images/bisaai-sm.png') }}" alt="Sponsor Logo"></div>
                    <div class="col-sm-3"><img src="{{ asset('images/kedata.png') }}" alt="Sponsor Logo"></div>
                    <div class="col-sm-3"><img src="{{ asset('images/Jupiter_IT_Solutions_Long.png') }}" alt="Sponsor Logo"></div>
                </div>
            </div>
        </div>
    </section>

    
    

    <!-- Footer -->
    @include('layouts.partials.footer')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js"></script>

<script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html> 
