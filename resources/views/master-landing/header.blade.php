<div class="mb-0" id="home">
    <!--begin::Wrapper-->
    <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
        style="background-image: url(assets/media/svg/illustrations/landing.svg)">
        <!--begin::Header-->
        <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
            data-kt-sticky-offset="{default: '200px', lg: '300px'}">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Wrapper-->
                <div class="d-flex align-items-center justify-content-between">
                    <!--begin::Logo-->
                    <div class="d-flex align-items-center flex-equal">
                        <!--begin::Mobile menu toggle-->
                        <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                            id="kt_landing_menu_toggle">
                            <i class="ki-outline ki-abstract-14 fs-2hx"></i>
                        </button>
                        <!--end::Mobile menu toggle-->
                        <!--begin::Logo image-->
                        <a href="landing.html">

                            <h3 class="logo-default text-white fs-2">PERPUSTAKAAN</h3>
                            <h3 class="logo-sticky text-dark fs-2">PERPUSTAKAAN</h3>
                        </a>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::Menu wrapper-->
                    <div class="d-lg-block" id="kt_header_nav_wrapper">
                        <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                            data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                            data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                            data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                            <!--begin::Menu-->
                            <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                                id="kt_landing_menu">
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link active py-3 px-4 px-xxl-6"
                                        href="{{ route('home') }}">Beranda</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a href="{{ auth()->check() ? route('buku-landing') : route('login.form') }}"
                                        class="menu-link nav-link py-3 px-4 px-xxl-6" href="#katalog"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Katalog
                                        Buku</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a href="{{ auth()->check() ? route('peminjaman.index') : route('login.form') }}"
                                        class="menu-link nav-link py-3 px-4 px-xxl-6" data-kt-scroll-toggle="true"
                                        data-kt-drawer-dismiss="true">Peminjaman</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->

                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6"
                                        href="{{ route('peminjaman.riwayat.index') }}" data-kt-scroll-toggle="true"
                                        data-kt-drawer-dismiss="true">Riwayat</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->

                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Menu wrapper-->
                    <!--begin::Toolbar-->
                    <div class="flex-equal text-end ms-1">
                        @guest
                            <a href="{{ route('login.form') }}" class="btn btn-success">Login</a>
                        @endguest

                        @auth
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="userDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->nama }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Keluar</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>

                    <!--end::Toolbar-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>

        <!--end::Header-->
        <!--begin::Landing hero-->
