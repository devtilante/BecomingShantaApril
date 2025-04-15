@include('layouts.header')
		<section class="page-banner">
         <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <a href="{{URL::to('/')}}" class="back-home"><i class="fas fa-arrow-left"></i> Back to home</a>
                    <h1>Login</h1>
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
							<form name="login_form" id="login_form" method="POST" class=" login-form">
				            @csrf
								<div class="d-flex flex-column">
									<label for="emailinput">Email*</label>
									<input
										id="emailinput"
										name="emailinput"
										type="email"
										
										placeholder="Enter your email id"
										class="form-control"
									/>
				               <p class="alertText" id="emailErr" style="color:red;display:none"></p>
								</div>
								<div class="d-flex flex-column">
									<div class="d-flex justify-content-between align-items-center">
										<label for="passwordInp">Password*</label>
										
									</div>
									<div style="position: relative">
										<input
											id="passwordInp"
											name="passwordInp"
											type="password"
											
											placeholder="Enter your password"
											class="form-control"
										/>
					                  <p class="alertText" id="passwordErr" style="color:red;display:none"></p>
					                  
									  <div class="showPassword"><span class="fa fa-eye togglePassword2" ></span> 
							            <!-- <span class="fa fa-lock togglePassword"></span> -->
							            <!-- <button >Show</button> -->
							          </div></div>
							          <a href="{{route('reset-password')}}" class="forgotpassbtn">Forgot Password?</a>
								</div>
								<div>
									<button type="button" class="theme-btn w-100" id="loginBtn">Login</button>
								</div>

								<div class="returnto d-flex justify-content-center">
									<span class="me-3">New User? </span
									><a class="registerHere" href="{{route('register')}}"> Click to Register</a>
								</div>
								</div>
								
							</form>
          		</div>
          	</div>
          </div>
		</section>

		<!-- start footer -->
      @include('layouts.footer')
