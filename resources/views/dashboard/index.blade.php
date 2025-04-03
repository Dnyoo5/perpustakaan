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
                                            <span class="card-label fw-bold text-gray-800">Delivery Tracking</span>
                                            <span class="text-gray-500 mt-1 fw-semibold fs-6">56 deliveries in
                                                progress</span>
                                        </h3>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="tooltip"
                                                data-bs-dismiss="click" data-bs-custom-class="tooltip-inverse"
                                                data-bs-original-title="Delivery App is coming soon"
                                                data-kt-initialized="1">View All</a>
                                        </div>
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
                                        <h3 class="card-title text-gray-800">Highlights</h3>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar d-none">
                                            <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                                            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                                                class="btn btn-sm btn-light d-flex align-items-center px-4"
                                                data-kt-initialized="1">
                                                <!--begin::Display range-->
                                                <div class="text-gray-600 fw-bold">9 Feb 2025 - 10 Mar 2025</div>
                                                <!--end::Display range-->

                                                <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span><span class="path4"></span><span
                                                        class="path5"></span><span class="path6"></span></i>
                                            </div>
                                            <!--end::Daterangepicker-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="card-body pt-5 ">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Section-->
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Client Rating</div>
                                            <!--end::Section-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-senter mb-7">
                                                <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span
                                                        class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Number-->
                                                <span class="text-gray-900 fw-bolder fs-6">7.8</span>
                                                <!--end::Number-->

                                                <span class="text-gray-500 fw-bold fs-6">/10</span>
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-3"></div>
                                        <!--end::Separator-->

                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-5">
                                            <!--begin::Section-->
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Quotes</div>
                                            <!--end::Section-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-senter">
                                                <i class="ki-duotone ki-arrow-down-right fs-2 text-danger me-2"><span
                                                        class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Number-->
                                                <span class="text-gray-900 fw-bolder fs-6">730</span>
                                                <!--end::Number-->


                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-3"></div>
                                        <!--end::Separator-->

                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-7">
                                            <!--begin::Section-->
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Agent Earnings</div>
                                            <!--end::Section-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-senter">
                                                <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span
                                                        class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Number-->
                                                <span class="text-gray-900 fw-bolder fs-6">$2,309</span>
                                                <!--end::Number-->


                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <div class="separator separator-dashed my-3"></div>
                                        <!--end::Separator-->

                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Section-->
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Agent Earnings</div>
                                            <!--end::Section-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-senter">
                                                <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span
                                                        class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Number-->
                                                <span class="text-gray-900 fw-bolder fs-6">$2,309</span>
                                                <!--end::Number-->


                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <div class="separator separator-dashed my-3"></div>
                                        <!--end::Separator-->

                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Section-->
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Agent Earnings</div>
                                            <!--end::Section-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-senter">
                                                <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span
                                                        class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Number-->
                                                <span class="text-gray-900 fw-bolder fs-6">$2,309</span>
                                                <!--end::Number-->


                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Item-->



                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Chart widget 32-->


                            <!--end::Col-->
                        </div>


                        <div class="card ">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">Latest Products</span>

                                    <span class="text-muted mt-1 fw-semibold fs-7">More than 400 new products</span>
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
                                                        <th class="p-0 min-w-150px"></th>
                                                        <th class="p-0 min-w-140px"></th>
                                                        <th class="p-0 min-w-110px"></th>
                                                        <th class="p-0 min-w-50px"></th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->

                                                <!--begin::Table body-->
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                <span class="symbol-label">
                                                                    <img src="/metronic8/demo11/assets/media/svg/brand-logos/plurk.svg"
                                                                        class="h-50 align-self-center" alt="">
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                                class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">Brad
                                                                Simmons</a>
                                                            <span class="text-muted fw-semibold d-block">Movie
                                                                Creator</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">
                                                            React, HTML </td>
                                                        <td class="text-end">
                                                            <span class="badge badge-light-success">Approved</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                                class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <i class="ki-duotone ki-arrow-right fs-2"><span
                                                                        class="path1"></span><span
                                                                        class="path2"></span></i> </a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->

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
        var options = {
            series: [{
                name: 'Net Profit',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Revenue',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Free Cash Flow',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
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
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
                title: {
                    text: '$ (thousands)'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();



        var options = {
            series: [44, 55, 13, 43, 22],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
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
    </script>
@endsection
