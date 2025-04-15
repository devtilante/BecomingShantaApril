@include('layouts.header')
<section class="page-banner">
         <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <a href="{{URL::to('/')}}" class="back-home"><i class="fas fa-arrow-left"></i> Back to home</a>
                    <h1>Let's book your consultation</h1>
                    <p class="sm">* marked input fields are required</p>

                </div>
             </div>
         </div>
     </section>
  
  <!-- start booking step -->

    <section class="booking-step">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   <ul class="list-group vertical-steps">
                     <li class="list-group-item completed">
                         <span>Client information</span>     
                        </li>
                       <li class="list-group-item">
                         <span>Service</span>
                       </li>
                       <li class="list-group-item">
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
                    <form class="step-form step-form3" method="POST" action="{{route('book-step2')}}">
                        <input type="hidden" name="myself_name" id="myself_name" value="{{session()->get('name')}}">
                        <input type="hidden" name="myself_email" id="myself_email" value="{{session()->get('user_email')}}">
                        <input type="hidden" name="myself_phone" id="myself_phone" value="{{session()->get('user_phone')}}">
                        <input type="hidden" name="consultant_id" id="consultant_id" value="<?php echo $_GET['consultant_id'];?>">
                    @csrf
                          <div class="header-form">
                             <h4 class="mb-4">Who is this appointment for?</h4>
                               <div class="form__group d-flex gap-4">
                                  <div class="form__radio-group">
                                    <input id="small" type="radio" onclick="show_myself()" class="form__radio-input" name="size" />
                                    <label for="small" class="form__radio-label">
                                      <span class="form__radio-button"></span>
                                      <span class="form__radio-label-text">Myself<span></label>
                                  </div>

                                  <div class="form__radio-group">
                                    <input id="large" type="radio" onclick="show_someone_else()" class="form__radio-input" name="size" />
                                    <label for="large" class="form__radio-label">
                                      <span class="form__radio-button"></span>
                                      <span class="form__radio-label-text">Someone Else<span></label>
                                  </div>
                                </div>
                          </div>
                           <div class="session row" id="my-self" style="display:block">
                               <div class="col-md-4">
                                  <h4>{{session()->get('name')}}</h4>
                                  <p class="">{{session()->get('user_email')}} </p>
                                  <p>{{session()->get('user_phone')}}</p>
                               </div>
        
                           </div>
                           <div class="row mt-4" id="some-one-else" style="display:none">
                              <div class=" col-md-8">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1">Full Name*</label>
                                      <input type="text" name="someone_else_name" id="someone_else_name" class="form-control" placeholder="Parimala Raheja">
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlInput1">Relationship*</label>
                                      <input type="text" name="someone_else_relation" id="someone_else_relation" class="form-control"  placeholder="Mother">
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleFormControlInput1">Email ID*</label>
                                      <input type="text" name="someone_else_email" id="someone_else_email" class="form-control" placeholder="parimala_r@gmail.com">
                                   </div>
                                   
                             </div>
                           </div>
                          <div class="form-btns">
                              <button href="javascript:void(0)" type="button" onclick="cancel_process()" class="theme-btn mr-2">
                              Cancel
                              </button>
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
<script>
    function cancel_process(){
        
        let userConfirmed = confirm("Are you sure you want to proceed for cancel?");
    
    // Check if the user clicked "OK"
    if (userConfirmed) {
        window.location.href="{{route('home')}}"; 
    } else {
        return false;
    }
        
       
    }
</script>