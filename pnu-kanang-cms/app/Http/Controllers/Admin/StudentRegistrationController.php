<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StudentRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = StudentRegistration::latest();

        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }
        if ($search = $request->get('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('registration_number', 'like', "%{$search}%");
            });
        }

        $registrations = $query->paginate(20)->withQueryString();
        return view('admin.registrations.index', compact('registrations'));
    }

    public function show(StudentRegistration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }

    public function updateStatus(Request $request, StudentRegistration $registration)
    {
        $data = $request->validate([
            'status' => ['required', 'in:baru,diproses,diterima,ditolak'],
        ]);
        $registration->update($data);
        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function destroy(StudentRegistration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.registrations.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }

    /**
     * Streams a CSV file of all registrations.
     */
    public function export(): StreamedResponse
    {
        $filename = 'pendaftar-pnu-kanang-'.now()->format('Ymd-His').'.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');
            // BOM for Excel UTF-8.
            fwrite($handle, "\xEF\xBB\xBF");
            fputcsv($handle, [
                'No. Pendaftaran', 'Nama Lengkap', 'Panggilan', 'Jenis Kelamin',
                'Tempat Lahir', 'Tanggal Lahir', 'Alamat', 'No. HP',
                'Nama Orang Tua', 'No. HP Orang Tua', 'Asal Sekolah', 'Program', 'Status', 'Tanggal Daftar',
            ]);

            StudentRegistration::orderBy('created_at')->chunk(200, function ($rows) use ($handle) {
                foreach ($rows as $r) {
                    fputcsv($handle, [
                        $r->registration_number, $r->full_name, $r->nickname,
                        $r->gender === 'L' ? 'Laki-laki' : 'Perempuan',
                        $r->birth_place, optional($r->birth_date)->format('d-m-Y'),
                        $r->address, $r->phone, $r->parent_name, $r->parent_phone,
                        $r->previous_school, $r->program,
                        StudentRegistration::STATUSES[$r->status] ?? $r->status,
                        $r->created_at->format('d-m-Y H:i'),
                    ]);
                }
            });
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
