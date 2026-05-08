<?php
include("header.php");
include("navbar2.php");
?>

<!-- breadcrumb start -->
<section class="breadcrumb bg_img pos-rel" data-background="assest/img/bg/contact.png">
    <div class="container">
        <div class="breadcrumb__content">
            <h2 class="breadcrumb__title">Contact Us</h2>
    </div>
</section>
<!-- breadcrumb end -->

<style>
        /* Page-specific override: remove underlines in header/menu */
        #xb-header-area a,
        .main-menu ul li a,
        .xb-menu-primary li a,
        .header-btn a {
            text-decoration: none !important;
        }
        #xb-header-area a:hover,
        .main-menu ul li a:hover,
        .xb-menu-primary li a:hover,
        .header-btn a:hover {
            text-decoration: none !important;
        }
        /* Remove underlines for footer / contact links on this page */
        .footer-apps a,
        .footer-apps a:hover,
        .footer-contact a,
        .footer-contact a:hover,
        .xb-contact-form a,
        .xb-contact-form a:hover {
            text-decoration: none !important;
        }
        /* Follow Us social icons */
        .widget__social {
            display: flex;
            flex-wrap: nowrap;
            gap: 8px;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .widget__social li a {
            color: #fff;
            background: rgba(255,255,255,0.15);
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
            font-size: 13px;
            transition: all 0.3s ease;
        }
        .widget__social li a:hover {
            background: #d1ff44;
            color: #025b5f;
            transform: translateY(-2px);
        }
    </style>
<div id="formcontact" class="footer-contact sooter">
    <!-- <div class="footer-bg bg_img" data-background="assest/img/footer/footer-bg.png"></div> -->
    <div class="container">
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
                                        <input type="text" placeholder="Full name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-call.svg" alt=""></span>
                                        <input type="tel" placeholder="+91 98765 43210" name="phone" id="phone" inputmode="numeric" pattern="[0-9]*" maxlength="13" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-email.svg" alt=""></span>
                                        <input type="email" placeholder="Enter your email" name="email" required>
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
                                            <option value="CropRisk.ai">ClimIntellio</option>
                                            <option value="CropRisk.ai">CropRisk.ai</option>
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
                                    <textarea class="xb-item--massage" name="comment" id="message" cols="30" rows="10" placeholder="Your query...." required></textarea>
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
                        <div class="xb-border" style="padding: 20px 30px 0px 30px;">
                            <h3 class="text-white">Email</h3>
                            <p>
                                <i class="fas fa-envelope" style="color:var(--color-primary);"></i> <a href="mailto:<?php echo $getCompany->comp_email; ?>" class="text-white"><?php echo $getCompany->comp_email; ?></a>
                            </p>
                        </div>
                        <div class="xb-border" style="padding: 10px 30px 0px 30px;">

                            <h3 class="text-white">Contact</h3>
                            <p>
                                <i class="fa fa-phone" style="color:var(--color-primary);"></i><a href="tel:<?php echo $getCompany->comp_mobile; ?>" class="text-white"><?php echo $getCompany->comp_mobile; ?></a>
                            </p>
                        </div>
                        <div class="xb-border" style="padding: 10px 30px 0px 30px;">

                            <h3 class="text-white">Address</h3>
                            <p>
                                <i class="fas fa-map-marker-alt" style="color:var(--color-primary);"></i>
                                <?php if(!empty($getCompany->comp_address)): ?>
                                    Office: <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode($getCompany->comp_address); ?>" target="_blank" class="text-white"><?php echo $getCompany->comp_address; ?></a>
                                <?php else: ?>
                                    Office: <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode('Nankari IIT Kanpur - 208016'); ?>" target="_blank" class="text-white">Nankari IIT Kanpur - 208016</a>
                                <?php endif; ?>
                                <br>
                                <br>
                            </p>

                        </div>
                        <!-- <div class="xb-border" style="padding: 10px 30px 0px 30px;">

                            <h3 class="text-white">Register Address:</h3>
                            <p>
                                <a href="" class="text-white">253-C, Nankari, IIT Kanpur, Kalyanpur, Kanpur Nagar, Uttar Pradesh - 208016 x</a>
                            </p>
                        </div> -->

                        <div class="xb-border" style="padding: 10px 30px 0px 30px;">
                            <h3 class="widget__title" style="margin-bottom: 10px;">Follow Us</h3>
                            <ul class="widget__social ul_li">
                                <li><a href="<?php echo $getCompany->linkedin; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="<?php echo $getCompany->twitter; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="https://youtube.com/@climagroanalytics?si=Ou6D2-0N5IyqGpD" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="<?php echo $getCompany->facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <?php if (!empty($getCompany->insta)): ?>
                                    <li><a href="<?php echo $getCompany->insta; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        <div style="padding:20px; border-radius:20px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3570.717953418603!2d80.22489!3d26.497024677830698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1728493913797!5m2!1sen!2sin" style="border:0;width:100%;height:350px; border-radius:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="form-results d-none"></div>


<script>
window.addEventListener('load', function() {
    var form = document.getElementById('contactForm');
    if (!form) return;

    // Phone: digits only
    var phoneInput = form.querySelector('input[name="phone"]');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    }

    // Results area
    var resultsDiv = document.querySelector('.form-results');

    function showFormMsg(html) {
        if (!resultsDiv) return;
        resultsDiv.innerHTML = html;
        resultsDiv.className = 'form-results';
        resultsDiv.classList.remove('d-none');
        resultsDiv.style.marginTop = '12px';
    }

    function clearFormMsg() {
        if (resultsDiv) { resultsDiv.innerHTML = ''; resultsDiv.className = 'form-results d-none'; }
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();

        clearFormMsg();

        // Phone validation
        if (phoneInput) {
            var phoneVal = phoneInput.value.trim();
            if (phoneVal !== '') {
                if (!/^[0-9]+$/.test(phoneVal) || phoneVal.length < 10) {
                    showFormMsg('<div style="color:#ef4444;background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);border-radius:8px;padding:10px 14px;font-size:0.875rem;">⚠️ Please enter a valid phone number (at least 10 digits).</div>');
                    return false;
                }
            }
        }

        // Email validation
        var emailInput = form.querySelector('input[name="email"]');
        if (emailInput) {
            var emailVal = emailInput.value.trim();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailVal === '' || !emailRegex.test(emailVal)) {
                showFormMsg('<div style="color:#ef4444;background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);border-radius:8px;padding:10px 14px;font-size:0.875rem;">⚠️ Please enter a valid email address.</div>');
                return false;
            }
        }

        // Show loading
        showFormMsg('<div style="color:#6b7280;font-size:0.875rem;padding:8px 0;">⏳ Sending your message...</div>');

        var formData = new FormData(form);

        // Disable submit button to prevent double-click
        var submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) submitBtn.disabled = true;

        fetch(form.getAttribute('action'), {
            method: 'POST',
            body: formData
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            clearFormMsg();
            if (submitBtn) submitBtn.disabled = false;
            if (data.success) {
                form.reset();
                if (typeof showClimToast === 'function') {
                    showClimToast('🎉 Message Sent! Our team will connect with you soon.');
                } else {
                    showFormMsg('<div style="color:#16a34a;background:rgba(22,163,74,0.08);border:1px solid rgba(22,163,74,0.25);border-radius:8px;padding:12px 16px;font-size:0.875rem;">✅ Message Sent! Our team will connect with you soon.</div>');
                }
            } else {
                var tmp = document.createElement('div');
                tmp.innerHTML = data.message || 'Something went wrong. Please try again.';
                var lines = tmp.querySelectorAll('.error, div');
                var msgs = [];
                lines.forEach(function(el) { if (el.textContent.trim()) msgs.push('• ' + el.textContent.trim()); });
                var cleanMsg = msgs.length ? msgs.join('<br>') : (tmp.textContent || data.message);
                showFormMsg(
                    '<div style="color:#ef4444;background:rgba(239,68,68,0.08);border:1px solid rgba(239,68,68,0.25);border-radius:8px;padding:12px 16px;font-size:0.875rem;line-height:1.6;">' +
                    '⚠️ Please fix the following:<br>' + cleanMsg + '</div>'
                );
            }
        })
        .catch(function(err) {
            clearFormMsg();
            showFormMsg('<div style="color:#ef4444;background:rgba(239,68,68,0.08);border:1px solid rgba(239,68,68,0.25);border-radius:8px;padding:12px 16px;font-size:0.875rem;">❌ An unexpected error occurred. Please try again.</div>');
            console.error('Contact form error:', err);
        });

        return false;
    });
});
</script>

<?php include("footer.php"); ?>

