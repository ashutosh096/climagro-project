<?php
include("header.php");
include("navbar2.php");

?>


<!-- breadcrumb start -->
<section class="breadcrumb bg_img pos-rel" data-background="assest/img/bg/blog.png">
    <div class="container">
        <div class="breadcrumb__content">
            <h2 class="breadcrumb__title">Blogs</h2>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

 <style>


/* Blog Section Styling */
.blog {
  background-color: #f9f9f9;
}
.blog__item {
  background: white;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0,0,0,0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.blog__item:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.blog__item .thumb img {
  width: 100%;
  height: 100% ;
  object-fit: cover;
  transition: transform 0.5s ease;
}
.blog__item:hover .thumb img {
  transform: scale(1.03);
}
.blog__inner {
  padding: 25px;
}
.blog__meta {
  color: #666;
  font-size: 14px;
}
.blog__meta i {
  margin-right: 5px;
  color: #025b5f; /* Your brand color */
}
.title {
  color: #222; /* Dark gray for better readability */
  font-size: 22px;
  margin: 15px 0;
  line-height: 1.4;
}
.title a {
  color: inherit;
  text-decoration: none;
}
.title a:hover {
  color: #d1dcde; /* Brand color on hover */
}
.border_effect {
  position: relative;
  padding-bottom: 10px;
}
.border_effect:after {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  width: 50px;
  height: 2px;
  background: #025b5f; /* Brand color */
}
.blog__inner p {
  color: #d1dcde; /* Slightly lighter than title */
  line-height: 1.6;
  margin-bottom: 20px;
}
.blog-btn {
  display: inline-block;
  color: #025b5f;
  font-weight: 600;
  text-decoration: none;
  border-bottom: 2px solid transparent;
  transition: all 0.3s ease;
}
.blog-btn:hover {
  color: #02494d;
  border-bottom-color: #025b5f;
}
.widget__social {
  display: flex;
  flex-wrap: nowrap;
  gap: 8px;
  list-style: none;
  padding: 0;
  margin: 0;
}
.widget__social li a {
  color: #025b5f;
  background: #d1ff44;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  text-decoration: none !important;
  transition: all 0.3s ease;
  font-size: 15px;
}
.widget__social li a:hover {
  background: #b8e832;
  transform: translateY(-2px);
}
/* ====== MOBILE ONLY: Prevent blog breadcrumb hidden under fixed navbar ====== */
@media (max-width: 767px) {
  section.breadcrumb {
    padding-top: 130px !important;
    padding-bottom: 40px !important;
    min-height: 170px !important;
  }
  .blog.pt-130 {
    padding-top: 40px !important;
  }
  .col-lg-8, .col-lg-4 {
    padding-left: 1rem !important;
    padding-right: 1rem !important;
  }
}
</style>




<!-- blog start -->
<section class="blog pt-130 pb-130">
    <div class="container">
        <div class="row mt-none-30">
            <div class="col-lg-8 mt-30">
                <div class="blog-post-wrap mt-none-30">
                    <?php
                    foreach ($blog as $list) { ?>
                        <article class="blog__item mt-30">
                            <a class="thumb" href="<?php echo base_url('blogs/' . $list->page_url); ?>">
                                <img 
                                    src="<?php echo base_url('assest/uploadfile/blogimages/' . $list->page_image); ?>" 
                                    onerror="this.onerror=null; this.src='https://www.climagroanalytics.com/assest/uploadfile/blogimages/<?php echo rawurlencode($list->page_image); ?>';" 
                                    alt="<?= htmlspecialchars($list->page_title); ?>"
                                    style="width:100%; height:100%; object-fit:cover;"
                                ></a>
                            <div class="blog__inner">
                                <ul class="blog__meta ul_li mb-30">
                                    <!-- <li><a href="#!"><i class="far fa-user"></i>Colin Scotland</a></li> -->
                                    <li><i class="far fa-clock"></i><?php echo date('M j, Y', strtotime($list->date)); ?></li>
                                    <!-- <li><a href="#!"><i class="far fa-comment"></i>(04) Comments</a></li> -->
                                </ul>
                                <h2 class="title border_effect"><a href="<?php echo base_url('blogs/' . $list->page_url); ?>"><?= $list->page_title; ?></a></h2>
                                <p><?php echo substr($list->tagline, 0, 350); ?> </p>
                                <a class="blog-btn" href="<?php echo base_url('blogs/' . $list->page_url); ?>">Read More</a>
                            </div>
                        </article>
                    <?php } ?>
                </div>
                <!-- <div class="pagination_wrap pt-50">
                            <ul>
                                <li><a href="#"><i class="far fa-long-arrow-left"></i></a></li>
                                <li><a href="#" class="current_page">01</a></li>
                                <li><a href="#">02</a></li>
                                <li><a href="#"><i class="fal fa-ellipsis-h"></i></a></li>
                                <li><a href="#">08</a></li>
                                <li><a href="#"><i class="far fa-long-arrow-right"></i></a></li>
                            </ul>
                        </div> -->
            </div>
            <div class="col-lg-4 mt-30">
                <div class="sidebar-area mt-none-30">
                    <div class="widget mt-30">
                        <h3 class="widget__title">Search</h3>
                        <form class="widget__search" action="#!">
                            <input type="text" placeholder="Search your keyword" style = "color:black">
                            <button><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <!-- <div class="widget mt-30">
                        <h3 class="widget__title">Categories</h3>
                        <ul class="widget__category list-unstyled">
                            <li><a href="#!">Blockchain </a></li>
                            <li><a href="#!">Web Development </a></li>
                            <li><a href="#!">Cryptocurrency </a></li>
                            <li><a href="#!">Branding Design </a></li>
                            <li><a href="#!">Uncategorized </a></li>
                            <li><a href="#!">UI/UX Design </a></li>
                            <li><a href="#!">Email Marketing </a></li>
                        </ul>
                    </div> -->
                    <!-- <div class="widget mt-30">
                        <h3 class="widget__title">Recent Posts</h3>
                        <div class="widget__post">
                            <div class="widget__post-item ul_li">
                                <div class="post-thumb">
                                    <a href="blog-single.html"><img src="assets/img/blog/post_01.jpg" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <span class="post-date">July 25,2023</span>
                                    <h4 class="post-title border-effect-2"><a href="blog-single.html">We Advocate Swapping Screen Time</a></h4>
                                </div>
                            </div>
                            <div class="widget__post-item ul_li">
                                <div class="post-thumb">
                                    <a href="blog-single.html"><img src="assets/img/blog/w_02.jpg" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <span class="post-date">March 20,2023</span>
                                    <h4 class="post-title border-effect-2"><a href="blog-single.html">Utilizing mobile technology in the field</a></h4>
                                </div>
                            </div>
                            <div class="widget__post-item ul_li">
                                <div class="post-thumb">
                                    <a href="blog-single.html"><img src="assets/img/blog/w_03.jpg" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <span class="post-date">July 18,2023</span>
                                    <h4 class="post-title border-effect-2"><a href="blog-single.html">Building intelligent transportation systems</a></h4>
                                </div>
                            </div>

                        </div>
                    </div> -->
                    <div class="widget mt-30">
                        <h3 class="widget__title">Follow Us</h3>
                        <ul class="widget__social ul_li">
                            <li><a href="<?php echo $getCompany->linkedin; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="<?php echo $getCompany->twitter; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a href="https://youtube.com/@climagroanalytics?si=Ou6D2-0N5IyqGpD" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="<?php echo $getCompany->facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <?php if (!empty($getCompany->insta)): ?>
                                <li><a href="<?php echo $getCompany->insta; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog end -->


<?php include("footer.php"); ?>