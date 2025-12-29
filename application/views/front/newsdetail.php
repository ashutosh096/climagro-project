<?php
include_once('header.php');
include_once('navbar2.php');
?>
<style>
    /* General paragraph styling */
    /* General paragraph styling */
    p {
        color: #000 !important;
        font-size: 17px;
        line-height: 1;
        margin-bottom: 20px;
        text-align: left; /* Changed from justify to center */
    }

    /* Blog section background & spacing */
    .blog {
        background-color: #f9f9f9;
        padding: 40px 0;
    }

    /* Main content container */
    .blog-post-wrapper {
        max-width: 860px;
        margin: 0 auto;
        padding: 5px;
    }

    /* Title styling */
    .post-details h2 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #1e1e1e;
        text-align: center;
    }

    /* Metadata style */
    .blog__meta {
        display: flex;
        justify-content: center;
        gap: 15px;
        font-size: 14px;
        color: #777;
        margin-bottom: 30px;
    }

    .blog__meta i {
        color: #025b5f;
    }

    /* Visualization wrapper */
    .visualization-container-wrapper {
        width: 100%;
        overflow-x: auto;
        height: 860px; /* Adjust according to your visualization scale */
        position: relative;
        background: #f4f4f4;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .visualization-container {
        position: absolute;
        top: 0;
        left: 0;
        transform: scale(0.34);
        transform-origin: top left;
        line-height: 0;
        margin: 0;
        padding: 0;
    }
    /* Custom scrollbar styling */
    .visualization-container *::-webkit-scrollbar {
        width: 5px; /* Thickness of vertical scrollbar */
        height: 8px; /* Thickness of horizontal scrollbar */
    }

    .visualization-container *::-webkit-scrollbar-track {
        background: #f1f1f1; /* Track color */
        border-radius: 6px;
    }

    .visualization-container *::-webkit-scrollbar-thumb {
        background: #025b5f; /* Scrollbar color */
        border-radius: 6px;
        border: 2px solid #f1f1f1; /* Border around thumb */
    }

    .visualization-container *::-webkit-scrollbar-thumb:hover {
        background: #014a4d; /* Darker color on hover */
    }

    /* Firefox scrollbar styling */
    .visualization-container * {
        scrollbar-width: thick; /* auto, thin, thick, or none */
        scrollbar-color: #025b5f #f1f1f1; /* thumb color, track color */
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .blog-post-wrapper {
            padding: 25px;
        }

        .post-details h2 {
            font-size: 30px;
        }

        .visualization-container {
            transform: scale(0.3);
        }
    }

    @media (max-width: 576px) {
        .post-details h2 {
            font-size: 26px;
        }

        .visualization-container {
            transform: scale(0.25);
        }

        p {
            font-size: 15px;
        }
    }
    .visualization-container-wrapper {
    width: 100%;
    overflow-x: auto;
    height: 860px; /* Desktop height */
    position: relative;
    background: #f4f4f4;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
}

/* Visualization scale */
.visualization-container {
    position: absolute;
    top: 0;
    left: 0;
    transform: scale(0.34);
    transform-origin: top left;
    line-height: 0;
    margin: 0;
    padding: 0;
}

/* Tablet */
@media (max-width: 992px) {
    .visualization-container {
        transform: scale(0.3);
    }
    .visualization-container-wrapper {
        height: 720px; /* Adjust to match scale */
    }
}

/* Mobile */
@media (max-width: 576px) {
    .visualization-container {
        transform: scale(0.25);
    }
    .visualization-container-wrapper {
        height: 620px; /* Adjust to match scale */
    }
}

</style>


<!-- news detail start -->
<section class="blog pt-130 pb-130">
    <div class="container">
        <!-- 🌐 Language Switcher at Top -->
        <?php $slug = $courseDetail->page_url; ?>
        <div class="language-switcher mb-4" style="text-align: right;">
            Languages:  
            <a href="<?= base_url('news/' . $slug . '?lang=en') ?>" style="margin-right: 10px;">English</a>
            <a href="<?= base_url('news/' . $slug . '?lang=hi') ?>">हिन्दी</a>
        </div>
        <div class="row mt-none-30">
            <div class="col-lg-12 mt-30">
                <div class="blog-post-wrapper">
                    <article class="post-details">
                        <h2><?= $lang === 'hi' ? $courseDetail->page_title_hi : $courseDetail->page_title; ?></h2>


                        <ul class="blog__meta ul_li mb-30">
                            <li><i class="far fa-clock"></i><?php echo date('M j, Y', strtotime($courseDetail->date)); ?></li>
                        </ul>   
                        <!-- <div class="post-thumb"></div> -->
                        <div class="visualization-container-wrapper">
                            <div class="visualization-container">
                                <?php echo file_get_contents('assest/uploadfile/newsimages/Insight1.html'); ?>
                                <?php echo file_get_contents('assest/uploadfile/newsimages/Insight2.html'); ?>
                            </div>
                        </div>
                        <p><?= $lang === 'hi' ? $courseDetail->page_content_hi : $courseDetail->page_content; ?></p>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news detail end -->

<?php include("footer.php"); ?>
