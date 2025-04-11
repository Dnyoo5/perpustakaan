<!--end::Theme mode setup on page load-->
<!--begin::Main-->
<!--begin::Root-->
@extends('master-landing.master-landing')
@section('content-landing')
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
        <!--begin::Heading-->
        <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
            <!--begin::Title-->
            <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Selamat datang di Perpustakaan
                <br />
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    <span id="kt_landing_hero_text">Akses buku kapan saja.</span>
                </span>
            </h1>
            <!--end::Title-->
            <!--begin::Action-->
            <a href="{{ auth()->check() ? route('buku-landing') : route('login.form') }}" class="btn btn-primary">
                Jelajahi Perpustakaan
            </a>

            <!--end::Action-->
        </div>

    </div>
    </div>
    <!--end::Landing hero-->

    <!--end::Wrapper-->
    <!--begin::Curve bottom-->
    <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
        <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                fill="currentColor"></path>
        </svg>
    </div>
    <!--end::Curve bottom-->
    </div>
    <div class="mb-n10 mb-lg-n20 z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                    How it Works</h3>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
                    <br />for different amazing and great useful admin
                </div>
                <!--end::Text-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-20">
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="assets/media/illustrations/unitedpalms-1/2.png" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Jane Miller</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
                            <br />by using single tool for different
                            <br />amazing and great
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="assets/media/illustrations/unitedpalms-1/8.png" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Setup Your App</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
                            <br />by using single tool for different
                            <br />amazing and great
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="assets/media/illustrations/unitedpalms-1/12.png" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Enjoy Nautica App</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
                            <br />by using single tool for different
                            <br />amazing and great
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Product slider-->
            <div class="tns tns-default">
                <!--begin::Slider-->
                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                    data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false"
                    data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                    data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="assets/media/preview/demos/demo1/light-ltr.png"
                            class="card-rounded shadow mh-lg-650px mw-100" alt="" />
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="assets/media/preview/demos/demo2/light-ltr.png"
                            class="card-rounded shadow mh-lg-650px mw-100" alt="" />
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="assets/media/preview/demos/demo4/light-ltr.png"
                            class="card-rounded shadow mh-lg-650px mw-100" alt="" />
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="assets/media/preview/demos/demo5/light-ltr.png"
                            class="card-rounded shadow mh-lg-650px mw-100" alt="" />
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Slider-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                    <i class="ki-outline ki-left fs-2x"></i>
                </button>
                <!--end::Slider button-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                    <i class="ki-outline ki-right fs-2x"></i>
                </button>
                <!--end::Slider button-->
            </div>
            <!--end::Product slider-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
    <!--begin::Statistics Section-->
    <div class="mt-sm-n10">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="pb-15 pt-18 landing-dark-bg">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-white fw-bold mb-5">We Make Things Better</h3>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="fs-5 text-gray-700 fw-bold">Save thousands to millions of bucks by using single
                        tool
                        <br />for different amazing and great useful admin
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                <!--begin::Statistics-->
                <div class="d-flex flex-center">
                    <!--begin::Items-->
                    <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('assets/media/svg/misc/octagon.svg')">
                            <!--begin::Symbol-->
                            <i class="ki-outline ki-element-11 fs-2tx text-white mb-3"></i>
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="700"
                                        data-kt-countup-suffix="+">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-semibold fs-5 lh-0">Known Companies</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('assets/media/svg/misc/octagon.svg')">
                            <!--begin::Symbol-->
                            <i class="ki-outline ki-chart-pie-4 fs-2tx text-white mb-3"></i>
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="80"
                                        data-kt-countup-suffix="K+">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-semibold fs-5 lh-0">Statistic Reports</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('assets/media/svg/misc/octagon.svg')">
                            <!--begin::Symbol-->
                            <i class="ki-outline ki-basket fs-2tx text-white mb-3"></i>
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="35"
                                        data-kt-countup-suffix="M+">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-semibold fs-5 lh-0">Secure Payments</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Statistics-->
                <!--begin::Testimonial-->
                <div class="fs-2 fw-semibold text-muted text-center mb-3">
                    <span class="fs-1 lh-1 text-gray-700">“</span>When you care about your topic, you’ll write
                    about it in a
                    <br />
                    <span class="text-gray-700 me-1">more powerful</span>, emotionally expressive way
                    <span class="fs-1 lh-1 text-gray-700">“</span>
                </div>
                <!--end::Testimonial-->
                <!--begin::Author-->
                <div class="fs-2 fw-semibold text-muted text-center">
                    <a href="account/security.html" class="link-primary fs-4 fw-bold">Marcus Levy,</a>
                    <span class="fs-4 fw-bold text-gray-600">KeenThemes CEO</span>
                </div>
                <!--end::Author-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Statistics Section-->

    <!--end::Team Section-->
    <!--begin::Projects Section-->
    <div class="mb-lg-n15 position-relative z-index-2 mt-20" id="katalog-buku">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-flush h-xl-100">
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
                        <span class="card-label fw-bold text-gray-900">Recent Followers</span>
                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Total 424,567 deliveries</span>
                    </h3>
                    <!--end::Title-->

                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <a href="/account/statements.html" class="btn btn-sm btn-light">History</a>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body pt-7">
                    <!--begin::Row-->
                    <div class="row align-items-end h-100 gx-5 gx-xl-10">
                        <!-- Card 1 -->
                        <div class="col-md-4 mb-11 mb-md-0">
                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                href="/assets/media/stock/900x600/42.jpg">
                                <div class="overlay-wrapper bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded mb-3"
                                    style="height: 266px;background-image:url('/assets/media/stock/900x600/42.jpg')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-duotone ki-eye fs-3x text-white"></i>
                                </div>
                            </a>
                            <div class="m-0">
                                <a href="#"
                                    class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">Feeling
                                    Good</a>
                                <span class="fw-bold fs-6 text-gray-500 d-block lh-1">2 hours</span>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4 mb-11 mb-md-0">
                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                href="/assets/media/stock/900x600/40.jpg">
                                <div class="overlay-wrapper bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded mb-3"
                                    style="height: 266px;background-image:url('/assets/media/stock/900x600/40.jpg')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-duotone ki-eye fs-3x text-white"></i>
                                </div>
                            </a>
                            <div class="m-0">
                                <a href="#" class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">Both
                                    Sides</a>
                                <span class="fw-bold fs-6 text-gray-500 d-block lh-1">52 mins</span>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4 mb-11 mb-md-0">
                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                href="/assets/media/stock/900x600/41.jpg">
                                <div class="overlay-wrapper bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded mb-3"
                                    style="height: 266px;background-image:url('/assets/media/stock/900x600/41.jpg')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-duotone ki-eye fs-3x text-white"></i>
                                </div>
                            </a>
                            <div class="m-0">
                                <a href="#" class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">Birds
                                    in the
                                    Sky</a>
                                <span class="fw-bold fs-6 text-gray-500 d-block lh-1">5 hours</span>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="col-md-4 mb-11 mb-md-0">
                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                href="/assets/media/stock/900x600/43.jpg">
                                <div class="overlay-wrapper bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded mb-3"
                                    style="height: 266px;background-image:url('/assets/media/stock/900x600/43.jpg')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-duotone ki-eye fs-3x text-white"></i>
                                </div>
                            </a>
                            <div class="m-0">
                                <a href="#"
                                    class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">Whispers of
                                    Time</a>
                                <span class="fw-bold fs-6 text-gray-500 d-block lh-1">3 hours</span>
                            </div>
                        </div>

                        <!-- Card 5 -->
                        <div class="col-md-4 mb-11 mt-11 mb-md-0">
                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                href="/assets/media/stock/900x600/44.jpg">
                                <div class="overlay-wrapper bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded mb-3"
                                    style="height: 266px;background-image:url('/assets/media/stock/900x600/44.jpg')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-duotone ki-eye fs-3x text-white"></i>
                                </div>
                            </a>
                            <div class="m-0">
                                <a href="#"
                                    class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">Echoes of
                                    Light</a>
                                <span class="fw-bold fs-6 text-gray-500 d-block lh-1">1 hour</span>
                            </div>
                        </div>

                        <!-- Card 6 -->
                        <div class="col-md-4">
                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                href="/assets/media/stock/900x600/45.jpg">
                                <div class="overlay-wrapper bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded mb-3"
                                    style="height: 266px;background-image:url('/assets/media/stock/900x600/45.jpg')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-duotone ki-eye fs-3x text-white"></i>
                                </div>
                            </a>
                            <div class="m-0">
                                <a href="#"
                                    class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">Silent
                                    Pages</a>
                                <span class="fw-bold fs-6 text-gray-500 d-block lh-1">30 mins</span>
                            </div>
                        </div>
                    </div>

                    <!--end::Row-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>

    <div class="mb-0">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="landing-dark-bg pt-20">
            <!--begin::Container-->

            <!--end::Container-->
            <!--begin::Separator-->
            <div class="landing-dark-separator"></div>
            <!--end::Separator-->
            <!--begin::Container-->
            <div class="container">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                    <!--begin::Copyright-->
                    <div class="d-flex align-items-center order-2 order-md-1">
                        <!--begin::Logo-->
                        <a href="landing.html">
                            <img alt="Logo" src="assets/media/logos/landing.svg" class="h-15px h-md-20px" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Logo image-->
                        <span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="https://keenthemes.com">&copy;
                            2024 Keenthemes Inc.</span>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                        <li class="menu-item">
                            <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item mx-5">
                            <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                        </li>
                        <li class="menu-item">
                            <a href="" target="_blank" class="menu-link px-2">Purchase</a>
                        </li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Footer Section-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    <!--end::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
@endsection
