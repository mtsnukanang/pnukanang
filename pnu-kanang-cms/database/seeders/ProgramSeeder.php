<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Madrasah Diniyah',
                'icon' => 'bi-book',
                'order' => 1,
                'description' => "Program pendidikan agama Islam yang terstruktur dengan jenjang Awwaliyah (dasar), Wustho (menengah), dan Ulya (lanjutan). Santri akan mempelajari berbagai disiplin ilmu agama secara bertahap dan sistematis.\n\nMata pelajaran meliputi:\n- Aqidah dan Akhlak\n- Fiqih dan Ushul Fiqih\n- Tafsir Al-Qur'an\n- Hadits dan Mustholah Hadits\n- Sejarah Kebudayaan Islam\n- Ilmu Alat (Nahwu dan Sharaf)\n- Bahasa Arab\n\nPembelajaran dilaksanakan setiap hari dengan jadwal yang disesuaikan dengan kegiatan asrama.",
            ],
            [
                'name' => 'Tahfidz Al-Qur\'an',
                'icon' => 'bi-bookmark-star',
                'order' => 2,
                'description' => "Program unggulan PNU Kanang yang fokus pada penghafalan Al-Qur'an 30 juz beserta pemahaman maknanya. Santri dibimbing oleh para hafidz/hafidzah berkualifikasi dengan sanad bacaan yang sahih.\n\nMetode pembelajaran:\n- Setoran hafalan harian (ziyadah)\n- Muroja'ah hafalan (mengulang)\n- Tasmi' (menyimak hafalan teman)\n- Sema'an Al-Qur'an rutin\n- Pemahaman tafsir ayat\n\nProgram ini ditargetkan dapat diselesaikan dalam waktu 3-5 tahun sesuai dengan kemampuan masing-masing santri.",
            ],
            [
                'name' => 'Kajian Kitab Kuning',
                'icon' => 'bi-journal-bookmark',
                'order' => 3,
                'description' => "Pengajian kitab-kitab klasik (kitab kuning) ala pesantren salaf NU dengan metode bandongan dan sorogan. Program ini diperuntukkan bagi santri yang telah menyelesaikan ilmu alat dasar.\n\nKitab-kitab yang dikaji:\n- Tafsir: Tafsir Jalalain, Tafsir Munir\n- Hadits: Riyadhus Shalihin, Bulughul Maram\n- Fiqih: Fathul Qarib, Fathul Mu'in\n- Tasawuf: Ihya Ulumuddin, Ta'lim Muta'allim\n- Akhlak: Ta'lim Muta'allim, Akhlak Lil Banin\n\nPengajian dipimpin langsung oleh KH. Pengasuh dan asatidz senior dengan sanad keilmuan yang muttashil.",
            ],
            [
                'name' => 'Kegiatan Keagamaan',
                'icon' => 'bi-mosque',
                'order' => 4,
                'description' => "Berbagai kegiatan keagamaan rutin yang membentuk karakter spiritual santri dan melestarikan tradisi Ahlussunnah wal Jamaah an-Nahdliyah.\n\nKegiatan rutin:\n- Shalat berjamaah lima waktu\n- Pembacaan Yasin & Tahlil setiap Jum'at\n- Maulid Simthud Durar mingguan\n- Pembacaan Burdah dan Ratib\n- Istighotsah bulanan\n- Pengajian umum hari Jumat\n\nKegiatan tahunan:\n- Peringatan Maulid Nabi Muhammad SAW\n- Peringatan Isra' Mi'raj\n- Haul masyayikh\n- Khataman Al-Qur'an akhir tahun\n- Peringatan 1 Muharram dan tahun baru Hijriyah",
            ],
            [
                'name' => 'Ekstrakurikuler & Keterampilan',
                'icon' => 'bi-tools',
                'order' => 5,
                'description' => "Selain pendidikan agama, santri PNU Kanang juga dibekali keterampilan hidup (life skills) dan kegiatan ekstrakurikuler yang menunjang pengembangan bakat dan minat.\n\nKegiatan ekstrakurikuler:\n- Hadrah dan Banjari\n- Qiraat dan Tahfidz\n- Kaligrafi (Khat Al-Qur'an)\n- Pidato dan Khitabah (3 bahasa: Indonesia, Arab, Inggris)\n- Pramuka Santri\n- Olahraga (sepak bola, bulu tangkis, voli)\n\nKeterampilan hidup:\n- Pertanian dan peternakan organik\n- Komputer dasar dan multimedia\n- Wirausaha santri (kantin, koperasi)\n- Tata boga dan catering\n\nProgram ini bertujuan agar santri tidak hanya pandai mengaji, tetapi juga mandiri dan siap berkontribusi di masyarakat.",
            ],
        ];

        foreach ($items as $item) {
            $slug = Str::slug($item['name']);
            Program::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $item['name'],
                    'slug' => $slug,
                    'description' => $item['description'],
                    'icon' => $item['icon'],
                    'order' => $item['order'],
                    'is_active' => true,
                ]
            );
        }
    }
}
