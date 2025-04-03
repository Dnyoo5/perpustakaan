<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $data['main'] = 'Peminjaman';
        $data['sub']  = 'Home';
        $data['sub1']  = 'Peminjaman Home';

        return view('peminjaman-buku.index', $data);
    }


    public function datatables(Request $request)
    {
        // Mulai query peminjaman
        $peminjaman = DB::table('peminjamen')
            ->join('users', 'peminjamen.user_id', '=', 'users.id')
            ->join('bukus', 'peminjamen.buku_id', '=', 'bukus.id')
            ->select(
                'peminjamen.id as id',
                'users.nama as nama_peminjam',
                'bukus.kode_buku as kode_buku',
                'peminjamen.tanggal_pinjam as tanggal_pinjam',
                'peminjamen.tanggal_kembali as tanggal_kembali',
                'peminjamen.status as status'
            )
            ->where('peminjamen.status', '<>', 'dikembalikan'); // Hanya selain status dikembalikan

        // Cek peran pengguna dan filter data sesuai peran
        if (auth()->user()->role != 'admin' && auth()->user()->role != 'superadmin') {
            // Jika bukan admin/superadmin, tampilkan hanya data yang dimiliki oleh pengguna
            $peminjaman->where('peminjamen.user_id', auth()->user()->id);
        }

        return datatables()
            ->of($peminjaman)
            ->addIndexColumn()
            ->addColumn('status_badge', function ($row) {
                $badges = [
                    'pending' => '<span class="badge badge-light-warning">Pending</span>',
                    'dipinjam' => '<span class="badge badge-light-primary">Dipinjam</span>',
                    'menunggu_konfirmasi' => '<span class="badge badge-light-info">Menunggu Konfirmasi</span>',
                    'dikembalikan' => '<span class="badge badge-light-success">Dikembalikan</span>',
                    'denda' => '<span class="badge badge-light-danger">Denda</span>'
                ];

                return $badges[$row->status] ?? '<span class="badge badge-light-secondary">Unknown</span>';
            })
            ->addColumn('aksi', function ($row) {
                $id = $row->id;
                $data = '';
            
                // Tombol approve hanya muncul jika status pending dan user adalah admin/superadmin
                if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
                    if ($row->status == 'pending') {
                        $data .= '<a class="btn btn-sm btn-success btn-icon approve-button" data-id="' . $id . '" href="#">
                            <i class="fa fa-check"></i>
                        </a>';
                    }
                }
            
                // Tombol kembalikan muncul jika status dipinjam dan user adalah member
                if ($row->status == 'dipinjam' && auth()->user()->role == 'member') {
                    $data .= '<a class="btn btn-sm btn-info btn-icon return-button" data-id="' . $id . '" href="#">
                                  <i class="fa fa-undo"></i>
                              </a>';
                }
            
                // Tombol konfirmasi pengembalian muncul jika status menunggu_konfirmasi dan user adalah admin/superadmin
                if ($row->status == 'menunggu_konfirmasi' && (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')) {
                    $data .= '<a class="btn btn-sm btn-success btn-icon confirm-return-button" data-id="' . $id . '" href="#">
                                  <i class="fa fa-check"></i>
                              </a>';
                }
            
                // Pastikan tombol "Menunggu Konfirmasi" tidak muncul jika statusnya pending
                if ($row->status != 'pending' && $row->status != 'menunggu_konfirmasi') {
                    if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
                        $data .= '<a class="btn btn-sm btn-warning btn-icon waiting-confirmation-button" data-id="' . $id . '" href="#">
                                      <i class="fa fa-clock"></i>
                                  </a>';
                    }
                }
            
                // Tombol edit dan delete hanya muncul jika status pending
                if ($row->status == 'pending') {
                    $data .= '
                    <a class="btn btn-sm btn-primary btn-icon edit-button" data-id="' . $id . '" href="' . route('peminjaman.edit', $id) . '">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a class="btn btn-sm btn-danger btn-icon delete-peminjaman" data-id="' . $id . '" href="' . route('peminjaman.destroy', $id) . '">
                        <i class="fa fa-trash"></i>
                    </a>';
                }
            
                return $data;
        })
            ->rawColumns(['aksi', 'status_badge'])
            ->make(true);
    }



    public function melihat()
    {
        $data['main'] = 'Peminjaman';
        $data['sub']  = 'Riwayat';
        $data['sub1']  = 'Peminjaman Riwayat';

        return view('peminjaman-buku.riwayat', $data);
    }

    public function riwayat(Request $request)
    {
        $peminjaman = DB::table('peminjamen')
            ->join('users', 'peminjamen.user_id', '=', 'users.id')
            ->join('bukus', 'peminjamen.buku_id', '=', 'bukus.id')
            ->select(
                'peminjamen.id as id',
                'users.nama as nama_peminjam',
                'bukus.kode_buku as kode_buku',
                'peminjamen.tanggal_pinjam as tanggal_pinjam',
                'peminjamen.tanggal_kembali as tanggal_kembali',
                'peminjamen.status as status'
            )
            ->where('peminjamen.status', 'dikembalikan');

        return datatables()
            ->of($peminjaman)
            ->addIndexColumn()
            ->addColumn('status_badge', function ($row) {
                return '<span class="badge badge-light-success">Dikembalikan</span>';
            })
            ->rawColumns(['status_badge'])
            ->make(true);
    }





    public function create($id = null)
    {
        $data['main'] = 'Tambah Peminjaman';
        $data['sub'] = 'Tambah';
        $data['sub1'] = 'Tambah Peminjaman';

        // Ambil data user yang sedang login
        $data['user'] = auth()->user();

        // Jika id_buku ada, cari data buku
        if ($id) {
            $buku = Buku::find($id);

            // Jika buku ditemukan, tambahkan ke data yang dikirim ke view
            if ($buku) {
                $data['buku'] = $buku;
            } else {
                // Jika buku tidak ditemukan, redirect dengan pesan error
                return redirect()->route('peminjaman.index')->with('error', 'Buku tidak ditemukan.');
            }
        }

        return view('peminjaman-buku.tambah-peminjaman', $data);
    }

    public function checkStok(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_buku' => 'required|string',
            'jumlah_dipinjam' => 'required|integer|min:1',
        ]);

        // Cari buku berdasarkan kode buku
        $buku = Buku::where('kode_buku', $request->kode_buku)->first();

        // Jika buku tidak ditemukan
        if (!$buku) {
            return response()->json([
                'status' => 'error',
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        // Jika jumlah dipinjam melebihi stok
        if ($request->jumlah_dipinjam > $buku->stok) {
            return response()->json([
                'status' => 'error',
                'message' => 'Stok buku tidak mencukupi. Stok tersedia: ' . $buku->stok
            ]);
        }

        // Jika stok mencukupi
        return response()->json([
            'status' => 'success',
            'message' => 'Stok mencukupi'
        ]);
    }




    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'kode_buku' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
            'jumlah_dipinjam' => 'required'
        ]);

        // Cek stok buku
        $buku = Buku::where('kode_buku', $request->kode_buku)->first();

        if (!$buku) {
            return redirect()->route('peminjaman.index')
                ->with('error', 'Buku tidak ditemukan');
        }



        // Buat peminjaman
        $peminjaman = Peminjaman::create([
            'user_id' => auth()->id(),
            'buku_id' => $buku->id,
            'dipinjam' => $request->jumlah_dipinjam,
            'tanggal_pinjam' => $request->tanggal_peminjaman,
            'tanggal_kembali' => $request->tanggal_pengembalian,
            'status' => 'pending'
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil diajukan');
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = $peminjaman->buku;

        // Update stok buku
        $buku->stok -= $peminjaman->dipinjam;
        $buku->save();

        // Update status peminjaman
        $peminjaman->status = 'dipinjam';
        $peminjaman->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Peminjaman berhasil dipinjam'
        ]);
    }

    public function return($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Pastikan hanya pengguna yang meminjam buku yang dapat mengembalikan
        if ($peminjaman->user_id !== auth()->id()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak memiliki izin untuk mengembalikan buku ini.'
            ], 403);
        }

        // Ubah status menjadi "menunggu_konfirmasi"
        $peminjaman->status = 'menunggu_konfirmasi';
        $peminjaman->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Pengembalian buku sedang menunggu konfirmasi admin.'
        ]);
    }


    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);
        if (!$peminjaman) {
            return redirect()->route('peminjaman.index')->with('error', 'peminjaman tidak ditemukan.');
        }
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil dihapus.');
    }


    public function confirmReturn($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Pastikan hanya admin atau superadmin yang dapat mengonfirmasi pengembalian
        if (!in_array(auth()->user()->role, ['admin', 'superadmin'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak memiliki izin untuk melakukan tindakan ini.'
            ], 403);
        }

        // Kembalikan stok buku
        $buku = $peminjaman->buku;
        $buku->stok += $peminjaman->dipinjam;
        $buku->save();

        // Update status dan tanggal pengembalian
        $peminjaman->status = 'dikembalikan';
        $peminjaman->tanggal_kembali = now(); // Mengatur tanggal kembali ke hari ini
        $peminjaman->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Pengembalian buku berhasil dikonfirmasi.'
        ]);
    }
}
