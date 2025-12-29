 <?php
  include("header.php");  include("sidebar.php"); 

 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manage Tutorials 
<?php echo anchor("administrator/tutorialform", "Add Tutorial", array("class"=>"btn btn-primary pull-right")); ?>
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
                  <th>Category Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
<?php $sn=0; foreach ($pagelist as $pagedetail) {
$sn++;

$cordata = $this->adminmodel->productlist($pagedetail->category_id, "id", "tbl_work_category");
 ?>
                <tr class="odd">
                  <td><?php echo $sn;?></td>
                  <td>
 <iframe width="200" height="150"
src="https://www.youtube.com/embed/<?php echo $pagedetail->video; ?>">
</iframe> 
                  </td>
                  <td><?php echo $pagedetail->work_title; ?></td>
                  <td><?php echo $cordata->services_title; ?></td>
                  <td class="center">
<?php 
if($pagedetail->status=="Active"){$cls="btn btn-success";}
  else{$cls="btn btn-danger";}
echo anchor("administrator/productstatus/".$pagedetail->id."/id/tutorial/".$pagedetail->status."/managetutorial", $pagedetail->status, array("class"=>$cls));?>

                  </td>
                  <td class="center">
<?php 

echo anchor("administrator/tutorialform/".$pagedetail->id, "<i class='fa fa-pencil'></i>", array('class'=>"btn btn-info btn-circle"));

echo " &nbsp; ";


echo anchor("administrator/deleteproduct/".$pagedetail->id."/id/tutorial/nodata/managetutorial", "<i class='fa fa-times'></i>", array("class"=>"btn btn-danger btn-circle", "onclick"=>"return confirm('Do you want delete this record')"));

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