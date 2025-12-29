<div class="body_wrap">
    <!-- header start -->

    <!-- header end -->

    <!-- header start -->
    <header id="xb-header-area" class="header-area heade-style-two">
        <div class="xb-header stricky">
            <div class="container">
                <div class="header__wrap ul_li_between">
                    <div class="header-logo">
                        <a class="navbar-brand" href="<?php echo base_url(); ?>">
                            <?= anchor(base_url(), img(array('src' => 'assest/uploadfile/' . $getCompany->comp_logo, 'title' => $getCompany->comp_name, 'alt' => $getCompany->comp_name, 'class'=>'brand-logo'))) ?>
                        </a>
                    </div>
                    <div class="main-menu__wrap ul_li navbar navbar-expand-lg">
                        <nav class="main-menu collapse navbar-collapse">
                            <ul>
                                <li>
                                    <?php echo anchor(base_url(), 'Home'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('about-us', 'About'); ?>
                                    <ul class="submenu">
                                        <!-- <li><?php echo anchor('our-journey', 'Our Journey'); ?></li> -->
                                        <!-- <li><?php echo anchor('our-team', 'Our Team'); ?></li> -->
                                    </ul>
                                </li>
                                <li>
                                    <?php echo anchor('solutions', 'offerings'); ?>
                                </li>
                                <li class="menu-item-has-children">
                                    <?php echo anchor('', 'Resources'); ?>
                                    <ul class="submenu">
                                    <?php echo anchor('blogs', 'Blogs'); ?>
                                    <?php echo anchor('news', 'Insights'); ?>
                                    <?php echo anchor('#', 'Articles'); ?>
                                    </ul>
                                </li>
                                <li>
                                    <?php echo anchor('contact-us', 'Contact'); ?>
                                </li>
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
                                                <?php echo anchor(base_url(), 'Home'); ?>
                                            </li>
                                            <li class="menu-item">
                                                <?php echo anchor('about-us', 'About'); ?>
                                                <ul class="submenu">
                                                    <!-- <li><?php echo anchor('our-journey', 'Our Journey'); ?></li> -->
                                                    <!-- <li><?php echo anchor('our-team', 'Our Team'); ?></li> -->
                                                </ul>
                                            </li>
                                            <li class="menu-item">
                                                <?php echo anchor('solutions', 'offerings'); ?>
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

                                            .submenu {
                                                        position: absolute;
                                                        top: 100%;
                                                        left: 0;
                                                        width: 220px;
                                                        background: black; /* Changed background */
                                                        border-radius: 8px;
                                                        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 
                                                                    0 4px 6px -2px rgba(0, 0, 0, 0.05);
                                                        opacity: 0;
                                                        visibility: hidden;
                                                        transform: translateY(10px);
                                                        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                                                        z-index: 100;
                                                        padding: 8px 0;
                                                    }

                                            .menu-item-has-children:hover .submenu {
                                                opacity: 1;
                                                visibility: visible;
                                                transform: translateY(0);
                                            }

                                            .submenu a {
                                                display: block;
                                                padding: 10px 20px;
                                                color: #025b5f;
                                                font-size: 14px;
                                                transition: all 0.2s ease;
                                            }

                                            .submenu a:hover {
                                                background: #025b5f;
                                                color: #FFFF;
                                                transform: translateX(4px);
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
                                                <?php echo anchor('', 'Resources'); ?>
                                                <ul class="submenu">
                                                    <?php echo anchor('blogs', 'Blogs', 'class="hover:text-indigo-600"'); ?>
                                                    <?php echo anchor('news', 'Insights', 'class="hover:text-indigo-600"'); ?>
                                                    <?php echo anchor('articles', 'Articles', 'class="hover:text-indigo-600"'); ?>
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
                        <a class="login-btn" href="<?php echo base_url('solutions').'#consult-us' ?>">Book a Call</a>
                        <div class="header-bar-mobile side-menu d-lg-none">
                            <a class="xb-nav-mobile" href="javascript:void(0);"><i class="fas fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <main>