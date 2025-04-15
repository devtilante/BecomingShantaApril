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
                        <h4 class="page-title">Assign Session</h4>
                    </div>
                </div>
                <div class="pt-3">
                    <button data-bs-toggle="modal" data-bs-target="#addBanner"
                        class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add New
                        Assign Session</button>
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
                                            <th class="all">ID</th>
                                            <th class="all">Category</th>
                                            <th>Subcategory Name</th>
                                            <th>Package Name</th>
                                            <th>Number OF Session</th>
                                            <th>Price</th>
                                            
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assign_session as $session)
                                            <tr>
                                               <td>
                                                    {{ $session->id }}
                                                </td>
                                                <td>
                                                    {{ $session->category_name }}
                                                </td>
                                                <td>
                                                    {{ $session->subcategory_name }}
                                                </td>
                                                <td>
                                                    {{ $session->sub_sub_category_name }}
                                                </td>
                                                <td>
                                                    {{ $session->session_name }}
                                                </td>
                                                <td>
                                                    {{ $session->session_price }}
                                                </td>
                                               

                                                <td class="table-action">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#editBanner{{ $session->id }}"
                                                        href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#deleteBanner{{ $session->id }}"
                                                        href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                            {{-- Edit Banner Modal --}}
                                            <div id="editBanner{{ $session->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="primary-header-modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-warning border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Edit
                                                                Assign Session</h4>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('update-assign-session') }}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="banner_id" value="{{$session->id}}">
                                                            <div class="modal-body">
                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">Category</label>
                                                                    <select class="form-control" required name="edit_category_id" id="edit_category_id" onchange="edit_category_wise_subcategory(this.value)">
                                                                        <option value="">Select Category</option>
                                                                        @if($category_list)
                                                                        @foreach($category_list as $category)
                                                                        <?php 
                                                                            $selcat="";
                                                                            if($session->category_id==$category->id)
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
                                                                    <label class="form-label">Sub Category</label>
                                                                    <select class="form-control" required name="edit_subcategory_id" id="edit_subcategory_id">
                                                                        <option value="">Select SubCategory</option>
                                                                        <?php
                                                                         $edit_subcategory_list=DB::table('subcategory')->where('category_id',$session->category_id)->get();
                                                                        ?>
                                                                        @if($edit_subcategory_list)
                                                                        @foreach($edit_subcategory_list as $subcategory)
                                                                        <?php 
                                                                            $selcat="";
                                                                            if($session->subcategory_id==$subcategory->id)
                                                                            {
                                                                             $selcat="selected";
                                                                            }
                                                                        ?>
                                                                        <option value="{{$subcategory->id}}" <?php echo $selcat;?>>{{$subcategory->subcategory_name}}</option>
                                                                        
                                                                        @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">Package</label>
                                                                    <select class="form-control"  name="edit_sub_sub_category_id" id="edit_sub_sub_category_id">
                                                                        <option value="">Select Package</option>
                                                                        <?php
                                                                         $edit_sub_sub_category_list=DB::table('sub_sub_category')->where('category_id',$session->category_id)->where('subcategory_id',$session->subcategory_id)->get();
                                                                        ?>
                                                                        @if($edit_sub_sub_category_list)
                                                                        @foreach($edit_sub_sub_category_list as $subsub_category_list)
                                                                        <?php 
                                                                            $selcat="";
                                                                            if($session->sub_sub_categroy_id==$subsub_category_list->id)
                                                                            {
                                                                             $selcat="selected";
                                                                            }
                                                                        ?>
                                                                        <option value="{{$subsub_category_list->id}}" <?php echo $selcat;?>>{{$subsub_category_list->sub_sub_category_name}}</option>
                                                                        
                                                                        @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">Number Of Session</label>
                                                                    <select class="form-control" required name="session_id" id="session_id">
                                                                        <option value="">Select Session</option>
                                                                        @if($session_master)
                                                                        @foreach($session_master as $ss)
                                                                        <?php 
                                                                            $selcat="";
                                                                            if($session->session_id==$ss->id)
                                                                            {
                                                                             $selcat="selected";
                                                                            }
                                                                        ?>
                                                                        <option value="{{$ss->id}}" <?php echo $selcat;?>>{{$ss->session_name}}</option>
                                                                        
                                                                        @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                
                                                                
                                                                <div class="mb-3">
                                    <label class="form-label">Price </label>
                                    <input type="text" class="form-control" name="session_price" required id="session_price" value="{{$session->session_price}}">
                                    
                                 </div> 
                                 
                                 <div class="mb-3">
                                    <label class="form-label">Validity </label>
                                    <input type="text" class="form-control" name="validity" required id="validity" value="{{$session->validity}}">
                                    
                                 </div>
                                 
                                 <div class="mb-3">
                                    <label class="form-label">Free Sessions </label>
                                    <input type="number" class="form-control" name="free_session" required id="free_session" value="{{$session->free_session}}">
                                    
                                 </div>
                                 
                                 <div class="mb-3">
                                    <label class="form-label">Allowed Reschedules </label>
                                    <input type="number" class="form-control" name="allowed_reschedules" required id="allowed_reschedules" value="{{$session->allowed_reschedules}}">
                                    
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
                                            <div id="deleteBanner{{ $session->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="primary-header-modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-danger border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Delete
                                                                Session</h4>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('delete-assign-session') }}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="banner_id" value="{{$session->id}}">
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
                                {{$assign_session->links('vendor.pagination.default') }}
                                
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
                            <h4 class="modal-title" id="primary-header-modalLabel">Add Assign Session</h4>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add-assign-session') }}" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" required name="category_id" id="category_id" onchange="category_wise_subcategory(this.value)">
                                                                        <option value="">Select Category</option>
                                                                        @if($category_list)
                                                                        @foreach($category_list as $category)
                                                                        
                                                                        <option value="{{$category->id}}" >{{$category->category_name}}</option>
                                                                        @endforeach
                                                                        @endif
                                                                        
                                                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SubCategory </label>
                                    <select class="form-control" required name="subcategory_id" id="subcategory_id" onchange="category_wise_subsubcategory(this.value)">
                                                                        <option value="">Select Sub Category</option>
                                                                        <!-- @if($subcategory_list)
                                                                        @foreach($subcategory_list as $subcategory)
                                                                        
                                                                        <option value="{{$subcategory->id}}" >{{$subcategory->subcategory_name}}</option>
                                                                        @endforeach
                                                                        @endif -->
                                                                        
                                                                    </select>
                                </div>
                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">Package</label>
                                                                    <select class="form-control"  name="sub_sub_category_id" id="sub_sub_category_id" >
                                                                        <option value="">Select Package</option>
                                                                       <!-- @if($sub_sub_category_list)
                                                                        @foreach($sub_sub_category_list as $sub_sub_category_list)
                                                                        
                                                                        <option value="{{$sub_sub_category_list->id}}">{{$sub_sub_category_list->sub_sub_category_name}}</option>
                                                                        
                                                                        @endforeach
                                                                        @endif-->
                                                                    </select>
                                                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Number Of Session </label>
                                    <select class="form-control" required name="session_id" id="session_id">
                                                                        <option value="">Select Session</option>
                                                                        @if($session_master)
                                                                        @foreach($session_master as $session)
                                                                        
                                                                        <option value="{{$session->id}}" >{{$session->session_name}}</option>
                                                                        @endforeach
                                                                        @endif
                                                                        
                                                                    </select>
                                </div>
                                
                                <!--<div class="mb-3">
                                    <label class="form-label">Session </label><br>
                                    
                                                                        @if($session_master)
                                                                        @foreach($session_master as $session)
                                                                        <input type="checkbox" name="session_id[]" id="session_{{$session->id}}" value="{{$session->id}}"> {{$session->session_name}} <br>
                                                                        
                                                                        @endforeach
                                                                        @endif
                                                                        
                                                                    
                                </div>-->
                                
                                 <div class="mb-3">
                                    <label class="form-label">Price </label>
                                    <input type="text" class="form-control" name="session_price" required id="session_price">
                                    
                                 </div>
                                 
                                 <div class="mb-3">
                                    <label class="form-label">Validity </label>
                                    <input type="text" class="form-control" name="validity" required id="validity">
                                    
                                 </div>
                                 
                                 <div class="mb-3">
                                    <label class="form-label">Free Sessions </label>
                                    <input type="number" class="form-control" name="free_session" required id="free_session">
                                    
                                 </div>
                                 
                                 <div class="mb-3">
                                    <label class="form-label">Allowed Reschedules </label>
                                    <input type="number" class="form-control" name="allowed_reschedules" required id="allowed_reschedules">
                                    
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
<script>
    function category_wise_subcategory(categoryId){
        var subcategory_id=$("#subcategory_id");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
	
    $.ajax({
      type:'POST',
      url: "{{ route('category-wise-subcategory') }}",
      data:{
        _token:$('input[name=_token]').val(),
        category_id:categoryId
		
      },
      success:function(response){
		  console.log(response); 
          // var jsonData=JSON.parse(response);
          $('option', subcategory_id).remove();
          $('#subcategory_id').append('<option value="">{{ __("select") }}</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.subcategory_name
            }).appendTo('#subcategory_id');
          });
        }

    });
    }
    
    
    function edit_category_wise_subcategory(categoryId){
        var subcategory_id=$("#edit_subcategory_id");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
	
    $.ajax({
      type:'POST',
      url: "{{ route('category-wise-subcategory') }}",
      data:{
        _token:$('input[name=_token]').val(),
        category_id:categoryId
		
      },
      success:function(response){
		  console.log(response); 
          // var jsonData=JSON.parse(response);
          $('option', subcategory_id).remove();
          $('#edit_subcategory_id').append('<option value="">{{ __("select") }}</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.subcategory_name
            }).appendTo('#edit_subcategory_id');
          });
        }

    });
    }
    
    
    function category_wise_subsubcategory(subcategoryId){
        var category_id   =$("#category_id").val();
        
        var subcategory_id=$("#sub_sub_category_id");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
	
    $.ajax({
      type:'POST',
      url: "{{ route('category-wise-subsubcategory') }}",
      data:{
        _token:$('input[name=_token]').val(),
        category_id:category_id,
        sub_category_id:subcategoryId
		
      },
      success:function(response){
		  console.log(response); 
          // var jsonData=JSON.parse(response);
          $('option', subcategory_id).remove();
          $('#sub_sub_category_id').append('<option value="">{{ __("select") }}</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.sub_sub_category_name
            }).appendTo('#sub_sub_category_id');
          });
        }

    });
    }
</script>

<!-- Banner Datatable js -->
<script src="assets/js/pages/banner.js"></script>
