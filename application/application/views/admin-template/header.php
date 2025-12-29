<?php $adminDetail = $this->session->userdata("user_id");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title;?> </title>
    <?php 
    echo link_tag("assest/adminassest/vendor/bootstrap/css/bootstrap.min.css");
    echo link_tag("assest/adminassest/vendor/metisMenu/metisMenu.min.css");
    
    echo link_tag("assest/adminassest/vendor/datatables-plugins/dataTables.bootstrap.css");
    echo link_tag("assest/adminassest/vendor/datatables-responsive/dataTables.responsive.css");

    echo link_tag("assest/adminassest/dist/css/sb-admin-2.css");
    echo link_tag("assest/adminassest/vendor/font-awesome/css/font-awesome.min.css");

    echo link_tag("assest/adminassest/editorstyle/summernote.css");
    
    ?>
<script src="<?php echo base_url(); ?>assest/adminassest/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assest/adminassest/editorstyle/summernote.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<?php echo anchor(base_url("administrator/dashboard"), $adminDetail->name, array('class'=>"navbar-brand")); ?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
<?php if($adminDetail->u_type=='admin'){?>
                        <li>
<?php echo anchor(base_url()."administrator/companyprofile", "<i class='fa fa-user fa-fw'></i> Company Profile");?>
                        </li>
                        <li class="divider"></li>
<?php }?>
                        <li><a href="<?=base_url()?>administrator/adminlogout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            