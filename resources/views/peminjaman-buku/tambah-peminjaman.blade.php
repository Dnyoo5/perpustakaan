@extends('master.master')
@section('title')
    SAPRAS | Tambah Laporan Kerusakan
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row g-5 g-xl-12">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Table widget 13-->
                    <div class="card card-flush h-xl-100">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Peminjaman Barang</h3>
                        </div>
                        <form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row g-5">
                                    <!-- Pilih Ruangan -->
                                    <!-- Pilih Ruangan -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah_rusak" class="required">Nama Peminjam</label>
                                            <input type="text" name="jumlah_rusak" class="form-control" id="jumlah_rusak"
                                                value="{{ old('jumlah_rusak') }}" required />
                                            @error('jumlah_rusak')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah_rusak" class="required">Email Peminjam</label>
                                            <input type="text" name="jumlah_rusak" class="form-control" id="jumlah_rusak"
                                                value="{{ old('jumlah_rusak') }}" required />
                                            @error('jumlah_rusak')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Pilih Barang -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="barang" class="required">Kode Buku</label>
                                            <select name="barang_id" class="form-select" id="barang" required
                                                data-control="select2">
                                                <option value="">Pilih Barang</option>
                                            </select>
                                            @error('barang_id')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Jumlah Rusak -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_laporan" class="required">Jumlah Buku Dipinjam</label>
                                            <input type="text" name="tanggal_laporan" class="form-control"
                                                value="{{ old('tanggal_laporan') }}" required />
                                            @error('tanggal_laporan')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_peminjaman" class="required">Tanggal Peminjaman</label>
                                            <input type="text" name="tanggal_peminjaman" class="form-control"
                                                id="tanggal_peminjaman" required />
                                            @error('tanggal_peminjaman')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_pengembalian" class="required">Tanggal Pengembalian</label>
                                            <input type="text" name="tanggal_pengembalian" class="form-control"
                                                id="tanggal_pengembalian"
                                                required readonly />
                                            @error('tanggal_pengembalian')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Gambar -->


                                    <!-- Keterangan -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Masukkan keterangan jika diperlukan">{{ old('keterangan') }}</textarea>
                                            @error('keterangan')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                // Flatpickr untuk tanggal peminjaman
                flatpickr('#tanggal_peminjaman', {
                    dateFormat: 'Y-m-d', // Format sesuai database
                    altInput: true,
                    altFormat: 'd F Y',
                    defaultDate: new Date(),
                    onChange: function(selectedDates) {
                        if (selectedDates.length > 0) {
                            const peminjamanDate = selectedDates[0];
                            const pengembalianDate = new Date(peminjamanDate);
                            pengembalianDate.setDate(peminjamanDate.getDate() + 3); // Tambah 3 hari

                            // Atur nilai default untuk tanggal pengembalian
                            $('#tanggal_pengembalian').flatpickr({
                                dateFormat: 'Y-m-d',
                                altInput: true,
                                altFormat: 'd F Y',
                                defaultDate: pengembalianDate, // Set tanggal pengembalian
                            }).setDate(pengembalianDate);
                        }
                    },
                });

                // Flatpickr untuk tanggal pengembalian (readonly agar tidak bisa diubah manual)
                flatpickr('#tanggal_pengembalian', {
                    dateFormat: 'Y-m-d',
                    altInput: true,
                    altFormat: 'd F Y',
                    defaultDate: new Date(), // Default kosong
                });
            });
        </script>
    @endsection
