<?php
include("header.php");
include("navbar2.php");

?>

<!-- Hero Section -->

<!-- Climate Risks Section -->
 

<style>
  /* Wrapper fix to prevent right scrollbar */
body {
  overflow-x: hidden;
}

/* Optional: prevent horizontal scroll from laptop content */
.laptop-container,
.product-content,
.offering-container {
  max-width: 100%;
  overflow-x: hidden;
}

/* Ensure laptop screen scales better on smaller devices */
.laptop-screen {
  height: auto;
  min-height: 18rem;
  max-height: 10rem;
  padding: 0.2rem;
  box-sizing: border-box;
}

/* Make laptop content scroll properly on small screens */
.content-area {
  max-height: 16rem;
  overflow-y: auto;
}

/* Responsive tweaks for mobile */
@media (max-width: 768px) {
  .laptop-frame {
    padding: 1rem;
  }

  .product-content {
    padding: 1rem;
    text-align: center;
  }

  .laptop-container {
    max-width: 100%;
  }
}

  
.offering-container {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    background: linear-gradient(to bottom right, #f7f9fc, #ffffff);
    padding: 0 2rem; /* Add this line */
}

@media (min-width: 1024px) {
    .offering-container {
        flex-direction: row;
    }
}

.laptop-frame {
    width: 100%;
    padding: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

@media (min-width: 1024px) {
    .laptop-frame {
        width: 50%;
        padding: 4rem;
    }
}

.laptop-container {
    position: relative;
    width: 100%;
    max-width: 31rem; /* Increased from 24rem to make it wider */
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.laptop-container.visible {
    opacity: 1;
    transform: translateY(0);
}

.laptop-screen {
    background-color: #1f2937;
    border-radius: 1rem 1rem 0.5rem 0.5rem;
    padding: 0.5rem;
    height: 20rem; /* Reduced height */
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    display: flex;
    flex-direction: column;
}

.window-controls {
    display: flex;
    gap: 0.25rem;
    margin-bottom: 0.5rem;
}

.control-dot {
    width: 0.625rem;
    height: 0.625rem;
    border-radius: 9999px;
}


.content-area {
    background-color: white;
    border-radius: 0.5rem;
    overflow-y: hidden;        /* enable vertical scroll */
    flex: 1;                 /* allow to fill available height */
    padding: 1rem;
}

.content-header {
    padding: 1rem;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.laptop-base {
    background-color: #374151;
    height: 0.5rem; /* Reduced from 1rem */
    margin: 0 2rem;
    border-radius: 0 0 0.5rem 0.5rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

.product-content {
    width: 100%;
    padding: 2rem;
    display: flex;
    align-items: center;
}

@media (min-width: 1024px) {
    .product-content {
        width: 50%;
        padding: 4rem;
    }
}

.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}

.progress-bar {
    width: 6rem;
    height: 0.5rem;
    background-color: #e5e7eb;
    border-radius: 9999px;
}

.progress-fill {
    height: 100%;
    border-radius: 9999px;
    transition: width 1.5s ease-out;
}
.product-block {
  display: flex;
  flex-direction: column; /* Stack vertically on mobile */
  margin-bottom: 5rem;
  padding: 0 2rem; /* Add this line */
}

/* On larger screens: switch to side-by-side (horizontal) layout */
@media (min-width: 1024px) {
  .product-block {
    flex-direction: row;
    align-items: center;
    gap: 2rem;
    padding: 0 2rem; /* Add this line */
  }

  /* Flip layout for even-numbered products */
  .product-block:nth-child(even) {
    flex-direction: row-reverse;
  }
}
.container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 1.5rem;
}



</style>
<!-- about section start-->
<section class="offering-container">
  <div class="container">
    
    <!-- First Product Block -->
    <div class="product-block">
      <!-- Laptop Frame -->
      <div class="laptop-container fade-in">
        <div class="laptop-screen">
          <div class="window-controls">
            <div class="control-dot" style="background-color: #ef4444;"></div>
            <div class="control-dot" style="background-color: #f59e0b;"></div>
            <div class="control-dot" style="background-color: #10b981;"></div>
          </div>
          <div class="content-area" style="padding: 1rem;">
            <img src="assest/img/about/AgRI.png" alt="Agriculture Risk Analysis Dashboard" style="width: 100%; border-radius: 0.5rem;">
          </div>
        </div>
        <div class="laptop-base"></div>
      </div>

      <!-- Text Content -->
      <div class="product-content">
        <div style="max-width: 36rem;">
          <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
            AGRICULTURE RISK INTELLIGENCE
          </div>
          <h2 class="fade-in" style="font-size: 2.25rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
            AgRI.ai – Agriculture Risk Intelligence 
          </h2>
          <p class="fade-in" style="color: #4b5563; font-size: 1.125rem; margin-bottom: 2rem;">
            AgRI.ai is a crop-location-specific risk estimator that uses AI and machine learning to analyze crop-climate interactions through historical data. Integrating diverse datasets, AgRI.ai provides historical, current , short-term , medium-term, and long-term risk assessments.
          </p>
          <div class="fade-in">
            <a href="#consult-us" class="login-btn" style="display: inline-flex; align-items: center; gap: 0.5rem;">
              Request Demo
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Second Product Block -->
    <div class="product-block">
      <!-- Laptop Frame -->
      <div class="laptop-container fade-in">
        <div class="laptop-screen">
          <div class="window-controls">
            <div class="control-dot" style="background-color: #ef4444;"></div>
            <div class="control-dot" style="background-color: #f59e0b;"></div>
            <div class="control-dot" style="background-color: #10b981;"></div>
          </div>
          <div class="content-area" style="padding: 1rem;">
            <img src="assest/img/about/CityAdapt.png" alt="Agriculture Risk Analysis Dashboard" style="width: 100%; border-radius: 0.5rem;">
          </div>
        </div>
        <div class="laptop-base"></div>
      </div>

      <!-- Text Content -->
      <div class="product-content">
        <div style="max-width: 36rem;">
          <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
            CLIMATE RISK INTELLIGENCE
          </div>
          <h2 class="fade-in" style="font-size: 2.25rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
            CityAdapt.ai – Urban Climate Risk Intelligence 
          </h2>
          <p class="fade-in" style="color: #4b5563; font-size: 1.125rem; margin-bottom: 2rem;">
            Gain deep insights into climate risks with ward-level vulnerability assessments and identification of high-risk hotspots. Track projected warming levels up to 2100 with annual updates, monitor greenhouse gas emissions, and access comprehensive socio-economic and demographic profiles to support data-driven urban resilience planning.
          </p>
          <div class="fade-in">
            <a href="#consult-us" class="login-btn" style="display: inline-flex; align-items: center; gap: 0.5rem;">
              Request Demo
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Third Product Block -->
    <div class="product-block">
      <!-- Laptop Frame -->
      <div class="laptop-container fade-in">
        <div class="laptop-screen">
          <div class="window-controls">
            <div class="control-dot" style="background-color: #ef4444;"></div>
            <div class="control-dot" style="background-color: #f59e0b;"></div>
            <div class="control-dot" style="background-color: #10b981;"></div>
          </div>
          <div class="content-area" style="padding: 1rem;">
            <img src="assest/img/about/mokd.png" alt="Agriculture Risk Analysis Dashboard" style="width: 100%; border-radius: 0.5rem;">
          </div>
        </div>
        <div class="laptop-base"></div>
      </div>
      <!-- Text Content -->
      <div class="product-content">
        <div style="max-width: 36rem;">
          <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
            CLIMATE DATA SERVICES
          </div>
          <h2 class="fade-in" style="font-size: 2.25rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
            Climate Data Services 
          </h2>
          <p class="fade-in" style="color: #4b5563; font-size: 1.125rem; margin-bottom: 2rem;">
            Access high-resolution climate and weather hazard maps for heatwaves, droughts, floods, and more. Explore multi-resolution climate data across block, district, and regional levels with flexible temporal scales. Get tailored climate risk mapping for vulnerable regions and sectors, along with sector-specific indices like dry/wet spell frequency and extreme heat days to support informed decision-making.
          </p>
          <div class="fade-in">
            <a href="#climatedata" class="login-btn" style="display: inline-flex; align-items: center; gap: 0.5rem;">
              Try for Free
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Third Product Block -->
    <div class="product-block">
      <!-- Laptop Frame -->
      <div class="laptop-container fade-in">
        <div class="laptop-screen">
          <div class="window-controls">
            <div class="control-dot" style="background-color: #ef4444;"></div>
            <div class="control-dot" style="background-color: #f59e0b;"></div>
            <div class="control-dot" style="background-color: #10b981;"></div>
          </div>
          <div class="content-area" style="padding: 1rem;">
            <img src="assest/img/about/Consulting.png" alt="Agriculture Risk Analysis Dashboard" style="width: 100%; border-radius: 0.5rem;">
          </div>
        </div>
        <div class="laptop-base"></div>
      </div>
      <!-- Text Content -->
      <div class="product-content">
        <div style="max-width: 36rem;">
          <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
            CLIMATE CONSULTING SERVICES
          </div>
          <h2 class="fade-in" style="font-size: 2.25rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
            Climate Consulting  
          </h2>
          <p class="fade-in" style="color: #4b5563; font-size: 1.125rem; margin-bottom: 2rem;">
              Delivering climate risk assessment reports tailored for corporate institutions, enterprises, governments , and NGOs. our services provide sector-specific climate impact analysis to guide effective risk mitigation. We also offer customized climate adaptation and resilience planning to support long-term sustainability and preparedness.          </p>
          <div class="fade-in">
            <a href="#consult-us" class="login-btn" style="display: inline-flex; align-items: center; gap: 0.5rem;">
              Request Demo
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
      
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.fade-in, .laptop-container').forEach(el => observer.observe(el));
});
</script>








<div class="footer-contact sooter" id="consult-us">
    <!-- <div class="footer-bg bg_img" data-background="assest/img/footer/footer-bg.png"></div> -->
    <div class="container">
        <div class="xb-contact-form">
            <div class="row g-0 mt-none-30">
                <div class="col-lg-7 mt-30">
                    <div class="xb-inner">
                        <h5 class="xb-item--sub-title text-white"><span><img src="assest/img/footer/contact.svg" alt=""></span> Contact</h5>
                        <h2 class="xb-item--title text-white">Do you have questions or went more information?</h2>
                        <form class="xb-item--form" action="#!">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-user.svg" alt=""></span>
                                        <input type="text" placeholder="Steven Kevin">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-email.svg" alt=""></span>
                                        <input type="email" placeholder="example@cryco.com">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-call.svg" alt=""></span>
                                        <input type="text" placeholder="+91 081 0256 023">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="xb-item--field">
                                        <!-- <span><img src="assest/img/footer/contact-call.svg" alt=""></span> -->
                                        <select style="height: 57px;padding: 8px;border-radius: 10px;">
                                            <option value="Climate Data">Climate Data</option>
                                            <option value="Agricultural Data">Agricultural Data</option>
                                            <option value="Socio-Demographic Data">Socio-Demographic Data</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 xb-item--text-msg">
                                    <span><img src="assest/img/footer/contact-massage.svg" alt=""></span>
                                    <textarea class="xb-item--massage" name="message" id="message" cols="30" rows="10" placeholder="Simultaneously we had a problem..."></textarea>
                                </div>
                                <div class="col-lg-12 xb-item--contact-btn">
                                    <button class="them-btn" type="submit">
                                        <span class="btn_label" data-text="Send Message">Send Message</span>
                                        <span class="btn_icon">
                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mt-30">
                    <div class="footer-apps">
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title text-white">Discover Future of Climate Risk Management </h2>
                            <p class="xb-item--content text-white">Unlock the power of advanced climate risk intelligence with a personalized demo! See firsthand how our cutting- edge solutions can help you navigate climate uncertainties. </p>
                            <h2 class="xb-item--title text-white">What You’ll Experience:</h2>
                            <ol>
                                <li>Climate-Induced Agricultural Risks  </li>
                                <li>
                                    Crop-Specific Vulnerability </li>
                                <li>Integration of Climate, Agricultural, and Management Data: </li>
                                <li>Localized Risk Estimation </li>
                                <li>Adaptation and Mitigation Strategies </li>
                                <li>Expert Guidance: Engage with our specialists who will answer your questions and show how our solutions can address your specific challenges. </li>
                            </ol>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("footer.php"); ?>
