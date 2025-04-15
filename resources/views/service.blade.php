@include('layouts.header')

<!-- start page title -->
<div class="page-title">
       <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <ul class="page-breadcrumb">
                     <li><a href="#!">Services <span>/</span>  </a></li>
                     <li><a href="#!">Psychological Wellbeing <span>/</span> </a></li>
                     <li>Individual Wellbeing </li>
                  </ul>
              </div>
           </div>
       </div>
    </div>

   <!-- start banner -->
      <section class="banner">
         <div class="row align-items-center">
            <div class="col-md-6">
               <div class="banner-img" style="background-image:url(assets/img/service/banner.jpg)">
               </div>
            </div>
            <div class="col-md-6">
               <div class="banner-content">
                  <h1>Individual Wellbeing</h1>
                  <p>Discover the path to inner peace and personal growth with our individual therapy sessions. We offer personalized, one-on-one therapy designed to address your unique needs.</p>
                  <p>Our compassionate and experienced therapists use a holistic approach to help you heal emotionally, mentally, and spiritually. We're here to guide you on your journey to well-being. Embrace the opportunity to transform your life and achieve balance in a supportive and nurturing environment</p>
                  <div class="banner-btns">
                     <a href="{{route('consultants')}}" class="theme-btn mr-2">
                     Book a Consultation
                     </a>
                     <a href="" class="white-btn">
                     Let us Guide You
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
   <!-- start benifits -->
      <section class="benifit p-100">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                     <div class="section-title">
                              <h1>Benefits</h1>
                     </div>
                  </div>
                   <div class="col-md-8 col-8">
                        <p>Discover the path to inner peace and personal growth with our individual therapy sessions. We offer personalized, one-on-one therapy designed to address your unique needs. </p>
                        <p>Our compassionate and experienced therapists use a holistic approach to help you heal emotionally, mentally, and spiritually. We're here to guide you on your journey to well-being. Embrace the opportunity to transform your life and achieve balance in a supportive and nurturing environment.</p>
                   </div>
                   <div class="col-md-4 col-4">
                       <p>Lorem ipsum dolor sit amet consectetur.</p>
                       <p>Lorem ipsum dolor sit amet consectetur. Nam volutpat enim id ornare vestibulum mattis sit malesuada nibh.</p>
                       <p>Lorem ipsum dolor sit amet consectetur. Nam volutpat enim.</p>
                   </div>
              </div>
          </div>
      </section>

  <!-- start banner -->
      <section class="how-it-work">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-md-5">
                   <div class="how-img">
                       <img src="assets/img/service/how.jpg">
                   </div>
               </div>
               <div class="col-md-7">
                  <div class="how-content">
                     <h1>How it Works</h1>
                     <p>From the very first intake session, we are committed to pairing you with a therapist who perfectly suits your needs.</p>
                     <p>Our diverse team of professionals brings a range of specialties, experiences, and personalities, allowing us to find the ideal match for your specific circumstances.</p>
                     <p>You’ll have the flexibility to meet with your therapist at times that fit your schedule. Together, you’ll create a personalized care plan, and your therapist will monitor and assess your progress to help you achieve your goals.</p>
                     <div class="banner-btns">
                        <a href="" class="theme-btn mr-2">
                        Book a Consultation
                        </a>
                        <a href="" class="white-btn">
                        Let us Guide You
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- start team section -->
      <section class="team-main p-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-5">
                  <div class="section-title">
                     <h1>Our Consultants</h1>
                  </div>
               </div>
               <div class="col-lg-8 col-md-7">
                  <div class="section-title right-title">
                     <p>Meet our friendly team committed to guide you to your desired results the healthy way.</p>
                  </div>
               </div>
            </div>
            <div id="owl-carousel" class="team-carosel owl-carousel owl-theme">
               <div class="item">
                  <img src="assets/img/team3.png">
               </div>
               <div class="item">
                  <img src="assets/img/team2.png">
               </div>
               <div class="item">
                  <img src="assets/img/team3.png">
               </div>
               <div class="item">
                  <img src="assets/img/team2.png">
               </div>
               <div class="item">
                  <img src="assets/img/team3.png">
               </div>
               <div class="item">
                  <img src="assets/img/team2.png">
               </div>
            </div>
             <div class="text-center view-all"><a href="" class="white-btn">View All Consultants</a></div>
         </div>
      </section>
      <!-- start contact -->
      <section class="contact text-center">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-8">
                  <div class="section-title">
                     <h1>Cancellation and Refund Policy</h1>
                     <p class="mb-0">We understand that schedules can change. Clients may reschedule appointments at no additional cost up to 48 hours before the scheduled time. If you need to cancel your appointment, a full refund will be provided, given that you notify us at least 48 hours in advance</p>
                     <p>Cancellations made less than 48 hours before the appointment will be considered a late cancellation, and no refund will be issued. We appreciate your understanding and cooperation.</p>
                     <a href="" class="white-btn"><i class="fab fa-whatsapp"></i>   Contact Us</a>
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