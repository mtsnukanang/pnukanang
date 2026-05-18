<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.kontak.index');
    }

    public function store(StoreContactMessageRequest $request)
    {
        ContactMessage::create($request->validated());

        return back()->with('success', 'Pesan Anda telah terkirim. Kami akan segera membalas pesan Anda. Jazakumullah khairan katsiran.');
    }
}
