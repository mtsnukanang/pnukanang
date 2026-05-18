<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            PesantrenProfileSeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            AnnouncementSeeder::class,
            GalleryCategorySeeder::class,
            GallerySeeder::class,
            ProgramSeeder::class,
        ]);
    }
}
