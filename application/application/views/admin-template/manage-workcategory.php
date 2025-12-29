 <?php
  include("header.php");  include("sidebar.php"); 
 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manage Work Category
<?php echo anchor("administrator/workcatform", "Add Category", array("class"=>"btn btn-primary pull-right")); ?>
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
          <div class="panel-heading"> List of category created by admin </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th width="50">SN.</th>
                  <th>Title</th>
                  <th>Works</th>
                  <th>Tutorial</th>
                  <th>Portfolio</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
<?php 

$sn=0; foreach ($servicelist as $service) {
$sn++;

 ?>
                <tr class="odd">
                  <td><?php echo $sn;?></td>
                  <td><?php echo $service->services_title; ?></td>
                  <th><?php if($service->work==1){echo "Yes";} else{echo "No";} ?></th>
                  <th><?php if($service->tutorial==1){echo "Yes";} else{echo "No";} ?></th>
                  <th><?php if($service->portfolio==1){echo "Yes";} else{echo "No";} ?></th>
                  <td class="center">
<?php 
if($service->status=="Active"){$cls="btn btn-success";}
  else{$cls="btn btn-danger";}
echo anchor("administrator/productstatus/".$service->id."/id/work_category/".$service->status."/manageworkcategory", $service->status, array("class"=>$cls));?>

                  </td>
                  <td class="center">
<?php 

echo anchor("administrator/workcatform/".$service->id, "<i class='fa fa-pencil'></i>", array('class'=>"btn btn-info btn-circle"));

echo " &nbsp; ";


echo anchor("administrator/deleteproduct/".$service->id."/id/work_category/nodata/manageworkcategory", "<i class='fa fa-times'></i>", array("class"=>"btn btn-danger btn-circle", "onclick"=>"return confirm('Do you want delete this record')"));

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