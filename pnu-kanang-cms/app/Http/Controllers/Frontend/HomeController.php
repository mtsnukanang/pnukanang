<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\News;
use App\Models\PesantrenProfile;
use App\Models\Program;
use App\Models\StudentRegistration;

class HomeController extends Controller
{
    public function index()
    {
        $sambutan = PesantrenProfile::section('sambutan');
        $programs = Program::where('is_active', true)->orderBy('order')->take(6)->get();
        $latestNews = News::published()->with('category')->latest('published_at')->take(3)->get();
        $latestGallery = Gallery::with('category')->latest()->take(8)->get();
        $latestAnnouncements = Announcement::active()->latest('published_at')->take(3)->get();

        $stats = [
            'santri' => 480, // editable later via settings
            'asatidz' => 36,
            'program' => Program::count(),
            'tahun' => now()->year - 1995,
            'pendaftar' => StudentRegistration::count(),
        ];

        return view('frontend.home', compact(
            'sambutan',
            'programs',
            'latestNews',
            'latestGallery',
            'latestAnnouncements',
            'stats'
        ));
    }
}
