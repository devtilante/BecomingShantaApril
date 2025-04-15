@include('layouts.header')

<?php
if(isset($_POST['myself_name'])){
                $myself_name=$_POST['myself_name'];
                session()->put('session_myself_name',$myself_name);
            }else{
               $myself_name=session()->get('session_myself_name');
            }
            
            if(isset($_POST['myself_email'])){
                $myself_email=$_POST['myself_email'];
                session()->put('session_myself_email',$myself_email);
            }else{
               $myself_email=session()->get('session_myself_email');
            }
            
            if(isset($_POST['myself_phone'])){
                $myself_phone=$_POST['myself_phone'];
                session()->put('session_myself_phone',$myself_phone);
            }else{
               $myself_phone=session()->get('session_myself_phone');
            }
            
            if(isset($_POST['someone_else_name'])){
                $someone_else_name=$_POST['someone_else_name'];
                session()->put('session_someone_else_name',$someone_else_name);
            }else{
               $someone_else_name=session()->get('session_someone_else_name');
            }
            
            if(isset($_POST['someone_else_relation'])){
                $someone_else_relation=$_POST['someone_else_relation'];
                session()->put('session_someone_else_relation',$someone_else_relation);
            }else{
               $someone_else_relation=session()->get('session_someone_else_relation');
            }
            
            if(isset($_POST['someone_else_email'])){
                $someone_else_email=$_POST['someone_else_email'];
                session()->put('session_someone_else_email',$someone_else_email);
            }else{
               $someone_else_email=session()->get('session_someone_else_email');
            }
            
            if(isset($_POST['consultant_id'])){
                $consultant_id=$_POST['consultant_id'];
                session()->put('session_consultant_id',$consultant_id);
            }else{
               $consultant_id=session()->get('session_consultant_id');
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
                    <li class="list-group-item">
                         <span>Client Information</span>
                         
                       </li>
                       <li class="list-group-item completed">
                         <span>Service</span>
                         
                       </li>
                       <li class="list-group-item ">
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
                    <!--<div class="note-box bg-blue">
                        <i class="fas fa-exclamation-circle"></i> <span>You can book your sessions either all at once or individually. To redeem your remaining sessions, simply log in and follow the standard checkout process.</span>
                    </div>-->
                    <form class="step-form step-form2  row" method="POST" action="{{route('book-step3')}}">
                        <input type="hidden" name="no_of_session" id="no_of_session" value="1">
                        <input type="hidden" name="session_price" id="session_price" value="5000">
                        <input type="hidden" name="session_id" id="session_id" >
                        <input type="hidden" name="hid_consultant_id" id="hid_consultant_id" value="<?php echo $consultant_id;?>">
                    @csrf
                        <div class="row">
                            <div class="col-md-8">
                               <div class="form-group">
                               <label for="exampleFormControlInput1">Category</label>
                                <select name="category_id" id="category_id" onchange="categorywise_subcategory(this.value)" class="form-select" aria-label="Default select example">
                                    <option value="" selected><i class="fa-solid fa-check"></i>Select</option>
                                   @if($category_list)
                                   @foreach($category_list as $category)
                                   <option value="{{$category->id}}">{{$category->category_name}}</option>
                                   @endforeach
                                   @endif
                                </select>
                             </div>
                             <div class="form-group">
                               <label for="exampleFormControlInput1">SubCategory</label>
                                <select name="subcategory_id" id="subcategory_id" onchange="get_sub_sub_category(this.value)" class="form-select" aria-label="Default select example">
                                   <option selected value=""><i class="fa-solid fa-check"></i> Select</option>
                                  
                                </select>
                             </div>
                             
                             <div class="form-group" id="sub-sub-category-sec" style="display:none;">
                               <label for="exampleFormControlInput1">Package</label>
                                <select name="sub_sub_category_id" id="sub_sub_category_id" onchange="get_consultant(this.value)" class="form-select" aria-label="Default select example">
                                   <option selected value=""><i class="fa-solid fa-check"></i> Select</option>
                                  
                                </select>
                             </div>
                             
                             <div class="form-group">
                               <label for="exampleFormControlInput1">Consultant</label>
                                <select class="form-select" name="consultant_id" id="consultant_id" onchange="get_session_details()" aria-label="Default select example">
                                   <option selected value=""><i class="fa-solid fa-check"></i> Select</option>
                                   
                                </select>
                             </div>
                             <div class="form-group ">
                               <label for="exampleFormControlInput1"><b>No. of Sessions</b></label>
                                 <ul class="donate-now noOfSession">
                                      <li>
                                        <input type="radio" id="1" name="amount" checked />
                                        <label for="1">1</label>
                                      </li>
                                      <!--<li>
                                        <input type="radio" id="2" name="amount" />
                                        <label for="2">2</label>
                                      </li>
                                      <li>
                                        <input type="radio" id="3" name="amount" checked="checked" />
                                        <label for="3">3</label>
                                      </li>
                                      <li>
                                        <input type="radio" id="4" name="amount" />
                                        <label for="4">4</label>
                                      </li>-->
                                    </ul>
                             </div>
                             <div class="price-box">
                                 <div class="row">
                                     <div class="col-md-6">
                                        <ul>
                                           <li>
                                              <p class="label">Price</p>
                                              <p class="input sessionPrice">INR 5000</p>
                                              <p class="sm">plus taxes</p>
                                           </li>
                                           <li>
                                              <p class="label">Free Sessions</p>
                                              <p class="input freeSession"></p>
                                           </li>
                                        </ul>
                                     </div>
                                     <div class="col-md-6">
                                        <ul>
                                           <li>
                                              <p class="label">Validity</p>
                                              <p class="input valiDity"></p>
                                           </li>
                                           <li>
                                              <p class="label">Allowed Reschedules</p>
                                              <p class="input allowedReschedules"></p>
                                           </li>
                                        </ul>
                                     </div>
                                 </div>
                             </div>
                            </div>
                          </div>
                          <div class="form-btns">
                              
                              <button href="javascript:void(0)" type="button" onclick="cancel_process()" class="theme-btn mr-2">
                              Cancel
                              </button>
                              <a  href="{{route('book-step1')}}?consultant_id=<?php echo $consultant_id;?>" class="theme-btn mr-2">Previous</a>
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
  
  
  function categorywise_subcategory(category_id){
      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
	var subcategory_id=$("#subcategory_id");
	$("#sub-sub-category-sec").hide();
    $.ajax({
      type:'POST',
      url: "{{ route('category-wise-subcategory') }}",
      data:{
        _token:$('input[name=_token]').val(),
        category_id:category_id
		
      },
      success:function(response){
		  console.log(response); 
          // var jsonData=JSON.parse(response);
          $('option', subcategory_id).remove();
          $('#subcategory_id').append('<option value="">{{ __("select") }}</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.subcategory_name
            }).appendTo('#subcategory_id');
          });
        }

    });
  }
  
  
  function get_sub_sub_category(sub_category_id){
      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
	var category_id=$("#category_id").val();
	var sub_sub_category_id=$("#sub_sub_category_id");
	$("#sub-sub-category-sec").hide();
    $.ajax({
      type:'POST',
      url: "{{ route('category-wise-subsubcategory') }}",
      data:{
        _token:$('input[name=_token]').val(),
        category_id:category_id,
        sub_category_id:sub_category_id
		
      },
      success:function(response){
		  console.log(response); 
          // var jsonData=JSON.parse(response);
          $('option', sub_sub_category_id).remove();
          $('#sub_sub_category_id').append('<option value="">{{ __("select") }}</option>');
         if(response.length>0){
          $.each(response, function(){
             
                $('<option/>', {
                  'value': this.id,
                  'text': this.sub_sub_category_name
                }).appendTo('#sub_sub_category_id');
                $("#sub-sub-category-sec").show();
              });
          }else{
              get_consultant();
          }
        }

    });
  }
  
  
  
  
  function get_consultant(sub_sub_category_id=null){
       $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    var category_id    =$("#category_id").val();
    var sub_category_id=$("#subcategory_id").val(); 
    
    if(category_id==""){
        toastr.error('Select Categroy', 'Error');
        return false;
    }
    
    var hid_consultant_id =$("#hid_consultant_id").val();
    

	var consultant_id=$("#consultant_id");
    $.ajax({
      type:'POST',
      url: "{{ route('get-consultant') }}",
      data:{
        _token:$('input[name=_token]').val(),
        category_id:category_id,
        subcategory_id:sub_category_id,
        sub_sub_category_id:sub_sub_category_id
		
      },
      success:function(response){
		  console.log(response); 
          // var jsonData=JSON.parse(response);
          $('option', consultant_id).remove();
          $('#consultant_id').append('<option value="">{{ __("select") }}</option>');
          $.each(response, function(){
              
              if(hid_consultant_id==this.id){
            $('<option/>', {
              'value': this.id,
              'text': this.name
            }).appendTo('#consultant_id');
              }
          });
        }

    });
  }
  
  function get_session_details(){
     
      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    var category_id         =$("#category_id").val();
    var subcategory_id      =$("#subcategory_id").val();
    var sub_sub_category_id =$("#sub_sub_category_id").val();
    
    if(category_id==""){
        toastr.error('Select Categroy', 'Error');
        return false;
    }
    if(subcategory_id==""){
        toastr.error('Select SubCategroy', 'Error');
        return false;
    }

	
    $.ajax({
      type:'POST',
      url: "{{ route('get-session-details') }}",
      data:{
        _token:$('input[name=_token]').val(),
        category_id:category_id,
        subcategory_id:subcategory_id,
        sub_sub_category_id:sub_sub_category_id
		
      },
      success:function(response){
		  console.log(response); 
          // var jsonData=JSON.parse(response);
          var sessionHtml="";
          var sessionBtnHtml="";
          
           $.each(response, function(){
               
                                   sessionHtml+='<label for="exampleFormControlInput1"><b>No. of Sessions</b></label>';
                                   sessionHtml+='<div>';
                                   sessionHtml+='<input type="radio" id="'+this.session_name+'" class="btn_choose_sent bg_btn_chose_1 " placeholder="1" name="contact" value="'+this.session_name+'" onclick="assign_no_of_session('+this.session_name+')" /><label for="'+this.session_name+'"><b>'+this.session_name+'</b></label>';

                                   sessionHtml+='</div>';  
                                   
                                   
                                  // sessionBtnHtml+='<input type="radio" id="'+this.session_name+'" class="btn_choose_sent bg_btn_chose_1 active" placeholder="2" name="contact" value="'+this.session_name+'" onclick="assign_no_of_session('+this.session_name+')" /><label for="'+this.session_name+'"><b>'+this.session_name+'</b></label>';
                                  
                                  sessionBtnHtml+='<li>';
                                        sessionBtnHtml+='<input type="radio" id="1" onclick="assign_no_of_session('+this.session_name+','+this.session_price+',\'' + this.validity + '\','+this.free_session+','+this.allowed_reschedules+','+this.session_id+')" name="amount" />';
                                        sessionBtnHtml+='<label for="1">'+this.session_name+'</label>';
                                      sessionBtnHtml+='</li>';
                                  
                                  
                               
           $('.noOfSession').html(sessionBtnHtml);
            $('.valiDity').html(this.validity);
            $('.freeSession').html(this.free_session);
            $('.allowedReschedules').html(this.allowed_reschedules);
           //$('.sessionPrice').html(this.session_price);
           
           
           //$("#no_of_session").val(this.session_name);
          // $("#session_price").val(this.session_price);
           
          });
          
        }

    }); 
    
    
      
  }
  
  function assign_no_of_session(NoOfSession,sessionPrice,validity,free_session,allowed_resechedule,session_id){
        
       
        $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    var category_id         =$("#category_id").val();
    var subcategory_id      =$("#subcategory_id").val();
    var sub_sub_category_id =$("#sub_sub_category_id").val();
    
    if(category_id==""){
        toastr.error('Select Categroy', 'Error');
        return false;
    }
    if(subcategory_id==""){
        toastr.error('Select SubCategroy', 'Error');
        return false;
    }
       
       
        $.ajax({
      type:'POST',
      url: "{{ route('get-session-price') }}",
      data:{
        _token:$('input[name=_token]').val(),
        category_id:category_id,
        subcategory_id:subcategory_id,
        sub_sub_category_id:sub_sub_category_id,
        session_id:session_id
		
      },
      success:function(response){
		  console.log(response); 
          // var jsonData=JSON.parse(response);
          var sessionHtml="";
          var sessionBtnHtml="";
          
           $.each(response, function(){
               
           $("#no_of_session").val(NoOfSession);
           $("#session_price").val(this.session_price);
           $("#session_id").val(session_id);
           $(".sessionPrice").html("INR "+this.session_price);
        
         $('.valiDity').html(this.validity);
            $('.freeSession').html(this.validity);
            $('.allowedReschedules').html(this.allowed_reschedules);
          });
          
        }

    }); 
        
        
    }
    
    
</script>
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