<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('dashboard') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('dashboard') }}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo-dark-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">{{ env('APP_NAME') }}</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>

            @if(session()->get('user_type')=='admin')
            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>

            <li class="side-nav-title">Controls</li>

             <li class="side-nav-item">
                <a href="{{ route('location') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> Location </span>
                </a>
            </li>
             
             <li class="side-nav-item">
                <a href="{{ route('category') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> Category </span>
                </a>
            </li>
            
            <li class="side-nav-item">
                <a href="{{ route('subcategory') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> SubCategory </span>
                </a>
            </li>
            
            <li class="side-nav-item">
                <a href="{{ route('subsubcategory') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> Packages</span>
                </a>
            </li>
            
            <li class="side-nav-item">
                <a href="{{ route('consultant.index') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> Consultant </span>
                </a>
            </li>
           
            <li class="side-nav-item">
                <a href="{{ route('session') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> Manage Session </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('assign-session') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> Assign Session </span>
                </a>
            </li>
             @endif
            <li class="side-nav-item">
                <a href="{{ route('sloat') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> Manage Slot </span>
                </a>
            </li>
            
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#tourIdea" aria-expanded="false" aria-controls="sidebarTasks"
                    class="side-nav-link collapsed">
                    <i class="uil-lightbulb-alt"></i>
                    <span> Assign Slot Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="tourIdea" style="">
                    <ul class="side-nav-second-level">
                        
                      <li class="side-nav-item">
                            <a href="{{ route('create-assignsloat') }}" class="side-nav-link">
                                <span> Slot Assign </span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="{{ route('assignsloat.index') }}" class="side-nav-link">
                                <span> Slot Assign List </span>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </li>
            
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#tourIdea" aria-expanded="false" aria-controls="sidebarTasks"
                    class="side-nav-link collapsed">
                    <i class="uil-lightbulb-alt"></i>
                    <span> Disable Slot Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="tourIdea" style="">
                    <ul class="side-nav-second-level">
                        
                      <li class="side-nav-item">
                            <a href="{{ route('create-disable-sloat') }}" class="side-nav-link">
                                <span> Assign Disable Slot </span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="{{ route('disable-sloat') }}" class="side-nav-link">
                                <span> Disabled Slot List </span>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </li>
            
             <li class="side-nav-item">
                <a href="{{ route('booking-list') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> Manage Booking </span>
                </a>
            </li>

            <!--<li class="side-nav-item">
                <a href="{{ route('contact-list') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> Contacts </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('appointment-list') }}" class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> Appointments </span>
                </a>
            </li>

           <li class="side-nav-item">
                <a href="{{ route('testimonials') }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Testimonials </span>
                </a>
            </li>

            

           

           <li class="side-nav-item">
                <a href="{{ route('cmspage.index') }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Cms Page </span>
                </a>
            </li>-->
			
			


            <!--<li class="side-nav-title">Profile</li>

            <li class="side-nav-item">
                <a href="apps-file-manager.html" class="side-nav-link">
                    <i class="uil-cog"></i>
                    <span> Settings </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="apps-file-manager.html" class="side-nav-link">
                    <i class="uil-key-skeleton"></i>
                    <span> Change Password </span>
                </a>
            </li>-->

            <li class="side-nav-item mb-5">
                <a href="{{ route('logout') }}" class="side-nav-link">
                    <i class="uil-exit"></i>
                    <span> Logout </span>
                </a>
            </li>

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
