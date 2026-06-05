<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search"></li>
            <li>
                <?php echo anchor("administrator/dashboard", "<i class='fa fa-dashboard fa-fw'></i> Dashboard"); ?>
            </li>
            <li>
                <?php echo anchor("administrator/managesubscribers", "<i class='fa fa-users fa-fw'></i> Email Subscribers"); ?>
            </li>
            <li>
                <?php echo anchor("administrator/managecontacts", "<i class='fa fa-envelope fa-fw'></i> Contact Submissions"); ?>
            </li>
            <li>
                <?php echo anchor("administrator/managereportdownloads", "<i class='fa fa-download fa-fw'></i> Report Downloads"); ?>
            </li>
            <li>
                <?php echo anchor("administrator/climintellio_requests", "<i class='fa fa-tasks fa-fw'></i> Climintellio Requests"); ?>
            </li>
            <?php /* TEMPORARILY COMMENTED OUT - OTHER MENU ITEMS
            <?php if ($adminDetail->u_type == 'admin') { ?>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>CMS<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php echo anchor("administrator/companyprofile", "Company Profile"); ?></li>
                        <li><?php echo anchor("administrator/manageslider", "Slider"); ?></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book fa-fw"></i> Services<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php echo anchor("administrator/managecoursecategory", "Services Category"); ?></li>
                        <li><?php echo anchor("administrator/managecourse", "Manage Services"); ?></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book fa-fw"></i> Blogs<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php echo anchor("administrator/manageblog", "Manage Blog"); ?></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book fa-fw"></i> News<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php echo anchor("administrator/managenews", "Manage News"); ?></li>
                    </ul>
                </li>
                <li><?php echo anchor("administrator/manageservices", "<i class='fa fa-sliders fa-fw'></i> Manage Client"); ?></li>
                <li><?php echo anchor("administrator/managetechnologies", "<i class='fa fa-sliders fa-fw'></i> Manage Technologies"); ?></li>
                <li><?php echo anchor("administrator/managetestimonial", "<i class='fa fa-comments fa-fw'></i> Manage Testimonials"); ?></li>
                <li><?php echo anchor("administrator/managefaq", "<i class='fa fa-comments fa-fw'></i> Manage FAQ"); ?></li>
                <li><?php echo anchor("administrator/manageteam", "<i class='fa fa-users fa-fw'></i> Manage Team"); ?></li>
                <li><?php echo anchor("administrator/managelead", "<i class='fa fa-users fa-fw'></i> Manage Enquiry"); ?></li>
                <li>
                    <a href="#"><i class="fa fa-pencil fa-fw"></i> SEO Tool<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php echo anchor("administrator/manageseo", "SEO Listing"); ?></li>
                        <li><?php echo anchor("administrator/managegeocode", "Geocode & Other Meta"); ?></li>
                    </ul>
                </li>
            <?php } else { ?>
                <li><?php echo anchor("administrator/manageseo", "<i class='fa fa-pencil fa-fw'></i> SEO Tool"); ?></li>
            <?php } ?>
            END COMMENTED OUT */ ?>
            <li>
                <?php echo anchor("administrator/adminlogout", "<i class='fa fa-sign-out fa-fw'></i> Logout"); ?>
            </li>
        </ul>
    </div>
</div>
</nav>