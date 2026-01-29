<?php
include("header.php");
include("navbar1.php");
include ("services_data.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Page</title>
    <?php include 'application/views/front/frontpagestyle.php'; ?>
</head>
<body>
    <!-- Your content -->
</body>
</html>

<style>
/* Slightly taller on mobile */
/* Industries Section Optimized Styles /
.industries-section {
width: 100%;
max-width: 100vw; / Ensure it doesn't exceed viewport width /
padding: 2rem 0;
box-sizing: border-box;
overflow-x: hidden;
margin: 0; / Remove any default margins /
text-align: center; / Center all text elements by default */
}
.industries-section h1,
.industries-section h2:not(.card-front h2) {
text-align: center;
color: #1f2937;
font-size: 2rem;
margin-bottom: 4rem;
font-weight: bold;
width: 100%; /* Ensure the header takes full width /
max-width: 100%; / Ensure no constraints limit the width */
}
/* Center the description paragraph */
.industries-section > p {
text-align: center;
max-width: 700px;
margin: 0 auto 2rem;
color: #4b5563;
margin-top: 0rem;
}
.industries-section {
  margin-top: 0rem; /* Or 2rem, depending on how much space you want */
}

.industries-section .card-grid {
display: flex;
flex-direction: column;
gap: 2rem;
width: 100%;
max-width: 1200px;
margin: 0 auto;
padding: 0 1rem; /* Small horizontal padding to prevent cards from touching edges on medium screens */
}
.industries-section .card-grid .row {
display: flex;
flex-wrap: wrap;
justify-content: center;
gap: 2rem;
width: 100%;
margin: 0; /* Remove any default margins */
}
.industries-section .card-grid .card-container {
width: 18rem;
height: 18rem;
perspective: 1000px;
margin: 0;
flex-shrink: 0; /* Prevent cards from shrinking */
}
.industries-section .card-grid .card-container:hover {
transform: scale(1.05);
transition: transform 0.3s ease-in-out;
}
.industries-section .card-grid .card-wrapper {
position: relative;
width: 100%;
height: 100%;
transition: transform 1.5s;
transform-style: preserve-3d;
}
.industries-section .card-grid .card-container:hover .card-wrapper {
transform: rotateY(180deg);
}
.industries-section .card-grid .card-front,
.industries-section .card-grid .card-back {
position: absolute;
width: 100%;
height: 100%;
backface-visibility: hidden;
border-radius: 0.75rem;
box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
transition: all 0.3s ease-in-out;
border: 1px solid #e5e7eb;
}
.industries-section .card-grid .card-container:hover .card-front,
.industries-section .card-grid .card-container:hover .card-back {
border: 3px solid #025b5f;
box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}
.industries-section .card-grid .card-front {
display: flex;
align-items: center;
justify-content: center;
background-size: cover;
background-position: center;
}
.industries-section .card-grid .card-front h2 {
color: white;
font-size: 1.5rem;
font-weight: bold;
text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
text-align: center;
padding: 1rem;
margin-bottom: 0; /* Override the margin for h2 inside card-front */
}
.industries-section .card-grid .card-back {
background: white;
transform: rotateY(180deg);
padding: 1.5rem;
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
}
.industries-section .card-grid .card-back h3 {
font-size: 1.25rem;
color: #1f2937;
margin-bottom: 1rem;
text-align: center;
}
.industries-section .card-grid .card-back p {
color: #4b5563;
text-align: center;
line-height: 1.5;
font-size: 0.95rem;
margin: 0; /* Remove default paragraph margins */
}
/* Text color classes */
.industries-section .text-white {
color: white !important;
}
.industries-section .text-Black,
.industries-section .text-Green {
color: #1f2937;
}
.industries-section .text-Green {
color: #10b981;
}
/* Improved responsive behavior */
@media (max-width: 1400px) {
.industries-section .card-grid {
max-width: 95%;
}
}
@media (max-width: 1200px) {
.industries-section .card-grid {
max-width: 90%;
}
.industries-section .card-grid .row {
gap: 1.5rem;
}
}
@media (max-width: 768px) {
.industries-section .card-grid .row {
flex-direction: column;
align-items: center;
gap: 1.5rem;
}
.industries-section .card-grid .card-container {
width: 100%;
max-width: 280px;
height: 320px;
}
}
/* Fix for potential overflow issues */
@media (max-width: 576px) {
.industries-section {
padding: 2rem 0.5rem;
margin-top: 4rem;
}
.industries-section .card-grid {
padding: 0 0.5rem;
}

}

.video-container {
    position: relative;
    width: 100%;
    max-width: 100%;
    margin: 0 auto;
    border-radius: 12px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    aspect-ratio: 16 / 9;
    max-height: 400px;
    overflow: hidden;
    display: block;
    left:20px;
    top:60px;
}

.video-container::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    border-radius: 12px;
    box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.1);
    z-index: 1;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 12px;
    border: none;
    z-index: 0;
}

/* Add a play button overlay as a fallback if autoplay doesn't work */
.video-container.with-overlay {
    cursor: pointer;
}

.video-container.with-overlay::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80px;
    height: 80px;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 50%;
    z-index: 2;
    transition: all 0.3s ease;
}

.video-container.with-overlay::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-40%, -50%);
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    border-left: 30px solid var(--color-primary, #333);
    z-index: 3;
    transition: all 0.3s ease;
}

.video-container.with-overlay:hover::before {
    background-color: rgba(255, 255, 255, 0.9);
    width: 85px;
    height: 85px;
}

@media (max-width: 768px) {
    .video-container {
        padding-bottom: 0%; /* Slightly taller on mobile */
    }
    
    .video-container.with-overlay::before {
        width: 60px;
        height: 60px;
    }
    
    .video-container.with-overlay::after {
        border-top: 15px solid transparent;
        border-bottom: 15px solid transparent;
        border-left: 22px solid var(--color-primary, #333);
    }
}


.feature-section {
  background: linear-gradient(to right, #f8fbff, #eef5fa);
  padding-top: 110px;
  padding-bottom: 80px;
}

.section-title .title {
  font-size: 2.5rem;
  font-weight: 700;
  color: #025b5f;
  margin-top : 2rem;
}

.section-title .subtitle {
  font-size: 1.1rem;
  color: #025b5f;
  margin-top: 0.5rem;
  margin-bottom: 2rem;
}

.feature-card {
  background: #ffffff;
  border: 1px solid #e5e7eb;
  border-radius: 1rem;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
}

.feature-title {
  font-size: 1.4rem;
  font-weight: 600;
  color: #0d6efd;
}

.feature-content {
  font-size: 0.95rem;
  line-height: 1.6;
}

.btn-outline-primary {
  border: 1px solid #0d6efd;
  color: #0d6efd;
  transition: 0.3s;
}

.btn-outline-primary:hover {
  background-color: #0d6efd;
  color: #fff;
}


@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
}

.offering-card {
  backdrop-filter: blur(12px);
  transition: all 0.5s ease;
  background: linear-gradient(135deg, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0.1) 100%);
  border: 1px solid rgba(255,255,255,0.2);
}

.offering-card:hover {
  transform: scale(1.02);
  box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.icon-container {
  animation: float 6s ease-in-out infinite;
}

.mesh-bg {
  background-image: url('https://images.pexels.com/photos/7130498/pexels-photo-7130498.jpeg?auto=compress&cs=tinysrgb&w=1920');
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  opacity: 0.1;
}

.theme-forest { background: linear-gradient(135deg, rgba(57, 255, 20, 0.2), rgba(44, 122, 57, 0.1)); border-color: rgba(57, 255, 20, 0.3); }
.theme-ocean { background: linear-gradient(135deg, rgba(0, 255, 255, 0.2), rgba(0, 102, 204, 0.1)); border-color: rgba(0, 255, 255, 0.3); }
.theme-earth { background: linear-gradient(135deg, rgba(255, 255, 0, 0.2), rgba(139, 111, 78, 0.1)); border-color: rgba(255, 255, 0, 0.3); }
.theme-sky { background: linear-gradient(135deg, rgba(255, 0, 255, 0.2), rgba(74, 144, 226, 0.1)); border-color: rgba(255, 0, 255, 0.3); }

.icon-forest { background: linear-gradient(135deg, #39FF14, #2c7a39); }
.icon-ocean { background: linear-gradient(135deg, #00FFFF, #0066cc); }
.icon-earth { background: linear-gradient(135deg, #FFFF00, #8b6f4e); }
.icon-sky { background: linear-gradient(135deg, #FF00FF, #4a90e2); }






</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add a class if we want to show the play button overlay initially
    // Uncomment the next line if you want to show the play button overlay
    // document.querySelector('.video-container').classList.add('with-overlay');
    
    // Function to handle click on video container if it has the overlay
    document.querySelector('.video-container').addEventListener('click', function() {
        if (this.classList.contains('with-overlay')) {
            // Get the iframe and update its src
            const iframe = this.querySelector('iframe');
            const src = iframe.src;
            
            // Remove any existing autoplay parameter and add it again
            if (src.includes('autoplay=0') || !src.includes('autoplay=')) {
                iframe.src = src.replace('autoplay=0', 'autoplay=1').replace('mute=0', 'mute=1');
                if (!src.includes('autoplay=')) {
                    iframe.src = iframe.src + '&autoplay=1&mute=1';
                }
            }
            
            // Remove the overlay
            this.classList.remove('with-overlay');
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.getElementById('partnersWrapper');
            const container = document.querySelector('.partners-scroll-container');
            const leftBtn = document.getElementById('scrollLeft');
            const rightBtn = document.getElementById('scrollRight');
            const scrollAmount = 400;
            let autoScrollInterval;
            let isHovering = false;
            
            // Start auto-scroll when page loads
            startAutoScroll();
            
            // Update button states initially
            updateButtonStates();
            
            // Stop auto-scroll when hovering over the container
            container.addEventListener('mouseenter', function() {
                isHovering = true;
                stopAutoScroll();
            });
            
            // Resume auto-scroll when not hovering
            container.addEventListener('mouseleave', function() {
                isHovering = false;
                startAutoScroll();
            });
            
            // Manual scroll buttons
            leftBtn.addEventListener('click', function() {
                stopAutoScroll();
                container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                setTimeout(updateButtonStates, 300);
                
                // Resume auto-scroll after a delay if not hovering
                if (!isHovering) {
                    setTimeout(startAutoScroll, 2000);
                }
            });
            
            rightBtn.addEventListener('click', function() {
                stopAutoScroll();
                container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                setTimeout(updateButtonStates, 300);
                
                // Resume auto-scroll after a delay if not hovering
                if (!isHovering) {
                    setTimeout(startAutoScroll, 2000);
                }
            });
            
            container.addEventListener('scroll', function() {
                updateButtonStates();
            });
            
            function updateButtonStates() {
                leftBtn.disabled = container.scrollLeft <= 0;
                rightBtn.disabled = container.scrollLeft >= container.scrollWidth - container.clientWidth - 5;
                
                // If we reached the end, scroll back to start after a slight pause when auto-scrolling
                if (container.scrollLeft >= container.scrollWidth - container.clientWidth - 5 && autoScrollInterval) {
                    stopAutoScroll();
                    setTimeout(function() {
                        container.scrollTo({ left: 0, behavior: 'smooth' });
                        setTimeout(function() {
                            if (!isHovering) {
                                startAutoScroll();
                            }
                        }, 800);
                    }, 1000);
                }
            }
            
            function startAutoScroll() {
                if (autoScrollInterval) return;
                
                autoScrollInterval = setInterval(function() {
                    // Move right by small increments for a smooth effect
                    container.scrollBy({ left: 1, behavior: 'auto' });
                    
                    // Check if we need to update button states
                    updateButtonStates();
                }, 30);
            }
            
            function stopAutoScroll() {
                if (autoScrollInterval) {
                    clearInterval(autoScrollInterval);
                    autoScrollInterval = null;
                }
            }
            
            // For touch/drag devices
            let isDragging = false;
            let startX, scrollLeftStart;
            
            container.addEventListener('mousedown', function(e) {
                isDragging = true;
                startX = e.pageX - container.offsetLeft;
                scrollLeftStart = container.scrollLeft;
                stopAutoScroll();
            });
            
            container.addEventListener('mouseleave', function() {
                isDragging = false;
                if (!isHovering) {
                    setTimeout(startAutoScroll, 2000);
                }
            });
            
            container.addEventListener('mouseup', function() {
                isDragging = false;
                if (!isHovering) {
                    setTimeout(startAutoScroll, 2000);
                }
            });
            
            container.addEventListener('mousemove', function(e) {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - container.offsetLeft;
                const walk = (x - startX) * 2; // Scroll speed
                container.scrollLeft = scrollLeftStart - walk;
                updateButtonStates();
            });
            
            // Add touch support
            container.addEventListener('touchstart', function(e) {
                isDragging = true;
                startX = e.touches[0].pageX - container.offsetLeft;
                scrollLeftStart = container.scrollLeft;
                stopAutoScroll();
            });
            
            container.addEventListener('touchend', function() {
                isDragging = false;
                setTimeout(startAutoScroll, 2000);
            });
            
            container.addEventListener('touchmove', function(e) {
                if (!isDragging) return;
                const x = e.touches[0].pageX - container.offsetLeft;
                const walk = (x - startX) * 2;
                container.scrollLeft = scrollLeftStart - walk;
                updateButtonStates();
            });
            
            // Pause auto-scroll when page is not visible
            document.addEventListener('visibilitychange', function() {
                if (document.hidden) {
                    stopAutoScroll();
                } else if (!isHovering) {
                    startAutoScroll();
                }
            });
        });




//what we offer 
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.offering-card');
    
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
        
        card.addEventListener('mouseenter', () => {
            card.querySelector('.explore-icon').style.opacity = '1';
        });
        
        card.addEventListener('mouseleave', () => {
            card.querySelector('.explore-icon').style.opacity = '0';
        });
    });
});


</script>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Typed('#typed-text2', {
        strings: ['Digitize Risk',
            'Design Resilience', 
            'Deliver Sustainability',],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true,
        showCursor: true,
        cursorChar: ''
    });
});
</script>


<!-- hero section start  -->
<section class="hero hero-two pos-rel pt-60 mb-0">
    <?php
    foreach ($sliderlist as $slider) { ?>
        <div class="hero-img" data-background="assest/img/bg/Bg3_croppng.png"></div>


        <div class="container pos-rel">
            <div class="hero__content-wrap hero-style-two text-center">
                <h2 class="title" style="color: #fff; margin-bottom: 0.5rem;">We <span id="typed-text2" style="color: var(--color-primary);"></span></h2>
                <div class="section-title hero--sec-titlt-two wow fadeInUp" data-wow-duration=".7s" style="margin-bottom: 0.8rem;">

                    <h1 class="title text-white" style="margin-bottom: 0.5rem;"><?php echo $slider->slide_title; ?></h1>
                </div>
                <p class="xb-item--content wow fadeInUp text-white" data-wow-duration=".7s" data-wow-delay="150ms" style="margin-bottom: 1rem;"><?php echo $slider->content;
                                                                                                                    ?> </p>
                <div class="hero__btn btns pt-10 wow fadeInUp" data-wow-duration=".7s" data-wow-delay="250ms">
                    <a class="them-btn open-walkthrough-modal" href="javascript:void(0);">
                        <span class="btn_label" data-text="Book a Walkthrough">Book a Walkthrough</span>
                        <span class="btn_icon">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                            </svg>
                        </span>
                    </a>
                    <a href="<?php echo base_url('solutions');?>" class="them-btn btn-transparent">
                        <span class="btn_label" data-text="Explore More">Explore More</span>
                        <span class="btn_icon">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                            </svg>
                        </span>
                    </a>
                </div>
                <div class="climate-section">
                <div class="container-video">
                    <div class="row align-items-center">
                        <!-- Video Column (Left Side) -->
                        <div class="col-lg-6">
                            <div class="video-container wow fadeInUp" data-wow-duration=".7s" data-wow-delay="350ms">
                                <iframe 
                                  src="https://www.youtube.com/embed/5TyCK_cyFTs?si=8Pbk3hzGRLI6tkh4&autoplay=1&mute=1&start=2&controls=1" 
                                  title="YouTube video player" 
                                  allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                  referrerpolicy="strict-origin-when-cross-origin" 
                                  allowfullscreen
                                  autoplay
                                  >
                                </iframe>
                            </div>
                        </div>
            
            <!-- Content Column (Right Side) -->
            <div class="col-lg-6">
                <div class="climate-content wow fadeInUp" data-wow-duration=".7s" data-wow-delay="450ms" >
                    <h4 style = "color : #025b5f ; margin-top :7rem ; margin-right :7rem">At ClimAgro,</h4>
                    <h3 style = "color : #025b5f ; font-weight : bold">Discover Future of Climate Risk Management</h3>
                    <h5 class ="tile-content" style = "color : #025b5f ; margin-top :3rem">Unlock the power of advanced climate risk intelligence with a personalized demo! See firsthand how our cutting- edge solutions can help you navigate climate uncertainties.</h5>
                    <!-- <h2 style = "color : #025b5f"> Delivering Sustainability.</h2> -->
                    <p></p>
                    <br>

                    <a class="btn btn-primary open-walkthrough-modal" style="background-color: #c8ff08; color: #000;" href="javascript:void(0);">Book a Walkthrough</a>

                </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>



<section class="tile-grid-wrapper">
  <div class="tile-grid container">
    <div class="text-center mb-5">
      <h2 class="section-title">You’ll Experience</h2>
    </div>

    <!-- First Row -->
    <div class="tile-row">
      <div class="tile">
        <div class="tile-content">
          <h3>Climate-Induced Agricultural Risks</h3>
        </div>
      </div>
      <div class="tile">
        <div class="tile-content">
          <h3>Crop-Specific Vulnerability</h3>
        </div>
      </div>
      <div class="tile">
        <div class="tile-content">
          <h3>Integration of Climate, Agricultural, and Management Data</h3>
        </div>
      </div>
    </div>

    <!-- Second Row -->
    <div class="tile-row">
      <div class="tile">
        <div class="tile-content">
          <h3>Localized Risk Estimation</h3>
        </div>
      </div>
      <div class="tile">
        <div class="tile-content">
          <h3>Adaptation and Mitigation Strategies</h3>
        </div>
      </div>
      <div class="tile">
        <div class="tile-content">
          <h3>Expert Guidance</h3>
        </div>
      </div>
      <div class="tile">
        <div class="tile-content">
          <h3>Custom Solutions</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Full page centering wrapper */
  .tile-grid-wrapper {
    display: flex;
    justify-content: center;
    padding: 2rem 1rem;
    overflow-x: hidden; /* Prevent horizontal scrollbar */
  }

  .tile-grid {
    width: 100%;
    max-width: 1200px;
  }

  .tile-row {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 15px;
  }

  .tile {
    flex: 1 1 calc(33.333% - 10px);
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    min-height: 150px;
    transition: background-color 0.3s ease;
  }

  .tile-row:last-child .tile {
    flex: 1 1 calc(25% - 11.25px);
  }

  .tile:hover {
    background-color: #025b5f;
    color: white;
  }

  .tile:hover h3 {
    color: white;
  }

  .tile-content {
    width: 100%;
  }

  .tile-content h3 {
    font-size: 18px;
    margin: 0;
    color: #025b5f;
    word-break: break-word;
    transition: color 0.3s ease;
  }

  /* Responsive tweaks */
  @media (max-width: 992px) {
    .tile {
      flex: 1 1 calc(50% - 10px);
    }

    .tile-row:last-child .tile {
      flex: 1 1 calc(50% - 10px);
    }
  }

  @media (max-width: 576px) {
    .tile {
      flex: 1 1 100%;
    }
  }
</style>

<style>
.offering-container {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background: linear-gradient(to bottom right, #f7f9fc, #ffffff);
        padding: 0 2rem;
    }

    .products-grid {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 100%;
    }

    .products-row {
        display: flex;
        flex-direction: column;
        gap: 4rem;
        width: 100%;
    }

    @media (min-width: 1024px) {
        .products-row {
            flex-direction: row;
            justify-content: space-between;
        }
    }

    .product-card {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-width: 0;
        margin-bottom: 4rem;
    }

    .laptop-frame {
        width: 100%;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .laptop-container {
        flex: 1;
        min-width: 0;
        max-width: 600px;
        position: relative;
        width: 100%;
        max-width: 28rem;
        aspect-ratio: 16/9;
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
        padding: 4% 4% 0;
        height: 18rem;
        position: relative;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        display: flex;
        flex-direction: column;
        overflow : hidden;
        height: 0;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
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
      position: absolute;
      top: 3%; /* Adjusted for window controls */
      left: 1%;
      right: 1%;
      bottom: 4%;
      background-color: white;
      border-radius: 0.5rem;
      overflow: hidden; /* Changed from auto to hidden */
      flex: 1;
      padding: 0; /* Changed from 1rem to 0 */
      display: flex; /* Add this */
      align-items: center; /* Add this for vertical centering */
      justify-content: center; /* Add this for horizontal centering */
    }

    .laptop-base {
        background-color: #025b5f;
        height: 0.5rem;
        margin: 0 2rem;
        border-radius: 0 0 0.5rem 0.5rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .product-content {
        width: 100%;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
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

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .content-wrapper {
        max-width: 36rem;
        text-align: center;
    }

    @media (min-width: 1024px) {
        .content-wrapper {
            text-align: left;
        }
    }


    .learn-btn {
        color: #000;                /* Default text color (black) */
        text-decoration: none;      /* No underline by default */
        transition: color 0.3s ease, text-decoration 0.3s ease;
      }

    .learn-btn:hover {
        color: #025b5f;             /* Blue on hover */
        text-decoration: underline; /* Underline appears on hover */
    }
    @media (min-width: 1024px) {
        .content-wrapper {
            text-align: left;
        }
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
</style>

<!-- about section start-->
<section class="offering-container">
  <div class="container">
  <div class="text-center mb-5">
                <h2 class="section-title">Our Offerings</h2>
                <p class="section-subtitle">Explore our core solutions designed to drive climate resilience and intelligence for forward-thinking organizations.</p>
  </div>

    <div class="products-grid">
      <!-- First Row -->
      <div class="products-row">
        <!-- First Product Card - ClimIntello -->
        <div class="product-card">
          <div class="laptop-frame">
            <div class="laptop-container fade-in">
              <div class="laptop-screen">
                <div class="window-controls">
                  <div class="control-dot" style="background-color: #ef4444;"></div>
                  <div class="control-dot" style="background-color: #f59e0b;"></div>
                  <div class="control-dot" style="background-color: #10b981;"></div>
                </div>
                <div class="content-area" style="padding: 1rem;">
                  <img src="assest/img/about/mokd.png" alt="ClimIntello Dashboard" style="width: 100%; border-radius: 0.5rem;">
                </div>
              </div>
              <div class="laptop-base"></div>
            </div>
          </div>

          <div class="product-content">
            <div class="content-wrapper">
              <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
                  CLIMATE INTELLIGENCE PLATFORM
              </div>
              <h2 class="fade-in" style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
                  ClimIntello Climate Intelligence
              </h2>
              <p class="fade-in" style="color: #4b5563; font-size: 1rem; margin-bottom: 2rem;">
                  Access multi-resolution climate data tailored for vulnerable regions with hazard maps for heatwaves, floods, droughts, and multi-level risk intelligence.
              </p>
              <div class="fade-in">
                <a href="<?php echo base_url('climintellio/request-form') ?>" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem;">
                  Request Form
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
                <a href="<?= base_url('climintellio'); ?>" class="btn btn-outline">
                  Learn more
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ms-2">
                                      <line x1="7" y1="17" x2="17" y2="7"></line>
                                      <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                  </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Second Product Card - AgRI.AI -->
        <div class="product-card">
          <div class="laptop-frame">
            <div class="laptop-container fade-in">
              <div class="laptop-screen">
                <div class="window-controls">
                  <div class="control-dot" style="background-color: #ef4444;"></div>
                  <div class="control-dot" style="background-color: #f59e0b;"></div>
                  <div class="control-dot" style="background-color: #10b981;"></div>
                </div>
                <div class="content-area" style="padding: 1rem;">
                  <img src="assest/img/about/AgRi2.png" alt="Agriculture Risk Analysis Dashboard" style="width: 100%; border-radius: 0.5rem;">
                </div>
              </div>
              <div class="laptop-base"></div>
            </div>
          </div>

          <div class="product-content">
            <div class="content-wrapper">
              <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
                AGRICULTURE RISK INTELLIGENCE
              </div>
              <h2 class="fade-in" style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
                AgRI.AI – Agriculture Risk    <br>Intelligence 
              </h2>
              <p class="fade-in" style="color: #4b5563; font-size: 1rem; margin-bottom: 2rem;">
                AgRI.ai is a crop-location-specific risk estimator that uses AI and machine learning to analyze crop-climate interactions through historical data.
              </p>
              <div class="fade-in">
                <a href="<?php echo base_url('solutions').'#consult-us' ?>" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem;">
                  Request Demo
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
                <a href="<?= base_url('solutions').'#AGRI'; ?>" class="btn btn-outline">
                  Learn more
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ms-2">
                                      <line x1="7" y1="17" x2="17" y2="7"></line>
                                      <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                  </a>
                                
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Second Row -->
      <div class="products-row">
        <!-- Third Product Card - CityAdapt.AI -->
        <div class="product-card">
          <div class="laptop-frame">
            <div class="laptop-container fade-in">
              <div class="laptop-screen">
                <div class="window-controls">
                  <div class="control-dot" style="background-color: #ef4444;"></div>
                  <div class="control-dot" style="background-color: #f59e0b;"></div>
                  <div class="control-dot" style="background-color: #10b981;"></div>
                </div>
                <div class="content-area" style="padding: 1rem;">
                  <img src="assest/img/about/CityAdapt.png" alt="CityAdapt Dashboard" style="width: 100%; border-radius: 0.5rem;">
                </div>
              </div>
              <div class="laptop-base"></div>
            </div>
          </div>

          <div class="product-content">
            <div class="content-wrapper">
              <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
                CLIMATE RISK INTELLIGENCE
              </div>
              <h2 class="fade-in" style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
                CityAdapt.AI – Urban Climate Resilience
              </h2>
              <p class="fade-in" style="color: #4b5563; font-size: 1rem; margin-bottom: 2rem;">
                  Helps cities assess ward-level risks and prepare for climate adaptation with deep data insights, risk hotspot identification, and future warming projections.
              </p>
              <div class="fade-in">
                <a href="<?php echo base_url('solutions').'#consult-us' ?>" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem;">
                  Request Demo
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
                <a href="<?= base_url('solutions').'#CLIMATE'; ?>" class="btn btn-outline">
                  Learn more
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ms-2">
                                      <line x1="7" y1="17" x2="17" y2="7"></line>
                                      <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Fourth Product Card - Climate Consulting -->
        <div class="product-card">
          <div class="laptop-frame">
            <div class="laptop-container fade-in">
              <div class="laptop-screen">
                <div class="window-controls">
                  <div class="control-dot" style="background-color: #ef4444;"></div>
                  <div class="control-dot" style="background-color: #f59e0b;"></div>
                  <div class="control-dot" style="background-color: #10b981;"></div>
                </div>
                <div class="content-area" style="padding: 1rem;">
                  <img src="assest/img/about/Consulting.png" alt="Consulting Dashboard" style="width: 100%; border-radius: 0.5rem;">
                </div>
              </div>
              <div class="laptop-base"></div>
            </div>
          </div>

          <div class="product-content">
            <div class="content-wrapper">
              <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
                CLIMATE CONSULTING SERVICES
              </div>
              <h2 class="fade-in" style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
                Climate Consulting Services
              </h2>
              <p class="fade-in" style="color: #4b5563; font-size: 1rem; margin-bottom: 2rem;">
                  Strategic consulting services supporting climate risk planning for governments, NGOs, and enterprises with custom assessments and adaptation strategies
              </p>
              <div class="fade-in">
                <a href="<?php echo base_url('solutions').'#consult-us' ?>" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem;">
                  Request Demo
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
                <a href="<?= base_url('solutions').'#CONSULTING'; ?>" class="btn btn-outline">
                  Learn more
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ms-2">
                                      <line x1="7" y1="17" x2="17" y2="7"></line>
                                      <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                </a>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
// Simple script to trigger animations when elements are in viewport
document.addEventListener('DOMContentLoaded', function() {
    const fadeElements = document.querySelectorAll('.fade-in');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });
    
    fadeElements.forEach(el => observer.observe(el));
});

document.addEventListener('DOMContentLoaded', function() {
  const fadeElements = document.querySelectorAll('.fade-in');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, {threshold: 0.1});
  
  fadeElements.forEach(el => observer.observe(el));
});
</script>






<section class="position-relative min-vh-100 py--3">
    <style>
        .ai-section {
            background-color: white;
            padding: 5rem 0;
        }
        .feature-icon {
            width: 80px;
            height: 80px;
            background-color: #f0fdf4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            transition: transform 0.3s ease;
        }
        .feature-icon svg {
            width: 24px;
            height: 24px;
            color: #166534;
        }
        .feature-card {
            text-align: center;
            transition: transform 0.3s ease;
            padding: 1.5rem 1rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .feature-card:hover {
            transform: scale(1.05);
        }
        .section-title {
            color: #025b5f;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0rem;
            margin-top : 3rem;
        }
        .section-subtitle {
            color: #025b5f;
            margin-bottom: 0rem;
            margin-top: 1rem;
            font-size: 1.2rem;
        }
        .feature-title {
            color: #025b5f;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0rem;
            line-height: 1.3;
        }
        .feature-description {
            color: #025b5f;
            line-height: 1.5;
            font-size: 0.9rem;
            margin-top : 1rem;
            margin-bottom: 1rem;
            flex-grow: 1;
        }
        .learn-more-btn {
            margin-top: auto;
        }
        
        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .feature-title {
                font-size: 1.1rem;
            }
            .feature-description {
                font-size: 0.85rem;
            }
        }
        
        @media (max-width: 992px) {
            .row.four-columns > .col-lg-3 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }
        
        @media (max-width: 768px) {
            .row.four-columns > .col-lg-3 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>

    

  


<!-- feature section end -->


<!-- Industries Section (Optimized) -->
<section class="industries-section">
<div class="text-center mb-5">
<h2 class="section-title">Industries Covered</h2>
  <p class="section-subtitle">
    We work with companies across a wide range of industries to build end-to-end climate resilience,
    <br>from research and development to operations and supply chain.
  </p>
    </div>
  <!-- Card Grid -->
  <div class="card-grid">
<!-- Row 1 -->
<div class="row">
  <!-- Card 1 -->
  <div class="card-container">
    <div class="card-wrapper">
      <div class="card-front" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('assest/img/feature/18.png')">
        <h2>Banking and Financial Institutions</h2>
      </div>
      <div class="card-back">
        <h3 class="text-Black">Empowering Financial Decision-Making</h3>
        <p>ClimAgro equips institutions with yield predictions and risk insights for better loan and insurance decisions.</p>
      </div>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="card-container">
    <div class="card-wrapper">
      <div class="card-front" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('assest/img/feature/19.png')">
        <h2>Agribusiness</h2>
      </div>
      <div class="card-back">
         <h3 class="text-Green">Strategic Insights for Operational Excellence</h3>
        <p>Optimize your supply chain with pre-harvest insights, efficient logistics, and planning support.</p>
      </div>
    </div>
  </div>

  <!-- Card 3 -->
  <div class="card-container">
    <div class="card-wrapper">
      <div class="card-front" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('assest/img/feature/20.png')">
        <h2>Supply Chain Industry</h2>
      </div>
      <div class="card-back">
        <h3 class="text-Green">Customized Solutions for Agricultural Excellence</h3>
        <p>Stay ahead with insights that help optimize logistics and planning, ensuring smooth supply chain operations.</p>
      </div>
    </div>
  </div>
</div>

<!-- Row 2 -->
<div class="row">
  <!-- Card 4 -->
  <div class="card-container">
    <div class="card-wrapper">
      <div class="card-front" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('assest/img/feature/21.png')">
        <h2>Governments</h2>
      </div>
      <div class="card-back">
        <h3 class="text-Green">Informed Policy and Planning</h3>
        <p>Transform agricultural governance with data-driven insights that aid in strategic planning and risk mitigation.</p>
      </div>
    </div>
  </div>

  <!-- Card 5 -->
  <div class="card-container">
    <div class="card-wrapper">
      <div class="card-front" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('assest/img/feature/Seed.png')">
        <h2>Seed Industries</h2>
      </div>
      <div class="card-back">
        <h3 class="text-Green">Innovative Seed Development</h3>
        <p>Support seed development with climate-smart insights for planting windows and yield predictions.</p>
      </div>
    </div>
  </div>

  <!-- Card 6 -->
  <div class="card-container">
    <div class="card-wrapper">
      <div class="card-front" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('assest/img/feature/Corporate.png')">
        <h2>Service Industry</h2>
      </div>
      <div class="card-back">
        <h3 class="text-Green">Strategic ESG Integration</h3>
        <p>Help industries integrate sustainability and resilience into strategic business operations and ESG goals.</p>
      </div>
    </div>
  </div>
</div>
  </div>
</section>
<!-- testimonial section end-->

<!-- <section class="feature z-1 pos-rel pt-110">
    
   <div class="container">
       <div class="section-title pb-55">
       <h2 class="section-title">Resources</h2>
        </div>
        <div class="row">
            <div class="col-lg-4">
               <a href="<?php echo base_url().'blogs' ?>">
                <img class="wow fadeInRight w-100" data-wow-duration=".7s" data-wow-delay="200ms" src="assest/uploadfile/img/Blog.png" alt=""></a>
            </div>
            <div class="col-lg-4">
               <a href="<?php echo base_url().'news' ?>"> <img class="wow fadeInRight w-100" data-wow-duration=".7s" data-wow-delay="200ms" src="assest/uploadfile/img/News.png" alt=""></a>
            </div> 
            <div class="col-lg-4">
                <a href="<?php echo base_url().'articles' ?>"><img class="wow fadeInRight w-100" data-wow-duration=".7s" data-wow-delay="200ms" src="assest/uploadfile/img/Articles.png" alt=""></a>
            </div> 
        </div>
   </div>
</section> -->

<!--Resource page styles-->
<style>
  /* Reset and Base Styles */



/* Reset and Base Styles */
* 

/* Cards Grid */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    margin-top: 2rem;
}

/* Individual Card Styles */
.card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(2, 91, 95, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    cursor: pointer;
    position: relative;
    border: 2px solid transparent;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Card Hover Effects */
.card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(2, 91, 95, 0.25);
    border-color: #025b5f;
}

.card:active {
    transform: translateY(-4px) scale(1.01);
    transition: all 0.1s ease;
}

/* Card Category Tag */
.card-category {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: #025b5f;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    z-index: 2;
    transition: all 0.3s ease;
}

.card:hover .card-category {
    background: #033d40;
    transform: scale(1.05);
}

/* Card Image */
.card-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
    border-radius: 1.5rem;
}

.card:hover .card-image img {
    transform: scale(1.1);
}

/* Card Image Overlay */
.card-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(2, 91, 95, 0.1) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 1.5rem;
    
}

.card:hover .card-image::after {
    opacity: 1;
}

/* Card Content */
.card-content {
    padding: 1.5rem;
}

.card-title {
    color: #025b5f;
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    line-height: 1.3;
    transition: color 0.3s ease;
}

.card:hover .card-title {
    color: #033d40;
}

.card-description {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 1rem;
    line-height: 1.5;
    transition: color 0.3s ease;
}

.card:hover .card-description {
    color: #555;
}

.card-date {
    color: #025b5f;
    font-size: 0.8rem;
    font-weight: 500;
    opacity: 0.8;
    transition: all 0.3s ease;
}

.card:hover .card-date {
    opacity: 1;
    color: #033d40;
}

/* Click Effect */
.card:active {
    transform: translateY(-2px) scale(0.98);
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 0 1rem;
    }
    
    .cards-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .card-content {
        padding: 1.25rem;
    }
    
    .card-title {
        font-size: 1rem;
    }
    
    .card-description {
        font-size: 0.85rem;
    }
}

@media (max-width: 480px) {
    .content-section {
        padding: 2rem 0;
    }
    
    .card-image {
        height: 160px;
    }
    
    .card-category {
        top: 0.75rem;
        left: 0.75rem;
        padding: 0.4rem 0.8rem;
        font-size: 0.7rem;
    }
}

/* Loading Animation */
.card {
    animation: fadeInUp 0.6s ease forwards;
}

.card:nth-child(1) {
    animation-delay: 0.1s;
}

.card:nth-child(2) {
    animation-delay: 0.2s;
}

.card:nth-child(3) {
    animation-delay: 0.3s;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Focus States for Accessibility */
.card:focus {
    outline: 3px solid #025b5f;
    outline-offset: 2px;
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

.buttons-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 1rem;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: #1e3a8a;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);
        }

        .btn-secondary {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.2);
        }

        .btn-outline {
            background: transparent;
            color: #6b7280;
            border: 2px solid #d1d5db;
        }

        .btn-outline:hover {
            background: #f9fafb;
            border-color: #025b5f;
            transform: translateY(-2px);
        }

</style>
<section class="feature z-1 pos-rel pt-110">
        <div class="container">
          <div class=" pb-55">
            <h2 class="section-title">Resources</h2>
            </div>
              <div class="cards-grid">
                <!-- Blog Card -->
                <article class="card" onclick="window.location.href='<?php echo base_url().'blogs' ?>'">
                    <div class="card-category">BLOG</div>
                    <div class="card-image">
                        <img src="assest/img/bg/blog.png" alt="Blog content">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">LATEST BLOG POSTS AND UPDATES</h3>
                        <p class="card-description">Discover our latest thoughts, tutorials, and insights on technology, innovation, and industry trends.</p>
                        <div  class="card-date">Explore more blog</div>
                    </div>
                </article>

                <!-- Insights Card -->
                <article class="card" onclick="window.location.href='<?php echo base_url().'news' ?>'">
                    <div class="card-category">INSIGHTS</div>
                    <div class="card-image">
                        <img src="assest/img/bg/Insight4.png" alt="Insights content">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">DATA-DRIVEN INSIGHTS AND ANALYSIS</h3>
                        <p class="card-description">Deep dive into market research, user behavior analysis, and strategic business intelligence.</p>
                        <div class="card-date">Explore more insights </div>
                    </div>
                </article>

                <!-- Articles Card -->
                <article class="card" onclick="window.location.href='<?php echo base_url().'articles' ?>'">
                    <div class="card-category">ARTICLES</div>
                    <div class="card-image">
                        <img src="assest/img/bg/article.png" alt="Articles content">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">IN-DEPTH ARTICLES AND FEATURES</h3>
                        <p class="card-description">Comprehensive articles covering industry expertise, case studies, and thought leadership content.</p>
                        <div class="card-date">Explore more articles</div>
                    </div>
                </article>
            </div>
        </div>
</section>
    

<!-- faq start -->
<!-- FAQ Redesign Start -->
<style>
    .faq-redesign-section {
        background-color: #fff;
        padding: 60px 0 100px;
        position: relative;
        z-index: 1;
        margin-top: 100px; /* Adjusted space to prevent overlap with Resources section */
    }
    
    .faq-redesign-title {
        text-align: center;
        color: #025b5f;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 50px;
    }

    .faq-list-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .faq-item-new {
        margin-bottom: 25px;
        /* No border bottom based on image, just clean text spacing */
    }

    .faq-question-new {
        display: flex;
        justify-content: space-between;
        align-items: flex-start; /* Align top in case of multiline */
        cursor: pointer;
        padding: 10px 0;
        transition: all 0.3s ease;
    }

    .faq-question-text {
        color: #025b5f;
        font-size: 1.35rem; /* Large readable text */
        font-weight: 500;
        line-height: 1.4;
        text-align: left;
        flex: 1;
        padding-right: 20px;
    }

    .faq-icon-new {
        width: 32px;
        height: 32px;
        background-color: #025b5f;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: transform 0.3s ease, background-color 0.3s ease;
        margin-top: 2px; /* Slight visual alignment with text cap height */
    }

    .faq-icon-new svg {
        width: 14px;
        height: 14px;
        fill: #fff;
        transition: fill 0.3s ease;
    }

    .faq-answer-new {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease-out, margin-top 0.3s ease;
        padding-left: 0;
        color: #4b5563; /* Gray-600 */
        font-size: 1.05rem;
        line-height: 1.6;
    }

    /* Active State */
    .faq-item-new.active .faq-answer-new {
        /* max-height is handled by JS for smooth animation */
        margin-top: 10px;
        margin-bottom: 10px;
        opacity: 1; /* Fade in effect */
    }

    .faq-answer-new {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease, margin-top 0.3s ease, opacity 0.3s ease;
        padding-left: 0;
        color: #4b5563;
        font-size: 1.05rem;
        line-height: 1.6;
        opacity: 0; /* Hidden state opacity */
    }

    .faq-item-new.active .faq-icon-new {
        transform: rotate(45deg);
    }
    
    @media (max-width: 768px) {
        .faq-question-text {
            font-size: 1.1rem;
        }
        .faq-redesign-title {
            font-size: 2rem;
        }
    }
</style>

<section class="faq-redesign-section">
    <div class="container">
        <h2 class="faq-redesign-title">Frequently Asked Questions</h2>
        
        <div class="faq-list-container">
            <?php foreach ($faq as $item): ?>
                <div class="faq-item-new">
                    <div class="faq-question-new">
                        <span class="faq-question-text"><?php echo $item->work_title; ?></span>
                        <div class="faq-icon-new">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4V20M4 12H20" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="faq-answer-new">
                        <?php echo $item->testimonial; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item-new');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question-new');
        const answer = item.querySelector('.faq-answer-new');
        
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all others (Optional - keeps UI clean)
            faqItems.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                    otherItem.querySelector('.faq-answer-new').style.maxHeight = null;
                }
            });

            // Toggle current
            if (isActive) {
                item.classList.remove('active');
                answer.style.maxHeight = null;
            } else {
                item.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + "px";
            }
        });
    });
});
</script>
<!-- FAQ Redesign End -->

<!-- faq end -->



    <!-- <div class="footer-bg bg_img" data-background="assest/img/footer/footer-bg.png"></div> -->
    <div class="container">
        <div class="section-title pb-55">
                <h1 class="section-title">Contact</h1>
                <p class="section-subtitle" style="text-align: center; color: #025b5f; font-size: 1.1rem; margin-top: 15px; font-weight: 500;">
                    Need guidance or have specific queries? Fill out the form and let’s start a meaningful conversation.
                </p>
            </div>
        <div class="xb-contact-form">
            <div class="row g-0 mt-none-30">
                <div class="col-lg-7 mt-30">
                    <div class="xb-inner">
                        <h5 class="xb-item--sub-title text-white"><span><img src="assest/img/footer/contact.svg" alt=""></span> Contact Us</h5>
                        <h2 class="xb-item--title text-white">Do you have questions or want more information?</h2>
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
                                            <option value="AgRI.ai">Climate data portal</option>
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
                        <div class="xb-item--holder text-white">
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

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('.form-results').removeClass('d-none').html('<div class="alert alert-success">' + response.message + '</div>');
                },
                error: function(xhr, status, error) {
                    $('.form-results').removeClass('d-none').html('<div class="alert alert-danger">There was an error sending your message. Please try again later.</div>');
                }
            });
        });
    });
</script>

<style>
  <style>
.partners-scroll-container {
  overflow: hidden;
  position: relative;
  width: 100%;
}

.partners-wrapper {
  display: flex;
  align-items: center;
  gap: 2rem;
  white-space: nowrap;
}

.partner-tile {
  display: inline-block;
}

.partner-logo-container {
  width: 140px;
  height: 80px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.partner-logo {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}

/* Infinite scroll effect */
.infinite-scroll {
  animation: scroll-left 25s linear infinite;
}

@keyframes scroll-left {
  0% {
    transform: translateX(0%);
  }
  100% {
    transform: translateX(-50%);
  }
}

/* Responsive Tweaks */
@media (max-width: 767px) {
  .section-title {
    font-size: 1.5rem;
  }

  .scroll-arrow {
    display: none;
  }

  .partners-wrapper {
    gap: 1rem;
    padding: 0.5rem 10px;
  }

  .partner-logo-container {
    width: 100px;
    height: 70px;
  }
}

@media (max-width: 480px) {
  .partner-logo-container {
    width: 90px;
    height: 60px;
  }

  .partners-wrapper {
    gap: 0.75rem;
  }
}
</style>
<section class="partners-section">
    <div class="container">

        <h2 class="section-title">Partners</h2>
        
        <div class="partners-container">
            <button class="scroll-arrow scroll-left" id="scrollLeft" aria-label="Scroll left">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            
            <div class="partners-scroll-container">
              <div class="partners-wrapper infinite-scroll">
                <?php foreach ($servicelist as $client): ?>
                  <a href="#" class="partner-tile">
                    <div class="partner-logo-container">
                      <img class="partner-logo" src="<?= base_url("assest/uploadfile/webimages/") . $client->services_image; ?>" alt="<?php echo $client->services_title; ?>">
                    </div>
                  </a>
                <?php endforeach; ?>

                <!-- Duplicate logos for seamless loop -->
                <?php foreach ($servicelist as $client): ?>
                  <a href="#" class="partner-tile">
                    <div class="partner-logo-container">
                      <img class="partner-logo" src="<?= base_url("assest/uploadfile/webimages/") . $client->services_image; ?>" alt="<?php echo $client->services_title; ?>">
                    </div>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>

            
            <button class="scroll-arrow scroll-right" id="scrollRight" aria-label="Scroll right">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>
    </div>
</section>
<?php include("footer.php"); ?>