 <?php
    include("header.php");
    include("sidebar.php");
    ?>
 <!-- Page Content -->
 <div id="page-wrapper">
     <div class="row">
         <div class="col-lg-12">
             <h1 class="page-header">Add faq <?php echo anchor("administrator/managefaq", "Manage faq", array("class" => "btn btn-warning pull-right")); ?></h1>

         </div>
         <!-- /.col-lg-12 -->
     </div>
     <!-- /.row -->

     <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     Your faq form!
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
                                echo form_open_multipart("administrator/addfaq") ?>

                             <div class="form-group">
                                 <label>faq Title</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your tutorial name', 'name' => 'worktitle', 'id' => 'nametitle', 'value' => set_value('worktitle'), 'required' => true));
                                    ?>
                             </div>
                             <div class="form-group">
                                 <label>faq Description</label>
                                 <?php echo form_textarea(array(
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter FAQ Description',
                                        'name' => 'faq',
                                        'id' => 'des_content7',
                                        'value' => set_value('testimonial', @$workdata->testimonial),
                                        'required' => true,
                                        'rows' => 5,  // Optionally, set the number of rows
                                    )); ?>
                             </div>

                             <div class="form-group" style="display: none;">
                                 <label style="display: block;">faq Image</label>

                                 <?php
                                    $imgfile = "noimage.png";
                                    $remove    = "";
                                    if (@$workdata->id > 0) {

                                        if (read_file(base_url() . "assest/uploadfile/faq/" . $workdata->image) && $workdata->image != '') {
                                            $imgfile = $workdata->image;
                                        } else {
                                            $imgfile = "noimage.png";
                                        }
                                    }

                                    echo img(array("src" => base_url() . "assest/uploadfile/faq/" . $imgfile, "id" => "output_image", "class" => "img-thumbnail brwsimg"));

                                    ?>

                                 <label class="btn-bs-file btn btn-lg btn-default">Browse
                                     <?php echo form_upload(array('name' => 'image', 'value' => set_value('image'), "accept" => "image/*", "class" => "imgfile", "onchange" => "preview_image(event)"));
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


                             <div class="form-group">
                                 <label>Serial Number</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter number of service', 'name' => 'serialnum', 'value' => set_value('serialnum', @$workdata->services_short)));
                                    ?>
                             </div>



                             <?php
                                echo form_hidden('serviceid', @$workdata->id);
                                if (@$workdata->id > 0) {
                                    $btn = "Save faq";
                                } else {
                                    $btn = "Add faq";
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
 <script>
     $("#nametitle").val("<?php echo @$workdata->work_title; ?>").text();
     CKEDITOR.replace('des_content7');
 </script>