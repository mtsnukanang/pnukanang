<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PesantrenProfile;

class ProfilController extends Controller
{
    public function index()
    {
        $sections = PesantrenProfile::all()->keyBy('section');
        return view('frontend.profil.index', compact('sections'));
    }

    public function sejarah()
    {
        $section = PesantrenProfile::section('sejarah');
        return view('frontend.profil.detail', [
            'section' => $section,
            'pageTitle' => 'Sejarah',
        ]);
    }

    public function visiMisi()
    {
        $section = PesantrenProfile::section('visi_misi');
        return view('frontend.profil.detail', [
            'section' => $section,
            'pageTitle' => 'Visi & Misi',
        ]);
    }

    public function struktur()
    {
        $section = PesantrenProfile::section('struktur_organisasi');
        return view('frontend.profil.detail', [
            'section' => $section,
            'pageTitle' => 'Struktur Organisasi',
        ]);
    }

    public function pengasuh()
    {
        $section = PesantrenProfile::section('pengasuh');
        return view('frontend.profil.detail', [
            'section' => $section,
            'pageTitle' => 'Pengasuh & Dewan Asatidz',
        ]);
    }

    public function fasilitas()
    {
        $section = PesantrenProfile::section('fasilitas');
        return view('frontend.profil.detail', [
            'section' => $section,
            'pageTitle' => 'Fasilitas',
        ]);
    }
}
