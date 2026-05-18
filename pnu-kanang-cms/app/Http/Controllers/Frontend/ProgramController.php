<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)->orderBy('order')->get();
        return view('frontend.program.index', compact('programs'));
    }

    public function show(string $slug)
    {
        $program = Program::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('frontend.program.show', compact('program'));
    }
}
