<x-header />
<x-menu />
<x-sidebar />
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                        </div>
                        <h4 class="page-title">Analytics</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class='uil uil-users-alt float-end'></i>
                            <h6 class="text-uppercase mt-0"> Registered Users</h6>
                            <h2 class="my-2" id="active-users-count">{{$regUserCount}}</h2>
                            <p class="mb-0 text-muted">
                                <!-- <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span> -->
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div>
                        </div>    
                    <!--end card-->
                <div class="col-xl-3 col-lg-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class='uil uil-window-restore float-end'></i>
                            <h6 class="text-uppercase mt-0">Category</h6>
                            <h2 class="my-2" id="active-views-count">{{$categoryCount}}</h2>
                            <p class="mb-0 text-muted">
                                <!-- <span class="text-danger me-2"><span class="mdi mdi-arrow-down-bold"></span>
                                    1.08%</span> -->
                                <span class="text-nowrap">Since previous week</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div>
                    <!--end card-->
                </div>  
                
                <div class="col-xl-3 col-lg-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class='uil uil-window-restore float-end'></i>
                            <h6 class="text-uppercase mt-0"> Sub Category</h6>
                            <h2 class="my-2" id="active-views-count">{{$subcategoryCount}}</h2>
                            <p class="mb-0 text-muted">
                               <!--  <span class="text-danger me-2"><span class="mdi mdi-arrow-down-bold"></span>
                                    1.08%</span> -->
                                <span class="text-nowrap">Since previous week</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div>
                    <!--end card-->
                </div>  

                <div class="col-xl-3 col-lg-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class='uil uil-window-restore float-end'></i>
                            <h6 class="text-uppercase mt-0">Bookings</h6>
                            <h2 class="my-2" id="active-views-count">{{$bookingCount}}</h2>
                            <p class="mb-0 text-muted">
                                <!-- <span class="text-danger me-2"><span class="mdi mdi-arrow-down-bold"></span>
                                    1.08%</span> -->
                                <span class="text-nowrap">Since previous week</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div>
                    <!--end card-->
                </div>  

               
            </div>

        </div>
        <!-- container -->
    </div>
    <!-- content -->

    <!-- Footer Start -->
    <x-footer-top/>
    <!-- end Footer -->

</div>
<x-footer/>

<!-- Analytics Dashboard App js -->
<script src="assets/js/pages/demo.dashboard-analytics.js"></script>
