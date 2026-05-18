<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $query = News::published()->with(['category', 'author'])->latest('published_at');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $news = $query->paginate(9)->withQueryString();
        $categories = NewsCategory::orderBy('name')->get();

        return view('frontend.berita.index', compact('news', 'categories', 'search'));
    }

    public function category(string $slug)
    {
        $category = NewsCategory::where('slug', $slug)->firstOrFail();
        $news = News::published()
            ->where('news_category_id', $category->id)
            ->with(['category', 'author'])
            ->latest('published_at')
            ->paginate(9);
        $categories = NewsCategory::orderBy('name')->get();

        return view('frontend.berita.index', [
            'news' => $news,
            'categories' => $categories,
            'activeCategory' => $category,
            'search' => null,
        ]);
    }

    public function show(string $slug)
    {
        $news = News::published()->with(['category', 'author'])->where('slug', $slug)->firstOrFail();
        $news->increment('views');

        $related = News::published()
            ->where('id', '!=', $news->id)
            ->where('news_category_id', $news->news_category_id)
            ->latest('published_at')
            ->take(3)->get();

        return view('frontend.berita.show', compact('news', 'related'));
    }
}
