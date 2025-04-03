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
                                <span class="card-label fw-bold text-gray-800">Manajemen Pengguna</span>

                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                                @if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                                    <a href="{{ route('pengguna.create') }}">
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_1">
                                            <i class="ki-duotone ki-plus-square fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            Tambah Pengguna
                                        </button>
                                    </a>
                                @endif
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                        <!--end: Card Body-->
                    </div>
                    <div class="modal fade" tabindex="-1" id="detailModal" data-bs-focus="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Detail User</h3>
                                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </button>
                                </div>
                                <div class="response-detail"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
            let table = $('#tabel_kategori').DataTable({
                processing: true,
                serverSide: true,
                responsive: false, // Menambahkan opsi responsive
                ajax: {
                    url: "{{ route('pengguna.datatables') }}",
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
                        data: 'email',
                        name: 'email',
                        orderable: false
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        orderable: false
                    },
                    {
                        data: 'role',
                        name: 'role',
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

            // Tombol edit
            $(document).on('click', '.edit-button', function() {
                var btnId = $(this).data('id'); // Mengambil data-id dari tombol
                $.ajax({
                    type: "GET",
                    url: "{{ route('kategori.edit', '') }}" + '/' + btnId,
                    success: function(response) {
                        $('.response').html(response);
                        $('#editDropModal').modal('show');
                        // Inisialisasi Select2 setelah konten di-load
                        $('.form-select').select2({
                            placeholder: "Pilih role",
                            allowClear: true,
                            dropdownParent: $(
                                '#editDropModal') // Dropdown berada di dalam modal
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            // Tombol delete
            $('body').on('click', '.delete-user', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Anda yakin ingin menghapus Pengguna ini?",
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

            $(document).on('click', '.detail-user', function() {
                var btnId = $(this).data('id'); // Mengambil data-id dari tombol
                $.ajax({
                    type: "GET",
                    url: "{{ route('pengguna.detail', '') }}" + '/' + btnId,
                    success: function(response) {
                        $('.response-detail').html(response);
                        $('#detailModal').modal('show');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
