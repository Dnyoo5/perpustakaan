@if (Auth::check())
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
                data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <!--begin::Container-->
                <div class="container-xxl d-flex flex-grow-1 flex-stack">
                    <!--begin::Header Logo-->
                    <div class="d-flex align-items-center me-5">
                        <!--begin::Heaeder menu toggle-->
                        <div class="d-lg-none btn btn-icon btn-active-color-primary w-30px h-30px ms-n2 me-3"
                            id="kt_header_menu_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <a
                            href="{{ auth()->check() && in_array(auth()->user()->role, ['admin', 'superadmin']) ? route('dashboard') : route('home') }}">
                            <<h3>PERPUSTAKAAN</h3>
                        </a>
                    </div>
                    <div class="d-flex align-items-center flex-shrink-0">
                        <div class="d-flex align-items-center ms-3 ms-lg-4" id="kt_header_user_menu_toggle">
                            @if (Auth::check())
                                <!-- Tombol Logout -->
                                <a href="javascript:void(0);" id="logout-button">
                                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline btn-active-bg-light w-30px h-30px w-lg-40px h-lg-40px"
                                        data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                        data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-entrance-right fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </a>
                                <!-- Form Logout -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <!-- Tombol Login -->
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    Login
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="header-menu-container container-xxl d-flex flex-stack h-lg-75px w-100" id="kt_header_nav">
                    <div class="header-menu flex-column flex-lg-row" data-kt-drawer="true"
                        data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                        data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                        data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_toggle"
                        data-kt-swapper="true" data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                        <!--begin::Menu-->

                        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-state-primary menu-title-gray-800 menu-arrow-gray-500 align-items-stretch flex-grow-1 my-5 my-lg-0 px-2 px-lg-0 fw-semibold fs-6"
                            id="#kt_header_menu" data-kt-menu="true">
                            <!--begin:Menu item-->
                            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                data-kt-menu-placement="bottom-start"
                                class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                <!--begin:Menu link-->
                                <a
                                    href="{{ auth()->check() && in_array(auth()->user()->role, ['admin', 'superadmin']) ? route('dashboard') : route('home') }}">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">
                                            {{ auth()->check() && in_array(auth()->user()->role, ['admin', 'superadmin']) ? 'Dashboards' : 'Home' }}
                                        </span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                </a>
                            </div>
                            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                data-kt-menu-placement="bottom-start"
                                class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                                <span class="menu-link py-3">
                                    <span class="menu-title">Manajemen Buku</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                                <div
                                    class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                                    <div class="menu-item">
                                        <a class="menu-link py-3" href="{{ route('peminjaman.riwayat.index') }}">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-rocket fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Riwayat</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link py-3" href="{{ route('peminjaman.index') }}">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-book fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Peminjaman</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link py-3" href="{{ route('buku') }}">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-book fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Katalog Buku</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link py-3" href="{{ route('kategori') }}">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-code fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Katalog Kategori</span>
                                        </a>

                                    </div>

                                </div>


                            </div>

                            @if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start"
                                    class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                    <a href="{{ route('pengguna.index') }}">
                                        <span class="menu-link py-3">
                                            <span class="menu-title">Manajemen Pengguna </span>
                                            <span class="menu-arrow d-lg-none"></span>
                                        </span>
                                    </a>

                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
@endif
