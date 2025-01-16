@extends('master.master')
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
                                <a href="{{ route('buku.create') }}">
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
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-7">
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-9 mb-5 mb-xl-9">
                                <!--begin::Col-->
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <!--begin::Player card-->
                                    <div class="m-0">
                                        <!--begin::User pic-->
                                        <div class="card-rounded position-relative mb-5">
                                            <!--begin::Img-->
                                            <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded"
                                                style="background-image:url('assets/media/stock/600x600/img-61.jpg')">
                                            </div>
                                            <!--end::Img-->

                                            <!--begin::Play-->
                                            <button
                                                class="btn btn-icon h-auto w-auto p-0 ms-4 mb-4 position-absolute bottom-0 right-0"
                                                data-kt-element="list-play-button">
                                                <i class="bi bi-play-fill text-white fs-2x"
                                                    data-kt-element="list-play-icon"></i>
                                                <i class="bi bi-pause-fill text-white fs-2x d-none"
                                                    data-kt-element="list-pause-icon"></i>
                                            </button>
                                            <!--end::Play-->
                                        </div>
                                        <!--end::User pic-->

                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">Daily
                                                Podcast</a>
                                            <!--end::Title-->

                                            <span class="fw-bold fs-6 text-gray-500 d-block lh-1">Darlene Robertson</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Player card-->
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <!--begin::Player card-->
                                    <div class="m-0">
                                        <!--begin::User pic-->
                                        <div class="card-rounded position-relative mb-5">
                                            <!--begin::Img-->
                                            <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded"
                                                style="background-image:url('assets/media/stock/600x600/img-60.jpg')">
                                            </div>
                                            <!--end::Img-->

                                            <!--begin::Play-->
                                            <button
                                                class="btn btn-icon h-auto w-auto p-0 ms-4 mb-4 position-absolute bottom-0 right-0"
                                                data-kt-element="list-play-button">
                                                <i class="bi bi-play-fill text-white fs-2x"
                                                    data-kt-element="list-play-icon"></i>
                                                <i class="bi bi-pause-fill text-white fs-2x d-none"
                                                    data-kt-element="list-pause-icon"></i>
                                            </button>
                                            <!--end::Play-->
                                        </div>
                                        <!--end::User pic-->

                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">Neon
                                                Lights</a>
                                            <!--end::Title-->

                                            <span class="fw-bold fs-6 text-gray-500 d-block lh-1">Wade Warren</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Player card-->
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <!--begin::Player card-->
                                    <div class="m-0">
                                        <!--begin::User pic-->
                                        <div class="card-rounded position-relative mb-5">
                                            <!--begin::Img-->
                                            <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded"
                                                style="background-image:url('assets/media/stock/600x600/img-63.jpg')">
                                            </div>
                                            <!--end::Img-->

                                            <!--begin::Play-->
                                            <button
                                                class="btn btn-icon h-auto w-auto p-0 ms-4 mb-4 position-absolute bottom-0 right-0"
                                                data-kt-element="list-play-button">
                                                <i class="bi bi-play-fill text-white fs-2x"
                                                    data-kt-element="list-play-icon"></i>
                                                <i class="bi bi-pause-fill text-white fs-2x d-none"
                                                    data-kt-element="list-pause-icon"></i>
                                            </button>
                                            <!--end::Play-->
                                        </div>
                                        <!--end::User pic-->

                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">Single
                                                Eye</a>
                                            <!--end::Title-->

                                            <span class="fw-bold fs-6 text-gray-500 d-block lh-1">Robert Fox</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Player card-->
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <!--begin::Player card-->
                                    <div class="m-0">
                                        <!--begin::User pic-->
                                        <div class="card-rounded position-relative mb-5">
                                            <!--begin::Img-->
                                            <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded"
                                                style="background-image:url('assets/media/stock/600x600/img-56.jpg')">
                                            </div>
                                            <!--end::Img-->

                                            <!--begin::Play-->
                                            <button
                                                class="btn btn-icon h-auto w-auto p-0 ms-4 mb-4 position-absolute bottom-0 right-0"
                                                data-kt-element="list-play-button">
                                                <i class="bi bi-play-fill text-white fs-2x"
                                                    data-kt-element="list-play-icon"></i>
                                                <i class="bi bi-pause-fill text-white fs-2x d-none"
                                                    data-kt-element="list-pause-icon"></i>
                                            </button>
                                            <!--end::Play-->
                                        </div>
                                        <!--end::User pic-->

                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">Radiohead</a>
                                            <!--end::Title-->

                                            <span class="fw-bold fs-6 text-gray-500 d-block lh-1">Jacob Jones</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Player card-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->


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
        </div>
    </div>
    </div>
    </div>
@endsection
