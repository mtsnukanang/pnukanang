<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Kegiatan Belajar', 'slug' => 'kegiatan-belajar'],
            ['name' => 'Acara Keagamaan', 'slug' => 'acara-keagamaan'],
            ['name' => 'Kegiatan Santri', 'slug' => 'kegiatan-santri'],
            ['name' => 'Fasilitas', 'slug' => 'fasilitas'],
        ];

        foreach ($categories as $c) {
            GalleryCategory::updateOrCreate(['slug' => $c['slug']], $c);
        }
    }
}
