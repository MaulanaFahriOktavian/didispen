<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Dispensation;
use App\Models\DispensationCategory;
use App\Models\DispensationDestination;
use App\Models\AcademicYear;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DispensationController extends Controller
{
    /**
     * Tampilkan form pengajuan dispensasi
     */
    public function create()
    {
        $categories = DispensationCategory::where('is_active', true)
            ->orderBy('name')
            ->get();
        
        $destinations = DispensationDestination::where('is_active', true)
            ->orderBy('name')
            ->get();

        $activeYear = AcademicYear::where('is_active', true)->first();
        $activeSemester = Semester::where('is_active', true)
            ->where('academic_year_id', $activeYear?->id)
            ->first();

        return view('student.dispensation-create', compact(
            'categories',
            'destinations',
            'activeYear',
            'activeSemester'
        ));
    }

    /**
     * Simpan pengajuan dispensasi
     */
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'category_id' => 'required|exists:dispensation_categories,id',
            'destination_id' => 'nullable|exists:dispensation_destinations,id',
            'dispensation_date' => 'required|date|after_or_equal:today',
            'leave_time' => 'required|date_format:H:i',
            'return_time' => 'nullable|date_format:H:i|after:leave_time',
            'reason' => 'required|string|min:20|max:1000',
            'destination_address' => 'nullable|string|max:500',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'category_id.required' => 'Kategori dispensasi wajib dipilih.',
            'dispensation_date.required' => 'Tanggal dispensasi wajib diisi.',
            'dispensation_date.after_or_equal' => 'Tanggal tidak boleh di masa lalu.',
            'leave_time.required' => 'Waktu keberangkatan wajib diisi.',
            'return_time.after' => 'Waktu kembali harus setelah waktu berangkat.',
            'reason.required' => 'Alasan dispensasi wajib diisi.',
            'reason.min' => 'Alasan minimal 20 karakter.',
            'attachment.max' => 'Ukuran file maksimal 2MB.',
        ]);

        $student = Auth::guard('student')->user();

        // Handle file upload
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store(
                'dispensations/attachments',
                'public'
            );
        }

        // Generate nomor dispensasi
        $dispensationNumber = Dispensation::generateNumber();

        // Simpan dispensasi
        $dispensation = Dispensation::create([
            'dispensation_number' => $dispensationNumber,
            'request_type' => 'student',
            'student_id' => $student->id,
            'academic_year_id' => $request->activeYear?->id,
            'semester_id' => $request->activeSemester?->id,
            'category_id' => $validated['category_id'],
            'destination_id' => $validated['destination_id'] ?? null,
            'dispensation_date' => $validated['dispensation_date'],
            'leave_time' => $validated['leave_time'],
            'return_time' => $validated['return_time'] ?? null,
            'reason' => $validated['reason'],
            'destination_address' => $validated['destination_address'] ?? null,
            'attachment' => $attachmentPath,
            'status' => 'pending',
        ]);

        // Redirect dengan pesan sukses
        return redirect()
            ->route('student.dispensation.show', $dispensation)
            ->with('success', 'Dispensasi berhasil diajukan! Menunggu persetujuan guru piket.');
    }
}