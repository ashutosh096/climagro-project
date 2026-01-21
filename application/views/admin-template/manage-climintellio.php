<?php
include("header.php");
include("sidebar.php");
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Climintellio Requests</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata("deleteslider")) { ?>
                <div class="alert <?php echo $this->session->flashdata("deleteclass"); ?>"><?php echo $this->session->flashdata("deleteslider"); ?></div>
            <?php }; ?>
            <div class="panel panel-default">
                <div class="panel-heading"> List of data requests </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="50">ID</th>
                                <th>User</th>
                                <th>Organization</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Submitted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($requests as $req) { ?>
                                <tr class="odd">
                                    <td><?php echo $req->id; ?></td>
                                    <td>
                                        <strong><?php echo $req->user_name; ?></strong><br>
                                        <small><?php echo $req->user_email; ?></small>
                                    </td>
                                    <td><?php echo $req->user_org_type; ?></td>
                                    <td>
                                        <span class="label label-info"><?php echo $req->request_type; ?></span>
                                    </td>
                                    <td>
                                        <?php echo $req->location_method; ?>
                                        <br><small><?php echo $req->admin_level; ?></small>
                                    </td>
                                    <td><?php echo date('d M Y H:i', strtotime($req->submitted_at)); ?></td>
                                    <td class="center">
                                        <?php
                                        // View details could be a modal or separate page, for now just delete
                                        echo anchor("administrator/delete_climintellio/" . $req->id, "<i class='fa fa-trash'></i>", array("class" => "btn btn-danger btn-circle", "onclick" => "return confirm('Are you sure you want to delete this request?')", "title" => "Delete"));
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
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
