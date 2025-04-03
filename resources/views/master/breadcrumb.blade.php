<div class="toolbar py-5 py-lg-5" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap justify-content-between">
        <!-- Bagian Kiri: Judul dan Breadcrumb -->
        <div class="page-title d-flex flex-column me-3">
            <h1 class="d-flex text-gray-900 fw-bold my-1 fs-3">{{ $main }}</h1>
            <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                <li class="breadcrumb-item text-gray-600">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 text-hover-primary">{{ $sub }}</a>
                </li>
                <li class="breadcrumb-item text-gray-600">{{ $sub1 }}</li>
            </ul>
        </div>

        <!-- Bagian Kanan: Tombol Login atau Logout -->
        <div class="d-flex align-items-center">
            @if(!Auth::check())
                <!-- Tombol Login -->
                <a href="{{ route('login.form') }}" class="btn btn-primary">
                    Login
                </a>
            @endif
        </div>
    </div>
</div>

<script>
    // Handle klik tombol logout
    document.getElementById('logout-button')?.addEventListener('click', function () {
        document.getElementById('logout-form').submit();
    });
</script>
