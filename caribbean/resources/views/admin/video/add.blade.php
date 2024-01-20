@extends('admin.layout.app')
@section('content')

   @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session("success") }}',
        });
    @endif

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
                                <a href="" class="text-muted text-hover-primary">Manage video</a></li>
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
                                        <label style="font-size: 14px;">Link:</label>
                                        <input type="text" class="form-control datatable-input" id="search_link" name="search_link" placeholder="Search link" data-col-index="2">
                                    </div>

                                    <div class="col-lg-4 mb-lg-0 mb-6 p-2">
                                        <label style="font-size: 14px;">Title:</label>
                                        <input type="text" class="form-control datatable-input" id="search_Title" name="search_Title" placeholder="Search Title" data-col-index="2">
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
                                                <a href="{{ route('admin.video.create') }}" class="btn btn-primary" >Add Video </a>
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
                            <table class="table align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_ecommerce_video_table" data-videos="{{ json_encode($videos) }}">

                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" id="checkAll" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input"value="1" />
                                            </div>
                                        </th>
                                        <th class="min-w-50px ">id</th>
                                        <th class="min-w-100px">Title</th>
                                        <th class="min-w-100px">Image</th>
                                        <th class="min-w-100px">link</th>
                                        <th class="min-w-100px">Action</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-semibold">

                                @foreach($videos as $video)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" value="{{ $video->id }}" />
                                            </div>
                                        </td>
                                        <td>{{ $video->id }}</td>
                                        <td>{{ $video->title }}</td>
                                        <td>
                                            @if($video->image)
                                                <img src="{{ url('storage/app/' . $video->image) }}" alt="Video Image" height="50px" width="50px" style="border-radius: 30px;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td><a href="{{ $video->link }}" target="_blank">{{ $video->link }}</a></td>

                                        <td>
                                        <a href="{{ route('admin.video.edit', ['id' => $video->id]) }}" class="btn-info btn btn-sm btn-icon"><i class="fas fa-edit"></i> </a>

                                        <form action="{{ route('admin.video.destroy', ['id' => $video->id]) }}" method="POST" style="display: inline;">
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include DataTables -->
    <script>
    
        $(document).ready(function () {
            $('.menu-item.video').on('click', function (e) {
                // Prevent the default behavior 
                e.preventDefault(); 
                var url = $(this).attr('href');
                // Load content dynamically
                $.get(url, function (data) {
                    $('#kt_app_main').html(data);
                });
            });
        });

    $(document).ready(function () {
        // DataTable
        var table = $('#kt_ecommerce_video_table').DataTable({
            searching: true, // Enable searching
            paging: true,// Enable pagination
            pageLength: 5,  // Define the number of rows to display per page
            // Define column definitions (if needed)
            columnDefs: [
                { targets: [0], searchable: false, orderable: false }
            ]
        });

        // Add search functionality to individual columns (if needed)
        table.columns().every(function () {
        var that = this;

        $('input', this.header()).on('keyup change clear', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });

    // Add event listener to handle the "Delete Selected" button
    $('#deleteSelected').on('click', function () {
        var selectedRows = table.rows({ selected: true }).data().toArray();
        // Implement your logic to delete selected rows
        console.log(selectedRows);
    });

    // Add event listener to handle the "Search" button
    $('#kt_search').on('click', function () {
        // Get the values from the input fields
        var searchLinkValue = $('#search_link').val();
        var searchTitleValue = $('#search_Title').val();

        // Set the search values in the input fields
        $('#search_link').val(searchLinkValue);
        $('#search_Title').val(searchTitleValue);

        // Trigger the search
        table.search(searchLinkValue).columns().search(searchTitleValue).draw();
        // Implement additional search logic if needed
    });

    // Add event listener to handle the "Reset" button
    $('#kt_reset').on('click', function () {
        // Reset the input fields
        $('#search_link, #search_Title').val('');
        // Trigger the reset
        table.search('').columns().search('').draw();
        // Implement additional reset logic if needed
    });
    });
</script>
  
  
   




@endsection
