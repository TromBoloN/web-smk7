# Web SMK 7

Website profil sekolah berbasis **Laravel** yang dirancang untuk menampilkan informasi sekolah, berita, galeri, data guru, serta menyediakan panel admin untuk pengelolaan konten.

---

## Tentang Proyek

**Web SMK 7** merupakan proyek website profil sekolah yang dikembangkan secara kolaboratif dalam konteks akademik.  
Aplikasi ini memiliki dua sisi utama:

- **Halaman publik** untuk menampilkan informasi sekolah kepada pengunjung
- **Panel admin** untuk mengelola konten website secara dinamis

Repositori ini juga menjadi bagian dari dokumentasi dan proses _cleanup_ lanjutan untuk keperluan portofolio, terutama dalam aspek struktur kode, keamanan, dan maintainability.

---

## Fitur Utama

### Halaman Publik
- Beranda
- Profil / sejarah sekolah
- Visi dan misi
- Halaman program keahlian / konsentrasi keahlian
- Halaman fasilitas / sarana prasarana
- Halaman hubungan industri
- Halaman data guru
- Halaman galeri
- Daftar berita / blog
- Detail berita / artikel
- Pencarian artikel berdasarkan kata kunci dan kategori
- Form komentar publik pada artikel

### Panel Admin
- Dashboard admin
- CRUD artikel / blog
- CRUD data guru
- CRUD galeri
- Upload gambar untuk CKEditor

---

## Teknologi yang Digunakan

- **Backend:** Laravel 10
- **Frontend:** Blade, Livewire 3, Tailwind CSS, Vite
- **Database:** MySQL
- **Package tambahan:** mews/captcha

---

## Status Proyek

Saat ini proyek ini sedang dalam tahap **perapihan dan dokumentasi ulang** untuk kebutuhan portofolio.

Beberapa area yang masih menjadi fokus perbaikan:
- penguatan otorisasi
- perbaikan relasi model dan migrasi
- perapihan logika filter / pencarian
- stabilitas slug / URL artikel
- konsistensi antarmuka
- dokumentasi proyek yang lebih baik

---

## Kenapa Proyek Ini Menarik

Proyek ini bukan sekadar aplikasi latihan sederhana.  
Website ini sudah mencakup hal-hal yang umum ditemui pada proyek web nyata, seperti:

- pemisahan halaman publik dan admin
- autentikasi
- CRUD konten
- upload file / gambar
- manajemen artikel
- komentar
- validasi form
- konten yang terhubung ke database

Karena itu, repositori ini tetap relevan sebagai bagian dari portofolio, meskipun masih ada beberapa bagian yang sedang dirapikan lebih lanjut.

---

## Instalasi

### Kebutuhan Sistem
- PHP 8.1 atau lebih baru
- Composer
- Node.js dan npm
- MySQL

### Langkah Instalasi

```bash
git clone https://github.com/TromBoloN/web-smk7.git
cd web-smk7

composer install
npm install

cp .env.example .env
php artisan key:generate
```

### Konfigurasi Environment

Buka file `.env`, lalu sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

### Menjalankan Migrasi

```bash
php artisan migrate
```

### Menjalankan Project

```bash
npm run dev
php artisan serve
```

---

## Catatan

Repositori ini merepresentasikan proyek akademik yang dikembangkan secara kolaboratif.  
Beberapa bagian masih mencerminkan kondisi implementasi awal dan sedang diperbaiki secara bertahap sebagai bagian dari proses pembelajaran, dokumentasi, dan pengembangan portofolio.

---

## Rencana Perbaikan

- [x] Mengganti README bawaan Laravel dengan dokumentasi proyek
- [ ] Menambahkan screenshot tampilan website
- [ ] Menambahkan penjelasan struktur folder penting
- [ ] Memperbaiki authorization pada aksi publik tertentu
- [ ] Memperbaiki relasi model dan rollback migration
- [ ] Merapikan logika search / filter
- [ ] Menjaga slug artikel tetap stabil setelah dibuat
- [ ] Merapikan inkonsistensi UI dan validasi
- [ ] Menambahkan data contoh / seed jika diperlukan

---

## Kontribusi Saya

Beberapa hal yang saya kerjakan pada proyek ini meliputi:
- pengembangan dan integrasi fitur halaman publik
- pengelolaan konten berbasis admin
- fitur artikel / blog dan bagian terkait
- debugging serta perapihan kode
- dokumentasi ulang dan perbaikan repo untuk kebutuhan portofolio

---

## Screenshot

Masih akan ditambahkan.

---

## Lisensi

Repositori ini dipublikasikan untuk kebutuhan pembelajaran dan portofolio, kecuali terdapat batasan tertentu dari pihak kolaborator atau institusi terkait.

