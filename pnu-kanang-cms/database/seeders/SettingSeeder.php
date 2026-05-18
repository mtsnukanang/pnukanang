<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Pondok Pesantren Nahdlatul Ummah Kanang', 'group' => 'general', 'label' => 'Nama Website'],
            ['key' => 'site_short_name', 'value' => 'PNU Kanang', 'group' => 'general', 'label' => 'Nama Singkat'],
            ['key' => 'site_tagline', 'value' => 'Membentuk Generasi Qurani dan Berakhlakul Karimah', 'group' => 'general', 'label' => 'Tagline'],
            ['key' => 'address', 'value' => 'Jl. Poros Kanang No. 1, Kec. Binuang, Kab. Polewali Mandar, Sulawesi Barat 91361', 'group' => 'contact', 'label' => 'Alamat'],
            ['key' => 'phone', 'value' => '0812-3456-7890', 'group' => 'contact', 'label' => 'Telepon'],
            ['key' => 'whatsapp', 'value' => '6281234567890', 'group' => 'contact', 'label' => 'WhatsApp'],
            ['key' => 'email', 'value' => 'info@pnukanang.local', 'group' => 'contact', 'label' => 'Email'],
            ['key' => 'hero_tagline', 'value' => 'Membentuk generasi Qurani, berakhlakul karimah, mandiri, dan berwawasan Ahlussunnah wal Jamaah an-Nahdliyah.', 'group' => 'frontend', 'label' => 'Hero Tagline'],
            ['key' => 'footer_tagline', 'value' => 'Lembaga pendidikan Islam yang berpegang teguh pada ajaran Ahlussunnah wal Jamaah an-Nahdliyah.', 'group' => 'frontend', 'label' => 'Footer Tagline'],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
