<?php
include_once('header.php');
include_once('navbar2.php');
?>
<style>
    /* This rule targets EVERY element inside the article */
    .post-details * {
        font-size: 20px !important;
        color: #000;
        line-height: 2 !important; /* Added for common line spacing */
    }

    /* This new, more specific rule targets ONLY the links */
    .post-details a {
        color: blue !important;
        text-decoration: underline; /* Optional: adds an underline to links */
    }

    /* Optional: Style for links that have already been visited */
    .post-details a:visited {
        color: purple !important;
    }
</style>

<!-- blog start -->
<section class="blog pt-130 pb-130">
    <div class="container">
        <div class="row mt-none-30">
            <div class="col-lg-12 mt-30">
                <?php 
                // echo "<pre>";
                // print_r($courseList);
                // exit;
                foreach ($courseList as $courseDetail) { ?> 
                    <div class="blog-post-wrapper">
                        <h1><center><?php echo htmlspecialchars($courseDetail->page_title); ?></h1>
                        <article class="post-details">
                            
                            <ul class="blog__meta ul_li mb-30">
                                <li><i class="far fa-clock"></i><?php echo date('M j, Y', strtotime($courseDetail->date)); ?></li>
                            </ul>
                            <div class="post-thumb">
                                <img src="<?php echo base_url() . '/assest/uploadfile/blogimages/' . $courseDetail->page_image; ?>" alt="">
                            </div>
                            <!-- Output page_content as HTML -->
                            <div><?php echo $courseDetail->page_content; ?></div>
                        </article>
                    </div>
                <?php } ?> 
            </div>
        </div>
    </div>
</section>
<!-- blog end -->


<?php include("footer.php"); ?>