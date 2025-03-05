<nav class="main-side-navigation dashboard-side">
    <div class="close-side-nav" data-close-side>
        <i class="fa-solid fa-times"></i>
    </div>

    <section class="side-navbar-list">
        
        <div class="dropdown-container">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow ga-3">
                    <i class="fa-solid fa-user nav-symbol"></i>
                    <h5>Profile</h5>
                </div>
                <i class="fa-solid fa-caret-right dropdown-symbol"></i>
            </div>

            <div class="dropdown-content">
                    <h5>Profil A</h5>
                    <h5>Profil B</h5>
            </div>
        </div>

        <div class="dropdown-container ">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow ga-3">
                    <i class="fa-solid fa-school nav-symbol"></i>
                    <h5>Program Sekolah</h5>
                </div>
                <i class="fa-solid fa-caret-right dropdown-symbol"></i>
            </div>

            <div class="dropdown-content">
                <h5>Profil A</h5>
            </div>
        </div>

        <div class="dropdown-container">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow ga-3">
                    <i class="fa-solid fa-graduation-cap nav-symbol"></i>
                    <h5>Akademik</h5>
                </div>
                <i class="fa-solid fa-caret-right dropdown-symbol"></i>
            </div>
        </div>

        <div class="dropdown-container">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow ga-3">
                    <i class="fa-solid fa-camera nav-symbol"></i>
                    <h5>Galeri</h5>
                </div>
                <i class="fa-solid fa-caret-right dropdown-symbol"></i>
            </div>
        </div>

        <div class="dropdown-container">
            <div class="frow jcsbetween" data-dropdown-nav-button>
                <div class="frow ga-3">
                    <i class="fa-solid fa-phone nav-symbol"></i>
                    <h5>Kontak Kami</h5>
                </div>
                <i class="fa-solid fa-caret-right dropdown-symbol"></i>
            </div>
        </div>

    </section>
</nav>

<div class="darkness-backdrop">
</div>

<nav class="main-navigation @if(!request()->is('/') ) contrast @endif ">
    <a href="/" class="navbar-logo">
        <img width="190" src="{{ asset('images/Logo_SMKN7.png') }}" alt="Logo SMKN7">
</a>
    <div class="sidebar-button">
        <i class="fa fa-bars"></i>
    </div>
    
    <ul class="navbar-list">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Profil
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="#" class="dropdown-item">Profil A</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Program Sekolah
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/about-us/program-kerja">PROGRAM KERJA</a></li>
                <li><a class="dropdown-item" href="/about-us/peraturan=kemdikbud">PERATURAN KEMDIKBUD</a></li>
                <li><a class="dropdown-item" href="/about-us/hubungan-industri">HUBUNGAN INDUSTRI</a></li>
                <li><a class="dropdown-item" href="/about-us/teaching-factory-dan-program-inovasi">TEACHING FACTORY DAN
                        PROGRAM INOVASI</a></li>
                <li><a class="dropdown-item" href="/about-us/program-bussiness-center-unit-produksi">PROGRAM BUSINESS
                        CENTER (UNIT PRODUKSI)</a></li>
                <li><a class="dropdown-item" href="/about-us/program-pengembangan-sekolah">PROGRAM PENGEMBANGAN
                        SEKOLAH</a></li>
                <li><a class="dropdown-item" href="/about-us/program-spw">PROGRAM SPW</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Akademik
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="#" class="dropdown-item">Berita</a></li>
                <li><a href="#" class="dropdown-item">Kalender Akademik</a></li>
                <li><a href="#" class="dropdown-item">Kegiatan</a></li>
                <li><a href="#" class="dropdown-item">Jadwal</a></li>
                <li><a href="#" class="dropdown-item">Data Guru</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="/" class="nav-link">Galeri</a>
        </li>
        <li class="nav-item">
            <a href="/" class="nav-link">Kontak Kami</a>
        </li>
        <li class="nav-item" style='height: fit-content;'>
            <a href="#" class="search-nav" onclick="openModal('searchModal'); return false;">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>
        </li>
    </ul>

    <div class="navbar-button-scroll">
        <i class="fa-solid fa-caret-down"></i>
    </div>
</nav>



<div id="searchModal" class="search-modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal('searchModal')">&times;</span>
        <h3>Search Blog Posts</h3>
        <form action="{{url('blogs/search')}}" method="GET">
            <textarea name="query" class="form-control" placeholder="Type your search query here..." rows="4"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Search</button>
        </form>
    </div>
</div>
