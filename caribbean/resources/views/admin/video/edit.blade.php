@extends('admin.layout.app')
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"> Edit Form </h1>
                    
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                            <a href="{{ url('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('admin/video-add') }}" class="text-muted text-hover-primary">Video Management</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">
                            Edit Form
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <form id="kt_account_profile_details_form" action="{{ route('admin.video-update', ['id' => $video->id]) }}" name="editForm" class="form d-flex flex-column flex-lg-row"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>Image</h4>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('{{ asset("public/assets/media/svg/files/blank-image.svg") }}');
                                    }

                                    [data-theme="dark"] .image-input-placeholder {
                                        background-image: url('{{ asset("public/assets/media/svg/files/blank-image-dark.svg") }}');
                                    }
                                </style> 
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px" style="background-image: url('{{ $video->image ? url('storage/app/' . $video->image) : asset("public/assets/media/svg/files/blank-image.svg") }}'); background-size: cover; background-position: center; border-radius: 30px; position: relative;">
                                      
                                </div>
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                       <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="text-muted fs-7"> Upload Image.Accepted formats: .png, .jpg, .jpeg <span class="form-text text-danger">@error('image') {{ $message }} @enderror</span> </div>    
                                
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10"> 
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h4> Edit </h4>
                                            </div>
                                        </div>
                                        
                                        <div class="card-body pt-0">
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">Link</label>
                                                <input type="text" name="link" id="link" class="form-control mb-2" placeholder="Video link"  value="{{ $video->link }}" />
                                                <span class="form-text">Enter the link for the video.</span>
                                                <span class="form-text text-danger">@error('link') {{ $message }} @enderror</span>
                                            </div>

                                            <!-- Add Title  -->
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">Title</label>
                                                <input type="text" name="title" id="title" class="form-control mb-2" placeholder="Video title"value="{{ $video->title }}"/>
                                                <span class="form-text">Enter the title for the video.</span>
                                                <span class="form-text text-danger">@error('title') {{ $message }} @enderror</span>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <a href="#" id="kt_ecommerce_add_product_cancel" class="btn btn-sm btn-flex bg-body btn-color-primary-700 btn-active-color-primary fw-bold me-5">Cancel</a>
                                <button type="submit" class="btn btn-primary" id="submitBtn">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection