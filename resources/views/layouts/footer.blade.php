 <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4 col-12">
                  <div class="footer-logo">
                     <a href=""><img src="assets/img/logo.png"></a>
                  </div>
                  <ul class="footer-category">
                     <li><a href="tel:+91 90197 16005"> +91 8088923112 </a></li>
                     <li><a href="mailto:admin@becomingshanta.com">admin@becomingshanta.com</a></li>
                  </ul>
                  <a href="" class="theme-btn mt-4">Book a Consultation</a>
               </div>
               <div class="col-md-3 col-6 footer-widget">
                  <h5>Quick Links</h5>
                  <ul class="footer-category">
                     <li><a href="{{URL::to('/')}}#service-section"><i class="fas fa-caret-right"></i> Services & Consultants</a></li>
                     <li><a href="{{route('contact-us')}}"><i class="fas fa-caret-right"></i> Contact Us</a></li>
                     <!--<li><a href="{{route('about-us')}}"><i class="fas fa-caret-right"></i> About</a></li>-->
                     <!--<li><a href=""><i class="fas fa-caret-right"></i> Events</a></li>
                     <li><a href=""><i class="fas fa-caret-right"></i> Resources</a></li>-->
                  </ul>
               </div>
               <div class="col-md-3  col-6 footer-widget">
                  <h5>Quick Links</h5>
                  <ul class="footer-category">
                     <li><a href="{{route('terms-condition')}}"><i class="fas fa-caret-right"></i> Terms & Condition</a></li>
                    <!-- <li><a href=""><i class="fas fa-caret-right"></i>Work with Us</a></li>-->
                     <li><a href="{{route('about-us')}}"><i class="fas fa-caret-right"></i>About</a></li>
                     <li><a href="{{URL::to('/')}}#service-section"><i class="fas fa-caret-right"></i> Service</a></li>
                     
                  </ul>
               </div>
               <div class="col-md-2 col-6 footer-widget">
                  <h5>Follow Us </h5>
                  <ul class="footer-category">
                     <li><i class="fab fa-instagram"></i> </li>
                     <li><i class="fab fa-whatsapp"></i> </li>
                  </ul>
               </div>
            </div>
            <div class="copyright">
               <p>© 2024    Becoming Shānta.  All rights reserved.</p>
            </div>
         </div>
      </footer>
      <div id="template-search" class="template-search close">
         <button type="button" class="close">×</button>
         <form class="search-form" action="#">
            <input type="search" value="" name="search_key" placeholder="Search here." required="">
            <button type="submit" class="btn"><i class="flaticon-search">Search</i></button>
         </form>
      </div>
   </body>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/jquery-3.7.1.min.js"></script>
   <script src="assets/js/slick.js"></script>
   <script src="assets/js/main.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>


<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <script type="text/javascript">
        // Sticky Header
    $(window).on("scroll", function () {
        if ($("body").hasClass("sticky-header")) {
          var stickyPlaceHolder = $("#rt-sticky-placeholder"),
            menu = $("#header-menu"),
            menuMobile = $("#meanmenu"),
            menuH = menu.outerHeight(),
            menuMobileH = menu.outerHeight(),
            topHeaderH = $("#header-topbar").outerHeight() || 0,
            middleHeaderH = $("#header-middlebar").outerHeight() || 0,
            targrtScroll = topHeaderH + middleHeaderH;
          if ($(window).scrollTop() > targrtScroll) {
            menu.addClass("rt-sticky");
            stickyPlaceHolder.height(menuH);
          } else {
            menu.removeClass("rt-sticky");
            stickyPlaceHolder.height(0);
          }
          if ($(window).scrollTop() > 300) {
            menuMobile.addClass("rt-sticky");
            stickyPlaceHolder.height(menuMobileH);
          } else {
            menuMobile.removeClass("rt-sticky");
            stickyPlaceHolder.height(0);
          }
        }
      });
 // Fixed header
  $(window).on("scroll", function () {
    if ($(".rt-header").hasClass("sticky-on")) {
      let stickyPlaceHolder = $("#sticky-placeholder"),
        menu = $("#navbar-wrap"),
        menuH = menu.outerHeight(),
        menuMobile = $("#meanmenu"),
        topbarH = $("#topbar-wrap").outerHeight() || 0,
        targrtScroll = topbarH,
        header = $("header");
      if ($(window).scrollTop() > targrtScroll) {
        header.addClass("sticky");
        stickyPlaceHolder.height(menuH);
      } else {
        header.removeClass("sticky");
        stickyPlaceHolder.height(0);
      }
      if ($(window).scrollTop() > 300) {
        menuMobile.addClass("rt-sticky");
      } else {
        menuMobile.removeClass("rt-sticky");
      }
    }
  });
   $(window).on("scroll", function (){if ($(window).scrollTop() > 500) {
        $('.sticky-tab').addClass("pos-fix");
      } else {
         $('.sticky-tab').removeClass("pos-fix");
      }
  });
   </script>

    
   <script type="text/javascript">
//const today = new Date().toISOString().split('T')[0];

    // Set the max attribute of the date input to today
    //document.getElementById('dob').setAttribute('max', today);
     const today = new Date();
$(function() {
            $("#dob").datepicker({
                changeMonth: true,  // Allows changing months
      changeYear: true,   // Allows changing years
      yearRange: "1900:2100", // Set year range as per need
                maxDate: today,dateFormat: "dd/mm/yy"});
        });

        $(document).ready(function() {
            $('.togglePassword').on('click', function() {
                // Toggle the password input type
                var passwordField = $('#pass_word');
                var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);

                if(type==='text'){
                  $('.togglePassword').removeClass('fa-eye');
                  $('.togglePassword').addClass('fa-lock');
                  
                 
                }

                if(type==='password'){
                  
                  $('.togglePassword').addClass('fa-eye');
                  $('.togglePassword').removeClass('fa-lock');
                  
                }

            });

            $('.togglePassword2').on('click', function() {
                // Toggle the password input type
                var passwordField = $('#passwordInp');
                var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);

                if(type==='text'){
                  $('.togglePassword2').removeClass('fa-eye');
                  $('.togglePassword2').addClass('fa-lock');
                  
                 
                }

                if(type==='password'){
                  
                  $('.togglePassword2').addClass('fa-eye');
                  $('.togglePassword2').removeClass('fa-lock');
                  
                }

            });
        });

      $('#owl-carousel').owlCarousel({
				loop: true,
				autoplay: true,
				margin: 30,
				dots: false,
				nav: false,
				items: 4,
				responsive: {
					0: {
						items: 2,

					},
					600: {
						items: 2,

					},
					1000: {
						items: 4,

						loop: false
					}
				}
			})

			$('a[href="#template-search"]').on("click", function(event) {
				event.preventDefault();
				var target = $("#template-search");
				target.addClass("open");
				setTimeout(function() {
					target.find("input").focus();
				}, 600);
				return false;
			});
			$("#template-search, #template-search button.close").on(
				"click keyup",
				function(event) {
					if (
						event.target === this ||
						event.target.className === "close" ||
						event.keyCode === 27
					) {
						$(this).removeClass("open");
					}
				}
			);

			$(".sidebarBtn").on("click", function(e) {
				e.preventDefault();
				$(".rt-slide-nav").toggleClass('open');
				$("body").toggleClass("slidemenuon");
			});
			var a = $(".offscreen-navigation .menu");
			if (a.length) {
				a.children("li").addClass("menu-item-parent");
				a.find(".menu-item-has-children > a").on("click", function(e) {
					e.preventDefault();
					$(this).toggleClass("opened");
					var n = $(this).next(".sub-menu"),
						s = $(this).closest(".menu-item-parent").find(".sub-menu");
					a.find(".sub-menu").not(s).slideUp(250).prev("a").removeClass("opened"),
						n.slideToggle(250);
				});
				a.find(".menu-item:not(.menu-item-has-children) > a").on(
					"click",
					function(e) {
						$(".rt-slide-nav").slideUp();
						$("body").removeClass("slidemenuon");
					}
				);
			}



            $("#RegBtn").on('click',function(e){
                e.preventDefault();
               
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                
                $("#fullnameErr").hide();
                $("#emailErr").hide();
                $("#phoneErr").hide();
                $("#dobErr").hide();
                $("#passwordErr").hide();
                $("#ConpasswordErr").hide();
                
                var fullname           =$("#fullname").val();
                var emailinput         =$("#emailinput").val();
                var phonenumber        =$("#mobile_code").val();
                var dob                =$("#dob").val();
                var pass_word                =$("#pass_word").val();
                 var confirm_password                =$("#confirm_password").val();
                var communication_method =$("#communication_method").val();
                var registering_behalf   =$("#registering_behalf").val();
               var ErrCount=0;
               if(fullname==""){
                $("#fullnameErr").html('Enter Your Full Name');
                $("#fullnameErr").show();
                ErrCount++;
               }

               if(emailinput==""){
                $("#emailErr").html('Enter Your Email');
                $("#emailErr").show();
                ErrCount++;
               }

               if (IsEmail(emailinput) === false) {
                  $("#emailErr").html('Enter Your Valid Email');
                  $("#emailErr").show();
                  ErrCount++;
		      }

               if(phonenumber==""){
                $("#phoneErr").html('Enter Your Phone Number');
                $("#phoneErr").show();
                ErrCount++;
               }

        

      if(phonenumber.length!=10){
			$("#phoneErr").html('Enter 10 Digit Phone Number');
                $("#phoneErr").show();
                ErrCount++;
		}

               if(dob==""){
                $("#dobErr").html('Enter Your DOB');
                $("#dobErr").show();
                ErrCount++;
               }

               if(pass_word==""){
                $("#passwordErr").html('Enter Your Password');
                $("#passwordErr").show();
                ErrCount++;
               }
               
               if(confirm_password==""){
                $("#ConpasswordErr").html('Enter Your Password');
                $("#ConpasswordErr").show();
                ErrCount++;
               }
               if(pass_word!=confirm_password){
                $("#ConpasswordErr").html('Password Does Not Match');
                $("#ConpasswordErr").show();
                ErrCount++;
               }
               
               if(communication_method==""){
                $("#communicationErr").html('Select Communication Method');
                $("#communicationErr").show();
                ErrCount++;
               }
               
               if(registering_behalf==""){
                $("#registeringErr").html('Select Registering Behalf');
                $("#registeringErr").show();
                ErrCount++;
               }


               if (!$('#agree').is(':checked')) {
            event.preventDefault();
            $("#agreeErr").html('Accept Terms of Service and Privacy Policy');
                $("#agreeErr").show();
                ErrCount++;// Show error message
        } 



               if(ErrCount>0){
                return false;
               }
                
               document.getElementById("RegBtn").disabled = true;
                $.ajax({
                type:'POST',
                url: "{{route('store-register')}}",
                data:{
                    _token:$('input[name=_token]').val(),
                    fullname:fullname,
                    emailinput:emailinput,
                    phonenumber:phonenumber,
                    dob:dob,
                    pass_word:pass_word,
                    communication_method:communication_method,
                    registering_behalf:registering_behalf
                    
                    
                },
                success:function(response){
                    console.log(response.status);
                    // var jsonData=JSON.parse(response);
                    if(response.status=='success'){
                        // window.location.href = "{{ route('home') }}";
                        // $("#Sucmsg").html(response.msg);
                        // $("#Sucmsg").show();
                        toastr.success(response.msg, 'Success');
                        document.getElementById("RegBtn").disabled = false;
                        $('#reg_form').trigger('reset');
                        window.location.href = "{{ route('login') }}";
                    }else{
                        //$("#Errmsg").html(response.msg);
                        toastr.error(response.msg, 'Eroor');
                        //$("#Errmsg").show();
                        document.getElementById("RegBtn").disabled = false;
                    }
                   
                    
                    
                    
                    
                    },
		error: function (addToCartErrors) {
			console.log(addToCartErrors);
		},

                });
	
  });




  $("#loginBtn").on('click',function(e){
                e.preventDefault();
               
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

               
                $("#emailErr").hide();
                $("#passwordErr").hide();
                var emailinput           =$("#emailinput").val();
                var pass_word        =$("#passwordInp").val();
               
               var ErrCount=0;
              

               if(emailinput==""){
                   toastr.error('Enter Your Email', 'Error');
                   $("#emailErr").html('Enter Your Email');
                   $("#emailErr").show();
                   ErrCount++;
               }
               
               if (IsEmail(emailinput) === false) {
                   toastr.error('Enter Valid Email', 'Error');
                  $("#emailErr").html('Enter Your Valid Email');
                  $("#emailErr").show();
                  ErrCount++;
		      }

              

               if(pass_word==""){
               toastr.error('Enter Your Password', 'Error');
                   $("#passwordErr").html('Enter Your Password');
                   $("#passwordErr").show();
                   ErrCount++;
               }



               if(ErrCount>0){
                return false;
               }
                
               document.getElementById("loginBtn").disabled = true;
                $.ajax({
                type:'POST',
                url: "{{route('login-process')}}",
                data:{
                    _token:$('input[name=_token]').val(),
                    emailinput:emailinput,
                    pass_word:pass_word
                    
                },
                success:function(response){
                   //console.log(response); return;
                    // var jsonData=JSON.parse(response);
                    if(response.status=='success'){
                         window.location.href = "{{ route('home') }}";
                        // $("#Sucmsg").html(response.msg);
                        // $("#Sucmsg").show();
                        // document.getElementById("loginBtn").disabled = false;
                        // $('#login_form').trigger('reset');
                    }else{
                        toastr.error(response.msg, 'Error');
                        $("#emailErr").html(response.msg);
                        $("#emailErr").show();
                   
                        document.getElementById("loginBtn").disabled = false;
                        return false;
                    }
                   
                    
                    
                    
                    
                    },
		error: function (addToCartErrors) {
			console.log(addToCartErrors);
		},

                });
	
  });


  function IsEmail(email) {
            const regex =
/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            }
            else {
                return true;
            }
        }
        
        
        function show_someone_else(){
            $("#some-one-else").show();
            $("#my-self").hide();
        }
        function show_myself(){
            $("#some-one-else").hide();
            $("#my-self").show();
        }



        toastr.options = {
  "closeButton": true,  // Add a close button
  "debug": false,
  "newestOnTop": true,  // Show newest messages on top
  "progressBar": true,  // Display a progress bar
  "positionClass": "toast-top-right",  // Position of the toast
  "preventDuplicates": true,  // Prevent duplicate messages
  "showDuration": "300",  // How long the show animation lasts
  "hideDuration": "1000",  // How long the hide animation lasts
  "timeOut": "5000",  // How long the toast will stay visible
  "extendedTimeOut": "1000",  // Time out after user hovers over the toast
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",  // Animation for showing the toast
  "hideMethod": "fadeOut"  // Animation for hiding the toast
};
   </script>
   <script>
       var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
   </script>
   <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
        <script type="text/javascript">
        
        $("#mobile_code").intlTelInput({
            initialCountry: "in",
            separateDialCode: true,
            
        });
    </script>
       <script type="text/javascript">
      let calendar = document.querySelector('.calendar')

const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

isLeapYear = (year) => {
    return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0)
}

getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28
}

generateCalendar = (month, year) => {

    let calendar_days = calendar.querySelector('.calendar-days')
    let calendar_header_year = calendar.querySelector('#year')

    let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

    calendar_days.innerHTML = ''

    let currDate = new Date()
    if (!month) month = currDate.getMonth()
    if (!year) year = currDate.getFullYear()

    let curr_month = `${month_names[month]}`
    month_picker.innerHTML = curr_month
    calendar_header_year.innerHTML = year
    
    let first_day = new Date(year, month, 1)

    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
        let day = document.createElement('div')
        if (i >= first_day.getDay()) {
            day.classList.add('calendar-day-hover')
            day.innerHTML = i - first_day.getDay() + 1
            day.innerHTML += `<span></span>
                            <span></span>
                            <span></span>
                            <span></span>`
            if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                day.classList.add('curr-date')
            }
        }
        calendar_days.appendChild(day)
    }
}

let month_list = calendar.querySelector('.month-list')

month_names.forEach((e, index) => {
    let month = document.createElement('div')
    month.innerHTML = `<div data-month="${index}">${e}</div>`
    month.querySelector('div').onclick = () => {
        month_list.classList.remove('show')
        curr_month.value = index
        generateCalendar(index, curr_year.value)
    }
    month_list.appendChild(month)
})

let month_picker = calendar.querySelector('#month-picker')

month_picker.onclick = () => {
    month_list.classList.add('show')
}

let currDate = new Date()

let curr_month = {value: currDate.getMonth()}
let curr_year = {value: currDate.getFullYear()}

generateCalendar(curr_month.value, curr_year.value)

document.querySelector('#prev-year').onclick = () => {
    --curr_year.value
    generateCalendar(curr_month.value, curr_year.value)
}

document.querySelector('#next-year').onclick = () => {
    ++curr_year.value
    generateCalendar(curr_month.value, curr_year.value)
}

let dark_mode_toggle = document.querySelector('.dark-mode-switch')

dark_mode_toggle.onclick = () => {
    document.querySelector('body').classList.toggle('light')
    document.querySelector('body').classList.toggle('dark')
}
   </script>-->
   
   
</html>