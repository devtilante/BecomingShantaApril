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
                        <h4 class="page-title">Enquiry</h4>
                    </div>
                </div>
                <div class="pt-3">
                    <!-- <button data-bs-toggle="modal" data-bs-target="#addBanner"
                        class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add New
                        Banner</button> -->
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
                                            <th class="all">Type</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Reference Number</th>
                                            <!-- <th style="width: 85px;">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiry_list as $enquiry)
                                            <tr>
                                                
                                                <td>
                                                    {{ $enquiry->type }}
                                                </td>
                                                <td>
                                                    {{ $enquiry->first_name }}
                                                </td>
                                                <td>
                                                    {{ $enquiry->last_name }}
                                                </td>
                                                <td>
                                                    {{ $enquiry->email }}
                                                </td>
                                                <td>
                                                    {{ $enquiry->phone }}
                                                </td>
                                                <td>
                                                    {{ $enquiry->reference_number }}
                                                </td>

                                                
                                            </tr>
                                            

                                           
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
                            <h4 class="modal-title" id="primary-header-modalLabel">Add Banner</h4>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add-banner') }}" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">CTA Text</label>
                                    <input type="text" name="cta_text" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">CTA Link</label>
                                    <input type="text" name="cta_link" class="form-control" required>
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
