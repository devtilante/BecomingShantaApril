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



            {{-- Add Testimonial Modal --}}

                        <div class="modal-header text-bg-success border-0">
                            <h4 class="modal-title" id="primary-header-modalLabel">Add</h4>

                        </div>
                        <form action="{{route('cmspage.store')}}" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf @method('POST');

                            <input type="hidden" name="tour_menu_id" value="2">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text"
                                        name="title" class="form-control" required>
                                        @error('title')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image"
                                        class="form-control" required>
                                        @error('image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea name="content" id="file-picker" class="form-control" required></textarea>
                                    @error('content')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Seo Title</label>
                                    <input type="text"
                                        name="seo_title" class="form-control" required>
                                        @error('seo_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Seo Description</label>
                                    <input type="text"
                                        name="seo_description" class="form-control" required>
                                        @error('seo_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>

            {{-- End Add Testimonial Modal --}}

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <x-footer-top />
    <!-- end Footer -->



</div>
<x-footer />


