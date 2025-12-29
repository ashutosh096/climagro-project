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
                    <?php echo $getCompany->comp_email; ?>
                </div>
                <div class="footer-contact">
                    <i class="fas fa-phone"></i>
                    <?php echo $getCompany->comp_mobile; ?>
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
            fetch('<?php echo base_url('subscribe.php'); ?>', {
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