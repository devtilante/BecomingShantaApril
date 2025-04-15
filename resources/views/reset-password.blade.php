@include('layouts.header')
    <!-- <custom-header></custom-header> -->
    <section class="page-banner">
         <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <a href="{{URL::to('/')}}" class="back-home"><i class="fas fa-arrow-left"></i> Back to home</a>
                    <h1>Reset Password</h1>
                    <p class="sm">* marked input fields are required</p>

                </div>
             </div>
         </div>
     </section>
      <section class="formSection p-50">
         <div class="container">
            <div class="row">
                 <div class="col-md-12">
                      <form action="{{route('forgot-password')}}" class="col-md-6 col-12 login-form" method="POST">
                          @csrf
                          <div class="d-flex flex-column">
                            <label for="emailinput">Email*</label>
                            <input
                              id="emailinput"
                              name="email"
                              type="email"
                              required
                              placeholder="Enter your email id"
                              class="form-control"
                            />
                          </div>
                          <div>
                            <!-- When Not Disable set this color " #3a554d " in resetpassbtn class  -->
                            <button type="submit" class="theme-btn">Reset Password</button>
                          </div>
                  
                          <div class="returnto"><a href="{{route('login')}}">Return to login</a></div>
                        </form>
                 </div>
            </div>
         </div> 
      </section>
    <!-- <custom-footer></custom-footer> -->

       <!-- start footer -->
       @include('layouts.footer')