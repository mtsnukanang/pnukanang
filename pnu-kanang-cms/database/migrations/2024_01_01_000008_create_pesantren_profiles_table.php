<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesantren_profiles', function (Blueprint $table) {
            $table->id();
            // section: sejarah, visi_misi, sambutan, fasilitas, struktur_organisasi, pengasuh
            $table->string('section')->unique();
            $table->string('title');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesantren_profiles');
    }
};
