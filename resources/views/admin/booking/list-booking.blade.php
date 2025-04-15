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
                        <h4 class="page-title">Booking List</h4>
                    </div>
                </div>
                <div class="pt-3">
                   <!--<button data-bs-toggle="modal" data-bs-target="#addBanner"
                        class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add New
                        Category</button>-->.
                </div>
            </div>
            <!-- end page title -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									
								<table class="table">
              <form name="search_form" method="POST" action="{{route('booking-list')}}">
                  @csrf
              <tr>
                  <td><input type="date" class="form-control" required name="start_date" value="<?php if(isset($_POST['start_date'])) echo $_POST['start_date']; ?>" placeholder="Start Date"></td>
                   <td><input type="date" class="form-control" required name="end_date" value="<?php if(isset($_POST['end_date'])) echo $_POST['end_date']; ?>" placeholder="End Date"></td>
                  
                   
                  <td><input type="submit" class="btn-primary btn-sm" value="Search"></td>
              </tr>
              </form>
          </table>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<form name="userform" id="userform" method="POST">
											@csrf
										<table id="datatable" class="datatable table table-stripped">
											<thead>
												<tr>
												<th>Invoice No</th>
												<th>Invoice Date</th>
												<th>Customer Name </th>
												<th>Email</th>
												<th>Phone</th>
												<th>Order Amount</th>
												<th>Payment Status</th>
												<th>Consultant </th>
												<th>Appointment Details</th>
												<th>Status</th>
												<th>Action</th>
												
												</tr>
											</thead>
											<tbody>
												
												@if($booking_list)
												  @foreach($booking_list as $booking)
												  <?php
												   $appointmentDet=DB::table('appointment_invoice_details AS aid')
												                  ->select('aid.*','sm.sloat_name')
												                  ->leftjoin('sloat_master AS sm','sm.id','aid.slot_id')
												   ->where('aid.invoice_id',$booking->id)->get();
												  ?>
												<tr>
												<td>{{$booking->invoice_number}}</td>
												<td>{{$booking->invoice_date}}</td>
													
													<td>{{$booking->user_name}}</td>
												<td>{{$booking->user_email}}</td>
												<td>{{$booking->C_Phone_Number}}</td>
													<td>{{$booking->order_amount}}</td>
													<td>@if($booking->payment_status==1) {{'DONE'}} @else {{'PENDING'}} @endif</td>
													<td>{{$booking->consultant_name}}</td>
													<td>
														<!-- <i class="fa fa-edit"></i>  -->
														<?php 
														foreach($appointmentDet as $appoint){ 
														  echo $appoint->date.'--'.$appoint->sloat_name.'<br>';
														}
														?>
              


													
													
													
													
												</td>
												<td>@if($booking->status==1)
												<a href="{{route('update-booking-status')}}?id={{$booking->id}}" class="btn btn-danger">Cancel Booking</a>
												@else
												{{'Cancelled'}}
												@endif
												</td>
												@if($booking->status==1)
												<td><a href="{{route('edit-booking-list')}}?id={{$booking->id}}" class="btn btn-primary">Edit</a>
												@endif
												
												
												</td>
												</tr>
												  @endforeach
												@endif
												
												
												
												
												
												
											</tbody>
										</table>
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				
			<x-footer-top />
    <!-- end Footer -->

</div>
<x-footer />
<script src="assets/js/pages/booking.js"></script>
