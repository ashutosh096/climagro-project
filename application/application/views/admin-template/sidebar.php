<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search"></li>
            <li>
                <?php echo anchor("administrator/dashboard", "<i class='fa fa-dashboard fa-fw'></i> 
            Dashboard"); ?>
            </li>
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
                        <li><?php //echo anchor("administrator/managecoursecategory", "Blog Category"); ?></li>
                        <li><?php echo anchor("administrator/manageblog", "Manage Blog"); ?></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book fa-fw"></i> News<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php //echo anchor("administrator/managecoursecategory", "News Category"); ?></li>
                        <li><?php echo anchor("administrator/managenews", "Manage News"); ?></li>
                    </ul>
                </li>
                <li><?php echo anchor("administrator/manageservices", "<i class='fa fa-sliders fa-fw'></i> 
            Manage Client"); ?>
                </li>
                <li><?php echo anchor("administrator/managetechnologies", "<i class='fa fa-sliders fa-fw'></i> 
            Manage Tachnologies"); ?>
                </li>
                <li>
                    <a href="#"><i class="fa fa-pencil fa-fw"></i> Work<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <!-- <li><?php echo anchor("administrator/manageworkcategory", "Work Category"); ?></li>
                <li><?php echo anchor("administrator/manageworks", "Students Works"); ?></li> -->
                        <li><?php echo anchor("administrator/manageofficework", "Office Works / Activities"); ?></li>
                    </ul>
                </li>
                <!-- <li>
                    <?php echo anchor("administrator/managetutorial", "<i class='fa fa-youtube fa-fw'></i> 
            Manage Tutorials"); ?>
                </li> -->
                <li>
                    <?php echo anchor("administrator/managetestimonial", "<i class='fa fa-comments fa-fw'></i> 
            Manage Testimonials"); ?>
                </li>
                <li>
                    <?php echo anchor("administrator/managefaq", "<i class='fa fa-comments fa-fw'></i> 
            Manage FAQ"); ?>
                </li>
                <li>
                    <?php echo anchor("administrator/manageteam", "<i class='fa fa-users fa-fw'></i> Manage Team"); ?>
                </li>
                <li>
                    <?php echo anchor("administrator/managelead", "<i class='fa fa-users fa-fw'></i> Manage Enquiry"); ?>
                </li>
                <li>
                    <a href="#"><i class="fa fa-pencil fa-fw"></i> SEO Tool<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php echo anchor("administrator/manageseo", "SEO Listing"); ?></li>
                        <li><?php echo anchor("administrator/managegeocode", "Geocode & Other Meta"); ?></li>
                    </ul>
                </li>
            <?php } else { ?>
                <li>
                    <?php echo anchor("administrator/manageseo", "<i class='fa fa-pencil fa-fw'></i> SEO Tool"); ?>
                </li>
            <?php } ?>
            <li>
                <?php echo anchor("administrator/adminlogout", "<i class='fa fa-sign-out fa-fw'></i> Logout"); ?>
            </li>
        </ul>
    </div>
</div>
</nav>