@extends('master.master')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row g-5 g-xl-12">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Table widget 13-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">DAFTAR PEMINJAMAN BUKU</span>

                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                                <a href="{{ route('peminjaman.create') }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="ki-duotone ki-plus-square fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Tambah Peminjaman
                                    </button>
                                </a>
                                <!--end::Daterangepicker-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                                <table class="table table-stripped" id="tabel_kategori">
                                    <thead class="text-gray-500 fs-6 bg-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Peminjam</th>
                                            <th>Kode Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>

                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Table widget 13-->
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            let table = $('#tabel_peminjaman').DataTable({
                processing: true,
                serverSide: true,
                responsive: false, // Menambahkan opsi responsive
                ajax: {
                    url: "{{ route('peminjaman.datatables') }}",
                },
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        orderable: false
                    },
                    {
                        data: 'kode_buku',
                        name: 'kode_buku',
                        orderable: false
                    },
                    {
                        data: 'tanggal_peminjaman',
                        name: 'tanggal_peminjaman',
                        orderable: false
                    },
                    {
                        data: 'tanggal_pengembalian',
                        name: 'tanggal_pengembalian',
                        orderable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false // Kolom aksi tidak bisa dicari
                    },
                ],
                order: [
                    [1, 'asc']
                ], // Mengurutkan berdasarkan kolom 'nama'
                dom: "<'row mb-2'" +
                    "<'col-sm-6 d-flex align-items-center justify-content-start dt-toolbar'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                    ">" +
                    "<'table-responsive'tr>" +
                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">"
            });

            // Tombol delete
            $('body').on('click', '.delete-kategori', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Anda yakin ingin menghapus kategori ini?",
                    icon: 'warning',
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, kembali!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-secondary'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });

            // Mengubah huruf input menjadi kapital
            $('#nama_kategori').on('input', function() {
                $(this).val($(this).val().toUpperCase());
            });
        });
    </script>
@endsection
