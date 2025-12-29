 <?php
  include("header.php");  include("sidebar.php"); 
 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manage Geocode & Meta</h1>

      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Google code or any other meta put here.
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
<?php if($this->session->flashdata('class')){?>
<div class="alert <?php echo $this->session->flashdata('class');?>"><?php echo $this->session->flashdata('msg');?></div>
<?php }?>

                                    <?php 
echo form_open_multipart("administrator/managegeocode");?>



                                        <div class="form-group">
                                            <label>Additional Meta With Complite Code</label>
<textarea class="form-control" name="metacontent" rows="10" placeholder="Short description"><?=base64_decode(@$geodata->title)?></textarea>
                                        </div>

<?php
echo form_hidden('geoid', @$geodata->id);
$btn = "Update Meta";
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
	$("#nametitle").val("<?php echo @$servicedata->page_title; ?>").text();
</script>