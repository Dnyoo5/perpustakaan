@extends('master.master')
@section('title')
 PERPUSTAKAAN | SHOW BUKU
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card card-flush">
                <div class="card-header">
                    <h3 class="card-title">Detail Buku</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $buku->gambar) }}" alt="Gambar Buku" class="img-fluid rounded">
                        </div>
                        <div class="col-md-8">
                            <h2>{{ $buku->judul }}</h2>
                            <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                            <p><strong>Kode Buku:</strong> {{ $buku->kode_buku }}</p>
                            <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
                            <p><strong>Stok:</strong> {{ $buku->stok }}</p>
                            <p><strong>Sinopsis:</strong> {{ $buku->sinopsis }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('buku') }}" class="btn btn-light">Kembali</a>
                    <a  href="{{ route('peminjaman.create', $buku->id) }}" class="btn btn-sm btn-success pilih-buku">
                        <i class="ki-duotone ki-arrow-right-left fs-2 text-light">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
