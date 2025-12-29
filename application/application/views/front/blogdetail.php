<?php
include_once('header.php');
include_once('navbar2.php');
?>
<style>
    p{
        color: #000!important;;
    }
</style>
<!-- breadcrumb start -->
<section class="breadcrumb bg_img pos-rel" data-background="<?php echo base_url('assest/img/bg/blog.png') ?>">
    <div class="container">
        <div class="breadcrumb__content">
            <h2 class="breadcrumb__title">Blogs</h2>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- blog start -->
<section class="blog pt-130 pb-130">
    <div class="container">
        <div class="row mt-none-30">
            <div class="col-lg-12 mt-30">
                <?php 
                // echo "<pre>";
                // print_r($courseList);
                // exit;
                // foreach ($courseList as $courseDetail) { ?> 
                    <div class="blog-post-wrapper">
                        <article class="post-details">
                            <div class="post-thumb">
                                <img src="<?php echo base_url() . '/assest/uploadfile/blogimages/' . $courseDetail->page_image; ?>" alt="">
                            </div>
                            <ul class="blog__meta ul_li mb-30">
                                <!-- <li><a href="#!"><i class="far fa-user"></i>Colin Scotland</a></li> -->
                                <li><i class="far fa-clock"></i><?php echo date('M j, Y', strtotime($courseDetail->date)); ?></li>
                                <!-- <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li> -->
                            </ul>
                            <h2><?php echo $courseDetail->page_title; ?></h2>
                            <p><?php echo $courseDetail->page_content; ?></p>
                        </article>
                    </div>
                <?php //}  ?> 
            </div>
        </div>
    </div>
</section>
<!-- blog end -->


<?php include("footer.php"); ?>