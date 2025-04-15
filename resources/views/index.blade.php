@include('layouts.header')
      <!-- start banner -->
      <section class="banner">
         <div class="row align-items-center">
            <div class="col-md-6">
               <div class="banner-img" style="background-image:url(assets/img/banner.jpg)">
               </div>
            </div>
            <div class="col-md-6">
               <div class="banner-content">
                  <h1>Become Shānta with us</h1>
                  <p>A collective of healing practitioners have come together to guide your path towards your true destiny and help you overcome your daily struggles.</p>
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
      <!-- start about Us -->
      <section class="about-us text-center p-100">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div class="section-title">
                     <h1>Our Philosophy</h1>
                     <p>We arrive on this planet as travellers ​to explore and learn as much as we ​can from the universe. Along the way, ​are obstacles, hardships and difficult ​relationships that keep us from ​becoming our true selvesp.</p>
                     <p>A collective of healing practitioners ​have come together to guide your ​path towards your true destiny and ​help you overcome your daily ​struggles.</p>
                  </div>
                  <div class="row feature">
                     <div class="col-md-3">
                        <div class="feature-box">
                           <div class="feature-icon">
                              <i></i>
                           </div>
                           <p>Expert Consultation</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="feature-box">
                           <div class="feature-icon">
                              <i></i>
                           </div>
                           <p>Evidence-based Treatment Plans</p>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="feature-box">
                           <div class="feature-icon">
                              <i></i>
                           </div>
                           <p>Natural & Effective</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- start services -->
      <section class="services pb-100" id="service-section">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="section-title">
                     <h1>Our Services</h1>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="section-title right-title">
                     <p>After decades of collective research, we ​realised that care cannot be unidirectional. ​We have brought together different forms ​of wellbeing from Western Psychotherapies ​to Eastern Community Care.</p>
                  </div>
               </div>
            </div>
            <?php
             $categorylist=DB::table('category')->orderBy('id','asc')->get();
            ?>
            <div class="pbmit-tab row">
               <ul class="nav nav-tabs col-lg-3 col-md-12 col-12" role="tablist">
                   @php $count=0; @endphp
                   @foreach($categorylist as $category)
                  <?php $count++; 
                  
                   $show="";
                        $active="";
                    if($count==1){
                        $show="show";
                        $active="active";
                    }
                  ?>
                  <li class="nav-item" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="{{strip_tags($category->category_desc)}}">
                     <a class="nav-link <?php echo $active;?>" data-bs-toggle="tab" href="#tab-2-{{$count}}" aria-selected="true" role="tab" > 
                     <span>{{$category->category_name}}</span>
                     </a>	
                  </li>
                  @endforeach
               </ul>
               <div class="tab-content col-lg-9 col-md-12 col-9 col-sm-12 col-12">
                   @php $count2=0; 
                   
                   @endphp
                    @foreach($categorylist as $category)
                    <?php 
                    $count2++;
                    $show="";
                        $active="";
                    if($count2==1){
                        $show="show";
                        $active="active";
                    }
                    ?>
                  <div class="tab-pane <?php echo $show;?> <?php echo $active;?>" id="tab-2-{{$count2}}" role="tabpanel">
                     <div class="row">
                         <?php
                          $subcategory_list=DB::table('subcategory')->where('category_id',$category->id)->get();
                          foreach($subcategory_list as $subcategory){
                         ?>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4><?php echo $subcategory->subcategory_name;?></h4>
                                 <a href="{{route('services')}}">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                           
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span><img src="{{asset('images/subcategory')}}/{{$subcategory->photo}}" ></span>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                        
                     </div>
                  </div>
                  @endforeach
                  <!--<div class="tab-pane" id="tab-2-2" role="tabpanel">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Somatic  <br> Therapies</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Relationship <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Family <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Executive <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Wellbeing for ​ <br> Old Age</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Child & Adolescent  <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="tab-2-3" role="tabpanel">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Movement  <br> Therapies</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Relationship <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Family <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Executive <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Wellbeing for ​ <br> Old Age</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Child & Adolescent  <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="tab-2-4" role="tabpanel">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Soul &  <br> Spirit Care</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Relationship <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Family <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Executive <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Wellbeing for ​ <br> Old Age</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Child & Adolescent  <br> Wellbeing</h4>
                                 <a href="service-details.html">
                                    <span class="pbmit-button-icon-wrapper">
                                       <span class="pbmit-button-icon">
                                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                             <path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="card-image">
                                 <span></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>-->
               </div>
            </div>
         </div>
      </section>
      <!-- start partner -->
      <section class="partner">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="section-title text-center">
                     <h1>Our Partners</h1>
                  </div>
                  <div class="slider">
                     <div class="slide-track justify-content-center">
                        <div class="slide">
                           <img src="assets/img/partner1.png" height="100" width="250" alt="" />
                        </div>
                        <div class="slide">
                           <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/2.png" height="100" width="250" alt="" />
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- start testimonial -->
      <section class="testimonial text-center p-100">
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
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 8"></button>
                     </div>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="testimonial-content">
                              <h4><strong>Yoga</strong></h4>
                              <p>"Yoga at Shanta has transformed my life! It’s not just about the physical movements of it, it’s also about finding mental peace and emotional balance through the movements. Each session has given me more than just a physical release - it’s a very grounding experience that helps me feel connected to my mind, body, and spirit. I’m feeling more aligned and at peace with myself than I have ever felt before. This holistic therapy approach has truly made a huge difference to my life."</p>
                           </div>
                           <h4>Lakshya, 31,  <span>Mom of two</span></h4>
                        </div>
                        <div class="carousel-item">
                           <div class="testimonial-content">
                                <h4><strong>Tarot Reading</strong></h4>
                              <p>I came to Shanta to try out tarot reading with Nithya and the experience was beyond what I had imagined. The tarot session really helped me gain clarity about some tough life decisions I had been struggling with, and the space was so cosy and comfortable! After the readings, I feel so much more grounded and looking forward for my future. The entire session was truly empowering."</p>
                           </div>
                           <h4>Hema, 55, <span>Head of Operations</span></h4>
                        </div>
                        <div class="carousel-item">
                           <div class="testimonial-content">
                                <h4><strong>Sound Healing</strong></h4>
                              <p>"Sound Healing has been one of the most impactful experiences of my life. The healing vibrations and frequencies helped me release emotional blockages I didn’t even know I was holding onto. I left the session feeling lighter, more centered, and connected to myself. It was like a deep cleanse for my soul. I highly recommend trying out this service at Shanta for anyone who is on the journey towards emotional balance."</p>
                           </div>
                           <h4>Archana, 29,<span>Flow therapist</span></h4>
                        </div>
                        <div class="carousel-item">
                           <div class="testimonial-content">
                                <h4><strong>Executive Wellbeing</strong></h4>
                              <p>"As a busy executive, finding time for self-care is a challenge. However, Shanta’s Executive Wellbeing program gave me practical tools to manage stress, boost focus, and make better decisions. Nithya was able to give me a personalized approach and her team was very accomodative of my hectic and unstable schedule. I now feel more balanced and at ease. I’m more productive at work and definetly much  better at  work-life integration thanks to Nithya and her team at Shanta."</p>
                           </div>
                           <h4>Nitin, 29, <span>Co-founder</span></h4>
                        </div>
                        <div class="carousel-item">
                           <div class="testimonial-content">
                                <h4><strong>Divorce and Child Custody Advisory</strong></h4>
                              <p>"Going through a divorce is one of the toughest challenges I've faced, but Shanta’s  service provided the support I needed during this time. The team was empathetic, knowledgeable, and very experienced . It helped me navigate my legal and emotional challenges with confidence. There was full transperancy with the court procedures and communncations were very frequent which eased my mind and heart. They pushed me to  taking care of myself while also helping me with my child care  responsibilities. I couldn’t have asked for a better team who supported me  during such a difficult period."</p>
                           </div>
                           <h4>Seema, 32,<span>Housewife</span></h4>
                        </div>
                        <div class="carousel-item">
                           <div class="testimonial-content">
                                <h4><strong>Family Wellbeing</strong></h4>
                              <p>"We are very happy with the Family Wellbeing sessions at Shanta. It helped our family reconnect and strengthen our bonds. The space felt so safe where we could openly express ourselves, and we learned tools to communicate more effectively and resolve conflicts. We are definelty a healthier family now and all of us have learnt how to care for each other holistically ( a new word we learnt at therapy). Something we were worried about was matching our schedules to book a session, but the team was so helpful with their clear communication. We are very grateful :)"</p>
                           </div>
                           <h4>Naresh, 34, <span>UI UX Developer</span></h4>
                        </div>
                        <div class="carousel-item">
                           <div class="testimonial-content">
                                <h4><strong>Relationship Wellbeing</strong></h4>
                              <p>" 3 months ago, my partner and I had broken up for the 6th time in the year. It felt so exhausting and we finally decided to try therapy. We were definelty spectical, especially my partner who is not great with trusting. But within just the first 3 sessions, Shanta’s Relationship Wellbeing sessions helped my partner and I rediscover our connection. The therapy sessions focused on understanding each other’s needs and learning how to support one another in a healthy, loving way. We learnt  new ways to communicate with each other and  how to address challenges with empathy and compassion. We’ve never been more connected, and we owe it all to Divya at Shanta."</p>
                           </div>
                           <h4>Sneha, 26,<span>Software Engineer</span></h4>
                        </div>
                        <div class="carousel-item">
                           <div class="testimonial-content">
                                <h4><strong>Wellbeing for the Elderly</strong></h4>
                              <p>"I am writing this on behalf of my granddad. He was very hesitant to try something he just doesn't believe in. It took me years to get him to therapy, but I am so glad it was Shanta. Shanta’s geriatric therapy was so well thoughout and tailored for his needs.The team was always one step ahead and compassionate. My grandad is now happier and it brings me so much joy to see him have found stability at this age.This program has been a true blessing for our family."</p>
                           </div>
                           <h4>Asha, 42,<span>Design Head</span></h4>
                        </div>
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
               <div class="col-md-4">
                  <div class="section-title">
                     <h1>Meet the Team</h1>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="section-title right-title">
                     <p>Meet our friendly team committed to guide you to your desired results the healthy way.</p>
                  </div>
               </div>
            </div>
            <div id="owl-carousel" class="team-carosel owl-carousel owl-theme">
               <div class="item">
                  <img src="assets/img/team1.png">
               </div>
               <div class="item">
                  <img src="assets/img/team2.png">
               </div>
               <div class="item">
                  <img src="assets/img/team3.png">
               </div>
               <div class="item">
                  <img src="assets/img/team4.png">
               </div>
               <div class="item">
                  <img src="assets/img/team1.png">
               </div>
               <div class="item">
                  <img src="assets/img/team2.png">
               </div>
            </div>
         </div>
      </section>
      <!-- start contact -->
      <section class="contact text-center">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div class="section-title">
                     <h1>Think you'll be a good fit for our team?</h1>
                     <p>We would love to hear from you! We are growing and we're always on the lookout for kindred spirits.</p>
                     <a href="" class="white-btn"><i class="fab fa-whatsapp"></i>   WhatsApp US</a>
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
      <section class="visit-space">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <h2 class="title">
                     Visit Our Spaces
                  </h2>
                  <div class="row">
                     <div class="col-md-6 visit-card">
                        <h4>Indiranagar</h4>
                        <p>#2582, 1st Floor, 17th Main, 2nd Cross, HAL 2nd Stage, Indiranagar, Bangalore 560008</p>
                        <a href="" class="btn">
                        <i class="fas fa-arrow-up"></i> Open Map
                        </a>
                     </div>
                     <div class="col-md-6 visit-card">
                        <h4>Cox Town</h4>
                        <p>#2582, 1st Floor, 17th Main, 2nd Cross, HAL 2nd Stage, Indiranagar, Bangalore 560008</p>
                        <a href="" class="btn">
                        <i class="fas fa-arrow-up"></i> Open Map
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <h2 class="title">
                     We're Available
                  </h2>
                  <ul>
                     <li>
                        <h5>Monday to Saturday</h5>
                        <p>5:00 AM to Midnight</p>
                     </li>
                     <li>
                        <h5>Sunday</h5>
                        <p>Upon Request</p>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <!-- start footer -->
     @include('layouts.footer')