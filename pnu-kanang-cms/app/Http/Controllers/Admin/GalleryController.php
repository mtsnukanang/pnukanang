<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('category')->latest()->paginate(20);
        $categories = GalleryCategory::orderBy('name')->get();
        return view('admin.galleries.index', compact('galleries', 'categories'));
    }

    public function create()
    {
        $categories = GalleryCategory::orderBy('name')->get();
        return view('admin.galleries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:500'],
            'gallery_category_id' => ['nullable', 'exists:gallery_categories,id'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ], [
            'title.required' => 'Judul foto wajib diisi.',
            'image.required' => 'Foto wajib diunggah.',
            'image.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image.max' => 'Ukuran maksimal 4 MB.',
        ]);

        $data['image'] = $request->file('image')->store('galleries', 'public');
        Gallery::create($data);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        $categories = GalleryCategory::orderBy('name')->get();
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:500'],
            'gallery_category_id' => ['nullable', 'exists:gallery_categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto berhasil dihapus.');
    }

    /* ---------------- Gallery categories ---------------- */

    public function categories()
    {
        $categories = GalleryCategory::withCount('galleries')->orderBy('name')->paginate(20);
        return view('admin.galleries.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:gallery_categories,name'],
        ]);
        $data['slug'] = Str::slug($data['name']);
        GalleryCategory::create($data);
        return back()->with('success', 'Kategori galeri berhasil ditambahkan.');
    }

    public function destroyCategory(GalleryCategory $galleryCategory)
    {
        $galleryCategory->delete();
        return back()->with('success', 'Kategori galeri berhasil dihapus.');
    }
}
