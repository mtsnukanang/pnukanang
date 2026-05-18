<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesantrenProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesantrenProfileController extends Controller
{
    private array $sections = [
        'sejarah' => 'Sejarah',
        'visi_misi' => 'Visi & Misi',
        'sambutan' => 'Sambutan Pengasuh',
        'fasilitas' => 'Fasilitas',
        'struktur_organisasi' => 'Struktur Organisasi',
        'pengasuh' => 'Pengasuh & Dewan Asatidz',
        'pendaftaran' => 'Informasi Pendaftaran',
    ];

    public function index()
    {
        $profiles = PesantrenProfile::all()->keyBy('section');
        return view('admin.profile.index', [
            'profiles' => $profiles,
            'sections' => $this->sections,
        ]);
    }

    public function edit(string $section)
    {
        abort_unless(isset($this->sections[$section]), 404);
        $profile = PesantrenProfile::firstOrCreate(
            ['section' => $section],
            ['title' => $this->sections[$section], 'content' => '']
        );

        return view('admin.profile.edit', [
            'profile' => $profile,
            'sectionLabel' => $this->sections[$section],
        ]);
    }

    public function update(Request $request, string $section)
    {
        abort_unless(isset($this->sections[$section]), 404);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ], [
            'title.required' => 'Judul wajib diisi.',
            'content.required' => 'Isi konten wajib diisi.',
        ]);

        $profile = PesantrenProfile::firstOrCreate(['section' => $section]);

        if ($request->hasFile('image')) {
            if ($profile->image) {
                Storage::disk('public')->delete($profile->image);
            }
            $data['image'] = $request->file('image')->store('profile', 'public');
        }

        $profile->update($data);

        return redirect()->route('admin.profile.index')
            ->with('success', 'Bagian profil "'.$this->sections[$section].'" berhasil diperbarui.');
    }
}
