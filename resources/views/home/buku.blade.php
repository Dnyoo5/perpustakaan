@extends('master-landing.master-landing')

@section('content-landing')
    </div>
    <div class="mb-lg-n15 position-relative z-index-2 mt-20" id="katalog-buku">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->

            <div class="text-center mb-5 mb-lg-10 mt-10">
                <!--begin::Title-->
                <h3 class="fs-2hx text-gray-900 mb-5" id="portfolio" data-kt-scroll-offset="{default: 100, lg: 250}">
                    Katalog Buku</h3>
                <!--end::Title-->
            </div>
            <!--begin::Header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-900">Total Buku</span>

                </h3>
                <!--end::Title-->

                <!--begin::Toolbar-->

                <!--end::Toolbar-->
            </div>
            <!--end::Header-->

            <!--begin::Card body-->
            <div class="card-body pt-7">
                <!--begin::Row-->
                <div class="row align-items-end h-100 gx-5 gx-xl-10">
                    <!-- Card 1 -->
                    @foreach ($buku as $buku)
                        <div class="col-md-4 mb-11 mb-md-0">
                            <a class="d-block overlay" href="{{ route('peminjaman.create', $buku->id) }}">
                                <div class="overlay-wrapper bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded mb-3"
                                    style="height: 266px;background-image:url('{{ asset('storage/' . $buku->gambar) }}')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-duotone ki-eye fs-3x text-white"></i>
                                </div>
                            </a>
                            <div class="m-0">
                                <a href="#"
                                    class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">{{ $buku->judul }}</a>
                                <span class="fw-bold fs-6 text-gray-500 d-block lh-1">{{ $buku->penulis }}</span>
                            </div>
                        </div>
                    @endforeach


                </div>

                <!--end::Row-->
            </div>
            <!--end::Card body-->
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection
