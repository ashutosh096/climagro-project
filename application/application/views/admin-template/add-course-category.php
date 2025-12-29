 <?php
  include("header.php");  include("sidebar.php"); 
 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Add Course Category<?php echo anchor("administrator/managecoursecategory", "Manage Category", array("class"=>"btn btn-warning pull-right")); ?></h1>

      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Your course form!
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
<?php if($this->session->flashdata("deleteslider")){?>
        <div class="alert <?php echo $this->session->flashdata("deleteclass"); ?>"><?php echo $this->session->flashdata("deleteslider"); ?></div>
        <?php };?>
                                    <?php 
echo form_open_multipart("administrator/addcoursecat") ?>
                                        
                                        <div class="form-group">
                                            <label>Slug Title</label>
                                            <?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Enter short page name', 'name'=>'slugtitle', 'value'=>set_value('slugtitle', @$servicedata->slug_title, FALSE))); ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Course Title</label>
<?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Enter your service title', 'name'=>'servicetitle', 'id'=>'nametitle', 'value'=>set_value('servicetitle')));
echo form_error("servicetitle"); ?>
                                        </div>

<div class="form-group">
                                            <label>Course Tagline</label>
<?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Enter your tagline', 'name'=>'tagline', 'id'=>'tagline', 'value'=>set_value('tagline'))); ?>
                                        </div>

<div class="form-group">
                                            <label>Course URL</label>
<?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Enter Custom URL', 'name'=>'serviceurl', 'value'=>set_value('serviceurl', @$servicedata->cat_url))); ?>
                                        </div>


                                        <div class="form-group">
                                            <label>Serial Number</label>
                                            <?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Enter number of service', 'name'=>'catnum', 'value'=>set_value('catnum', @$servicedata->services_short)));
                                            ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Category Description</label>
<textarea class="form-control" id="des_content" name="servicecontent" placeholder="Short description"><?=set_value('servicecontent', base64_decode(@$servicedata->page_content))?></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label style="display: block;">Category Banner Image</label>

<?php
$imgfile = "noimage.png";
$remove    = "";
if(@$servicedata->id>0){

    if(read_file(base_url()."assest/uploadfile/webimages/".$servicedata->image) && $servicedata->image!='' )
    {
        $imgfile = $servicedata->image;
    }
    else{
        $imgfile = "noimage.png";
    }
}

echo img(array("src"=>base_url()."assest/uploadfile/webimages/".$imgfile, "id"=>"output_image", "class"=>"img-thumbnail brwsimg"));

?>

<label class="btn-bs-file btn btn-lg btn-default">Browse
    <?php echo form_upload(array('name'=>'serviceimage', 'value'=>set_value('sliderimage'), "accept"=>"image/*", "class"=>"imgfile", "onchange"=>"preview_image(event)"));
?>
</label>

<label class='btn-bs-file btn btn-lg btn-danger removeimg'>Remove</label>

<?php
if(isset($uploaderror)){echo $uploaderror;}

echo form_input(array('type'=>'hidden', 'name'=>'oldimage', 'value'=>@$servicedata->image, "class"=>"imgfile"));
echo form_input(array('type'=>'hidden', 'name'=>'removeimage', 'value'=>"", "id"=>"removeimage"));

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
<script>
    $("#nametitle").val("<?php echo @$servicedata->services_title; ?>").text();
    $("#tagline").val("<?php echo @$servicedata->tagline; ?>").text();
</script>