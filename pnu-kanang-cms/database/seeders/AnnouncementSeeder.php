<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Pembukaan Pendaftaran Santri Baru Tahun Ajaran 2026/2027',
                'content' => "Diberitahukan kepada seluruh masyarakat bahwa Pondok Pesantren Nahdlatul Ummah Kanang membuka pendaftaran santri baru untuk Tahun Ajaran 2026/2027.\n\nGelombang pendaftaran:\n- Gelombang I: Januari - Maret 2026\n- Gelombang II: April - Juni 2026\n- Gelombang III: Juli - Agustus 2026\n\nProgram yang tersedia:\n- Madrasah Diniyah\n- Tahfidz Al-Qur'an\n- Kajian Kitab Kuning\n\nSyarat dan formulir pendaftaran dapat diakses melalui menu Pendaftaran di website ini. Untuk informasi lebih lanjut, hubungi panitia di nomor 0812-3456-7890.\n\nKuota terbatas. Mohon mendaftar sedini mungkin.",
                'days_ago' => 2,
            ],
            [
                'title' => 'Jadwal Libur Hari Raya Idul Fitri 1447 H',
                'content' => "Berikut jadwal libur Hari Raya Idul Fitri 1447 H bagi seluruh santri Pondok Pesantren Nahdlatul Ummah Kanang:\n\n- Mulai libur: 7 hari sebelum 1 Syawal\n- Kembali ke pesantren: 7 hari setelah 1 Syawal\n\nDimohon kepada seluruh wali santri untuk:\n1. Menjemput putra-putrinya tepat waktu sesuai jadwal pulang.\n2. Mengembalikan santri tepat waktu sesuai jadwal kembali.\n3. Memastikan santri tetap menjaga ibadah dan adab selama di rumah.\n\nSemoga libur ini menjadi momen silaturahmi dan kebersamaan keluarga. Mohon maaf lahir dan batin. Taqabbalallahu minna wa minkum.",
                'days_ago' => 5,
            ],
            [
                'title' => 'Pengumuman Hasil Ujian Akhir Madrasah Diniyah',
                'content' => "Diumumkan kepada seluruh santri Madrasah Diniyah Pondok Pesantren Nahdlatul Ummah Kanang bahwa hasil Ujian Akhir Madrasah telah diumumkan dan dapat dilihat di papan pengumuman pesantren atau melalui wali kelas masing-masing.\n\nBagi santri yang dinyatakan lulus, dapat mengambil sertifikat di kantor administrasi pesantren mulai tanggal yang akan diinformasikan lebih lanjut.\n\nBagi santri yang belum lulus, akan diadakan ujian susulan sesuai jadwal yang akan diumumkan.\n\nSelamat bagi seluruh santri yang lulus. Semoga ilmu yang diperoleh menjadi berkah dan bermanfaat. Aamiin.",
                'days_ago' => 10,
            ],
        ];

        foreach ($items as $item) {
            $slug = Str::slug($item['title']);
            Announcement::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $item['title'],
                    'slug' => $slug,
                    'content' => $item['content'],
                    'is_active' => true,
                    'published_at' => now()->subDays($item['days_ago']),
                ]
            );
        }
    }
}
