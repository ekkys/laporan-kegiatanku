<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan package ini sudah diinstal

class ActivityController extends Controller
{
     public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('activity_photos', 'public');
        }

        Activity::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('activities.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    public function generatePdf(Request $request)
    {
        $selectedActivityIds = $request->input('selected_activities');

        if (empty($selectedActivityIds)) {
            return redirect()->back()->with('error', 'Pilih setidaknya satu kegiatan untuk membuat laporan PDF.');
        }

        $activities = Activity::whereIn('id', $selectedActivityIds)->get();

        $pdf = Pdf::loadView('pdf.report', compact('activities')); // Buat view 'pdf.report'
        return $pdf->download('laporan-kegiatan-' . now()->format('YmdHis') . '.pdf');
    }
}
