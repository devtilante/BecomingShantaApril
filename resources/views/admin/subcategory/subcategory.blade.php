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
                        <h4 class="page-title">Subcategory</h4>
                    </div>
                </div>
                <div class="pt-3">
                    <button data-bs-toggle="modal" data-bs-target="#addBanner"
                        class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add New
                        Subcategory</button>
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
                                            <th class="all">Category</th>
                                            <th>Subcategory Name</th>
                                            
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategory as $subcat)
                                            <tr>
                                               
                                                <td>
                                                    {{ $subcat->category_name }}
                                                </td>
                                                <td>
                                                    {{ $subcat->subcategory_name }}
                                                </td>
                                               

                                                <td class="table-action">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#editBanner{{ $subcat->id }}"
                                                        href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#deleteBanner{{ $subcat->id }}"
                                                        href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                            {{-- Edit Banner Modal --}}
                                            <div id="editBanner{{ $subcat->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="primary-header-modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-warning border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Edit
                                                                Subcategory</h4>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('update-subcategory') }}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="banner_id" value="{{$subcat->id}}">
                                                            <div class="modal-body">
                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">Category</label>
                                                                    <select class="form-control" required name="category_id" id="category_id">
                                                                        <option value="">Select Category</option>
                                                                        @if($category_list)
                                                                        @foreach($category_list as $category)
                                                                        <?php 
                                                                            $selcat="";
                                                                            if($subcat->category_id==$category->id)
                                                                            {
                                                                             $selcat="selected";
                                                                            }
                                                                        ?>
                                                                        <option value="{{$category->id}}" <?php echo $selcat;?>>{{$category->category_name}}</option>
                                                                        
                                                                        @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">Title</label>
                                                                    <input value="{{ $subcat->subcategory_name }}" type="text"
                                                                        name="title" class="form-control" required>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                    <label class="form-label">Photo</label>
                                    <input type="file" name="image"
                                        class="form-control" required>
                                        @error('image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
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
                                            <div id="deleteBanner{{ $subcat->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="primary-header-modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-danger border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Delete
                                                                Subcategory</h4>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('delete-subcategory') }}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="banner_id" value="{{$subcat->id}}">
                                                            <div class="modal-body text-center">
                                                                
                                                            </div>
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
                            <h4 class="modal-title" id="primary-header-modalLabel">Add SubCategory</h4>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add-subcategory') }}" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" required name="category_id" id="category_id">
                                                                        <option value="">Select Category</option>
                                                                        @if($category_list)
                                                                        @foreach($category_list as $category)
                                                                        
                                                                        <option value="{{$category->id}}" >{{$category->category_name}}</option>
                                                                        @endforeach
                                                                        @endif
                                                                        
                                                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Subcategory Name</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Photo</label>
                                    <input type="file" name="image"
                                        class="form-control" required>
                                        @error('image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
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
<script src="assets/js/pages/banner.js"></script>
