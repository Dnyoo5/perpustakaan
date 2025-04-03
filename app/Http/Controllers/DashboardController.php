<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Dashboard';
        $data['sub']  = 'Home';
        $data['sub1']  = 'Dashboard Home';

        return view('dashboard.index', $data);
    }


    public function getData()
    {
        // Ambil data peminjaman per bulan
        $data = Peminjaman::selectRaw('MONTH(tanggal_pinjam) as month')
            ->selectRaw('COUNT(*) as total') // Total peminjaman
            ->selectRaw('SUM(CASE WHEN status = "dipinjam" THEN 1 ELSE 0 END) as dipinjam') // Jumlah status dipinjam saat ini
            ->selectRaw('SUM(CASE WHEN status = "dikembalikan" THEN 1 ELSE 0 END) as dikembalikan') // Jumlah status dikembalikan
            ->selectRaw('SUM(CASE WHEN status = "denda" THEN 1 ELSE 0 END) as denda') // Jumlah status denda
            ->selectRaw('SUM(CASE WHEN status IN ("dipinjam", "dikembalikan", "denda") THEN 1 ELSE 0 END) as total_pernah_dipinjam') // Total pernah dipinjam
            ->whereYear('tanggal_pinjam', Carbon::now()->year) // Filter tahun saat ini
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Format data untuk chart
        $months = [];
        $totalPeminjaman = [];
        $totalDikembalikan = [];
        $totalDenda = [];

        foreach ($data as $item) {
            $months[] = Carbon::create()->month($item->month)->format('M'); // Nama bulan singkat (e.g., Feb)
            $totalPeminjaman[] = $item->total_pernah_dipinjam; // Gunakan total pernah dipinjam
            $totalDikembalikan[] = $item->dikembalikan;
            $totalDenda[] = $item->denda;
        }

        // Kirim data sebagai JSON
        return response()->json([
            'months' => $months,
            'totalPeminjaman' => $totalPeminjaman,
            'totalDikembalikan' => $totalDikembalikan,
            'totalDenda' => $totalDenda,
        ]);
    }
    public function getCategoryData()
    {
        // Ambil data jumlah buku berdasarkan kategori
        $data = DB::table('bukus')
            ->join('kategoris', 'bukus.kategori_id', '=', 'kategoris.id')
            ->select('kategoris.nama as kategori', DB::raw('COUNT(*) as total'))
            ->groupBy('kategoris.nama')
            ->orderByDesc('total') // Urutkan berdasarkan jumlah terbanyak
            ->get();

        // Format data untuk chart
        $categories = [];
        $totals = [];

        foreach ($data as $item) {
            $categories[] = $item->kategori; // Nama kategori
            $totals[] = $item->total; // Jumlah buku
        }

        // Kirim data sebagai JSON
        return response()->json([
            'categories' => $categories,
            'totals' => $totals,
        ]);
    }
     public function getMostReadBooks()
    {
        // Ambil data buku yang paling sering dipinjam
        $data = Peminjaman::select('buku_id', DB::raw('COUNT(*) as total'))
            ->join('bukus', 'peminjamen.buku_id', '=', 'bukus.id')
            ->where('status', '!=', 'pending') // Hanya hitung status selain pending
            ->groupBy('buku_id')
            ->orderByDesc('total') // Urutkan berdasarkan jumlah peminjaman terbanyak
            ->limit(5) // Ambil 5 buku teratas
            ->get();

        // Format data untuk ditampilkan
        $books = [];
        foreach ($data as $item) {
            $book = Buku::find($item->buku_id); // Ambil detail buku
            $books[] = [
                'judul' => $book->judul,
                'gambar' => asset('storage/' . $book->gambar),
                'penulis' => $book->penulis,
                'total_pinjam' => $item->total,
            ];
        }

        // Kirim data sebagai JSON
        return response()->json($books);
    }
    public function getLatestBooks()
    {
        // Ambil data buku terbaru berdasarkan created_at
        $books = Buku::orderByDesc('created_at') // Urutkan berdasarkan tanggal dibuat (terbaru)
            ->limit(5) // Ambil 5 buku teratas
            ->get();

        // Format data untuk ditampilkan
        $latestBooks = [];
        foreach ($books as $book) {
            $latestBooks[] = [
                'id' => $book->id,
                'judul' => $book->judul,
                'gambar' => asset('storage/' . $book->gambar), // Gunakan helper asset() untuk URL gambar
                'penulis' => $book->penulis,
                'tahun_terbit' => $book->tahun_terbit,
                'stok' => $book->stok,
            ];
        }

        // Kirim data sebagai JSON
        return response()->json($latestBooks);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
