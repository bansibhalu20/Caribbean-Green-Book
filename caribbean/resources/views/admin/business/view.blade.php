@extends('admin.layout.app')

@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Business
                        List</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Manage
                                Business</a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar-->
        </div>

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body border-0 pt-6">
                        <div class="row">
                            <div class="col-lg-4  mb-lg-0 mb-6 p-2">
                                <label style="font-size: 14px;">Bussines Name:</label>
                                <div class="input-daterange input-group" id="kt_datepicker">
                                    <input type="text" class="form-control datatable-input" id="search_bussines"
                                        name="search_bussines" placeholder="Search Bussines" data-col-index="2">
                                </div>
                            </div>
                            <div class="col-lg-4  mb-lg-0 mb-6 p-2">
                                <label style="font-size: 14px;">User Name:</label>
                                <select class="form-control form-select datatable-input" name="user_name" id="user_name"
                                    data-col-index="4">
                                    <option value="">--Select--</option>
                                   
                                </select>
                            </div>
                            <div class="col-lg-4  mb-lg-0 mb-6 p-2">
                                <label>Status</label>
                                <select class="form-control form-select datatable-input" name="status"
                                    data-col-index="7" id="searchstatus">
                                    <option value="">Select Status</option>
                                    <option value="all" name="status">All</option>
                                    <option value="active" name="status">Active</option>
                                    <option value="inactive" name="status">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                    <span>
                                        <i class="la la-search"></i>
                                        <span>search</span>
                                    </span>
                                </button>
                                &nbsp;&nbsp;
                                <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                                    <span>
                                        <i class="la la-close"></i>
                                        <span>Reset</span>
                                    </span>
                                </button>
                            </div>
                            <div class="col-md-4">&nbsp;</div>
                            <div class="col-md-4 ">
                                <div class="row justify-content-end mr-0">
                                    <div class="mw-200px">
                                        <button id="deleteSelected" class="btn btn-danger" style="display: none;">Delete
                                            Selected</button>
                                    </div>
                                    <div class="mw-150px">
                                        <a href="" class="btn btn-primary ">Add
                                            Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5"
                                id="kt_ecommerce_products_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            <div
                                                class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" id="checkAll" type="checkbox"
                                                    data-kt-check="true"
                                                    data-kt-check-target="#kt_ecommerce_products_table .form-check-input"
                                                    value="1" />
                                            </div>
                                        </th>
                                        <th class="min-w-50px ">Logo</th>
                                        <th class="min-w-100px">Business Name</th>
                                        <th class="min-w-100px">Website</th>
                                        <th class="min-w-125px">Country</th>
                                        <th class="min-w-100px">Tax Type</th>
                                        <th class="min-w-100px">Tax Percentage</th>
                                        <th class="min-w-100px">Status</th>
                                        <th class="min-w-100px">Action</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <tbody class="text-gray-600 fw-semibold">
        @foreach($businesses as $business)
            <tr>
                <td>{{-- Display the logo, if applicable --}}</td>
                <td>{{ $business->name }}</td>
                <td>{{ $business->website }}</td>
                <td>{{ $business->country_name }}</td>
                <td>{{ $business->tax_type }}</td>
                <td>{{ $business->tax_percentage }}</td>
                <td>{{ $business->status }}</td>
                <td>{{-- Action buttons, if applicable --}}</td>
            </tr>
        @endforeach
    </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->

                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end:::Main-->
</div>
</div>
@endsection

