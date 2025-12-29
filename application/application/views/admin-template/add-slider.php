 <?php
    include("header.php");
    include("sidebar.php");
    ?>
 <!-- Page Content -->
 <div id="page-wrapper">
     <div class="row">
         <div class="col-lg-12">
             <h1 class="page-header">Add Slider <?php echo anchor("administrator/manageslider", "Manage Slider", array("class" => "btn btn-warning pull-right")); ?></h1>

         </div>
         <!-- /.col-lg-12 -->
     </div>
     <!-- /.row -->

     <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     Text below about your slider!
                 </div>

                 <div class="panel-body">
                     <div class="row">
                         <div class="col-lg-12">
                             <?php if ($this->session->userdata("errprofile")) { ?><div class="alert alert-danger"><?php echo $this->session->userdata("errprofile"); ?></div><?php } ?>
                             <?php if ($this->session->userdata("sucprofile")) { ?><div class="alert alert-success"><?php echo $this->session->userdata("sucprofile"); ?></div><?php }
                                                                                                                                                                        $this->session->unset_userdata("errprofile");
                                                                                                                                                                        $this->session->unset_userdata("sucprofile");
                                                                                                                                                                            ?>
                             <?php
                                if ($this->uri->segment(3) > 0) {
                                    $action = "administrator/editslider/" . $this->uri->segment(3);
                                } else {
                                    $action = "administrator/addslider/";
                                }
                                echo form_open_multipart($action) ?>

                             <div class="form-group">
                                 <label>Slider Title</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your slider title', 'name' => 'slidertitle', 'value' => set_value('slidertitle', @$sliderdata->slide_title)));
                                    echo form_error("slidertitle"); ?>
                             </div>

                             <div class="form-group">
                                 <label>Slider Number</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your slider number', 'name' => 'slide_short', 'value' => set_value('slide_short', @$sliderdata->slide_short))); ?>
                             </div>



                             <div class="form-group">
                                 <label>Slider Link</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your slider link', 'name' => 'sliderlink', 'value' => set_value('sliderlink', @$sliderdata->link)));
                                    ?>
                             </div>

                             <div class="form-group">
                                 <label>Slider Content</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your slider content', 'name' => 'slidercontent', 'value' => set_value('slidercontent', @$sliderdata->content)));
                                    ?>
                             </div>


                             <div class="form-group">
                                 <label style="display: block;">Slider Image</label>

                                 <?php
                                    $imgfile = "noimage.png";
                                    $remove    = "";
                                    if (@$sliderdata->id > 0) {

                                        if (read_file(base_url() . "assest/uploadfile/sliders/" . $sliderdata->slide_image) && $sliderdata->slide_image != '') {
                                            $imgfile = $sliderdata->slide_image;
                                        } else {
                                            $imgfile = "noimage.png";
                                        }
                                    }

                                    echo img(array("src" => base_url() . "assest/uploadfile/sliders/" . $imgfile, "id" => "output_image", "class" => "img-thumbnail brwsimg"));

                                    ?>

                                 <label class="btn-bs-file btn btn-lg btn-default">Browse
                                     <?php echo form_upload(array('name' => 'sliderimage', 'value' => set_value('sliderimage'), "accept" => "image/*", "class" => "imgfile", "onchange" => "preview_image(event)"));
                                        ?>
                                 </label>

                                 <label class='btn-bs-file btn btn-lg btn-danger removeimg'>Remove</label>

                                 <?php
                                    if (isset($uploaderror)) {
                                        echo $uploaderror;
                                    }

                                    echo form_input(array('type' => 'hidden', 'name' => 'oldimage', 'value' => @$sliderdata->slide_image, "class" => "imgfile"));
                                    echo form_input(array('type' => 'hidden', 'name' => 'removeimage', 'value' => "", "id" => "removeimage"));
                                    echo form_hidden('sliderid', @$sliderdata->id);

                                    if (@$sliderdata->id > 0) {
                                        $btn = "Save Slider";
                                    } else {
                                        $btn = "Add Slider";
                                    }

                                    ?>
                             </div>

                             <?php echo form_submit(array('class' => 'btn btn-success', 'name' => 'companyupdate', 'value' => $btn));
                                ?>

                             <?php echo form_close(); ?>
                         </div>

                     </div>
                     <!-- /.row (nested) -->
                 </div>
                 <!-- /.panel-body -->
             </div>
             <!-- /.panel -->
         </div>
         <!-- /.col-lg-12 -->
     </div>

     <!-- /.row -->
 </div>
 <!-- /#page-wrapper -->

 </div>
 <!-- /#wrapper -->
 <?php include("footer.php"); ?>