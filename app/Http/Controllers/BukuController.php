<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index() {
        $data['main'] = 'Buku';
        $data['sub']  = 'Home';
        $data['sub1']  = 'Buku Home';

        return view('buku.index',$data);
    }

    public function create() {
        $data['main'] = 'Tambah Buku';
        $data['sub']  = 'Buku';
        $data['sub1']  = 'Tambah Buku';

        return view('buku.tambah',$data);
    }


}
