 <?php
  include("header.php");
  include("sidebar.php");

  ?>
 <!-- Page Content -->
 <div id="page-wrapper">
   <div class="row">
     <div class="col-lg-12">
       <h1 class="page-header">Manage News

         <select class="form-control form-group pull-right coursecat " style="max-width:250px; margin-left:10px;">
           <option value="">All</option>
           <?php if (is_array($catlist) && sizeof($catlist) > 0) {
              foreach ($catlist as $getCatlist) { ?>
               <option value="<?php echo $getCatlist->services_title; ?>"><?php echo $getCatlist->slug_title; ?></option>
           <?php }
            } ?>

         </select>

         <?php echo anchor("administrator/newsform", "Add News", array("class" => "btn btn-primary pull-right")); ?>

       </h1>
     </div>
     <!-- /.col-lg-12 -->
   </div>
   <!-- /.row -->
   <div class="row">
     <div class="col-lg-12">
       <?php if ($this->session->flashdata("deleteslider")) { ?>
         <div class="alert <?php echo $this->session->flashdata("deleteclass"); ?>"><?php echo $this->session->flashdata("deleteslider"); ?></div>
       <?php }; ?>
       <div class="panel panel-default">
         <div class="panel-heading"> List of services created by admin </div>
         <!-- /.panel-heading -->
         <div class="panel-body">
           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
             <thead>
               <tr>
                 <th width="50">SN.</th>
                 <th width="120">Image</th>
                 <th>Slug Title</th>
                 <th>Page Name</th>
                 <th>Parent Name</th>
                 <th>Status</th>
                 <th>Type</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
               <?php $sn = 0;
                foreach ($pagelist as $pagedetail) {

                  if ($pagedetail->type == 1) {
                    $type = "Home Page";
                  } else {
                    $type = "News Page";
                  }
                  $sn++;

                  $file = read_file("./assest/uploadfile/newsimages/" . $pagedetail->page_image);

                  if ($file != '') {
                    $image = $pagedetail->page_image;
                  } else {
                    $image = "noimage.png";
                  }
                  $cordata = $this->adminmodel->productlist($pagedetail->parent_id, "id", "tbl_blog_category");

                ?>
                 <tr class="odd">
                   <td><?php echo $sn; ?></td>
                   <td><img src="../assest/uploadfile/newsimages/<?php echo $image; ?>" style="width: 100px;"></td>
                   <td><?php echo $pagedetail->slug_title; ?></td>
                   <td><?php echo $pagedetail->page_title; ?></td>
                   <td><?php echo $cordata->services_title; ?></td>

                   <td class="center">
                     <?php
                      if ($pagedetail->status == "Active") {
                        $cls = "btn btn-success";
                      } else {
                        $cls = "btn btn-danger";
                      }
                      echo anchor("administrator/productstatus/" . $pagedetail->id . "/id/news/" . $pagedetail->status . "/managenews", $pagedetail->status, array("class" => $cls)); ?>

                   </td>
                   <td><?php echo $type; ?></td>
                   <td class="center">
                     <?php

                      echo anchor("administrator/newsform/" . $pagedetail->id, "<i class='fa fa-pencil'></i>", array('class' => "btn btn-info btn-circle"));

                      echo " &nbsp; ";


                    //   echo anchor("administrator/deleteproduct/" . $pagedetail->id . "/id/blog/assest-uploadfile-newsimages-" . $pagedetail->page_image . "/managenews", "<i class='fa fa-times'></i>", array("class" => "btn btn-danger btn-circle", "onclick" => "return confirm('Do you want delete this record')"));

                      ?>

                   </td>
                 </tr>
               <?php } ?>
             </tbody>
           </table>
           <!-- /.table-responsive -->

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
 <script type="text/javascript">
   $(document).ready(function() {
     $('.coursecat').change(function() {
       $('.input-sm').val($(this).val());
       $('.input-sm').keyup();
     });
   });
 </script>