<x-header />
<x-menu />
<x-sidebar />
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="d-flex justify-content-between">
                <div>
                    <div class="page-title-box">
                        <h4 class="page-title">Location</h4>
                    </div>
                </div>
                <div class="pt-3">
                    <button data-bs-toggle="modal" data-bs-target="#addBanner"
                        class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add New
                        Location</button>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap" id="banner-datatable">
                                    <thead class="table-light">
                                        <tr>
                                           
                                            <th>Type</th>
                                            <th>Location Name</th>
                                            <th>Location Code</th>
                                           
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($location as $cat)
                                            <tr>
                                               <td>
                                                    {{ $cat->type }}
                                                </td>
                                                
                                                <td>
                                                    {{ $cat->location_name }}
                                                </td>
                                                
                                                <td>
                                                    {{ $cat->location_code }}
                                                </td>
                                                

                                                <td class="table-action">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#editBanner{{ $cat->id }}"
                                                        href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#deleteBanner{{ $cat->id }}"
                                                        href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                            {{-- Edit Banner Modal --}}
                                            <div id="editBanner{{ $cat->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="primary-header-modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-warning border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Edit
                                                                Location</h4>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('update-location') }}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="banner_id" value="{{$cat->id}}">
                                                            <div class="modal-body">
                                                                
                                                                <div class="mb-3">
                                    <label class="form-label">Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="">Select Type</option>
                                        <option value="CX" <?php if($cat->type=='CX') echo "selected"; ?>>CX</option>
                                        <option value="IN" <?php if($cat->type=='IN') echo "selected"; ?>>IN</option>
                                        </select>
                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">Location Name</label>
                                                                    <input value="{{ $cat->location_name }}" type="text"
                                                                        name="location_name" class="form-control" required>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">Location Code</label>
                                                                    <input value="{{ $cat->location_code }}" type="text"
                                                                        name="location_code" class="form-control" required>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-warning">Update</button>
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Edit Banner Modal --}}

                                            {{-- Delete Banner Modal --}}
                                            <div id="deleteBanner{{ $cat->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="primary-header-modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-danger border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Delete
                                                                Location</h4>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('delete-location') }}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="banner_id" value="{{$cat->id}}">
                                                            
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Delete Banner Modal --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Add Banner Modal --}}
            <div id="addBanner" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-bg-success border-0">
                            <h4 class="modal-title" id="primary-header-modalLabel">Add Location</h4>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add-location') }}" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <div class="modal-body">
                                
                                <div class="mb-3">
                                    <label class="form-label">Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="">Select Type</option>
                                        <option value="CX">CX</option>
                                        <option value="IN">IN</option>
                                        </select>
                                </div>
                               
                                <div class="mb-3">
                                    <label class="form-label">Location Name</label>
                                    <input type="text" name="location_name" class="form-control" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Location Code</label>
                                    <input type="text" name="location_code" class="form-control" required>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Add</button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- End Add Banner Modal --}}

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <x-footer-top />
    <!-- end Footer -->

</div>
<x-footer />

<!-- Banner Datatable js -->
<script src="assets/js/pages/category.js"></script>
