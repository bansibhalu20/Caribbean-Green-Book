@extends('admin.layout.app')
@section('content')
@php($admin = Auth::guard('admin')->user())
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Password</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('adminDashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">change password</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            
            <div class="d-flex flex-column flex-column-fluid">
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div id="kt_app_content_container" class="app-container">
                        <div class="card mb-5 mb-xl-10">
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                                data-bs-target="#kt_account_profile_details" aria-expanded="true"
                                aria-controls="kt_account_profile_details">
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Change Password</h3>
                                </div>
                            </div>
                            <div id="kt_signin_password_edit" class="collapse show">
                                <form method="POST" action="{{ route('admin.changepassword') }}" id="change-password" class="form">
                                    @csrf
                                    <div class="card-body border-top p-9">
                                        <div class="row mb-6">
                                            <label
                                                class="col-lg-2 col-form-label required fw-semibold fs-6">current_password</label>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-12 fv-row">
                                                        <input type="password" name="old_password"
                                                            class="required form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                            placeholder="current_password" maxlength="16" />
                                                            @error('old_password')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label
                                                class="col-lg-2 col-form-label required fw-semibold fs-6">new_password</label>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-12 fv-row">
                                                        <input type="password" name="new_password" id="new_password"
                                                            class="required form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                            placeholder="new_password" maxlength="16" />
                                                            @error('new_password')
                                                             <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label
                                                class="col-lg-2 col-form-label required fw-semibold fs-6">confirm_password</label>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-12 fv-row">
                                                        <input type="password" name="confirm_password"
                                                            class="required form-control form-control-lg form-control-solid mb-3 lg-0"
                                                            placeholder="confirm_password" maxlength="16" />
                                                            @error('confirm_password')
                                                             <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <a href="{{ route('adminDashboard') }}" type="reset"
                                            id="kt_ecommerce_add_product_cancel"
                                            class="btn btn-light btn-active-light-primary me-2">cancel</a>
                                        <button type="submit" class="btn btn-primary"
                                            id="kt_signin_password_edit_submit">submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection