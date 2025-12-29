 <?php
    include("header.php");
    include("sidebar.php");
    ?>
 <!-- Page Content -->
 <div id="page-wrapper">
     <div class="row">
         <div class="col-lg-12">
             <h1 class="page-header">Add SEO <?php echo anchor("administrator/manageseo", "Manage SEO List", array("class" => "btn btn-warning pull-right")); ?></h1>

         </div>
         <!-- /.col-lg-12 -->
     </div>
     <!-- /.row -->

     <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     Your seo form!
                 </div>

                 <div class="panel-body">
                     <div class="row">
                         <div class="col-lg-12">
                             <?php if ($this->session->flashdata("deleteslider")) { ?>
                                 <div class="alert alert-danger">
                                     <?php echo $this->session->flashdata("deleteslider"); ?></div>
                             <?php }
                                $this->session->flashdata("deleteslider", ''); ?>
                             <?php
                                echo form_open_multipart("administrator/addseo") ?>

                             <div class="form-group">
                                 <label>SEO Url</label>
                                 <?php echo form_input(array('class' => 'form-control', 'placeholder' => 'Enter your tutorial name', 'name' => 'seourl', 'value' => set_value('seourl', @$workdata->url)));
                                    echo form_error('seourl');
                                    ?>
                             </div>

                             <div class="form-group">
                                 <label>Page Title</label>
                                 <textarea class="form-control" name="title" placeholder="Page Title"><?php echo set_value('title', @base64_decode($workdata->title)); ?></textarea>

                             </div>


                             <div class="form-group">
                                 <label>Page Keywords</label>
                                 <textarea class="form-control" name="content" placeholder="Page Keywords"><?php echo set_value('content', @base64_decode($workdata->content)); ?></textarea>

                             </div>

                             <div class="form-group">
                                 <label>Page Descriptions</label>
                                 <textarea class="form-control" name="description" placeholder="Page Description"><?php echo set_value('title', @base64_decode($workdata->description)); ?></textarea>

                             </div>




                             <?php
                                echo form_hidden('seoid', @$workdata->id);
                                if (@$workdata->id > 0) {
                                    $btn = "Save SEO";
                                } else {
                                    $btn = "Add SEO";
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
 </script>