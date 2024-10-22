<nav class="navbar navbar-expand-lg">
    <div class="container">
        <div class="row">
            <div class="collapse navbar-collapse" id="navbarNav">
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('images/Logo_SMKN7.png') }}" alt="Logo SMKN7">
                </a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="#" class="dropdown-item">Profil A</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Program Sekolah
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/about-us/program-kerja">PROGRAM KERJA</a></li>
                            <li><a class="dropdown-item" href="/about-us/peraturan=kemdikbud">PERATURAN KEMDIKBUD</a></li>
                            <li><a class="dropdown-item" href="/about-us/hubungan-industri">HUBUNGAN INDUSTRI</a></li>
                            <li><a class="dropdown-item" href="/about-us/teaching-factory-dan-program-inovasi">TEACHING FACTORY DAN PROGRAM INOVASI</a></li>
                            <li><a class="dropdown-item" href="/about-us/program-bussiness-center-unit-produksi">PROGRAM BUSINESS CENTER (UNIT PRODUKSI)</a></li>
                            <li><a class="dropdown-item" href="/about-us/program-pengembangan-sekolah">PROGRAM PENGEMBANGAN SEKOLAH</a></li>
                            <li><a class="dropdown-item" href="/about-us/program-spw">PROGRAM SPW</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <li class="nav-item">
                        <a href="#" onclick="openModal('searchModal'); return false;">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div id="searchModal" class="search-modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal('searchModal')">&times;</span>
        <h3>Search Blog Posts</h3>
        <form action="{{ route('blog.search') }}" method="GET">
            <textarea name="query" class="form-control" placeholder="Type your search query here..." rows="4"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Search</button>
        </form>
    </div>
</div>
