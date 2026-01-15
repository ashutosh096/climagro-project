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
    .subscribe-wrapper {
        position: relative;
        width: 100%;
        max-width: 420px;
        font-family: inherit;
    }

    .subscribe-form {
        position: relative;
        display: flex;
        align-items: center;
        gap: 0;
    }

    /* Dark translucent input with subtle glass effect */
    .subscribe-input {
        flex: 1 1 auto;
        height: 48px;
        padding: 4px 18px 4px 40px;
        border-radius: 28px 0 0 28px;
        border: 1px solid rgba(255,255,255,0.06);
        background: linear-gradient(180deg, rgba(10,16,25,0.36), rgba(10,16,25,0.24));
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        color: #fff;
        font-size: 0.85rem;
        line-height: 1;
        outline: none;
        transition: box-shadow .22s ease, border-color .18s ease, transform .18s ease;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.02);
    }

    .subscribe-input::placeholder { color: rgba(203,213,225,0.45); }

    /* New compact input for smaller height */
    #subscribeEmail {
        height: 48px !important;
        padding: 8px 18px 8px 40px !important;
        font-size: 0.9rem !important;
        line-height: 1.2 !important;
        border-radius: 28px 0 0 28px !important;
        background : #ffff;
        color: #000 !important;
    }
    .subscribe-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(203,213,225,0.6);
        pointer-events: none;
        transition: transform .22s ease, color .18s ease, opacity .18s ease;
        font-size: 1.1rem;
    }

    .subscribe-wrapper:focus-within .subscribe-icon {
        color: #10b981;
        transform: translateY(-50%) scale(1.06);
        opacity: 1;
    }

    /* Action button with gradient and micro-movement */
    .subscribe-btn {
        height: 48px;
        padding: 0 20px;
        border-radius: 0 28px 28px 0;
        border: none;
        background: #10b981;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        cursor: pointer;
        transition: transform .16s ease, box-shadow .16s ease, opacity .16s ease;
        box-shadow: 0 10px 30px rgba(16,185,129,0.14);
        -webkit-tap-highlight-color: transparent;
    }

    .subscribe-btn:disabled { opacity: 0.72; cursor: not-allowed; }

    .subscribe-btn i { display: inline-block; transition: transform .42s cubic-bezier(.2,.9,.3,1), opacity .2s ease; }

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
        .subscribe-input { border-radius: 12px; padding-left: 42px; }
        .subscribe-btn { border-radius: 12px; width: 100%; }
        .subscribe-icon { left: 12px; }
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
                    <li><a href="<?php echo base_url('solutions'); ?>">Offerings</a></li>
                    <li><a href="<?php echo base_url('contact-us'); ?>">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <div class="footer-title">Contact</div>
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
                        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode('CSJM Innovation Foundation Chhatrapati Shahu Ji Maharaj University, Kanpur- 208024'); ?>" target="_blank" rel="noopener" style="color: #d1d5db; text-decoration: none;">
                            CSJM Innovation Foundation Chhatrapati Shahu Ji Maharaj University, Kanpur- 208024
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="footer-column">
                <div class="footer-title">Subscribe</div>
                <div class="subscribe-wrapper" id="subscribeSection">
                    <form class="subscribe-form" id="subscribeForm" novalidate>
                        <i class="fas fa-at subscribe-icon" aria-hidden="true"></i>
                        <input id="subscribeEmail" type="email" name="email" placeholder="Enter your email" class="subscribe-input" autocomplete="email" style="height: 48px !important; padding: 8px 18px 8px 40px !important; font-size: 0.9rem !important; line-height: 1 !important;" />
                        <button id="subscribeBtn" type="submit" class="subscribe-btn" aria-label="Subscribe">
                            <span id="subscribeBtnContent"><i class="fas fa-paper-plane"></i></span>
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

 <!-- Book a Walkthrough Modal -->
 <div class="climate-modal-overlay" id="walkthroughModal">
    <div class="climate-modal">
        <!-- Close Button Absolute -->
        <button class="climate-close-btn" id="closeWalkthroughModal">&times;</button>
        
        <div class="climate-modal-body">
            <!-- New Header Section -->
            <div style="text-align: center; margin-bottom: 1rem;">
                <span style="background: #f3f4f6; color: #6b7280; padding: 4px 16px; border-radius: 50px; font-size: 0.75rem; font-weight: 600; letter-spacing: 0.5px; border: 1px solid #e5e7eb; display: inline-block; margin-bottom: 0.5rem;">SCHEDULE A WALKTHROUGH</span>
                <h3 style="font-size: 1.35rem; color: #1f2937; margin-bottom: 0.25rem; line-height: 1.2;">
                    Schedule a <span style="color: #025B5F;">Walkthrough</span>
                </h3>
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
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Your name</label>
                        <input type="text" class="form-control" placeholder="e.g. John Smith" name="name" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;">
                    </div>
                    <!-- Phone -->
                    <div class="col-lg-6 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Phone number (optional)</label>
                        <input type="tel" class="form-control" placeholder="e.g. +1 222 444 66" name="phone" id="walkthroughPhone" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;" inputmode="numeric" pattern="[0-9]*" maxlength="15">
                    </div>
                    <!-- Email -->
                    <div class="col-lg-12 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Email address</label>
                        <input type="email" class="form-control" placeholder="e.g. john@email.com" name="email" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;">
                    </div>
                    <!-- Title -->
                    <div class="col-lg-6 mb-2">
                         <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">I am a</label>
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
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Interested In</label>
                        <select name="interested" class="custom-select-animated" style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; background-color: #fafafa; height: auto; font-size: 0.9rem;">
                            <!-- <option value="">Select interest</option> -->
                            <option value="AgRI.ai">AgRI.ai</option>
                            <option value="CityAdapt.ai">CityAdapt.ai</option>
                            <option value="Climate Data Portal">Climate Data Portal</option>
                            <option value="Climate Consulting">Climate Consulting</option>
                             <option value="Collaborations">Collaborations / Research</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <!-- Comment -->
                    <div class="col-lg-12 mb-3">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Is there anything you want me to know before our call?</label>
                        <textarea class="form-control" name="comment" cols="30" rows="2" placeholder="Type here ..." style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;"></textarea>
                    </div>
                    <!-- Submit -->
                    <div class="col-lg-12" style="display: flex; justify-content: center;">
                        <button type="submit" class="btn-custom-pill">
                            Book Walkthrough
                        </button>
                    </div>
                </div>
                <div class="walkthrough-form-results mt-2"></div>
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
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const resultsDiv = form.querySelector('.walkthrough-form-results');
            
            // Clear prev results
            resultsDiv.innerHTML = '';
            
            // Basic validation
            const phoneVal = phoneInput.value.trim();
             if (phoneVal !== '' && !/^[0-9]+$/.test(phoneVal)) {
                resultsDiv.innerHTML = '<div class="alert alert-danger" style="color:red;">Please enter a valid phone number.</div>';
                return;
            }

            resultsDiv.innerHTML = '<div class="alert alert-info" style="color:blue;">Sending request...</div>';

            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    resultsDiv.innerHTML = '<div class="alert alert-success" style="color:green;">' + data.message + '</div>';
                    form.reset();
                    
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
                body: 'email=' + encodeURIComponent(email)
            }).then(function(res){
                return res.json();
            }).then(function(data){
                if(data && data.success){
                    setState('success', data.message || 'Subscribed — check your inbox.');
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
</body>
</html>