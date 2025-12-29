 <?php
    include("header.php");
    include("sidebar.php");
    ?>
 <style type="text/css">
     .newbtn {
         position: fixed;
         top: 165px;
         right: 0;
     }
 </style>
 <!-- Page Content -->
 <div id="page-wrapper">
     <div class="row">
         <div class="col-lg-12">
             <h1 class="page-header">Add News <?php echo anchor("administrator/managenews", "Manage News", array("class" => "btn btn-warning pull-right")); ?></h1>

         </div>
         <!-- /.col-lg-12 -->
     </div>
     <!-- /.row -->
     <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     Your News form!
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
                                echo form_open_multipart("administrator/addnews") ?>
                             <div class="form-group">
                                 <label>Select Category</label>
                                 <?php
                                    $key = array('');
                                    $val = array('Select one');
                                    foreach ($servicelist as $service) {
                                        array_push($key, $service->id);
                                        array_push($val, $service->slug_title);
                                    };

                                    if (@$servicedata->parent_id != '') {
                                        $dt = "$servicedata->parent_id";
                                    } else {
                                        $dt = set_value('coursecat');
                                    }
                                    $icon = array_combine($key, $val);
                                    echo form_dropdown("coursecat", $icon, $dt, "class='form-control catdata' required");
                                    //echo form_error("coursecat"); 
                                    ?>
                             </div>

                             <div class="form-group">
                                 <label>Slug Title</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter short page name', 'name' => 'slugtitle', 'value' => set_value('slugtitle', @$servicedata->slug_title, FALSE))); ?>
                             </div>

                             <div class="form-group">
                                 <label>Service Title</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your page name', 'name' => 'servicetitle', 'id' => 'nametitle', 'value' => set_value('servicetitle')));
                                    echo form_error("servicetitle"); ?>
                             </div>

                             <div class="form-group">
                                 <label>Service Tagline</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your tagline', 'name' => 'tagline', 'id' => 'tagline', 'value' => set_value('tagline'))); ?>
                             </div>

                             <div class="form-group">
                                 <label>Service Url</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Create your page url', 'name' => 'courseurl', 'value' => set_value('courseurl', @$servicedata->page_url))) ?>
                             </div>
                             <div class="form-group">
                                 <label>Serial Number</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter Serial Number', 'name' => 'serialnum', 'value' => set_value('serialnum', @$servicedata->page_short)));
                                    ?>
                             </div>
                             
                             <div class="form-group">
                                 <label>Select Service Type</label>
                                 <select name="type" class="form-control" required="">
                                     <?php
                                        if ($servicedata->type == 1) {
                                            $home = "selected";
                                        } else {
                                            $home = "";
                                        }
                                        if ($servicedata->type == 0) {
                                            $course = "selected";
                                        } else {
                                            $course = "";
                                        }
                                        ?>
                                     <option value="">Select Type</option>
                                     <option value="1" <?php echo $home; ?>>Home Page</option>
                                     <option value="0" <?php echo $course; ?>>News Page</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label>Service Introduction</label>
                                 <?php //echo form_input(array('class'=>'form-control', 'placeholder'=>'Short description', 'id'=>'des_content', 'name'=>'servicecontent', 'value'=>set_value('servicecontent', base64_decode(@$servicedata->page_content))));
                                    ?>
                                 <textarea class="form-control" id="des_content" name="servicecontent" placeholder="Short description"><?= set_value('servicecontent', @$servicedata->page_content); ?></textarea>
                             </div>

                             <div class="form-group">
                                 <label>More Description</label>
                                 <textarea class="form-control" id="des_content1" name="coursecontent" placeholder="About Service Content"><?= set_value('coursecontent', @$servicedata->course_content) ?></textarea>
                             </div>

                             <div class="form-group" style="display: none;">
                                 <label>Live Projects</label>
                                 <textarea class="form-control" id="des_content2" name="liveproject" placeholder="About Service Content"><?= set_value('liveproject', base64_decode(@$servicedata->live_project)) ?></textarea>
                             </div>

                             <div class="form-group" style="display: none;">
                                 <label>Career Options</label>
                                 <textarea class="form-control" id="des_content3" name="careeroption" placeholder="About Service Content"><?= set_value('careeroption', base64_decode(@$servicedata->career_option)) ?></textarea>
                             </div>

                             <div class="form-group" style="display: none;">
                                 <label>Relevent Industrie</label>
                                 <textarea class="form-control" id="des_content4" name="releventindustrie" placeholder="About Service Content"><?= set_value('releventindustrie', base64_decode(@$servicedata->relevent_industrie)) ?></textarea>
                             </div>

                             <div class="form-group" style="display: none;">
                                 <label>Service Durations</label>
                                 <textarea class="form-control" id="des_content5" name="courseduration" placeholder="About Service Content"><?= set_value('courseduration', base64_decode(@$servicedata->course_duration)) ?></textarea>
                             </div>

                             <div class="form-group" style="display: none;">
                                 <label>Service Eligibility</label>
                                 <textarea class="form-control" id="des_content6" name="eligibility" placeholder="About Course Content"><?= set_value('eligibility', base64_decode(@$servicedata->eligibility)) ?></textarea>
                             </div>

                             <div class="form-group">
                                 <label style="display: block;">Service thumbnail</label>

                                 <?php
                                    $imgfile = "noimage.png";
                                    $remove    = "";
                                    if (@$servicedata->id > 0) {

                                        if (read_file(base_url() . "assest/uploadfile/newsimages/" . $servicedata->page_image) && $servicedata->page_image != '') {
                                            $imgfile = $servicedata->page_image;
                                        } else {
                                            $imgfile = "noimage.png";
                                        }
                                    }

                                    echo img(array("src" => base_url() . "assest/uploadfile/newsimages/" . $imgfile, "id" => "output_image", "class" => "img-thumbnail brwsimg"));

                                    ?>

                                 <label class="btn-bs-file btn btn-lg btn-default">Browse
                                     <?php echo form_upload(array('name' => 'serviceimage', 'value' => set_value('sliderimage'), "accept" => "image/*", "class" => "imgfile", "onchange" => "preview_image(event)"));
                                        ?>
                                 </label>

                                 <label class='btn-bs-file btn btn-lg btn-danger removeimg'>Remove</label>

                                 <?php
                                    if (isset($uploaderror)) {
                                        echo $uploaderror;
                                    }

                                    echo form_input(array('type' => 'hidden', 'name' => 'oldimage', 'value' => @$servicedata->page_image, "class" => "imgfile"));
                                    echo form_input(array('type' => 'hidden', 'name' => 'removeimage', 'value' => "", "id" => "removeimage"));

                                    ?>
                             </div>

                             <?php
                                echo form_hidden('serviceid', @$servicedata->id);
                                if (@$servicedata->id > 0) {
                                    $btn = "Update News";
                                } else {
                                    $btn = "Add News";
                                }
                                ?>

                             <?php echo form_submit(array('class' => 'btn btn-success', 'value' => $btn)); ?>
                             <?php echo form_submit(array('class' => 'btn btn-success newbtn', 'value' => $btn)); ?>


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
 <script>
     $("#nametitle").val("<?php echo @$servicedata->page_title; ?>").text();
     $("#tagline").val("<?php echo @$servicedata->tagline; ?>").text();
 </script>