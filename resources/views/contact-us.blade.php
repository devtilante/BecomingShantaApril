@include('layouts.header')
   <!-- start banner -->
      <section class="banner">
         <div class="row align-items-center">
            <div class="col-md-6">
               <div class="banner-img" style="background-image:url({{asset('assets/img/contact.png')}})">
               </div>
            </div>
            <div class="col-md-6">
               <div class="banner-content">
                  <h1>Contact Us</h1>
                  <p>We’d love to hear from you! Whether you have questions, feedback, or just want to say hello, feel free to reach out to us.</p>
                  <div class="banner-btns">
                     <ul class="footer-category contct-banner float-left">
                        <li><a href="mailto:admin@becomingshanta.com"> <i class="fas fa-envelope"></i> admin@becomingshanta.com</a></li>
                        <li><a href="tel:+91 90197 16005"> <i class="fas fa-phone"></i>+91 90197 16005</a></li>
                        
                     </ul>
                     <a href="" class="white-btn float-right mt-4">
                        <i class="fab fa-whatsapp"></i>  WhatsApp US
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="locations p-50">
         <div class="container">
             <div class="row">
                <div class="col-md-12">
                     <div class="section-title">
                              <h1>Our Locations</h1>
                     </div>
                </div>
                <div class="col-md-6">
                     <div class="location-list">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15551.930692032327!2d77.62791184056117!3d12.972959957623301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae16a418770391%3A0xb50f46b826501036!2sIndiranagar%2C%20Bengaluru%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1727246749802!5m2!1sen!2sin" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                          <h3>Indiranagar</h3>
                          <p>#2582, 1st Floor, 17th Main, 2nd Cross, HAL 2nd Stage, Indiranagar, Bengaluru 560008</p>
                          <a href="" class="white-btn">
                           <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"></path>
                                          </svg>
                           Open Map</a>
                     </div>
                </div>
                <div class="col-md-6">
                     <div class="location-list">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15550.610792807955!2d77.61459584904506!3d12.994051297172032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae16ec27e3d829%3A0xe5516b9ea421c44b!2sCox%20Town%2C%20Bengaluru%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1727248173908!5m2!1sen!2sin" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                          <h3>Cox Town</h3>
                          <p>164/6, Srinivasa Building, 1st Floor, North Wing, MM Road, (above New Ganesh Bakery) Sarvagnya Nagar, Cox Town, Bengaluru 560005</p>
                          <a href="" class="white-btn">
                           <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"></path>
                                          </svg>
                           Open Map</a>
                     </div>
                </div>
                 <div class="available">
                     <h2>We're Available</h2>
                     <ul class="d-flex ">
                        <li>
                           <h5>Monday to Saturday</h5>
                           <p>5:00 AM to Midnight</p>
                        </li>
                        <li style="padding-left:10px;">
                           <h5>Sunday</h5>
                           <p>Upon Request</p>
                        </li>
                     </ul>
                 </div>
             </div>
         </div>
      </section>

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