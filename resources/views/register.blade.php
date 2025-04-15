@include('layouts.header')
    <!-- <custom-header></custom-header> -->
    <section class="page-banner">
         <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <a href="{{URL::to('/')}}" class="back-home"><i class="fas fa-arrow-left"></i> Back to home</a>
                    <h1>Register to get started</h1>
                    <p class="sm">* marked input fields are required</p>

                </div>
             </div>
         </div>
     </section>
    <section class="formSection p-50">
       <div class="container">
            <div class="row">
               <div class="col-md-7">
                 <p class="alertText" id="Errmsg" style="color:red;display:none-text-align:center;font-size:20px;"></p>
                    <p class="alertText" id="Sucmsg" style="color:green;display:none-text-align:center;font-size:20px;"></p>
                      <form name="reg_form" id="reg_form" class="login-form" method="POST">
                      @csrf
                        <div class="d-flex flex-column">
                          <label for="fullname">Full Name*</label>
                          <input
                            id="fullname"
                            name="fullname"
                            type="text"
                            required
                            placeholder="Enter your full name"
                            class="form-control"
                          />
                          <p class="alertText" id="fullnameErr" style="color:red;display:none"></p>
                        </div>
                        <div class="d-flex flex-column">
                          <label for="emailinput">Email*</label>
                          <input
                            id="emailinput"
                            name="emailinput"
                            type="email"
                            required
                            placeholder="Enter your email id this  will be your login credential"
                            class="form-control"
                          />
                          <p class="alertText" id="emailErr" style="color:red;display:none"></p>
                        </div>

                        <div class="Phone-d d-flex justify-content-between">
                          <div class="col-lg-7 col-md-7 col-sm-12 col-12 d-flex flex-column">
                            <label for="phonenumber">Phone Number*</label>
                             <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number" name="name">
                            <p class="alertText" id="phoneErr" style="color:red;display:none"></p>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-12 col-12 d-flex flex-column" id="Phone_Number-1">
                            <label for="dob">Date of Birth*</label>
                            <input
                              id="dob"
                              name="dob"
                              type="text"
                              required placeholder="dd/mm/yyyy" max=""
                              class="form-control"
                            />
                            <p class="alertText" id="dobErr" style="color:red;display:none"></p>
                          </div>
                        </div>

                        <div class="d-flex flex-column">
                          <div class="d-flex justify-content-between align-items-center">
                            <label for="emailinput">Password*</label>
                            <!-- <a href="resetpass.html" class="forgotpassbtn">Forgot Password?</a> -->
                          </div>
                          <div style="position: relative">
                            <input
                             
                              id="pass_word"
                              name="pass_word"
                              type="password"
                              
                              placeholder="Enter your password"
                              class="form-control"
                            />
                            <p class="alertText" id="passwordErr" style="color:red;display:none"></p>

                            <div class="showPassword"><span class="fa fa-eye togglePassword" ></span> 
                            <!-- <span class="fa fa-lock togglePassword"></span> -->
                            <!-- <button >Show</button> -->
                          </div>
                          </div>
                        </div>
                        
                        <div class="d-flex flex-column">
                          <div class="d-flex justify-content-between align-items-center">
                            <label for="emailinput">Confirm Password*</label>
                            <!-- <a href="resetpass.html" class="forgotpassbtn">Forgot Password?</a> -->
                          </div>
                          <div style="position: relative">
                            <input
                             
                              id="confirm_password"
                              name="confirm_password"
                              type="password"
                              
                              placeholder="ReEnter your password"
                              class="form-control"
                            />
                            <p class="alertText" id="ConpasswordErr" style="color:red;display:none"></p>

                            <div class="showPassword"><span class="fa fa-eye togglePassword" ></span> 
                            <!-- <span class="fa fa-lock togglePassword"></span> -->
                            <!-- <button >Show</button> -->
                          </div>
                          </div>
                        </div>
                        
                        <div class="Phone-d d-flex justify-content-between">
                          <div class="col-lg-7 col-md-7 col-sm-12 col-12 d-flex flex-column">
                            <label for="phonenumber">Communication Method*</label>
                                <select  class="form-select" name="communication_method" id="communication_method">
                                <option value="">Select</option>
                                 <option value="Email">Email</option>
                                 <option value="Whatsapp">Whatsapp</option>
                                 <option value="Phone Call">Phone Call</option>
                                 </select>
                            <p class="alertText" id="communicationErr" style="color:red;display:none"></p>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-12 col-12 d-flex flex-column" id="Phone_Number-1">
                            <label for="dob">Registering on Behalf of *</label>
                            <select  class="form-select" name="registering_behalf" id="registering_behalf">
                                 <option value="">Select</option>
                                 <option value="Myself">Myself</option>
                                 <option value="Parents">Parents</option>
                                 <option value="In Laws">In Laws</option>
                                 <option value="Friends">Friends</option>
                                 <option value="Friends">Others</option>
                                 </select>
                            <p class="alertText" id="registeringErr" style="color:red;display:none"></p>
                          </div>
                        </div>
                        
                        <div
                          class="acceptpart d-flex justify-content-center align-items-center mb-4"
                        >
                          <input type="checkbox" id="agree" name="agree" />
                          
                          <label id="agreeLabel" class="agreeInput" for="agree">
                          
                            <div></div
                          ></label>
                          

                          <p class="mb-0">
                            Accept <a href="{{route('terms-condition')}}">Terms of Service </a>
                            
                          </p>
                          
                        </div>
                        <p class="alertText" id="agreeErr" style="color:red;display:none"></p>
                        <div>
                          <button type="button" class="theme-btn w-100" id="RegBtn">Register</button>
                        </div>

                        <div class="returnto d-flex justify-content-center">
                          <span class="me-3">Existing User? </span
                          ><a class="registerHere" href="{{route('login')}}"> Login</a>
                        </div>
                      </form>
               </div>
            </div>
       </div>
    </section>

    <!-- <custom-footer></custom-footer> -->

       <!-- start footer -->
       @include('layouts.footer')