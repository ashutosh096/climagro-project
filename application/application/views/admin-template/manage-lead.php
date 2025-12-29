<?php
  include("header.php");  
  include("sidebar.php"); 
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Manage Enquery</h1>
    </div>
  </div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<!-- /.panel-heading -->
<div class="panel-body">
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th width="50">SN.</th>
      <th width="120">Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Course</th>
      <th>Message</th>
      <th>Created</th>
    </tr>
  </thead>
<tbody>
<?php
  foreach($enquery as $data) { ?>
    <tr class="odd">
      <td><?php echo $data->id; ?></td>
      <td><?php echo $data->name; ?></td>
      <td><?php echo $data->email; ?></td>
      <td><?php echo $data->phone; ?></td>
      <td><?php echo $data->course; ?></td>
      <td><?php echo $data->message; ?></td>
      <td><?php echo $data->created; ?></td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include("footer.php"); ?> 