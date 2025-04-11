<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuMemberController extends Controller
{
    public function index() {
        $buku = Buku::all();
        return view('home.buku',compact('buku'));
    }
}
