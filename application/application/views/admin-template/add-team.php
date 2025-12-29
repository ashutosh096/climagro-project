 <?php
    include("header.php");
    include("sidebar.php");
    ?>
 <!-- Page Content -->
 <div id="page-wrapper">
     <div class="row">
         <div class="col-lg-12">
             <h1 class="page-header">Add Team<?php echo anchor("administrator/manageteam", "Manage Team", array("class" => "btn btn-warning pull-right")); ?></h1>

         </div>
         <!-- /.col-lg-12 -->
     </div>
     <!-- /.row -->

     <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     Your team form!
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
                                echo form_open_multipart("administrator/addteam") ?>

                             <div class="form-group">
                                 <label>Category</label>
                                 <?php
                                    $cat = array('Mentor', 'Team');
                                    $scat = 0;

                                    if (@$workdata->teamtype == 1) {
                                        $scat = 1;
                                    } else {
                                        $scat = 0;
                                    }


                                    echo form_dropdown('teamtype', $cat, $scat, 'class="form-control"');
                                    ?>
                             </div>

                             <div class="form-group">
                                 <label>Team Name</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your member name', 'name' => 'name', 'value' => set_value('name', @$workdata->name), 'required' => true));
                                    ?>
                             </div>

                             <div class="form-group">
                                 <label>Designation</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Member designation / post', 'name' => 'designation', 'value' => set_value('designation', @$workdata->designation), 'required' => true)) ?>
                             </div>

                             <div class="form-group">
                                 <label>Some Information</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'About your team', 'name' => 'content', 'value' => set_value('content', @$workdata->content))) ?>
                             </div>


                             <div class="form-group">
                                 <label>Serial Number</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter number of service', 'name' => 'serialnum', 'value' => set_value('serialnum', @$workdata->serialnum)));
                                    ?>
                             </div>



                             <div class="form-group">
                                 <label>Member Facebook</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter facebook link', 'name' => 'facebook', 'value' => set_value('facebook', @$workdata->facebook)));
                                    ?>
                             </div>

                             <div class="form-group">
                                 <label>Member Linkdine</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter linkedine link', 'name' => 'linkedine', 'value' => set_value('linkedine', @$workdata->linkdine)));
                                    ?>
                             </div>

                             <div class="form-group">
                                 <label>Member Google Plus</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter google plus link', 'name' => 'google', 'value' => set_value('google', @$workdata->google)));
                                    ?>
                             </div>

                             <div class="form-group">
                                 <label style="display: block;">Team Member Image</label>

                                 <?php
                                    $imgfile = "noimage.png";
                                    $remove    = "";
                                    if (@$workdata->id > 0) {

                                        if (read_file(base_url() . "assest/uploadfile/webimages/" . $workdata->image) && $workdata->image != '') {
                                            $imgfile = $workdata->image;
                                        } else {
                                            $imgfile = "noimage.png";
                                        }
                                    }

                                    echo img(array("src" => base_url() . "assest/uploadfile/webimages/" . $imgfile, "id" => "output_image", "class" => "img-thumbnail brwsimg"));

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

                                    echo form_input(array('type' => 'hidden', 'name' => 'oldimage', 'value' => @$workdata->image, "class" => "imgfile"));
                                    echo form_input(array('type' => 'hidden', 'name' => 'removeimage', 'value' => "", "id" => "removeimage"));

                                    ?>
                             </div>

                             <?php
                                echo form_hidden('serviceid', @$workdata->id);
                                if (@$workdata->id > 0) {
                                    $btn = "Save Team";
                                } else {
                                    $btn = "Add Team";
                                }
                                ?>

                             <?php echo form_submit(array('class' => 'btn btn-success', 'value' => $btn));
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