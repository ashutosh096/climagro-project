<?php
include("header.php");
include("navbar2.php");

?>

<!-- Hero Section -->

<!-- Climate Risks Section -->
 

<style>

html, body {
  overflow-x: hidden;
  scrollbar-width: none; /* Firefox */
  -ms-overflow-style: none;  /* IE 10+ */
}

/* For WebKit browsers (Chrome, Safari) */
html::-webkit-scrollbar, body::-webkit-scrollbar {
  display: none;
}
  
.offering-container {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    background: linear-gradient(to bottom right, #f7f9fc, #ffffff);
    padding: 0 2rem; /* Add this line */
    max-width: 1280px;
    margin: 0 auto;

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
    max-width: 100%; /* Increased from 24rem to make it wider */
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.laptop-container.visible {
    opacity: 1;
    transform: translateY(0);
}

.laptop-screen {
    background-color: #025b5f;
    border-radius: 1rem 1rem 0.5rem 0.5rem;
    padding: 0.5rem;
    height: 24rem; /* Reduced height */
    width: 100%;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    display: flex;
    flex-direction: column;
    overflow : hidden;
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
    background-color: #025b5f;
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



/* Tablet Styles */
@media (max-width: 992px) {
  .product-block {
    gap: 2rem;
  }
  
  .product-title {
    font-size: 1.8rem;
  }
  
  .product-description {
    font-size: 1rem;
  }
}

/* Mobile Styles */
@media (max-width: 768px) {
  .product-block {
    flex-direction: column;
    gap: 2rem;
  }
  
  .laptop-container {
    width: 100%;
    
    max-width: 100%;
  }
  
  .product-content {
    width: 100%;
    padding: 0 1rem;
  }
  
  .product-title {
    font-size: 1.6rem;
    margin-bottom: 1rem;
  }
  
  .product-description {
    font-size: 1rem;
    margin-bottom: 1.5rem;
  }
  
  .product-blocks {
    gap: 3rem;
  }
}

/* Small Mobile Styles */
@media (max-width: 480px) {
  .product-title {
    font-size: 1.4rem;
  }
  
  .product-tag {
    font-size: 0.75rem;
  }
  
  .demo-button {
    padding: 0.6rem 1.2rem;
    font-size: 0.9rem;
  }
  
  .laptop-screen {
    padding: 0.75rem;
    padding-top: 1.25rem;
  }
  
  .window-controls {
    top: 0.4rem;
  }
  
  .control-dot {
    width: 10px;
    height: 10px;
  }

  .laptop-container {
  flex: 1;
  min-width: 0;
  max-width: 600px;
  position: relative;
  /* Add aspect ratio constraint */
  aspect-ratio: 16/9; /* Adjust this to match your laptop mockup's ratio */
}

.laptop-screen {
  background: #1e1e1e;
  border-radius: 10px 10px 0 0;
  padding: 4% 4% 0; /* Use percentages for responsive padding */
  position: relative;
  /* Ensure content maintains aspect ratio */
  height: 0;
  padding-bottom: 56.25%; /* 16:9 aspect ratio */
}

.content-area {
  position: absolute;
  top: 8%; /* Adjusted for window controls */
  left: 4%;
  right: 4%;
  bottom: 4%;
  background: white;
  border-radius: 0.5rem;
  overflow: hidden;
}

/* Mobile adjustments */
@media (max-width: 768px) {
  .laptop-container {
    width: 100%;
    max-width: 100%;
    /* Optional: Reduce size on mobile */
    max-width: 500px;
    margin: 0 auto;
  }
  
  .laptop-screen {
    padding-top: 6%; /* Slightly more space for controls on mobile */
  }
  
  .window-controls {
    top: 0.3rem;
    left: 0.8rem;
  }
}
  
  @media (max-width: 768px) {
              .xb-item--title {
                  font-size: 2rem;
              }
              
              .about-wrap h3 {
                  font-size: 1.5rem;
              }
              .section-header {
                  margin-bottom: 60px;
              }  
              .corner-decoration {
                      font-size: 2rem;
                      color: #f26a21;
                      position: relative;
                      top: -10px;
              }  
                  

      
            }
    
  }



  </style>



<style>
  .title-wrapper {
                      position: relative;
                      display: inline-block;
                      margin-bottom: 15px;
      } 

  .subtitle-text {
                          font-size: 1.1rem;
                          letter-spacing: 2px;
                          color: #4a5568;
                          margin: 0;
                      } 

    .corner-decoration{
                      font-size: 2rem;
                      color: #f26a21;
                      position: relative;
                      top: -10px;
              }  
    .main-title {
                          font-size: 2.5rem;
                          font-weight: 700;
                          color: #025b5f ;
                          margin: 0 30px;
                          display: inline-block;
                      }

  .section-header {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                }
  .subtitle-text {
    text-transform: uppercase;
    margin-top: 10px;
    font-weight: 500;
}

</style>
  <!-- about section start-->
  <section class="offering-container">
      <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
          <div class="title-wrapper">
            <span class="corner-decoration">⌜</span>
            <h2 class="main-title">Offerings</h2>
            <span class="corner-decoration">⌝</span>
          </div>
          <p class="subtitle-text">Your Partners in Risk Intelligence</p>
        </div>
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





<style>
    .contact-icon {
      margin-right: 20px !important;
    }
    .xb-item--field{
      margin-right : 30px;
    }
    .form-results {
    min-height: 60px;
}

    .alert {
        padding: 12px 20px;
        border-radius: 4px;
        margin-bottom: 0;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }

    .error {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
        display: block;
    }
</style>


<div class="footer-contact sooter">
    <!-- <div class="footer-bg bg_img" data-background="assest/img/footer/footer-bg.png"></div> -->
    <div class="container">
        <div class="xb-contact-form">
            <div class="row g-0 mt-none-30">
                <div class="col-lg-7 mt-30">
                    <div class="xb-inner">
                        <h5 class="xb-item--sub-title text-white"><span><img src="assest/img/footer/contact.svg" alt=""></span> Contact Us</h5>
                        <h2 class="xb-item--title text-white">Do you have questions or went more information?</h2>
                        <form id="contactForm" action="<?= site_url('contact/submit') ?>" method="POST">
                            <div class="input-group">
                				<input type="hidden" id="url" name="url" value="<?php echo base_url();?>">
                			</div> 
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-user.svg" alt=""></span>
                                        <input type="text" placeholder="Steven Kevin" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-call.svg" alt=""></span>
                                        <input type="text" placeholder="+91 081 0256 023" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-email.svg" alt=""></span>
                                        <input type="email" placeholder="example@climagroanlytics.com" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-massage.svg" alt="   "></span>
                                        <select name="title" style="
                                            height: 50px; 
                                            padding: 2px 2px 2px 45px;  /* Added left padding */
                                            border-radius: 8px;          /* Added border radius */
                                            border: 1px solid #ccc;      /* Added border for better visibility */
                                            width: 100%;                 /* Ensure full width */
                                            background-color: white;     /* Ensure white background */
                                        ">
                                            <option value="">Help us understand how we can support you better.</option>
                                            <option value="Government / Policy Maker">Government / Policy Maker</option>
                                            <option value="Researcher / Academic">Researcher / Academic</option>
                                            <option value="Financial Institution / Insurer">Financial Institution / Insurer</option>
                                            <option value="NGO / Nonprofit">NGO / Nonprofit</option>
                                            <option value="Student">Student</option>
                                            <option value="Corporate Sustainability / ESG Professional">Corporate Sustainability / ESG Professional</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="xb-item--field">
                                    <span><img src="assest/img/footer/contact-massage.svg" alt="   "></span>
                                        <select name="interested" style="
                                            height: 50px; 
                                            padding: 2px 2px 2px 45px;  /* Added left padding */
                                            border-radius: 8px;          /* Added border radius */
                                            border: 1px solid #ccc;      /* Added border for better visibility */
                                            width: 100%;                 /* Ensure full width */
                                            background-color: white;     /* Ensure white background */
                                        ">
                                            <option value="" >Interested In (Optional)</option>
                                            <option value="AgRI.ai">AgRI.ai</option>
                                            <option value="CityAdapt.ai">CityAdapt.ai</option>
                                            <option value="Climate Data Services">Climate Data Services</option>
                                            <option value="Climate Consulting">Climate Consulting</option>
                                            <option value="Collaborations">Collaborations / Research</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div> 
                                
                                
                                <div class="col-lg-12 xb-item--text-msg">
                                    <span><img src="assest/img/footer/contact-massage.svg" alt=""></span>
                                    <textarea class="xb-item--massage" name="comment" id="message" cols="30" rows="10" placeholder="Simultaneously we had a problem..."></textarea>
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

<script>
  $(document).ready(function() {
          $('#contactForm').on('submit', function(e) {
              e.preventDefault();
              
              // Clear previous messages
              $('.form-results').html('').removeClass('d-none');
              
              // Show loading state
              $('.form-results').html('<div class="alert alert-info">Sending your message...</div>');

              $.ajax({
                  type: 'POST',
                  url: $(this).attr('action'),
                  data: $(this).serialize(),
                  dataType: 'json',
                  success: function(response) {
                      if (response.success) {
                          $('.form-results').html('<div class="alert alert-success">' + response.message + '</div>');
                          // Optional: Reset form
                          $('#contactForm')[0].reset();
                      } else {
                          $('.form-results').html('<div class="alert alert-danger">' + response.message + '</div>');
                      }
                  },
                  error: function(xhr, status, error) {
                      console.error("AJAX Error:", status, error, xhr.responseText);
                      $('.form-results').html('<div class="alert alert-danger">There was an unexpected error. Please try again later.</div>');
                  }
              });
          });
      });
</script>


<?php include("footer.php"); ?>
