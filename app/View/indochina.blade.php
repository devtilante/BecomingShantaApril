@include('layouts.header')
<section class="page-header">
            <div class="page-header__bg-srilanka"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title text-center wow animated fadeInLeft" data-wow-delay="0s"
                    data-wow-duration="1500ms">
                    Indochina Region</h2>

            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <div class=" ">
            <div class="tour-listing-details__row row">
            <div class="text-center animated fadeIn" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <h3 class="tour-listing-details__title tour-listing-details__explore-title"
                        id="the-land-of-diversities">THE LAND OF DIVERSITIES - A TRAVELER'S DELIGHT FOR ALL SEASONS</h3>
                        <p class="px-5">
                        Embark on a journey across diverse realms with our exclusive destinations collection. Our travel company curates an unparalleled experience through a rich tapestry of destinations, spanning the enchanting landscapes of India, the Himalayan splendors of Nepal and Bhutan, the tropical allure of Sri Lanka and the Maldives, the cultural mosaic of Bangladesh, the vibrant scenes of Thailand and Malaysia, the futuristic charm of the UAE, and the mystique of the Indochina region
                        </p>
                </div>

                <div class="col-11">
                    <div class="mt-4 d-flex justify-content-center ">

                        <div class="col-5 tour-listing-details__slider">
                            <div id="srilanka-img-box" class="tour-listing-details__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-theme owl-carousel"
                                data-owl-options='{
                                "items": 2,
                                "margin": 30,
                                "smartSpeed": 700,
                                "loop":true,
                                "autoplay": 6000,
                                "nav":false,
                                "dots":true,
                                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                                "responsive":{
                                    "0":{
                                        "items": 1
                                    },
                                    "768":{
                                        "items": 1
                                    }
                                }
                                }'>
                                <div class="tour-listing-details__carousel-item item">
                                    <div class="tour-listing-details__carousel-image-box">
                                        <img src="{{asset('fontend/assets/images/tours/tour-listing-details-slide-1.jpg')}}"
                                            alt="tour-listing-details-slide"
                                            class="tour-listing-details__carousel-image">
                                    </div><!-- /.tour-listing-details__carousel-image-box -->
                                </div><!-- /.tour-listing-details__carousel-item item -->
                                <div class="tour-listing-details__carousel-item item">
                                    <div class="tour-listing-details__carousel-image-box">
                                        <img src="{{asset('fontend/assets/images/tours/tour-listing-details-slide-2.jpg')}}"
                                            alt="tour-listing-details-slide"
                                            class="tour-listing-details__carousel-image">
                                    </div><!-- /.tour-listing-details__carousel-image-box -->
                                </div><!-- /.tour-listing-details__carousel-item item -->
                                <div class="tour-listing-details__carousel-item item">
                                    <div class="tour-listing-details__carousel-image-box">
                                        <img src="{{asset('fontend/assets/images/tours/tour-listing-details-slide-3.jpg')}}"
                                            alt="tour-listing-details-slide"
                                            class="tour-listing-details__carousel-image">
                                    </div><!-- /.tour-listing-details__carousel-image-box -->
                                </div><!-- /.tour-listing-details__carousel-item item -->
                                <div class="tour-listing-details__carousel-item item">
                                    <div class="tour-listing-details__carousel-image-box">
                                        <img src="{{asset('fontend/assets/images/tours/tour-listing-details-slide-4.jpg')}}"
                                            alt="tour-listing-details-slide"
                                            class="tour-listing-details__carousel-image">
                                    </div><!-- /.tour-listing-details__carousel-image-box -->
                                </div><!-- /.tour-listing-details__carousel-item item -->
                                <div class="tour-listing-details__carousel-item item">
                                    <div class="tour-listing-details__carousel-image-box">
                                        <img src="{{asset('fontend/assets/images/tours/tour-listing-details-slide-5.jpg')}}"
                                            alt="tour-listing-details-slide"
                                            class="tour-listing-details__carousel-image">
                                    </div><!-- /.tour-listing-details__carousel-image-box -->
                                </div><!-- /.tour-listing-details__carousel-item item -->
                            </div><!-- /.tour-listing-details__carousel -->
                        </div>
                        <div class="col-7 tour-listing-details__explore" id="india-details">

                            <p class="tour-listing-details__explore-text wow animated fadeInUp" data-wow-delay="0.1s"
                                data-wow-duration="1500ms">Indochina, a captivating region in Southeast Asia, invites you to explore its rich tapestry of cultures, landscapes, and histories. Encompassing Vietnam, Cambodia, Laos, Myanmar, and Thailand, Indochina is a treasure trove of ancient temples, lush jungles, and vibrant cities.</p>
                            <p class="tour-listing-details__explore-text wow animated fadeInUp" data-wow-delay="0.1s"
                                data-wow-duration="1500ms">Discover the time-honored traditions of Hanoi's Old Quarter, cruise along the majestic Mekong River, and explore the awe-inspiring temples of Angkor Wat in Cambodia. Immerse yourself in the tranquility of Luang Prabang, Laos, and uncover the mysteries of Myanmar's Bagan.</p>
                            <p class="tour-listing-details__explore-text wow animated fadeInUp" data-wow-delay="0.1s"
                                data-wow-duration="1500ms">Our curated itineraries capture the essence of Indochina, offering a seamless blend of cultural exploration, natural wonders, and authentic experiences. Join us for a journey where the past and present intertwine, creating an enriching travel experience in a region that unfolds as a captivating blend of tradition and modernity.
                            </p>
                           

                            <!-- <a href="rajasthan_tour_packages.php"><button class=" trevlo-btn trevlo-btn--base-three"
                                    id="india-tour-packages-btn"><span>Indochina Region Tour Packages</span></button></a> -->
                        </div>
                    </div>

                </div><!-- /.col-xl-8 -->
            </div><!-- /.row -->
        </div>
@include('layouts.footer')