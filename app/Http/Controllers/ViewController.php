<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Guru;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home()
    {
        $posts = BlogPost::with('user')->latest()->take(4)->get();
        return view('home', compact('posts'));
    }

    public function admin(){
        $teachers = Guru::all()->count();
        $blogs = BlogPost::all()->count();

        return view('dashboard.index', compact('teachers', 'blogs'));
    }

    public function short_history()
    {
        $title = 'Sejarah Singkat';
        $content = '
            
            <p><strong>SMK Negeri 7 Samarinda</strong> adalah SMK yang berada di kota Samarinda provinsi Kalimantan Timur yang beriklim tropis di daerah hutan tropis lembab, di dalam <em>Literasi Hutan Tropis Lembab dan Lingkungannya</em> (2019) menyebutkan bahwa ciri iklim curah hujan tinggi hingga 2400 mm per tahun. Suhu udara yang ada di hutan ini berkisar antara 20—35 <sup>o</sup>C, dengan kelembaban antara 82—90%. Suhu di lingkungan hutan tropis hanya dipengaruhi oleh ketinggian tempat. Selain itu, hutan tropis lembab memiliki iklim atau cuaca yang lembab penguapan yang tinggi. Sinar matahari pun selalu menyinari wilayah ini sepanjang tahun secara penuh tanpa pengaruh perubahan musim.</p>
            <p>Wilayah Samarinda merupakan kawasan yang berada di tengah-tengah kawasan Kutai Kartanegara yang menjadi ibu kota provinsi Kalimantan Timur. Dibelah oleh sungai mahakam yang merupakan sumber air bersih dan sumber protein bagi penduduk kota Samarinda. Kualitas tanah yang cukup subur perkebunan dan pertanian, sehingga membuat penduduk yang bermukim di wilayah ini dimanjakan oleh alam yang sangat berpengaruh dengan pola pikir dan kebiasaan penduduk secara umum.</p>
            <p>SMK Negeri 7 Samarinda sebagai SMK yang berupaya untuk menjaga ciri khas sebagai sekolah Teknologi Informasi (TI) semenjak berdirinya dari tahun 2002 untuk memenuhi kebutuhan masyarakat (<em>societal needs</em>), kebutuhan dunia kerja (<em>industrial needs</em>), kebutuhan profesional (<em>professional needs</em>), kebutuhan generasi masa depan (<em>vision</em>), dan kebutuhan ilmu pengetahuan (<em>scientific</em>), dengan penjabaran sebagai berikut:</p>
            <ol><li><strong>Kebutuhan Masyarakat (<em>societal needs</em>)</strong><br>Program keahlian yang dibuka oleh SMK Negeri 7 Samarinda agar dapat menopang 158.624 UMKM yang berada di wilayah kota Samarinda yang memerlukan dukungan digital seperti aplikasi buku kas, <em>inventory</em>, media branding seperti <em>company profile</em>, foto dan video produk atau kegiatan, perawatan jaringan internet atau perawatan hardware laptop atau PC. Program keahlian yang dimiliki oleh SMK Negeri 7 Samarinda diharapkan dapat memenuhi kebutuhan marketing digital dari pelaku UMKM yang cukup besar tersebut sebagai peluang media pembelajaran peserta didik atau peluang usaha nantinya.</li><li><strong>Kebutuhan dunia kerja (<em>industrial needs</em>),</strong><br>Revolusi industri 4.0 dan Society 5.0 membuat Program Keahlian SMK Negeri 7 Samarinda harus beradaptasi dengan kebutuhan industri saat ini. Sesuai dengan arahan kemendikbudristek menerbitkan kebijakan untuk SMK se-Indonesia melalui ditjen vokasi yang membawahi ditpsmk mengubah kompetensi keahlian SMK dari 140 menjadi 50 program keahlian agar sinkron dengan perguruan tinggi vokasi yang tersebar di Indonesia. Hal ini berdampak pada program keahlian di SMK Negeri 7 Samarinda yang saat ini menjadi dua bidang keahlian yaitu, <strong>bidang keahlian</strong> Teknologi Informasi yang membawahi <strong>program keahlian</strong> <em>Pengembangan Perangkat Lunak dan Gim</em> dan <em>Teknik Jaringan Komputer dan Telekomunikasi </em>serta <strong>bidang keahlian</strong> <em>Seni dan Ekonomi Kreatif</em> yang membawahi <strong>program keahlian</strong> <em>Desain Komunikasi Visual</em>.<br>Perampingan dan perubahan spektrum yang ada, SMK Negeri 7 Samarinda berupaya menyusun seperangkat kurikulum yang mengakomodir program sekolah untuk peningkatan kompetensi pendidik dan peserta didik yang dapat diserap oleh dunia industri saat ini.</li><li><strong>Kebutuhan Profesional (<em>professional needs</em>)</strong><br>Perubahan pemanfaatan teknologi digital dan budaya yang ada di Indonesia saat ini, membuat SMK Negeri 7 bekerja keras untuk menghasilkan output atau lulusan yang sesuai dengan kebutuan profesional dengan penyelenggaraan program sertifikasi profesi sesuai dengan standar nasional pada tiga program keahlian yaitu <em>Pengembangan Perangkat Lunak dan Gim</em>, T<em>eknik Jaringan Komputer dan Telekomunikasi, dan Desain Komunikasi Visual</em>. Diharapkan dengan program sertifikasi profesional dari dunia industri yang bekerjasama dengan SMK Negeri 7 Samarinda atau menjadikan sekolah sebagai LSP-P1 dapat melahirkan Sumber Daya Manusia (SDM) profesional dan siap kerja.</li><li><strong>Kebutuhan Generasi Masa Depan (<em>vision</em>)</strong><br>Isu ibu kota negara yang dipindah ke Kalimantan Timur menjadi salah satu batu loncatan bagi pemerintah Kaltim untun menyambut proses perpindahan tersebut dengan memaksimalkan SDM dari Kaltim yang berkualitas yang dicetak oleh SMK yang ada di Kaltim. SMK Negeri 7 Samarinda yang menjadi bagian dari proyek masa depan negara ini berusaha untuk menyinkronkan kurikulum dengan keperluan tenaga kerja sesuai dengan kebutuhan lapangan pekerjaan di lokasi ibu kota negara.<br>Berbicara tentang teknologi berarti berusaha mengintip masa depan, sehingga SMK Negeri 7 Samarinda pun menjadikan pelajaran robotik menjadi salah satu ekstrakurikuler dan disisipkan dalam mapel kejuruan yang terintegrasi dalam model pembelajaran berbasis projek.</li><li><strong>Kebutuhan Ilmu Pengetahuan (<em>scientific</em>)</strong><br>Sebagai SMK yang responsif dan adaptif dengan perkembangan teknologi yang berkembang di dunia global saat ini, SMK Negeri 7 Samarinda berusaha menjadi yang terdepan untuk beradaptasi dengan perkembangan tersebut agar dapat memenuhi kebutuhan ilmu pengetahuan yang diperlukan oleh peserta didik</li></ol>
        ';
        return view('public/miscellanous', compact('content', 'title'));
    }

    public function development_history()
    {
        $title = 'Sejarah Pengembangan';
        $content = '
                <h3 class="h-1-misc mb-3">Menurut Djojonegoro (1998) menjelaskan karakteristik pendidikan kejuruan meliputi: 1) Pendidikan kejuruan diarahkan untuk mempersiapkan peserta didik memasuki lapangan kerja, 2) Pendidikan kejuruan didasarkan atas “demand-driven” (kebutuhan dunia kerja), 3) Fokus isi pendidikan kejuruan ditekankan pada penguasaan pengetahuan, keterampilan, sikap dan nilai-nilai yang dibutuhkan oleh dunia kerja, 4) Hubungan yang erat dengan dunia kerja merupakan kunci sukses pendidikan kejuruan, 5) Pendidikan kejuruan yang baik adalah responsif dan antisipatif terhadap kemajuan teknologi, 6) Pendidikan kejuruan lebih ditekankan pada “<em>learning by doing</em>” dan “<em>hands-on experience</em>”, 7) Pendidikan kejuruan memerlukan fasilitas yang mutakhir untuk praktik, 8) Pendidikan kejuruan memerlukan biaya investasi dan operasional yang lebih besar daripada pendidikan umum.</h3>
                <p>Sebagai sekolah kejuruan SMK Negeri 7 Samarinda yang menjadi wadah untuk memberikan ilmu pengetahuan bagi peserta didik maka model pendidikan yang diterapkan di sekolah ini adalah sebagai berikut:&nbsp;</p>
                <ol><li><strong>Model Sekolah</strong><br>Pada model ini pembelajaran dilaksanakan sepenuhnya di sekolah. Model ini berasumsi bahwa segala hal yang terjadi di tempat kerja dapat diajarkan di sekolah dan semua sumber belajar ada di sekolah. SMK Negeri 7 Samarinda menyiapkan ruang praktik/laboratorium komputer beserta alat yang digunakan DUDIKA agar memberikan simulasi awal kepada peserta didik dengan kebutuhan dunia industri.</li><li><strong>Model Magang</strong><br>Pada model ini pembelajaran dasar-dasar kejuruan dilaksanakan di sekolah dan inti kejuruannya diajarkan di industri melalui sistem magang. Model ini banyak diadopsi di Amerika Serikat. Model pembelajaran ini dilakukan untuk meningkatkan keterampilan pendidik yang mengampu mata pelajaran kejuruan serta peserta didik yang berkompeten dan memiliki keterampilan lebih dibandingkan peserta didik lainnya untuk membantu DUDIKA yang memerlukan tambahan karyawan di masa-masa sibuk atau padatnya pekerjaan di DUDIKA.</li><li><strong>Model Sistem Ganda</strong><br>Model ini merupakan kombinasai pemberian pengalaman belajar di sekolah dan pengalaman kerja di dunia usaha. Dalam sistem ini sistem pembelajaran tersistem dan terpadu dengan praktik kerja di dunia usaha/industri. Model pembelajaran ini dikenal dengan istilah PKL (Praktik Kerja Lapangan) yang akan diselenggarakan pada semester 2 di kelas XII.</li><li><strong>Model&nbsp;School-based Enterprise</strong><br>Model ini di Indonesia dikenal dengan unit produksi. Model ini pada dasarnya adalah mengembangkan dunia usaha di sekolah dengan maksud selain untuk menambah penghasilan sekolah, juga untuk memberikan pengalaman kerja yang benar-benar nyata pada siswanya. Model ini dilakukan untuk mengurangi ketergantungan sekolah kepada industri. Model pembelajaran ini wujud dalam <em>Teaching Factory</em> yang diterapkan oleh SMK Negeri 7 Samarinda.</li></ol>
                <p>Mayoritas kecenderungan peserta didik SMK Negeri 7 Samarinda memilih sekolah di SMK Negeri 7 Samarinda adalah untuk mendapatkan pengetahuan yang lebih mengenai perkembangan dunia Teknologi Informasi sehingga mereka lebih memiliki perhatian lebih terhadap mata pelajaran kejuruan daripada mata pelajaran umum. Hal ini kemungkinan terjadi di SMK lain di Indonesia.</p>
                <p>Tidak dapat dipungkiri SMK Negeri 7 Samarinda saat ini menjadi sekolah vokasi yang paling diminati oleh masyarakat Samarinda dengan segala prestasi yang berhasil diraih oleh peserta didik maupun guru baik di tingkat lokal maupun nasional. Seleksi Penerimaan Peserta Didik Baru (PPDB) pun menghasilkan angka pendaftar yang cukup signifikan dari rentang angka 500—700 pendaftar untuk memenuhi kuota 288 peserta didik untuk 8 rombongan belajar yang disebar ke dalam 3 kompetensi keahlian.</p>
                <p>Keadaan demografi penduduk yang heterogen. Kota Samarinda dihuni berbagai macam suku bangsa. Bangsa terbesar yaitu suku Jawa (36.70%), disusul Banjar (24.14%), Bugis (14.43%), Kutai (6.26%) dan Buton (2.13%). Kemudian ada juga suku bangsa lainnya yaitu Dayak, Toraja, Minahasa, Batak, Tionghoa, Sunda, Madura, Mandar, Makassar, Minangkabau, dan lain-lain.</p>
                <p>Alam yang memanjakan masyarakat Kalimantan Timur, berimbas pula pada karakter peserta didik di SMK Negeri 7 Samarinda yang memiliki karakter negatif yang kurang disiplin, konsumtif, boros, dan acuh tak acuh. Namun, tidak dapat dipungkiri di balik karakter negatif tersebut terdapat karakter positif yaitu dermawan, peduli, gemar mencoba hal-hal baru, penasaran dengan teknologi baru, berpikir praktis, dan visioner.</p>
                <p>Karakter negatif yang dibawa peserta didik tersebut di SMK Negeri 7 Samarinda akan dikondisikan dengan memberikan materi-materi <em>soft skill</em>&nbsp;yang meliputi kemampuan komunikasi, kecerdasan sosial, kemampuan beradaptasi, dan karakteristik seseorang dalam&nbsp;dunia kerja. Ditambah dengan pendekatan materi P5BK diharapkan SMKN Negeri 7 Samarinda mampu membentuk dan menghasilkan lulusan yang tidak hanya handal pada sisi <em>hard skill</em> semata melainkan menjadi manusia seutuhnya yang mampu menyeimbangkan antara rasa, cipta, dan karsa sebagaimana tujuan pendidikan nasional.</p>
                <p>Untuk lingkungan sosial dan budaya yang ada di sekitar SMK Negeri 7 Samarinda tidak ada budaya yang menonjol atau upacara adat yang mendominasi kegiatan sosial di masyarakat. Hal ini sangat memudahkan bagi sekolah dalam menentukan pekan efektif dan KBM yang berjalan di sekolah. Di tengah keberagaman suku dan budaya yang ada, persatuan dan kerukunan antar suku bangsa atau agama terjalin sangat erat dalam menjaga kebhinekaan sehingga isu-isu SARA dapat diredam.</p>
                <p>Pendidik yang mengajar di SMK Negeri 7 Samarinda berjumlah 45 orang dengan rincian, pendidik yang memiliki <strong>ijazah S-1 pengampu mata pelajaran kejuruan</strong> berjumlah <strong>14 orang</strong> dan <strong>mata pelajaran umum </strong>berjumlah<strong> 22 orang</strong>, total pendidik <strong>berijazah S-1 berjumlah 36 orang</strong>. Untuk pendidik yang memiliki <strong>ijazah S-2</strong> dirincikan sebagai berikut, <strong>pengampu mata pelajaran kejuruan</strong> berjumlah <strong>2 orang</strong> dan <strong>mata pelajaran umum</strong> berjumlah <strong>7 orang</strong>, total pendidik <strong>berijazah S-2</strong> berjumlah <strong>9 orang</strong>.</p>
                <p>Pendidik yang berstatus ASN berjumlah 29 orang dengan rincian, pengampu mata pelajaran kejuruan berjumlah 10 orang dan pengampu mapel umum berjumlah 19 orang. Dari 29 orang pendidik tersebut yang telah mendapatkan Sertifikat Pendidik berjumlah 23 orang. Kemudian yang memiliki sertifikat industri berjumlah 11 orang.</p>
                <p>Untuk tenaga kependidikan berjumlah 26 orang dengan spesifikasi ijazah dapat dirincikan sebagai berikut berijazah SMA/Sederajat berjumlah 18 orang, paket C berjumlah 1 orang, berijazah D-3 berjumlah 1 orang, dan berijazah S-1 berjumlah 6 orang.</p>
                <p>Kelebihan dari pendidik dan tenaga kependidikan di SMK Negeri 7 Samarinda adalah SDM yang cepat beradaptasi dengan penerapan teknologi pendidikan baru yang diterapkan di sekolah. Hal ini disebabkan rentang usia PTK 21—40 tahun berjumlah 38 orang (54%) dan rentang usia 41—66 tahun berjumlah 33 orang (46%) dengan data ini dapat dikatakan dari analisa usia PTK SMK Negeri 7 Samarinda dapat dikatakan masih didominasi oleh PTK yang berusia produktif.</p>
                <p>Sarana yang dimiliki oleh SMK Negeri 7 Samarinda adalah ruang kelas 17 ruang kelas dan masih kurang 6 ruang kelas karena jumlah rombel yang ada pada saat ini berjumlah 23 rombel, sehingga KBM yang dilaksanakan masih menggunakan sistem 2 shift yaitu pagi untuk kelas XI dan XII sementara untuk siang hari kelas X. Sekolah memiliki laboratorium 3 ruang meliputi laboratorium Multimedia, TKJ dan RPL. Ruang praktik siswa untuk Desain Komunikasi Visual. Gudang Peralatan Praktik dan Perlengkapan.</p>
                <p>Ruang Koperasi, UKS, OSIS, Unit Produksi, Mushola, perpustakaan, ruang server, studio radio, ruang BK, ruang TU, ruang Kepsek, ruang data, ruang guru umum dan kejuruan, ruang waka, ruang tamu, ruang teknisi, dan toilet siswa 8 bilik yang berfungsi dengan baik serta 2 bilik toilet untuk guru.</p>
                <p>Prasarana yang dapat ditonjolkan pada saat ini adalah filter air minum yang dapat diminum langsung untuk warga SMK Negeri 7 Samarinda, serta prasarana lain yang ada di tiap-tiap laboratorium atau RPS yang dilampirkan pada dokumen ini.</p>
                <p>DUDIKA yang telah melakukan MoU dengan SMK Negeri 7 Samarinda tercatat ada 6 perusahaan yaitu CV GreeNusa Komputindo, LHH Multimedia, AP Percetakan, PT Telkom, iNews Tenggarong, dan CV Jupiter yang siap untuk menerima peserta didik atau guru SMK Negeri 7 Samarinda yang hendak melaksanakan PKL atau magang guru, serta terlibat dalam musyawarah yang berkaitan dengan KBM kejuruan di sekolah.</p>
                <p>Kemudian untuk instansi pemerintah dan DUDIKA tercatat ada 55 instansi atau DUDIKA yang siap menampung peserta didik untuk PKL. Peluang kerjasama ini nantinya akan ditindak lanjuti untuk menawarkan MoU agar menjalin kerjasama yang lebih baik lagi untuk menjadikan DUDIKA sebagai wahana belajar peserta didik, Keterlibatan DUDIKA dengan SMK Negeri 7 Samarinda adalah dalam kegiatan link and match kurikulum sekolah dengan industri yang running hari ini digunakan oleh industri untuk menjawab tantangan peserta didik SMK Negeri 7 Samarinda mampu bersaing dan siap pakai oleh DUDIKA. Pendidik yang mengampu mapel kejuruan pun tercatat 4 orang yang telah melakukan magang di industri untuk meningkatkan pengetahuan, pemahaman, keterampilan, dan kompetensi agar selalu update teknologi dan menerapkan di sekolah.</p>
        ';
        return view('public/miscellanous', compact('content', 'title'));
    }

    public function vision_mission()
    {
        $title = 'Visi dan Misi';
        $content = '
            <p><strong>VISI SMK NEGERI 7 SAMARINDA</strong></p>
            <p><em>Terwujudnya Lulusan yang Berakhlak Mulia, Unggul, Kompeten dan Berdaya Saing</em></p>
            <p><strong>MISI SMK NEGERI 7 SAMARINDA</strong></p>
            <ol><li>Mewujudkan lulusan yang berakhlak mulia dan memiliki etos kerja yang baik berlandaskan profil pelajar Pancasila.</li><li>Menjadi pusat pendidikan dan latihan yang memiliki standar kompetensi dunia usaha, dunia industri dan kerja (DUDIKA).</li><li>Menerapkan sistem pendidikan yang berorientasi teknologi informasi, ekonomi kreatif bersumber pada kearifan lokal.</li><li>Menghasilkan lulusan yang memiliki kompetensi <em>technopreneurship</em>, mampu bersaing di bursa kerja nasional maupun global.</li></ol>
         ';
        return view('public/miscellanous', compact('content', 'title'));
    }

    public function vocational_major()
    {
        $title = 'Program Keahlian';
        $content = '            
            <ol type="1"><li><strong>Desain Komunikasi Visual</strong><br>Tujuan Program <strong>Keahlian Desain Komunikasi Visual</strong> adalah membekali peserta didik dengan keterampilan, pengetahuan dan sikap (<em>hard skills</em> dan <em>soft skills)</em>, agar lulusannya kompeten dalam hal-hal berikut:<br>Mengembangkan kreativitas, mengasah kepekaan estetis, dan sensitivitas terhadap fenomena sosial budaya;<ol><li>Merancang produk media desain komunikasi visual komersial maupun sosial;</li><li>Membuat produk media desain komunikasi visual sesuai perkembangan teknologi dan kebutuhan dunia industry;</li><li>Membuat produk media desain komunikasi visual sesuai SOP dan keselamatan kerja tiap kompetensi.</li></ol></li><li><strong>Teknik Jaringan Komputer dan Telekomunikasi:</strong><br>Tujuan Program <strong>Keahlian Teknik Jaringan Komputer dan Telekomunikasi </strong>adalah membekali peserta didik dengan keterampilan, pengetahuan dan sikap (<em>hard skills</em> dan <em>soft skills)</em>, agar lulusannya kompeten dalam hal-hal berikut:<ol><li>Memahami&nbsp;proses&nbsp;bisnis&nbsp;di&nbsp;bidang&nbsp;teknik&nbsp;jaringan&nbsp;komputerdan&nbsp;telekomuniksi</li><li>MemahamI&nbsp;wawasan&nbsp;perkembangan&nbsp;bidang&nbsp;teknik&nbsp;&nbsp;jaringan komputer dan telekomunikasi</li><li>Memahami&nbsp;profesi&nbsp;dan&nbsp;kewirausahan&nbsp;(<em>job profile&nbsp;</em>dan <em>techno preneurship),&nbsp; serta&nbsp;peluang&nbsp;usaha&nbsp;</em>di&nbsp;bidang&nbsp;teknik&nbsp;jarigankomputer&nbsp;dan<em>&nbsp;</em>telekomunikasi</li><li>MemahamI&nbsp;lingkup&nbsp;kerja&nbsp;pada&nbsp;bidang&nbsp;teknik&nbsp;jaringan&nbsp;kompterdan&nbsp;telekomunikasi</li><li>Menerapkan&nbsp;Keselamatan&nbsp;dan&nbsp;Kesehatan&nbsp;Kerja&nbsp;serta Lingkungan Hidup (K3LH) di lingkungan kerjanya</li><li>Memahami&nbsp;penerapan&nbsp;&nbsp;&nbsp;media&nbsp;dan jaringan telekomunikasi.</li><li>Memahami&nbsp;penggunaan&nbsp;Alat&nbsp;Ukur&nbsp;dalam&nbsp;&nbsp;teknik&nbsp;&nbsp;JaringanKomputer&nbsp;dan Telekomunikasi.</li><li>Memahami rancang bangun dan administrasi jaringan lokal dan berbasis luas</li></ol></li><li><strong>Pengembangan Perangkat Lunak dan Gim:</strong><br>Tujuan Program <strong>Pengembangan Perangkat Lunak dan Gim </strong>&nbsp;adalah membekali peserta didik dengan keterampilan, pengetahuan dan sikap (<em>hard skills</em> dan <em>soft skills)</em>, agar lulusannya kompeten dalam hal-hal berikut:<ol><li>Memahami proses bisnis di bidang industri pengembangan perangkat lunak dan gim</li><li>Mampu mengembangkan wawasan tentang perkembangan teknologi dan isu-isu global bidang perangkat lunak dan gim</li><li>Memahami profesi dan kewirausahan (job profile dan technopreneurship) serta peluang usaha di bidang industri perangkat lunak dan gim</li><li>Memahami lingkup kerja bidang pengembangan perangkat lunak dan gim</li><li>Memahami pemrograman terstruktur dan pemrograman berorientasi obyek.</li></ol></li></ol>
         ';
        return view('public/miscellanous', compact('content', 'title'));
    }

    public function pplg()
    {
        $title = 'Pengembangan Perangkat Lunak dan Gim';
        $content = '
            
            <p><strong>PENETAPAN KONSENTRASI KEAHLIAN</strong></p>
            <p>SMKN 7 Samarinda memiliki 2 (dua) Bidang Keahlian, yaitu: (1) Teknologi Informasi dan (2) Seni dan Ekonomi Kreatif.</p>
            <p>Bidang Keahlian Teknologi Informasi membuka 2 (dua) Program Keahlian yaitu: (1) Pengembangan Perangkat Lunak dan Gim; (2) Teknik Jaringan Komputer dan Telekomunikasi. Bidang Keahlian Seni dan Ekonomi Kreatif membuka 1 (satu) Program Keahlian, yaitu Desain Komunikasi dan Visual.</p>
            <p>Program Keahlian Pengembangan Perangkat Lunak dan Gim memiliki 2 (dua) konsentrasi, yaitu konsentrasi (1) Pengembang Perangkat Lunak ; (2) Pengembang Gim&nbsp;</p>
            <p>Konsentrasi adalah pengkhususan studi yang diambil setelah satu tahun mengikuti pembelajaran di kelas X atau fase E. Pemilihan konsentrasi berdasarkan minat dan bakat atau passion peserta didik, setelah memiliki pengalaman belajar di kelas X, sehingga peserta didik diharapkan benar-benar telah memahami secara mendalam ruang lingkup program keahlian yang dipilihnya, antara lain meliputi profesi kerja setelah lulus, jabatan dalam pekerjaan, peluang usaha, jenis kompetensi, dan fasilitas yang digunakan.</p>
            <p>Sekolah melalui Wali Kelas, Guru produktif, dan Guru BK dapat memberikan saran kepada peserta didik atas pilihannya, berdasarkan dari pengamatan terhadap portofolio peserta didik selama mengikuti pembelajaran pada fase E (kelas X).</p>
            <p>Seluruh mata pelajaran yang ditawarkan dalam konsentrasi dikemas dalam bentuk Capaian Pembelajaran (CP) yang disusun oleh Guru Produktif. Capaian Pembelajaran diterjemahkan ke dalam Alur Tujuan Pembelajaran, kemudian dituangkan dalam Modul Ajar. Capaian hasil pembelajaran dapat berupa portofolio sebagai bentuk dari assessment.</p>
            <p>Capaian Pembelajaran Pada akhir fase E (kelas X SMK), peserta didik akan mendapatkan gambaran yang tepat mengenai program keahlian Pengembangan Perangkat Lunak dan</p>
            <p>Gim melalui penguatan wawasan dunia kerja dan kewirausahaan serta penguasaan elemen-elemen pembelajaran lainnya, sehingga dapat menumbuhkan passion serta vision yang dapat memotivasi dalam merencanakan serta melaksanakan aktivitas belajar pada fase ini maupun fase berikutnya. </p>
            <p>Berikut contoh peluang dan profesi kerja sesuai dengan konsentrasi program keahlian :</p>
            <figure class="misc-img"><img decoding="async" src="'.asset('images/PPLG-TABLE.png').'" alt="PPLG TABLE"></figure>
        ';
        return view('public/miscellanous', compact('content', 'title'));
    }

    public function tjkt()
    {
        $title = 'Teknik Jaringan Komputer dan Telekomunikasi';
        $content = '
            <p><strong>PENETAPAN KONSENTRASI KEAHLIAN</strong></p>
            <p>SMKN 7 Samarinda memiliki 2 (dua) Bidang Keahlian, yaitu: (1) Teknologi Informasi dan (2) Seni dan Ekonomi Kreatif.</p>
            <p>Bidang Keahlian Teknologi Informasi membuka 2 (dua) Program Keahlian yaitu: (1) Pengembangan Perangkat Lunak dan Gim; (2) Teknik Jaringan Komputer dan Telekomunikasi. Bidang Keahlian Seni dan Ekonomi Kreatif membuka 1 (satu) Program Keahlian, yaitu Desain Komunikasi dan Visual.</p>
            <p>Program Keahlian Teknik Jaringan Komputer dan Telekomunikasi memiliki 2 (dua) konsentrasi, yaitu konsentrasi (1) Teknisi Komputer dan jaringan; (2) Administrasi Jaringan&nbsp;</p>
            <p>Konsentrasi adalah pengkhususan studi yang diambil setelah satu tahun mengikuti pembelajaran di kelas X atau fase E. Pemilihan konsentrasi berdasarkan minat dan bakat atau passion peserta didik, setelah memiliki pengalaman belajar di kelas X, sehingga peserta didik diharapkan benar-benar telah memahami secara mendalam ruang lingkup program keahlian yang dipilihnya, antara lain meliputi profesi kerja setelah lulus, jabatan dalam pekerjaan, peluang usaha, jenis kompetensi, dan fasilitas yang digunakan.</p>
            <p>Sekolah melalui Wali Kelas, Guru produktif, dan Guru BK dapat memberikan saran kepada peserta didik atas pilihannya, berdasarkan dari pengamatan terhadap portofolio peserta didik selama mengikuti pembelajaran pada fase E (kelas X).</p>
            <p>Seluruh mata pelajaran yang ditawarkan dalam konsentrasi dikemas dalam bentuk Capaian Pembelajaran (CP) yang disusun oleh Guru Produktif. Capaian Pembelajaran diterjemahkan ke dalam Alur Tujuan Pembelajaran, kemudian dituangkan dalam Modul Ajar. Capaian hasil pembelajaran dapat berupa portofolio sebagai bentuk dari assessment. </p>
            <p>Berikut contoh peluang dan profesi kerja sesuai dengan konsentrasi program keahlian :</p>
            <figure class="misc-img"><img decoding="async" src="'.asset('images/TJKT-TABLE.png').'" alt="TJKT TABLE"></figure>
        ';
        return view('public/miscellanous', compact('content', 'title'));
    }

    public function dkv()
    {
        $title = 'Desain Komunikasi Visual';
        $content = '
            <p><strong>PENETAPAN KONSENTRASI KEAHLIAN</strong></p>
            <p>SMKN 7 Samarinda memiliki 2 (dua) Bidang Keahlian, yaitu: (1) Teknologi Informasi dan (2) Seni dan Ekonomi Kreatif.</p>
            <p>Bidang Keahlian Teknologi Informasi membuka 2 (dua) Program Keahlian yaitu: (1) Pengembangan Perangkat Lunak dan Gim; (2) Teknik Jaringan Komputer dan Telekomunikasi. Bidang Keahlian Seni dan Ekonomi Kreatif membuka 1 (satu) Program Keahlian, yaitu Desain Komunikasi dan Visual.</p>
            <p>Program Keahlian Pengembangan Perangkat Lunak dan Gim membuka&nbsp; konsentrasi, yaitu konsentrasi Pengembangan Perangkat Lunak dan Pengembangan game. &nbsp;Program Keahlian Teknik Jaringan Komputer dan Telekomunikasi membuka 2 konsentrasi, yaitu konsentrasi Teknisi Komputer dan Administrasi Jaringan. Program Keahlian Desain Komunikasi Visual memiliki 3 (tiga) konsentrasi yaitu konsentrasi (1) Desain Grafis; (2) Fotografi; dan (3) Videografi.</p>
            <p>Pada awal pembelajaran di kelas X peserta didik SMK Negeri 7 dikenalkan pada lapangan kerja, jabatan kerja setelah lulus, dan konsentrasi yang dapat dipelajari pada kelas XI dan XII untuk menumbuhkan passion (renjana), vision (visi), imajinasi, dan kreativitas peserta didik.</p>
            <p>Konsentrasi adalah pengkhususan studi yang diambil setelah satu tahun mengikuti pembelajaran di kelas X atau fase E. Pemilihan konsentrasi berdasarkan minat dan bakat atau passion peserta didik, setelah memiliki pengalaman belajar di kelas X, sehingga peserta didik diharapkan benar-benar telah memahami secara mendalam ruang lingkup program keahlian yang dipilihnya, antara lain meliputi profesi kerja setelah lulus, jabatan dalam pekerjaan, peluang usaha, jenis kompetensi, dan fasilitas yang digunakan.</p>
            <p>Sekolah melalui Wali Kelas, Guru produktif, dan Guru BK dapat memberikan saran kepada peserta didik atas pilihannya, berdasarkan dari pengamatan terhadap portofolio peserta didik selama mengikuti pembelajaran pada fase E (kelas X).</p>
            <p>Seluruh mata pelajaran yang ditawarkan dalam konsentrasi dikemas dalam bentuk Capaian Pembelajaran (CP) yang disusun oleh Guru Produktif. Capaian Pembelajaran diterjemahkan ke dalam Alur Tujuan Pembelajaran, kemudian dituangkan dalam Modul Ajar. Capaian hasil pembelajaran dapat berupa portofolio sebagai bentuk dari assessment.</p>
            <p>Berikut contoh peluang dan profesi kerja sesuai dengan konsentrasi program keahlian :</p>
            <figure class="misc-img"><img decoding="async" src="'.asset('images/DKV-TABLE.png').'" alt="PPLG TABLE"></figure>
        ';
        return view('public/miscellanous', compact('content', 'title'));
    }

    public function program_characteristic()
    {
        $title = 'Tugas dan Tujuan';
        $content = '
            <h4 class="h-4-misc">Tujuan Jangka Panjang</h4>
            <ol type="1"><li>Menghasilkan lulusan pembelajar sepanjang hayat yang beriman, bertakwa, berakhlak mulia, mandiri, peduli, cinta tanah air, bangga pada budaya bangsanya dan tenggang rasa sesuai dengan Profil Pelajar Pancasila.</li><li>Menghasilkan lulusan yang mampu bekerja, berwirausaha dan melanjutkan pendidikannya ke jenjang lebih tinggi pada lembaga akademik / vokasi / kedinasan terkemuka sesuai minat dan bakat yang dimilikinya.</li><li>Menghasilkan lulusan yang terampil dalam berpikir kritis, berkreatifitas, menghasilkan karya, memanfaatkan teknologi digital, dan mengembangkan minat serta bakatnya untuk menghasilkan prestasi.</li><li>Menghasilkan lulusan yang memiliki penguasaan 6 literasi dasar (literasi baca dan tulis, literasi numerasi, literasi sains, literasi digital, literasi budaya kewarganegaraan dan literasi finansial).</li></ol>
            <h4 class="h-4-misc">Tujuan Jangka Menengah</h4>
            <ol type="1"><li>Membentuk karakter pembelajar sepanjang hayat berlandaskan Profil Pelajar Pancasila.</li><li>Menyusun beban belajar bagi peserta didik dengan program keahlian yang <em>manageable </em>namun tetap berkualitas serta dengan proses belajar mengajar yang menyenangkan dan kontekstual.</li><li>Membekali peserta didik dengan ketrampilan, berfikir kreatif, kritis dan mandiri</li><li>Membekali peserta didik dengan penguasaan&nbsp; literasi dasar</li><li>Memfasilitasi peserta didik untuk mendapat keahlian kecakapan hidup dan berprestasi sesuai bakat dan minatnya.</li></ol>
            <h4 class="h-4-misc">Tujuan Jangka Pendek</h4>
            <ol type="1"><li><strong>Pembentukan karakter berdasar Profil Pelajar Pancasila</strong><ul><li>Melaksanakan pembiasaan sikap berbasis Profil Pelajar Pancasila secara terintegrasi pada mata pelajaran yang diselenggarakan baik dalam bentuk tatap muka atau dalam bentuk kegiatan proyek.</li><li>Melaksanakan penilaian sikap berbasis Profil Pelajar Pancasila.</li><li>Mendorong peserta didik mencapai minimal predikat BAIK pada penilaian sikap berbasis Profil Pelajar Pancasila.</li></ul></li><li><strong>Proses belajar yang menyenangkandan berkualitas</strong><ul><li>Mendorong keterlibatan peserta didik dalam proses belajar mengajar.</li></ul><ul><li>Mengelola proses belajar mengajar peserta didik dengan standar gerakan sekolah menyenangkan (GSM).</li></ul></li><li><strong>Keahlian berfikir kreatif, kritis, dan mandiri</strong><ul><li>Mengintegrasikan <em>project based learning </em>pada setiap mata pelajaran.</li><li>Memfasilitasi peserta didik menghasilkan produk kreatif&nbsp; dari <em>project based learning</em>.</li><li>Melaksanakan &nbsp;proses asesmen secara berkesinambungan</li></ul></li><li><strong>Penguasaan literasi dasar</strong><ul><li>Membekali peserta didik menjawab soal AKM (Asesmen Kompetensi Minimal) dengan tingkat level kognitif 1 dengan benar.</li><li>Membekali peserta didik menjawab soal AKM (Asesmen Kompetensi Minimal) dengan tingkat level kognitif 2 dengan benar.</li><li>Membekali peserta didik menjawab soal AKM (Asesmen Kompetensi Minimal) dengan tingkat level kognitif 3 dengan benar.</li></ul></li><li><strong>Kompetensi pengetahuan dan keterampilan minimal tingkat SMK</strong><ul><li>Memfasilitasi peserta didik untuk mampu mencapai rata-rata nilai akhir tahun ajaran minimal 75 pada aspek pengetahuan dan keterampilan.</li><li>Menangani peserta didik yang mengalami permasalahan pembelajaran agar dapat terselesaikan.</li></ul></li><li><strong>Lomba Kompetensi Siswa</strong><ul><li>Membekali pelajar dengan pengetahuan tata cara pembuatan karya siswa melalui proyek Profil Pelajar Pancasila.</li><li>Memfasilitasi pelajar menghasilkan karya siswa sesuai dengan minatnya.</li></ul></li></ol>
         ';
        return view('public/miscellanous', compact('content', 'title'));
    }

    public function infra()
    {
        $title = 'Sarana Infrastruktur';
        $content = '
            <p>Sarana infrastruktur yang dimiliki oleh SMK Negeri 7 Samarinda adalah:</p>
            <ol><li>Ruang Koperasi, </li><li>UKS, OSIS, </li><li>Unit Produksi, </li><li>Mushola, </li><li>Perpustakaan, </li><li>Ruang Server, </li><li>Studio Radio, </li><li>Ruang BK, </li><li>Ruang TU, </li><li>Ruang Kepala Sekolah, </li><li>Ruang Data, </li><li>Ruang Guru Umum dan Kejuruan, </li><li>Ruang Waka, </li><li>Ruang Tamu, </li><li>Ruang Teknisi, dan </li><li>Toilet Siswa 8 bilik yang berfungsi dengan baik serta 2 bilik toilet untuk guru.</li></ol>
            <p>Prasarana yang dapat ditonjolkan pada saat ini adalah filter air minum yang dapat diminum langsung untuk warga SMK Negeri 7 Samarinda.</p>
        ';
        return view('public/miscellanous', compact('content', 'title'));
    }

    public function bljr()
    {
        $title = 'Sarana Pembelajaran';
        $content = '
            <p>Sarana pembelajaran yang dimiliki oleh SMK Negeri 7 Samarinda adalah:</p>
            <ol><li>Ruang Kelas sejumlah 17 ruang kelas dan masih kurang 6 ruang kelas karena jumlah rombel yang ada pada saat ini berjumlah 23 rombel, sehingga KBM yang dilaksanakan masih menggunakan sistem 2 shift yaitu pagi untuk kelas XI dan XII sementara untuk siang hari kelas X. </li><li>Sekolah memiliki Laboratorium sejumlah 3 ruang meliputi: Laboratorium Multimedia, TKJ dan RPL. </li><li>Ruang praktik siswa untuk Desain Komunikasi Visual. </li><li>Gudang Peralatan Praktik dan Perlengkapan.</li></ol>        
        ';
        return view('public/miscellanous', compact('content', 'title'));
    }

    public function hubungan_industri()
    {
        $title = 'Hubungan Industri';
        $content = '
            <p>DUDIKA yang telah melakukan MoU dengan SMK Negeri 7 Samarinda tercatat ada 6 perusahaan yaitu <strong>CV GreeNusa Komputindo, LHH Multimedia, AP Percetakan, PT Telkom, iNews Tenggarong, dan CV Jupiter</strong> yang siap untuk menerima peserta didik atau guru SMK Negeri 7 Samarinda yang hendak melaksanakan PKL atau magang guru, serta terlibat dalam musyawarah yang berkaitan dengan KBM kejuruan di sekolah.</p>
            <p>Kemudian untuk instansi pemerintah dan DUDIKA tercatat ada 55 instansi atau DUDIKA yang siap menampung peserta didik untuk PKL. Peluang kerjasama ini nantinya akan ditindak lanjuti untuk menawarkan MoU agar menjalin kerjasama yang lebih baik lagi untuk menjadikan DUDIKA sebagai wahana belajar peserta didik,</p>
            <p>Keterlibatan DUDIKA dengan SMK Negeri 7 Samarinda adalah dalam kegiatan <em>link and match</em> kurikulum sekolah dengan industri yang <em>running </em>hari ini digunakan oleh industri untuk menjawab tantangan peserta didik SMK Negeri 7 Samarinda mampu bersaing dan siap pakai oleh DUDIKA. Pendidik yang mengampu mapel kejuruan pun tercatat 4 orang yang telah melakukan magang di industri untuk meningkatkan pengetahuan, pemahaman, keterampilan, dan kompetensi agar selalu <em>update </em>teknologi dan menerapkan di sekolah.</p>
        ';
        return view('public/miscellanous', compact('content', 'title'));
    }
}
