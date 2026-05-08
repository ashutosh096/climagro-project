<div class="body_wrap">
    <!-- <style>
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
    </style> -->
    <!-- header start -->

    <!-- header end -->
    <script>
    (function() {
        function openNav() { document.body.classList.add('xb-sidebar-open'); }
        function closeNav() { document.body.classList.remove('xb-sidebar-open'); }
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.xb-nav-mobile, .header-bar-mobile').forEach(function(btn) {
                btn.addEventListener('click', function(e) { e.preventDefault(); openNav(); });
            });
            var closeBtn = document.querySelector('.xb-menu-close');
            if (closeBtn) closeBtn.addEventListener('click', closeNav);
            var backdrop = document.querySelector('.xb-header-menu-backdrop');
            if (backdrop) backdrop.addEventListener('click', closeNav);
        });
    })();
    </script>


    <!-- header start -->
    <header id="xb-header-area" class="header-area heade-style-two">
        <div class="xb-header" id="main-xb-header" style="position:fixed !important; top:0px !important; left:0 !important; width:100% !important; z-index:9999 !important; background-color:#025b5f !important; padding-top: env(safe-area-inset-top) !important; transition: transform 0.3s ease-in-out !important; transform: translateY(0); box-shadow: 0 4px 15px rgba(0,0,0,0.15), 0 10px 30px rgba(0,0,0,0.1);">
            <div class="container header-nav-container">
                <div class="header__wrap ul_li_between">
                    <div class="header-logo">
                        <a class="navbar-brand" href="<?php echo base_url(); ?>">
                            <?= anchor(base_url(), img(array('src' => 'assest/uploadfile/' . $getCompany->comp_logo, 'title' => $getCompany->comp_name, 'alt' => $getCompany->comp_name, 'class'=>'brand-logo'))) ?>
                        </a>
                    </div>
<?php 
$current_page = $this->uri->segment(1); 
$lime_style = 'style="color: #c8ff08 !important; text-decoration: underline !important; text-decoration-color: #c8ff08 !important; text-underline-offset: 8px; text-decoration-thickness: 2px;"';
?>
<style>
    .header-nav-container {
        max-width: 1320px !important;
        width: 100% !important;
        margin-left: auto !important;
        margin-right: auto !important;
        padding-left: 15px !important;
        padding-right: 15px !important;
        display: block !important;
    }
    .header__wrap {
        display: flex !important;
        width: 100% !important;
        justify-content: space-between !important;
        align-items: center !important;
        flex-wrap: nowrap !important;
    }
    .header-btn {
        margin-left: auto !important;
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
    }
    @media (min-width: 992px) {
        .main-menu__wrap {
            flex: 1 !important;
            display: flex !important;
            justify-content: center !important;
        }
        .main-menu__wrap .main-menu {
            width: 100% !important;
            display: flex !important;
            justify-content: center !important;
        }
        .main-menu__wrap .main-menu ul {
            display: flex !important;
            justify-content: center !important;
            margin: 0 auto !important;
            padding-left: 0 !important;
        }
        .xb-header-wrap { display: none !important; }
    }
    @media (max-width: 991px) {
        .main-menu { display: none !important; }
        .xb-header-wrap {
            display: block !important;
            position: fixed !important;
            top: 0 !important;
            left: -350px !important;
            width: 300px !important;
            height: 100vh !important;
            background: #014d52 !important;
            z-index: 99999 !important;
            transition: left 0.3s ease !important;
            overflow-y: auto !important;
            box-shadow: 4px 0 25px rgba(0,0,0,0.4) !important;
        }
        body.xb-sidebar-open .xb-header-wrap { left: 0 !important; }
        .xb-header-menu-backdrop {
            position: fixed !important;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.55) !important;
            z-index: 99998 !important;
            display: none !important;
        }
        body.xb-sidebar-open .xb-header-menu-backdrop { display: block !important; }
        .xb-menu-primary {
            list-style: none !important;
            padding: 80px 0 20px !important;
            margin: 0 !important;
        }
        .xb-menu-primary > li { border-bottom: 1px solid rgba(255,255,255,0.12) !important; }
        .xb-menu-primary > li > a {
            display: block !important;
            padding: 16px 24px !important;
            color: #ffffff !important;
            font-size: 16px !important;
            font-weight: 500 !important;
            text-decoration: none !important;
        }
        .xb-menu-primary > li > a:hover { color: #c8ff08 !important; background: rgba(255,255,255,0.08) !important; }
        .xb-menu-primary .submenu {
            list-style: none !important;
            padding: 4px 0 4px 20px !important;
            margin: 0 !important;
            background: rgba(0,0,0,0.15) !important;
        }
        .xb-menu-primary .submenu a {
            display: block !important;
            padding: 12px 24px !important;
            color: rgba(255,255,255,0.8) !important;
            font-size: 14px !important;
            text-decoration: none !important;
        }
        .xb-menu-close {
            position: absolute !important;
            top: 18px !important; right: 18px !important;
            width: 38px !important; height: 38px !important;
            cursor: pointer !important;
            background: rgba(255,255,255,0.15) !important;
            border-radius: 50% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            z-index: 10 !important;
        }
        .xb-menu-close::before, .xb-menu-close::after {
            content: '';
            position: absolute;
            width: 16px; height: 2px;
            background: #fff; border-radius: 2px;
        }
        .xb-menu-close::before { transform: rotate(45deg); }
        .xb-menu-close::after  { transform: rotate(-45deg); }
        .xb-header-mobile-search { display: none !important; }
        .login-btn { font-size: 13px !important; padding: 8px 14px !important; white-space: nowrap !important; }
    }
</style>
                    <div class="main-menu__wrap ul_li navbar navbar-expand-lg">
                        <nav class="main-menu collapse navbar-collapse">
                            <ul>
                                <li>
                                    <?php echo anchor(base_url(), 'Home', ($current_page == '' || $current_page == 'home') ? $lime_style : ''); ?>
                                </li>
                                <li>
                                    <?php echo anchor('about-us', 'About', ($current_page == 'about-us') ? $lime_style : ''); ?>
                                    <ul class="submenu">
                                        <!-- <li><?php echo anchor('our-journey', 'Our Journey'); ?></li> -->
                                        <!-- <li><?php echo anchor('our-team', 'Our Team'); ?></li> -->
                                    </ul>
                                </li>
                                <li>
                                    <?php echo anchor('solutions', 'Offerings', ($current_page == 'solutions') ? $lime_style : ''); ?>
                                </li>
                                <li class="menu-item-has-children">
                                    <?php echo anchor('#', 'Resources', (in_array($current_page, ['blogs', 'news', 'articles'])) ? $lime_style : ''); ?>
                                    <ul class="submenu">
                                    <?php echo anchor('blogs', 'Blogs'); ?>
                                    <?php echo anchor('news', 'Insights'); ?>
                                    <?php echo anchor('articles', 'Reports'); ?>
                                    </ul>
                                </li>
                                <!-- <li>
                                    <?php echo anchor('contact-us', 'Contact'); ?>
                                </li> -->
                            </ul>
                        </nav>
                        <div class="xb-header-wrap">
                            <div class="xb-header-menu">
                                <div class="xb-header-menu-scroll">
                                    <div class="xb-menu-close xb-hide-xl xb-close"></div>
                                    <!--<div class="xb-logo-mobile xb-hide-xl">-->
                                    <!--    <a href="index.html" rel="home"><img src="assets/img/logo/Logo.svg" alt=""></a>-->
                                    <!--</div>-->
                                    <div class="xb-header-mobile-search xb-hide-xl">
                                        <form role="search" action="#">
                                            <input type="text" placeholder="Search..." name="s" class="search-field">
                                        </form>
                                    </div>
                                    <nav class="xb-header-nav">
                                        <ul class="xb-menu-primary clearfix">
                                            <li class="menu-item">
                                                <?php echo anchor(base_url(), 'Home', ($current_page == '' || $current_page == 'home') ? $lime_style : ''); ?>
                                            </li>
                                            <li class="menu-item">
                                                <?php echo anchor('about-us', 'About', ($current_page == 'about-us') ? $lime_style : ''); ?>
                                                <ul class="submenu">
                                                    <!-- <li><?php echo anchor('our-journey', 'Our Journey'); ?></li> -->
                                                    <!-- <li><?php echo anchor('our-team', 'Our Team'); ?></li> -->
                                                </ul>
                                            </li>
                                            <li class="menu-item">
                                                <?php echo anchor('solutions', 'Offerings', ($current_page == 'solutions') ? $lime_style : ''); ?>
                                            </li>
                                            <style>
                                            /* Modern Dropdown Styles */
                                            .menu-item-has-children {
                                                position: relative;
                                                transition: all 0.3s ease;
                                            }

                                            .menu-item-has-children > a {
                                                display: flex;
                                                align-items: center;
                                                gap: 6px;
                                                padding: 12px 20px;
                                                color: #025b5f;
                                                font-weight: 500;
                                                transition: all 0.3s ease;
                                            }

                                            .menu-item-has-children:hover > a {
                                                color: #FFFF;
                                            }

                                            .menu-item-has-children::after {
                                                content: "";
                                                font-size: 12px;
                                                transition: transform 0.3s ease;
                                            }

                                            .menu-item-has-children:hover::after {
                                                transform: rotate(180deg);
                                            }

                                            /* Use higher-specificity to override main.css rules */
                                            .main-menu ul li .submenu,
                                            .xb-menu-primary li .submenu {
                                                position: absolute;
                                                top: 100%;
                                                left: 0;
                                                width: 220px;
                                                background: black !important; /* ensure override */
                                                border-radius: 8px;
                                                /* remove shadow to avoid visible shadow while hovering submenus */
                                                box-shadow: none !important;
                                                opacity: 0;
                                                visibility: hidden;
                                                transform: translateY(10px);
                                                transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                                                z-index: 1000;
                                                padding: 8px 0;
                                                pointer-events: none;
                                            }

                                            /* Match the specificity of the original rule so our hover state wins */
                                            .main-menu ul li.menu-item-has-children:hover > .submenu,
                                            .xb-menu-primary li.menu-item-has-children:hover > .submenu,
                                            .menu-item-has-children:hover > .submenu {
                                                opacity: 1 !important;
                                                visibility: visible !important;
                                                transform: translateY(0) !important;
                                                pointer-events: auto !important;
                                            }

                                            .submenu a {
                                                display: block;
                                                padding: 10px 20px;
                                                color: #025b5f;
                                                font-size: 14px;
                                                transition: all 0.2s ease;
                                                position: relative; /* ensure ::before positions correctly */
                                                width: 100%;
                                                box-sizing: border-box;
                                            }

                                            .submenu a:hover {
                                                background: #025b5f;
                                                color: #FFFF;
                                            }

                                            /* Modern hover effect */
                                            .submenu a::before {
                                                content: "";
                                                position: absolute;
                                                left: 0;
                                                top: 0;
                                                height: 100%;
                                                width: 3px;
                                                background: #025b5f;
                                                transform: scaleY(0);
                                                transition: transform 0.2s ease;
                                            }

                                            .submenu a:hover::before {
                                                transform: scaleY(1);
                                            }
                                            </style>
                                            <li class="menu-item-has-children">
                                                <?php echo anchor('#', 'Resources', (in_array($current_page, ['blogs', 'news', 'articles'])) ? $lime_style : ''); ?>
                                                <ul class="submenu">
                                                    <?php echo anchor('blogs', 'Blogs', 'class="hover:text-indigo-600"'); ?>
                                                    <?php echo anchor('news', 'Insights', 'class="hover:text-indigo-600"'); ?>
                                                    <?php echo anchor('articles', 'Reports', 'class="hover:text-indigo-600"'); ?>
                                                </ul>
                                            </li>

                                            <li class="menu-item">
                                                <?php echo anchor('contact-us', 'Contact'); ?>
                                            </li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="xb-header-menu-backdrop"></div>
                        </div>
                    </div>
                    <div class="header-btn ul_li">
                        <a class="login-btn" style="text-decoration: none !important;" href="<?php echo base_url('contact-us.php').'#formcontact' ?>">Contact Us</a>
                        <div class="header-bar-mobile side-menu d-lg-none">
                            <a class="xb-nav-mobile" href="javascript:void(0);"><i class="fas fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    <script>
    (function() {
        function openNav() { document.body.classList.add('xb-sidebar-open'); }
        function closeNav() { document.body.classList.remove('xb-sidebar-open'); }
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.xb-nav-mobile, .header-bar-mobile').forEach(function(btn) {
                btn.addEventListener('click', function(e) { e.preventDefault(); openNav(); });
            });
            var closeBtn = document.querySelector('.xb-menu-close');
            if (closeBtn) closeBtn.addEventListener('click', closeNav);
            var backdrop = document.querySelector('.xb-header-menu-backdrop');
            if (backdrop) backdrop.addEventListener('click', closeNav);
        });
    })();
    </script>


    <main>