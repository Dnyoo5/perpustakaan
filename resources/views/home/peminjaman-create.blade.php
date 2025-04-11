@extends('master-landing.master-landing')
@section('title')
    SAPRAS | Tambah Laporan Kerusakan
@endsection
@section('content-landing')
    </div>
    <div id="kt_content_container" class="d-flex flex-column-fluid mt-20 align-items-start container-xxl">
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
                                            <label for="nama_peminjam" class="required">Nama Peminjam</label>
                                            <input type="text" name="nama_peminjam" class="form-control"
                                                id="nama_peminjam" value="{{ auth()->user()->nama }}" readonly />
                                            @error('nama_peminjam')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email_peminjam" class="required">Email Peminjam</label>
                                            <input type="email" name="email_peminjam" class="form-control"
                                                id="email_peminjam" value="{{ auth()->user()->email }}" readonly />
                                            @error('email_peminjam')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Pilih Barang -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kode_buku" class="required">Kode Buku</label>
                                            <input type="text" name="kode_buku" class="form-control" id="kode_buku"
                                                value="{{ $buku->kode_buku ?? '' }}" readonly />
                                            @error('kode_buku')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Jumlah Rusak -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah_dipinjam" class="required">Jumlah Buku Dipinjam</label>
                                            <input type="number" id="jumlah_dipinjam" name="jumlah_dipinjam"
                                                class="form-control" value="{{ old('jumlah_dipinjam') }}"
                                                placeholder="Masukkan jumlah buku yang ingin dipinjam" required />
                                            @error('jumlah_dipinjam')
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
                                                id="tanggal_pengembalian" />
                                            @error('tanggal_pengembalian')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Gambar -->


                                    <!-- Keterangan -->


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

    @section('script-landing')
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
                    defaultDate: (() => {
                        let date = new Date();
                        date.setDate(date.getDate() + 3);
                        return date;
                    })()
                });
            });

            $(document).ready(function() {
                // Ambil parameter 'id_buku' dari URL
                const urlParams = new URLSearchParams(window.location.search);
                const idBuku = urlParams.get('id_buku');

                // Set nilai input 'kode_buku' jika parameter ada
                if (idBuku) {
                    $('#kode_buku').val(idBuku);
                }
            });

            $(document).ready(function() {
                let timer; // Variabel untuk menyimpan setInterval
                let previousValue = ''; // Untuk menyimpan nilai sebelumnya

                // Event listener untuk input jumlah_dipinjam
                $('#jumlah_dipinjam').on('input', function() {
                    const kodeBuku = $('#kode_buku').val();
                    const jumlahDipinjam = $(this).val();

                    // Hentikan timer lama jika ada
                    clearInterval(timer);

                    // Mulai pengecekan setiap 2 detik
                    timer = setInterval(() => {
                        // Jika nilai input belum berubah, hentikan eksekusi
                        if (jumlahDipinjam === previousValue || !jumlahDipinjam) return;
                        previousValue = jumlahDipinjam; // Perbarui nilai sebelumnya

                        // Kirim permintaan AJAX untuk memeriksa stok
                        $.ajax({
                            url: "{{ route('peminjaman.checkStok') }}",
                            method: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                kode_buku: kodeBuku,
                                jumlah_dipinjam: jumlahDipinjam,
                            },
                            success: function(response) {
                                if (response.status === 'error') {
                                    // Tampilkan SweetAlert jika stok tidak mencukupi
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Stok Tidak Mencukupi',
                                        text: response.message,
                                    });

                                    // Reset nilai input jumlah_dipinjam
                                    $('#jumlah_dipinjam').val('');
                                }
                            },
                            error: function(xhr) {
                                // Tampilkan SweetAlert jika terjadi kesalahan
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: 'Gagal memeriksa stok buku. Silakan coba lagi.',
                                });
                            },
                        });
                    }, 100); // Interval waktu 2 detik
                });

                // Bersihkan interval jika pengguna keluar dari input field
                $('#jumlah_dipinjam').on('blur', function() {
                    clearInterval(timer);
                });
            });
        </script>
    @endsection
