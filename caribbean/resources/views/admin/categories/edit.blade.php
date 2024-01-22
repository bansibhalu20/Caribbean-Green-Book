@extends('admin.layout.app')
@section('content')
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
                        <h4 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Category</h4>
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
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.viewcate') }}" class="text-muted text-hover-primary">Manage
                                    Category</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a class="text-muted text-hover-primary">Edit Category</a>
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
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" class="form d-flex flex-column flex-lg-row" upstream
                        name="myForm" action="{{ route('admin.category-update',['id'=>$category->id]) }}" method="POST"
                        enctype="multipart/form-data" >
                        @method('PUT')
                        @csrf
                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <!--begin::Thumbnail settings-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h4>Profile</h4>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body text-center pt-0">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                       @if ($category->image != null)
                                            <div class="image-input-wrapper w-150px h-150px"
                                                style="background-image: url('{{ asset('storage/app/public/' . $category->image) }}')">
                                            </div>
                                        @else
                                            <style>
                                                .image-input-placeholder {
                                                    background-image: url('{{ asset(' public/assets/media/svg/files/blank-image.svg') }}');
                                                }

                                                [data-theme="dark"] .image-input-placeholder {
                                                    background-image: url('{{ asset(' public/assets/media/svg/files/blank-image-dark.svg') }}');
                                                }
                                            </style>
                                            <div class="image-input-wrapper w-150px h-150px"></div>
                                        @endif
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and
                                        *.jpeg image files are accepted</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Thumbnail settings-->
                         
                        </div>

                        <!--end::Aside column-->
                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                           
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                    role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::General options-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h4>General</h4>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                             <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label">Select Category</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->

                                                <select class="form-select mb-2" data-control="select2"
                                                    data-placeholder="Select a Category" data-hide-search="true"
                                                    name="parent_cate_id" id="category">
                                                    <option value="">Select Category</option> 
                                                    
                                                    {{-- Use a loop to dynamically generate options --}}
                                                        @foreach($parentCategories as $parentCategory)
                                                            <option value="{{ $parentCategory->id }}" {{ old('parent_category_id', $category->parent_category_id) == $parentCategory->id ? 'selected' : '' }}>
                                                                {{ $parentCategory->title }}
                                                            </option>
                                                        @endforeach
                                                </select>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Select the Parent category</div>

                                                <!--end::Description-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="name" class="form-control mb-2"
                                                    placeholder="Name" minlength="2" maxlength="15"
                                                    value="{{ old('title', $category->title) }}">

                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A name is required and
                                                    recommended
                                                    to be unique.</div>
                                                <span id="fname-error"></span>

                                                <!--end::Description-->
                                            </div>
                                        </div>
                                            <!--end::Input group-->
                                              <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label">Description</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea class="form-control description-textarea" rows="6" name="description">
                                               {{ old('description', $category->description) }}</textarea> 
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A description </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input -->
                                                
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->
        
                            </div>
                     </div>
                            <!--end::Tab pane-->

                            <div class="d-flex justify-content-end mt-5">
                                <!--begin::Button-->
                                <a href="" id="kt_ecommerce_add_product_cancel"
                                    class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="submitBtn" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Main column-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->

@endsection