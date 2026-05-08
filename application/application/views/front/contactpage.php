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
                                        <input type="text" placeholder="Full name" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-call.svg" alt=""></span>
                                        <input type="text" placeholder="Phone number" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-email.svg" alt=""></span>
                                        <input type="email" placeholder="Enter your email" name="email">
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
                                    <textarea class="xb-item--massage" name="comment" id="message" cols="30" rows="10" placeholder="Your query...."></textarea>
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
                            
                                <i class="fas fa-map-marker-alt" style="color:var(--color-primary);"></i>  Registered: <a href="" class="text-white">253-C, Nankari, IIT Kanpur, Kalyanpur, Kanpur Nagar, Uttar Pradesh - 208016 </a><br>
                                <br>
                                <i class="fas fa-map-marker-alt" style="color:var(--color-primary);"></i>  Corporate: <a href="" class="text-white"><?php echo $getCompany->comp_address; ?></a>
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
                                <li><a href="<?php echo $getCompany->facebook; ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="<?php echo $getCompany->linkedin; ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="<?php echo $getCompany->twitter; ?>"><i class="fab fa-twitter"></i></a></li>
                                <?php
                                $insta = $getCompany->insta;
                                if ($insta != "") {
                                    echo '<li><a href="<?php echo $getCompany->insta;?>"><i class="fab fa-instagram"></i></a></li>';
                                }
                                ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        <div style="padding:20px; border-radius:20px;">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3569.339!2d80.22489!3d26.52245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c36e45f41cc8b%3A0xa51eb602756f4db!2sNankari%2C+Kalyanpur%2C+Kanpur%2C+Uttar+Pradesh+208016!5e0!3m2!1sen!2sin!4v1728493913797!5m2!1sen!2sin" style="border:0;width:100%;height:350px; border-radius:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="form-results d-none"></div>


<?php include("footer.php"); ?>

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
                            if (response.message.includes('failed')) {
                                $('.form-results').html('<div class="alert alert-warning">' + response.message + '</div>');
                            } else {
                                $('.form-results').html('<div class="alert alert-success">' + response.message + '</div>');
                                $('#contactForm')[0].reset();
                            }
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