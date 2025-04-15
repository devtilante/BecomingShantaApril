@include('layouts.header')
<section class="page-banner">
         <div class="container">
             <div class="row">
                <div class="col-md-4">
                   <div class="profile-img">
                       <img src="{{asset('images/consultant')}}/{{$single_consultant->photo}}">
                   </div>
                </div>
                <div class="col-md-5">
                    <h1>{{$single_consultant->name}}</h1>
                    <h4>{{$single_consultant->designation}}</h4>
                    <p>With a decade in mental health ​and entrepreneurship, she bridges ​the gap between the present and ​the ideal self.</p>
                     <div class="banner-btns">
                        <a href="{{route('book-step1')}}?consultant_id=<?php echo $_GET['id'];?>" class="theme-btn mr-2">
                        Book a Consultation
                        </a>
                        <a href="" class="white-btn">
                        Share Profile
                        </a>
                     </div>
                </div>
                <div class="col-md-3">
                    <ul class="profile-detail">
                       <li>
                           <h3> 10 years</h3>
                           <p>As a Therapist</p>
                       </li>
                       <li>
                           <h3>5+ organisations</h3>
                           <p>Co-founded</p>
                       </li>
                    </ul>
                </div>
             </div>
         </div>
     </section>

  <!-- start about profile -->
      <section class="about-profile p-50">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                     <div class="section-title">
                              <h1>About Me</h1>
                     </div>
                  </div>
                   <div class="col-md-8 col-12">
                        {!! $single_consultant->about_me !!}
                   </div>
                   <div class="col-md-4 col-12 p-80">
                       <h4>Neurodivergent friendly</h4>
                       <h4> Kink & Polyamory friendly</h4>
                       <h4>POC Culturally Sensitive</h4>
                   </div>
              </div>
          </div>
      </section>

      <!-- start specialities -->

       <section class="specialities">
           <div class="container">
               <div class="row">
                  <div class="col-md-6 ">
                   <div class="Specialisations-item">
                       <div class="section-title">
                          <h1>Specialisations</h1>
                       </div>
                       <div class="row">
                          <div class="col-md-6 col-6">
                             <ul>
                                <li>Existential Questions</li>
                                <li>Personality Disorders</li>
                                <li>Addiction & ​Substances</li>
                             </ul>
                          </div>
                          <div class="col-md-6 col-6">
                             <ul>
                                <li>Queer Community</li>
                                <li>Co-founders & Executives</li>
                                <li>Relationship Struggles</li>
                             </ul>
                          </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 ">
                   <div class="Specialisations-item pl-60">
                       <div class="section-title">
                          <h1>Therapy Approach</h1>
                       </div>
                        <ul>
                                <li>Lorem ipsum dolor</li>
                                <li>Lorem ipsum dolor</li>
                                <li>Lorem ipsum dolor</li>
                             </ul>
                   </div>
               </div>
               </div>
           </div>
       </section>

        <!-- start testimonial -->
      <section class="testimonial text-center p-50 pb-100 ">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div class="section-title">
                     <h1>What our clients have to say</h1>
                  </div>
                  <div id="carouselExampleIndicators" class="carousel slide">
                     <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                     </div>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="testimonial-content">
                              <p>Lorem ipsum dolor sit amet consectetur. Luctus convallis quam massa condimentum. Mauris urna mauris pretium gravida. At ipsum gravida donec sapien rhoncus at posuere ornare nisl. Feugiat venenatis senectus congue donec massa. Aenean et risus pulvinar platea. Malesuada tellus bibendum diam commodo urna enim arcu. Vivamus nibh faucibus id gravida sed eget cursus. Dolor vel luctus aliquet dignissim a pellentesque. Platea in hac aliquam dignissim aenean. In urna ornare in potenti. Eget suspendisse ultrices vitae tincidunt purus congue.</p>
                              <p>Id morbi quis lectus pellentesque pretium. Et mauris tempus ac vitae lacus porttitor mauris porta et. Sed quam faucibus lectus in. Quam blandit massa aliquam urna eu elementum metus. Facilisis maecenas proin integer tristique in elementum faucibus elit. Eu egestas viverra habitasse aliquam mattis tellus in</p>
                           </div>
                           <h4>Kiran, 39 <span>Entrepreneur</span></h4>
                        </div>
                        <div class="carousel-item">
                           <div class="testimonial-content">
                              <p>Lorem ipsum dolor sit amet consectetur. Luctus convallis quam massa condimentum. Mauris urna mauris pretium gravida. At ipsum gravida donec sapien rhoncus at posuere ornare nisl. Feugiat venenatis senectus congue donec massa. Aenean et risus pulvinar platea. Malesuada tellus bibendum diam commodo urna enim arcu. Vivamus nibh faucibus id gravida sed eget cursus. Dolor vel luctus aliquet dignissim a pellentesque. Platea in hac aliquam dignissim aenean. In urna ornare in potenti. Eget suspendisse ultrices vitae tincidunt purus congue.</p>
                              <p>Id morbi quis lectus pellentesque pretium. Et mauris tempus ac vitae lacus porttitor mauris porta et. Sed quam faucibus lectus in. Quam blandit massa aliquam urna eu elementum metus. Facilisis maecenas proin integer tristique in elementum faucibus elit. Eu egestas viverra habitasse aliquam mattis tellus in</p>
                           </div>
                           <h4>Kiran, 39 <span>Entrepreneur</span></h4>
                        </div>
                        <div class="carousel-item">
                           <div class="testimonial-content">
                              <p>Lorem ipsum dolor sit amet consectetur. Luctus convallis quam massa condimentum. Mauris urna mauris pretium gravida. At ipsum gravida donec sapien rhoncus at posuere ornare nisl. Feugiat venenatis senectus congue donec massa. Aenean et risus pulvinar platea. Malesuada tellus bibendum diam commodo urna enim arcu. Vivamus nibh faucibus id gravida sed eget cursus. Dolor vel luctus aliquet dignissim a pellentesque. Platea in hac aliquam dignissim aenean. In urna ornare in potenti. Eget suspendisse ultrices vitae tincidunt purus congue.</p>
                              <p>Id morbi quis lectus pellentesque pretium. Et mauris tempus ac vitae lacus porttitor mauris porta et. Sed quam faucibus lectus in. Quam blandit massa aliquam urna eu elementum metus. Facilisis maecenas proin integer tristique in elementum faucibus elit. Eu egestas viverra habitasse aliquam mattis tellus in</p>
                           </div>
                           <h4>Kiran, 39 <span>Entrepreneur</span></h4>
                        </div>
                        <div class="carousel-item">
                           <div class="testimonial-content">
                              <p>Lorem ipsum dolor sit amet consectetur. Luctus convallis quam massa condimentum. Mauris urna mauris pretium gravida. At ipsum gravida donec sapien rhoncus at posuere ornare nisl. Feugiat venenatis senectus congue donec massa. Aenean et risus pulvinar platea. Malesuada tellus bibendum diam commodo urna enim arcu. Vivamus nibh faucibus id gravida sed eget cursus. Dolor vel luctus aliquet dignissim a pellentesque. Platea in hac aliquam dignissim aenean. In urna ornare in potenti. Eget suspendisse ultrices vitae tincidunt purus congue.</p>
                              <p>Id morbi quis lectus pellentesque pretium. Et mauris tempus ac vitae lacus porttitor mauris porta et. Sed quam faucibus lectus in. Quam blandit massa aliquam urna eu elementum metus. Facilisis maecenas proin integer tristique in elementum faucibus elit. Eu egestas viverra habitasse aliquam mattis tellus in</p>
                           </div>
                           <h4>Kiran, 39 <span>Entrepreneur</span></h4>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

   <!-- start banner -->
      <section class="help-banner" style="background-image:url(assets/img/bg.jpg)">
         <div class="side-img">
            <img src="assets/img/side.png">
         </div>
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="help-title">
                     <h2 class="text-white">
                        Need Help Starting Your Healing Journey?
                     </h2>
                  </div>
               </div>
               <div class="col-md-4">
                  <a href="" class="white-btn">Let us Guide You</a>
               </div>
            </div>
         </div>
      </section>
@include('layouts.footer')