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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Video List</h1>
                    <!--end::Title-->
                        
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('adminDashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">
                            CMS List
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->

                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
    
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::User-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-body ">
                        <div class="mb-2" id="searchform">
                            <div class="row ">
                                <div class="col-lg-4 mb-lg-0 mb-6 p-2">
                                    <label style="font-size: 14px;">Search box:</label>
                                    <input type="text" class="form-control datatable-input" id="search_link" name="search_link" placeholder="Search link or Title" data-col-index="2">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                        <span>
                                            <i class="la la-search"></i>
                                            <span>Search</span>
                                        </span>
                                    </button>

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
                                                Selected
                                            </button>
                                        </div>
                                        <div class="mw-150px w-100">
                                            <a href="{{ route('admin.cms-create') }}" class="btn btn-primary" >Add CMS </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card header-->
                    
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_ecommerce_video_table">

                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" id="checkAll" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-50px ">id</th>
                                    <th class="min-w-100px">Title</th>
                                    <th class="min-w-100px">Description</th>
                                    <th class="min-w-100px">Action</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                                
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach($cmsData as $cms)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox"  />
                                            </div>
                                        </td>
                                        <td>{{ $cms->id }}</td>
                                        <td>{{ $cms->title }}</td>
                                        <td>{!!$cms->description !!}</td>
                                        <td>
                                        <a href="{{ route('admin.cms-edit', ['id' => $cms->id])}}" class="btn-info btn btn-sm btn-icon  btn-edit"><i class="fas fa-edit"></i> </a>

                                        <form action="" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger btn btn-sm btn-icon btn-delete" onclick="return confirm('Are you sure you want to delete this video?')"> <i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->

                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::invoice-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>
<!--end:::Main-->

@endsection