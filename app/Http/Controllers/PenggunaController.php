<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    public function index()
    {
        $data['main'] = 'Penguna';
        $data['sub']  = 'Home';
        $data['sub1']  = 'Penguna Home';
        return view('auth.index', $data);
    }

    public function datatables()
    {
        // Ambil data dari tabel 'users'
        $users = DB::table('users')
            ->select('id', 'nama', 'email', 'alamat', 'role')
            ->get();

        // dd($kategoris);
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $id = $row->id;

                // Mulai dengan string kosong
                $data = '';

                // Cek apakah user adalah superadmin atau admin

                // Tombol edit dan delete hanya untuk superadmin dan admin
                $data .= '
                     <a class="btn btn-sm btn-info btn-icon detail-user" data-id="' . $id . '" href="#">
                        <i class="fa fa-eye"></i>
                    </a>
                        <a class="btn btn-sm btn-primary btn-icon" data-id="' . $id . '" href="' . route('pengguna.edit', $id) . '">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-sm btn-danger btn-icon delete-user" data-id="' . $id . '" href="' . route('pengguna.destroy', $id) . '">
                            <i class="fa fa-trash"></i>
                        </a>
                    ';


                return $data;
            })
            ->rawColumns(['aksi'])
            // Aktifkan kolom 'aksi' agar mendukung HTML
            ->toJson();
    }


    public function create()
    {
        $data['main'] = 'Penguna';
        $data['sub']  = 'Home';
        $data['sub1']  = 'Tambah Penguna Home';
        return view('auth.create', $data);
    }


    public function store(Request $request)
    {
        // Validasi input sesuai dengan form
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255', // Alamat tidak wajib diisi
            'role' => 'required|string|in:member,admin,superadmin', // Nama field di form adalah "kepemilikan"
        ]);

        // Simpan data pengguna ke database
        $user = new User();
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->nama = $validated['nama'];
        $user->alamat = $validated['alamat'] ?? null; // Jika alamat kosong, simpan sebagai null
        $user->role = $validated['role']; // Simpan role dari field "kepemilikan"
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }


    public function edit($id)
    {
        // Ambil data buku berdasarkan ID
        $user = User::findOrFail($id);
        $data['main'] = 'Edit Buku';
        $data['sub']  = 'Buku';
        $data['sub1']  = 'Edit Buku';
        $data['user'] = $user;

        // Tampilkan view edit buku
        return view('auth.edit', $data);
    }


    public function update(Request $request, $id)
    {
        // Validasi input sesuai dengan form
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6', // Password tidak wajib diisi saat edit
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255', // Alamat tidak wajib diisi
            'role' => 'required|string|in:member,admin,superadmin', // Nama field di form adalah "role"
        ]);

        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Perbarui data pengguna
        $user->email = $validated['email'];
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']); // Update password jika diisi
        }
        $user->nama = $validated['nama'];
        $user->alamat = $validated['alamat'] ?? null; // Jika alamat kosong, simpan sebagai null
        $user->role = $validated['role']; // Simpan role dari field "kepemilikan"
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('auth.detail', compact('user'));
    }



    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('pengguna.index')->with('error', 'User tidak ditemukan.');
        }
        $user->delete();
        return redirect()->route('pengguna.index')->with('success', 'Data User berhasil dihapus.');
    }
}
