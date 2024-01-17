@extends('admin.layout.app')
@section('content')

<script>
    if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session("success") }}',
        });
    endif
</script>


<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
               
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                       Video</h1>
                    
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                       
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">
                            Add Video</a>
                        </li>
                       
                    </ul>
                   
                </div>
              
            </div>
          
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-body border-0 pt-6">
                        <div class="row mt-3">  
                            <div class="col-md-4">&nbsp;</div>        
                            <div class="row justify-content-end mr-0">
                                <div class="mw-200px">
                                    <button id="deleteSelected" class="btn btn-danger" style="display: none;">Delete Selected</button>
                                </div>
                                <div class="mw-150px">
                                    <a href="{{ route('admin.video.create') }}" class="btn btn-primary ">Add Video</a>
                                </div>
                            </div>
                        </div>
                    
                       
                        <div class="card-body py-4">
                            <table class="table align-middle table-row-dashed fs-6 gy-5"id="kt_ecommerce_products_table">
                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" id="checkAll" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                                            </div>
                                        </th>
                                        <th class="min-w-50px ">id</th>
                                        <th class="min-w-100px">Title</th>
                                        <th class="min-w-100px">Image</th>
                                        <th class="min-w-100px">link</th>
                                        <th class="min-w-100px">Action</th>
                                    </tr>
                                </thead>
                              
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
                                                <img src="{{ url('storage/app/' . $video->image) }}" alt="Video Image" width="50px">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td><a href="{{ $video->link }}" target="_blank">{{ $video->link }}</a></td>

                                        <td>
                                        <a href="{{ route('admin.video.edit', ['id' => $video->id]) }}" class="btn btn-sm btn-primary me-2 btn-edit">Edit</a>

                                        <form action="{{ route('admin.video.destroy', ['id' => $video->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger me-2 btn-delete" onclick="return confirm('Are you sure you want to delete this video?')">Delete</button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

    
    </script>


@endsection
