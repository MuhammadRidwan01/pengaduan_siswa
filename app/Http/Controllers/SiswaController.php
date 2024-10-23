<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporans = Siswa::latest()->paginate(5);
        // Return the view with the retrieved data
        return view('siswa.index' , compact('laporans'));
    }


    public function welcome()
{
    // Set the cache duration (e.g., 60 minutes)
    $cacheDuration = 60; // in minutes

    // Instantiate Guzzle HTTP client
    $client = new Client();

    // Set up the API URL and parameters
    $url = 'https://newsapi.org/v2/everything';
    $params = [
        'q' => 'apple',
        'from' => '2024-10-15',
        'to' => '2024-10-15',
        'sortBy' => 'popularity',
        'apiKey' => '6627cf34bfa94a74b5dcbfc9e45ac65b'
    ];

    try {
        // Cache the API response
        $news = Cache::remember('news', $cacheDuration, function () use ($client, $url, $params) {
            // Make GET request
            $response = $client->get($url, ['query' => $params]);

            // Decode the JSON response
            $data = json_decode($response->getBody()->getContents(), true);
            return $data['articles'];
        });

        // Cache database queries
        $totalLaporan = Cache::remember('totalLaporan', $cacheDuration, function () {
            return Siswa::count();
        });

        $pendingLaporan = Cache::remember('pendingLaporan', $cacheDuration, function () {
            return Siswa::where('status', 'PENDING')->count();
        });

        $completedLaporan = Cache::remember('completedLaporan', $cacheDuration, function () {
            return Siswa::where('status', 'DONE')->count();
        });

        $kelaslist = Cache::remember('kelaslist', $cacheDuration, function () {
            return Siswa::select('kelas')->distinct()->get();
        });

        $siswas = Siswa::latest()->paginate(10); // Pagination should not be cached

        // Pass the data to the view
        return view('welcome', [
            'news' => $news,
            'totalLaporan' => $totalLaporan,
            'pendingLaporan' => $pendingLaporan,
            'completedLaporan' => $completedLaporan,
            'kelaslist' => $kelaslist,
            'siswas' => $siswas
        ]);

    } catch (\Exception $e) {
        // Handle error (optional)
        return view('welcome', ['news' => []]);
    }
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'pelapor' =>'required|string|max:255',
            'kelas' =>'required|string|max:255',
            'terlapor' =>'required|string|max:255',
            'laporan' =>'required|string|max:255',
            'bukti' =>'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

// Hash nama file gambar
$hashedName = $request->file('bukti')->hashName();

// Simpan file ke direktori 'bukti' di public disk
$path = $request->file('bukti')->storeAs('bukti', $hashedName, 'public');

        // Buat laporan baru di model Siswa
        $user = Siswa::create([
            'pelapor' => $request->pelapor,
            'kelas' => $request->kelas,
            'terlapor' => $request->terlapor,
            'laporan' => $request->laporan,
            'bukti' => $path,
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
