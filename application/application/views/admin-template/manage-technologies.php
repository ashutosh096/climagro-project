 <?php
  include("header.php");
  include("sidebar.php");

  ?>
 <!-- Page Content -->
 <div id="page-wrapper">
   <div class="row">
     <div class="col-lg-12">
       <h1 class="page-header">Manage Technologies
         <?php echo anchor("administrator/technologiesform", "Add Technologies", array("class" => "btn btn-primary pull-right")); ?>
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
         <div class="panel-heading"> List of Technologies created by admin </div>
         <!-- /.panel-heading -->
         <div class="panel-body">
           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
             <thead>
               <tr>
                 <th width="50">SN.</th>
                 <th width="120">Image</th>
                 <th>Title</th>
                 <th>Status</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
               <?php $sn = 0;
                foreach ($servicelist as $service) {
                  $sn++;

                  $file = read_file("./assest/uploadfile/webimages/" . $service->services_image);

                  if ($file != '') {
                    $image = $service->services_image;
                  } else {
                    $image = "noimage.png";
                  }

                ?>
                 <tr class="odd">
                   <td><?php echo $sn; ?></td>
                   <td><img src="../assest/uploadfile/webimages/<?php echo $image; ?>" style="width: 100px;"></td>
                   <td><?php echo $service->services_title; ?></td>
                   <td class="center">
                     <?php
                      if ($service->status == "Active") {
                        $cls = "btn btn-success";
                      } else {
                        $cls = "btn btn-danger";
                      }
                      echo anchor("administrator/productstatus/" . $service->id . "/id/services/" . $service->status . "/managetechnologies", $service->status, array("class" => $cls)); ?>

                   </td>
                   <td class="center">
                     <?php

                      echo anchor("administrator/technologiesform/" . $service->id, "<i class='fa fa-pencil'></i>", array('class' => "btn btn-info btn-circle"));

                      echo " &nbsp; ";


                      echo anchor("administrator/deleteproduct/" . $service->id . "/id/services/assest-uploadfile-packages-" . $service->services_image . "/managetechnologies", "<i class='fa fa-times'></i>", array("class" => "btn btn-danger btn-circle", "onclick" => "return confirm('Do you want delete this record')"));

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