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
                        <h4 class="page-title">Edit Booking</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            



                                                        <div class="modal-header text-bg-warning border-0">
                                                            <h4 class="modal-title" id="primary-header-modalLabel">Edit
                                                                </h4>

                                                        </div>
                                                        <form action="{{route('update-booking-list')}}" method="POST"
                                                            enctype="multipart/form-data" autocomplete="off">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                                            <input type="hidden" name="tour_menu_id" value="2">
                                                            <div class="modal-body">
                               
                               

                                <div class="mb-3">
                                    <label class="form-label">Invoice No</label>
                                    <input type="text"
                                        name="invoice_number" class="form-control" required value="{{$data->invoice_number}}">
                                        @error('title')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Booking Date</label>
                                    <input type="date"
                                        name="invoice_date" class="form-control" required value="{{$data->invoice_date}}">
                                   
                                </div>
                                
                                 <div class="mb-3">
                                    <label class="form-label">Order Amount</label>
                                    <input type="text"
                                        name="order_amount" class="form-control" required value="{{$data->order_amount}}">
                                   
                                </div>
                                   <div class="mb-3">
                                    <label class="form-label">Payment Status</label>
                                     <select class="form-control" name="payment_status">
                                         <option value="0" @if($data->payment_status==0) {{"selected"}} @endif> Pending </option>
                                         <option value="1" @if($data->payment_status==1) {{"selected"}} @endif> Done    </option>
                                     </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Consultant</label>
                                     <select class="form-control" name="consultant_id">
                                         <option value="" > Select </option>
                                         @if($consultant_list)
                                         @foreach($consultant_list as $consultant)
                                         <?php 
                                         $sel_constalt="";
                                         if($data->consultant_id==$consultant->id){
                                            $sel_constalt="selected"; 
                                         }
                                         ?>
                                         <option value="{{$consultant->id}}" {{$sel_constalt}}>{{$consultant->name}} </option>
                                         @endforeach
                                         @endif
                                     </select>
                                </div>
                                
                                


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-warning">Update</button>

                                                            </div>
                                                        </form>
                                                     


        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <x-footer-top />
    <!-- end Footer -->



</div>
<x-footer />


