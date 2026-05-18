<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@pnukanang.local')->first();
        $kegiatan = NewsCategory::where('slug', 'kegiatan-pesantren')->first();
        $kajian = NewsCategory::where('slug', 'kajian-islami')->first();
        $prestasi = NewsCategory::where('slug', 'prestasi-santri')->first();

        $items = [
            [
                'title' => 'Peringatan Maulid Nabi Muhammad SAW di Pondok Pesantren Nahdlatul Ummah Kanang',
                'category_id' => $kegiatan->id,
                'image' => 'img/news-1.svg',
                'excerpt' => 'Pondok Pesantren Nahdlatul Ummah Kanang menggelar peringatan Maulid Nabi Muhammad SAW dengan khidmat dan penuh keberkahan.',
                'content' => "Pondok Pesantren Nahdlatul Ummah Kanang baru saja menyelenggarakan peringatan Maulid Nabi Muhammad SAW yang dihadiri oleh seluruh santri, asatidz, wali santri, serta masyarakat sekitar. Acara ini merupakan tradisi tahunan yang telah berlangsung sejak pesantren berdiri.\n\nKegiatan dimulai dengan pembacaan Maulid Simthud Durar dan dilanjutkan dengan mahallul qiyam yang dipimpin oleh KH. Pengasuh. Suasana terasa sangat khusyu' dan penuh haru ketika seluruh hadirin berdiri menyambut kelahiran Baginda Nabi Muhammad SAW.\n\nDalam ceramah maulidnya, KH. Pengasuh menyampaikan pentingnya meneladani akhlak Rasulullah SAW dalam kehidupan sehari-hari. Beliau menekankan bahwa cinta kepada Nabi tidak hanya diucapkan, tetapi juga harus diwujudkan melalui sunnah-sunnah beliau.\n\nAcara diakhiri dengan doa bersama dan ramah tamah berupa hidangan yang telah disiapkan oleh panitia. Para santri menunjukkan antusiasme tinggi dalam setiap rangkaian acara, mulai dari lomba kaligrafi hingga pembacaan barzanji.\n\nSemoga peringatan Maulid Nabi tahun ini membawa keberkahan bagi seluruh civitas pesantren dan menjadi sarana untuk meningkatkan kecintaan kepada Rasulullah SAW. Aamiin.",
            ],
            [
                'title' => 'Khataman Al-Qur\'an Akhir Tahun: 25 Santri Berhasil Menyelesaikan Hafalan 30 Juz',
                'category_id' => $prestasi->id,
                'image' => 'img/news-3.svg',
                'excerpt' => 'Sebanyak 25 santri program tahfidz berhasil menyelesaikan hafalan 30 juz Al-Qur\'an pada acara khataman akhir tahun.',
                'content' => "Alhamdulillah, sebanyak 25 santri Pondok Pesantren Nahdlatul Ummah Kanang berhasil menyelesaikan hafalan 30 juz Al-Qur'an pada acara khataman akhir tahun yang berlangsung khidmat. Acara ini menjadi momen kebanggaan bagi seluruh keluarga besar pesantren, terutama bagi orang tua para santri yang telah dengan sabar mendukung perjuangan putra-putrinya.\n\nProsesi khataman dimulai dengan pembacaan ayat-ayat suci Al-Qur'an oleh para santri tahfidz secara bergiliran. Selanjutnya, dilakukan ujian tahfidz lisan oleh dewan asatidz untuk memastikan kelancaran hafalan. Setiap santri yang lulus ujian akan diserahkan syahadah (sertifikat) hafalan langsung oleh KH. Pengasuh.\n\nKepala Program Tahfidz menyatakan bahwa keberhasilan ini merupakan buah dari kesungguhan santri, kesabaran asatidz, serta doa restu para orang tua. Beliau juga mengingatkan agar para santri terus muroja'ah (mengulang) hafalannya secara istiqamah agar tidak hilang.\n\nDi sela-sela acara, KH. Pengasuh menyampaikan tausiyah tentang fadhilah (keutamaan) menjadi penghafal Al-Qur'an. Beliau berharap para santri tidak hanya menjadi hafidz, tetapi juga menjadi pengamal Al-Qur'an dalam kehidupan sehari-hari.\n\nKepada para hafidz baru kami ucapkan barakallahu fiikum. Semoga ilmu yang dimiliki menjadi cahaya bagi diri sendiri, keluarga, dan masyarakat.",
            ],
            [
                'title' => 'Kajian Rutin Kitab Kuning Setiap Ba\'da Subuh untuk Santri Senior',
                'category_id' => $kajian->id,
                'image' => 'img/news-2.svg',
                'excerpt' => 'Kajian rutin kitab kuning ba\'da subuh menjadi salah satu kegiatan unggulan PNU Kanang untuk santri tingkat lanjut.',
                'content' => "Salah satu ciri khas Pondok Pesantren Nahdlatul Ummah Kanang adalah pengajian kitab kuning yang dilaksanakan secara rutin setiap ba'da Subuh. Kegiatan ini diikuti oleh santri-santri senior yang telah menamatkan pelajaran ilmu alat (nahwu dan sharaf) tingkat dasar.\n\nKitab-kitab yang dikaji antara lain Tafsir Jalalain, Riyadhus Shalihin, Fathul Qarib, Bulughul Maram, dan Ta'lim Muta'allim. Pengajian dipimpin langsung oleh KH. Pengasuh dan beberapa asatidz senior dengan metode bandongan dan sorogan ala pesantren salaf.\n\nMetode bandongan dilakukan dengan cara guru membaca dan menjelaskan kitab, sementara santri menyimak dan memberi makna pada kitab masing-masing. Sedangkan metode sorogan, santri membaca di hadapan guru untuk diuji pemahamannya.\n\nKegiatan ini bertujuan untuk membentuk santri yang tidak hanya hafal Al-Qur'an, tetapi juga memahami fiqih, akhlak, hadits, dan tafsir berdasarkan metodologi para ulama salaf. Dengan demikian, santri PNU Kanang diharapkan dapat menjadi penerus para ulama yang mumpuni dalam berbagai disiplin ilmu agama.\n\nBagi alumni Pondok Pesantren Nahdlatul Ummah Kanang, pengajian ba'da Subuh menjadi kenangan tak terlupakan yang membekas dalam ingatan dan menjadi bekal dalam berkhidmat di masyarakat.",
            ],
            [
                'title' => 'Santri PNU Kanang Raih Juara MTQ Tingkat Kabupaten',
                'category_id' => $prestasi->id,
                'image' => 'img/placeholder.svg',
                'excerpt' => 'Tiga santri PNU Kanang berhasil meraih prestasi gemilang dalam Musabaqah Tilawatil Qur\'an tingkat kabupaten.',
                'content' => "Kabar membanggakan datang dari arena Musabaqah Tilawatil Qur'an (MTQ) tingkat Kabupaten Polewali Mandar. Tiga santri Pondok Pesantren Nahdlatul Ummah Kanang berhasil meraih prestasi gemilang dalam berbagai cabang lomba yang diselenggarakan.\n\nAhmad Faiz (16 tahun) berhasil meraih Juara 1 cabang Tilawah Remaja, sementara Siti Khadijah (15 tahun) menyabet Juara 2 cabang Tahfidz 10 Juz. Tidak hanya itu, Muhammad Yusuf (17 tahun) juga berhasil mengukir prestasi sebagai Juara 3 cabang Khat Al-Qur'an (kaligrafi).\n\nKepala Madrasah Diniyah PNU Kanang menyampaikan rasa syukur dan kebanggaannya atas pencapaian ini. Beliau menjelaskan bahwa para santri telah mempersiapkan diri secara intensif selama berbulan-bulan, dibimbing oleh asatidz spesialis di bidang masing-masing.\n\nPara juara akan mewakili Kabupaten Polewali Mandar pada MTQ tingkat Provinsi Sulawesi Barat yang akan diselenggarakan beberapa bulan ke depan. Pesantren akan terus mendukung persiapan mereka agar dapat memberikan hasil terbaik di tingkat provinsi.\n\nSemoga prestasi ini menjadi motivasi bagi seluruh santri untuk terus mencintai dan mempelajari Al-Qur'an. Selamat kepada para juara, semoga ilmunya barokah dan bermanfaat untuk umat.",
            ],
            [
                'title' => 'Bakti Sosial Santri PNU Kanang di Desa Sekitar Pesantren',
                'category_id' => $kegiatan->id,
                'image' => 'img/placeholder.svg',
                'excerpt' => 'Para santri menggelar bakti sosial berupa pembagian sembako dan kerja bakti membersihkan masjid di desa sekitar.',
                'content' => "Sebagai bentuk implementasi nilai-nilai khidmah dan kepedulian sosial, para santri Pondok Pesantren Nahdlatul Ummah Kanang menggelar kegiatan bakti sosial di beberapa desa di sekitar pesantren. Kegiatan ini melibatkan kurang lebih 150 santri dari berbagai jenjang.\n\nKegiatan bakti sosial meliputi pembagian paket sembako kepada warga kurang mampu, kerja bakti membersihkan masjid-masjid desa, serta pengajian umum yang diisi oleh santri senior bersama asatidz pendamping. Para santri juga membantu memperbaiki fasilitas umum yang mengalami kerusakan ringan.\n\nKegiatan ini merupakan bagian dari program 'Khidmat Santri' yang rutin diselenggarakan setiap bulan. Tujuannya adalah membentuk karakter santri yang tidak hanya pandai mengaji, tetapi juga peka terhadap permasalahan sosial di sekitarnya.\n\nKoordinator kegiatan menyampaikan bahwa bakti sosial ini juga bertujuan untuk mempererat tali silaturahmi antara pesantren dengan masyarakat sekitar. Beliau berharap kegiatan serupa dapat terus dilakukan secara berkelanjutan.\n\nWarga desa yang mendapat manfaat dari kegiatan ini menyampaikan apresiasi dan terima kasih kepada pesantren. Mereka berharap pesantren dapat terus menjadi pusat kebaikan bagi masyarakat sekitar.",
            ],
            [
                'title' => 'Pelatihan Keterampilan Hidup: Santri Belajar Pertanian Organik',
                'category_id' => $kegiatan->id,
                'image' => 'img/placeholder.svg',
                'excerpt' => 'Untuk membekali santri dengan keterampilan hidup, pesantren mengadakan pelatihan pertanian organik selama satu pekan.',
                'content' => "Pondok Pesantren Nahdlatul Ummah Kanang menyelenggarakan pelatihan pertanian organik selama satu pekan bagi para santri tingkat lanjut. Pelatihan ini bekerjasama dengan Dinas Pertanian setempat dan beberapa praktisi pertanian organik lokal.\n\nPelatihan ini bertujuan untuk membekali santri dengan keterampilan hidup (life skills) yang dapat dimanfaatkan setelah lulus dari pesantren. Selama satu pekan, santri belajar mulai dari pengolahan lahan, pembuatan pupuk kompos organik, penanaman bibit, hingga teknik panen yang baik.\n\nKepala Bidang Kesantrian menyatakan bahwa pesantren tidak hanya fokus pada ilmu agama, tetapi juga mempersiapkan santri agar mandiri dalam kehidupan ekonomi. Pertanian organik dipilih karena sesuai dengan kondisi geografis Sulawesi Barat dan tren konsumsi sehat saat ini.\n\nBeberapa santri mengaku sangat antusias mengikuti pelatihan ini. Mereka menyatakan bahwa keterampilan ini akan sangat bermanfaat ketika kembali ke kampung halaman, terutama bagi yang berasal dari daerah pertanian.\n\nKe depannya, pesantren berencana mengembangkan kebun pesantren sebagai laboratorium praktik bagi santri sekaligus sumber bahan pangan organik untuk kebutuhan dapur pesantren. Inisiatif ini diharapkan dapat menjadi model pesantren mandiri yang ramah lingkungan.",
            ],
        ];

        foreach ($items as $item) {
            $slug = Str::slug($item['title']);
            News::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $item['title'],
                    'slug' => $slug,
                    'excerpt' => $item['excerpt'],
                    'content' => $item['content'],
                    'featured_image' => $item['image'] ?? null,
                    'news_category_id' => $item['category_id'],
                    'author_id' => $admin?->id,
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(1, 30)),
                ]
            );
        }
    }
}
