 <?php
  include("header.php");  include("sidebar.php"); 

 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manage Slider 
<?php echo anchor("administrator/sliderform", "Add Slider", array("class"=>"btn btn-primary pull-right")); ?>
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
          <div class="panel-heading"> List of slider created by admin </div>
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
<?php $sn=0; foreach ($sliderlist as $slider) {
$sn++;
$file = read_file("./assest/uploadfile/sliders/".$slider->slide_image);

if($file!=''){$image = $slider->slide_image;}
else{$image = "noimage.png";}

  ?>
                <tr class="odd">
                  <td><?php echo $sn;?></td>
                  <td><img src="../assest/uploadfile/sliders/<?php echo $image;?>" style="width: 100px;"></td>
                  <td><?php echo $slider->slide_title; ?></td>
                  <td class="center">
<?php 
if($slider->status=="Active"){$cls="btn btn-success";}
  else{$cls="btn btn-danger";}
echo anchor("administrator/productstatus/".$slider->id."/id/slider/".$slider->status."/manageslider", $slider->status, array("class"=>$cls));?>

                  </td>
                  <td class="center">
<?php 

echo anchor("administrator/sliderform/".$slider->id, "<i class='fa fa-pencil'></i>", array('class'=>"btn btn-info btn-circle"));

echo " &nbsp; ";


echo anchor("administrator/deleteproduct/".$slider->id."/id/slider/assest-uploadfile-sliders-".$slider->slide_image."/manageslider", "<i class='fa fa-times'></i>", array("class"=>"btn btn-danger btn-circle", "onclick"=>"return confirm('Do you want delete this record')"));

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