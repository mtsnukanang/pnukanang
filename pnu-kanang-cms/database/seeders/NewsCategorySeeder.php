<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Kegiatan Pesantren', 'slug' => 'kegiatan-pesantren', 'description' => 'Liputan kegiatan harian dan event pesantren'],
            ['name' => 'Kajian Islami', 'slug' => 'kajian-islami', 'description' => 'Artikel kajian dan pengajian'],
            ['name' => 'Prestasi Santri', 'slug' => 'prestasi-santri', 'description' => 'Prestasi santri di berbagai bidang'],
        ];

        foreach ($categories as $c) {
            NewsCategory::updateOrCreate(['slug' => $c['slug']], $c);
        }
    }
}
