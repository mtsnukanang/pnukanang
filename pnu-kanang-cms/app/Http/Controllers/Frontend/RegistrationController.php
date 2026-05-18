<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRegistrationRequest;
use App\Models\PesantrenProfile;
use App\Models\Program;
use App\Models\StudentRegistration;

class RegistrationController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)->orderBy('order')->get();
        $info = PesantrenProfile::section('pendaftaran');
        return view('frontend.pendaftaran.index', compact('programs', 'info'));
    }

    public function store(StoreStudentRegistrationRequest $request)
    {
        $data = $request->validated();
        $data['registration_number'] = $this->generateRegistrationNumber();
        $data['status'] = 'baru';

        $registration = StudentRegistration::create($data);

        return redirect()
            ->route('pendaftaran.success', $registration->registration_number)
            ->with('success', 'Pendaftaran Anda berhasil dikirim. Mohon simpan nomor pendaftaran Anda.');
    }

    public function success(string $registrationNumber)
    {
        $registration = StudentRegistration::where('registration_number', $registrationNumber)
            ->firstOrFail();
        return view('frontend.pendaftaran.success', compact('registration'));
    }

    /**
     * Generates a unique registration number in the format PNU-YYYY-XXXX.
     */
    private function generateRegistrationNumber(): string
    {
        $year = now()->format('Y');
        $count = StudentRegistration::whereYear('created_at', $year)->count() + 1;
        return sprintf('PNU-%s-%04d', $year, $count);
    }
}
