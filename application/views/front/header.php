<?php foreach ($companydata as $getCompany); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>
        <?php 
        $segment = $this->uri->segment(1);
        if ($segment == 'about-us') {
            echo "About ClimAgro Analytics";
        } elseif ($segment == 'solutions') {
            echo "Offerings | ClimAgro Analytics";
        } elseif ($segment == 'contact-us') {
            echo "Contact Us | ClimAgro Analytics";
        } elseif ($segment == 'blogs') {
            echo "Blogs | ClimAgro Analytics";
        } elseif ($segment == 'news') {
            echo "Insights | ClimAgro Analytics";
        } elseif ($segment == '' || $segment == 'home') {
            echo "ClimAgro Analytics | Climate Risk Solutions";
        } else {
            $decoded_title = base64_decode(@$allmeta->title);
            $clean_title = str_replace(['GMAC- No#1', 'Gmac Animation', 'GMAC'], 'ClimAgro', $decoded_title);
            $clean_title = preg_replace('/Digital Marketing.*/i', '', $clean_title);
            $final_title = trim(rtrim($clean_title, ' ,-|'));
            echo $final_title ?: "ClimAgro Analytics";
        }
        ?>
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ClimAgro Analytics">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, viewport-fit=cover" />
    <meta name="title" content="<?php echo @$courseDetail->page_title . @$courseDetail->services_title; ?>" />
    <meta name="description" content="<?php echo base64_decode(@$allmeta->description); ?>" />
    <meta name="keywords" content="<?php echo base64_decode(@$allmeta->content); ?>" />
    <!-- google fonts preconnect -->

    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P2S4DZSYW3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-P2S4DZSYW3');
    </script>

    <?php
    echo link_tag("assest/img/favicon.png", "icon", 'image/png');
    echo link_tag("assest/css/bootstrap.min.css");
    echo link_tag("assest/css/fontawesome.css");
    echo link_tag("assest/css/animate.css");
    echo link_tag("assest/css/swiper.min.css");
    echo link_tag("assest/css/odometer.css");
    echo link_tag("assest/css/magnific-popup.css");
    echo link_tag("assest/css/main.css");
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        .border-radius {
            border-radius: 25px;
        }

        /* Global fix to disable double-text hover glitch on template buttons */
        .them-btn .btn_label::before,
        .them-btn .btn_label::after {
            content: none !important;
            display: none !important;
        }
        /* Stop the original text from flying off the button when hovered */
        .them-btn:hover .btn_label, 
        .them-btn .btn_label {
            transform: none !important;
        }
        .them-btn {
            text-decoration: none !important;
        }

        /* Make all social media icons brand yellow circles with teal icons globally */
        .footer-social a, .widget__social li a, .widget__social a {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 36px !important;
            height: 36px !important;
            background-color: #c8ff08 !important;
            border-radius: 50% !important;
            text-decoration: none !important;
            transition: all 0.3s ease !important;
            margin: 0 3px !important;
            flex-shrink: 0 !important;
        }
        .widget__social li {
            list-style: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .widget__social {
            padding-left: 0 !important;
            display: flex !important;
            flex-wrap: nowrap !important;
            gap: 6px !important;
            overflow: visible;
        }
        .footer-social a i, .widget__social li a i, .widget__social a i {
            color: #025b5f !important;
            font-size: 16px !important;
            transition: all 0.3s ease !important;
        }
        
        /* Hover Effect: elevate and change background */
        .footer-social a:hover, .widget__social li a:hover, .widget__social a:hover {
            transform: translateY(-4px) !important;
            box-shadow: 0 5px 15px rgba(200, 255, 8, 0.4) !important;
            background-color: #ffffff !important;
        }
        .footer-social a:hover i, .widget__social li a:hover i, .widget__social a:hover i {
            color: #025b5f !important;
        }
    </style>
    <?php if (!empty($extraHeadHTML)) { echo $extraHeadHTML; } ?>
</head>

<body>

   <!-- backtotop - start -->
<div class="xb-backtotop">
    <a href="#" class="scroll">
        <i class="fas fa-arrow-up"></i>
    </a>
</div>
<!-- backtotop - end -->

<!-- preloader start -->
<!--<div class="preloader">-->
<!--    <div class="loader">-->
<!--        <div class="line-scale">-->
<!--            <div></div>-->
<!--            <div></div>-->
<!--            <div></div>-->
<!--            <div></div>-->
<!--            <div></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->