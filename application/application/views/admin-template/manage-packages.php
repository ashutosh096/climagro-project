 <?php
  include("header.php");  include("sidebar.php"); 

 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manage Packages 
<?php echo anchor("administrator/packageform", "Add Packages", array("class"=>"btn btn-primary pull-right")); ?>
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
          <div class="panel-heading"> List of packages created by admin </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th width="50">SN.</th>
                  <th width="120">Image</th>
                  <th>Title</th>
                  <th>Services</th>
                  <th>Accessories</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
<?php $sn=0; foreach ($packagelist as $package) {
$sn++;
$file = read_file("./assest/uploadfile/webimages/".$package->image);

if($file!=''){$image = $package->image;}
else{$image = "noimage.png";}

$serdata = $this->adminmodel->productlist($package->service, "id", "tbl_services");
$assdata = $this->adminmodel->productlist($package->access, "id", "tbl_accessories");

  ?>
                <tr class="odd">
                  <td><?php echo $sn;?></td>
                  <td><img src="../assest/uploadfile/webimages/<?php echo $image;?>" style="width: 100px;"></td>
                  <td><?php echo $package->packagename; ?></td>
                  <td><?php echo $serdata->services_title; ?></td>
                  <td><?php echo $assdata->access_title; ?></td>
                  <td class="center">
<?php 
if($package->status=="Active"){$cls="btn btn-success";}
  else{$cls="btn btn-danger";}
echo anchor("administrator/productstatus/".$package->id."/id/webimages/".$package->status."/managepackages", $package->status, array("class"=>$cls));?>

                  </td>
                  <td class="center">
<?php 

echo anchor("administrator/packageform/".$package->id, "<i class='fa fa-pencil'></i>", array('class'=>"btn btn-info btn-circle"));

echo " &nbsp; ";


echo anchor("administrator/deleteproduct/".$package->id."/id/webimages/assest-uploadfile-packages-".$package->image."/managepackages", "<i class='fa fa-times'></i>", array("class"=>"btn btn-danger btn-circle", "onclick"=>"return confirm('Do you want delete this record')"));

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