<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::with(['category', 'author'])->latest();

        if ($search = $request->get('q')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $news = $query->paginate(15)->withQueryString();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = NewsCategory::orderBy('name')->get();
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['author_id'] = Auth::id();
        $data['featured_image'] = $this->handleUpload($request, 'featured_image');
        $data['published_at'] = $data['status'] === 'published' ? now() : null;

        News::create($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(News $news)
    {
        return redirect()->route('admin.news.edit', $news);
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::orderBy('name')->get();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $data = $this->validateData($request, $news->id);

        if ($data['title'] !== $news->title) {
            $data['slug'] = $this->uniqueSlug($data['title'], $news->id);
        }

        if ($request->hasFile('featured_image')) {
            if ($news->featured_image) {
                Storage::disk('public')->delete($news->featured_image);
            }
            $data['featured_image'] = $this->handleUpload($request, 'featured_image');
        }

        if ($data['status'] === 'published' && ! $news->published_at) {
            $data['published_at'] = now();
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        if ($news->featured_image) {
            Storage::disk('public')->delete($news->featured_image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'news_category_id' => ['nullable', 'exists:news_categories,id'],
            'status' => ['required', 'in:draft,published'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ], [
            'title.required' => 'Judul wajib diisi.',
            'content.required' => 'Konten berita wajib diisi.',
            'status.required' => 'Status wajib dipilih.',
            'featured_image.image' => 'File harus berupa gambar.',
            'featured_image.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'featured_image.max' => 'Ukuran gambar maksimal 4 MB.',
        ]);
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;
        while (News::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base.'-'.(++$i);
        }
        return $slug;
    }

    private function handleUpload(Request $request, string $field): ?string
    {
        if (! $request->hasFile($field)) {
            return null;
        }
        return $request->file($field)->store('news', 'public');
    }
}
