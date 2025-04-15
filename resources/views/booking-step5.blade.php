@include('layouts.header')
<style>
    form.step-form:after{
        display:none;
    }
</style>
<?php
 if(isset($_POST['consultant_id'])){
 $consultant_id =$_POST['consultant_id'];
 session()->put('session_consultant_id',$consultant_id);
 }else{
  $consultant_id =session()->get('session_consultant_id');   
 }
 
            if(isset($_GET['date'])){
                $date=$_GET['date'];
                session()->put('session_booking_date',$date);
            }else{
                $date=date('Y-m-d');
                session()->put('session_booking_date',$date);
            }
       
?>            

<!-- start inner banner -->
<section class="page-banner">
         <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <a href="{{URL::to('/')}}" class="back-home"><i class="fas fa-arrow-left"></i> Back to home</a>
                    <h1>Let's book your consultation</h1>
                    <p class="sm">* marked input fields are required</p>
                   <img style="float:right" src="{{asset('images/scanner.jpeg')}}" width="300" height="300">
                </div>
             </div>
         </div>
     </section>
  
  <!-- start booking step -->
                    <form class="step-form" method="POST" action="{{route('save-invoice')}}">
                        <input type="hidden" name="consultant_id" id="consultant_id" value="{{$consultant_id}}">
                        <input type="hidden" name="user_id" id="user_id" value="{{session()->get('user_id')}}">
                        <input type="hidden" name="appointment_type" id="appointment_type" value="<?php echo $_POST['appointment_type'];?>">
                        
                        @csrf
    <section class="booking-step">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   <ul class="list-group vertical-steps">
                       <li class="list-group-item ">
                         <span>Service</span>
                         
                       </li>
                       <li class="list-group-item">
                         <span>Date, Time & Location</span>
                         </li>
                         <li class="list-group-item">
                         <span>Client</span>
                         
                       </li>
                       <li class="list-group-item">
                         <span>Review & Confirm</span>
                         </li>
                         <li class="list-group-item completed">
                         <span>Payment</span>
                         
                       </li>
                       
                     </ul>  
                </div>
                <div class="col-md-9">
                   <div class="row border-bottom pb-4">
                       <div class="col-md-7">
                          <div class="border-box">
                             <h5 class="">Client Details</h5>
                             <h4><?php if (empty(session('session_myself_name'))) { 
                                 echo session()->get('someone_else_name');
                             } else {
                                 echo session()->get('session_myself_name');
                             } ?></h4>
                              <p class=""><?php if (empty(session('session_myself_email'))) { 
                                 echo session()->get('session_someone_else_email');
                             } else {
                                 echo session()->get('session_myself_email');
                             } ?></p>
                              <p>{{session()->get('user_phone')}}</p>
                              <h5 class="mt-4">Service Details</h5>
                              <p class="sm"><?php echo session()->get('session_consultant_designation');?></p>
                              <h4><?php echo session()->get('session_consultant_name');?></h4>
                              <p class="sm">Service & Tier</p>
                              <h4><?php echo session()->get('session_category_name');?></h4>
                              <h4><?php echo session()->get('session_sub_category_name');?></h4>
                        </div>
                         <div class="border-box pl-0 pr-0">
                             <nav >
                                <div class="nav nav-tabs p-4 pb-0 pt-0" id="nav-tab" role="tablist">
                                  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">@if(session()->get('session_appointment_type')==1){{'Online'}} @else {{'Offline'}}@endif</button>
                                  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Indiranagar</button>
                                  <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Cox Town</button>
                                </div>
                              </nav>
                              <div class="tab-content  p-4" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <?php
                                     $cart_list =DB::table('appointment_book_cart AS abc')
                                    ->select('abc.*','c.name','sm.sloat_name')
                                    ->leftjoin('consultants AS c','c.id','abc.consultant_id')
                                    ->leftjoin('sloat_master AS sm','sm.id','abc.sloat_id')
                                    ->where('abc.user_id',session()->get('user_id'))
                                    ->where('abc.consultant_id',session()->get('session_consultant_id'))
                                    ->where('abc.date',date('Y-m-d'))
                                    ->get();
                    
                    ?>
                    <div class="session pt-0">
                        <?php
                         if($cart_list){
                          foreach($cart_list as $cart){
                        ?>  
                                    
                                        <p> <?php echo $cart->name;?></p>
                                        <p> <?php echo $cart->sloat_name;?></p>
                                        <p class="date"> <?php echo date("F j, Y, g:i A", strtotime($cart->date));?></p>
                                    
                            <?php 
                              } 
                            }
                            ?>
                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                   <p>Session 1</p>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                   <p>Session 1</p>
                                </div>
                              </div>
                              <div class="schedule p-4 pb-0">Sessions yet to schedule   {{session()->get('session_no_of_session')}}</div>
                         </div>
                       </div>
                       <div class="col-md-5">
                          <div class="border-box gray-bg pl-0 pr-0">
                              <div class="p-4">
                                 <h5 class="">Price Details</h5>
                                 <ul>
                                     <?php
                                      $sessionDetails=DB::table('assign_session AS as')
                                                      ->select('as.*','sm.session_name')
                                                      ->leftjoin('session_master AS sm','sm.id','as.session_id')
                                      ->where('category_id',session()->get('session_category_id'))->where('subcategory_id',session()->get('session_sub_category_id'))->where('session_id',session()->get('session_id'))->first();
                                      if($sessionDetails){
                                          $noOfSession=$sessionDetails->session_name;
                                          $session_price=$sessionDetails->session_price;
                                      }else{
                                          $noOfSession=1;
                                           $session_price=5000;
                                      }
                                      $total_session_price=0;
                                      $total_session_price=$total_session_price+$session_price;
                                     ?>
                                     <input type="hidden" name="total_order_amount" id="total_order_amount" value="{{$total_session_price}}"
                                      <li>Individual Wellbeing</li>
                                      <li>Growth Essential</li>
                                    
                                    <li><span> <?php echo $noOfSession;?> sessions</span> <b>INR  <?php echo $total_session_price;?></b></li>
                                     <!--<li><span>CGST</span> <p>INR 1680</p></li>
                                      <li><span>SGST</span> <p>INR 1680</p></li>-->
                                 </ul>
                              </div>
                              
                              <div class="p-4 total"><span>Total Amount</span><b>INR <?php echo $total_session_price;?></b>
                                <button type="submit" class="theme-btn mt-4 w-100" value="Proceed to pay">Proceed to pay</button>
                                <!--<button id="rzp-button1" class="theme-btn mt-4 w-100"><i class="fas fa-money-bill"></i> Proceed to pay</button>-->
                               <div  class="view"><a href="">View Cancellation Policy</a></div>
                               </div>
                          </div>
                          <div class="border-box">
                               <h5 class="font-black">Need Help?</h5>
                               <p>If you have queries or encounter any problem, we are here to help. Call us at <a href="">+91 80889 23112</a> or</p>
                               <div><a href="" class="white-btn"><i class="fab fa-whatsapp"></i> WhatsApp Us</a></div>
                          </div>
                       </div>
                   </div>
                   <div class="form-btns pt-0">
                       <a  href="{{route('book-step4')}}" class="theme-btn mr-2">Previous</a>
                      
                       <button href="" class="white-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Cancel
                       </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


         <!-- Modal -->
         <div class="modal cencel-modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-body">
                   <h4>Cancel Booking?</h4>
                   <p>Are you sure you want to cancel this booking? 
                       <br>Please note that the same dates and times might not be available later</p>
               </div>
               <div class="modal-footer">
                 <button type="button" class="white-btn" data-bs-dismiss="modal">Cancel Booking</button>
                 <button type="button" class="theme-btn">Continue Booking</button>
               </div>
             </div>
           </div>
         </div>
@include('layouts.footer')
<script>
     function cancel_process(){
        
        let userConfirmed = confirm("Are you sure you want to proceed for cancel?");
        if (userConfirmed) {
            window.location.href="{{route('home')}}"; 
        } else {
            return false;
        }
        
       
    }
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var options = {
    "key": "rzp_test_nKk4JONEA9dERd", // Enter the Key ID generated from the Dashboard
    //"amount": <?php echo $total_session_price*100;?>,
    "amount": <?php echo $total_session_price*100;?>,
    "currency": "INR",
    "description": "Shanta",
    "image": "example.com/image/rzp.jpg",
    "prefill":
    {
      "email": "<?php echo session()->get('user_email');?>",
      "contact":"<?php echo session()->get('user_phone');?>",
    },
    config: {
      display: {
        blocks: {
          utib: { //name for Axis block
            name: "Pay Using Axis Bank",
            instruments: [
              {
                method: "card",
                issuers: ["UTIB"]
              },
              {
                method: "netbanking",
                banks: ["UTIB"]
              },
            ]
          },
          other: { //  name for other block
            name: "Other Payment Methods",
            instruments: [
              {
                method: "card",
                issuers: ["ICIC"]
              },
              {
                method: 'netbanking',
              }
            ]
          }
        },
        hide: [
          {
          method: "upi"
          }
        ],
        sequence: ["block.utib", "block.other"],
        preferences: {
          show_default_blocks: false // Should Checkout show its default blocks?
        }
      }
    },
    "handler": function (response) {
      if(response.razorpay_payment_id){
          
           $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    var total_order_amount         =$("#total_order_amount").val();
    var appointment_type      =$("#appointment_type").val();
    var consultant_id =$("#consultant_id").val();
    var user_id =$("#user_id").val();
    
   /* if(category_id==""){
        toastr.error('Select Categroy', 'Error');
        return false;
    }
    if(subcategory_id==""){
        toastr.error('Select SubCategroy', 'Error');
        return false;
    }
    */

	
    $.ajax({
      type:'POST',
      url: "{{ route('save-invoice') }}",
      data:{
        _token:$('input[name=_token]').val(),
        total_order_amount:total_order_amount,
        appointment_type:appointment_type,
        consultant_id:consultant_id,
        user_id      :user_id
		
      },
      success:function(response){
		  if(response.status=='success'){
		      toastr.success(response.message);
		      alert(response.message);
		      window.location.href ="{{ route('home') }}";
		  }
       
          
        }

    }); 
      }
    },
    "modal": {
      "ondismiss": function () {
        if (confirm("Are you sure, you want to close the form?")) {
          txt = "You pressed OK!";
          console.log("Checkout form closed by the user");
        } else {
          txt = "You pressed Cancel!";
          console.log("Complete the Payment")
        }
      }
    }
  };
  var rzp1 = new Razorpay(options);
  document.getElementById('rzp-button1').onclick = function (e) {
    rzp1.open();
    e.preventDefault();
  }
</script>