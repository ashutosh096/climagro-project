<?php foreach ($companydata as $getCompany); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <title><?php echo base64_decode($allmeta->title); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Global Power Data">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
    <meta name="title" content="<?php echo @$courseDetail->page_title . @$courseDetail->services_title; ?>" />
    <meta name="description" content="<?php echo base64_decode($allmeta->description); ?>" />
    <meta name="keywords" content="<?php echo base64_decode($allmeta->content); ?>" />
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        .border-radius {
            border-radius: 25px;
        }
    </style>
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