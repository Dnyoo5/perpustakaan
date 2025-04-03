<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        // Data untuk toolbar (judul halaman dan breadcrumb)
        $data['main'] = 'Pengguna';
        $data['sub']  = 'Home';
        $data['sub1'] = 'Pengguna Home';

        // Ambil semua data buku dari tabel `bukus`
        $data['bukus'] = Buku::all();

        // Kirim data ke view
        return view('home.index', $data);
    }
}
