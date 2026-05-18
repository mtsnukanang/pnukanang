<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::active()->latest('published_at')->paginate(10);
        return view('frontend.pengumuman.index', compact('announcements'));
    }

    public function show(string $slug)
    {
        $announcement = Announcement::active()->where('slug', $slug)->firstOrFail();
        return view('frontend.pengumuman.show', compact('announcement'));
    }
}
