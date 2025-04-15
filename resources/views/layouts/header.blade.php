<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Shanta</title>
    
    <link rel="icon" type="image/png" href="{{asset('assets/favicon.ico')}}">


      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-10/css/all.min.css">
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
<style>
    .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>
   </head>
   <body class="sticky-header">
      <!-- start header -->
      <header class="header">
         <div id="rt-sticky-placeholder"></div>
         <div id="header-menu" class="header-menu menu-layout1">
            <div class="container">
               <div class="row d-flex align-items-center">
                  <div class="col-xl-2 col-lg-2">
                     <div class="logo-area">
                        <a href="{{URL::to('/')}}" class="temp-logo">
                        <img src="assets/img/logo.png" width="140" height="40" alt="logo" class="img-fluid">
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-7 d-flex justify-content-center position-static">
                     <nav id="dropdown" class="template-main-menu">
                        <ul>

                           <li>
                              <a href="{{route('about-us')}}">About</a>
                           </li>

                           <li>
                              <a href=https://shanta.infyedgesolutions.com/#service-section">Services</a>
                           </li>

                           <!-- <li>
                              <a href="with-sidebar2.html">Services</a>
                              <ul class="dropdown-menu-col-1">
                                 <li>
                                    <a href="#!">Menu1</a>
                                 </li>
                                 <li>
                                    <a href="#!">Menu2</a>
                                 </li>
                                 <li>
                                    <a href="#!">Menu3</a>
                                 </li>
                              </ul>
                           </li> -->
                           <!--<li>
                              <a href="with-sidebar2.html">Resources</a>
                              <ul class="dropdown-menu-col-1">
                                 <li>
                                    <a href="#!">Menu1</a>
                                 </li>
                                 <li>
                                    <a href="#!">Menu2</a>
                                 </li>
                                 <li>
                                    <a href="#!">Menu3</a>
                                 </li>
                              </ul>
                           </li>-->
                           <li>
                              <a href="{{route('contact-us')}}">Contact Us</a>
                           </li>
                           <!--<li>
                              <a href="blog.html">Events</a>
                           </li>-->
                            @if(session()->has('user_id'))
                           <li>
                              <a href="{{route('logout-page')}}">Logout</a>
                           </li>
                           @endif
                        </ul>
                     </nav>
                  </div>
                  <div class="col-xl-3 col-lg-3 d-flex justify-content-end">
                     <div class="header-action-layout1">
                        <ul class="action-list">
                           <li class="action-item-style my-account">
                              <div class="mean-bar--right">
                                 <div class="actions search">
                                    <a href="#template-search" class="item-icon" title="Search">
                                    <i class="fas fa-search"></i>
                                    </a>
                                 </div>
                                 <span class="sidebarBtn">
                                 <span class="bar"></span>
                                 <span class="bar"></span>
                                 <span class="bar"></span>
                                 <span class="bar"></span>
                                 </span>
                              </div>
                           </li>
                           @if(session()->has('user_id'))
                            <li class="listing-button">
                              <a href="javascript:void(0)" class="listing-btn"> <span class="item-text">{{session('name')}}</span></a>
                              
                           </li>
                           @else
                           
                           <li class="listing-button">
                              <a href="{{route('login')}}" class="listing-btn">
                              <span class="item-text">Login/Register</span>
                              </a>
                           </li>
                           @endif
                           <!-- <li class="listing-button">
                              <a href="{{route('login')}}" class="listing-btn">
                              <span class="item-text">Login </span>
                              </a>
                           </li> -->
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- start mobile menu -->
      <div class="rt-header-menu mean-container position-relative"
         id="meanmenu">
         <div class="mean-bar">
            <a href="index.html">
            <img src='assets/img/logo.png' alt='logo' class='img-fluid'/>
            </a>
            <div class="mean-bar--right">
               <div class="actions search">
                  <a href="#template-search" class="item-icon" title="Search">
                  <i class="fas fa-search"></i>
                  </a>
               </div>
               <span class="sidebarBtn">
               <span class="bar"></span>
               <span class="bar"></span>
               <span class="bar"></span>
               <span class="bar"></span>
               </span>
            </div>
         </div>
         <div class="rt-slide-nav">
            <div class="offscreen-navigation">
               <nav class="menu-main-primary-container">
                  <ul class="menu">
                     <li class="list menu-item-parent">
                        <a class="animation" href="{{route('login')}}">Login/Register</a>
                     </li>
                     <li class="list menu-item-parent menu-item-has-children">
                        <a class="animation" href="#">Services</a>
                        <ul class="main-menu__dropdown sub-menu">
                           <li>
                              <a href="#!">Menu1</a>
                           </li>
                           <li>
                              <a href="#!">Menu2</a>
                           </li>
                           <li>
                              <a href="#!">Menu3</a>
                           </li>
                        </ul>
                     </li>
                     <li class="list menu-item-parent menu-item-has-children">
                        <a class="animation" href="#">Resources</a>
                        <ul class="main-menu__dropdown sub-menu">
                           <li>
                              <a href="#!">Menu1</a>
                           </li>
                           <li>
                              <a href="#!">Menu2</a>
                           </li>
                           <li>
                              <a href="#!">Menu3</a>
                           </li>
                        </ul>
                     </li>
                     <li class="list menu-item-parent menu-item-has-children">
                        <a class="animation" href="#">Contact Us</a>
                     </li>
                     <li class="list menu-item-parent">
                        <a class="animation" href="contact.html">Events</a>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
      <!-- start banner -->