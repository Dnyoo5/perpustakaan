@extends('master.master')

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row g-5 g-xl-12">
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start  container-xxl ">

                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">
                        <!--begin::Row-->
                        <div class="row gy-5 gx-xl-10">

                            <div class="col-xl-12 mb-5 mb-xl-10">
                                <!--begin::Chart widget 11-->
                                <div class="card card-flush h-xl-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-900">Delivery Stats</span>
                                            <span class="text-gray-500 mt-1 fw-semibold fs-6">Users from all channels</span>
                                        </h3>
                                    </div>

                                    <div class="card-body pb-0 pt-4">
                                        <div id="chart"></div>
                                    </div>
                                    <!--end::Header-->

                                    <!--end::Body-->
                                </div>


                                <!--end::Chart widget 11-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->

                        <!--begin::Row-->
                        <div class="row gy-5 g-xl-10">
                            <!--begin::Col-->
                            <div class="col-xl-6 mb-xl-10">

                                <!--begin::List widget 16-->
                                <div class="card card-flush h-xl-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-7">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Buku dengan Kategori Terbanyak</span>
                                           
                                        </h3>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->
                                       
                                        <!--end::Toolbar-->
                                    </div>
                                    <div class="card-body pb-0 pt-4">
                                        <div id="chart2"></div>
                                    </div>
                                </div>


                                <!--end::List widget 16-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->

                                <!--begin::Chart widget 32-->
                                <div class="card card-flush h-lg-50 col-xl-6 mb-10">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title text-gray-800">Buku Paling Banyak Dibaca</h3>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                
                                    <!--begin::Body-->
                                    <div class="card-body pt-5">
                                        <!-- Placeholder untuk daftar buku -->
                                        <div id="most-read-books"></div>
                                    </div>
                                    <!--end::Body-->
                                </div>


                                <div class="card">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold fs-3 mb-1">Latest Books</span>
                                            <span class="text-muted mt-1 fw-semibold fs-7">More than 400 new books</span>
                                        </h3>
                                    </div>
                                    <!--end::Header-->
                                
                                    <!--begin::Body-->
                                    <div class="card-body py-3">
                                        <div class="tab-content">
                                            <!--begin::Tap pane-->
                                            <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1" role="tabpanel">
                                                <!--begin::Table container-->
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                        <!--begin::Table head-->
                                                        <thead>
                                                            <tr class="border-0">
                                                                <th class="p-0 w-50px"></th>
                                                                <th class="p-0 min-w-150px">Book Title</th>
                                                                <th class="p-0 min-w-140px">Author</th>
                                                                <th class="p-0 min-w-110px">Year</th>
                                                                <th class="p-0 min-w-50px">Stock</th>
                                                            </tr>
                                                        </thead>
                                                        <!--end::Table head-->
                                
                                                        <!--begin::Table body-->
                                                        <tbody id="latest-books-table">
                                                            <!-- Data buku akan dimuat di sini -->
                                                        </tbody>
                                                        <!--end::Table body-->
                                                    </table>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Tap pane-->
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                        <!--end::Row-->


                        <!--end::Row-->

                        <!--begin::Row-->

                        <!--end::Row-->


                    </div>
                    <!--end::Post-->
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
       $(document).ready(function () {
            // Ambil data dari route /dashboard/data menggunakan AJAX
            $.ajax({
                url: "{{ route('dashboard.data') }}",
                method: "GET",
                success: function (response) {
                    // Inisialisasi ApexCharts dengan data yang diterima
                    var options = {
                        series: [
                            {
                                name: 'Peminjaman',
                                data: response.totalPeminjaman
                            },
                            {
                                name: 'Pengembalian',
                                data: response.totalDikembalikan
                            },
                            {
                                name: 'Denda',
                                data: response.totalDenda
                            }
                        ],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                borderRadius: 5,
                                borderRadiusApplication: 'end'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: response.months,
                        },
                        yaxis: {
                            title: {
                                text: 'Jumlah'
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val + " item"
                                }
                            }
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        });



        $(document).ready(function () {
            // Ambil data dari route /dashboard/category-data menggunakan AJAX
            $.ajax({
                url: "{{ route('dashboard.category.data') }}",
                method: "GET",
                success: function (response) {
                    // Inisialisasi ApexCharts dengan data yang diterima
                    var options = {
                        series: response.totals, // Data jumlah buku
                        chart: {
                            width: 380,
                            type: 'pie',
                        },
                        labels: response.categories, // Label kategori
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };

                    var chart = new ApexCharts(document.querySelector("#chart2"), options);
                    chart.render();
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
           
            });
        });

        $(document).ready(function () {
        // Ambil data dari route /dashboard/most-read-books menggunakan AJAX
        $.ajax({
            url: "{{ route('dashboard.most-read-books') }}",
            method: "GET",
            success: function (response) {
                // Tampilkan data dalam card
                let html = '';
                response.forEach(function (book) {
                    html += `
                        <div class="d-flex flex-stack mb-5">
                            <!-- Gambar Buku -->
                            <div class="symbol symbol-50px me-5">
                               <img src="${book.gambar}" alt="${book.judul}" class="rounded">
                            </div>

                            <!-- Detail Buku -->
                            <div class="d-flex flex-column flex-grow-1">
                                <span class="text-gray-800 fw-bold fs-6">${book.judul}</span>
                                <span class="text-gray-600 fw-semibold fs-7">${book.penulis}</span>
                            </div>

                            <!-- Statistik Peminjaman -->
                            <div class="d-flex align-items-center">
                                <span class="badge badge-light-primary fs-7 fw-bold">${book.total_pinjam}x Dipinjam</span>
                            </div>
                        </div>
                    `;
                });

                // Masukkan HTML ke dalam placeholder
                $('#most-read-books').html(html);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
    });
    $(document).ready(function () {
        // Ambil data dari route /dashboard/latest-books menggunakan AJAX
        $.ajax({
            url: "{{ route('dashboard.latest-books') }}",
            method: "GET",
            success: function (response) {
                // Tampilkan data dalam tabel
                let html = '';
                response.forEach(function (book) {
                    html += `
                        <tr>
                            <td>
                                <div class="symbol symbol-45px me-2">
                                    <span class="symbol-label">
                                        <img src="${book.gambar}" class="h-50 align-self-center" alt="${book.judul}">
                                    </span>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">${book.judul}</a>
                                <span class="text-muted fw-semibold d-block">New Arrival</span>
                            </td>
                            <td class="text-end text-muted fw-bold">${book.penulis}</td>
                            <td class="text-end text-muted fw-bold">${book.tahun_terbit}</td>
                            <td class="text-end text-muted fw-bold">${book.stok}</td>
                        </tr>
                    `;
                });

                // Masukkan HTML ke dalam placeholder
                $('#latest-books-table').html(html);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
    });
    </script>

@endsection
