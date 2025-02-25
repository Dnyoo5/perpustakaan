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
                                <span class="card-label fw-bold text-gray-800">Katalog Kategori</span>
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Total Kategori {{ $totalKategori }}</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                                @if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                                    <a href="#">
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_1">
                                            <i class="ki-duotone ki-plus-square fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            Tambah kategori
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
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
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

            <div class="modal fade" tabindex="-1" id="kt_modal_1">
                <div class="modal-dialog modal-lg"> <!-- Menyesuaikan ukuran modal menjadi L -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Tambah Kategori</h3>
                            <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                data-bs-dismiss="modal" aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </button>
                        </div>
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <!-- Nama kategori -->
                                <label for="nama_kategori" class="required">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control"
                                    placeholder="Masukan nama Kategori/Genre" id="nama_kategori"
                                    value="{{ old('nama_kategori') }}" />

                                <!-- Pesan Error Nama kategori -->
                                @error('nama_kategori')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror

                                <!-- Nama Penanggung Jawab -->
                                <div class="form-group mt-5">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukan Deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                                </div>

                                <!-- Pesan Error Nama Penanggung Jawab -->
                                @error('deskripsi')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" id="editDropModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Edit Kategori</h3>
                            <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                data-bs-dismiss="modal" aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </button>
                        </div>
                        <div class="response"></div>
                    </div>
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
                    url: "{{ route('kategori.datatables') }}",
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
                        data: 'deskripsi',
                        name: 'deskripsi',
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
