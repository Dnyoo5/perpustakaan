<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index() {
        $data['main'] = 'Peminjaman';
        $data['sub']  = 'Home';
        $data['sub1']  = 'Peminjaman Home';

        return view('peminjaman-buku.index',$data);
    }


        public function datatables(Request $request)
        {
            $peminjaman = DB::table('peminjamen')
                ->join('users', 'peminjamen.user_id', '=', 'users.id')
                ->join('bukus', 'peminjamen.buku_id', '=', 'bukus.id')
                ->select(
                    'peminjamen.id as id',
                    'users.name as nama_peminjam',
                    'bukus.kode_buku as kode_buku',
                    'peminjamen.tanggal_pinjam as tanggal_pinjam',
                    'peminjamen.tanggal_kembali as tanggal_kembali',
                    'peminjamen.status as status'
                );

            return datatables()
                ->of($peminjaman)
                ->addColumn('aksi', function ($row) {
                    $id = $row->id;
                    $data = '

                    <a class="btn btn-sm btn-primary btn-icon edit-button" data-id="' . $id . '" href="#">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-sm btn-primary btn-icon edit-button" data-id="' . $id . '" href="#">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a class="btn btn-sm btn-danger btn-icon delete-kategori" data-id="' . $id . '" href="' . route('kategori.destroy', $id) . '">
                        <i class="fa fa-trash"></i>
                    </a>
                ';

                    return $data;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }



    public function create() {
        $data['main'] = 'Tambah Peminjaman';
        $data['sub'] = 'Tambah';
        $data['sub1']  = 'Tambah Peminjaman';

        return view('peminjaman-buku.tambah-peminjaman',$data);
    }
}
