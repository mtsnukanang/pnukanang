<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;

class GalleryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::orderBy('name')->get();
        $galleries = Gallery::with('category')->latest()->paginate(12);
        return view('frontend.galeri.index', compact('galleries', 'categories'));
    }

    public function category(string $slug)
    {
        $category = GalleryCategory::where('slug', $slug)->firstOrFail();
        $categories = GalleryCategory::orderBy('name')->get();
        $galleries = Gallery::with('category')
            ->where('gallery_category_id', $category->id)
            ->latest()->paginate(12);

        return view('frontend.galeri.index', compact('galleries', 'categories', 'category'));
    }
}
