@extends('admin.layout.app')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div id="kt_app_toolbar" class="app-toolbar py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Toolbar-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('adminDashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <!--end::Item-->
                            
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Toolbar-->
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10">
                    <div class="col-md-6 col-lg-6 col-xl-6 ">
                        <div class="card mb-xl-5">
                            <div class="card-header">
                                <h3 class="card-title text-gray-800">Statistics</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Users</div>
                                    <div class="d-flex align-items-senter">
                                        <span class="text-gray-900 fw-bolder fs-6">Bansi</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-2"></div>
                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Business</div>
                                    <div class="d-flex align-items-senter">
                                        <span
                                            class="text-gray-900 fw-bolder fs-6">Bansi</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-2"></div>
                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Customer
                                    </div>
                                    <div class="d-flex align-items-senter">
                                        <span
                                            class="text-gray-900 fw-bolder fs-6">Bansi</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-2"></div>
                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Products
                                    </div>
                                    <div class="d-flex align-items-senter">
                                        <span class="text-gray-900 fw-bolder fs-6">Bansi</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-2"></div>
                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Invoices
                                    </div>
                                    <div class="d-flex align-items-senter">
                                        <span class="text-gray-900 fw-bolder fs-6">Bansi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Row-->
    <!--end::Content wrapper-->
    <!-- Add this script tag in your layout file -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.3/echarts.min.js"></script>
@endsection
