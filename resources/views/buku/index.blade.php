@extends('master.master')
@section('title')
 PERPUSTAKAAN | INDEX BUKU
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Player widget 1-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Katalog Buku</span>
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Jumlah Buku 120</span>
                            </h3>
                            <!--end::Title-->

                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                @if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                                <a href="{{ route('buku.create') }}" style="margin-right: 10px">
                                    <button class="btn btn-light btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_1">
                                        <i class="ki-duotone ki-plus-square fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Tambah Buku
                                    </button>
                                </a>
                                @endif

                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->



                        <!--begin::Card body-->
                        <div class="card-body pt-7">
                            <div class="row g-5 g-xl-9 mb-5 mb-xl-9">
                                @foreach ($buku as $item)
                                    <div class="col-md-6 mb-5">

                                        <div class="card-body py-9">
                                            <!--begin::Row-->
                                            <div class="row gx-9 h-100">
                                                <!--begin::Col (Image)-->
                                                <div class="col-sm-6 mb-10 mb-sm-0">
                                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px min-h-sm-150 h-150"
                                                        style="background-size: 100% 100%;background-image:url('{{ asset('storage/' . $item->gambar) }}')">
                                                    </div>
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Col (Details)-->
                                                <div class="col-sm-6">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-column h-100">
                                                        <!--begin::Header-->
                                                        <div class="mb-7">
                                                            <!--begin::Headin-->
                                                            <div class="d-flex flex-stack mb-6">
                                                                <!--begin::Title-->
                                                                <div class="flex-shrink-0 me-5">
                                                                    <span
                                                                        class="text-gray-500 fs-7 fw-bold me-2 d-block lh-1 pb-1">
                                                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                                                    </span>
                                                                    <span class="text-gray-800 fs-1 fw-bold">
                                                                        {{ $item->judul }}
                                                                    </span>
                                                                    <br>
                                                                    <span class="text-gray-900 fs-4 fw-semibold">
                                                                        {{ $item->deskripsi }}
                                                                    </span>
                                                                </div>
                                                                <!--end::Title-->


                                                            </div>
                                                            <!--end::Heading-->

                                                            <!--begin::Items-->
                                                            <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                                                <div class="d-flex align-items-center">

                                                                    <div class="m-0">
                                                                        <span
                                                                            class="fw-semibold text-gray-500 d-block fs-8">Penulis</span>
                                                                        <span
                                                                            class="fw-bold text-gray-800 fs-7">{{ $item->penulis }}</span>
                                                                    </div>
                                                                    <!--end::Info-->
                                                                </div>
                                                                <!--end::Item-->
                                                            </div>
                                                            <!--end::Items-->
                                                        </div>
                                                        <!--end::Header-->

                                                        <!--begin::Body-->
                                                        <div class="mb-6">
                                                            <!--begin::Text-->
                                                            <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                                                                {{ Str::limit($item->sinopsis, 120) }}
                                                            </span>
                                                            <!--end::Text-->

                                                            <!--begin::Stats-->
                                                            <div class="d-flex">
                                                                <!--begin::Stat-->
                                                                <div
                                                                    class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                                    <!--begin::Date-->
                                                                    <span
                                                                        class="fs-6 text-gray-700 fw-bold">{{ $item->tahun_terbit }}</span>
                                                                    <!--end::Date-->

                                                                    <!--begin::Label-->
                                                                    <div class="fw-semibold text-gray-500">Tahun Terbit
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                                    <!--begin::Number-->
                                                                    <span
                                                                        class="fs-6 text-gray-700 fw-bold">{{ $item->stok }}</span>
                                                                    <div class="fw-semibold text-gray-500">Stok Buku</div>
                                                                </div>
                                                            </div>
                                                            @if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                                                            <a href="{{ route('buku.edit', $item->id) }}"
                                                                class="btn btn-sm btn-primary"><i
                                                                    class="ki-duotone ki-pencil fs-2 text-ligt">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i></a>
                                                                @endif
                                                            <a href="{{ route('buku.show', $item->id) }}"
                                                                class="btn btn-sm btn-info"><i
                                                                    class="ki-duotone ki-eye fs-2 text-light ">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i></a>
                                                                @if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                                                            <form id="delete-form-{{ $item->id }}"
                                                                action="{{ route('buku.destroy', $item->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger delete-btn"
                                                                    data-id="{{ $item->id }}">
                                                                    <i class="ki-duotone ki-trash fs-2 text-light">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </button>
                                                            </form>
                                                            @endif
                                                            <a  href="{{ route('peminjaman.create', $item->id) }}" class="btn btn-sm btn-success pilih-buku">
                                                                <i class="ki-duotone ki-arrow-right-left fs-2 text-light">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                        </div>


                        <!--end::Card body-->
                    </div>
                    <!--end::Player widget 1-->

                </div>
                <!--end::Col-->

                <!--begin::Col-->

                <!--end::Col-->
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.delete-btn').on('click', function() {
                var bookId = $(this).data('id'); // Ambil ID buku
                var form = $('#delete-form-' + bookId); // Ambil form sesuai ID

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak dapat mengembalikan data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit form jika dikonfirmasi
                    }
                });
            });
        });
    </script>
@endsection
