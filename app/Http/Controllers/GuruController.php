<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $totalLaporan = Siswa::count();
    $pendingLaporan = Siswa::where('status', 'PENDING')->count();
    $completedLaporan = Siswa::where('status', 'DONE')->count();
    $kelaslist = Siswa::select('kelas')->distinct()->get();
    $siswas = Siswa::latest()->paginate(10);
    return view('guru.index', compact('totalLaporan', 'pendingLaporan', 'completedLaporan', 'kelaslist', 'siswas'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $Siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Siswa)
    {
        $siswa = Siswa::findorfail($Siswa);
        return view('guru.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $siswa_id)
{
    $siswa = Siswa::findOrFail($siswa_id);

    $validated = $request->validate([
        'solusi' => 'required|string',
        'status' => 'required|in:PENDING,DONE',
    ]);
    // Update kasus
    $siswa->solusi = $validated['solusi'];
    $siswa->status = $validated['status'];

    // Simpan perubahan
    $siswa->save();

    return redirect()->route('guru.index')->with('success', 'Laporan berhasil diperbarui');
}



    public function updateStatus(Request $request, Siswa $siswa)
    {
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $Siswa)
    {
        //
    }
}
