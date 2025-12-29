 <?php
  include("header.php");  include("sidebar.php"); 
 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Add Tutorial <?php echo anchor("administrator/managetutorial", "Manage Tutorial", array("class"=>"btn btn-warning pull-right")); ?></h1>

      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Your tutorial form!
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
<?php if($this->session->userdata("errprofile")){?><div class="alert alert-danger"><?php echo $this->session->userdata("errprofile");?></div><?php }?>
<?php if($this->session->userdata("sucprofile")){?><div class="alert alert-success"><?php echo $this->session->userdata("sucprofile");?></div><?php }
    $this->session->unset_userdata("errprofile");
    $this->session->unset_userdata("sucprofile");
    ?>
                                    <?php 
echo form_open_multipart("administrator/addtutorial") ?>

<div class="form-group">
                                            <label>Select Category</label>
                                           
<?php 
$key = array('');
$val = array('Select one');

foreach ($worklist as $service) {
    array_push($key, $service->id);
    array_push($val, $service->services_title);
};


if(@$workdata->category_id!=''){ $dt = "$workdata->category_id"; } else{ $dt=set_value('workcat'); }

$icon=array_combine($key, $val);
echo form_dropdown("workcat", $icon, $dt , "class='form-control catdata' required");
//echo form_error("coursecat"); 
                                             ?>

                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Tutorial Title</label>
                                            <?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Enter your tutorial name', 'name'=>'worktitle', 'id'=>'nametitle', 'value'=>set_value('worktitle'), 'required'=>true));
?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Youtube Video Id</label>
                                            <?php echo form_input(array('class'=>'form-control', 'placeholder'=>'You Tube Video Id Ex: v=yxDxdIpImds', 'name'=>'video', 'value'=>set_value('student', @$workdata->video), 'required'=>true)) ?>
                                        </div>


                                        <div class="form-group">
                                            <label>Serial Number</label>
                                            <?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Enter number of service', 'name'=>'serialnum', 'value'=>set_value('serialnum', @$workdata->services_short)));
                                            ?>
                                        </div>

                                        

<?php
echo form_hidden('serviceid', @$workdata->id);
if(@$workdata->id>0){$btn = "Save Tutorial";}
else{$btn = "Add Tutorial";}
?>

                                        <?php echo form_submit(array('class'=>'btn btn-success', 'value'=>$btn));
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