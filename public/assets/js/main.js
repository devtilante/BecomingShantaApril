class MyHeader extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
             <header class=" d-flex">
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <img src="./assets/images/logo.png" alt="logo">
                </div>
                <div class="mobileMenu">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="col-10 reponsiveheader">
                    <div class="headerNavigationMain col-7 d-flex align-items-center">
                        <div class="headerNavigation">
                            <p>Services</p>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="headerNavigation">
                            <p>Resources</p>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="headerNavigation">
                            <p>Contact Us</p>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="headerNavigation">
                            <p>Event</p>
                        </div>
                    </div>
                    <div class="col-3 d-flex justify-content-end align-items-center">
                        <div class="searchIcon">
                            <img src="./assets/images/icons/Search.png">
                        </div>
                        <div class="loginOrRegisterBtn">
                            <div><p><a href="registration.html" class"loginregister">Login / Register</a></p></div>
                        </div>
                    </div>
                
                </div>
             
             </header>
          
          
          
          `;

    const mobileMenu = this.querySelector(".mobileMenu");
    mobileMenu.addEventListener("click", () => {
      this.toggleResponsiveHeader();
    });
  }
  toggleResponsiveHeader() {
    const responsiveHeader = this.querySelector(".reponsiveheader");
    responsiveHeader.classList.toggle("active");
  }
}

customElements.define("custom-header", MyHeader);

class CommonHeadLineDiv extends HTMLElement {
  connectedCallback() {
    const headingText = this.getAttribute("heading-text");
    this.innerHTML = `
            <section class="HeadingBox">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-8">
                    <h2 class="headingText">${headingText}</h2>
                    <span>* <span>marked input fields are required</span></span>
                    </div>
                    <div class="col-4 backtohomebtn">
                        <a href="https://shanta.arjunglasshouse.com/" >
                            <i class="fa fa-arrow-left"></i>
                            <p class="back">Back to home</p>
                        </a>
                    </div>
                </div>
            
            </section>
        
        
        `;
  }
}
customElements.define("common-heading-box", CommonHeadLineDiv);

class CommonBannerHeading extends HTMLElement {
  connectedCallback() {
    const bannerImg = this.getAttribute("banner-img");
    const bannerHeading = this.getAttribute("banner-heading");
    const bannerDescription = this.getAttribute("banner-description");
    this.innerHTML = `
        <section class="mainBanner">
            <div class="col-lg-6 col-md-6 col-sm-12 h-100">
                <div class="bannerimg">
                    <img  src=${bannerImg} alt="bannerimg">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 bannerDetails" >
                <div class="bannerHeading">
                    <h2 class="headingText">${bannerHeading}</h2>    
                </div>
                <div>
                    <div>${bannerDescription}</div>    
                </div>
                <div class="bannerDetailsButtons">
                    <button class="bookConsultationBtn">Book a Consultation</button>
                    <button class="bookConsultationBtn letGuideBtn">Let us Guide You</button>
                
                </div>
            </div>
        
        </section>
        
        
        
        `;
  }
}

customElements.define("common-banner-heading", CommonBannerHeading);

class Footer extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
        <footer>
            <div class="col-4 footerContactSection">
                <div class="logodiv">
                    <img src="./assets/images/logo.png" alt="logo" >
                </div>
                <a href="tel:+91 90197 16005">+91 90197 16005</a>
                <a href="mailto:admin@becomingshanta.com">admin@becomingshanta.com</a>

                <button class="bookConsultationBtn">Book a Consultation</button>
            </div>
            <div class="col-8 d-flex">
                <div class="col-lg-4 col-md-4 col-sm-1 footerLinkMain">
                    <div><p class="footerLinksHeading">Quick Links</p></div>

                    <div><a href="#" class="footerQuickLink">Services & Consultants</a></div>
                    <div><a href="#" class="footerQuickLink">Contact Us</a></div>
                    <div><a href="#" class="footerQuickLink">FAQs</a></div>
                    <div><a href="#" class="footerQuickLink">Events</a></div>
                    <div><a href="#" class="footerQuickLink">Resources</a></div>
                    
                    
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-1 footerLinkMain">
                    <div><p class="footerLinksHeading">Quick Links</p></div>

                    <div><a href="#" class="footerQuickLink">Cancellation Policy</a></div>
                    <div><a href="#" class="footerQuickLink">Work with Us</a></div>
                    <div><a href="#" class="footerQuickLink">FAQs</a></div>
                    <div><a href="#" class="footerQuickLink">Events</a></div>
                    <div><a href="#" class="footerQuickLink">Resources</a></div>
                    
                    
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-1 footerLinkMain">
                    <div><p class="footerLinksHeading">Follow Us </p></div>
                    <div>
                    
                        <a href="#" class="footerSocialLink"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="footerSocialLink"><i class="fa-brands fa-whatsapp"></i></a>
                    
                    </div>
                   
                    
                    
                    
                </div>
            </div>
        
        </footer>
        
        `;
  }
}

customElements.define("custom-footer", Footer);
