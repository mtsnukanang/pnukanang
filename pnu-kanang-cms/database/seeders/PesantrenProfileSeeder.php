<?php

namespace Database\Seeders;

use App\Models\PesantrenProfile;
use Illuminate\Database\Seeder;

class PesantrenProfileSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'section' => 'sambutan',
                'title' => 'Sambutan Pengasuh',
                'content' => "Assalamu'alaikum warahmatullahi wabarakatuh.\n\nAlhamdulillah, segala puji bagi Allah Subhanahu wa Ta'ala yang telah melimpahkan rahmat dan hidayah-Nya kepada kita semua. Shalawat serta salam semoga senantiasa tercurah kepada junjungan kita Nabi Muhammad SAW, keluarga, sahabat, dan para pengikutnya hingga akhir zaman.\n\nAtas nama keluarga besar Pondok Pesantren Nahdlatul Ummah Kanang, kami menyambut hangat kunjungan Anda di website resmi pesantren ini. Pondok Pesantren Nahdlatul Ummah Kanang berkomitmen untuk membentuk santri yang berilmu, bertakwa, berakhlakul karimah, serta berpegang teguh pada ajaran Ahlussunnah wal Jamaah an-Nahdliyah.\n\nKami berharap kehadiran website ini dapat menjadi sarana silaturahmi, informasi, dan dakwah bagi seluruh umat. Semoga Allah SWT memberkahi setiap langkah kebaikan kita semua.\n\nWassalamu'alaikum warahmatullahi wabarakatuh.\n\nKH. Pengasuh Pondok Pesantren\nNahdlatul Ummah Kanang",
            ],
            [
                'section' => 'sejarah',
                'title' => 'Sejarah Pondok Pesantren Nahdlatul Ummah Kanang',
                'content' => "Pondok Pesantren Nahdlatul Ummah Kanang berdiri di tengah masyarakat Kanang, Kecamatan Binuang, Kabupaten Polewali Mandar, Sulawesi Barat. Berawal dari keprihatinan para tokoh masyarakat dan ulama setempat akan pentingnya pendidikan agama bagi generasi muda, dibentuklah sebuah lembaga pendidikan Islam yang berhaluan Ahlussunnah wal Jamaah an-Nahdliyah.\n\nDengan semangat khidmat kepada agama, bangsa, dan negara, pesantren ini terus berkembang dari tahun ke tahun. Awalnya hanya berupa majelis ta'lim sederhana, kini Pondok Pesantren Nahdlatul Ummah Kanang telah menjadi lembaga pendidikan terpadu yang mengelola Madrasah Diniyah, program Tahfidz Al-Qur'an, kajian kitab kuning, serta berbagai kegiatan keagamaan dan ekstrakurikuler.\n\nDi bawah bimbingan para Kiai dan Asatidz yang ikhlas berjuang, pesantren ini telah meluluskan ratusan santri yang kini berkhidmat di berbagai bidang kehidupan, baik sebagai dai, pengajar, maupun profesional di masyarakat. Komitmen kami adalah terus melanjutkan perjuangan para ulama salafus shalih dalam menjaga ajaran Islam yang rahmatan lil 'alamin.",
            ],
            [
                'section' => 'visi_misi',
                'title' => 'Visi & Misi',
                'content' => "VISI:\nMenjadi lembaga pendidikan Islam unggulan yang melahirkan generasi Qurani, berakhlakul karimah, mandiri, dan berwawasan Ahlussunnah wal Jamaah an-Nahdliyah.\n\nMISI:\n1. Menyelenggarakan pendidikan agama Islam yang berkualitas dengan rujukan kitab-kitab muktabar para ulama salafus shalih.\n2. Membentuk pribadi santri yang berakhlak mulia, jujur, disiplin, dan bertanggung jawab.\n3. Mengembangkan program tahfidz Al-Qur'an dan kajian kitab kuning sebagai ciri khas pesantren NU.\n4. Membekali santri dengan keterampilan hidup (life skills) untuk menjadi pribadi yang mandiri.\n5. Menanamkan nilai-nilai Ahlussunnah wal Jamaah an-Nahdliyah dalam setiap aspek kehidupan santri.\n6. Membangun kerjasama yang harmonis dengan masyarakat, pemerintah, dan lembaga pendidikan lainnya.\n\nTUJUAN:\n- Mencetak hafidz/hafidzah Al-Qur'an yang memahami isi kandungannya.\n- Menghasilkan santri yang mampu membaca dan memahami kitab kuning.\n- Membentuk kader penerus perjuangan ulama Ahlussunnah wal Jamaah an-Nahdliyah.\n- Menjadikan santri sebagai agen perubahan positif di tengah masyarakat.",
            ],
            [
                'section' => 'struktur_organisasi',
                'title' => 'Struktur Organisasi Pesantren',
                'content' => "Pondok Pesantren Nahdlatul Ummah Kanang dikelola dengan struktur organisasi yang jelas demi kelancaran pendidikan dan pengasuhan santri. Berikut struktur organisasi pengelola pesantren:\n\n1. PENGASUH UTAMA\n   - KH. Pengasuh PNU Kanang\n\n2. DEWAN PEMBINA\n   - Para Sesepuh dan Tokoh NU setempat\n\n3. PIMPINAN PESANTREN\n   - Mudir (Kepala Pesantren)\n   - Wakil Mudir Bidang Pendidikan\n   - Wakil Mudir Bidang Kesantrian\n   - Wakil Mudir Bidang Sarana & Prasarana\n\n4. KEPALA UNIT\n   - Kepala Madrasah Diniyah\n   - Kepala Program Tahfidz Al-Qur'an\n   - Kepala Bidang Kepengasuhan\n\n5. DEWAN ASATIDZ\n   - Pengajar Kitab Kuning\n   - Pengajar Tahfidz\n   - Pengajar Ilmu Alat (Nahwu, Sharaf)\n   - Pengajar Akhlak & Tasawuf\n\n6. STAF ADMINISTRASI\n   - Bendahara\n   - Sekretariat\n   - Bagian Keasramaan\n\n7. ORGANISASI SANTRI\n   - Pengurus Asrama Putra\n   - Pengurus Asrama Putri\n   - Koordinator Kegiatan Santri",
            ],
            [
                'section' => 'pengasuh',
                'title' => 'Pengasuh dan Dewan Asatidz',
                'content' => "PENGASUH UTAMA\nKH. Pengasuh PNU Kanang merupakan tokoh ulama yang menjadi panutan bagi seluruh santri dan masyarakat sekitar. Beliau adalah alumni pesantren-pesantren NU terkemuka di tanah air dan telah berkhidmat dalam dunia pendidikan Islam selama puluhan tahun.\n\nDEWAN ASATIDZ\nPondok Pesantren Nahdlatul Ummah Kanang didukung oleh para asatidz/asatidzah yang ikhlas berjuang menyebarkan ilmu agama. Para pengajar pesantren ini umumnya adalah alumni pesantren ternama serta perguruan tinggi Islam, antara lain:\n\n1. Pengajar Kitab Kuning - Lulusan pesantren salaf dengan sanad keilmuan yang muttashil.\n2. Pengajar Tahfidz - Para hafidz/hafidzah dengan sanad bacaan Al-Qur'an yang sahih.\n3. Pengajar Ilmu Alat (Nahwu & Sharaf) - Spesialisasi dalam tata bahasa Arab klasik.\n4. Pengajar Akhlak dan Tasawuf - Pengamal tarekat mu'tabarah.\n5. Pengajar Umum - Sarjana berbagai disiplin ilmu untuk kegiatan ekstrakurikuler.\n\nSeluruh dewan asatidz tidak hanya mengajar di kelas, tetapi juga menjadi teladan bagi santri dalam keseharian, baik dalam ibadah, akhlak, maupun kemandirian.",
            ],
            [
                'section' => 'fasilitas',
                'title' => 'Fasilitas Pesantren',
                'content' => "Untuk menunjang kenyamanan dan kelancaran proses pendidikan santri, Pondok Pesantren Nahdlatul Ummah Kanang menyediakan berbagai fasilitas berikut:\n\n1. ASRAMA SANTRI\n   - Asrama putra dan putri terpisah\n   - Kamar santri yang bersih, layak, dan tertib\n   - Kamar mandi yang memadai\n\n2. MASJID PESANTREN\n   - Tempat utama untuk shalat berjamaah lima waktu\n   - Pusat kegiatan keagamaan dan pengajian\n   - Mihrab dan mimbar yang memadai\n\n3. RUANG BELAJAR\n   - Ruang kelas Madrasah Diniyah\n   - Aula pengajian kitab kuning\n   - Ruang tahfidz Al-Qur'an\n\n4. PERPUSTAKAAN\n   - Koleksi kitab-kitab klasik dan kontemporer\n   - Buku-buku referensi keilmuan Islam\n   - Ruang baca yang nyaman\n\n5. SARANA KESEHATAN & DAPUR\n   - Klinik santri (Poskestren)\n   - Dapur umum dengan menu sehat dan halal\n   - Tempat makan bersama\n\n6. SARANA OLAHRAGA & KEGIATAN\n   - Lapangan olahraga\n   - Aula serbaguna untuk kegiatan santri\n   - Taman hijau pesantren\n\n7. SARANA PENUNJANG LAINNYA\n   - Air bersih 24 jam\n   - Listrik yang memadai\n   - Akses internet untuk kebutuhan belajar\n   - Koperasi santri",
            ],
            [
                'section' => 'pendaftaran',
                'title' => 'Informasi Pendaftaran',
                'content' => "Persyaratan Pendaftaran Santri Baru:\n\n1. Mengisi formulir pendaftaran online di website ini.\n2. Calon santri minimal lulus SD/MI atau sederajat.\n3. Membawa fotokopi ijazah/surat keterangan lulus.\n4. Membawa fotokopi akta kelahiran dan Kartu Keluarga.\n5. Pas foto berwarna ukuran 3x4 sebanyak 4 lembar.\n6. Surat keterangan sehat dari dokter.\n7. Membayar biaya pendaftaran (informasi lengkap dapat ditanyakan kepada panitia).\n\nAlur Pendaftaran:\n- Mengisi formulir pendaftaran online.\n- Panitia akan menghubungi melalui WhatsApp/telepon.\n- Datang ke pesantren untuk verifikasi berkas.\n- Tes wawancara santri dan orang tua.\n- Pengumuman penerimaan.\n- Heregistrasi & masuk asrama.\n\nKontak Panitia Penerimaan Santri Baru:\nWhatsApp: 0812-3456-7890\nEmail: info@pnukanang.local\n\nCatatan: Pendaftaran dibuka sepanjang tahun. Kuota terbatas. Mohon mendaftar sedini mungkin.",
            ],
        ];

        foreach ($sections as $s) {
            PesantrenProfile::updateOrCreate(['section' => $s['section']], $s);
        }
    }
}
