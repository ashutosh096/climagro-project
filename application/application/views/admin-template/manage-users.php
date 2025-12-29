 <?php
  include("header.php");  include("sidebar.php"); 

 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manage Users</h1>
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
          <div class="panel-heading"> List of users </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th width="50">SN.</th>
                  <th width="120">Profile</th>
                  <th>Name</th>
                  <th>Number</th>
                  <th>Email Id</th>
                  <th>Status</th>
                  <th>Access</th>
                </tr>
              </thead>
              <tbody>
<?php $sn=0; foreach ($userslist as $usersdata) {
$sn++;
$file = read_file("./assest/uploadfile/userdata/".$usersdata->profilepic);

if($file!=''){$image = $usersdata->profilepic;}
else{$image = "profile.jpg";}

  ?>
                <tr class="odd">
                  <td><?php echo $sn;?></td>
                  <td><img src="../assest/uploadfile/userdata/<?php echo $image;?>" style="width: 100px;"></td>
                  <td><?php echo $usersdata->name; ?></td>
                  <td><?php echo $usersdata->number; ?></td>
                  <td><?php echo $usersdata->email; ?></td>
                  <td class="center">
<?php 
if($usersdata->status=="Active"){$cls="btn btn-success";}
  else{$cls="btn btn-danger";}
echo anchor("administrator/productstatus/".$usersdata->id."/id/users/".$usersdata->status."/manageusers", $usersdata->status, array("class"=>$cls));?>

                  </td>
                  <td class="center">
<?php 
echo anchor("welcome/accessaccount/".base64_encode($usersdata->email), "Access Account", array('class'=>"btn btn-info", 'target'=>'_blank'));
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