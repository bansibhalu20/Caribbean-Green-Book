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
                            Category List</h1>
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
                            <li class="breadcrumb-item text-muted"> <a href="{{ route('admin.viewcate') }}"
                                    class="text-muted text-hover-primary">Manage
                                    Category</a></li>
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
                                    
                                    <div class="col-lg-4  mb-lg-0 mb-6 p-2">
                                        <label style="font-size: 14px;">Category</label>
                                        <select class="form-control form-select" name="search_cate" id="search_cate"
                                            data-col-index="4">
                                            <option value="">--Select--</option>
                                           
                                        </select>
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
                                                    Selected</button>
                                            </div>
                                            <div class="mw-150px w-100">
                                                <a href="{{ route('admin.addcate') }}" class="btn btn-primary" style="width:150px;">Add Category</a>
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
                            <table class="table align-middle table-row-dashed fs-6 gy-5 table-responsive"
                                id="kt_ecommerce_products_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" id="checkAll" type="checkbox"
                                                    data-kt-check="true"
                                                    data-kt-check-target="#kt_ecommerce_products_table .form-check-input"
                                                    value="1" />
                                            </div>
                                        </th>
                                        <!-- <th class="min-w-50px">Category</th> -->
                                        <th class="min-w-100px">Name</th>
                                        <th class="min-w-100px">Image</th>
                                        <th class=" min-w-70px">Description</th>
                                        <th class="min-w-90px">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach($category as $cate)
                                    <tr>
                                        <td></td>
                                        <td>{{ $cate->title }}</td>
                                        <td>
                                            @if(!empty($cate->image))
                                                <img src="{{ asset('storage/app/public/' . $cate->image) }}" height="50px" width="50px" style="border-radius: 30px;" alt="">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $cate->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.category-edit',['id'=>$cate->id]) }}" class="btn-info btn btn-sm btn-icon"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.category-delete',['id' =>$cate->id]) }}" class="btn-danger btn btn-sm btn-icon btn-delete"><i class="fas fa-trash-alt"></i></a></td>
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
  
<!-- jQuery -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script>
    $(document).ready(function() {
        $('#kt_ecommerce_products_table').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{{ route("admin.category-dataTable") }}', 
                type: 'GET',
            },
            columns: [
                // Define your datatable columns here
                { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'image', name: 'image' },
                { data: 'description', name: 'description' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],
        });
    });
</script> -->

   
@endsection