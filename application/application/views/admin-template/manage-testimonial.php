 <?php
  include("header.php");  include("sidebar.php"); 

 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manage Testimonial
<?php echo anchor("administrator/testimonialform", "Add Testimonial", array("class"=>"btn btn-primary pull-right")); ?>
</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <?php if($this->session->flashdata("deleteslider")){?>
        <div class="alert <?php echo $this->session->flashdata("deleteclass"); ?>"><?php echo $this->session->flashdata("deleteslider"); ?></div>
        <?php };?>
        <div class="panel panel-default">
          <div class="panel-heading"> List of tutorials created by admin </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th width="50">SN.</th>
                  <th width="120">Video</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
<?php $sn=0; foreach ($pagelist as $pagedetail) {
$sn++;
 ?>
                <tr class="odd">
                  <td><?php echo $sn;?></td>
                  <td>
                    <img src="<?php echo base_url().'assest/uploadfile/testimonial/'.$pagedetail->image; ?>"  width="200" height="150">
  
                  </td>
                  <td><?php echo $pagedetail->work_title; ?></td>
                  <td class="center">
<?php 
if($pagedetail->status=="Active"){$cls="btn btn-success";}
  else{$cls="btn btn-danger";}
echo anchor("administrator/productstatus/".$pagedetail->id."/id/testimonial/".$pagedetail->status."/managetestimonial", $pagedetail->status, array("class"=>$cls));?>

                  </td>
                  <td class="center">
<?php 

echo anchor("administrator/testimonialform/".$pagedetail->id, "<i class='fa fa-pencil'></i>", array('class'=>"btn btn-info btn-circle"));

echo " &nbsp; ";


echo anchor("administrator/deleteproduct/".$pagedetail->id."/id/testimonial/nodata/managetestimonial", "<i class='fa fa-times'></i>", array("class"=>"btn btn-danger btn-circle", "onclick"=>"return confirm('Do you want delete this record')"));

?>

                  </td>
                </tr>
<?php }?>
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