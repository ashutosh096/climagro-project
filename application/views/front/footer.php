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

    /* Subscribe input/button spacing and responsive layout */
    /* Subscribe Redesign: Stacked Layout with Lime Theme */
    .subscribe-wrapper {
        position: relative;
        width: 100%;
        max-width: 400px;
    }

    .subscribe-form {
        display: flex;
        flex-direction: column;
        gap: 12px;
        position: relative;
    }

    .subscribe-input, #subscribeEmail {
        width: 100% !important;
        height: 50px !important;
        padding: 10px 15px 10px 42px !important;
        background: rgba(10, 20, 30, 0.4) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-radius: 10px !important;
        color: #fff !important;
        font-size: 0.95rem !important;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .subscribe-input:focus, #subscribeEmail:focus {
        border-color: #d1ff44 !important;
        background: rgba(10, 20, 30, 0.6) !important;
        box-shadow: 0 0 0 4px rgba(209, 255, 68, 0.1);
    }

    .subscribe-icon {
        position: absolute;
        left: 14px;
        top: 25px; /* Centered relative to the first row (input) */
        transform: translateY(-50%);
        color: #d1ff44;
        font-size: 1rem;
        z-index: 5;
        pointer-events: none;
    }

    .subscribe-btn {
        width: fit-content;
        padding: 0 25px;
        height: 42px;
        background-color: #d1ff44 !important;
        color: #025B5F !important;
        border: none !important;
        border-radius: 21px !important;
        font-weight: 700 !important;
        font-size: 0.95rem !important;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(209, 255, 68, 0.2);
    }

    .subscribe-btn:hover {
        background-color: #e3ff8c !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(209, 255, 68, 0.3);
    }

    .subscribe-btnContent {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .subscribe-spinner {
        width: 18px;
        height: 18px;
        border: 2px solid rgba(255,255,255,0.28);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        box-sizing: border-box;
    }

    @keyframes spin { to { transform: rotate(360deg); } }

    /* Subtle halo/glow behind control on focus */
    .subscribe-glow {
        position: absolute;
        inset: -8px;
        border-radius: 36px;
        background: linear-gradient(90deg, rgba(16,185,129,0.10), rgba(59,130,246,0.06));
        opacity: 0;
        filter: blur(14px);
        transition: opacity .28s ease;
        pointer-events: none;
        z-index: -1;
    }

    .subscribe-wrapper:focus-within .subscribe-glow { opacity: 1; }

    /* Message below the control */
    #subscribeMessage {
        position: absolute;
        left: 12px;
        right: 12px;
        bottom: -30px;
        font-size: 0.9rem;
        transition: opacity .22s ease, transform .22s ease;
        pointer-events: none;
        opacity: 0;
        transform: translateY(6px);
        text-align: left;
        line-height: 1.1;
    }

    #subscribeMessage.show { opacity: 1; transform: translateY(0); }
    #subscribeMessage.success { color: #10b981; }
    #subscribeMessage.error { color: #ef4444; }

    /* Variant states */
    .subscribe-wrapper.success .subscribe-btn { box-shadow: 0 12px 36px rgba(16,185,129,0.12); }
    .subscribe-wrapper.error .subscribe-input { border-color: rgba(239,68,68,0.18); background: rgba(239,68,68,0.02); }
    .subscribe-wrapper.success .subscribe-input { border-color: rgba(16,185,129,0.12); }

    /* Mobile tweaks */
    @media (max-width: 480px) {
        .subscribe-form { flex-direction: column; align-items: stretch; gap: 10px; }
        #subscribeEmail { 
            border-radius: 12px !important; 
            padding-left: 42px !important; 
            width: 100%;
        }
        .subscribe-input { border-radius: 10px; padding-left: 42px; height: 45px !important; }
        .subscribe-btn { border-radius: 21px; width: fit-content; align-self: center; height: 40px; }
        .subscribe-icon { left: 12px; top: 22px; }
        #subscribeMessage { bottom: -36px; }
    }
    
    .footer-contact {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.25rem;
        color: #d1d5db;
    }
    .footer-contact a {
        color: #d1d5db;
        text-decoration: none;
        transition: color 0.15s;
    }
    .footer-contact a:hover {
        color: #ffffff;
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
    
    .footer-social a {
    color: #FFFF;
    transition: color 0.15s;
    font-size: 16px;
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
                    <li><a href="<?php echo base_url('solutions'); ?>">Offerings</a></li>
                    <li><a href="<?php echo base_url('contact-us'); ?>">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <div class="footer-title">Contact</div>
                <h5 class="xb-item--sub-title text-white"><span><img src="<?= base_url() ?>assest/img/footer/contact.svg" alt=""></span> Contact Us</h5>
                <div class="footer-contact">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:<?php echo $getCompany->comp_email; ?>"><?php echo $getCompany->comp_email; ?></a>
                </div>
                <div class="footer-contact">
                    <i class="fas fa-phone"></i>
                    <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $getCompany->comp_mobile); ?>" target="_blank"><?php echo $getCompany->comp_mobile; ?></a>
                </div>
                <div class="footer-contact">
                    <i class="fas fa-map-marker-alt"></i>
                    <?php if(!empty($getCompany->comp_address)): ?>
                        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode($getCompany->comp_address); ?>" target="_blank" rel="noopener" style="color: #d1d5db; text-decoration: none;">
                            <?php echo $getCompany->comp_address; ?>
                        </a>
                    <?php else: ?>
                        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode('Nankari IIT Kanpur - 208016'); ?>" target="_blank" rel="noopener" style="color: #d1d5db; text-decoration: none;">
                            Nankari IIT Kanpur - 208016
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="footer-column">
                <div class="footer-title">Subscribe</div>
                <div class="subscribe-wrapper" id="subscribeSection">
                    <form class="subscribe-form" id="subscribeForm" novalidate>
                        <input id="subscribeEmail" type="email" name="email" placeholder="your@email.com" class="subscribe-input" autocomplete="email" />
                        <i class="fas fa-at subscribe-icon" aria-hidden="true"></i>
                        <button id="subscribeBtn" type="submit" class="subscribe-btn" aria-label="Subscribe">
                            <span id="subscribeBtnContent">Subscribe &nbsp; <i class="fas fa-arrow-right" aria-hidden="true" style="font-size: 0.8rem;"></i></span>
                        </button>
                    </form>
                    <div id="subscribeMessage" role="status" aria-live="polite" class="" style="display:none"></div>
                    <div class="subscribe-glow" aria-hidden="true"></div>
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
                <a href="<?php echo $getCompany->linkedin; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a href="<?php echo $getCompany->twitter; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://youtube.com/@climagroanalytics?si=Ou6D2-0N5IyqGpD" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="<?php echo $getCompany->facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <?php if(!empty($getCompany->insta)): ?>
                    <a href="<?php echo $getCompany->insta; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

 <!--  a Demo Modal -->
 <div class="climate-modal-overlay" id="walkthroughModal">
    <div class="climate-modal">
        <!-- Close Button Absolute -->
        <button class="climate-close-btn" id="closeWalkthroughModal">&times;</button>
        
        <div class="climate-modal-body">
            <!-- New Header Section -->
            <div style="text-align: center; margin-bottom: 1rem;">
                <span style="background: #f3f4f6; color: #6b7280; padding: 4px 16px; border-radius: 50px; font-size: 0.75rem; font-weight: 600; letter-spacing: 0.5px; border: 1px solid #e5e7eb; display: inline-block; margin-bottom: 0.5rem;">SCHEDULE A DEMO</span>
                
                <p style="font-size: 0.8rem; color: #6b7280; max-width: 400px; margin: 0 auto; line-height: 1.4;">
                    Fill out the form below and our team will get back to you shortly.
                </p>
            </div>

            <form id="walkthroughForm" action="<?= site_url('contact/submit') ?>" method="POST">
                <input type="hidden" name="url" value="<?php echo current_url(); ?>">
                <input type="hidden" name="form_type" value="Walkthrough Booking">
                
                <div class="row">
                    <!-- Name -->
                    <div class="col-lg-6 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Your name <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" placeholder="e.g. John Smith" name="name" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;">
                    </div>
                    <!-- Phone -->
                    <div class="col-lg-6 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Phone number (optional)</label>
                        <input type="tel" class="form-control" placeholder="e.g. +91 98765 43210" name="phone" id="walkthroughPhone" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;" inputmode="numeric" pattern="[0-9]*" maxlength="13">
                    </div>
                    <!-- Email -->
                    <div class="col-lg-12 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Email address <span style="color:red;">*</span></label>
                        <input type="email" class="form-control" placeholder="e.g. john@email.com" name="email" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;">
                    </div>
                    <!-- Title -->
                    <div class="col-lg-6 mb-2">
                         <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">I am a <span style="color:red;">*</span></label>
                        <select name="title" class="custom-select-animated" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; background-color: #fafafa; height: auto; font-size: 0.9rem;">
                            <!-- <option value="">Select your role</option> -->
                            <option value="Government / Policy Maker">Government / Policy Maker</option>
                            <option value="Researcher / Academic">Researcher / Academic</option>
                            <option value="Financial Institution / Insurer">Financial Institution / Insurer</option>
                            <option value="NGO / Nonprofit">NGO / Nonprofit</option>
                            <option value="Corporate Sustainability / ESG Professional">Corporate Sustainability / ESG Professional</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <!-- Interested In -->
                    <div class="col-lg-6 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Interested In <span style="color:red;">*</span></label>
                        <select name="interested" class="custom-select-animated" style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; background-color: #fafafa; height: auto; font-size: 0.9rem;">
                            <!-- <option value="">Select interest</option> -->
                            <option value="ClimIntellio">ClimIntellio</option>
                            <option value="CropRisk.ai">CropRisk.ai</option>
                            <option value="CityAdapt.ai">CityAdapt.ai</option>
                            <option value="Climate Consulting">Climate Consulting</option>
                            <option value="Collaborations">Collaborations / Research</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <!-- LinkedIn ID (Optional) -->
                    <div class="col-lg-12 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">LinkedIn ID <span style="color:#6b7280; font-weight:400;">(optional)</span></label>
                        <input type="url" class="form-control" placeholder="e.g. https://linkedin.com/in/yourprofile" name="linkedin_id" id="walkthroughLinkedin" style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;">
                    </div>
                    <!-- Comment -->
                    <div class="col-lg-12 mb-3">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Is there anything you want me to know before our call?</label>
                        <textarea class="form-control" name="comment" id="walkthroughComment" cols="30" rows="2" placeholder="Type here ..." style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;"></textarea>
                    </div>
                    <!-- Submit -->
                    <div class="col-lg-12" style="display: flex; justify-content: center;">
                        <button type="submit" class="btn-custom-pill">
                            Book a  Demo
                        </button>
                    </div>
                </div>
                <div class="Demo-form-results mt-2"></div>
            </form>
        </div>
    </div>
</div>

<style>
/* Modal Styles (Global) */
.climate-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(4px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.climate-modal-overlay.active {
    opacity: 1;
    visibility: visible;
}

.climate-modal {
    background: white;
    border-radius: 1.5rem; /* More rounded */
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    width: 90%;
    max-width: 550px;
    max-height: 95vh;
    overflow-y: auto;
    scrollbar-width: none; /* Hide scrollbar Firefox */
    -ms-overflow-style: none; /* Hide scrollbar IE/Edge */
    transform: scale(0.9);
    transition: transform 0.3s ease;
    position: relative; /* For absolute close button */
}

/* Hide scrollbar Chrome/Safari/Webkit */
.climate-modal::-webkit-scrollbar {
    display: none;
}

.climate-modal-overlay.active .climate-modal {
    transform: scale(1);
}

.climate-close-btn {
    position: absolute;
    top: 1rem;
    right: 1.5rem;
    background: none;
    border: none;
    color: #9ca3af;
    font-size: 2rem;
    line-height: 1;
    cursor: pointer;
    padding: 0;
    transition: color 0.2s;
    z-index: 10;
}

.climate-close-btn:hover {
    color: #4b5563;
}

.climate-modal-body {
    padding: 2rem 2.5rem; /* Compacted padding */
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .climate-modal-body {
        padding: 1.5rem;
    }
}

.btn-custom-pill {
    background-color: #025B5F; /* Primary Teal */
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    padding: 12px 36px;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    letter-spacing: 0.5px;
}

.btn-custom-pill:hover {
    background-color: #014346;
    transform: translateY(-1px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.custom-select-icon {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 16px;
    padding-right: 30px !important;
}

/* Custom Animated Dropdown */
.custom-select-wrapper {
    position: relative;
    user-select: none;
    width: 100%;
}

.custom-select-trigger {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 12px;
    font-size: 0.9rem;
    font-weight: 400;
    color: #6b7280;
    background: #fafafa;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s;
}

.custom-select-trigger:hover {
    border-color: #025B5F;
}

.custom-select-trigger.active {
    border-color: #025B5F;
    background: #fff;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.custom-select-trigger:after {
    content: '';
    width: 16px;
    height: 16px;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    transition: transform 0.3s;
}

.custom-select-trigger.active:after {
    transform: rotate(180deg);
}

.custom-options {
    position: absolute;
    display: block;
    top: 100%;
    left: 0;
    right: 0;
    border: 1px solid #025B5F;
    border-top: 0;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
    background: #fff;
    transition: all 0.3s;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    z-index: 50;
    transform: translateY(-10px);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    max-height: 200px;
    overflow-y: auto;
}

.custom-select-wrapper.open .custom-options {
    opacity: 1;
    visibility: visible;
    pointer-events: all;
    transform: translateY(0);
}

.custom-option {
    position: relative;
    display: block;
    padding: 10px 12px;
    font-size: 0.9rem;
    font-weight: 400;
    color: #374151;
    cursor: pointer;
    transition: all 0.2s;
    border-bottom: 1px solid #f3f4f6;
}

.custom-option:last-of-type {
    border-bottom: 0;
}

.custom-option:hover {
    background-color: #f3f4f6;
    color: #025B5F;
    padding-left: 16px;
}

.custom-option.selected {
    background-color: #ecfdf5;
    color: #025B5F;
    font-weight: 600;
}

.custom-options::-webkit-scrollbar {
    display: none;
}
.custom-options {
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none;  /* IE 10+ */
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Modal Logic
    const modal = document.getElementById('walkthroughModal');
    const closeBtn = document.getElementById('closeWalkthroughModal');

    // Custom Select Logic
    const selects = document.querySelectorAll('.custom-select-animated');
    
    selects.forEach(select => {
        // Hide original
        select.style.display = 'none';
        
        // Create Wrapper
        const wrapper = document.createElement('div');
        wrapper.className = 'custom-select-wrapper';
        select.parentNode.insertBefore(wrapper, select);
        wrapper.appendChild(select);
        
        // Create Trigger
        const trigger = document.createElement('div');
        trigger.className = 'custom-select-trigger';
        // Set initial text
        const selectedOption = select.options[select.selectedIndex];
        trigger.textContent = selectedOption.text;
        if(selectedOption.value !== "") {
             trigger.style.color = "#374151";
        }
        wrapper.appendChild(trigger);
        
        // Create Options List
        const optionsDiv = document.createElement('div');
        optionsDiv.className = 'custom-options';
        
        Array.from(select.options).forEach(option => {
            // Skip purely placeholder options if desired, usually we show them but maybe styling differs
            // Here we show all
            if (option.value === "") return; 
            
            const div = document.createElement('div');
            div.className = 'custom-option';
            div.textContent = option.text;
            div.dataset.value = option.value;
            
            if (option.selected) div.classList.add('selected');
            
            div.addEventListener('click', function(e) {
                e.stopPropagation();
                trigger.textContent = this.textContent;
                trigger.style.color = "#374151"; // Active color
                select.value = this.dataset.value;
                
                // Update active state in list
                optionsDiv.querySelectorAll('.custom-option').forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                
                // Close
                wrapper.classList.remove('open');
                trigger.classList.remove('active');
            });
            
            optionsDiv.appendChild(div);
        });
        
        wrapper.appendChild(optionsDiv);
        
        // Trigger Click
        trigger.addEventListener('click', function(e) {
            e.stopPropagation();
            // Close other selects
            document.querySelectorAll('.custom-select-wrapper').forEach(w => {
                if (w !== wrapper) {
                    w.classList.remove('open');
                    w.querySelector('.custom-select-trigger').classList.remove('active');
                }
            });
            
            wrapper.classList.toggle('open');
            trigger.classList.toggle('active');
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.custom-select-wrapper')) {
            document.querySelectorAll('.custom-select-wrapper').forEach(w => {
                 w.classList.remove('open');
                 w.querySelector('.custom-select-trigger').classList.remove('active');
            });
        }
    });
    
    // Open modal on click of any element with class 'open-walkthrough-modal'
    document.addEventListener('click', function(e) {
        if (e.target.closest('.open-walkthrough-modal')) {
            e.preventDefault();
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }
    });

    // Close modal
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    // Close on outside click
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }
    
    // Form Submission Logic
    const form = document.getElementById('walkthroughForm');
    const phoneInput = document.getElementById('walkthroughPhone');
    
    // Enforce numeric only for phone
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    }

    if (form) {
        // ===== FORM SUBMIT =====
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const resultsDiv = form.querySelector('.Demo-form-results');
            
            // Clear prev results
            resultsDiv.innerHTML = '';
            
            // Basic validation
            const phoneVal = phoneInput.value.trim();
            if (phoneVal !== '') {
                if (!/^[0-9]+$/.test(phoneVal) || phoneVal.length < 10) {
                    resultsDiv.innerHTML = '<div style="color:#ef4444;background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);border-radius:8px;padding:10px 14px;font-size:0.875rem;margin-bottom:10px;">⚠️ Please enter a valid phone number (at least 10 digits).</div>';
                    return;
                }
            }

            const emailInput = form.querySelector('input[name="email"]');
            if (emailInput) {
                const emailVal = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailVal === '' || !emailRegex.test(emailVal)) {
                    resultsDiv.innerHTML = '<div style="color:#ef4444;background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);border-radius:8px;padding:10px 14px;font-size:0.875rem;margin-bottom:10px;">⚠️ Please enter a valid email address.</div>';
                    return;
                }
            }

            resultsDiv.innerHTML = '<div class="alert alert-info" style="color:blue;">Sending request...</div>';

            const formData = new FormData(form);
            
            // Disable submit button
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (submitBtn) submitBtn.disabled = false;
                if (data.success) {
                    resultsDiv.innerHTML = '';
                    form.reset();
                    showClimToast('🎉 Thank you! Our team will connect you soon.');
                    
                    // Reset Custom Selects UI
                    const selects = form.querySelectorAll('.custom-select-animated');
                    selects.forEach(select => {
                         const wrapper = select.closest('.custom-select-wrapper');
                         if(wrapper) {
                             const trigger = wrapper.querySelector('.custom-select-trigger');
                             // Reset to first option text
                             trigger.textContent = select.options[0].text;
                             trigger.style.color = '#6b7280'; // Placeholder color
                             wrapper.querySelectorAll('.custom-option').forEach(opt => opt.classList.remove('selected'));
                         }
                    });

                    setTimeout(() => {
                        modal.classList.remove('active');
                        document.body.style.overflow = '';
                        resultsDiv.innerHTML = ''; // Request clear
                    }, 3000);
                } else {
                    resultsDiv.innerHTML = '<div class="alert alert-danger" style="color:red;">' + (data.message || 'Submission failed.') + '</div>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                resultsDiv.innerHTML = '<div class="alert alert-danger" style="color:red;">An error occurred. Please try again.</div>';
            });
        });
    }
});
</script>
    <!-- Subscribe JS (handles UI states: loading, success, error + micro-anim) -->
    <script>
    (function(){
        function qs(sel, ctx){ return (ctx||document).querySelector(sel); }
        var wrapper = qs('#subscribeSection');
        if(!wrapper) return;
        var form = qs('#subscribeForm', wrapper);
        var input = qs('#subscribeEmail', wrapper);
        var btn = qs('#subscribeBtn', wrapper);
        var msg = qs('#subscribeMessage', wrapper);
        var btnContent = qs('#subscribeBtnContent', wrapper);
        var icon = btnContent.querySelector('i');

        function showMessage(type, text){
            msg.className = '';
            msg.classList.add(type === 'success' ? 'success' : 'error');
            msg.textContent = text;
            msg.classList.add('show');
            msg.setAttribute('aria-hidden','false');
        }

        function hideMessage(){
            msg.classList.remove('show','success','error');
            msg.textContent = '';
            msg.setAttribute('aria-hidden','true');
        }

        function setState(state, text){
            wrapper.classList.remove('error','success','loading','anim-fly');
            if(state === 'loading'){
                wrapper.classList.add('loading');
                btn.disabled = true; input.disabled = true;
                btnContent.innerHTML = '<span class="subscribe-spinner" aria-hidden="true"></span>';
                hideMessage();
            } else if(state === 'success'){
                wrapper.classList.add('success');
                btn.disabled = true; input.disabled = true;
                btnContent.innerHTML = '<i class="fas fa-check" aria-hidden="true"></i>';
                showMessage('success', text || 'Subscribed — check your inbox.');
                setTimeout(function(){
                    btnContent.innerHTML = '<i class="fas fa-paper-plane" aria-hidden="true"></i>';
                    wrapper.classList.add('anim-fly');
                }, 220);
            } else if(state === 'error'){
                wrapper.classList.add('error');
                btn.disabled = false; input.disabled = false;
                btnContent.innerHTML = '<i class="fas fa-paper-plane" aria-hidden="true"></i>';
                showMessage('error', text || 'Please enter a valid email.');
            } else {
                btn.disabled = false; input.disabled = false;
                btnContent.innerHTML = '<i class="fas fa-paper-plane" aria-hidden="true"></i>';
                hideMessage();
            }
        }

        function validEmail(v){ return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

        // flight animation via CSS class: remove after animation completes
        wrapper.addEventListener('animationend', function(e){
            if(e.animationName === 'planeFly'){
                setTimeout(function(){ setState('idle'); }, 700);
            }
        });

        form.addEventListener('submit', function(e){
            e.preventDefault();
            var email = input.value.trim();
            if(!validEmail(email)){
                setState('error','Please enter a valid email address.');
                return;
            }
            setState('loading');

            // POST to backend subscribe endpoint
            fetch('<?php echo base_url('subscribe'); ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'email=' + encodeURIComponent(email) + '&url=' + encodeURIComponent(window.location.href)
            }).then(function(res){
                return res.json();
            }).then(function(data){
                if(data && data.success){
                    setState('success', data.message || 'Subscribed — check your inbox.');
                    showClimToast('📬 You\'re subscribed! Thanks for joining us.');
                    input.value = '';
                } else {
                    setState('error', (data && data.message) || 'Subscription failed.');
                }
            }).catch(function(){
                setState('error','Subscription failed. Try again later.');
            });
        });

        input.addEventListener('input', function(){
            if(wrapper.classList.contains('error') || wrapper.classList.contains('success')){
                setState('idle');
            }
        });

        // a11y defaults
        msg.setAttribute('aria-live','polite');
        msg.setAttribute('aria-hidden','true');
    })();
    </script>
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

<!-- ===== CLIM TOAST NOTIFICATION ===== -->
<style>
#clim-toast {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 99999;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15), 0 4px 16px rgba(2,91,95,0.12);
    padding: 18px 22px 14px 18px;
    min-width: 300px;
    max-width: 380px;
    border-left: 5px solid #025b5f;
    transform: translateX(130%);
    opacity: 0;
    transition: transform 0.45s cubic-bezier(0.22,1,0.36,1), opacity 0.35s ease;
    pointer-events: none;
}
#clim-toast.show {
    transform: translateX(0);
    opacity: 1;
    pointer-events: auto;
}
#clim-toast .clim-toast-icon {
    width: 42px;
    height: 42px;
    min-width: 42px;
    background: linear-gradient(135deg, #025b5f, #10b981);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    color: #fff;
    box-shadow: 0 4px 12px rgba(2,91,95,0.25);
}
#clim-toast .clim-toast-body {
    flex: 1;
}
#clim-toast .clim-toast-title {
    font-weight: 700;
    font-size: 0.95rem;
    color: #025b5f;
    margin-bottom: 3px;
    line-height: 1.3;
}
#clim-toast .clim-toast-msg {
    font-size: 0.82rem;
    color: #4a5568;
    line-height: 1.5;
}
#clim-toast .clim-toast-close {
    background: none;
    border: none;
    color: #9ca3af;
    font-size: 1.1rem;
    cursor: pointer;
    padding: 0;
    line-height: 1;
    align-self: flex-start;
    transition: color 0.2s;
}
#clim-toast .clim-toast-close:hover { color: #025b5f; }
#clim-toast .clim-toast-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    border-radius: 0 0 16px 16px;
    background: linear-gradient(90deg, #025b5f, #10b981);
    width: 100%;
    transform-origin: left;
    animation: none;
}
#clim-toast.show .clim-toast-progress {
    animation: climProgress 5s linear forwards;
}
@keyframes climProgress {
    from { transform: scaleX(1); }
    to   { transform: scaleX(0); }
}
@media (max-width: 480px) {
    #clim-toast { right: 12px; left: 12px; min-width: unset; max-width: unset; bottom: 16px; }
}
</style>

<div id="clim-toast" role="alert" aria-live="polite">
    <div class="clim-toast-icon"><i class="fas fa-check"></i></div>
    <div class="clim-toast-body">
        <div class="clim-toast-title">Message Sent Successfully!</div>
        <div class="clim-toast-msg">Thank you for reaching out. Our team will connect with you soon. 🌿</div>
    </div>
    <button class="clim-toast-close" onclick="hideClimToast()" aria-label="Close">&times;</button>
    <div class="clim-toast-progress"></div>
</div>

<script>
var _climToastTimer = null;
function showClimToast(message) {
    var toast = document.getElementById('clim-toast');
    if (!toast) return;
    // Update message if provided
    if (message) toast.querySelector('.clim-toast-msg').textContent = message;
    // Reset animation
    toast.classList.remove('show');
    void toast.offsetWidth; // reflow to restart animation
    toast.classList.add('show');
    // Auto-dismiss after 5s
    if (_climToastTimer) clearTimeout(_climToastTimer);
    _climToastTimer = setTimeout(hideClimToast, 5000);
}
function hideClimToast() {
    var toast = document.getElementById('clim-toast');
    if (toast) toast.classList.remove('show');
    if (_climToastTimer) { clearTimeout(_climToastTimer); _climToastTimer = null; }
}
</script>
<!-- ===== END CLIM TOAST ===== -->
<!-- ===== MOBILE UX: SMART HEADER & FLOATING ICON ===== -->
<style>
/* Floating Action Button (Scroll to Top) for Mobile Only */
#mobile-fab {
    position: fixed;
    bottom: 30px;
    right: 20px;
    z-index: 99998; /* just below toast */
    width: 48px;
    height: 48px;
    background: #025b5f;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    cursor: pointer;
    transform: translateY(100px); /* hidden initially */
    opacity: 0;
    transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), opacity 0.3s ease;
}

#mobile-fab.show {
    transform: translateY(0);
    opacity: 1;
}

#mobile-fab:hover {
    background: #c8ff08; /* Lime from theme */
    color: #025b5f;
}

/* App-like Bottom Navigation Bar */
#mobile-bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #014d52;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 12px 0 10px 0;
    box-shadow: 0 -4px 20px rgba(0,0,0,0.25);
    z-index: 99997;
    transform: translateY(120%);
    transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border-top: 1px solid rgba(255,255,255,0.1);
}

#mobile-bottom-nav.show {
    transform: translateY(0);
}

#mobile-bottom-nav a {
    color: #ffffff;
    text-align: center;
    font-size: 0.75rem;
    font-weight: 500;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    opacity: 0.8;
    transition: all 0.2s ease;
    width: 100%;
}

#mobile-bottom-nav a:hover, #mobile-bottom-nav a:active {
    opacity: 1;
    color: #c8ff08;
}

#mobile-bottom-nav a i {
    font-size: 1.3rem;
    color: #c8ff08;
    margin-bottom: 2px;
}

.bottom-nav-item {
    position: relative;
    flex: 1;
    display: flex;
    justify-content: center;
    width: 20%;
}

/* Resources sub-menu popup */
.bottom-resources-menu {
    position: absolute;
    bottom: calc(100% + 15px);
    left: 50%;
    transform: translateX(-50%) translateY(10px);
    background: #000000;
    border-radius: 12px;
    padding: 8px 0;
    list-style: none;
    margin: 0;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 -5px 25px rgba(0,0,0,0.5);
    min-width: 130px;
    z-index: 99999;
}

.bottom-resources-menu::after {
    content: '';
    position: absolute;
    bottom: -6px;
    left: 50%;
    transform: translateX(-50%);
    border-width: 6px 6px 0;
    border-style: solid;
    border-color: #000000 transparent transparent transparent;
}

.bottom-resources-menu.active {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}

.bottom-resources-menu li {
    margin: 0;
    padding: 0;
}

/* Override default link flex direction for submenu items */
.bottom-resources-menu li a {
    display: block !important;
    text-align: left !important;
    padding: 10px 20px !important;
    color: #ffffff !important;
    font-size: 0.85rem !important;
    opacity: 1 !important;
}

.bottom-resources-menu li a:hover {
    color: #c8ff08 !important;
    background: rgba(255,255,255,0.08);
}

/* Global Search Widget Fix */
.widget__search {
    position: relative !important;
    display: flex !important;
    width: 100% !important;
    align-items: stretch !important;
    margin-bottom: 20px !important;
}

.widget__search input[type="text"], 
.widget__search input[type="search"] {
    flex: 1 !important;
    width: 100% !important;
    height: 50px !important;
    padding: 10px 15px !important;
    border: 1px solid #ddd !important;
    border-radius: 4px 0 0 4px !important;
    font-size: 15px !important;
    background: #fff !important;
    color: #333 !important;
    outline: none !important;
}

/* Remove default X clear button on some browsers */
.widget__search input[type="text"]::-ms-clear,
.widget__search input[type="search"]::-ms-clear,
.widget__search input[type="text"]::-webkit-search-cancel-button,
.widget__search input[type="search"]::-webkit-search-cancel-button {
    display: none;
}

.widget__search button {
    position: static !important;
    transform: none !important;
    width: 50px !important;
    height: 50px !important;
    padding: 0 !important;
    border: none !important;
    background: #c8ff08 !important;
    color: #000 !important;
    border-radius: 0 4px 4px 0 !important;
    cursor: pointer !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 16px !important;
    transition: background 0.3s ease !important;
}

.widget__search button:hover {
    background: #b5e607 !important;
}

/* Sidebar Spacing Fix for Mobile */
@media (max-width: 991px) {
    .sidebar-area {
        margin-top: 40px !important;
    }
}

/* Modifier class to hide header */
.header-hidden #main-xb-header {
    transform: translateY(-100%) !important;
}

/* Only show FAB and Bottom Nav on mobile/tablet */
@media (min-width: 1025px) {
    #mobile-fab, #mobile-bottom-nav {
        display: none !important;
    }
}
</style>

<div id="mobile-bottom-nav">
    <div class="bottom-nav-item">
        <a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i>Home</a>
    </div>
    <div class="bottom-nav-item">
        <a href="<?php echo base_url('about-us'); ?>"><i class="fas fa-info-circle"></i>About</a>
    </div>
    <div class="bottom-nav-item">
        <a href="<?php echo base_url('solutions'); ?>"><i class="fas fa-lightbulb"></i>Offerings</a>
    </div>
    
    <div class="bottom-nav-item">
        <a href="javascript:void(0);" onclick="toggleResourcesMenu(event)"><i class="fas fa-book"></i>Resources</a>
        <ul class="bottom-resources-menu" id="bottomResourcesMenu">
            <li><a href="<?php echo base_url('blogs'); ?>">Blogs</a></li>
            <li><a href="<?php echo base_url('news'); ?>">Insights</a></li>
            <li><a href="<?php echo base_url('report'); ?>">Reports</a></li>
        </ul>
    </div>

    <div class="bottom-nav-item">
        <a href="javascript:void(0);" onclick="document.body.classList.add('xb-sidebar-open');"><i class="fas fa-bars"></i>Menu</a>
    </div>
</div>

<div id="mobile-fab" onclick="window.scrollTo({top: 0, behavior: 'smooth'});" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
</div>

<script>
function toggleResourcesMenu(e) {
    e.stopPropagation();
    const menu = document.getElementById('bottomResourcesMenu');
    menu.classList.toggle('active');
}

// Close the resources sub-menu if clicking anywhere else
document.addEventListener('click', function(e) {
    const menu = document.getElementById('bottomResourcesMenu');
    if (menu && menu.classList.contains('active') && !e.target.closest('.bottom-nav-item')) {
        menu.classList.remove('active');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    let lastScrollY = window.scrollY;
    // Query both possible header IDs used in navbar1 vs navbar2
    const headerEl = document.querySelector('#main-xb-header') || document.querySelector('.xb-header');
    const fabEl = document.getElementById('mobile-fab');
    const bottomNavEl = document.getElementById('mobile-bottom-nav');

    window.addEventListener('scroll', function() {
        const currentScrollY = window.scrollY;
        
        // Only run logic on mobile screens (viewport <= 1024px)
        if (window.innerWidth <= 1024) {
            
            // 1. Hide/Show Header and Bottom Nav
            if (currentScrollY > 100 && currentScrollY > lastScrollY) {
                // Scrolling down -> hide top header, show bottom nav
                document.body.classList.add('header-hidden');
                if (bottomNavEl) bottomNavEl.classList.add('show');
            } else if (currentScrollY < lastScrollY || currentScrollY <= 100) {
                // Scrolling up -> show top header, hide bottom nav
                document.body.classList.remove('header-hidden');
                if (bottomNavEl) bottomNavEl.classList.remove('show');
            }
            
            // 2. Show/Hide Floating Icon
            if (currentScrollY > 300) {
                fabEl.classList.add('show');
            } else {
                fabEl.classList.remove('show');
            }
        } else {
            // Ensure classes are removed on desktop resizing
            document.body.classList.remove('header-hidden');
            fabEl.classList.remove('show');
            if (bottomNavEl) bottomNavEl.classList.remove('show');
        }
        
        lastScrollY = currentScrollY;
    }, { passive: true });
});
</script>
<!-- ===== END MOBILE UX ===== -->

<!-- ===== AI DATA NETWORK PARTICLES DEMO ===== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Wait slightly to ensure all background images and DOM are settled
    setTimeout(function() {
        const heroSection = document.querySelector('.hero.hero-two') || 
                            document.querySelector('.page-title-area') || 
                            document.querySelector('.bg_image');

        if (heroSection && window.particlesJS) {
            // Prepare the particle canvas container
            const pDiv = document.createElement('div');
            pDiv.id = 'particles-js-ai-demo';
            pDiv.style.position = 'absolute';
            pDiv.style.top = '0';
            pDiv.style.left = '0';
            pDiv.style.width = '100%';
            pDiv.style.height = '100%';
            pDiv.style.zIndex = '1';  // Put it over the background image (z-index 0)
            pDiv.style.pointerEvents = 'none'; // Ensure it doesn't block clicks on links
            
            // Ensure parent is relative and elements above particles have higher z-index
            if (getComputedStyle(heroSection).position === 'static') {
                heroSection.style.position = 'relative';
            }
            
            const containerInner = heroSection.querySelector('.container');
            if (containerInner) {
                containerInner.style.position = 'relative';
                containerInner.style.zIndex = '2'; // Text and buttons go over particles
            }

            // Append at the end (absolute positioning keeps it in place)
            heroSection.appendChild(pDiv);

            // Initialize the sleek Data Node network
            particlesJS('particles-js-ai-demo', {
              "particles": {
                "number": {
                  "value": 70,
                  "density": { "enable": true, "value_area": 800 }
                },
                "color": { "value": "#d1ff44" }, // Lime Green Nodes
                "shape": { "type": "circle" },
                "opacity": {
                  "value": 0.6,
                  "random": true,
                  "anim": { "enable": true, "speed": 1, "opacity_min": 0.1, "sync": false }
                },
                "size": {
                  "value": 3.5,
                  "random": true,
                  "anim": { "enable": false }
                },
                "line_linked": {
                  "enable": true,
                  "distance": 160,
                  "color": "#ffffff",
                  "opacity": 0.25,
                  "width": 1.2
                },
                "move": {
                  "enable": true,
                  "speed": 1.5,
                  "direction": "none",
                  "random": true,
                  "straight": false,
                  "out_mode": "out",
                  "bounce": false
                }
              },
              "interactivity": {
                "detect_on": "canvas",
                "events": {
                  "onhover": { "enable": false },
                  "onclick": { "enable": false },
                  "resize": true
                }
              },
              "retina_detect": true
            });
        }
    }, 200); // 200ms delay to ensure everything is ready
});
</script>
<!-- ===== END PARTICLES DEMO ===== -->

<!-- Cookie consent temporarily disabled for now -->

</body>
</html>