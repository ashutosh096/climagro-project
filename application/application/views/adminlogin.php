<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title;?></title>

    <!-- Bootstrap Core CSS -->
    <?php 
    echo link_tag("assest/adminassest/vendor/bootstrap/css/bootstrap.min.css");
    echo link_tag("assest/adminassest/vendor/metisMenu/metisMenu.min.css");
    echo link_tag("assest/adminassest/dist/css/sb-admin-2.css");
    echo link_tag("assest/adminassest/vendor/font-awesome/css/font-awesome.min.css");
    ?>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
<?php echo img(array('src'=>'assest/uploadfile/'.$profiledetail->comp_logo, 'style'=>'max-width:200px; margin:auto auto 20px auto; display:block'));?>
<?php if(isset($loginerror)){?>
                        <div class="alert alert-danger"><?php echo $loginerror;?></div>
<?php  } @$loginerror='';?>
                        <?php echo form_open("adminlogin/accesslogin") ?>
                            <fieldset>
                                <?php echo form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
                                
                                <div class="form-group">
                                    <?php echo form_input(array('class'=>'form-control', 'placeholder'=>'E-mail', 'name'=>'email', 'type'=>'text', 'value'=>set_value('email'))); ?>
                                </div>

                                <?php echo form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                                <div class="form-group">
                                    <?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Password', 'name'=>'password', 'type'=>'password', 'value'=>set_value('password'))); ?>
                                </div>

                                <?php echo form_submit(array('class'=>'btn btn-lg btn-success btn-block', 'value'=>'Login', 'name'=>'login')); ?>

                            </fieldset>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/assest/adminassest/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>/assest/adminassest/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>/assest/adminassest/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>/assest/adminassest/dist/js/sb-admin-2.js"></script>

</body>

</html>
