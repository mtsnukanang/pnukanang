<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $kegiatan = GalleryCategory::where('slug', 'kegiatan-belajar')->first();
        $keagamaan = GalleryCategory::where('slug', 'acara-keagamaan')->first();
        $santri = GalleryCategory::where('slug', 'kegiatan-santri')->first();
        $fasilitas = GalleryCategory::where('slug', 'fasilitas')->first();

        $items = [
            ['title' => 'Pengajian Kitab Kuning Ba\'da Subuh', 'image' => 'img/gallery-2.svg', 'category_id' => $kegiatan?->id, 'description' => 'Suasana khidmat pengajian kitab kuning rutin di pesantren.'],
            ['title' => 'Peringatan Maulid Nabi Muhammad SAW', 'image' => 'img/gallery-4.svg', 'category_id' => $keagamaan?->id, 'description' => 'Acara maulid nabi yang dihadiri seluruh santri.'],
            ['title' => 'Wisuda Santri Tahfidz 30 Juz', 'image' => 'img/gallery-3.svg', 'category_id' => $keagamaan?->id, 'description' => 'Prosesi wisuda santri yang telah menyelesaikan hafalan 30 juz.'],
            ['title' => 'Pelatihan Kepemimpinan Santri', 'image' => 'img/gallery-5.svg', 'category_id' => $santri?->id, 'description' => 'Kegiatan pelatihan kepemimpinan untuk pengurus asrama.'],
            ['title' => 'Galeri Kegiatan Pesantren', 'image' => 'img/gallery-1.svg', 'category_id' => $santri?->id, 'description' => 'Dokumentasi kegiatan harian santri.'],
            ['title' => 'Kegiatan Olahraga Santri', 'image' => 'img/gallery-6.svg', 'category_id' => $santri?->id, 'description' => 'Olahraga rutin santri di lapangan pesantren.'],
        ];

        foreach ($items as $item) {
            Gallery::updateOrCreate(
                ['title' => $item['title']],
                [
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'image' => $item['image'],
                    'gallery_category_id' => $item['category_id'],
                ]
            );
        }
    }
}
