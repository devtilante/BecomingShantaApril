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
                        <h4 class="page-title">Testimonials</h4>
                    </div>
                </div>
                <div class="pt-3">
                    <button data-bs-toggle="modal" data-bs-target="#addTestimonial"
                        class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add New
                        Testimonial</button>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive wrap" id="testimonial-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="all">User</th>
                                            <th>Intro</th>
                                            <th style="width: 20%;">Review</th>
                                            <th>Added At</th>
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonials as $testimonial)
                                            <tr>
                                                <td>
                                                    <img src="{{asset($testimonial->image)}}" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <span class="text-body">{{$testimonial->name}}</span>
                                                        <br/>
                                                        <span class="mdi mdi-star {{$testimonial->rating > 0 ? 'text-warning' : 'text-secondary'}}"></span>
                                                        <span class="mdi mdi-star {{$testimonial->rating > 1 ? 'text-warning' : 'text-secondary'}}"></span>
                                                        <span class="mdi mdi-star {{$testimonial->rating > 2 ? 'text-warning' : 'text-secondary'}}"></span>
                                                        <span class="mdi mdi-star {{$testimonial->rating > 3 ? 'text-warning' : 'text-secondary'}}"></span>
                                                        <span class="mdi mdi-star {{$testimonial->rating > 4 ? 'text-warning' : 'text-secondary'}}"></span>
                                                    </p>
                                                </td>
                                                <td>
                                                    {{ $testimonial->intro }}
                                                </td>
                                                <td>
                                                    {{ $testimonial->review }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($testimonial->created_at)->format('jS F, Y, h:i A') }}
                                                </td>

                                                <td class="table-action">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#editTestimonial{{ $testimonial->id }}"
                                                        href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#deleteTestimonial{{ $testimonial->id }}"
                                                        href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                            {{-- Edit Testimonial Modal --}}
                                            <div id="editTestimonial{{ $testimonial->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="primary-header-modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-warning border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Edit
                                                                Testimonial</h4>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('update-testimonial') }}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Image</label>
                                                                    <input type="file" name="image"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Name</label>
                                                                    <input value="{{ $testimonial->name }}" type="text"
                                                                        name="name" class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Intro</label>
                                                                    <input value="{{ $testimonial->intro }}"
                                                                        type="text" name="intro"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Rating</label>
                                                                    <input value="{{ $testimonial->rating }}"
                                                                        type="number" min="0" max="5" step="1" name="rating"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Review</label>
                                                                    <textarea name="review" class="form-control" rows="3" required>{{$testimonial->review}}</textarea>
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
                                            <div id="deleteTestimonial{{ $testimonial->id }}" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="primary-header-modalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-danger border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Delete
                                                                Testimonial</h4>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('delete-testimonial') }}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
                                                            <div class="modal-body text-center">
                                                                <div class="mb-3">
                                                                    <div>
                                                                        <img src="{{$testimonial->image}}" class="rounded mt-2" width="100px">
                                                                    </div>
                                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                                        <span class="text-body">{{$testimonial->name}}</span>
                                                                        <br/>
                                                                        <span class="mdi mdi-star {{$testimonial->rating > 0 ? 'text-warning' : 'text-secondary'}}"></span>
                                                                        <span class="mdi mdi-star {{$testimonial->rating > 1 ? 'text-warning' : 'text-secondary'}}"></span>
                                                                        <span class="mdi mdi-star {{$testimonial->rating > 2 ? 'text-warning' : 'text-secondary'}}"></span>
                                                                        <span class="mdi mdi-star {{$testimonial->rating > 3 ? 'text-warning' : 'text-secondary'}}"></span>
                                                                        <span class="mdi mdi-star {{$testimonial->rating > 4 ? 'text-warning' : 'text-secondary'}}"></span>
                                                                    </p>
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
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-bg-success border-0">
                            <h4 class="modal-title" id="primary-header-modalLabel">Add Testimonial</h4>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add-testimonial') }}" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image"
                                        class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text"
                                        name="name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Intro</label>
                                    <input type="text" name="intro"
                                        class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Rating</label>
                                    <input type="number" name="rating"
                                        class="form-control" min="0" max="5" step="1" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Review</label>
                                    <textarea name="review" class="form-control" rows="3" required></textarea>
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

<!-- Testimonial Datatable js -->
<script src="assets/js/pages/testimonial.js"></script>
