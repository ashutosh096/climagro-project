 <?php
  include("header.php");  include("sidebar.php"); 
 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Add Work Category<?php echo anchor("administrator/manageworkcategory", "Manage Category", array("class"=>"btn btn-warning pull-right")); ?></h1>

      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Your ccategory form!
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
<?php if($this->session->flashdata("deleteslider")){?>
        <div class="alert <?php echo $this->session->flashdata("deleteclass"); ?>"><?php echo $this->session->flashdata("deleteslider"); ?></div>
        <?php };?>
                                    <?php 
echo form_open_multipart("administrator/addworkcat") ?>
                                        
                                        <div class="form-group">
                                            <label>Work Category Title</label>
                                            <?php echo form_input(array('class'=>'form-control', 'required'=>true, 'placeholder'=>'Enter your service title', 'name'=>'servicetitle', 'value'=>set_value('servicetitle', @$servicedata->services_title)));
echo form_error("servicetitle"); ?>
                                        </div>


                                        <div class="form-group">
                                            <label>Serial Number</label>
                                            <?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Enter number of service', 'name'=>'catnum', 'value'=>set_value('catnum', @$servicedata->services_short)));
                                            ?>
                                        </div>

<?php $wt=''; $wf='';
    if(@$servicedata->work==1){$wt="true";} else{$wf="false";} ?>
                                        <div class="form-group">
                                            <label style="display: block;">Show In Work</label>
                                            <?php 
                                            echo "Yes ".form_radio(array('name'=>'work', 'checked'=>$wt ,  'value'=>'1')).' &nbsp; &nbsp; No '.form_radio(array('name'=>'work', 'checked'=>$wf , 'value'=>'0'));
                                            ?>
                                        </div>

<?php $t=''; $f='';
    if(@$servicedata->tutorial==1){$t="true";} else{$f="false";} ?>
                                        <div class="form-group">
                                            <label style="display: block;">Show In Tutorial</label>
                                            <?php 
                                            echo "Yes ".form_radio(array('name'=>'tutorial', 'checked'=>$t ,  'value'=>'1')).' &nbsp; &nbsp; No '.form_radio(array('name'=>'tutorial', 'checked'=>$f , 'value'=>'0'));
                                            ?>
                                        </div>
                                        
                                        
<?php $pt=''; $pf='';
    if(@$servicedata->portfolio==1){$pt="true";} else{$pf="false";} ?>
                                        <div class="form-group">
                                            <label style="display: block;">Show In Portfolio</label>
                                            <?php 
                                            echo "Yes ".form_radio(array('name'=>'portfolio', 'checked'=>$pt ,  'value'=>'1')).' &nbsp; &nbsp; No '.form_radio(array('name'=>'tutorial', 'checked'=>$pf , 'value'=>'0'));
                                            ?>
                                        </div>
                                        
                                        

                                        

<?php
echo form_hidden('serviceid', @$servicedata->id);
if(@$servicedata->id>0){$btn = "Save Category";}
else{$btn = "Add Category";}
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