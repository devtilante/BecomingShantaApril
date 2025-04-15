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
                                                        <form action="{{route('update-cmspage')}}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                                            <input type="hidden" name="tour_menu_id" value="2">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Title</label>
                                                                    <input value="{{$data->title}}" type="text"
                                                                        name="title" class="form-control" required>
                                                                        @error('title')
                                                                             <div class="error text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Image</label>
                                                                    <input type="file" name="image" value="{{ $data->image }}"
                                                                        class="form-control">
                                                                        @error('image')
                                                                        <div class="error text-danger">{{ $message }}</div>
                                                                   @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Content</label>
                                                                    <textarea name="content" id="file-picker" class="form-control" value="{{$data->content}}" required>{{$data->description}}</textarea>
                                                                    @error('content')
                                                                    <div class="error text-danger">{{ $message }}</div>
                                                               @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Seo Title</label>
                                                                    <input value="{{$data->seo_title}}" type="text"
                                                                        name="seo_title" class="form-control" required>
                                                                        @error('seo_title')
                                                                             <div class="error text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Seo Description</label>
                                                                    <input value="{{$data->seo_description}}" type="text"
                                                                        name="seo_description" class="form-control" required>
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


