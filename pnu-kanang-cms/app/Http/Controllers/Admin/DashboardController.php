<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\News;
use App\Models\StudentRegistration;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'news' => News::count(),
            'news_published' => News::where('status', 'published')->count(),
            'announcements' => Announcement::count(),
            'galleries' => Gallery::count(),
            'registrations' => StudentRegistration::count(),
            'registrations_new' => StudentRegistration::where('status', 'baru')->count(),
            'messages' => ContactMessage::count(),
            'messages_unread' => ContactMessage::where('is_read', false)->count(),
        ];

        $latestRegistrations = StudentRegistration::latest()->take(5)->get();
        $latestMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestRegistrations', 'latestMessages'));
    }
}
