<div class="darkness-backdrop-100" data-dark-backdrop>
</div>
<nav class="main-side-navigation dashboard-side">
    <div class="close-side-nav" data-close-side>
        <i class="fa-solid fa-times"></i>
    </div>

    <section class="side-navbar-list">

        <a href="{{url('')}}" class="dropdown-container">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow g-2">
                    <i class="fa-solid fa-home nav-symbol"></i>
                    <h5>Home</h5>
                </div>
            </div>
        </a>

        <div class="dropdown-container">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow g-2">
                    <i class="fa-solid fa-user nav-symbol"></i>
                    <h5>Profile</h5>
                </div>
                <i class="fa-solid fa-caret-right dropdown-symbol"></i>
            </div>

            <div class="dropdown-content" id="sidebarz-drop-1">
                <a href="{{url('sejarah-singkat')}}">Sejarah Singkat</a>
                <a href="{{url('sejarah-pengembangan')}}">Sejarah Pengembangan</a>
                <a href="{{url('visi-dan-misi')}}">Visi dan Misi</a>
                <a href="{{url('program-keahlian')}}">Program Keahlian</a>
                
                <div class="dropdown-container" data-rooted-container>
                    <div class="frow jcsbetween rooted-drop" data-rooted-link="sidebarz-drop-1" data-dropdown-nav-button='rooted'>
                        <div class="frow g-2">
                            <h5>Konsentrasi Keahlian</h5>
                        </div>
                        <i class="fa-solid fa-caret-right dropdown-symbol"></i>
                    </div>

                    <div class="dropdown-content">
                        <a href='{{url('konsentrasi-keahlian/pengembangan-perangkat-lunak-dan-gim')}}' class=" ">Pengembangan Perangkat Lunak dan Gim</a>
                        <a href='{{url('konsentrasi-keahlian/teknik-jaringan-komputer-dan-telekomunikasi')}}' class=" ">Teknik Jaringan Komputer dan Telekomunikasi</a>
                        <a href='{{url('konsentrasi-keahlian/desain-komunikasi-visual')}}' class=" ">Desain Komunikasi Visual</a>
                        <a href='' class="disabled">Animasi</a>
                    </div>
                </div>

                <a href="{{url('tugas-dan-tujuan')}}" class="dropdown-item">Tugas dan Tujuan</a>
                
                <a href="#" class="disabled">Profil Pimpinan</a>
                
                <div class="dropdown-container" data-rooted-container>
                    <div class="frow jcsbetween rooted-drop" data-rooted-link="sidebarz-drop-1" data-dropdown-nav-button='rooted'>
                        <div class="frow g-2">
                            <h5>Sarana dan Prasarana</h5>
                        </div>
                        <i class="fa-solid fa-caret-right dropdown-symbol"></i>
                    </div>

                    <div class="dropdown-content">
                        <a href='{{url('sarana-prasarana/infrastruktur')}}'>Sarana Infrastruktur</a>
                        <a href='{{url('sarana-prasarana/pembelajaran')}}'>Sarana Pembelajaran</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="dropdown-container ">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow g-2">
                    <i class="fa-solid fa-school nav-symbol"></i>
                    <h5>Program Sekolah</h5>
                </div>
                <i class="fa-solid fa-caret-right dropdown-symbol"></i>
            </div>

            <div class="dropdown-content">
                <a class="disabled" href="/about-us/program-kerja">PROGRAM KERJA</a>
                <a class="disabled" href="/about-us/peraturan=kemdikbud">PERATURAN KEMDIKBUD</a>
                <a class="" href="{{url('hubungan-industri')}}">HUBUNGAN INDUSTRI</a>
                <a class="disabled" href="/about-us/teaching-factory-dan-program-inovasi">TEACHING FACTORY DAN PROGRAM INOVASI</a>
                <a class="disabled" href="/about-us/program-bussiness-center-unit-produksi">PROGRAM BUS CENTER (UNIT PRODUKSI)</a></li>
                <a class="disabled" href="/about-us/program-pengembangan-sekolah">PROGRAM PENGEMBANGAN SEKOLAH</a></li>
                <a class="disabled" href="/about-us/program-spw">PROGRAM SPW</a>
            </div>
        </div>

        <div class="dropdown-container">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow g-2">
                    <i class="fa-solid fa-graduation-cap nav-symbol"></i>
                    <h5>Akademik</h5>
                </div>
                <i class="fa-solid fa-caret-right dropdown-symbol"></i>
            </div>

            <div class="dropdown-content">
                <a href="{{url('blogs')}}">Berita</a>
                <a href="#" class="disabled">Kalender Akademik</a>
                <a href="#" class="disabled">Kegiatan</a>
                <a href="#" class="disabled">Jadwal</a>
                <a href="{{url('teachers')}}">Data Guru</a>
            </div>
        </div>

        <a href="{{url('gallery')}}" class="dropdown-container">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow g-2">
                    <i class="fa-solid fa-camera nav-symbol"></i>
                    <h5>Galeri</h5>
                </div>
            </div>
        </a>

        <a href="{{url('#')}}" class="dropdown-container">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow g-2">
                    <i class="fa-solid fa-phone nav-symbol"></i>
                    <h5>Kontak Kami</h5>
                </div>
            </div>
        </a>

    </section>
</nav>



<nav class="main-navigation @if (!request()->is('/')) contrast @endif ">
    <a href="/" class="navbar-logo">
        <img width="190" src="{{ asset('images/Logo_SMKN7.png') }}" alt="Logo SMKN7">
    </a>
    <div class="sidebar-button">
        <i class="fa fa-bars"></i>
    </div>

    <ul class="navbar-list">
        <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                Profil
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="{{url('sejarah-singkat')}}" class="dropdown-item">Sejarah Singkat</a></li>
                <li><a href="{{url('sejarah-pengembangan')}}" class="dropdown-item">Sejarah Pengembangan</a></li>
                <li><a href="{{url('visi-dan-misi')}}" class="dropdown-item">Visi dan Misi</a></li>
                <li><a href="{{url('program-keahlian')}}" class="dropdown-item">Program Keahlian</a></li>
                
                <div class="btn-group dropend w-100 ">
                    <a href="#" type="button" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Konsentrasi Keahlian</a>
                    <ul class="dropdown-menu rooted">
                        <li><a href='{{url('konsentrasi-keahlian/pengembangan-perangkat-lunak-dan-gim')}}' class="dropdown-item" type="button">Pengembangan Perangkat Lunak dan Gim</a></li>
                        <li><a href='{{url('konsentrasi-keahlian/teknik-jaringan-komputer-dan-telekomunikasi')}}' class="dropdown-item" type="button">Teknik Jaringan Komputer dan Telekomunikasi</a></li>
                        <li><a href='{{url('konsentrasi-keahlian/desain-komunikasi-visual')}}' class="dropdown-item" type="button">Desain Komunikasi Visual</a></li>
                        <li><a href='' class="dropdown-item disabled" type="button">Animasi</a></li>
                    </ul>
                </div>
                
                <li><a href="{{url('tugas-dan-tujuan')}}" class="dropdown-item">Tugas dan Tujuan</a></li>
                <li><a href="#" class="dropdown-item disabled">Profil Pimpinan</a></li>

                <div class="btn-group dropend w-100 ">
                    <a href="#" type="button" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Sarana dan Prasarana</a>
                    <ul class="dropdown-menu rooted">
                        <li><a href='{{url('sarana-prasarana/infrastruktur')}}' class="dropdown-item" type="button">Sarana Infrastruktur</a></li>
                        <li><a href='{{url('sarana-prasarana/pembelajaran')}}' class="dropdown-item" type="button">Sarana Pembelajaran</a></li>
                    </ul>
                </div>

            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Program Sekolah
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item disabled" href="/about-us/program-kerja">PROGRAM KERJA</a></li>
                <li><a class="dropdown-item disabled" href="/about-us/peraturan=kemdikbud">PERATURAN KEMDIKBUD</a></li>
                <li><a class="dropdown-item" href="{{url('hubungan-industri')}}">HUBUNGAN INDUSTRI</a></li>
                <li><a class="dropdown-item disabled" href="/about-us/teaching-factory-dan-program-inovasi">TEACHING FACTORY DAN PROGRAM INOVASI</a></li>
                <li><a class="dropdown-item disabled" href="/about-us/program-bussiness-center-unit-produksi">PROGRAM BUSINESS
                        CENTER (UNIT PRODUKSI)</a></li>
                <li><a class="dropdown-item disabled" href="/about-us/program-pengembangan-sekolah">PROGRAM PENGEMBANGAN
                        SEKOLAH</a></li>
                <li><a class="dropdown-item disabled" href="/about-us/program-spw">PROGRAM SPW</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Akademik
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="{{url('blogs')}}" class="dropdown-item">Berita</a></li>
                <li><a href="#" class="dropdown-item disabled">Kalender Akademik</a></li>
                <li><a href="#" class="dropdown-item disabled">Kegiatan</a></li>
                <li><a href="#" class="dropdown-item disabled">Jadwal</a></li>
                <li><a href="{{url('teachers')}}" class="dropdown-item">Data Guru</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('/gallery')}}" class="nav-link">Galeri</a>
        </li>
        <li class="nav-item">
            <a href="/" class="nav-link">Kontak Kami</a>
        </li>
        <li class="nav-item" style='height: fit-content;'>
            <a href="#" class="search-nav" data-search-modal-opener>
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>
        </li>
    </ul>

    <div class="navbar-button-scroll">
        <i class="fa-solid fa-caret-down"></i>
    </div>
</nav>

<section data-nav-additional>
    <div class="darkness-backdrop-100">
    </div>

    <div class="fcol g-2 aifend jcfend search-modal" data-search-modal>
        <div class="close-button offsite" data-close-side style="--size-close:30px">
            <i class="fa-solid fa-times"></i>
        </div>

        <form class="search-container mb-5 w-100" action="{{ url('blogs/search') }}" method="GET">
            <input name="query" type="text" placeholder='New Search'>

            <button>
                <i class="fa-solid fa-search"></i>
            </button>
        </form>



    </div>
</section>
