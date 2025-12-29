<style>
    .footer {
        background-color: #025B5F;
        color: white;
        padding: 1.5rem 0 0.5rem;
        font-family: system-ui, -apple-system, sans-serif;
        font-size: 0.8125rem;
    }
    
    .footer-container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }
    
    .footer-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
    }
    
    .footer-column {
        flex: 1;
        min-width: 150px;
        margin-bottom: 0.5rem;
    }
    
    .footer-title {
        color: #f9fafb;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }
    
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .footer-links li {
        margin-bottom: 0.25rem;
    }
    
    .footer-links a {
        color: #d1d5db;
        text-decoration: none;
        transition: color 0.15s;
    }
    
    .footer-links a:hover {
        color: #93c5fd;
    }
    
    .footer-contact {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.25rem;
        color: #d1d5db;
    }
    
    .footer-bottom {
        border-top: 1px solid #374151;
        padding-top: 0.75rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 0.5rem;
    }
    
    .footer-copyright {
        color: #9ca3af;
    }
    
    .footer-social {
        display: flex;
        gap: 2rem;
    }
    
    .footer-social a {
        color: #FFFF;
        transition: color 0.15s;
    }
    
    .footer-social a:hover {
        color: white;
    }
    
    @media (max-width: 768px) {
        .footer-content {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .footer-bottom {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-column">
                <div class="footer-title">Quick Links</div>
                <ul class="footer-links">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('about-us'); ?>">About</a></li>
                    <li><a href="<?php echo base_url('solutions'); ?>">offerings</a></li>
                    <li><a href="<?php echo base_url('contact-us'); ?>">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <div class="footer-title">Contact</div>
                <div class="footer-contact">
                    <i class="fas fa-envelope"></i>
                    <?php echo $getCompany->comp_email; ?>
                </div>
                <div class="footer-contact">
                    <i class="fas fa-phone"></i>
                    <?php echo $getCompany->comp_mobile; ?>
                </div>
            </div>
            
            <div class="footer-column">
                <div class="footer-title">Subscribe</div>
                <div style="display: flex; margin-top: 0.25rem;">
                    <input type="email" placeholder="Email" style="
                        padding: 0.3rem 0.75rem;
                        border: none ;
                        border-radius: 2rem 0rem 0rem 2rem;
                        background: #FFFF;
                        color: black;
                        width: 100%;
                        font-size: 1rem;
                        height : 50px;
                        text : black;  
                        
                    ">
                    <button style="
                        padding: 0 0.75rem;
                        background: #059669;
                        color: white;
                        border: none;
                        border-radius: 0rem 2rem 2rem 0rem;
                        cursor: pointer;
                    ">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="footer-copyright">
                &copy; <?php echo date('Y'); ?> <?php echo $getCompany->comp_name; ?>  All rights reserved 
                <div>
                    Startup India Certificate Number - DIPP129220
                </div>
            </div>
            <div class="footer-social">
                <a href="<?php echo $getCompany->facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo $getCompany->linkedin; ?>"><i class="fab fa-linkedin-in"></i></a>
                <a href="<?php echo $getCompany->twitter; ?>"><i class="fab fa-twitter"></i></a>
                <!-- <a href="<?php echo $getCompany->youtube; ?>"><i class="fab fa-youtube"></i></a> -->
                <?php if(!empty($getCompany->insta)): ?>
                    <a href="<?php echo $getCompany->insta; ?>"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
    <!-- Keep your existing script includes -->
    <script src="<?php echo base_url('assest/js/jquery-3.7.1.min.js');?>"></script>
    <script src="<?php echo base_url('assest/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('assest/js/swiper.min.js');?>"></script>
    <script src="<?php echo base_url('assest/js/wow.min.js');?>"></script>
    <script src="<?php echo base_url('assest/js/appear.js');?>"></script>
    <script src="<?php echo base_url('assest/js/odometer.min.js');?>"></script>
    <script src="<?php echo base_url('assest/js/jquery.magnific-popup.min.js');?>"></script>
    <script src="<?php echo base_url('assest/js/easing.min.js');?>"></script>
    <script src="<?php echo base_url('assest/js/scrollspy.js');?>"></script>
    <script src="<?php echo base_url('assest/js/countdown.js');?>"></script>
    <script src="<?php echo base_url('assest/js/parallax-scroll.js');?>"></script>
    <script src="<?php echo base_url('assest/js/main.js');?>"></script>
</body>
</html>