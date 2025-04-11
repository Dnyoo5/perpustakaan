@extends('master-landing.master-landing')

@section('content-landing')
    </div>
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

                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        <table class="table table-stripped" id="tabel_peminjaman">
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
@endsection
@section('script-landing')
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            let table = $('#tabel_peminjaman').DataTable({
                processing: true,
                serverSide: true,
                responsive: false, // Menambahkan opsi responsive
                ajax: {
                    url: "{{ route('peminjaman.member.datatables') }}",
                },
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_peminjam',
                        name: 'nama_peminjam'
                    },
                    {
                        data: 'kode_buku',
                        name: 'kode_buku'
                    },
                    {
                        data: 'tanggal_pinjam',
                        name: 'tanggal_pinjam'
                    },
                    {
                        data: 'tanggal_kembali',
                        name: 'tanggal_kembali'
                    },
                    {
                        data: 'status_badge',
                        name: 'status'
                    }, // Gunakan status_badge
                    {
                        data: 'aksi',
                        name: 'aksi'
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


            // Handle form submit
            $('form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message
                        }).then((result) => {
                            window.location.href = '{{ route('peminjaman.index') }}';
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseJSON.message
                        });
                    }
                });
            });

            // Handle approve button
            $(document).on('click', '.approve-button', function(e) {
                e.preventDefault();
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Peminjaman akan disetujui",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, setujui!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/peminjaman/${id}/approve`,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Berhasil!',
                                    response.message,
                                    'success'
                                );
                                table.ajax.reload();
                            }
                        });
                    }
                });
            });

            // Handle return button
            $(document).on('click', '.return-button', function(e) {
                e.preventDefault();
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Buku akan dikembalikan",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, kembalikan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/peminjaman/${id}/return`,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Berhasil!',
                                    response.message,
                                    'success'
                                );
                                table.ajax.reload();
                            }
                        });
                    }
                });
            });


            $(document).on('click', '.confirm-return-button', function(e) {
                e.preventDefault();
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Konfirmasi pengembalian buku ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, konfirmasi!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/peminjaman/${id}/confirm-return`,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Berhasil!',
                                    response.message,
                                    'success'
                                );
                                table.ajax.reload();
                            }
                        });
                    }
                });
            });





        });

        $('body').on('click', '.delete-peminjaman', function(e) {
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
    </script>
@endsection
