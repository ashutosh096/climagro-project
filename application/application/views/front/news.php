<?php
include("header.php");
include("navbar2.php");
?>

<!-- breadcrumb start -->
<section class="breadcrumb bg_img pos-rel" data-background="assest/img/bg/article.png">
    <div class="container">
        <div class="breadcrumb__content">
            <h2 class="breadcrumb__title">Insights</h2>
           
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<div class="container">
    <div class="section-title pb-55">
        <h1 class="section-title">Contact</h1>
    </div>
    <div class="xb-contact-form">
        <div class="row g-0 mt-none-30">
            <div class="col-lg-7 mt-30">
                <div class="xb-inner">
                    <h5 class="xb-item--sub-title text-white"><span><img src="assets/img/footer/contact.svg" alt=""></span> Contact Us</h5>
                    <h2 class="xb-item--title text-white">Do you have questions or need more information?</h2>
                    <form class="xb-item--form" action="<?php echo base_url('process_form.php'); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="xb-item--field">
                                    <span><img src="assets/img/footer/contact-user.svg" alt=""></span>
                                    <input type="text" name="name" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="xb-item--field">
                                    <span><img src="assets/img/footer/contact-email.svg" alt=""></span>
                                    <input type="email" name="email" placeholder="your@email.com" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="xb-item--field">
                                    <span><img src="assets/img/footer/contact-call.svg" alt=""></span>
                                    <input type="text" name="phone" placeholder="+91 081 0256 023">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="xb-item--field">
                                    <select name="subject" style="height: 57px;padding: 8px;border-radius: 10px;" required>
                                        <option value="" disabled selected>Select a subject</option>
                                        <option value="Climate Data">Climate Data</option>
                                        <option value="Agricultural Data">Agricultural Data</option>
                                        <option value="Socio-Demographic Data">Socio-Demographic Data</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 xb-item--text-msg">
                                <span><img src="assets/img/footer/contact-massage.svg" alt=""></span>
                                <textarea class="xb-item--massage" name="message" cols="30" rows="10" placeholder="Your message..." required></textarea>
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
            <!-- Right column content remains the same -->
        </div>
    </div>
</div>



<?php include("footer.php"); ?>