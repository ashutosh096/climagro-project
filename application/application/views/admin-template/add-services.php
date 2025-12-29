 <?php
    include("header.php");
    include("sidebar.php");
    ?>
 <!-- Page Content -->
 <div id="page-wrapper">
     <div class="row">
         <div class="col-lg-12">
             <h1 class="page-header">Add Services <?php echo anchor("administrator/manageservices", "Manage Serviceds", array("class" => "btn btn-warning pull-right")); ?></h1>

         </div>
         <!-- /.col-lg-12 -->
     </div>
     <!-- /.row -->

     <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     Your services form!
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
                                    $action = "administrator/editservices/" . $this->uri->segment(3);
                                } else {
                                    $action = "administrator/addservices";
                                }
                                echo form_open_multipart("administrator/addservices") ?>

                             <div class="form-group">
                                 <label>Service Title</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your service title', 'name' => 'servicetitle', 'value' => set_value('servicetitle', @$servicedata->services_title)));
                                    echo form_error("servicetitle"); ?>
                             </div>


                             <div class="form-group">
                                 <label>Serial Number</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter number of service', 'name' => 'servicecontent', 'value' => set_value('servicecontent', @$servicedata->services_content)));
                                    ?>
                             </div>

                             <div class="form-group">
                                 <label style="display: block;">Service Image</label>

                                 <?php
                                    $imgfile = "noimage.png";
                                    $remove    = "";
                                    if (@$servicedata->id > 0) {

                                        if (read_file(base_url() . "assest/uploadfile/webimages/" . $servicedata->services_image) && $servicedata->services_image != '') {
                                            $imgfile = $servicedata->services_image;
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

                                    echo form_input(array('type' => 'hidden', 'name' => 'oldimage', 'value' => @$servicedata->services_image, "class" => "imgfile"));
                                    echo form_input(array('type' => 'hidden', 'name' => 'removeimage', 'value' => "", "id" => "removeimage"));

                                    ?>
                             </div>

                             <?php
                                echo form_hidden('serviceid', @$servicedata->id);
                                if (@$servicedata->id > 0) {
                                    $btn = "Save Service";
                                } else {
                                    $btn = "Add Service";
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