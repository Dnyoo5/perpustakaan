<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $data['main'] = 'Buku';
        $data['sub']  = 'Home';
        $data['sub1']  = 'Buku Home';
        $data['buku']   = $buku;

        return view('buku.index', $data);
    }

    public function create()
    {
        $kategori = Kategori::all();
        $data['main'] = 'Tambah Buku';
        $data['sub']  = 'Buku';
        $data['sub1']  = 'Tambah Buku';
        $data['kategori'] = $kategori;

        return view('buku.tambah', $data);
    }

    public function store(Request $request)
    {

        // dd($request->all());
        // Validasi data input
        $validated = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'penulis' => 'required|string|max:255',
            'kode_buku' => 'required',
            'sinopsis' => 'required',
            'tahun_terbit' => 'required',
            'id_kategori' => 'required|exists:kategoris,id',
            'stok' => 'required|integer|min:0',
        ]);

        // Upload gambar
        $imagePath = $request->file('gambar')->store('uploads/buku', 'public');

        // Simpan data buku
        Buku::create([
            'judul' => $validated['judul_buku'],
            'gambar' => $imagePath,
            'penulis' => $validated['penulis'],
            'kode_buku' => $validated['kode_buku'],
            'sinopsis' => $validated['sinopsis'],
            'tahun_terbit' => $validated['tahun_terbit'],
            'kategori_id' => $validated['id_kategori'],
            'stok' => $validated['stok'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('buku')->with('success', 'Buku berhasil ditambahkan.');
    }
}
