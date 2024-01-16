@extends('Admin.Layout.app')
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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Business Form</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Manage
                                    Customer</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Add
                                    Business</a>
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
                    <form id="kt_account_profile_details_form" name="myForm" class="form d-flex flex-column flex-lg-row"
                        action="{{route('add.business.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <!--begin::Thumbnail settings-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h4>Logo</h4>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body text-center pt-0">
                                    <!--begin::Image input-->
                                    <!--begin::Image input placeholder-->
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url('{{ asset(' public/assets/media/svg/files/blank-image.svg') }}');
                                        }

                                        [data-theme="dark"] .image-input-placeholder {
                                            background-image: url('{{ asset(' public/assets/media/svg/files/blank-image-dark.svg') }}');
                                        }
                                    </style>
                                    <!--end::Image input placeholder-->
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-150px h-150px"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
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
                                    <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and
                                        *.jpeg image files are accepted</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Thumbnail settings-->
                            <!--begin::Status-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title required">
                                        <h4>Category</h4>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <div class="rounded-circle bg-success w-15px h-15px"
                                            id="kt_ecommerce_add_product_status"></div>
                                    </div>
                                    <!--begin::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Select2-->
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                        data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select"
                                        name="category" id="category">
                                        <option>active</option>
                                        <option>inactive</option>
                                    </select>
                                    <!--end::Select2-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Select category.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Status-->
                            <!--start::user-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title required">
                                        <h4>Plan</h4>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <div class="rounded-circle bg-success w-15px h-15px"
                                            id="kt_ecommerce_add_product_status"></div>
                                    </div>
                                    <!--begin::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Select2-->
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                        data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select"
                                        name="user_id" id="user_id">
                                        <option>bansi</option>
                                    </select>

                                    <!--end::Select2-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Select plan.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Card body-->
                            </div>

                            <!--end::user-->
                            <!--begin::Business Selection-->
                            <div class="card card-flush py-4">

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Select store template-->
                                    <label for="kt_ecommerce_add_product_store_template"
                                        class="form-label required">Country</label>
                                    <!--end::Select store template-->
                                    <!--begin::Select2-->
                                    <select class="form-control form-select" name="country" id="country"
                                        data-placeholder="Select a country">
                                        <option></option>
                                    </select>
                                    <br>
                                    <span id="country-error"></span>
                                    <br>
                                    <!--end::Select2-->
                                    <!--begin::Select store template-->
                                    <label for="kt_ecommerce_add_product_store_template"
                                        class="form-label required">State</label>
                                    <!--end::Select store template-->
                                     <!--begin::Input-->
                                     <input type="text" name="state" id="state" class="form-control mb-2" 
                                     placeholder="State" value="" /> <br>
                                    <!--end::Input--> 
                                    <label class="form-label manager-code required">City</label>
                                    <input type="text" name="city" class="form-control mb-2 only-string-values"
                                        id="city" placeholder="City">
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Business Selection-->
                            <!--begin::User Selection-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h4>Tax</h4>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::label user-->
                                    <label class="form-label manager-code required">Tax Type</label>
                                    <select class="form-control form-select" name="tax_type" id="state">
                                        <option value="">Select Tax Type</option>
                                        <option value="sales-gst">GST (Goods and Services Tax)</option>
                                        <option value="sales-vat">VAT (Value Added Tax)</option>
                                        <option value="sales-pst">PST (Provincial Sales Tax)</option>
                                        <option value="sales-hst">HST (Harmonized Sales Tax)</option>
                                        <option value="sales-qst">QST (Quebec Sales Tax)</option>
                                        <option value="sales-excise">Excise Tax</option>
                                    </select><br>
                                    <!--end::Input-->
                                    <label class="form-label manager-code required">Tax Percentage</label>
                                    <input type="number" name="tax_percentage"
                                        class="form-control mb-2 only-string-values" placeholder="Tax Percentage"
                                        id="Percentage">
                                    <span id="Percentage-error"></span>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::User Selection-->
                        </div>

                        <!--end::Aside column-->
                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin:::Tabs-->
                            <ul
                                class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                        href="#kt_ecommerce_add_product_general">General</a>
                                </li>
                                <!--end:::Tab item-->
                            </ul>
                            <!--end:::Tabs-->
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
                                                    <label class="required form-label">Business Name</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="name" id="name"
                                                        class="form-control mb-2" placeholder="Business name"
                                                        value="" />
                                                  
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">A business name is required and recommended
                                                        to be unique.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="form-label required">Business Email</label>
                                                    <!--end::Label-->
                                                      <!--begin::Input-->
                                                      <input type="text" name="email" id="email"
                                                        class="form-control mb-2" placeholder="Business email"
                                                        value="" />
                                                    <span id="name-error"></span>

                                                    <!--end::Input-->
                                                    <div class="text-muted fs-7">A business email is required and recommended
                                                        to be unique.</div>

                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <div>
                                                    <label class="required form-label full-name required">Business
                                                        Site</label>
                                                    <input type="text" name="site" class="form-control mb-2"
                                                        placeholder="Business Site" id="site">
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::General options-->

                                        <!--begin::Shipping-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h4>Inventory</h4>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Phone No</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="phone" class="form-control mb-2"
                                                        placeholder="Phone number" id="phone" style="width: 100%;" />
                                                    <span id="phone-error"></span>
                                                    <!--end::Input-->
                                                </div>
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <label class="required form-label">Zip Code</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="zip_code" max="8" min="6"
                                                        class="form-control mb-2 zipcode_mask" placeholder="Zip Code"
                                                        id="zipcode">
                                                    <span id="zipcode-error"></span>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="form-label required">Address</label>
                                                    <!--end::Label-->
                                                    <textarea name="address" rows="1" cols="80" class="form-control mb-2"></textarea>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                        </div>
                                        <!--end::Shipping-->


                                        <!--begin::Pricing-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <label class="form-label manager-code required">Company Since</label>
                                                    <input type="date" name="since"
                                                        class="form-control mb-2 only-string-values"
                                                        placeholder="Company Since">
                                                    <!--begin::product quantity-->
                                                    <div class="text-muted fs-7">Enter the product purchased price.</div>

                                                    <!--end::product quantity-->
                                                </div>
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="form-label full-name required">Description</label>
                                                    <textarea name="description" rows="1" cols="80" class="form-control mb-2"></textarea>
                                                    <!--end::Input-->
                                                    <!--begin::product quantity-->
                                                    <div class="text-muted fs-7">Enter the product retail price.</div>
                                                    <!--end::product quantity-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Pricing-->
                                    </div>
                                </div>
                                <!--end::Tab pane-->

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <a href="#" id="kt_ecommerce_add_product_cancel"
                                        class="btn btn-sm btn-flex bg-body btn-color-primary-700 btn-active-color-primary fw-bold me-5">Cancel</a>
                                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                                </div>
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
    <!--end::Basic info-->
@endsection
