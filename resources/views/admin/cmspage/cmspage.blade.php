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


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-5">
                                   <a href="{{route('create-cmspage')}}"> <button data-bs-toggle="modal" data-bs-target=""
                                        class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add New</button></a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive wrap" id="testimonial-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="all">Title</th>
                                            <th>Image</th>
                                            <th style="width: 20%;">Content</th>


                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($datas as $data)
                                            <tr>
                                                <td>{{ $data->title }}</td>
                                                <td>
                                                    <img src="{{asset($data->image)}}" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                                </td>
                                                <td>
                                                    <?php $title = strip_tags($data->content);?>
                                                {{Str::limit($title,30)}}
                                                </td>




                                                <td class="table-action">
                                                    <a
                                                        href="{{route('edit-cmspage',['id'=>$data->id])}}" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#deleteTestimonial{{ $data->id }}"
                                                        href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                            {{-- Edit Testimonial Modal --}}
                                            <div id="editTestimonial{{ $data->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="primary-header-modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-warning border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Edit
                                                                </h4>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('cmspage.update', [$data->id])}}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf @method('PATCH')
                                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                                            <input type="hidden" name="tour_menu_id" value="2">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Title</label>
                                                                    <input value="{{$data->title}}" type="text"
                                                                        name="title" class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Image</label>
                                                                    <input type="file" name="image" value="{{ $data->image }}"
                                                                        class="form-control">
                                                                        <img src="{{asset($data->image)}}" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea name="description" id="file-picker" class="form-control" value="{{$data->discription}}" required>{{$data->description}}</textarea>

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Place</label>
                                                                    <input value="{{$data->place}}" type="text"
                                                                        name="place" class="form-control" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Days</label>
                                                                    <input value="{{$data->days}}" type="text"
                                                                        name="days" class="form-control" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Price</label>
                                                                    <input value="{{$data->price}}" type="text"
                                                                        name="price" class="form-control" required>
                                                                </div>
                                                                <div class="row">
                                                                    @php $ckboxvalues = explode("," , $data->tour_menu_curd_id); @endphp






                                                                    <div class="col-md-3">
                                                                        <label class="form-label">Destination</label><br>
                                                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="1" @php if(array_search(1,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Rajasthan Tour Packages</p> </div>
                                                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="2" @php if(array_search(2,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Kerala Tour Packages</p> </div>
                                                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="3" @php if(array_search(3,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Bhutan Tour Packages</p> </div>
                                                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="4" @php if(array_search(4,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">India Tour Packages</p> </div>

                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">Theme</label><br>
                                                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="5" @php if(array_search(5,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Golden Triangle Tours India</p> </div>
                                                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="6" @php if(array_search(6,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Wildlife Tours India</p> </div>
                                                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="7" @php if(array_search(7,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Luxury Tours India</p> </div>
                                                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="8" @php if(array_search(8,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Rural Tours India</p> </div>

                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">Hotels Group</label><br>
                                                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="9" @php if(array_search(9,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Taj Hotels</p> </div>
                                                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="10" @php if(array_search(10,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Oberoi Hostels Luxury Tours</p> </div>
                                                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="11" @php if(array_search(11,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Aman Hostels And Resorts</p> </div>
                                                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="12" @php if(array_search(12,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">CGH Earth</p> </div>

                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">Festivels</label><br>
                                                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="13" @php if(array_search(13,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Mysore Dusshera</p> </div>
                                                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="14" @php if(array_search(14,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Bateshwar Fair</p> </div>
                                                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="15" @php if(array_search(15,$ckboxvalues)){echo "checked";}else{ echo '';} @endphp/><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Kochi-Muziris Biennale</p> </div>

                                                                    </div>

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
                                            {{-- End Edit Testimonial Modal --}}

                                            {{-- Delete Testimonial Modal --}}
                                            <div id="deleteTestimonial{{ $data->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="primary-header-modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-danger border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Delete
                                                                </h4>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('cmspage.destroy', [$data->id]) }}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                                            <div class="modal-body text-center">
                                                                <div class="mb-3">
                                                                    <div>
                                                                          {{$data->title}}
                                                                    </div>

                                                                </div>
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
                                            {{-- End Delete Testimonial Modal --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Add Testimonial Modal --}}
            <div id="addTestimonial" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header text-bg-success border-0">
                            <h4 class="modal-title" id="primary-header-modalLabel">Add</h4>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{route('cmspage.store')}}" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf

                            <input type="hidden" name="tour_menu_id" value="2">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text"
                                        name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image"
                                        class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="file-picker" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Place</label>
                                    <input type="text"
                                        name="place" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Days</label>
                                    <input type="text"
                                        name="days" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text"
                                        name="price" class="form-control" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Destination</label><br>
                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="1" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Rajasthan Tour Packages</p> </div>
                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="2" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Kerala Tour Packages</p> </div>
                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="3" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Bhutan Tour Packages</p> </div>
                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="4" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">India Tour Packages</p> </div>

                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Theme</label><br>
                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="5" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Golden Triangle Tours India</p> </div>
                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="6" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Wildlife Tours India</p> </div>
                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="7" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Luxury Tours India</p> </div>
                                      <div style="display: flex;">  <input type="checkbox" name="services[]" value="8" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Rural Tours India</p> </div>

                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Hotels Group</label><br>
                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="9" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Taj Hotels</p> </div>
                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="10" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Oberoi Hostels Luxury Tours</p> </div>
                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="11" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Aman Hostels And Resorts</p> </div>
                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="12" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">CGH Earth</p> </div>

                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Festivels</label><br>
                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="13" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Mysore Dusshera</p> </div>
                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="14" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Bateshwar Fair</p> </div>
                                        <div style="display: flex;">  <input type="checkbox" name="services[]" value="15" /><p style="font-size: 88%;margin-top: 14px;margin-left: 3px;font-weight: 400;">Kochi-Muziris Biennale</p> </div>

                                    </div>

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
            {{-- End Add Testimonial Modal --}}

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <x-footer-top />
    <!-- end Footer -->



</div>
<x-footer />


