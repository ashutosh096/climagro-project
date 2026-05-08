<?php
include("header.php");
include("navbar2.php");
?>
<head>
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dYHv0XP7NRtRlcRMfBpNxFQHqkzyKqyy5WCEeMlMu1jcSN8lHsyXN0LFDUgRdfZ4mXUoUpzp4n5V5iv0AxfF8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<!-- breadcrumb start -->
<section class="breadcrumb bg_img pos-rel" data-background="assest/img/bg/Insight4.png">
    <div class="container">
        <div class="breadcrumb__content">
            <h2 class="breadcrumb__title">Insights</h2>
           
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<style>
  /* ===== Base Styles ===== */
.blog {
  background-color: #f9f9f9;
  padding: 60px 0;
}

/* ===== Card Grid System ===== */
.news-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 20px;
}

/* ===== Individual Card ===== */
.blog__item {
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
}

.blog__item:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

/* ===== Image Container ===== */
.thumb {
  display: block;
  margin: 0;
  padding: 0;
  line-height: 0;
  overflow: hidden;
}

/* Thumbnail image: large on all screens, small only on mobile */
.blog__item .thumb img {
  width: 100%;
  height: 250px;
  object-fit: cover;
  display: block;
  transition: transform 0.5s ease;
}

/* Scale on hover */
.blog__item:hover .thumb img {
  transform: scale(1.03);
}

/* ===== Card Content ===== */
.blog__inner {
  padding: 16px;
  flex-grow: 1;
}

.blog__meta {
  font-size: 13px;
  color: #777;
  margin-bottom: 10px;
}

.blog__meta i {
  margin-right: 5px;
  color: #025b5f;
}

.title {
  font-size: 18px;
  color: #222;
  margin: 0 0 10px;
  line-height: 1.4;
}

.title a {
  color: inherit;
  text-decoration: none;
  transition: color 0.3s ease;
}

.title a:hover {
  color: #ffffff;
}

.blog__inner p {
  font-size: 14px;
  color: #555;
  margin-bottom: 15px;
  line-height: 1.5;
}

.blog-btn {
  font-size: 14px;
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

/* ===== Border Effect ===== */
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
  background: #025b5f;
}

/* ===== Desktop Enhancements (992px and up) ===== */
@media (min-width: 992px) {
  .news-grid {
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    gap: 30px;
  }

  .blog__inner {
    padding: 20px;
  }

  .title {
    font-size: 20px;
  }

  .blog__inner p {
    font-size: 15px;
  }
}

/* ===== Tablet Adjustments (768px-991px) ===== */
@media (max-width: 991px) {
  .blog {
    padding: 50px 0;
  }

  .news-grid {
    gap: 18px;
  }
}

/* ===== Mobile Optimizations (576px and below) ===== */
@media (max-width: 575px) {
  .blog {
    padding: 40px 0;
  }

  .news-grid {
    grid-template-columns: 1fr;
    gap: 15px;
  }

  .blog__item .thumb img {
    height: 180px; /* smaller image for mobile */
  }

  .blog__inner {
    padding: 14px;
  }
}

/* ===== Extra Small Devices (400px and below) ===== */
@media (max-width: 400px) {
  .blog__item .thumb img {
    height: 160px;
  }

  .title {
    font-size: 17px;
  }

  .blog__inner p {
    font-size: 13px;
  }
}

/* ===== Widget/Sidebar Styles ===== */
.widget__title {
  font-size: 18px;
  margin-bottom: 15px;
  color: #222;
  font-weight: bold;
}

.widget__search {
  display: flex;
  margin-bottom: 20px;
}

.widget__search input {
  width: calc(100% - 40px);
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px 0 0 4px;
  font-size: 14px;
}

.widget__search button {
  padding: 10px 15px;
  border: none;
  background: #025b5f;
  color: white;
  border-radius: 0 4px 4px 0;
  cursor: pointer;
  transition: background 0.3s ease;
}

.widget__search button:hover {
  background: #02494d;
}

.widget__social {
  display: flex;
  flex-wrap: nowrap;
  gap: 8px;
  list-style: none;
  padding: 0;
  margin: 0;
}

.widget__social a {
  color: #025b5f;
  background: #d1ff44;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  text-decoration: none !important;
  font-size: 15px;
  transition: all 0.3s ease;
}

.widget__social a:hover {
  background: #b8e832;
  transform: translateY(-2px);
}

.subtitle {
  color: #fff;
  font-size: 14px;
  margin-top: 5px;
}

/* ====== MOBILE ONLY: Prevent Insights breadcrumb hidden under fixed navbar ====== */
@media (max-width: 767px) {
  section.breadcrumb {
    padding-top: 130px !important;
    padding-bottom: 40px !important;
    min-height: 170px !important;
  }
  .blog.pt-130 {
    padding-top: 40px !important;
  }
  .news-grid {
    grid-template-columns: 1fr !important;
  }
  .blog__item .thumb img {
    height: 200px !important;
  }
  .col-lg-8, .col-lg-4 {
    padding-left: 1rem !important;
    padding-right: 1rem !important;
  }
}

</style>
<section class="blog pt-130 pb-130">
    <div class="container">
        <div class="row mt-none-30">
            <!-- LEFT COLUMN: News Cards -->
            <div class="col-lg-8 mt-30">
                <div class="blog-post-wrap mt-none-30 news-grid">
                    <?php if(isset($servicelist) && !empty($servicelist)): ?>
                        <?php foreach ($servicelist as $list): ?>
                            <article class="blog__item">
                                <a class="thumb" href="<?php echo base_url('news/' . $list->page_url); ?>">
                                    <img 
                                        src="<?php echo base_url('assest/uploadfile/newsimages/' . $list->page_image); ?>" 
                                        onerror="this.onerror=null; this.src='https://www.climagroanalytics.com/assest/uploadfile/newsimages/<?php echo rawurlencode($list->page_image); ?>';"
                                        alt="<?= htmlspecialchars($list->page_title); ?>"
                                        style="width:100%; height:250px; object-fit:cover; display:block;"
                                    >
                                </a>
                                <div class="blog__inner">
                                    <ul class="blog__meta ul_li mb-30">
                                        <li><i class="far fa-clock"></i><?php echo date('M j, Y', strtotime($list->date)); ?></li>
                                    </ul>
                                    <h2 class="title border_effect">
                                        <a href="<?php echo base_url('news/' . $list->page_url); ?>">
                                            <?= htmlspecialchars($list->page_title); ?>
                                        </a>
                                    </h2>
                                    <div class="subtitle">
                                    <p style="color: rgba(255, 255, 255, 0.6);">
                                                    <?= substr(htmlspecialchars($list->tagline), 0, 180); ?>...
                                                </p>                                    </div>
                                    <a class="blog-btn" href="<?php echo base_url('news/' . $list->page_url); ?>">Read More</a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info">No articles found in this category.</div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- RIGHT COLUMN: Sidebar -->
            <div class="col-lg-4 mt-30">
                <div class="sidebar-area mt-none-30">
                    <!-- Search -->
                    <div class="widget mt-30">
                        <h3 class="widget__title">Search</h3>
                        <form class="widget__search" action="#!">
                            <input type="text" placeholder="Search your keyword" style="color:black">
                            <button><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Follow Us -->
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