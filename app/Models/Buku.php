<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['gambar','judul','penulis','tahun_terbit','kategori_id','stok'];

    public function  peminjaman() {
        return $this->HasMany(Peminjaman::class);
    } 
}
