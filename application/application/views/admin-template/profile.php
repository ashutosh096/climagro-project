 <?php
    include("header.php");
    include("sidebar.php");

    ?>
 <!-- Page Content -->
 <div id="page-wrapper">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Update Your Company Profile</h1>
             </div>
             <!-- /.col-lg-12 -->
         </div>
         <!-- /.row -->


         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         Below information identify of your company!
                     </div>

                     <div class="panel-body">
                         <div class="row">
                             <div class="col-lg-12">
                                 <?php if ($this->session->userdata("errprofile")) { ?><div class="alert alert-danger"><?php echo $this->session->userdata("errprofile"); ?></div><?php } ?>
                                 <?php if ($this->session->userdata("sucprofile")) { ?><div class="alert alert-success"><?php echo $this->session->userdata("sucprofile"); ?></div><?php }
                                                                                                                                                                            $this->session->unset_userdata("errprofile");
                                                                                                                                                                            $this->session->unset_userdata("sucprofile");
                                                                                                                                                                                ?>
                                 <?php echo form_open_multipart("administrator/updateprofile") ?>
                                 <div class="form-group">
                                     <label>Name Of Company</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your company name', 'name' => 'companyname', 'value' => set_value('companyname', $profiledetail->comp_name))); ?>
                                     <?php echo form_error('companyname'); ?>
                                 </div>
                                 <div class="form-group">
                                     <label>Email Id</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your company email', 'name' => 'companyemail', 'value' => set_value('companyemail', $profiledetail->comp_email))); ?>
                                     <?php echo form_error('companyemail'); ?>
                                 </div>
                                 <div class="form-group">
                                     <label>Contact Number</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your company name', 'name' => 'companyphone', 'value' => set_value('companyphone', $profiledetail->comp_mobile)));
                                        echo form_error("companyphone");
                                        ?>
                                 </div>
                                 <div class="form-group">
                                     <label>Whats app Number</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your whatsapp n.o.', 'name' => 'companyphone2', 'value' => set_value('companyphone2', $profiledetail->comp_mobile2)));
                                        ?>
                                 </div>
                                 <div class="form-group">
                                     <label>Address</label>
                                     <?php echo form_textarea(array('class' => 'form-control', 'placeholder' => 'Enter your company name', 'name' => 'companyaddress', 'rows' => '3', 'value' => set_value('companyaddress', $profiledetail->comp_address)));
                                        echo form_error("companyaddress");
                                        ?>
                                 </div>
                                 <!-- <div class="form-group">
                                     <label>City</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter City', 'name' => 'city', 'rows' => '3', 'value' => set_value('city', $profiledetail->city)));
                                        echo form_error("city");
                                        ?>
                                 </div> -->
                                 <!-- <div class="form-group">
                                     <label>Google Map Url</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter Google Map URL', 'name' => 'googlemap', 'rows' => '3', 'value' => set_value('googlemap', $profiledetail->googlemap)));
                                        echo form_error("googlemap");
                                        ?>
                                 </div> -->
                                 <div class="form-group">
                                     <label>Title</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your company name', 'name' => 'companytitle', 'value' => set_value('companytitle', $profiledetail->comp_title)));
                                        echo form_error("companytitle"); ?>
                                 </div>
                                 <div class="form-group">
                                     <label>Facebook</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Facebook URL', 'name' => 'facebook', 'value' => set_value('facebook', $profiledetail->facebook)));
                                        echo form_error("facebook"); ?>
                                 </div>
                                 <div class="form-group">
                                     <label>Twitter</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Twitter URL', 'name' => 'twitter', 'value' => set_value('twitter', $profiledetail->twitter)));
                                        echo form_error("twitter"); ?>
                                 </div>
                                 <div class="form-group">
                                     <label>LinkedIn</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'LinkedIn URL', 'name' => 'linkedin', 'value' => set_value('linkedin', $profiledetail->linkedin)));
                                        echo form_error("linkedin"); ?>
                                 </div>
                                 <div class="form-group">
                                     <label>Instagram</label>
                                     <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Instagram URL', 'name' => 'instagram', 'value' => set_value('insta', $profiledetail->insta)));
                                        echo form_error("insta"); ?>
                                 </div>
                                 <div class="form-group">
                                     <label>Company Logo</label>
                                     <?php

                                        $logoUrl = base_url() . "assest/uploadfile/" . $profiledetail->comp_logo;

                                        if (read_file($logoUrl) && $profiledetail->comp_logo != '') {
                                            $logo = $profiledetail->comp_logo;
                                        } else {
                                            $logo = "noimage.png";
                                        }

                                        echo img(array("src" => base_url() . "assest/uploadfile/" . $logo, "id" => "output_image", "class" => "img-thumbnail brwsimg")); ?>

                                     <label class="btn-bs-file btn btn-lg btn-default">Browse
                                         <?php echo form_upload(array('name' => 'companylogo', 'value' => set_value('companylogo'), "accept" => "image/*", "class" => "imgfile", "onchange" => "preview_image(event)"));
                                            ?>
                                     </label>

                                     <label class='btn-bs-file btn btn-lg btn-danger removeimg'>Remove</label>


                                     <?php
                                        echo form_error("companylogo");

                                        echo form_input(array('type' => 'hidden', 'name' => 'oldimage', 'value' => $profiledetail->comp_logo, "class" => "imgfile"));

                                        echo form_input(array('type' => 'hidden', 'name' => 'removeimage', 'value' => "", "id" => "removeimage"));


                                        ?>
                                 </div>

                                 <?php echo form_submit(array('class' => 'btn btn-success', 'name' => 'companyupdate', 'value' => 'Update Profile')); ?>

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



     </div>
     <!-- /.container-fluid -->
 </div>
 <!-- /#page-wrapper -->

 </div>
 <!-- /#wrapper -->
 <?php include("footer.php"); ?>