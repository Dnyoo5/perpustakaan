@extends('master.master')
@section('title')
 PERPUSTAKAAN | HOME
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
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

                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->

                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-7">
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-9 mb-5 mb-xl-9">
                                @foreach ($bukus as $buku)
                                    <!--begin::Col-->
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <!--begin::Player card-->
                                        <div class="m-0">
                                            <!--begin::User pic-->
                                            <div class="card-rounded position-relative mb-5">
                                                <!--begin::Img-->
                                                <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded"
                                                    style="background-image:url('{{ asset('storage/' . $buku->gambar) }}')"></div>
                                                <!--end::Img-->
                                            </div>
                                            <!--end::User pic-->

                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <!--begin::Title-->
                                                <a href="{{ Auth::check() ? route('buku.show', $buku->id) : route('login.form') }}"
                                                    class="text-gray-800 text-hover-primary fs-4 fw-bold d-block mb-2">
                                                     {{ $buku->judul }}
                                                 </a>
                                                <!--end::Title-->
                                                <span class="fw-bold fs-6 text-gray-500 d-block lh-1">{{ $buku->penulis }}</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Player card-->
                                    </div>
                                    <!--end::Col-->
                                @endforeach
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Player card-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Player widget 1-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->

    <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Row-->

    <!--end::Row-->
    <!--begin::Row-->

    <!--end::Row-->
    </div>
    <!--end::Post-->
    </div>

    <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
@endsection
