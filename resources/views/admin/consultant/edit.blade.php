<x-header />
<x-menu />
<x-sidebar />
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Cms Page</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @foreach ($datas as $data)



                                                        <div class="modal-header text-bg-warning border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Edit
                                                                </h4>

                                                        </div>
                                                        <form action="{{route('update-consultant')}}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                                            <input type="hidden" name="tour_menu_id" value="2">
                                                            <div class="modal-body">
                                                                
                                                                
                                                                <style type="text/css">
                                    ul.sub-category-list {
                                        display: flex;
                                        gap: 25px;
                                    }
                                    ul.sub-sub-category-list {
                                        display: flex;
                                        gap: 25px;
                                    }

                                </style>
                               <div class="catergory-list">
                                   <?php 
                                   $singleCategoryArr=explode(",",$data->category_ids);
                                 $category_list =DB::table('category')->orderBy('id','DESC')->get();
                                 foreach($category_list as $category){
                                      $selcat="";
                                     if (in_array($category->id, $singleCategoryArr)){
                                         $selcat="checked";
                                     }
                                ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" <?php echo $selcat;?> id="category_<?php echo $category->id;?>" name="category[]" value="<?php echo $category->id;?>" >
                                      <label class="form-check-label"><?php echo $category->category_name;?></label>
                                      <ul class="sub-category-list">
                                          <?php 
                                  $subcategory_list=DB::table('subcategory')->where('category_id',$category->id)->get();
                                   $singleSubCategoryArr=explode(",",$data->subcategory_ids);
                                  foreach($subcategory_list as $subcategory){ 
                                      $selsubcat="";
                                     if (in_array($subcategory->id, $singleSubCategoryArr)){
                                         $selsubcat="checked";
                                     }
                                ?>
                                          
                                          <li>
                                               <div class="form-check">
                                                  <input class="form-check-input subcategoryCls" type="checkbox" <?php echo $selsubcat;?> id="subcategory_<?php echo $subcategory->id;?>" name="subcategory[]" value="<?php echo $subcategory->id;?>">
                                                  <label class="form-check-label"><?php echo $subcategory->subcategory_name;?></label>
                                                </div>
                                                <ul class="sub-sub-category-list">
                                                     <?php 
                                                     $singleSubsubCategoryArr=explode(",",$data->sub_sub_category_ids);
                                          $sub_sub_category_list=DB::table('sub_sub_category')->where('category_id',$category->id)->where('subcategory_id',$subcategory->id)->get();
                                          foreach($sub_sub_category_list as $subsubcategory){ 
                                               $selsubcat="";
                                     if (in_array($subsubcategory->id, $singleSubsubCategoryArr)){
                                         $selsubcat="checked";
                                     }
                                        ?>
                                                    <li>
                                                        <div class="form-check">
                                                          <input class="form-check-input subsubcategoryCls" type="checkbox" <?php echo $selsubcat;?> id="subsubcategory_<?php echo $subsubcategory->id;?>" name="subsubcategory[]" value="<?php echo $subsubcategory->id;?>">
                                                          <label class="form-check-label"><?php echo $subsubcategory->sub_sub_category_name;?></label>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                    
                                                </ul>
                                          </li>
                                          <?php } ?>
                                      </ul>
                                    </div>
                                    <?php } ?>
                               </div>
                               
                               
                                

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text"
                                        name="name" class="form-control" required value="{{$data->name}}">
                                        @error('title')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                 <div class="mb-3">
                                    <label class="form-label">Type Of Service</label>
                                    <input type="text"
                                        name="type_of_service" class="form-control" value="{{$data->type_of_service}}" required>
                                        @error('title')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">About Me</label>
                                    <textarea name="content" id="file-picker" class="form-control" required>{{$data->about_me}}</textarea>
                                    @error('content')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                 <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text"
                                        name="email" class="form-control" required value="{{$data->email}}">
                                        @error('seo_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Linkedin Username</label>
                                    <input type="text"
                                        name="linkedin_username" class="form-control" value="{{$data->linkedin_username}}" required>
                                        @error('seo_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Instagram Username</label>
                                    <input type="text"
                                        name="instagram_username" class="form-control" value="{{$data->instagram_username}}" required>
                                        @error('seo_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text"
                                        name="phone" class="form-control" required value="{{$data->phone}}">
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Whatsapp Phone</label>
                                    <input type="text"
                                        name="whatsapp_phone" class="form-control" value="{{$data->whatsapp_phone}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text"
                                        name="designation" class="form-control" value="{{$data->designation}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Specialization</label>
                                    <input type="text"
                                        name="specialization" class="form-control" value="{{$data->specialization}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Photo</label>
                                    <input type="file" name="image"
                                        class="form-control" >
                                        @error('image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                 <div class="mb-3">
                                    <label class="form-label">Number of Years (Experience)</label>
                                    <input type="text"
                                        name="experience" class="form-control" value="{{$data->experience}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                  <div class="mb-3">
                                    <label class="form-label">Any other platforms/websites you're actively engaging on</label>
                                    <input type="text"
                                        name="engaging_platforms" class="form-control" value="{{$data->engaging_platforms}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Educational Qualifications (related to service)</label>
                                    <input type="text"
                                        name="education_qualification" class="form-control" value="{{$data->education_qualification}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Certifications (related to service)</label>
                                    <input type="text"
                                        name="certification" class="form-control" value="{{$data->certification}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Past Organisations (related to service)</label>
                                    <input type="text"
                                        name="past_organization" class="form-control" value="{{$data->past_organization}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Number of organisations you have worked with
</label>
                                    <input type="text"
                                        name="no_of_organization" class="form-control" value="{{$data->number_of_organization}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                
                                <div class="mb-3">
                                    <label class="form-label">Number of clients you have worked with
</label>
                                    <input type="text"
                                        name="no_of_client" class="form-control" value="{{$data->number_of_client}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Describe your ideal client
</label>
                                    <input type="text"
                                        name="describe_ideal_client" class="form-control" value="{{$data->describe_ideal_client}}" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password"
                                        name="password" class="form-control" >
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-warning">Update</button>

                                                            </div>
                                                        </form>
                                                        @endforeach


        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <x-footer-top />
    <!-- end Footer -->



</div>
<x-footer />


