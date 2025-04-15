@include('layouts.header')
<style>
    .calendar-week-day{
        display:none;
    }
</style>
<!-- start inner banner -->
<?php //echo "<pre>"; print_r($_POST); exit; ?>

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
            
            if(isset($_GET['appointment_type'])){
                $appointment_type=$_GET['appointment_type'];
            }else{
                $appointment_type=1;
            }
            session()->put('session_appointment_type',$appointment_type);
            
            if(isset($_POST['no_of_session'])){
                $no_of_session=$_POST['no_of_session'];
                session()->put('session_no_of_session',$no_of_session);
            }else{
               $no_of_session=session()->get('session_no_of_session');
               session()->put('session_no_of_session',$no_of_session);
            }
            
            if(isset($_POST['session_id'])){
                $session_id=$_POST['session_id'];
                session()->put('session_id',$session_id);
            }else{
               $session_id=session()->get('session_id');
               session()->put('session_id',$session_id);
            }
            
            if(isset($_POST['category_id']) && $_POST['category_id']!=""){
                $category_id=$_POST['category_id'];
                $categoryDetails=DB::table('category')->where('id',$category_id)->first();
                session()->put('session_category_name',$categoryDetails->category_name);
                session()->put('session_category_id',$category_id);
            }
            
            if(isset($_POST['subcategory_id']) && $_POST['subcategory_id']!=""){
                $subcategory_id=$_POST['subcategory_id'];
                $subcategoryDetails=DB::table('subcategory')->where('id',$subcategory_id)->first();
                session()->put('session_sub_category_name',$subcategoryDetails->subcategory_name);
                session()->put('session_sub_category_id',$subcategory_id);
            }
            
            if(isset($_POST['sub_sub_category_id']) && $_POST['sub_sub_category_id']!=""){
                $sub_sub_category_id=$_POST['sub_sub_category_id'];
                $subsubcategoryDetails=DB::table('sub_sub_category')->where('id',$sub_sub_category_id)->first();
                session()->put('session_sub_sub_category_name',$subsubcategoryDetails->sub_sub_category_name);
            }
            
            if(!empty($consultant_id) && $consultant_id!=""){
                
                $consultantDetails=DB::table('consultants')->where('id',$consultant_id)->first();
                session()->put('session_consultant_name',$consultantDetails->name);
                session()->put('session_consultant_designation',$consultantDetails->designation);
            }
            
            
            $timestamp = strtotime($date);
            $day = date('l', $timestamp);
            
           
            $consultantSlotArr=DB::table('assign_sloat AS as')
                               ->select('as.*','sm.sloat_name')
                               ->leftjoin('sloat_master AS sm','sm.id','as.sloat_id')
                               ->where('as.consultant_id',$consultant_id)->where('as.day',$day)->where('as.is_online',$appointment_type)->get();
                               
            DB::table('appointment_book_cart')->where('user_id',session()->get('user_id'))->where('consultant_id',$consultant_id)->where('date',$date)->delete();                   

?>

<!-- <section class="page-banner">
         <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <a href="" class="back-home"><i class="fas fa-arrow-left"></i> Back to home</a>
                    <h1>Let's book your consultation</h1>
                    <p class="sm">* marked input fields are required</p>

                </div>
             </div>
         </div>
     </section> -->
  
  <!-- start booking step -->

    <section class="booking-step">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   <ul class="list-group vertical-steps">
                       <li class="list-group-item ">
                         <span>Client Information</span>
                         
                       </li>
                         <li class="list-group-item ">
                         <span>Service</span>
                       </li>
                        <li class="list-group-item completed">
                          <span>Date, Time & Location</span>
                        </li>
                       <li class="list-group-item">
                         <span>Review & Confirm</span>
                         </li>
                         <li class="list-group-item">
                         <span>Payment</span>
                         
                       </li>
                       
                     </ul>  
                </div>
                <div class="col-md-9">
                    
                    <!--<div class="note-box">
                        <i class="fas fa-exclamation-circle"></i> <span>Please note: Your therapist is available for consultation after Jan 2025. However, you can go ahead and book your sessions now.</span>
                    </div>-->
                    <form class="step-form small-form" method="POST" action="{{route('book-step4')}}">
                        <input type="hidden" name="consultant_id" id="consultant_id" value="{{$consultant_id}}">
                        <input type="hidden" name="booking_date" id="booking_date" value="{{$date}}">
                        <input type="hidden" name="last_added_slot" id="last_added_slot" value="">
                        <input type="hidden" name="appointment_type" id="appointment_type" value="<?php  if(isset($_GET['appointment_type']) && $_GET['appointment_type']!="") { echo $_GET['appointment_type'];}else echo '0';?>">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3 mb-20">
                                    <label for="exampleFormControlInput1">Session No</label>
                                    
                                    <input type="text"  class="form-control" readonly  placeholder="No Of Session" id="no_of_session" name="no_of_session" value="<?php echo $no_of_session; ?>">
                                     <!--<select class="form-select" aria-label="Default select example">
                                        <option selected>1</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                     </select>-->
                              </div>
                              <div class="form-group col-md-3 mb-20">
                                <label for="exampleFormControlInput1">Appointment Type</label>
                                 <select style="border: 1px solid #707070;border-radius: 60px;padding: 9px 24px;width: 100%;" id="appointment_type" name="appointment_type" onchange="fetch_type_wise_appointment(this.value)">
                                    <option selected value="1" <?php if(isset($_GET['appointment_type']) && $_GET['appointment_type']=='1') echo "selected"; ?>> Online</option>
                                    <option value="0" <?php if(isset($_GET['appointment_type']) && $_GET['appointment_type']=='0') echo "selected"; ?>>Offline</option>
                                 </select>
                              </div>
                               
                              <?php if(isset($_GET['appointment_type']) && $_GET['appointment_type']==0) { ?>
                              
                              <div class="form-group col-md-3 mb-20">
                                <label for="exampleFormControlInput1">Location Type</label>
                                 <select style="border: 1px solid #707070;border-radius: 60px;padding: 9px 24px;width: 100%;" id="location_type" name="location_type" onchange="get_type_wise_location(this.value)">
                                    <option value=""> Select</option>
                                    <option value="CX"> CX</option>
                                    <option value="IN">IN</option>
                                 </select>
                              </div>
                              
                              <div class="form-group col-md-3 mb-20" id="location-sec">
                                <label for="exampleFormControlInput1">Location</label>
                                 <select  style="border: 1px solid #707070;border-radius: 60px;padding: 9px 24px;width: 100%;" id="location_id" name="location_id" >
                                    <option  value="" > Select Location</option>
                                    <!--@if($location_list)
                                     @foreach($location_list as $location)
                                        <option value="<?php echo $location->location_code;?>" ><?php echo $location->location_code;?></option>
                                     @endforeach;    
                                    @endif-->
                                 </select>
                              </div>
                              <?php } ?>
                          </div>
                           <div class="calender row">
                               <div class="col-md-9 col-xl-7">
                                  <div class="calendar">
                                      <div class="calendar-header">
                                         <!--<span class="year-change" id="prev-year">
                                                  <pre><</pre>
                                          </span>
                                          <span class="month-picker" id="month-picker">February</span>
                                          <div class="year-picker">
                                              <span id="year">2021</span>
                                          </div>
                                          <span class="year-change" id="next-year">
                                                  <pre>></pre>
                                              </span>-->
                                              <div id="datepicker"></div>
                                              <!--<p id="selectedDate">Selected Date: </p>-->
                                      </div>
                                      <div class="calendar-body">
                                          <div class="calendar-week-day">
                                              <div>Sun</div>
                                              <div>Mon</div>
                                              <div>Tue</div>
                                              <div>Wed</div>
                                              <div>Thu</div>
                                              <div>Fri</div>
                                              <div>Sat</div>
                                          </div>
                                          <div class="calendar-days"></div>
                                      </div>
                                      <div class="month-list"></div>
                                  </div>
                               </div>
                               <div class="col-md-3 col-xl-5">
                                    <h4>Availability on <?php echo date("D, M d, Y", strtotime($date));?></h4>
                                    <ul class="time-table">
                                        @if($consultantSlotArr)
                                        @foreach($consultantSlotArr as $sloat)
                                        <?php
                                        $slotstatus="";
                                        $slotExists=DB::table('appointment_invoice_details')->where('date',$date)->where('slot_id',$sloat->sloat_id)->exists();
                                        if($slotExists){
                                          $slotstatus="booked";  
                                        }
                                        if($slotstatus=='booked'){
                                        ?>
                                        <li><a href="javascript:void(0)" style="background-color:red;color:white;" class="">{{$sloat->sloat_name}}</a></li>
                                        <?php } else {?>
                                        <li><a href="javascript:void(0)" class="AddSloatCls" id="add-sloat-cls-{{$sloat->sloat_id}}" data-id="{{$sloat->sloat_id}}">{{$sloat->sloat_name}}</a></li>
                                        <?php } ?>
                                        @endforeach
                                        @endif
                                       <!--<li><a href="" class="disabled">5:00 AM</a></li>
                                       <li><a href="" class="">12:00 PM</a></li>
                                       <li><a href="" class="">7:00 PM</a></li>
                                       <li><a href="" class="disabled">6:00 PM</a></li>
                                       <li><a href="" class="">1:00 PM</a></li>
                                       <li><a href="" class="">8:00 PM</a></li>
                                       <li><a href="" class="">7:00 PM</a></li>
                                       <li><a href="" class="">2:00 PM</a></li>
                                       <li><a href="" class="">9:00 PM</a></li>
                                       <li><a href="" class="">8:00 AM</a></li>
                                       <li><a href="" class="active">3:00 PM</a></li>
                                       <li><a href="" class="">10:00 PM</a></li>
                                       <li><a href="" class="">9:00 AM</a></li>
                                       <li><a href="" class="">4:00 PM</a></li>
                                       <li><a href="" class="">11:00 PM</a></li>
                                       <li><a href="" class="">10:00 AM</a></li>
                                       <li><a href="" class="">5:00 PM</a></li>
                                       <li><a href="" class="">11:00 PM</a></li>
                                       <li><a href="" class="">6:00 PM</a></li>-->
                                    </ul>
                               </div>
                           </div>
                           <div class="session row sloat-list">
                               <!--<div class="col-md-4">
                                  <p>Session 1</p>
                                  <p class="date">July 31 2024, 3:00PM </p>
                               </div>
                               <div class="col-md-4">
                                  <p>Session 2</p>
                               </div>
                               <div class="col-md-4">
                                  <p>Session 3</p>
                               </div>
                               <div class="col-md-4">
                                  <p>Session 4</p>
                               </div>
                               <div class="col-md-4">
                                  <p>Session 5</p>
                               </div>
                               <div class="col-md-4">
                                  <p>Session 6</p>
                               </div>-->
                           </div>
                             <div class="form-btns">
                                 
                                 <button href="javascript:void(0)" type="button" onclick="cancel_process()" class="theme-btn mr-2">
                                 Cancel
                                 </button>
                                 <a  href="{{route('book-step2')}}" class="theme-btn mr-2">Previous</a>
                                 <button href="" class="white-btn">
                                  Next
                                 </button>
                              </div>
                       </form>
                </div>
            </div>
        </div>
    </section>
@include('layouts.footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function () {
        let defaultDate = "<?php echo $date; ?>";
        let appointment_type=$("#appointment_type").val();
        $("#datepicker").datepicker({
            inline: true,
            minDate: 0,
            dateFormat: "yy-mm-dd",
            defaultDate: defaultDate,
            onSelect: function(dateText, inst) {
                    // Display the selected date
                    //$("#selectedDate").text("Selected Date: " + dateText);
                    window.location.href="book-step3?date="+dateText+'&appointment_type='+appointment_type;
                }
        }).datepicker("setDate", defaultDate);
        
        var noOfsession=$("#no_of_session").val();
        var Count=0;
        $(".AddSloatCls").on('click',function(){
            
            var sloat_id =$(this).data("id");
            var consultant_id =$("#consultant_id").val();
            var booking_date  =$("#booking_date").val();
            
            $("#last_added_slot").val(sloat_id);
           
               
             $.ajax({
                type:'POST',
                url: "{{route('add-to-cart')}}",
                data:{
                    _token:$('input[name=_token]').val(),
                    sloat_id:sloat_id,
                    consultant_id:consultant_id,
                    booking_date:booking_date
                    
                },
                success:function(response){
                    
                    if(response.status=='success' && Count<=noOfsession){
                       
                        Count++;
                       
                       
                    }
                    
                 var Content="";
                 if(response.status=='success'){
                 if(response.cart_list.length>0){
                     for(var i=0;i<response.cart_list.length;i++){
                         
                         Content+='<div class="row" id="cart-'+sloat_id+'">'
                         Content+='<div class="col-md-4">';
                                      Content+='<p>Date</p>';
                                      Content+='<p class="date">'+response.cart_list[i].date+' </p>';
                                      Content+='</div>';
                                      Content+='<div class="col-md-4">';
                                      Content+='<p>'+response.cart_list[i].sloat_name+'</p>';
                                      Content+='</div>';
                                      Content+='<div class="col-md-4">';
                                      Content+='<p>'+response.cart_list[i].name+'</p>';
                                      Content+='</div>';
                                      Content+'</div>';
                                   
                         }
                     }
                     
                     if(Count<=noOfsession){
                        $(".sloat-list").html(Content);
                        $("#add-sloat-cls-"+sloat_id).addClass("active");
                        toastr.success('Slot Added To Cart', 'Success');
                     }
                     else{
                       toastr.error('Session Limit exceeded', 'Error');
                       return false;
                     }
                 
                 }else{
                     if(response.message=='Slot is Deleted'){
                         Count--;
                         $("#cart-"+sloat_id).hide();
                     }
                     
                     toastr.error(response.message, 'Error');
                     return false;
                 }
                 
                 
                 //$(".sloat-list").html(Content);
                   
                   
                   
                    
                    
                    
                    
                    },
		error: function (addToCartErrors) {
			console.log(addToCartErrors);
		},

                });
            
            
            
        })
        
    });
    
    function fetch_type_wise_appointment(appointmentType){
         var selectedDate=$("#datepicker").val();
        window.location.href="book-step3?date="+selectedDate+'&appointment_type='+appointmentType;
    }
    
    function cancel_process(){
        
        let userConfirmed = confirm("Are you sure you want to proceed for cancel?");
        if (userConfirmed) {
            window.location.href="{{route('home')}}"; 
        } else {
            return false;
        }
        
       
    }
    
    function get_type_wise_location(type){
        
      var location_id=$("#location_id");
        $.ajax({
                type:'POST',
                url: "{{route('get-type-wise-location')}}",
                data:{
                    _token:$('input[name=_token]').val(),
                    type:type
                },
                success:function(response){
                   console.log(response);
                   $('option', location_id).remove();
          $('#location_id').append('<option value="">{{ __("select") }}</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.location_code,
              'text': this.location_code
            }).appendTo('#location_id');
          });
                
                    },
		error: function (addToCartErrors) {
			console.log(addToCartErrors);
		},

                });
    }
</script>